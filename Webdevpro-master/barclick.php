<?php
$user = 'root';//............This you may have to change
$password = 'bottletopple202';//............This you may have to change
$db = 'mydb';//............This you may have to change
$host = 'localhost';//............This you may have to change

$link = new mysqli(
   $host,
   $user,
   $password,$db
); 
if (isset($_GET['bar_click'])) {

$vid_curenttimesecond=$_GET['vid_curenttimesecond'];
$vid_curenttime_max=$_GET['vid_curenttime_max'];
//$resultchat = mysqli_query($link,"SELECT * FROM `chat` WHERE second > '$vid_curenttimesecond' AND second < '$vid_curenttime_max' " );
//while ($rowchat=mysqli_fetch_array($resultchat)) {
?>
<script type="text/javascript">
	//alert("<?php echo($rowchat['time_mark']);?>");
	//var graph_time="<?php echo($rowchat['time_mark']);?>";
	//var timegra="<?php echo $rowchat['second']; ?>";
	//document.getElementById('myVideo').currentTime=timegra;

	//search_table(graph_time);
			
			
       </script>
<?php } 
	
  ?>
