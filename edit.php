<?php
require_once('classes/DBBL.php');
$dbblObj = new DBBL;
$id =$_GET['id'];

if(isset($id)){
    $data = $dbblObj->EditData($id);
    $editData = mysqli_fetch_assoc($data);

    if(isset($_POST['updateBtn'])){
        $data = $_POST;
        $dbblObj->UpdateData($data,$id);
    }
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
                <div class="col-md-4 offset-md-4">
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
                    <div class="col-md-8 offset-md-2 mt-2 shadow p-3">
                        <h3 class="text-warning"> Edit Branch </h3>
                        <form action="" method="POST" enctype="multipart/form-data" class="form-control">
                            <div class="form-group my-3">
                                <input type="text" class="form-control" name="updateBranchName" value="<?php echo $editData['b_name'];?>">
                            </div>
                            <div class="form-group my-3">
                                <input type="text" class="form-control" name="updateBranchLocatoin" value="<?php echo $editData['b_location'];?>">
                            </div>
                            
                            <div class="form-group my-3">
                                <p>Old Image </p>
                                <img src="uploads/<?php echo $editData['b_image']?>" width="100px" style="border-radius:50%">
                                <input type="hidden" name="oldImage" value="<?php echo $editData['b_image']?>">
                            </div>

                            <div class="form-group my-3">
                                <input type="file" class="form-control" name="updateImage">
                            </div>
                            <div class="form-group my-3">
                                <input type="submit" value="Edit Branch" class="btn btn-warning text-white" name="updateBtn">
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