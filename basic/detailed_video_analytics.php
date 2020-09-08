<?php 
require 'header.php';
require 'connectwithoutdata.php';
if (isset($_GET['video_name'])) {
$database_name=$_GET['database_name'];
$course_name=$_GET['course_name'];
$video_name=$_GET['video_name'];

$link_video = new mysqli(
                            $host,
                            $user,
                            $password, $database_name);
?>
<br><br><br><br>
  <link rel="stylesheet" href="../../basic/assets/css/main.css" />
  <link rel="stylesheet" href="../../basic/assets/css/chatbox.css" />

  <script src="https://kit.fontawesome.com/361990fe0a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../basic/assets/dist/plyr.css" />
  <link href="https://vjs.zencdn.net/7.8.3/video-js.css" rel="stylesheet" />
  <link href="//vjs.zencdn.net/7.8.2/video-js.min.css" rel="stylesheet">
  <link href="../../basic/assets/videojs.chapter-thumbnails.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../basic/assets/css/question.css">

  <div id="php" class="load"><?php echo isset(($_SESSION['signuser'])); ?></div>
  <div id="phpname" class="load"><?php echo ($_SESSION['signuser']); ?></div>
  <div id="phplogin" class="load"><?php echo ($_SESSION['loginuser']); ?></div>
  <div id="loginbool" class="load"><?php echo isset(($_SESSION['loginuser'])); ?></div>
  <a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

<?php
echo($video_name);

$resultchat = mysqli_query($link_video,"SELECT * FROM `chat` " );
while ($rowchat=mysqli_fetch_array($resultchat)) {
?> 
  <link rel="stylesheet" href="./assets/css/chatbox.css" />

<div class="chatbox" id="mydiv">
      <div class="chatbox_upbar">
        <div class="dragarea" id="mydivheader">DragArea</div>

        <div class="btn not-active" id="ddb">
          <span style="background: black;height: 3.2px;"></span>
          <span style="background: black;height: 3.2px;"></span>
          <span style="background: black;height: 3.2px;"></span>
        </div>

        <div class="con" id="con">CHAT</div>



        <div id="mouseover" class="mouseover"></div>
      </div>
      <div class="chatbox_midbar" id="bg">
        <div class="chatarea">


          <!-- chat starts from here -->

          <div class="main7" id="main7">
            <div class="displayb" id="displayb"></div>
    <script src="../../basic/assets/js/drag.js"></script>
    <script src="../../basic/assets/js/jquery.js"></script>
    <script src='../../basic/assets/js/javascript.js'></script>
            <script type="text/javascript">
              $(document).ready(function() {
                var myvid = document.getElementById("myVideo");



                var usery = document.querySelector('#phplogin').innerText;
                displaychat(usery);

                //setInterval(function(){displaytopic();}, 1000);
                var displaytimechat = 0;
                //setInterval(function(){displaytopic();}, 1000);
                function show() {
                  // get selected value and store it in val
  
                    displaychat();
                    var newest_time ="00:00:00";
                    $.ajax({
                      url: 'clickdata.php',
                      method: "POST",
                      data: {
                        newest_time: newest_time,
                        Newest: 1,
                        loginbool: loginbool
                      },
                      success: function(d) {

                      }
                    });
                  
                }
                //now, you can invoke show() method as per your requirement.
                document.getElementsByTagName('select')[0].addEventListener('change', function() {
                  show();
                });


                $("#submitposty").click(function(argument) {
                  alert("sdfsdf");

                  var current_react = document.getElementById("reactionhide").innerHTML;
                  var usery = document.querySelector('#phplogin').innerText;
                  var topicy = $(".topicy").val();
                  var id = 0;
                  
                  var login_ID="<?php echo ($_SESSION['loginid']); ?>";
                  var database_name="<?php echo ($database_name); ?>";
                  load_chat();

                  function load_chat() {

                    $.ajax({
                      url: "ajaxy.php",
                      method: "POST",
                      data: {
                        doney: doney,
                        id: id,
                        usery: usery,
                        timeminy: timeminy,
                        topicy: topicy,
                        totalsecs: totalsecs,
                        current_react: current_react,
                        login_ID:login_ID,
                        database_name:database_name

                      },
                      success: function(data) {
                        displaychat();
                        $('.topicy').val('');
                        document.getElementById("reactionhide").innerHTML = "0";
                        document.getElementById("ilb").innerHTML = "+";


                      }
                    })
                    $.ajax({
                      url: "clickdata.php",
                      method: "POST",
                      data: {
                        doney: doney,
                        id: id,
                        usery: usery,
                        timeminy: timeminy,
                        topicy: topicy,
                        totalsecs: totalsecs,
                        current_react: current_react

                      },
                      success: function(data) {}
                    });


                  }






                });

              });

              function displaychat() {
                var displaychat = 1;
                var database_name="<?php echo($database_name)?>";
                $.ajax({
                  url: "ajaxy.php",
                  method: "POST",
                  data: {
                    displaychat: 1,
                    database_name:database_name
                  },
                  success: function(d) {
                    $(".displayb").html(d);
                    var com = document.getElementsByClassName("reply_btn");
                    var comlength = com.length - 1;
                    var lastelementy = document.getElementsByClassName("reply_btn")[comlength];
                    lastelementy.scrollIntoView({
                      behavior: 'smooth',
                      block: 'nearest',
                      inline: 'nearest'
                    });
                  }
                })

              }
            </script>



          </div>



        </div>
        <div class="chatarea_side">
          <div class="indicator" id="indicator"></div>
          <div class="chatarea_btn" id="chat_b">Chat</div>
          <div class="pnotes_btn" id="note_b">Notes</div>
        </div>
        <div class="chatbox_downbar" id="log">
          <button class="login3" style="display: none;" onclick="logClick()">Login</button>
          <ul class="insight_list" id="il">
            <li class="reaction"><img src="../../basic/images/1.png" class="react"></li>
            <li class="reaction"><img src="../../basic/images/2.png" class="react"></li>
            <li class="reaction"><img src="../../basic/images/3.png" class="react"></li>
            <li class="reaction"><img src="../../basic/images/4.png" class="react"></li>
            <li class="reaction"><img src="../../basic/images/5.png" class="react"></li>
          </ul>
          <span style="display:block">
            <div class="comment_insight" id="ilb">+</div>
            <input class="commentarea topicy" type="text" required="required" name="comment" placeholder="Comment here" style="display:block">
            <button class="post_btn submitposty" id="submitposty" type="submit"><i class="fas fa-location-arrow" aria-hidden="true"></i></button>
            <input class="commentarea topic" type="text" required="required" name="comment" placeholder="Comment here" style="display:none">
            <button class="post_btn submitpost" id="submitpost" type="submit" style="display:none"><i class="fas fa-location-arrow" aria-hidden="true"></i></button>
        </span></div>
        
      </div>
    </div>

<script src="./assets/js/jquery.js"></script>
  <script type="text/javascript">
    var blank="<?php echo $rowchat['reaction']; ?>";
    if (blank=="0") {
          document.getElementsByClassName("comment_react")[0].style.display="none";
    }
    document.getElementsByClassName("r<?php echo $rowchat['id']; ?>")[0].onclick = function(){
      if(document.getElementsByClassName("r<?php echo $rowchat['id']; ?>")[0].innerHTML == "Reply (<?php echo($rowchat['Replies']); ?>)"){
        var current_id="<?php echo $rowchat['id']; ?>";
        displayreply(current_id);
        document.getElementsByClassName("reply_column<?php echo $rowchat['id']; ?>")[0].style.display = "block";
        document.getElementsByClassName("r<?php echo $rowchat['id']; ?>")[0].innerHTML = "Hide Reply";
      } else {
        document.getElementsByClassName("reply_column<?php echo $rowchat['id']; ?>")[0].style.display = "none";
        document.getElementsByClassName("r<?php echo $rowchat['id']; ?>")[0].innerHTML = "Reply (<?php echo($rowchat['Replies']); ?>)";
      }
    }
  </script>
  <script type="text/javascript">
        $("#<?php echo $rowchat['id']; ?>h").click(function (argument) {
          var chatuser="<?php echo $rowchat['chatuser']; ?>";
           var time="<?php echo $rowchat['second']; ?>";
           var clickpost=1;

           var oldposttimey="00:00:00";
        
           var newposttimey="00:00:00";
                     var postidy="<?php echo $rowchat['id']; ?>";
                     
                       $.ajax({
   url:"ajaxy1.php",
   method:"POST",
   data:{
    clickpost:clickpost,
    postidy:postidy,
oldposttimey:oldposttimey,
newposttimey:newposttimey,
chatuser:chatuser

   },
   success:function(data)
   {
       }
  })



        });
          function timeConvert(time){
        var currenttime= parseInt(time);
        var totalsecsy=Math.floor(currenttime);
        var secs = Math.round(currenttime);
        var hours = Math.floor(secs / (60 * 60));
        var divisor_for_minutes = secs % (60 * 60);
        var minutes = Math.floor(divisor_for_minutes / 60);
        var divisor_for_seconds = divisor_for_minutes % 60;
        var seconds = Math.ceil(divisor_for_seconds);
        var zero="0";
        if (hours<10) {
        var hour=hours.toString();
        hour=zero.concat(hour);
        }
        else{
          var hour=hours.toString();
        }
        if (minutes<10) {
        var minute=minutes.toString();
        minute=zero.concat(minute);
        }
        else{
          var minute=minutes.toString();
        }
        if (seconds<10) {
        var second=seconds.toString();
        second=zero.concat(second);
        }
        else{
          var second=seconds.toString();
        }
        var colon=":";
        var timemin=hour.concat(colon,minute,colon,second);
        return timemin;
      }


    $("#<?php echo $rowchat['id']; ?>").click(function (argument) {
      var oldposttimereply="00:00:00";
      var reply_id="<?php echo $rowchat['id']; ?>";
      var user_reply=document.querySelector('#phplogin').innerText;
            var reply_content=$(".reply<?php echo $rowchat['id']; ?>").val();
            var reply_GET=1;

    load_reply(oldposttimereply);

 function load_reply(oldposttimereply)
 {console.log(oldposttimereply);
  $.ajax({
   url:"ajaxy1.php",
   method:"POST",
   data:{
    reply_GET:reply_GET,
    reply_id:reply_id,
user_reply:user_reply,
reply_content:reply_content

   },
   success:function(data)
   {
   displayreply(reply_id,oldposttimereply);
    $(".reply<?php echo $rowchat['id']; ?>").val('');
       }
  })
 }
        });

 function displayreply(reply_id,oldposttimereply) {
  console.log(oldposttimereply);
  var display_reply=1;
    $.ajax({
   url:"ajaxy1.php",
   method:"POST",
   data:{display_reply:1,
    reply_id:reply_id
    },
   success:function(d)
   {
   $(".reply_c"+reply_id).html(d);
   }
  })

}

</script>
  <?php
}




die();
}