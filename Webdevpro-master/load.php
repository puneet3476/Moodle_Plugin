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
	<link href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@1,500&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/chatbox.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/videocontrols.css">
	<link rel='stylesheet' type='text/css' href='assets/css/player.css' />

	<script src="assets/js/jquery.js"></script>
	<script src='assets/js/javascript.js'></script>

	

</head>

<body style="overflow-y: scroll;">


	
	<header id="header">
		<div class="inner">
			<a href="index.html" class="logo">Annoto</a>
			<nav id="nav">
				<a href="load.php">Home</a>
				<a href="generic.html">Edtech</a>
				<a href="generic.html">Corporate</a>
				<a href="generic.html">Portals</a>
				<a href="generic.html">About us</a>
				<button id="myBtn" class="button alt">Request a demo</button>
				<button id="freeze" class="button" style="background: red;">Freeze</button>
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
	<div class="container">

		<video id="myVideo" width="600" height="355">
			<source src="videos/video1.mp4" type="video/mp4">
		</video>

		<ul class="graph">
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
		<ul id="video-controls" class="controls" >
			<li class="progress">
				<progress id="progress" value="0" min="0">
					<span id="progress-bar"></span>
				</progress>
			</li>
			<li><button id="playpause" type="button"><img src="images/play_pause.png" height="25" width="25" onClick="play()"></button></li>
			<li><button id="stop" type="button"><img src="images/stop.png" height="25" width="25"></button></li>
			<li><button id="mute" type="button"><img src="images/mute.svg" height="25" width="25"></button></li>
			<li class="positioner"></li>
			
			<script language="javascript" type="text/javascript">
				var fruits = [];
				<?php
				require 'connect.php';
				$resultchat = mysqli_query($link, "SELECT * FROM `chat` ");
				while ($rowchat = mysqli_fetch_array($resultchat)) {
				?>
					var temp = "<?php echo ($rowchat['second']) ?>";
					fruits.push(temp);




				<?php } ?>

				var vid = document.getElementById('myVideo');
				var vid_curenttime = document.getElementById('myVideo').currentTime;
				vid.onloadedmetadata = function() {
					document.getElementsByClassName("positioner")[0].innerHTML = timeConvert(vid.currentTime) + " / " + timeConvert(vid.duration);
				};
				setInterval(function() {
					document.getElementsByClassName("positioner")[0].innerHTML = timeConvert(vid.currentTime) + " / " + timeConvert(vid.duration);
				}, 1000);

				//vid.ontimeupdate = function() {myFunction()};


				/*function myFunction() {var seta=1;
					var vid_alltime=timeConvert(document.getElementById('myVideo').currentTime);
					$.ajax({
							url:"ajaxy1.php",
						    method:"POST",
						    data:{       
						 vid_alltime:vid_alltime,
						 seta:seta
						 
						    },
						    success:function(data)
						    {
						    }
						   })} */
				// Display the current position of the video in a p element with id="demo"


				vid.onseeked = function() {
					var vid_curenttimesecond = document.getElementById('myVideo').currentTime;
					var vid_curenttime = timeConvert(vid_curenttimesecond);
					var video_timeline_click = 1;
					$.ajax({
						url: "clickdata.php",
						method: "POST",
						data: {
							video_timeline_click: video_timeline_click,
							vid_curenttime: vid_curenttime,
							loginbool: loginbool
						},
						success: function(data) {}
					})
				}
				var letbool = false;

				function play() {
					var vid_curenttimesecond = document.getElementById('myVideo').currentTime;
					var vid_curenttime = timeConvert(vid_curenttimesecond);
					var play = 0;
					var pause = 0;
					var playpause = 1;
					var loginbool = document.getElementById("loginbool").innerHTML;
					letbool = !letbool;
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

				}


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

					var bar_click = 1;
					$.ajax({
						url: "clickdata.php",
						method: "POST",
						data: {
							bar_click: bar_click,
							count: count,
							vid_prevtime: vid_prevtime,
							vid_curenttime: vid_curenttime,
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
			<li style="margin-left:4.5em;"><button id="volinc" type="button" ><img src="images/volinc.png" height="25" width="25" ></button></li>
			<li ><button id="voldec" type="button" ><img src="images/voldec.png" height="25" width="25"></button></li>

		</ul>
		
		<div class="main5" id="main5" style="display:none;">
			<img src="images/cross.png" class="cross" onclick="cross1()">
			<form class="form1" action="logout.php" method="POST">
				We would like to take a survey before you logout:
				<p class="mnone">The quality of our brand</p>
				<input class="logout_radio" type="radio" id="very satisfied logout" name="gender" value="very satisfied">
				<label for="very satisfied logout">very satisfied</label>
				<input class="logout_radio" type="radio" id="satisfied logout" name="gender" value="satisfied">
				<label for="satisfied logout">satisfied</label>
				<input class="logout_radio" type="radio" id="neutral logout" name="gender" value="neutral">
				<label for="neutral logout">neutral</label>
				<input class="logout_radio" type="radio" id="unsatisfied logout" name="gender" value="unsatisfied">
				<label for="unsatisfied logout">unsatisfied</label>
				<input class="logout_radio" type="radio" id="very unsatisfied logout" name="gender" value="very unsatisfied">
				<label for="very unsatisfied logout">very unsatisfied</label>
				<p class="mnone">The prices we offer</p>
				<input class="logout_radio" type="radio" id="very satisfied1 logout" name="gender1" value="very satisfied">
				<label for="very satisfied1 logout">very satisfied</label>
				<input class="logout_radio" type="radio" id="satisfied1 logout" name="gender1" value="satisfied">
				<label for="satisfied1 logout">satisfied</label>
				<input class="logout_radio" type="radio" id="neutral1 logout" name="gender1" value="neutral">
				<label for="neutral1 logout">neutral</label>
				<input class="logout_radio" type="radio" id="unsatisfied1 logout" name="gender1" value="unsatisfied">
				<label for="unsatisfied1 logout">unsatisfied</label>
				<input class="logout_radio" type="radio" id="very unsatisfied1 logout" name="gender1" value="very unsatisfied">
				<label for="very unsatisfied1 logout">very unsatisfied</label>
				<p class="mnone">The speed of service we provide</p>
				<input class="logout_radio" type="radio" id="very satisfied2 logout" name="gender2" value="very satisfied">
				<label for="very satisfied2 logout">very satisfied</label>
				<input class="logout_radio" type="radio" id="satisfied2 logout" name="gender2" value="satisfied">
				<label for="satisfied2 logout">satisfied</label>
				<input class="logout_radio" type="radio" id="neutral2 logout" name="gender2" value="neutral">
				<label for="neutral2 logout">neutral</label>
				<input class="logout_radio" type="radio" id="unsatisfied2 logout" name="gender2" value="unsatisfied">
				<label for="unsatisfied2 logout">unsatisfied</label>
				<input class="logout_radio" type="radio" id="very unsatisfied2 logout" name="gender2" value="very unsatisfied">
				<label for="very unsatisfied2 logout">very unsatisfied</label>
				<p class="mnone">The customer support offered</p>
				<input class="logout_radio" type="radio" id="very satisfied3 logout" name="gender3" value="very satisfied">
				<label for="very satisfied3 logout">very satisfied</label>
				<input class="logout_radio" type="radio" id="satisfied3 logout" name="gender3" value="satisfied">
				<label for="satisfied3 logout">satisfied</label>
				<input class="logout_radio" type="radio" id="neutral3 logout" name="gender3" value="neutral">
				<label for="neutral3 logout">neutral</label>
				<input class="logout_radio" type="radio" id="unsatisfied3 logout" name="gender3" value="unsatisfied">
				<label for="unsatisfied3 logout">unsatisfied</label>
				<input class="logout_radio" type="radio" id="very unsatisfied3 logout" name="gender3" value="very unsatisfied">
				<label for="very unsatisfied3 logout">very unsatisfied</label>
				<button class="submit3" align="center" type="submit" name="submit">Logout</button>
			</form>


		</div>
		<div class="chatbox" id="mydiv" style="font-weight:500;">
			<div class="chatbox_upbar">
				<div class="dragarea" id="mydivheader">DragArea</div>
				<input type="checkbox" id="openmenu" class="hamburger-checkbox">
				<div class="hamburger-icon" id="ddb">
    				<label for="openmenu" id="hamburger-label">
	  					
      					<span></span>
     			 		<span></span>
   
    				</label>    
  				</div>
				<div class="con" id="con" style="left:3.4vw;top:0.1vh;">Chat</div>

				<ul class="dropdownbox" id="dd">
					<li class="dd_opt" id="chat_b2">Chat</li>
					<li class="dd_opt" id="note_b2">Notes</li>
					<li class="dd_opt" id="log">Login</li>
					<li class="dd_opt" id="sign">Sign Up</li>
					<li class="dd_opt" id="profile">Profile</li>
				</ul>

				<select class="sort_method" id="sort_method">
					<option value="1">Newest</option>
					<option value="2" id="sort">Timestamp</option>

				</select>
				<div id="mouseover" class="mouseover"></div>
			</div>
			<div class="chatbox_midbar" id="bg">
				<div class="chatarea">
					<div class="main1" id="main1">
						<p class="welcome">Please fill the following form:</p>
						<form class="form1" action="createaccount.php" method="POST">
							<input class="username" type="text" align="center" name="user" placeholder="USERNAME">
							<input class="username" type="text" align="center" name="realname" placeholder="Your Real Name">
							<p class="welcome">Choose your Role:</p>
							<select class="username" type="text" align="center" name="role" placeholder="Choose Role">
								<option value="Student">Student</option>
								<option value="Teacher">Teacher</option>
								<option value="Assistant">Assistant</option>
							</select>
							<input class="pass" type="password" align="center" name="pass" placeholder="PASSWORD">
							<button class="submit" align="center" type="submit" name="submit">Signup</button>
						</form>
					</div>
					<div class="main2" id="main2" style="display:none;">

						<p class="welcome">Please Login</p>
						<form class="form1" action="login.php" method="POST">
							<img src="images/cross.png" class="cross" onclick="cross()">
							We would like to take a survey before you login:
							<p class="mnone">The quality of our brand</p>
							<input type="radio" id="very satisfied" name="gender" value="very satisfied">
							<label for="very satisfied">very satisfied</label>
							<input type="radio" id="satisfied" name="gender" value="satisfied">
							<label for="satisfied">satisfied</label>
							<input type="radio" id="neutral" name="gender" value="neutral">
							<label for="neutral">neutral</label>
							<input type="radio" id="unsatisfied" name="gender" value="unsatisfied">
							<label for="unsatisfied">unsatisfied</label>
							<input type="radio" id="very unsatisfied" name="gender" value="very unsatisfied">
							<label for="very unsatisfied">very unsatisfied</label>
							<p class="mnone">The prices we offer</p>
							<input type="radio" id="very satisfied1" name="gender1" value="very satisfied">
							<label for="very satisfied1">very satisfied</label>
							<input type="radio" id="satisfied1" name="gender1" value="satisfied">
							<label for="satisfied1">satisfied</label>
							<input type="radio" id="neutral1" name="gender1" value="neutral">
							<label for="neutral1">neutral</label>
							<input type="radio" id="unsatisfied1" name="gender1" value="unsatisfied">
							<label for="unsatisfied1">unsatisfied</label>
							<input type="radio" id="very unsatisfied1" name="gender1" value="very unsatisfied">
							<label for="very unsatisfied1">very unsatisfied</label>
							<p class="mnone">The speed of service we provide</p>
							<input type="radio" id="very satisfied2" name="gender2" value="very satisfied">
							<label for="very satisfied2">very satisfied</label>
							<input type="radio" id="satisfied2" name="gender2" value="satisfied">
							<label for="satisfied2">satisfied</label>
							<input type="radio" id="neutral2" name="gender2" value="neutral">
							<label for="neutral2">neutral</label>
							<input type="radio" id="unsatisfied2" name="gender2" value="unsatisfied">
							<label for="unsatisfied2">unsatisfied</label>
							<input type="radio" id="very unsatisfied2" name="gender2" value="very unsatisfied">
							<label for="very unsatisfied2">very unsatisfied</label>
							<p class="mnone">The customer support offered</p>
							<input type="radio" id="very satisfied3" name="gender3" value="very satisfied">
							<label for="very satisfied3">very satisfied</label>
							<input type="radio" id="satisfied3" name="gender3" value="satisfied">
							<label for="satisfied3">satisfied</label>
							<input type="radio" id="neutral3" name="gender3" value="neutral">
							<label for="neutral3">neutral</label>
							<input type="radio" id="unsatisfied3" name="gender3" value="unsatisfied">
							<label for="unsatisfied3">unsatisfied</label>
							<input type="radio" id="very unsatisfied3" name="gender3" value="very unsatisfied">
							<label for="very unsatisfied3">very unsatisfied</label>
							<input class="username" type="text" align="center" name="user" placeholder="USERNAME">
							<input class="pass" type="password" align="center" name="pass" placeholder="PASSWORD">
							<button class="submit1" align="center" type="submit" name="submit">Login</button>
						</form>
					</div>
					<div class="main3" id="main3">
						<h4 class="contenty" id="log"> Hi <?php echo ($_SESSION['signuser']); ?>, your account is created successfully,please login to add notes and comment</h4>
					</div>
					<div class="main4" id="main4">
						<h4 class="contenty"> Please Login to Add Notes</h4>
					</div>


					<div class="main8" id="main8">Your profile<br>
						Name:<?php echo ($_SESSION['loginname']); ?><br>
						Username:<?php echo ($_SESSION['loginuser']); ?><br>
						Your role:<?php echo ($_SESSION['loginrole']); ?><br>
						ID:<?php echo ($_SESSION['loginid']); ?><br>
					</div>
					<div class="main6" id="main6">


						<div class="displaya"></div>
						<div class="reactionhide" id="reactionhide">0</div>
						<button id="download" style="font-size:0.7vw;border-radius: 12px;">Download Notes</button>



						<?php     //<textarea class="topic"  type="text" align="center" name="topic" placeholder="ADD TOPIC"></textarea>    
						?>
						<script type="text/javascript" src="jquery.js"></script>
						<script type="text/javascript">
							function cross(argument) {
								document.getElementById("main2").style.display = 'none';
							}

							function cross1(argument) {
								document.getElementById("main5").style.display = 'none';
							}
							$(document).ready(function() {
								var usery = document.querySelector('#phplogin').innerText;
								displaytopic(usery);
								//adding event listeners



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
											urldownload = "http://localhost/Moodle_Plugin/Webdevpro-master/ajaxy.php?display=1&usery=" + usery; //............This you may have to change
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
												current_react: current_react

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
											success: function(data) {
												alert('success');
											}
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
					<div class="chatarea_btn" id="chat_b">CHAT</div>
					<div class="pnotes_btn" id="note_b">NOTES</div>
				</div>
				<div class="chatbox_downbar" id="log">
					<button class='login3' style="display: none;" onclick='logClick()'>LOGIN</button>
					<ul class="insight_list" id="il">
						<li class="reaction"><img src="images/1.png" class="react"></li>
						<li class="reaction"><img src="images/2.png" class="react"></li>
						<li class="reaction"><img src="images/3.png" class="react"></li>
						<li class="reaction"><img src="images/4.png" class="react"></li>
						<li class="reaction"><img src="images/5.png" class="react"></li>
						<li class="reaction"><img src="images/6.png" class="react"></li>
					</ul>
					<div class="comment_insight" id="ilb">+</div>
					<input class="commentarea topicy" type="text" required="required" name="comment" placeholder="Comment here" style="display:block">
					<button class="post_btn submitposty" id="submitposty" type="submit" style="display:block">Submit</button>
					<input class="commentarea topic" type="text" required="required" name="comment" placeholder="Comment here" style="display:none">
					<button class="post_btn submitpost" id="submitpost" type="submit" style="display:none">Submit</button>

				</div>
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
				alert("Wrong Username Or Password");
			}
			if (loginuser != "empty1" && loginbool == "1") {
				log.innerHTML = "Logout";
			}

			if (loginbool != "1" || loginuser == "empty1") {
				//document.getElementsByClassName("chatbox_downbar")[0].style.display='none';
				document.getElementsByClassName("chatbox_downbar")[0].id = "log";
				log_second.style.display = 'block';
				n_btn.style.display = 'none';
				n_in.style.display = 'none';
				c_btn.style.display = 'none';
				c_in.style.display = 'none';
				ilb.style.display = 'none';

			}

			mover.addEventListener('mouseover', function() {
				if (dd.style.opacity == "1") {
					dd.style.opacity = "0";
					dd.style.transform = "translateY(-10px)";
					dd.style.display = "none";
					chat2.style.display = 'none';
					note2.style.display = 'none';
					log.style.display = 'none';
					sign.style.display = 'none';
					profile.style.display = 'none';
					mover.style.display = 'none';
				}
			});

			//<br>
			//<b>Notice</b>:  Undefined index: user in <b>C:\MAMP\htdocs\Webdevpro-master\load.php</b> on line <b>115</b><br>

			chat.onclick = function() {
				ind.style.background = "#95c2fd";
				bg.style.background = "#95c2fd";
				con.innerHTML = "Chat";
				dd.style.opacity = "0";
				dd.style.transform = "translateY(-10px)";
				dd.style.display = "none";
				document.getElementsByClassName("chatbox_downbar")[0].style.pointerEvents = "all";
				document.getElementById("main1").style.display = 'none';
				document.getElementById("main2").style.display = 'none';
				document.getElementById("main3").style.display = 'none';
				document.getElementById("main4").style.display = 'none';
				document.getElementById("main5").style.display = 'none';
				document.getElementById("main6").style.display = 'none';
				document.getElementById("main7").style.display = 'block';
				document.getElementById("main8").style.display = 'none';
				document.getElementById("sort_method").style.display = "block";
				chat2.style.display = 'none';
				note2.style.display = 'none';
				log.style.display = 'none';
				sign.style.display = 'none';
				profile.style.display = 'none';
				mover.style.display = 'none';

				Bg.style.background = "#95c2fd";
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
				ind.style.background = "#0465b5";
				bg.style.background = "#3966e3";
				con.innerHTML = "Profile";
				dd.style.opacity = "0";
				dd.style.transform = "translateY(-10px)";
				dd.style.display = "none";
				document.getElementsByClassName("chatbox_downbar")[0].style.pointerEvents = "all";
				document.getElementById("main1").style.display = 'none';
				document.getElementById("main2").style.display = 'none';
				document.getElementById("main4").style.display = 'none';
				document.getElementById("main3").style.display = 'none';
				document.getElementById("main5").style.display = 'none';
				document.getElementById("main7").style.display = 'none';
				document.getElementById("main8").style.display = 'block';
				document.getElementById("sort_method").style.display = "none";
				chat2.style.display = 'none';
				note2.style.display = 'none';
				log.style.display = 'none';
				sign.style.display = 'none';
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
				ind.style.background = "#0465b5";
				bg.style.background = "#3966e3";
				con.innerHTML = "Notes";
				dd.style.opacity = "0";
				dd.style.transform = "translateY(-10px)";
				dd.style.display = "none";
				document.getElementsByClassName("chatbox_downbar")[0].style.pointerEvents = "all";
				document.getElementById("main1").style.display = 'none';
				document.getElementById("main2").style.display = 'none';
				document.getElementById("main4").style.display = 'none';
				document.getElementById("main3").style.display = 'none';
				document.getElementById("main5").style.display = 'none';
				document.getElementById("main7").style.display = 'none';
				document.getElementById("main8").style.display = 'none';
				document.getElementById("sort_method").style.display = "block";
				chat2.style.display = 'none';
				note2.style.display = 'none';
				log.style.display = 'none';
				sign.style.display = 'none';
				profile.style.display = 'none';
				mover.style.display = 'none';

				Bg.style.background = "#95c2fd";
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
					log.style.display = 'none';
					sign.style.display = 'none';
					profile.style.display = 'none';
					mover.style.display = 'none';

				} else {
					dd.style.opacity = "1";
					dd.style.transform = "translateY(0)";
					dd.style.display = "block";
					chat2.style.display = 'block';
					note2.style.display = 'block';
					log.style.display = 'block';
					if (loginuser != "empty1" && loginbool == "1") {
						profile.style.display = 'block';
					} else {
						profile.style.display = 'none';
					}

					mover.style.display = 'block';
					if (log.innerHTML == "Login") {
						sign.style.display = 'block';
					} else {
						sign.style.display = 'none';
					}


				}
			}
			chat2.onclick = chat.onclick;
			note2.onclick = note.onclick;

			log.onclick = function() {
				if (loginuser != "empty1" && loginbool == "1") {
					con.innerHTML = "Logout";
				} else {
					con.innerHTML = "LogIn";
				}

				dd.style.opacity = "0";
				dd.style.transform = "translateY(-10px)";
				dd.style.display = "none";
				ind.style.background = "#6b07ff";
				bg.style.background = "#281740";
				document.getElementById("main1").style.display = 'none';
				document.getElementsByClassName("chatbox_downbar")[0].style.pointerEvents = "none";
				document.getElementById("main2").style.display = 'block';
				document.getElementById("main3").style.display = 'none';
				document.getElementById("main4").style.display = 'none';
				document.getElementById("main6").style.display = 'none';
				document.getElementById("main7").style.display = 'none';
				document.getElementById("main8").style.display = 'none';
				document.getElementById("sort_method").style.display = "none";

				chat2.style.display = 'none';
				note2.style.display = 'none';
				log.style.display = 'none';
				sign.style.display = 'none';
				profile.style.display = 'none';
				mover.style.display = 'none';

				Bg.style.background = "white";
				if (log.innerHTML == "Logout") {
					document.getElementById("main2").style.display = 'none';
					document.getElementById("main5").style.display = 'block';
				}
				log_second.style.display = 'none';
				if (loginbool == "1" && loginuser != "empty1") {
					n_btn.style.display = 'none';
					n_in.style.display = 'none';
					c_btn.style.display = 'none';
					c_in.style.display = 'none';
					ilb.style.display = 'none';
				}
			}
			var logClick = log.onclick;
			sign.onclick = function() {
				con.innerHTML = "Sign Up";
				dd.style.opacity = "0";
				dd.style.transform = "translateY(-10px)";
				dd.style.display = "none";
				ind.style.background = "#6b07ff";
				bg.style.background = "#281740";
				document.getElementById("main1").style.display = 'block';
				document.getElementsByClassName("chatbox_downbar")[0].style.pointerEvents = "none";
				document.getElementById("main2").style.display = 'none';
				document.getElementById("main4").style.display = 'none';
				document.getElementById("main5").style.display = 'none';
				document.getElementById("main6").style.display = 'none';
				document.getElementById("main7").style.display = 'none';
				document.getElementById("main8").style.display = 'none';
				document.getElementById("sort_method").style.display = "none";

				chat2.style.display = 'none';
				note2.style.display = 'none';
				log.style.display = 'none';
				sign.style.display = 'none';
				profile.style.display = 'none';
				mover.style.display = 'none';

				Bg.style.background = "white";
				if (userbool == "1") {
					document.getElementById("main3").style.display = 'block';
					document.getElementById("main1").style.display = 'none';
				}
				log_second.style.display = 'none';
				if (loginbool == "1" && loginuser != "empty1") {
					n_btn.style.display = 'none';
					n_in.style.display = 'none';
					c_btn.style.display = 'none';
					c_in.style.display = 'none';
					ilb.style.display = 'none';
				}
			}
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



		<div class="valueone">
			<header  style="margin-top:5vh;">
				<p style="position:relative;">Value Proposition</p>
			</header>
		</div>
		<div class="my_card">
			<div class="row">
				<div class="column">

					<div class="card">
						<h2>Learning Experience</h2>
						<p>
							Users can Q&A on specific moments in the video, mark keynotes and engage in discussion
						</p>
					</div>
				</div>
				<div class="column">
					<div class="card">.
						<h2>Call to Action</h2>
						<p>
							Create engaging quizzes and remarks at video keynotes
						</p>
					</div>
				</div>
				<div class="column">
					<div class="card">.
						<h2>Analytics and Insight</h2>
						<p>
							Discover how users interact with your video content and with each other. At what moments they are most engaged and where they struggle
						</p>
					</div>
				</div>
				<div class="column">
					<div class="card">
						<h2>Management Tools</h2>
						<p>
							Organization aware moderation and role based user access control
						</p>
					</div>
				</div>
			</div>
		</div>
		<div id="myModal" class="modal" data-backdrop="false">

			<div class="modal-content">
				<span class="close">&times;</span>
				<div class="container">
					<form id="contact" action="" method="post">
						<h3>Contact Us</h3>

						<fieldset>
							<input placeholder="Your name" type="text" tabindex="1" required>
						</fieldset>
						<fieldset>
							<input placeholder="Your Email Address" type="email" tabindex="2" required>
						</fieldset>
						<fieldset>
							<input placeholder="Your Phone Number (optional)" type="tel" tabindex="3" required>
						</fieldset>
						<fieldset>
							<input placeholder="Your Web Site (optional)" type="url" tabindex="4" required>
						</fieldset>
						<fieldset>
							<textarea placeholder="Type your message here...." tabindex="5" required></textarea>
						</fieldset>

						<fieldset>
							<button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Send Message</button>
						</fieldset>

					</form>
				</div>
			</div>

		</div>






		<footer class="footer-distributed">

			<div class="footer-left">
				<h3>Annoto</h3>

				<p class="footer-links">
					<a href="#">Home</a>
					|
					<a href="#">The Team</a>
					|
					<a href="#">About</a>
					|
					<a href="#">Contact</a>
				</p>

				<p class="footer-company-name">© 2019 center for educational technology.</p>
			</div>

			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Center for Education Technology</span>
						IIT Kharagpur</span>
						, West Bengal - 721302</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+91 11-27782183</p>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="niteshjha@iitkgp.ac.in">support@something.com</a></p>
				</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about">
					<span>About the company</span>
					Video as a social sense.</p>
				<div class="footer-icons">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-youtube"></i></a>
				</div>
			</div>
		</footer>







		<!-- Scripts -->
		<!--		<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script> -->
		<!-- <script src="assets/js/drag.js"></script> !-->

		<script src="assets/js/drag.js"></script>
		<script src="assets/js/jquery.js"></script>
		<script src='assets/js/javascript.js'></script>

</body>
<script src="assets/js/feature.js"></script>
<script type="text/javascript" src="assets/js/videocontrols.js"></script>
</html>