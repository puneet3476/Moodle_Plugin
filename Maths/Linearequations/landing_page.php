<?php
require 'connect.php';
$result = mysqli_query($link_central, "SELECT * FROM `total_videos` ");
?>
<h2>Welcome to Students Panel</h2>
<h1>Link to all the videos:</h1>
<?php
while ($row = mysqli_fetch_array($result)) {
    ?>
<button id="<?php echo ($row['page_url']) ?>" onclick="videoclick('<?php echo ($row['page_url']) ?>')">
<?php echo $row['folder_name']; ?>
</button>
<script type="text/javascript">
	function videoclick(hyperlink) {
		var page_url=hyperlink;
		var url = page_url.slice(10,page_url.length);
		console.log(url);
		window.location.href=url;


	};
</script>
<?php
}

?>
