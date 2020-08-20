

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Added Students List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    
</head>
<body>
    

<!-- Modal -->
<div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="insertcode.php" method="POST">

            <div class="modal-body">
                
                <div class="form-group">
                    <label> Name </label>
                    <input type="text" name="Name" class="form-control" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label> Roll No. </label>
                    <input type="text" name="Roll_no" class="form-control" placeholder="Enter Roll No.">
                </div>

                <div class="form-group">
                    <label> Email </label>
                    <input type="email" name="Email" class="form-control" placeholder="Enter Email">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
            </div>
        </form>

    </div>
  </div>
</div>




<!-- ####################################################################################################################### -->

<!-- EDIT POP UP FORM (Bootstrap MODAL) -->

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Edit Student Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="insertcode.php" method="POST">

            <div class="modal-body">

                <input type="hidden" name="update_id" id="update_id">

                <div class="form-group">
                    <label> Name </label>
                    <input type="text" name="Name" class="form-control" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label> Roll No. </label>
                    <input type="text" name="Roll_no" class="form-control" placeholder="Enter Roll No.">
                </div>

                <div class="form-group">
                    <label> Email </label>
                    <input type="email" name="Email" class="form-control" placeholder="Enter Email">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
            </div>
        </form>

    </div>
  </div>
</div>

<!-- #################################################################################################### -->





<!-- ####################################################################################################################### -->

<!-- Deregister POP UP FORM (Bootstrap MODAL) -->

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Deregister Student Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="insertcode.php" method="POST">

            <div class="modal-body">

                <input type="hidden" name="delete_id" id="delete_id">

                <h4> Do you want to Delete this Data ??</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">  NO </button>
                <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
            </div>
        </form>

    </div>
  </div>
</div>

<!-- #################################################################################################### -->



<div class="container">
    <div class="jumbotron">
        <div class="card">
            <h2>List Of Added Students </h2>
        </div>    
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                    ADD DATA
                </button>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

            <?php
                $connection = mysqli_connect("localhost","root","bottletopple202");
                $db = mysqli_select_db($connection, 'Corona');

                $query = "SELECT * FROM tbl_info";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table id="datatableid" class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col"> ID</th>
                            <th scope="col">Name</th>
                            <th scope="col"> Roll No. </th>
                            <th scope="col">Email </th>
                            <th scope="col"> EDIT </th>
                            <th scope="col"> Deregister </th>
                        </tr>
                    </thead>
            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                    <tbody>
                        <tr>
                            <td> <?php echo $row['id']; ?> </td>                            
                            <td> <?php echo $row['Name']; ?> </td>                            
                            <td> <?php echo $row['Roll_no']; ?> </td>                            
                            <td> <?php echo $row['Email']; ?> </td>                                                       
                            <td> 
                                <button type="button" class="btn btn-success editbtn"> EDIT </button>
                            </td> 
                            <td>
                                <button type="button" class="btn btn-danger deletebtn"> Deregister </button>
                            </td>
                        </tr>
                    </tbody>
            <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
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

