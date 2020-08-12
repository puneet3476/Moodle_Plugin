<?php
session_start();
require 'connect.php';
 
?>
 
<!DOCTYPE HTML>
 
<html>
 
<head>
  <title>Demo</title>
 
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <script src="https://kit.fontawesome.com/361990fe0a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../basic/assets/css/main.css" />
  <link rel="stylesheet" href="../../basic/assets/css/chatbox.css" />
 
  <script src="https://kit.fontawesome.com/361990fe0a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../basic/assets/dist/plyr.css" />
  <link href="https://vjs.zencdn.net/7.8.3/video-js.css" rel="stylesheet" />
  <link href="//vjs.zencdn.net/7.8.2/video-js.min.css" rel="stylesheet">
  <link href="../../basic/assets/videojs.chapter-thumbnails.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../basic/assets/css/question.css">
 
 
</head>
 
<body style="overflow-y: scroll;">
 
 
  <header id="header">
    <div class="inner">
      <a href="#" class="logo"><?php if (isset(($_SESSION['loginuser'])) && $_SESSION['loginuser'] != 'empty1') {
    echo ("Welcome " . $_SESSION['loginuser']);
}?>
      </a>
      <nav id="nav">
 
        <a id="login_but" href="<?php echo ($url_h . $appache_localhost_port . "/Moodle_Plugin/basic/login_page.php") ?>">Login </a>
 
        <a href="<?php echo("../../basic/".strtolower($_SESSION['my_role'])."_panel.php"); ?>">Home</a>
        <button id="myBtn" class="button alt">How to Use</button>
        <button id="freeze" class="button">Freeze</button>
 
 
      </nav>
    </div>
  </header>
  <div id="php" class="load"><?php echo isset(($_SESSION['signuser'])); ?></div>
  <div id="phpname" class="load"><?php echo ($_SESSION['signuser']); ?></div>
  <div id="phplogin" class="load"><?php echo ($_SESSION['loginuser']); ?></div>
  <div id="loginbool" class="load"><?php echo isset(($_SESSION['loginuser'])); ?></div>
  <a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>
 
  <!--Video player-->
 
  <div class="data" id="data"></div>
  <div class="container" style="width: 672px;float: left;margin-left: 11vw;margin-top: 10%;">
 
 
    <video playsinline controls class="vidchaVideo" id="myVideo" preload="metadata" width="600px" height="400px" style="--plyr-color-main:#e82c2f;--plyr-video-control-background-hover:rgba(0,0,0,0);--plyr-video-control-color:white;">
 
      <source src="videos/video1.mp4" type="video/mp4">
    </video>
 
 
    <!--  <video
    id="myVideo"
    class="video-js"
    controls
    preload="metadata"
    style="width: 600px;height: 367px;"
  >
    <source src="videos/video1.mp4" type="video/mp4" >
  </video> -->
    <div>Topics:</div>
     <ul class="vidchaNav">
      <?php
 
require 'connect.php';
 
$q = "SELECT * FROM `segments`";
$segments = mysqli_query($link, $q);
if (mysqli_num_rows($segments) > 0) {
    while ($row = mysqli_fetch_assoc($segments)) {?>
        <li data-start="<?php echo $row['segment_time'] ?>" class="topics"><?php echo $row['segments_name'] ?></li>
    <?php }
}?>
 
    </ul>
 
    <ul class="graph" id="graph">
      <li class="graph_column" onclick="graphtime(0)"></li>
      <li class="graph_column" onclick="graphtime(1)"></li>
      <li class="graph_column" onclick="graphtime(2)"></li>
      <li class="graph_column" onclick="graphtime(3)"></li>
      <li class="graph_column" onclick="graphtime(4)"></li>
      <li class="graph_column" onclick="graphtime(5)"></li>
      <li class="graph_column" onclick="graphtime(6)"></li>
      <li class="graph_column" onclick="graphtime(7)"></li>
      <li class="graph_column" onclick="graphtime(8)"></li>
      <li class="graph_column" onclick="graphtime(9)"></li>
      <li class="graph_column" onclick="graphtime(10)"></li>
      <li class="graph_column" onclick="graphtime(11)"></li>
      <li class="graph_column" onclick="graphtime(12)"></li>
      <li class="graph_column" onclick="graphtime(13)"></li>
      <li class="graph_column" onclick="graphtime(14)"></li>
      <li class="graph_column" onclick="graphtime(15)"></li>
      <li class="graph_column" onclick="graphtime(16)"></li>
      <li class="graph_column" onclick="graphtime(17)"></li>
      <li class="graph_column" onclick="graphtime(18)"></li>
      <li class="graph_column" onclick="graphtime(19)"></li>
    </ul>
    <ul id="video-controls" class="controls" style="display: none;">
      <li class="progress">
        <progress id="progress" value="0" min="0">
          <span id="progress-bar"></span>
        </progress>
      </li>
      <div style="width: 100%;padding-left: 10px;padding-right: 20px;">
        <div><button id="playpause" type="button"><img src="../../basic/images/play_pause.png" height="25" width="25" onClick="play()"></button></li>
          <li><button id="stop" type="button"><img src="../../basic/images/stop.png" height="25" width="25"></button></li>
          <li><button id="mute" type="button"><img src="../../basic/images/mute.svg" height="25" width="25"></button></li>
          <li class="positioner"></li>
 
          <script language="javascript" type="text/javascript">
          document.getElementsByClassName('plyr__progress').onclick=function(){
        console.log('ASD');
       }
            var fruits = [];
            <?php
require 'connect.php';
$resultchat = mysqli_query($link, "SELECT * FROM `chat` ");
while ($rowchat = mysqli_fetch_array($resultchat)) {
    ?>
              var temp = "<?php echo ($rowchat['second']) ?>";
              fruits.push(temp);
 
 
 
 
            <?php }?>
            var bore_time;
            var vid = document.getElementById('myVideo');
            var vid_curenttime = document.getElementById('myVideo').currentTime;
            vid.onloadedmetadata = function() {
              document.getElementsByClassName("positioner")[0].innerHTML = timeConvert(vid.currentTime) + " / " + timeConvert(vid.duration);
              myFunction();
            };
            setInterval(function() {
              document.getElementsByClassName("positioner")[0].innerHTML = timeConvert(vid.currentTime) + " / " + timeConvert(vid.duration);
 
            }, 1000);
 
            document.getElementById('progress').onclick = function() {
              window.value = (timeConvert(vid.currentTime));
 
            };
            // Display the current position of the video in a p element with id="demo"
 
 
            vid.onseeked = function() {
              var from_video_timestamp = window.value;
              var to_video_timestamp = timeConvert(vid.currentTime);
              console.log(window.value);
              console.log(to_video_timestamp);
              var click_on_video_stamp = 1;
              var loginbool = document.getElementById('loginbool').innerHTML;
              console.log(loginbool);
              $.ajax({
                url: "clickdata.php",
                method: "POST",
                data: {
                  click_on_video_stamp: click_on_video_stamp,
                  to_video_timestamp: to_video_timestamp,
                  from_video_timestamp: from_video_timestamp,
                  loginbool: loginbool
                },
                success: function(data) {}
              });
            };
 
 
 
 
 
            function graphtime(count) {
              search = [];
              var vid_t = document.getElementById('myVideo').duration;
              var vid_curenttime = document.getElementById('myVideo').currentTime;
              var vid_div = vid_t / 20;
              var vid_prevtimesecond = document.getElementById('myVideo').currentTime;
              var vid_prevtime = timeConvert(vid_prevtimesecond);
              var graph_time = graphtimeConvert(count * vid_div);
              document.getElementById('myVideo').currentTime = count * vid_div;
              var vid_curenttimesecond = Math.round(document.getElementById('myVideo').currentTime);
              var vid_curenttime = timeConvert(vid_curenttimesecond);
              var vid_curenttime_max = Math.floor((vid_div + vid_curenttimesecond));
 
              for (var i = vid_curenttimesecond; i <= vid_curenttime_max; i++) {
                for (var j = 0; j <= fruits.length - 1; j++) {
                  if (i == fruits[j]) {
                    document.getElementById('myVideo').currentTime = fruits[j];
                    search.push(timeConvert(i));
                    search.push(timeConvert(i + 1));
                  }
                }
              }
              if (searchbar(search[0]) != true) {
                //document.getElementById('myVideo').currentTime=document.getElementById('myVideo').currentTime+1;
 
                searchbar(search[1]);
              }
              //search_bartime();
              vid_currenttimey = timeConvert(document.getElementById('myVideo').currentTime);
              var bar_click = 1;
              $.ajax({
                url: "clickdata.php",
                method: "POST",
                data: {
                  bar_click: bar_click,
                  count: count,
                  vid_prevtime: vid_prevtime,
                  vid_curenttime: vid_currenttimey,
                  loginbool: loginbool
                },
                success: function(data) {}
              });
 
              function searchbar(values) {
                var found = 'false';
                var present_id, prev_id, elementy;
                let x = document.getElementsByClassName('comment_display');
                //console.log(x);
                for (i = 0; i < x.length; i++) {
                  //console.log(x[i].innerHTML.toLowerCase());
                  if (x[i].innerHTML.toLowerCase().includes(values)) {
 
                    found = 'true';
                    prev_id = present_id;
                    //x[i].style.border = "1px solid #0000FF";
                    present_id = $(x[i]).attr("id");
                    //console.log(present_id);
                    // console.log(x[i]);
                    elementy = document.getElementById(present_id);
                    //console.log(elementy);
                    document.getElementById(present_id).style.border = "1px solid #0000FF";
                    setTimeout(() => {
                      document.getElementById(present_id).style.border = "none";
                    }, 1500);
                    //document.getElementById('myVideo').currentTime=present_id;
                    elementy.scrollIntoView({
                      behavior: 'smooth',
                      block: 'nearest',
                      inline: 'nearest'
                    });
 
 
                    //$('html, body').animate({
                    //scrollTop: $(`#present_id`).offset().top
                    // }, 1000);
                    return true;
                    break;
                  } else {
                    continue;
 
 
 
 
                  }
 
                }
              }
 
              function search_bartime() {
                $('.comment_display').each(function() {
                  var found = 'false';
                  var present_id, prev_id, elementy;
                  for (var i = search.length - 1; i >= 0; i--) {
                    var value = search[i];
 
                    $(this).each(function() {
 
                      if ($(this).text().indexOf(value) >= 0) {
                        found = 'true';
 
                      }
                    });
                    if (found == 'true') {
                      prev_id = present_id;
 
 
                      $(this).show();
                      present_id = $(this).attr("id");
                      elementy = document.getElementById(present_id);
                      document.getElementById(present_id).style.border = "1px solid #0000FF";
                      setTimeout(() => {
                        document.getElementById(present_id).style.border = "none";
                      }, 1500);
                      //document.getElementById('myVideo').currentTime=present_id;
                      elementy.scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest',
                        inline: 'nearest'
                      });
                      //$('html, body').animate({
                      //scrollTop: $(`#present_id`).offset().top
                      // }, 1000);
 
                      break;
                    } else {
                      continue;
 
 
                      //elementy=document.getElementById(prev_id);
                      //elementy.scrollIntoView({ behavior: 'smooth', block: 'nearest',inline:'nearest'});
                      //elementy.scrollIntoView({ behavior: 'smooth', block: 'nearest',inline:'nearest'}); //$(this).hide();
                    }
                  }
 
                });
              }
 
 
              function graphtimeConvert(time) {
                var vid_div = vid_t / 20;
                var currenttime = parseInt(time) + vid_div;
                var totalsecsy = Math.floor(currenttime);
                var secs = Math.round(currenttime);
                var hours = Math.floor(secs / (60 * 60));
                var divisor_for_minutes = secs % (60 * 60);
                var minutes = Math.floor(divisor_for_minutes / 60);
                var divisor_for_seconds = divisor_for_minutes % 60;
                var seconds = Math.ceil(divisor_for_seconds);
                var zero = "0";
                if (hours < 10) {
                  var hour = hours.toString();
                  hour = zero.concat(hour);
                } else {
                  var hour = hours.toString();
                }
                if (minutes < 10) { //minutes=minutes+1;
                  var minute = minutes.toString();
                  minute = zero.concat(minute);
 
                } else { //minutes=minutes+1;
                  var minute = minutes.toString();
                }
                if (seconds < 10) {
                  var second = seconds.toString();
                  second = zero.concat(second);
                } else {
                  var second = seconds.toString();
                }
                var colon = ":";
                var timemin = hour.concat(colon, minute);
                return timemin;
              }
 
 
 
              function timeConvert(time) {
                var currenttime = parseInt(time);
                var totalsecsy = Math.floor(currenttime);
                var secs = Math.round(currenttime);
                var hours = Math.floor(secs / (60 * 60));
                var divisor_for_minutes = secs % (60 * 60);
                var minutes = Math.floor(divisor_for_minutes / 60);
                var divisor_for_seconds = divisor_for_minutes % 60;
                var seconds = Math.ceil(divisor_for_seconds);
                var zero = "0";
                if (hours < 10) {
                  var hour = hours.toString();
                  hour = zero.concat(hour);
                } else {
                  var hour = hours.toString();
                }
                if (minutes < 10) {
                  var minute = minutes.toString();
                  minute = zero.concat(minute);
                } else {
                  var minute = minutes.toString();
                }
                if (seconds < 10) {
                  var second = seconds.toString();
                  second = zero.concat(second);
                } else {
                  var second = seconds.toString();
                }
                var colon = ":";
                var timemin = hour.concat(colon, minute, colon, second);
                return timemin;
              }
 
 
            }
          </script>
          <li><button id="volinc" type="button"><img src="../../basic/images/volinc.png" height="25" width="25"></button></li>
          <li><button id="voldec" type="button"><img src="../../basic/images/voldec.png" height="25" width="25"></button></li>
          <li><button type="button" style="float: right;"><i class="fas fa-expand"></i></button></li>
        </div>
    </ul>
    <script type="text/javascript" src="../../basic/assets/js/videocontrols.js"></script>
    <div class="chatbox" id="mydiv">
      <div class="chatbox_upbar">
        <div class="dragarea" id="mydivheader">DragArea</div>
 
        <div class="btn not-active" id="ddb">
          <span style="background: black;height: 3.2px;"></span>
          <span style="background: black;height: 3.2px;"></span>
          <span style="background: black;height: 3.2px;"></span>
        </div>
 
        <div class="con" id="con">CHAT</div>
 
        <ul class="dropdownbox" id="dd">
          <li class="dd_opt" id="chat_b2">Chat</li>
          <li class="dd_opt" id="note_b2">Notes</li>
          <li class="dd_opt" id="profile">Profile</li>
        </ul>
 
        <div><select class="sort_method con" id="sort_method">
            <option value="1" id="Newest">Newest</option>
            <option value="2" id="sort">Timestamp</option>
          </select>
          <i class="fas fa-caret-down " style="left: 55%;top: 1vh;position: absolute;"></i>
        </div>
        <div id="mouseover" class="mouseover"></div>
      </div>
      <div class="chatbox_midbar" id="bg">
        <div class="chatarea">
 
 
          <div class="main3" id="main3">
            <h4 class="contenty" id="log"> Hi <?php echo ($_SESSION['signuser']); ?>, your account is created successfully,please login to add notes and comment</h4>
          </div>
          <div class="main4" id="main4">
            <h4 class="contenty"> Please Login to Add Notes</h4>
          </div>
 
 
           <div class="main8" id="main8">Your profile<br>
            Name:<?php echo ($_SESSION['loginname']); ?><br>
              <?php
    $this_chatuser=$_SESSION['loginid'];
 
    $image_url="otp-php-registration/class/".$_SESSION['user_avatar'];
     ?>
    <img src="../../<?php echo($image_url);?>"  class="avatar" style="align-content: left;vertical-align: middle;width:50px;height: 50px;border-radius: 50%;">
    <br>
    Email:
    <?php
    echo ($_SESSION['loginemailid']);
    ?>
     <br>
 
 
            Username:<?php echo ($_SESSION['loginuser']); ?><br>
            Your role:<?php echo ($_SESSION['my_role']); ?><br>
            ID:<?php echo ($_SESSION['loginid']); ?><br>
          </div>
          <div class="main6" id="main6">
 
 
            <div class="displaya"></div>
            <div class="reactionhide" id="reactionhide">0</div>
            <button id="download">Download Notes</button>
 
 
 
            <?php //<textarea class="topic"  type="text" align="center" name="topic" placeholder="ADD TOPIC"></textarea>
?>
            <script src="../../basic/assets/js/jquery.js"></script>
 
            <script type="text/javascript">
              var btn = $('.btn');
 
              btn.on('click', function() {
                $(this).toggleClass('active');
                $(this).toggleClass('not-active');
              });
 
 
 
              function cross1(argument) {
 
              }
              $(document).ready(function() {
                var usery = document.querySelector('#phplogin').innerText;
                displaytopic(usery);
                //adding event listeners
                $("#login_button").click(function(argument) {
                  var login_time = timeConvert(document.getElementById("myVideo").currentTime);
                  var login_button = 1;
                  $.ajax({
                    url: "clickdata.php",
                    method: "POST",
                    data: {
                      login_button: 1,
                      login_time: login_time
                    },
                    success: function(d) {}
                  })
 
                });
 
                $("#mydivheader").click(function(argument) {
                  var drag_time = timeConvert(document.getElementById("myVideo").currentTime);
                  var drag_button = 1;
                  var one = document.querySelector("#mydivheader");
                  var coordinates = one.getBoundingClientRect();
                  var y = coordinates.top + " px";
                  var x = coordinates.left + " px";
 
                  $.ajax({
                    url: "clickdata.php",
                    method: "POST",
                    data: {
                      drag_button: 1,
                      drag_time: drag_time,
                      loginbool: loginbool,
                      x: x,
                      y: y
                    },
                    success: function(d) {}
                  })
 
                });
 
 
                $("#submitpost").click(function(argument) {
                  var current_reacty = document.getElementById("reactionhide").innerHTML;
                  var vid = document.getElementById("myVideo");
                  var usery = document.querySelector('#phplogin').innerText;
                  var topic = $(".topic").val();
                  var id = 0;
                  var currenttime = vid.currentTime;
                  var done = 1;
                  var totalsecsy = Math.floor(currenttime);
                  var secs = Math.round(currenttime);
                  var hours = Math.floor(secs / (60 * 60));
                  var divisor_for_minutes = secs % (60 * 60);
                  var minutes = Math.floor(divisor_for_minutes / 60);
                  var divisor_for_seconds = divisor_for_minutes % 60;
                  var seconds = Math.ceil(divisor_for_seconds);
                  var zero = "0";
                  if (hours < 10) {
                    var hour = hours.toString();
                    hour = zero.concat(hour);
                  } else {
                    var hour = hours.toString();
                  }
                  if (minutes < 10) {
                    var minute = minutes.toString();
                    minute = zero.concat(minute);
                  } else {
                    var minute = minutes.toString();
                  }
                  if (seconds < 10) {
                    var second = seconds.toString();
                    second = zero.concat(second);
                  } else {
                    var second = seconds.toString();
                  }
                  var colon = ":";
                  var timemin = hour.concat(colon, minute, colon, second);
 
 
                  load_comment();
                  $.ajax({
                    url: "clickdata.php",
                    method: "POST",
                    data: {
                      done: done,
                      id: id,
                      usery: usery,
                      timemin: timemin,
                      topic: topic
                    },
                    success: function(data) {}
                  })
 
                  function load_comment() {
                    $.ajax({
                      url: "ajaxy.php",
                      method: "POST",
                      data: {
                        done: done,
                        id: id,
                        usery: usery,
                        timemin: timemin,
                        topic: topic,
                        totalsecsy: totalsecsy,
                        current_reacty: current_reacty
                      },
                      success: function(data) {
                        displaytopic(usery);
                        document.getElementById("reactionhide").innerHTML = "0";
                        document.getElementById("ilb").innerHTML = "+";
                        $('.topic').val('');
                      }
                    })
                  }
 
 
                });
                $("#download").click(function(argument) {
                  var download = 1;
                  $.ajax({
                    url: "ajaxy.php",
                    method: "POST",
                    data: {
                      download: 1,
                      usery: usery
                    },
                    success: function(d) {
                      urldownload = "http://localhost:<?php echo ($appache_localhost_port); ?><?php echo ($folder); ?>ajaxy.php?display=1&usery=" + usery; //............This you may have to change
                      window.location.href = urldownload;
                    }
                  })
 
 
                });
 
              });
 
              function displaytopic(usery) {
                var display = 1;
                $.ajax({
                  url: "ajaxy.php",
                  method: "POST",
                  data: {
                    display: 1,
                    usery: usery
                  },
                  success: function(d) {
                    $(".displaya").html(d);
                  }
                })
 
              }
            </script>
 
 
          </div>
          <!-- chat starts from here -->
          <div class="main7" id="main7">
            <div class="displayb" id="displayb"></div>
 
            <script type="text/javascript">
              $(document).ready(function() {
                var myvid = document.getElementById("myVideo");
                myvid.oncanplay = function() {
                  var vid_len = document.getElementById('myVideo').duration;
                  var x = 1;
                  load_graph();
 
                  function load_graph() {
                    $.ajax({
                      url: "x.php",
                      method: "POST",
                      data: {
                        x: x,
                        vid_len: vid_len
 
                      },
                      success: function(d) {
 
                        $(".data").html(d);
                      }
                    })
                  }
 
 
 
                };
 
 
 
                var usery = document.querySelector('#phplogin').innerText;
                displaychat(usery);
 
                //setInterval(function(){displaytopic();}, 1000);
                var displaytimechat = 0;
                //setInterval(function(){displaytopic();}, 1000);
                function show() {
                  // get selected value and store it in val
                  var val = document.getElementsByTagName('select')[0].value;
                  // show selected value
                  if (val == 2) {
                    var timestamp_time = timeConvert(document.getElementById('myVideo').currentTime);
                    $.ajax({
                      url: 'clickdata.php',
                      method: "POST",
                      data: {
                        timestamp_time: timestamp_time,
                        Timestamp: 1,
                        loginbool: loginbool
                      },
                      success: function(d) {
 
                      }
                    });
                    displaytimechat();
                    var vid = document.getElementById("myVideo");
 
 
 
                    vid.ontimeupdate = function() {
                      myFunction()
                    };
 
                    function myFunction() {
                      var showtime = Math.floor(vid.currentTime);
                      // Display the current position of the video in a p element with id="demo"
                      var secs = Math.round(vid.currentTime);
                      var hours = Math.floor(secs / (60 * 60));
                      var divisor_for_minutes = secs % (60 * 60);
                      var minutes = Math.floor(divisor_for_minutes / 60);
                      var divisor_for_seconds = divisor_for_minutes % 60;
                      var seconds = Math.ceil(divisor_for_seconds);
                      var zero = "0";
                      if (hours < 10) {
                        var hour = hours.toString();
                        hour = zero.concat(hour);
                      } else {
                        var hour = hours.toString();
                      }
                      if (minutes < 10) {
                        var minute = minutes.toString();
                        minute = zero.concat(minute);
                      } else {
                        var minute = minutes.toString();
                      }
                      if (seconds < 10) {
                        var second = seconds.toString();
                        second = zero.concat(second);
                      } else {
                        var second = seconds.toString();
                      }
                      var colon = ":";
                      var time_show = hour.concat(colon, minute, colon, second);
 
                      if (time_show == "00:00:00") {
                        elementy = document.getElementById("0");
 
                        elementy.scrollIntoView({
                          behavior: 'smooth',
                          block: 'nearest',
                          inline: 'nearest'
                        });
 
                      }
                      search_table(time_show);
 
 
                      function search_table(value) {
                        $('.comment_display').each(function() {
                          var found = 'false';
                          var present_id, prev_id, elementy;
 
                          $(this).each(function() {
 
                            if ($(this).text().indexOf(value) >= 0) {
                              found = 'true';
                            }
                          });
                          if (found == 'true') {
                            prev_id = present_id;
 
                            $(this).show();
                            present_id = $(this).attr("id");
                            elementy = document.getElementById(present_id);
                            elementy.scrollIntoView({
                              behavior: 'smooth',
                              block: 'nearest',
                              inline: 'nearest'
                            });
                            //$('html, body').animate({
                            //scrollTop: $(`#present_id`).offset().top
                            // }, 1000);
 
                          } else {
 
 
                            //elementy=document.getElementById(prev_id);
                            //elementy.scrollIntoView({ behavior: 'smooth', block: 'nearest',inline:'nearest'});
                            //elementy.scrollIntoView({ behavior: 'smooth', block: 'nearest',inline:'nearest'}); //$(this).hide();
                          }
                        });
                      }
 
 
 
 
 
 
                    }
 
 
                    function displaytimechat() {
                      var displaytimechat = 1;
                      $.ajax({
                        url: "ajaxy.php",
                        method: "POST",
                        data: {
                          displaytimechat: 1
                        },
                        success: function(d) {
                          $(".displayb").html(d);
                        }
                      })
 
                    }
                  }
 
 
                  if (val == 1) {
                    displaychat();
                    var newest_time = timeConvert(document.getElementById('myVideo').currentTime);
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
                }
                //now, you can invoke show() method as per your requirement.
                document.getElementsByTagName('select')[0].addEventListener('change', function() {
                  show();
                });
 
 
                $("#submitposty").click(function(argument) {
 
                  var current_react = document.getElementById("reactionhide").innerHTML;
                  var vid = document.getElementById("myVideo");
                  var usery = document.querySelector('#phplogin').innerText;
                  var topicy = $(".topicy").val();
                  var id = 0;
                  var currenttimey = vid.currentTime;
                  var doney = 1;
                  var totalsecs = Math.floor(currenttimey);
                  var secs = Math.round(currenttimey);
                  var hours = Math.floor(secs / (60 * 60));
                  var divisor_for_minutes = secs % (60 * 60);
                  var minutes = Math.floor(divisor_for_minutes / 60);
                  var divisor_for_seconds = divisor_for_minutes % 60;
                  var seconds = Math.ceil(divisor_for_seconds);
                  var zero = "0";
                  var login_ID="<?php echo ($_SESSION['loginid']); ?>";
 
                  if (hours < 10) {
                    var hour = hours.toString();
                    hour = zero.concat(hour);
                  } else {
                    var hour = hours.toString();
                  }
                  if (minutes < 10) {
                    var minute = minutes.toString();
                    minute = zero.concat(minute);
                  } else {
                    var minute = minutes.toString();
                  }
                  if (seconds < 10) {
                    var second = seconds.toString();
                    second = zero.concat(second);
                  } else {
                    var second = seconds.toString();
                  }
                  var colon = ":";
                  var timeminy = hour.concat(colon, minute, colon, second);
 
 
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
                        login_ID:login_ID
 
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
                $.ajax({
                  url: "ajaxy.php",
                  method: "POST",
                  data: {
                    displaychat: 1,
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
          <div class="chatarea_btn" id="chat_b" >Chat</div>
          <div class="pnotes_btn" id="note_b">Notes</div>
        </div>
        <div class="chatbox_downbar" id="log">
          <button class='login3' style="display: none;" onclick='logClick()'>Login</button>
          <ul class="insight_list" id="il">
            <li class="reaction"><img src="../../basic/images/1.png" class="react"></li>
            <li class="reaction"><img src="../../basic/images/2.png" class="react"></li>
            <li class="reaction"><img src="../../basic/images/3.png" class="react"></li>
            <li class="reaction"><img src="../../basic/images/4.png" class="react"></li>
            <li class="reaction"><img src="../../basic/images/5.png" class="react"></li>
          </ul>
          <span style="display:<?php echo (isset($_SESSION['loginname'])) ? 'block' : 'none'; ?>">
            <div class="comment_insight" id="ilb">+</div>
            <input class="commentarea topicy" type="text" required="required" name="comment" placeholder="Comment here" style="display:block">
            <button class="post_btn submitposty" id="submitposty" type="submit"><i class="fas fa-location-arrow"></i></button>
            <input class="commentarea topic" type="text" required="required" name="comment" placeholder="Comment here" style="display:none">
            <button class="post_btn submitpost" id="submitpost" type="submit" style="display:none"><i class="fas fa-location-arrow" ></i></button>
        </div>
        </span>
      </div>
    </div>
 
 
    <script type="text/javascript">
      var ind = document.getElementById("indicator");
      var chat = document.getElementById("chat_b");
      var note = document.getElementById("note_b");
      var bg = document.getElementById("bg");
      var con = document.getElementById("con");
      var ddb = document.getElementById("ddb");
      var dd = document.getElementById("dd");
      var chat2 = document.getElementById("chat_b2");
      var note2 = document.getElementById("note_b2");
      var log = document.getElementById("log");
      var sign = document.getElementById("sign");
      var profile = document.getElementById("profile");
      var il = document.getElementById("il");
      var ilb = document.getElementById("ilb");
      var react = document.getElementsByClassName("react");
      var userbool = document.getElementById("php").innerHTML;
      var user = document.getElementById("phpname").innerHTML;
      var loginuser = document.getElementById("phplogin").innerHTML;
      var loginbool = document.getElementById("loginbool").innerHTML;
      var c_btn = document.getElementById("submitposty");
      var n_btn = document.getElementById("submitpost");
      var c_in = document.getElementsByClassName("topicy")[0];
      var n_in = document.getElementsByClassName("topic")[0];
      var mover = document.getElementById("mouseover");
      var Bg = document.getElementsByClassName('chatarea')[0];
      var log_second = document.getElementsByClassName('login3')[0];
      var freeze_btn = document.getElementById("freeze");
      var body = document.getElementsByTagName("body")[0];
      var cis = document.getElementsByClassName('chatarea')[0];
 
      if (loginuser == "empty1") {
        alert("Wrong Email ID Or Password");
        document.getElementById('login_but').innerHTML="Login";
        document.getElementById('login_but').href="<?php echo ($url_h . $appache_localhost_port . "/Moodle_Plugin/basic/login_page.php") ?>";
      }
      if (loginuser != "empty1" && loginbool == "1") {
 
              document.getElementById('login_but').innerHTML="Logout";
              document.getElementById('login_but').href="<?php echo ($url_h . $appache_localhost_port . "/Moodle_Plugin/basic/logout.php") ?>";
 
 
      }
 
 
      mover.addEventListener('mouseover', function() {
        if (dd.style.opacity == "1") {
          dd.style.opacity = "0";
          dd.style.transform = "translateY(-10px)";
          dd.style.display = "none";
          chat2.style.display = 'none';
          note2.style.display = 'none';
 
          profile.style.display = 'none';
          mover.style.display = 'none';
        }
      });
 
      //<br>
      //<b>Notice</b>:  Undefined index: user in <b>C:\MAMP\htdocs\Webdevpro-master\load.php</b> on line <b>115</b><br>
 
      chat.onclick = function() {
        var event = "Select_Chat";
        var videotime = timeConvert(document.getElementById("myVideo").currentTime);
        $.ajax({
          url: "clickdata.php",
          method: "POST",
          data: {
            event: event,
            loginbool: loginbool,
            videotime: videotime
 
          },
          success: function(data) {}
        });
        ind.style.background = "#f0f5ff";
        bg.style.background = "#f0f5ff";
        con.innerHTML = "CHAT";
        dd.style.opacity = "0";
        dd.style.transform = "translateY(-10px)";
        dd.style.display = "none";
        document.getElementsByClassName("chatbox_downbar")[0].style.pointerEvents = "all";
 
 
        document.getElementById("main3").style.display = 'none';
        document.getElementById("main4").style.display = 'none';
 
        document.getElementById("main6").style.display = 'none';
        document.getElementById("main7").style.display = 'block';
        document.getElementById("main8").style.display = 'none';
        document.getElementById("sort_method").style.display = "block";
        chat2.style.display = 'none';
        note2.style.display = 'none';
 
        profile.style.display = 'none';
        mover.style.display = 'none';
 
        Bg.style.background = "#f0f5ff";
        if (loginbool != "1" || loginuser == "empty1") {
          log_second.style.display = 'block';
        }
        if (loginbool == "1" && loginuser != "empty1") {
          n_btn.style.display = 'none';
          n_in.style.display = 'none';
          c_btn.style.display = 'block';
          c_in.style.display = 'block';
          ilb.style.display = 'block';
        }
      }
      profile.onclick = function() {
        var event = "Select_Profile";
        var videotime = timeConvert(document.getElementById("myVideo").currentTime);
        $.ajax({
          url: "clickdata.php",
          method: "POST",
          data: {
            event: event,
            loginbool: loginbool,
            videotime: videotime
 
          },
          success: function(data) {}
        });
        ind.style.background = "#f0f5ff";
        bg.style.background = "#f0f5ff";
        con.innerHTML = "PROFILE";
        dd.style.opacity = "0";
        dd.style.transform = "translateY(-10px)";
        dd.style.display = "none";
        document.getElementsByClassName("chatbox_downbar")[0].style.pointerEvents = "all";
 
 
        document.getElementById("main4").style.display = 'none';
        document.getElementById("main3").style.display = 'none';
 
        document.getElementById("main7").style.display = 'none';
        document.getElementById("main8").style.display = 'block';
        document.getElementById("sort_method").style.display = "none";
        chat2.style.display = 'none';
        note2.style.display = 'none';
 
        profile.style.display = 'none';
        mover.style.display = 'none';
 
        Bg.style.background = "white";
        if (loginbool != "1" || loginuser == "empty1") {
          log_second.style.display = 'block';
        }
        if (loginbool == "1" && loginuser != "empty1") {
          n_btn.style.display = 'none';
          n_in.style.display = 'none';
          c_btn.style.display = 'none';
          c_in.style.display = 'none';
          ilb.style.display = 'none';
        }
      }
      note.onclick = function() {
        var event = "Select_Note";
        var videotime = timeConvert(document.getElementById("myVideo").currentTime);
        $.ajax({
          url: "clickdata.php",
          method: "POST",
          data: {
            event: event,
            loginbool: loginbool,
            videotime: videotime
 
          },
          success: function(data) {}
        });
        ind.style.background = "#f0f5ff";
        bg.style.background = "#f0f5ff";
        con.innerHTML = "NOTES";
        dd.style.opacity = "0";
        dd.style.transform = "translateY(-10px)";
        dd.style.display = "none";
        document.getElementsByClassName("chatbox_downbar")[0].style.pointerEvents = "all";
 
 
        document.getElementById("main4").style.display = 'none';
        document.getElementById("main3").style.display = 'none';
 
        document.getElementById("main7").style.display = 'none';
        document.getElementById("main8").style.display = 'none';
        document.getElementById("sort_method").style.display = "block";
        chat2.style.display = 'none';
        note2.style.display = 'none';
 
        profile.style.display = 'none';
        mover.style.display = 'none';
 
        Bg.style.background = "#f0f5ff";
        document.getElementById("main6").style.display = 'block';
        if (loginbool != "1" || loginuser == "empty1") {
 
          //document.getElementsByClassName("chatbox_downbar")[0].style.display='none';
          log_second.style.display = 'block';
          document.getElementById("main4").style.display = 'block';
          document.getElementById("main6").style.display = 'none';
        }
        if (loginbool == "1" && loginuser != "empty1") {
          n_btn.style.display = 'block';
          n_in.style.display = 'block';
          c_btn.style.display = 'none';
          c_in.style.display = 'none';
          ilb.style.display = 'block';
        }
      }
      ddb.onclick = function() {
        if (dd.style.opacity == "1") {
          dd.style.opacity = "0";
          dd.style.transform = "translateY(-10px)";
          dd.style.display = "none";
          chat2.style.display = 'none';
          note2.style.display = 'none';
 
          profile.style.display = 'none';
          mover.style.display = 'none';
 
        } else {
          dd.style.opacity = "1";
          dd.style.transform = "translateY(0)";
          dd.style.display = "block";
          chat2.style.display = 'block';
          note2.style.display = 'block';
 
          if (loginuser != "empty1" && loginbool == "1") {
            profile.style.display = 'block';
          } else {
            profile.style.display = 'none';
          }
 
          mover.style.display = 'block';
 
 
 
        }
      }
      chat2.onclick = chat.onclick;
      note2.onclick = note.onclick;
 
      ilb.onclick = function() {
        if (il.style.opacity == "0") {
          il.style.opacity = "1";
          il.style.display = "block";
        } else {
          il.style.opacity = "0";
          il.style.display = "none";
        }
      }
 
      react[0].onclick = function() {
        ilb.innerHTML = "<img src='" + react[0].src + "' >";
        il.style.opacity = "0";
        il.style.display = "none";
        document.getElementById("reactionhide").innerHTML = "1";
      }
      react[1].onclick = function() {
        ilb.innerHTML = "<img src='" + react[1].src + "' >";
        il.style.opacity = "0";
        il.style.display = "none";
        document.getElementById("reactionhide").innerHTML = "2";
      }
      react[2].onclick = function() {
        ilb.innerHTML = "<img src='" + react[2].src + "' >";
        il.style.opacity = "0";
        il.style.display = "none";
        document.getElementById("reactionhide").innerHTML = "3";
 
      }
      react[3].onclick = function() {
        ilb.innerHTML = "<img src='" + react[3].src + "' >";
        il.style.opacity = "0";
        il.style.display = "none";
        document.getElementById("reactionhide").innerHTML = "4";
      }
      react[4].onclick = function() {
        ilb.innerHTML = "<img src='" + react[4].src + "' >";
        il.style.opacity = "0";
        il.style.display = "none";
        document.getElementById("reactionhide").innerHTML = "5";
      }
      react[5].onclick = function() {
        ilb.innerHTML = "<img src='" + react[5].src + "' >";
        il.style.opacity = "0";
        il.style.display = "none";
        document.getElementById("reactionhide").innerHTML = "6";
      }
      var ifield = document.getElementsByClassName('commentarea');
 
      ifield[0].addEventListener('keypress', (event) => {
        if (event.which == 13) {
          console.log("Success");
 
          $('#submitposty').trigger("click");
 
 
        }
      });
      ifield[1].addEventListener('keypress', (event) => {
        if (event.which == 13) {
          console.log("Success");
 
          $('#submitpost').trigger("click");
        }
      });
      freeze_btn.onclick = () => {
        if (body.style.overflowY == "scroll") {
          body.style.overflowY = "hidden";
          freeze_btn.innerHTML = "unfreeze";
          freeze_btn.style.background = "green";
        } else {
          body.style.overflowY = "scroll";
          freeze_btn.innerHTML = "freeze";
          freeze_btn.style.background = "red";
        }
      }
    </script>
 
 
 
    <!-- Scripts -->
    <!--    <script src="../../basic/assets/js/jquery.min.js"></script>
      <script src="../../basic/assets/js/skel.min.js"></script>
      <script src="../../basic/assets/js/util.js"></script>
      <script src="../../basic/assets/js/main.js"></script> -->
    <!-- <script src="../../basic/assets/js/drag.js"></script> !-->
 
    <script src="../../basic/assets/js/drag.js"></script>
    <script src="../../basic/assets/js/jquery.js"></script>
    <script src='../../basic/assets/js/javascript.js'></script>
    <!--      <script src="../../basic/assets/videojs.chapter-thumbnails.min.js"></script>
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> -->
    <script src="../../basic/assets/js/vidcha.js"></script>
    <script src="../../basic/assets/dist/plyr.js"></script>
 
    <?php 
$user_roll=$_SESSION['loginroll'];
$anwsered_check="SELECT * FROM `score` WHERE `user_roll_no`='$user_roll' and `video_name`='$db' ";
$link_users=new mysqli(
   $host,
   $user,
   $password,'users'
);
$result = $link_users->query($anwsered_check);
?>
<script type="text/javascript">
  console.log("<?php print_r($result);?>");
</script>
<?php
if (!($result->num_rows > 0)) {
?>
<script>var answerMatrix = {};var questionTimeArray = [];</script>
      <?php
$x = 1;
$questions = mysqli_query($link, "SELECT * FROM `question` ");
$qno = mysqli_num_rows($questions);
while ($question = mysqli_fetch_array($questions)) {
    ?>
        <div class="questionbox_container" id="qc<?php echo $x ?>" style="display: none;">
          <div id="questionbox" class="questionbox">
            <div class="questionbox_header"><?php echo $question['question'] ?></div>
            <?php
$opts = explode("**", $question['options']);
    ?>
            <div class="questionbox_options_container">
              <div class="questionbox_option_container">
                <input class="q<?php echo $x ?>" type="radio" id="<?php echo $opts[0] ?>" name="answer" value="1">
                <label for="<?php echo $opts[0] ?>"><?php echo $opts[0] ?></label>
              </div>
              <div class="questionbox_option_container">
                <input class="q<?php echo $x ?>" type="radio" id="<?php echo $opts[1] ?>" name="answer" value="2?>">
                <label for="<?php echo $opts[1] ?>"><?php echo $opts[1] ?></label>
              </div>
            </div>
            <div class="questionbox_options_container">
              <div class="questionbox_option_container">
                <input class="q<?php echo $x ?>" type="radio" id="<?php echo $opts[2] ?>" name="answer" value="3">
                <label for="<?php echo $opts[2] ?>"><?php echo $opts[2] ?></label>
              </div>
              <?php if ($opts[3] != "null") {?>
              <div class="questionbox_option_container">
                <input class="q<?php echo $x ?>" type="radio" id="<?php echo $opts[3]; ?>" name="answer" value="4">
                <label for="<?php echo $opts[3] ?>"><?php echo $opts[3]; ?></label>
              </div>
              <?php }?>
            </div>
            <button class="questionbox_submit_btn" id="sbtn<?php echo $x; ?>" type="submit">Submit</button>
          </div>
        </div>
        <script>
          questionTimeArray.push({timestamp:<?php echo $question['timestamp']; ?>, isanswered: false})
          var abc<?php echo $x ?> = setInterval(() => {console.log(Math.floor(vid.currentTime));
            if ("<?php echo $question['timestamp']; ?>" == Math.floor(vid.currentTime)){
              vid.pause();
            document.getElementById('qc<?php echo $x ?>').style.display = "block";
          }
 
          }, 1000);
          document.getElementById('sbtn<?php echo $x ?>').onclick = () => {
            document.getElementById('qc<?php echo $x ?>').style.display = "none";
            clearInterval(abc<?php echo $x ?>);
            vid.play();
            answerMatrix['qno'] = <?php echo $qno ?>;
            answerMatrix['user_Roll_no'] = "<?php echo $_SESSION['loginroll']; ?>";
            answerMatrix['course_name']="<?php echo $users_db; ?>";
            answerMatrix['video_name']="<?php echo $db; ?>";
            answerMatrix['user'] = "<?php echo $_SESSION['loginuser']; ?>";
 
 
            for(var i = 0; i < 4; i++){
              if (document.getElementsByClassName("q<?php echo $x ?>")[i].checked){
                answerMatrix['ans<?php echo $x ?>'] = document.getElementsByClassName("q<?php echo $x ?>")[i].value;
                questionTimeArray[<?php echo $x - 1 ?>].isanswered = true;
              }
            }
            if ("<?php echo $x ?>" == "<?php echo $qno ?>" ){
              $.ajax({
                  url:"../../basic/calculateScore.php",
                  method:"POST",
                  data:answerMatrix,
                  success:function(data)
                  {console.log(answerMatrix);
                  }
                });
            }
          }
        </script>
        <?php
$x++;
}
?>
<script>vid.ontimeupdate = function(){
  var currentUpdateTime = vid.currentTime;
  for(var i = 0; i < answerMatrix['qno']; i++ ){
    if(currentUpdateTime > questionTimeArray[i].timestamp && !questionTimeArray[i].isanswered){
      vid.currentTime = questionTimeArray[i].timestamp;
      vid.pause()
      document.getElementById('qc'+(i+1)).style.display = "block";
    }
  }
}</script>
 
<?php } ?>
 
 
    <script>
      MyObject = {
    play:function (letbool) {
              var vid_curenttimesecond = player.currentTime;
 
              var vid_curenttime = timeConvert(vid_curenttimesecond);
              var play = 0;
              var pause = 0;
              var playpause = 1;
              var loginbool = document.getElementById("loginbool").innerHTML;
 
              if (letbool) {
                play = 1;
 
 
              } else {
                pause = 1;
 
              }
              $.ajax({
                url: "clickdata.php",
                method: "POST",
                data: {
                  playpause: playpause,
                  play: play,
                  pause: pause,
                  vid_curenttime: vid_curenttime,
                  loginbool: loginbool
                },
                success: function(data) {}
              })
 
            },
    timeConvert: function(time) {
 
                var currenttime = parseInt(time);
                var totalsecsy = Math.floor(currenttime);
                var secs = Math.round(currenttime);
                var hours = Math.floor(secs / (60 * 60));
                var divisor_for_minutes = secs % (60 * 60);
                var minutes = Math.floor(divisor_for_minutes / 60);
                var divisor_for_seconds = divisor_for_minutes % 60;
                var seconds = Math.ceil(divisor_for_seconds);
                var zero = "0";
                if (hours < 10) {
                  var hour = hours.toString();
                  hour = zero.concat(hour);
                } else {
                  var hour = hours.toString();
                }
                if (minutes < 10) {
                  var minute = minutes.toString();
                  minute = zero.concat(minute);
                } else {
                  var minute = minutes.toString();
                }
                if (seconds < 10) {
                  var second = seconds.toString();
                  second = zero.concat(second);
                } else {
                  var second = seconds.toString();
                }
                var colon = ":";
                var timemin = hour.concat(colon, minute, colon, second);
                return timemin;
              },
    onvolumechange: function() {
              var volumechange = 1;
              var vid_curenttime = timeConvert(player.currentTime);
              var volume = player.volume;
 
              if (player.muted==true) {
               var mute = 1;
              }
              $.ajax({
                url: "clickdata.php",
                method: "POST",
                data: {
                  volumechange: volumechange,
                  vid_curenttime: vid_curenttime,
                  loginbool: loginbool,
                  volume: volume,
                  mute: mute
                },
                success: function(data) {}
              })
            }
 
    // other functions...
}
      const player = new Plyr('#myVideo');
 
      player.on('playing', play => {
      const instance = play.detail.plyr;
 
});
      player.on('pause', pause => {
        console.log('pause');
        console.log(player.currentTime);
        MyObject.play(false);
});
      player.on('play', play => {
        console.log('play');
        console.log(player.currentTime);
        MyObject.play(true);
         });
 
      player.on('volumechange', volumechange => {
        console.log('volumechange');
        console.log(player.currentTime);
        MyObject.onvolumechange();
         });
      player.on('seeking', seeking => {
        console.log('seeking');
        console.log(MyObject.timeConvert(player.currentTime));
 
         });
      player.on('seeked', seeked => {
        console.log('seeked');
        console.log(MyObject.timeConvert(player.currentTime));
 
         });
 
 
      // const player = videojs('myVideo');
      // videojs('myVideo').chapter_thumbnails({
      //   src: 'chapters/video1.webvtt'});
    </script>
 
 
</body>
 
</html>
 
