<?php
require 'header.php';
require 'connectwithoutdata.php';
if (isset($_GET['video_name'])) {
    $database_name = $_GET['database_name'];
    $course_name = $_GET['course_name'];
    $video_name = $_GET['video_name'];

    $link_video = new mysqli(
        $host,
        $user,
        $password, $database_name);
    $link_course = new mysqli(
        $host,
        $user,
        $password, $course_name);
    $video_chats = mysqli_query($link_video, "SELECT * FROM chat");
    $total_chat = mysqli_num_rows($video_chats);
    $update = "UPDATE `total_videos` SET `prof_last_visit_chat`='$total_chat'  WHERE `database_name`='$database_name'";
    if ($link_course->query($update) === true) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $link_course->error;
    }

    ?>

<br><br><br><br>
  <link rel="stylesheet" href="./assets/css/main.css" />
  <link rel="stylesheet" href="./assets/css/chatbox.css" />

  <script src="https://kit.fontawesome.com/361990fe0a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./assets/dist/plyr.css" />
  <link href="https://vjs.zencdn.net/7.8.3/video-js.css" rel="stylesheet" />
  <link href="//vjs.zencdn.net/7.8.2/video-js.min.css" rel="stylesheet">
  <link href="./assets/videojs.chapter-thumbnails.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/question.css">

  <div id="phplogin" class="load"><?php echo ($_SESSION['loginuser']); ?></div>
  <div id="loginbool" class="load"><?php echo isset(($_SESSION['loginuser'])); ?></div>
  <a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>


  <link rel="stylesheet" href="./assets/css/chatbox.css" />
  <h2>Sort By</h2>
  <div class="switch-field">
    <input type="radio" id="radio-three" name="switch-two" value="yes" onclick="displaychat()" checked/>
    <label for="radio-three">Date Added</label>
    <input type="radio" id="radio-four" name="switch-two" value="maybe" onclick="displayreplychat()"/>
    <label for="radio-four">Most Replied</label>
    <input type="radio" id="radio-five" name="switch-two" value="no" onclick="displaytimechat()" />
    <label for="radio-five">Video Time</label>
  </div>
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
    <script src="./assets/js/drag.js"></script>
    <script src="./assets/js/jquery.js"></script>
    <script src='./assets/js/javascript.js'></script>
            <script type="text/javascript">
              $(document).ready(function() {

                var usery = "<?php echo ($_SESSION['loginuser']); ?>";
                displaychat(usery);

                //now, you can invoke show() method as per your requirement.

              });
            function submitpost() {
                  console.log("sdfsdf");

                  var current_react = document.getElementById("reactionhide").innerHTML;
                  var usery = "<?php echo ($_SESSION['loginuser']); ?>";
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
                        doney: 1,
                        id: id,
                        usery: usery,
                        timeminy: "00:00:04",
                        topicy: topicy,
                        totalsecs: 4,
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
                        doney: 1,
                        id: id,
                        usery: usery,
                        timeminy: "00:00:04",
                        topicy: topicy,
                        totalsecs: 4,
                        current_react: current_react

                      },
                      success: function(data) {}
                    });


                  }






                };


              function displaychat() {
                var displaychat = 1;
                var database_name="<?php echo ($database_name) ?>";
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
                            function displayreplychat() {
                var displayreplychat = 1;
                var database_name="<?php echo ($database_name) ?>";
                $.ajax({
                  url: "ajaxy.php",
                  method: "POST",
                  data: {
                    displayreplychat: 1,
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
              function displaytimechat() {
                      var displaytimechat = 1;
                      var database_name="<?php echo ($database_name) ?>";
                      $.ajax({
                        url: "ajaxy.php",
                        method: "POST",
                        data: {
                          displaytimechat: 1,
                          database_name:database_name

                        },
                        success: function(d) {
                          $(".displayb").html(d);
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

                      <div class="reactionhide" id="reactionhide">0</div>
          <ul class="insight_list" id="il">
            <li class="reaction"><img src="./images/1.png" class="react"></li>
            <li class="reaction"><img src="./images/2.png" class="react"></li>
            <li class="reaction"><img src="./images/3.png" class="react"></li>
            <li class="reaction"><img src="./images/4.png" class="react"></li>
            <li class="reaction"><img src="./images/5.png" class="react"></li>
          </ul>
          <span style="display:block">
            <div class="comment_insight" id="ilb">+</div>
            <input class="commentarea topicy" type="text" required="required" name="comment" placeholder="Comment here" style="display:block">
            <button class="post_btn submitposty" id="submitposty" type="submit" onclick="submitpost()"><i class="fas fa-location-arrow" aria-hidden="true"></i></button>
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
      if(document.getElementsByClassName("r<?php echo $rowchat['id']; ?>")[0].innerHTML == "Reply (<?php echo ($rowchat['Replies']); ?>)"){
        var current_id="<?php echo $rowchat['id']; ?>";
        displayreply(current_id);
        document.getElementsByClassName("reply_column<?php echo $rowchat['id']; ?>")[0].style.display = "block";
        document.getElementsByClassName("r<?php echo $rowchat['id']; ?>")[0].innerHTML = "Hide Reply";
      } else {
        document.getElementsByClassName("reply_column<?php echo $rowchat['id']; ?>")[0].style.display = "none";
        document.getElementsByClassName("r<?php echo $rowchat['id']; ?>")[0].innerHTML = "Reply (<?php echo ($rowchat['Replies']); ?>)";
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

    die();
}