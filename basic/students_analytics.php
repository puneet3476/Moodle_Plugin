<?php
include 'header.php';
include 'connectwithoutdata.php';

if (!(isset($_GET['course_name']) && isset($_GET['student_id']))) {
    header("Location:  /Moodle_Plugin/basic/teacher_panel.php");
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
