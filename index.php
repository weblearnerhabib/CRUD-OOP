<?php
require_once('classes/DBBL.php');
$dbblObj = new DBBL;

// Insert Form Data to Database
if(isset($_POST['subBtn'])){
    $formData = $_POST;
    $dbblObj->InsertData($formData);
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DBBL Bank LTD. Branch</title>
    <!-- Favicon -->
    <link rel="icon" href="https://gcdnb.pbrd.co/images/12DcJ3t3JN09.x-icon" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>

    <!-- header start -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <img src="https://gcdnb.pbrd.co/images/CajzgiDRzyZa.png?o=1" alt="DBBL LOGO" class="img-fluid">
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- main Section -->
    <main>
        <div class="showOutput mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> Serial Number </th>
                                    <th> Branch Name </th>
                                    <th> Branch Location </th>
                                    <th> Branch Image </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $id = 0;
                                    $Data = $dbblObj->ShowData();
                                    while($BranchData = mysqli_fetch_assoc($Data)){
                                ?>
                                <tr>
                                    <td> <?php echo ++$id;?> </td>
                                    <td> <?php echo $BranchData['b_name']?> </td>
                                    <td> <?php echo $BranchData['b_location']?> </td>
                                    <td> <img src="uploads/<?php echo $BranchData['b_image']?>" width="100px" style="border-radius:50%"></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $BranchData['b_id']?>" class="btn btn-sm btn-warning"> Edit </a>
                                        <a href="delete.php?id=<?php echo $BranchData['b_id']?>" class="btn btn-sm btn-danger"> Delete </a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>

                        </table>
                    </div>

                    <div class="col-md-8 offset-md-2 mt-3 shadow p-3">
                        <h3 class="text-success"> Add Branch </h3>
                        <form action="" method="POST" enctype="multipart/form-data" class="form-control">
                            <div class="form-group my-3">
                                <input type="text" class="form-control" placeholder="Type Branch Name"
                                    name="BranchName">
                            </div>
                            <div class="form-group my-3">
                                <input type="text" class="form-control" placeholder="Type Branch Location"
                                    name="BranchLocatoin">
                            </div>
                            <div class="form-group my-3">
                                <input type="file" class="form-control" name="BImage">
                            </div>
                            <div class="form-group my-3">
                                <input type="submit" value="Add New Branch" class="btn btn-success" name="subBtn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Main section end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>

</html>