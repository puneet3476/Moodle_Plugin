<?php
session_start();
require 'connect.php';

if (isset($_GET['done'])) {
//$_POST['id'];
  $usery=$_GET['usery'];
  $topic=$_GET['topic'];
  $currenttime=$_GET['timemin'];
  $reactiony=$_GET['current_reacty'];
  $totalsecsy=$_GET['totalsecsy'];

$qy="INSERT INTO `note` (loginuser,note,time_mark,second,reaction)
VALUES ('$usery','$topic','$currenttime','$totalsecsy','$reactiony')" ;
mysqli_query($link,$qy);
 echo "data entered successfully";
}
if (isset($_GET['doney']) && ($_GET['topicy']!="")) {
$id=0;//$_POST['id'];
  $userya=$_GET['usery'];
  $topicy=$_GET['topicy'];
  $currenttimey=$_GET['timeminy'];
  $totalsecs=$_GET['totalsecs'];
  $reaction=$_GET['current_react'];
  $student_ID=$_GET['login_ID'];

$qya="INSERT INTO chat (chatuser,chat,time_mark,second,reaction,student_ID)
VALUES ('$userya','$topicy','$currenttimey','$totalsecs','$reaction','$student_ID')" ;

 if ($link->query($qya) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $qya . "<br>" . $link->error;
}
}



if (isset($_GET['display'])) {
$usery=$_GET['usery'];
$resulty = mysqli_query($link,"SELECT * FROM `note` WHERE `loginuser` = '$usery' " );
while ($rowy=mysqli_fetch_array($resulty)) {
?>

  <div id="<?php echo $rowy['id']; ?>">
  <div class="comment_displaya" id="n">

    <span class="timestamp"><?php echo $rowy['time_mark']; ?></span>
    <p class="comment_content"><?php echo $rowy['note']; ?></p>
    <img class="comment_react" src="../../basic/../../basic/images/<?php echo $rowy['reaction']; ?>.png">

  </div>
</div>
  <script type="text/javascript">
         $("#<?php echo $rowy['id']; ?>").click(function (argument) {
                     var old_note_time=timeConvert(document.getElementById('myVideo').currentTime);
                     var timenote="<?php echo $rowy['second']; ?>";
                     var clicknote=1;
                     var note_id="<?php echo $rowy['id']; ?>";
                     document.getElementById('myVideo').currentTime=timenote;
                     var new_note_time=timeConvert(document.getElementById('myVideo').currentTime);
                     $.ajax({
   url:"clickdata.php",
   method:"POST",
   data:{
    clicknote:clicknote,
    note_id:note_id,
old_note_time:old_note_time,
new_note_time:new_note_time

   },
   success:function(data)
   {
       }
  })





        });






    var blank="<?php echo $rowy['reaction']; ?>";
    if (blank=="0") {
          document.getElementsByClassName("comment_react")[0].style.display="none";
    }
  </script>

  <?php
}

}

if (isset($_GET['download'])) {
$usery=$_GET['usery'];
$resulty = mysqli_query($link,"SELECT * FROM `note` WHERE `loginuser` = '$usery' " );
$resulty = mysqli_query($link,"SELECT * FROM `note` WHERE `loginuser` = '$usery' " );
while ($rowy=mysqli_fetch_array($resulty)) {
?>
<table id="tblCustomers" cellspacing="0" cellpadding="0">
        <tr>
            <th><?php echo $rowy['time_mark']; ?></th><br>
            <th>    </th>
            <th>    <?php echo $rowy['note']; ?></th>

        </tr><?php } ?>
    </table>
    <br />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
      Export();

        function Export() {var excel_data = $('#tblCustomers').html();
           var page = "excel.php?data=" + excel_data;
           window.location = page;
            html2canvas(document.getElementById('tblCustomers'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Notes.pdf");
                }
            });
        }
    </script>
<?php
//while ($rowy=mysqli_fetch_array($resulty)) {

//
}
//Time Chat starts from here................

if (isset($_GET['displaytimechat'])) {
$resultchat = mysqli_query($link,"SELECT * FROM `chat` ORDER BY  `time_mark` DESC " );
while ($rowchat=mysqli_fetch_array($resultchat)) {
?>

  <div id="<?php echo $rowchat['id']; ?>t">
  <div class="comment_display" id="<?php echo $rowchat['second']; ?>">

        <?php
    $this_chatuser=$rowchat['student_ID'];
    $q="SELECT * FROM `register_user` WHERE `user_Roll_no`='$this_chatuser';";
    $avatar = mysqli_query($link_users,$q);


     while ($chatavatar=mysqli_fetch_array($avatar)) {

      $image_url="otp-php-registration/class/".$chatavatar['user_avatar'];
     ?>
    <img src="../../<?php echo($image_url);?>"  class="avatar" style="position:relative;align-content: left;vertical-align: middle;width:50px;height: 50px;border-radius: 50%;">
    <?php
    }



    ?>
    <span class="comment_u"><?php echo $rowchat['chatuser']; ?></span>
    <br>
    <span class="timestamp"><?php echo $rowchat['time_mark']; ?></span>

    <p class="comment_content"><?php echo $rowchat['chat']; ?></p>
    <div class="reply_btn r<?php echo $rowchat['id']; ?>">Reply (<?php echo($rowchat['Replies']); ?>)</div>
    <img class="comment_react" src="../../basic/../../basic/images/<?php echo $rowchat['reaction']; ?>.png">

  </div>
 </div>
  <div class="reply_column reply_column<?php echo $rowchat['id']; ?>">
    <div class=" reply_c<?php echo $rowchat['id']; ?>"></div>
    <input type="text" class="reply reply<?php echo $rowchat['id']; ?>">
    <button type="submit" class="submitreply" id="<?php echo $rowchat['id']; ?>"><img src="../../basic/images/tick.png" class="tick"></button>
  </div>
  <script type="text/javascript">
    var blank="<?php echo $rowchat['reaction']; ?>";
    if (blank=="0") {
          document.getElementsByClassName("comment_react")[0].style.display="none";
    }
    document.getElementsByClassName("r<?php echo $rowchat['id']; ?>")[0].onclick = function(){
      if(document.getElementsByClassName("r<?php echo $rowchat['id']; ?>")[0].innerHTML == "Reply (<?php echo($rowchat['Replies']); ?>)"){
        var current_id="<?php echo $rowchat['id']; ?>";
        var loginbool="<?php $_SESSION['loginuser']; ?>";



        displayreply(current_id);
        document.getElementsByClassName("reply_column<?php echo $rowchat['id']; ?>")[0].style.display = "block";
        document.getElementsByClassName("r<?php echo $rowchat['id']; ?>")[0].innerHTML = "Hide Reply";
      } else {
        document.getElementsByClassName("reply_column<?php echo $rowchat['id']; ?>")[0].style.display = "none";
        document.getElementsByClassName("r<?php echo $rowchat['id']; ?>")[0].innerHTML = "Reply (<?php echo($rowchat['Replies']); ?>)";
      }
    }

         $("#<?php echo $rowchat['id']; ?>t").click(function (argument) {
                     var oldposttime=timeConvert(document.getElementById('myVideo').currentTime);

                     var timey="<?php echo $rowchat['second']; ?>";
                     var newposttime="<?php echo $rowchat['time_mark']; ?>";
                     var postid="<?php echo $rowchat['id']; ?>";
                     var clickposy=1;
                     document.getElementById('myVideo').currentTime=timey;
                       $.ajax({
   url:"ajaxy1.php",
   method:"POST",
   data:{
    clickposy:clickposy,
    postid:postid,
oldposttime:oldposttime,
newposttime:newposttime

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
      var reply_id="<?php echo $rowchat['id']; ?>";
      var user_reply=document.querySelector('#phplogin').innerText;
            var reply_content=$(".reply<?php echo $rowchat['id']; ?>").val();
            var reply_post=1;

    load_reply();

 function load_reply()
 {
  $.ajax({
   url:"ajaxy1.php",
   method:"POST",
   data:{
    reply_post:reply_post,
    reply_id:reply_id,
user_reply:user_reply,
reply_content:reply_content

   },
   success:function(data)
   {
   displayreply(reply_id);
    $(".reply<?php echo $rowchat['id']; ?>").val('');
       }
  })
 }
        });

 function displayreply(reply_id) {


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
  </script>



  <?php
}
die();
}


                                                                             //normal chat starts here

if (isset($_GET['displaychat'])) {

$resultchat = mysqli_query($link,"SELECT * FROM `chat` " );
while ($rowchat=mysqli_fetch_array($resultchat)) {
?>

  <div id="<?php echo $rowchat['id']; ?>h">
  <div class="comment_display" id="<?php echo $rowchat['second']; ?>">
    <?php
    $this_chatuser=$rowchat['student_ID'];
    $q="SELECT * FROM `register_user` WHERE `user_Roll_no`='$this_chatuser';";
    $avatar = mysqli_query($link_users,$q);


     while ($chatavatar=mysqli_fetch_array($avatar)) {

      $image_url="otp-php-registration/class/".$chatavatar['user_avatar'];
     ?>
    <img src="../../<?php echo($image_url);?>"  class="avatar" style="position:relative;align-content: left;vertical-align: middle;width:50px;height: 50px;border-radius: 50%;">
    <?php
    }
    $this_chat_teacher=$rowchat['student_ID'];
    $q="SELECT * FROM `register_teacher` WHERE `teacher_ID`='$this_chatuser';";
    $avatar = mysqli_query($link_users,$q);
    while ($chatavatar=mysqli_fetch_array($avatar)) {

      $image_url="otp-php-registration/class/".$chatavatar['teacher_avatar'];
     ?>

    <img src="../../otp-php-registration/class/avatar/scholar.png"  class="avatar" style="position:relative;align-content: left;vertical-align: middle;width:50px;height: 50px;border-radius: 50%;">

    <?php
    }





    ?>
    <span class="comment_u"><?php echo $rowchat['chatuser']; ?></span>
    <br>


    <div class="timestamp"><?php echo $rowchat['time_mark']; ?></div>
    <p class="comment_content" style="margin-top: 5px;"><img class="comment_react" src="../../basic/images/<?php echo $rowchat['reaction']; ?>.png">
    <?php echo $rowchat['chat']; ?></p>
    <div class="reply_btn r<?php echo $rowchat['id']; ?>">Reply (<?php echo($rowchat['Replies']); ?>)</div>

    </div>
      </div>
  </div>
  <div class="reply_column reply_column<?php echo $rowchat['id']; ?>">
    <div class=" reply_c<?php echo $rowchat['id']; ?>"></div>
    <input type="text" class="reply reply<?php echo $rowchat['id']; ?>">
    <button type="submit" class="submitreply" id="<?php echo $rowchat['id']; ?>"><img src="../../basic/images/tick.png" class="tick"></button>
  </div>
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

           var oldposttimey=timeConvert(document.getElementById('myVideo').currentTime);
           document.getElementById('myVideo').currentTime=time;
           var newposttimey="<?php echo $rowchat['time_mark']; ?>";
                     var postidy="<?php echo $rowchat['id']; ?>";
                     document.getElementById('myVideo').currentTime=time;
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
      var oldposttimereply=document.getElementById('myVideo').currentTime;
      var reply_id="<?php echo $rowchat['id']; ?>";
      var user_reply=document.querySelector('#phplogin').innerText;
            var reply_content=$(".reply<?php echo $rowchat['id']; ?>").val();
            var reply_post=1;

    load_reply(oldposttimereply);

 function load_reply(oldposttimereply)
 {console.log(oldposttimereply);
  $.ajax({
   url:"ajaxy1.php",
   method:"POST",
   data:{
    reply_post:reply_post,
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
