<?php require 'connectwithoutdata.php';
require 'header.php';

if (($_SESSION['my_role']) != 'TEACHER') {
    die("You are forbidden to visit this page");
}
$course = $_POST['course']/* $_POST['course'] */;
$video = $_POST['vids']/* $_POST['vids'] */;

?>
<style type="text/css">
    .vertical-center {
  min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
  min-height: 100vh; /* These two lines are counted as one :-)       */

  display: flex;
  align-items: center;
}
</style>
<link rel="stylesheet" href="assets/css/index.css">
<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
<body class="gradient vertical-center container">
<div class="jumbotron mx-auto">
<form name="questionform">
<input type="text" name="video_name" id="video_name" value="<?echo ($video); ?>" style="display: none">
<input type="text" name="course_name" id="course_name" value="<?echo ($course); ?>" style="display: none">
<label for="question">Question</label>
<input style="width:100%;" type="text" name="question" id="question">
<label for="timestamp">Timestamp max: <span id="videolength">03:00</span> current:<span id="currentTime"></span></label>
<input style="width:100%;margin-bottom: 1rem;" type="range" name="video" id="timestamp" max="180" min="0" step="1" value="25">
<div style="display: flex;align-items: center;margin-bottom: 1rem;justify-content: space-between;">
    <input type="radio" name="ans" value="1">
    <input style="width: 90%;" type="text" name="option1" placeholder="option 1">
</div>
<div style="display: flex;align-items: center;margin-bottom: 1rem;justify-content: space-between;">
    <input type="radio" name="ans" value="2">
    <input style="width: 90%;" type="text" name="option2" placeholder="option 2">
</div>
<div style="display: flex;align-items: center;margin-bottom: 1rem;justify-content: space-between;">
    <input type="radio" name="ans" value="3">
    <input style="width: 90%;" type="text" name="option3" placeholder="option 3">
</div>
<div style="display: flex;align-items: center;margin-bottom: 1rem;justify-content: space-between;">
    <input type="radio" name="ans" value="4">
    <input style="width: 90%;" type="text" name="option4" placeholder="option 4">
</div>
<button style="display: block;width:50%;margin: 0 auto;margin-bottom: 1rem;line-height: 2rem;border: none;color: white; background-color: #03b6fc;font-weight: bold;" type="submit">Add Question</button>
<button style="display: block;width:50%;margin: 0 auto;margin-bottom: 1rem;line-height: 2rem;border: none;color: white; background-color: #03fc3d;font-weight: bold;"><a href="http://<?php echo $urlhost . '/Moodle_Plugin/' . $course . '/' . $video . '/' . $urlb ?>">Go to Video</a></button>
</form>
</div>
<script src="assets/js/jquery.js"></script>
<script>
var question = document.querySelector('#question');
var timestamp = document.querySelector('#timestamp');
var radioButtonList = document.querySelectorAll('input[type="radio"]')
var option1 = document.querySelector('input[name="option1"]')
var option2 = document.querySelector('input[name="option2"]')
var option3 = document.querySelector('input[name="option3"]')
var option4 = document.querySelector('input[name="option4"]')
var addButton = document.querySelectorAll('button[type="submit"]')[0]
var currentTime = document.querySelector('#currentTime');
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
    var timemin //= hour.concat(colon, minute, colon, second);
    if (hours == 0){
        timemin = minute.concat(colon,second);
    }
    else{
        timemin = hour.concat(colon, minute, colon, second);
    }
    return timemin;
}
timestamp.onmousemove = () => {
    currentTime.innerHTML = timeConvert(timestamp.value)
}
addButton.onclick = (e) => {
    e.preventDefault()
    let selectedValue
    for(var btn of radioButtonList){
        if(btn.checked){
            selectedValue = btn.value
            break
        }
    }
    var data = {
        question: question.value,
        timestamp: timestamp.value,
        option1: option1.value,
        option2: option2.value,
        option3: option3.value,
        option4: option4.value,
        answer: selectedValue,
        video_name: '<?php echo $video; ?>',
        course_name: '<?php echo $course; ?>'
    }
    console.log($.ajax);
    $.ajax({
        url: "questionStore.php",
        method: "POST",
        data,
        success: function(data) {}
        })
}
</script>

</body>
