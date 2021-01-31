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
$link_course = new mysqli(
                            $host,
                            $user,
                            $password, $course_name);
$video_chats=mysqli_query($link_video,"SELECT * FROM chat");
$total_chat=mysqli_num_rows($video_chats);
$update= "UPDATE `total_videos` SET `prof_last_visit_chat`='$total_chat'  WHERE `database_name`='$database_name'";
if ($link_course->query($update) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $link_course->error;
}

                $video_users=mysqli_query($link_course,"SELECT * FROM tbl_info");
                
                {$notes=array();
                    
                $video_notes=mysqli_query($link_video,"SELECT COUNT(DISTINCT(loginuser)) FROM note");
                $this_notes=mysqli_fetch_array($video_notes);
                array_push($notes,$this_notes['COUNT(DISTINCT(loginuser))']);
                

        }


        $first_video_users=mysqli_query($link_video,"SELECT COUNT(DISTINCT(user_id)) FROM clickdata");
        $this_users=mysqli_fetch_array($first_video_users);
        $first_video_users=$this_users['COUNT(DISTINCT(user_id))'];


        $GLOBALS['totalnotes']=0;
        function myfunction($value,$key){
$GLOBALS['totalnotes']=$GLOBALS['totalnotes']+$value;
}
array_walk_recursive($notes,"myfunction");

$total_notes=$GLOBALS['totalnotes'];
$percent_notes=round(($total_notes/(mysqli_num_rows($video_users)))*100);
$percent_first_video_users=round(($first_video_users/mysqli_num_rows($video_users))*100);  

?>
<!-- Mirrored from educhamp.themetrades.com/demo/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:08:15 GMT -->
<br>
<br><br><br><br>

  <!-- META ============================================= -->

  <!-- DESCRIPTION -->
  <meta name="description" content="EduChamp : Education HTML Template" />
  
  <!-- OG -->
  <meta property="og:title" content="EduChamp : Education HTML Template" />
  <meta property="og:description" content="EduChamp : Education HTML Template" />
  <meta property="og:image" content="" />
  <meta name="format-detection" content="telephone=no">
  
  <!-- FAVICONS ICON ============================================= -->
  
  
  <!-- PAGE TITLE HERE ============================================= -->
  <title>Video Overview </title>
  
  <!-- MOBILE SPECIFIC ============================================= -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!--[if lt IE 9]>
  <script src="assets/js/html5shiv.min.js"></script>
  <script src="assets/js/respond.min.js"></script>
  <![endif]-->
  
  <!-- All PLUGINS CSS ============================================= -->
  <link rel="stylesheet" type="text/css" href="assets/css/assets.css">
  <link rel="stylesheet" type="text/css" href="assets/vendors/calendar/fullcalendar.css">
  
  <!-- TYPOGRAPHY ============================================= -->
  <link rel="stylesheet" type="text/css" href="assets/css/typography.css">
  
  <!-- SHORTCODES ============================================= -->
  <link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
  
  <!-- STYLESHEETS ============================================= -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
  <link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
  

<body class="ttr-opened-sidebar ttr-pinned-sidebar">

  <!--Main container start -->
  <main class="ttr-wrapper">
    <div class="container-fluid">
 
      <!-- Card -->
      <div class="row">
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
          <div class="widget-card widget-bg1">           
            <div class="wc-item">
              <h4 class="wc-title">
                Total Students who have access to the video
              </h4>
              <span class="wc-stats">
                <span class="counter"><?php echo(mysqli_num_rows($video_users));?></span> 
              </span>   
              
            </div>              
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
          <div class="widget-card widget-bg2">           
            <div class="wc-item">
              <h4 class="wc-title">
                Students who have completed the Video
              </h4>
              <span class="wc-des">
                .
              </span>
              <span class="wc-stats">
                <span class="counter">70</span>% 
              </span>   
              
            </div>              
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
          <div class="widget-card widget-bg3">           
            <div class="wc-item">
              <h4 class="wc-title">
                Students who have collaborated  
              </h4>
              <span class="wc-des">
                .
              </span>
              <span class="wc-stats">
                <span class="counter">40</span>% 
              </span>   
              
            </div>              
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
          <div class="widget-card widget-bg4">           
            <div class="wc-item">
              <h4 class="wc-title">
                Students who have engaged 
              </h4>
              <span class="wc-des">
                .
              </span>
              <span class="wc-stats">
                <span class="counter">30</span>% 
              </span>   
              
            </div>              
          </div>
        </div>
      </div>
      <div class="row">
      <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
          <div class="widget-card widget-bg5">           
            <div class="wc-item">
              <h4 class="wc-title">
                Students who have written notes in the video
              </h4>
              <span class="wc-des">
                .
              </span>
              <span class="wc-stats">
                <span class="counter"><?php echo($percent_notes);?></span>% 
              </span>   
              
            </div>              
          </div>
        </div>
              <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
          <div class="widget-card widget-bg6">           
            <div class="wc-item">
              <h4 class="wc-title">
                Students who have started the Video
              </h4>
              <span class="wc-des">
                .
              </span>
              <span class="wc-stats">
                <span class="counter"><?php echo($percent_first_video_users);?></span>% 
              </span>   
              
            </div>              
          </div>
        </div>

      </div>
      </div>
      <!-- Card END -->
      <div class="row">
        <!-- Your Profile Views Chart -->
        <div class="col-lg-8 m-b30">
          <div class="widget-box">
            <div class="wc-title">
              <h4>Video Views</h4>
            </div>
            <div class="widget-inner">
              <canvas id="chart" width="100" height="45"></canvas>
            </div>
          </div>
        </div>
        

<!-- External JavaScripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/masonry/filter.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src='assets/vendors/scroll/scrollbar.min.js'></script>
<script src="assets/js/functions.js"></script>
<script src="assets/vendors/chart/chart.min.js"></script>
<script src="assets/js/admin.js"></script>
<script src='assets/vendors/calendar/moment.min.js'></script>
<script src='assets/vendors/calendar/fullcalendar.js'></script>
<script src='assets/vendors/switcher/switcher.js'></script>
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
    <script src="../../basic/assets/js/drag.js"></script>
    <script src="../../basic/assets/js/jquery.js"></script>
    <script src='../../basic/assets/js/javascript.js'></script>
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
                            function displayreplychat() {
                var displayreplychat = 1;
                var database_name="<?php echo($database_name)?>";
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
                      var database_name="<?php echo($database_name)?>";
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





die();
}