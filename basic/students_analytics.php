<?php
include 'header.php';
include 'connectwithoutdata.php';

if (!isset($_GET['course_name'])) {
    $teacher_ID = $_SESSION['loginroll'];
    ?>
<style>

    body {
        position: absolute;
        top: 0; bottom: 0; left: 0; right: 0;
        height: auto;

    }
    body:before {
        content: "";
        position: fixed;
        background: url(images/38085.jpg) ;
        background-size: cover;
        z-index: -1; /* Keep the background behind the content */
        height: 20%; width: 20%; /* Using Glen Maddern's trick /via @mente */

        /* don't forget to use the prefixes you need */
        transform: scale(5);
        transform-origin: top left;
        filter: blur(1px);
}
</style>
<script src="https://kit.fontawesome.com/361990fe0a.js" crossorigin="anonymous"></script>
<div class="gradient">
<div class="container bg-transparent">
<div class="jumbotron bg-transparent">
<h1 class="mx-auto d-block mt-3" style="text-align:center;color:white;">Your Courses</h1>
<div class="row mx-auto mt-5">
<?php
$result = mysqli_query($link_inst, "SELECT * FROM `courses` WHERE `teacher_ID`='$teacher_ID'");
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class=" jumbotron p-3 col-md-5  mx-auto" style="background-color:#ede682;cursor:pointer;"><a href="students_analytics.php?course_name=<?php echo $row['course_name'] ?>" class="text-decoration-none text-dark">
                <h5 style="text-align:center" class=" font-weight-normal"><?php echo ($row['course_name']) ?><br></h5>
                <div style="text-align:center"><?php echo ($row['description']) ?></div>
            </a>
            <form method="GET" action="students_analytics.php">
             <input type="text" name="course_name" value="<?php echo ($row['course_name']) ?>" style="display: none;">

            <button type="submit" name="delete_course"
                class="btn btn-danger ml-5 mr-2" value="" ><i class="far fa-trash-alt"></i></button>
            </form>
        </div>
            <?php }}?>
</div>
</div>
</div>
</div>
<?php

} else if (!isset($_GET['student_id'])) {
    $course = $_GET['course_name'];
    if (($_SESSION['my_role']) != 'TEACHER') {
        die("You are forbidden to visit this page");
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Added Students List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <style>

            body {
                position: absolute;
                top: 0; bottom: 0; left: 0; right: 0;
                height: 100%;

            }
            body:before {
                content: "";
                position:fixed;
                background: url(images/38085.jpg);
                background-size: cover;
                z-index: -1; /* Keep the background behind the content */
                height: 20%; width: 20%; /* Using Glen Maddern's trick /via @mente */

                /* don't forget to use the prefixes you need */
                transform: scale(5);
                transform-origin: top left;
                filter: blur(1px);
            }
                    </style>
</head>
<body>

<div class="container"  style="margin-top:8%;">
    <div class="jumbotron" style="padding:0.5rem 0.5rem;">
        <div class="card" style="padding:1rem 1rem;">
            <h2>List Of Students </h2>
        </div>


        <div class="card">
            <div class="card-body">

            <?php
$link_course = new mysqli(
        $host,
        $user,
        $password, $course
    );
    $query = "SELECT * FROM tbl_info";
    $query_run = mysqli_query($link_course, $query);
    ?>
                <table id="datatableid" class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col"> ID</th>
                            <th scope="col">Name</th>
                            <th scope="col"> Roll No. </th>
                            <th scope="col">Email </th>

                        </tr>
                    </thead>
            <?php
if ($query_run) {
        foreach ($query_run as $row) {
            ?>
                    <tbody>
                        <tr>
                            <td> <?php echo $row['id']; ?> </td>
                            <td> <?php echo $row['Name']; ?> </td>
                            <td> <?php echo $row['Roll_no']; ?> </td>
                            <td> <?php echo $row['Email']; ?> </td>

                        </tr>
                    </tbody>
            <?php
}
    } else {
        echo "No Record Found";
    }
    ?>
                </table>
            </div>
        </div>


    </div>
</div>


<script>
document.querySelectorAll('tbody > tr').forEach(row => {
    row.onclick = () => {
        var currentPath = window.location.href;
        var locationPath_1 = currentPath.substr(0,currentPath.lastIndexOf('/'))
        var student_id = row.children[2].innerText;
        var locationPath_2 = '/students_analytics.php' + window.location.search + '&student_id=' + student_id;
        window.location.replace(locationPath_1 + locationPath_2);
    }
})
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"> </script>

<script>

$(document).ready(function() {

    $('#datatableid').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search Your Data",
        }
    });

});

</script>
<?php
} else {
    try {
        $course = $_GET['course_name'];
        $conn = new PDO("mysql:host=$host;dbname=$course", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
        $username_stmt = $conn->query("SELECT Name FROM tbl_info");
        $username = $username_stmt->fetch()['Name'];
        $stmt = $conn->query("SELECT * FROM total_videos");
        ?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <h2 style="margin-top: 10%;text-align:center;">Course: <?php echo $course ?></h2>
        <h3 style="text-align:center;">Student: <?php echo $username ?></h3>
        <div style="display: flex;width: 70%;margin: 0 auto;margin-top: 2%;">
            <div style="text-align: center;width: 33%;"><h4>Total Comments</h4><p id="comments-card">00</p></div>
            <div style="text-align: center;width: 33%;"><h4>Total Notes</h4><p id="notes-card">0</p></div>
            <div style="text-align: center;width: 33%;"><h4>Total Replies</h4><p id="replies-card">0</p></div>
        </div>
        <div style="text-align: center;">
            <h4>Engagement Score</h4>
            <p id="engagement_index">0</p>
        </div>
        <?php
//prepare => execute => fetchAll => foreach
        $engagement = $total_replies = $total_notes = $total_comments = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $notes_data = $comments_data = [];
            $videodb = $row['database_name'];
            $videodb_conn = new PDO("mysql:host=$host;dbname=$videodb", $user, $password);
            $comments_stmt = $videodb_conn->prepare("SELECT COUNT(*) as 'comments_count' FROM chat WHERE student_ID= ? AND reaction= ?");
            for ($i = 0; $i <= 5; $i += 1) {
                $comments_stmt->execute([$_GET['student_id'], $i]);
                $comments = $comments_stmt->fetchAll(PDO::FETCH_ASSOC);
                // var_dump($comments);
                $comments_data[$i] = $comments[0]['comments_count'];
            }
            $total_comments += array_sum($comments_data);
            ?>
            <h3 style="margin-left: 10%;">Video: <?php echo $row['folder_name'] ?></h3>
            <div style="display: flex;justify-content: center;">
                <div style="height: 30vw;width: 30%;position: relative;">
                    <canvas id="commentsCanvas" ></canvas>
                </div>
                <div style="height: 30vw;width: 30%;position: relative;">
                    <canvas id="notesCanvas" ></canvas>
                </div>
            <div>
                <!-- <div style="height: 40%;">
                    <canvas id="replyCanvas" ></canvas>
                </div> -->
            <script>
                var ctx = document.getElementById('commentsCanvas').getContext('2d');
                var myPieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        datasets:[{
                            data:[
                        <?php echo $comments_data[0] ?>,
                        <?php echo $comments_data[1] ?>,
                        <?php echo $comments_data[2] ?>,
                        <?php echo $comments_data[3] ?>,
                        <?php echo $comments_data[4] ?>,
                        <?php echo $comments_data[5] ?>,
                        ],
                        backgroundColor:[
                            "#bababa",
                            "#f07373",
                            "#ffc038",
                            "#62c253",
                            "#48a9c7",
                            "#b048c7"
                        ]}],
                        labels: ["none","type1","type2","type3","type4","type5"],

                        },

                    options: {responsive: true,
                            title: {
                                display: true,
                                text: "Comments"
                            }
                        }
                });
            </script>
            <?php
$notes_stmt = $videodb_conn->prepare("SELECT COUNT(*) as 'notes_count' FROM note WHERE loginuser= ? AND reaction= ?");
            // var_dump($notes);
            for ($i = 0; $i <= 5; $i += 1) {
                $notes_stmt->execute([$username, $i]);
                $notes = $notes_stmt->fetchAll(PDO::FETCH_ASSOC);
                $notes_data[$i] = $notes[0]['notes_count'];
            }
            $total_notes += array_sum($notes_data);
            ?>
            <script>
                var ctx2 = document.getElementById('notesCanvas').getContext('2d');
                var myPieChart2 = new Chart(ctx2, {
                    type: 'pie',
                    data: {
                        datasets:[{
                            data:[
                        <?php echo $notes_data[0] ?>,
                        <?php echo $notes_data[1] ?>,
                        <?php echo $notes_data[2] ?>,
                        <?php echo $notes_data[3] ?>,
                        <?php echo $notes_data[4] ?>,
                        <?php echo $notes_data[5] ?>,
                        ],
                        backgroundColor:[
                            "#bababa",
                            "#f07373",
                            "#ffc038",
                            "#62c253",
                            "#48a9c7",
                            "#b048c7"
                        ]}],
                        labels: ["none","type1","type2","type3","type4","type5"],

                        },

                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: "Notes"
                            }
                        }
                });
                </script>
            <?php
$clickdata_stmt = $videodb_conn->prepare("SELECT COUNT(*) as 'data_points' FROM clickdata WHERE user_id = ?");
            $clickdata_stmt->execute([$_GET['student_id']]);
            $clickdata_events = $clickdata_stmt->fetchAll();
            // var_dump($clickdata_events);
            $engagement += $clickdata_events[0]['data_points'];

        }

        ?>
        <script>
        document.querySelector('#comments-card').innerText = "<?php echo $total_comments; ?>";
        document.querySelector('#notes-card').innerText = "<?php echo $total_notes; ?>";
        document.querySelector('#replies-card').innerText = "<?php echo $total_replies; ?>";
        document.querySelector('#engagement_index').innerText = "<?php echo $engagement; ?>";
        </script>
        <?php
} catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

}
?>
