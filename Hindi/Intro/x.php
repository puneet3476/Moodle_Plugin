<?php
require 'connect.php';

//we need t r2 n tmax load kisi div
if (isset($_GET['x'])) {
$vid_len=$_GET['vid_len'];
$vid_div=$vid_len / 20;
$t_arr = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$r1_arr = array(0,0,0,0,0,0,0);
$r2_arr = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$q = mysqli_query($link,"SELECT second,reaction FROM `chat` ORDER BY second ASC" );
$m = 1;
while($row=mysqli_fetch_array($q)){
	if((int)$row['second'] < $m*$vid_div){
		$t_arr[(int)$m-1] += 1;
		$r1_arr[(int)$row['reaction']] += 1;
	} else {
		$max = 0;
		for($z=0;$z<7;$z++){
			if($r1_arr[$max] < $r1_arr[$z]){
				$max = $z;
			}
		}
		$r2_arr[$m-1] = $max;


		while((int)$row['second'] >= $m*$vid_div){
			$m += 1;
		}
		$t_arr[$m-1] += 1;

		$r1_arr = array(0,0,0,0,0,0,0);
		$r1_arr[(int)$row['reaction']] += 1;
	}


}
$maxf = $t_arr[0];
for($w=1;$w<20;$w++){
    if($maxf < $t_arr[$w]){
      $maxf=$t_arr[$w];
    }
}

?>
<div id="normalizer" style="display: none;"><?php echo ($maxf); ?></div>
<div id="time_array" style="display: none;"><?php echo implode(" ",$t_arr);?></div>
<div id="r_array" style="display: none;"><?php echo implode(" ",$r2_arr);?></div>
<script type="text/javascript">
var t_array = document.getElementById('time_array').innerHTML.split(" ");
var r_array = document.getElementById('r_array').innerHTML.split(" ");
var column_array = document.getElementsByClassName('graph_column');
var normalizer = parseInt(document.getElementById('normalizer').innerHTML);

for(i=0;i<20;i++){
  column_array[i].style.height = (parseInt(t_array[i]) / normalizer * 100).toFixed(2) + "%";
  var color = "#";
    var randomHex = "123456ABCDEF";  
    for(var i = 0; i<6;i++){
        color+= randomHex[Math.floor(Math.random()*16)]
    }
    column_array[i].style.backgroundColor = color;
}


</script>
<?php
}



?>
