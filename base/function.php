<?php
require 'connectwithoutdata.php';
//function.php

function make_avatar($character)
{   require 'connectwithoutdata.php';
    echo (getcwd());
	chdir($class_link);

    $path = "avatar/". time() . ".png";
	$image = imagecreate(200, 200);
	$red = rand(0, 255);
	$green = rand(0, 255);
	$blue = rand(0, 255);
    imagecolorallocate($image, $red, $green, $blue);
    $textcolor = imagecolorallocate($image, 255,255,255);

 imagettftext($image, 80, 0, 30, 150, $textcolor, $font_link, $character);
    #header("Content-type: image/png");
    imagepng($image, $path);
    imagedestroy($image);
    return $path;
}

function Get_user_avatar($user_id, $connect)
{
	$query = "
	SELECT user_avatar FROM register_user
    WHERE register_user_id = '".$user_id."'
	";

	$statement = $connect->prepare($query);

	$statement->execute();

	$result = $statement->fetchAll();

	foreach($result as $row)
	{
		echo '<img src="'.$row["user_avatar"].'" width="75" class="img-thumbnail img-circle" />';
	}
}

?>
