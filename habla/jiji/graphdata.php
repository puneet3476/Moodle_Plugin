<?php

$user = 'root';
$password = 'bottletopple202';
$db = 'mydb';
$host = 'localhost';

$link = new mysqli(
   $host,
   $user,
   $password,$db
);
?>
<script type="text/javascript">
var vid_len = document.getElementById('myVideo').duration;
$.post('graphdata.php', vid_len);</script>
<?php
$vid_len=$_POST['vid_len'];
$vid_div=$vid_len / 20;
$t_arr = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$r1_arr = array(0,0,0,0,0,0,0);
$r2_arr = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$q = mysqli_query($link,"SELECT second,reaction FROM `chat` ORDER BY second ASC" );
$m = 1;
while($row=mysqli_fetch_array($q)){
	if((int)$row['second'] < $m*vid_len){
		t_arr[(int)$m-1] += 1;
		$r1_arr[(int)$row['reaction']] += 1;
	} else {
		$max = 0;
		for($z=0;$z<7;$z++){
			if($r1_arr[$max] < $r1_arr[$z]){
				$max = $z;
			}
		}
		$r2_arr[$m-1] = $max;


		while((int)$row['second'] >= $m*vid_len){
			$m += 1;
		}
		t_arr[$m-1] += 1;

		$r1_arr = array(0,0,0,0,0,0,0);
		$r1_arr[(int)$row[<?php

$user = 'root';
$password = 'root';
$db = 'mydb';
$host = 'localhost:8889';

$link = new mysqli(
   $host,
   $user,
   $password,$db
);
?>
<script type="text/javascript">
var vid_len = document.getElementById('myVideo').duration;
$.post('graphdata.php', vid_len);</script>
<?php
$vid_len=$_POST['vid_len'];
$vid_div=$vid_len / 20;
$t_arr = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$r1_arr = array(0,0,0,0,0,0,0);
$r2_arr = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$q = mysqli_query($link,"SELECT second,reaction FROM `chat` ORDER BY second ASC" );
$m = 1;
while($row=mysqli_fetch_array($q)){
	if((int)$row['second'] < $m*vid_len){
		t_arr[(int)$m-1] += 1;
		$r1_arr[(int)$row['reaction']] += 1;
	} else {
		$max = 0;
		for($z=0;$z<7;$z++){
			if($r1_arr[$max] < $r1_arr[$z]){
				$max = $z;
			}
		}
		$r2_arr[$m-1] = $max;


		while((int)$row['second'] >= $m*vid_len){
			$m += 1;
		}
		t_arr[$m-1] += 1;

		$r1_arr = array(0,0,0,0,0,0,0);
		$r1_arr[(int)$row['reaction']] += 1;
	}
}

?>
<script type="text/javascript">
	console.log("<?php echo $t_arr ?>");
</script>
