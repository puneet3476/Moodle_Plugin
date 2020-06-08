<?php
session_start();
?>
<style type="text/css">
 #commentbox{
  width: 90%;
  margin: 5px;
  background: rgba(136, 126, 126, 0.2);
  margin-bottom: 10px;
  border: none;
    border-radius: 2px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.08);
 }
 .user {
      cursor: pointer;
      display: inline-block;
        border-radius: 0.1em;
        color: #fff;
        background: linear-gradient(to right, #9C27B0, #E040FB);
        border: 0;
        padding-left: 20px;
        padding-right: 20px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        
        font-size: 18px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
        float: left;
    }
.user1 {
      cursor: pointer;
      display: inline-block;
        border-radius: 0.1em;
        color: #fff;
        background: linear-gradient(to right, #9C27B0, #E040FB);
        border: 0;
        padding-left: 20px;
        padding-right: 20px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        
        font-size: 18px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
        float:right;
    }





.topictext{
  margin-top: 10px;
  margin-left:80px;
    color: #fff;
    font-size: 200%;
    word-spacing: 5px;
    letter-spacing: 3px;
    margin-bottom:20px;
    text-shadow: 2px 2px 4px #000000;
    font-family: 'Righteous', cursive;
    color: black;
}

 .user1:hover{
        color:#E040FB;
        background:#fff;
        border:solid;
        border-radius: 0.1em;
        border-color:linear-gradient(to right, #9C27B0, #E040FB); 

    }
    .user:hover{
        color:#E040FB;
        background:#fff;
        border:solid;
        border-radius: 0.1em;
        border-color:linear-gradient(to right, #9C27B0, #E040FB); 

    }

</style>
<?php
$user = 'root';
$password = 'root';
$db = 'mydb';
$host = 'localhost:8889';

$link = new mysqli(
   $host, 
   $user, 
   $password,$db
);
   
if (isset($_POST['done'])) {
$id=$_POST['id'];
  $user=$_POST['user'];
  $topic=$_POST['topic'];

$qy="INSERT INTO mytopic(id,user,topic)
VALUES ('$id','$user','$topic')" ;
mysqli_query($link,$qy);
  
}
if (isset($_POST['display'])) {
$q="SELECT * FROM mytopic ";
$result=mysqli_query($link,$q);
while ($row=mysqli_fetch_array($result)) {
?>
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
<div id="commentbox" class="commentbox<?php echo $row['id']; ?>">
<div class="user">
  
  Added By: <?php echo $row['user']; ?> 

</div>
<div class="user1" id="user1<?php echo $row['id'];?>">
Delete  

</div>
<div class="topictext">
  <p>
    <br>
  <?php echo $row['topic']; ?>  
  </p>
</div>
<div class="displayb<?php echo $row['id'];?>"></div>
<textarea class="comment" type="text" align="center" name="comment<?php echo $row['id']; ?>" id="comment<?php echo $row['id'];?>" placeholder="COMMENT"></textarea><br><br>
      <input class="submit1" align="center" type="submit" name="submit<?php echo $row['id']; ?>" id="submitcomment<?php echo $row['id'];?>" value="Comment">
</div>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function () {

$("#user1<?php echo $row['id'];?>").click(function (){

$.ajax({
   url:"comment.php",
   method:"POST",
   data:{delete:1,
    id4:"<?php echo $row['id'];?>"
  
   },
   success:function(dat)
   {location.reload();
  
   }
  })  

});

$("#submitcomment<?php echo $row['id'];?>").click(function (argument) {
var comment=$("#comment<?php echo $row['id'];?>").val();
var id2="<?php echo $row['id'];?>";
var user1="<?php echo ($_SESSION['user']); ?>";
 load_topic();
displaycomment(id2,comment,user1);



 function load_topic()
 {
  $.ajax({
   url:"comment.php",
   method:"POST",
   data:{reply:1,
    id2:id2,
user1:user1,
comment:comment
   },
   success:function(data)
   {
    displaycomment(id2,comment,user1);
    $('.comment').val('');
   }
  })
 }

});




}); 

function displaycomment(id2,comment,user1) {
    $.ajax({
   url:"comment.php",
   method:"POST",
   data:{displaycomment:1,
    id3:id2,
    commenty:comment
   },
   success:function(dat)
   {
  $(".displayb"+id2).html(dat);
   }
  })
  
}



</script>





<?php
}
die();
}

