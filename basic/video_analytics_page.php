<?php 
require 'connectwithoutdata.php';
require 'header.php';
    if (($_SESSION['my_role']) != 'TEACHER') {
        die("You are forbidden to visit this page");
    }
    $teacher_ID=$_SESSION['loginroll'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="video_analytics.css">    
</head>
<body>

<br><br><br><br><br><br>
<div class="container">
    <div class="jumbotron">

        <div class="card">
            <div class="card-body">            
            <h2>Video Analytics</h2>
<?php
    $result = mysqli_query($link_inst,"SELECT * FROM `courses` WHERE `teacher_ID`='$teacher_ID'" );
    while ($row=mysqli_fetch_array($result)) {
    $course=$row['course_name'];
    $link_course = new mysqli(
    $host,
    $user,
    $password, $course
);
                $query = "SELECT * FROM total_videos";
                $query_run = mysqli_query($link_course, $query);
            ?>
                <table id="datatableid" class="table">
                    <thead>
                        <tr>
                            <th scope="col"> Title</th>
                            <th scope="col">course</th>
                            <th scope="col">New Comments</th>
                            <th scope="col">Last Activity </th>
                            <th scope="col">Created </th>
                            <th scope="col"> Users</th>
                            <th scope="col"> Engagement</th>
                            <th scope="col"> Collaboration</th>
                            <th scope="col"> Notes</th>
                            <th scope="col"> Chats</th>
                            <th scope="col"> Duration</th>
                        </tr>
                    </thead>
            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
                        $link_video = new mysqli(
                            $host,
                            $user,
                            $password, $row['database_name']
                        );
                        $video_users=mysqli_query($link_course,"SELECT * FROM tbl_info");
                        $video_notes=mysqli_query($link_video,"SELECT * FROM note");
                        $video_chats=mysqli_query($link_video,"SELECT * FROM chat");
                        $video_clickdata=mysqli_query($link_video,"SELECT * FROM clickdata");
                        $activity=mysqli_query($link_video,"SELECT * FROM clickdata ORDER BY id DESC LIMIT 1");
                        $video_activity=mysqli_fetch_array($activity);

            ?>
            
                    <tbody>

                        <tr class="column_click">

                            <td><a href="detailed_video_analytics.php?video_name=<?php echo($row['database_name']); ?>"><?php echo $row['folder_name']; ?> </a></td>                         
                            <td> <?php echo $course; ?> </td>
                            <td> <?php echo((mysqli_num_rows($video_chats))-($row['prof_last_visit_chat']));?> </td>
                            <td> <?php echo($video_activity['Start_Time']); ?> </td>  
                            <td><?php echo $row['creation_date']; ?>  </td>  
                            <td><?php echo(mysqli_num_rows($video_users));?></td>  
                            <td> <?php echo(mysqli_num_rows($video_clickdata));?> </td>  
                            <td>  </td>  
                            <td><?php echo(mysqli_num_rows($video_notes));?> </td>  
                            <td> <?php echo(mysqli_num_rows($video_chats));?> </td>
                            <td> </td>                              
                                                     
                        
                        </tr>
                        
                    </tbody>
            <?php           
                    }
                }
            
            }
            ?>
                </table>
            </div>
        </div>


    </div>
</div>



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







<script>

$(document).ready(function () {

    $('.deletebtn').on('click', function() {
        
        $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[0]);
      
    });
});

</script>



<script>

$(document).ready(function () {
    $('.editbtn').on('click', function() {
        
        $('#editmodal').modal('show');

        
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_id').val(data[0]);
            $('#fname').val(data[1]);
            $('#lname').val(data[2]);
            $('#course').val(data[3]);
            $('#contact').val(data[4]);
    });
});

</script>


</body>
</html>
