<?php
require_once('config/config.php');

class DBBL extends dbConnection{
    
    // insert data 
    public function InsertData($formData){
        $BranchName = $formData['BranchName'];
        $BranchLocatoin = $formData['BranchLocatoin'];
        $ImgName = $_FILES['BImage']['name'];
        $ImgTempName = $_FILES['BImage']['tmp_name'];

        $sql = "INSERT INTO `branch` (`b_name`, `b_location`, `b_image`) VALUES ('$BranchName', '$BranchLocatoin', '$ImgName')";
        $insQuery = $this->dbconnect->query($sql);
        if($insQuery){
            move_uploaded_file($ImgTempName, "uploads/".$ImgName);
            header("location: index.php");
        }
    } // Insert Data End

    // Show Data
    public function ShowData(){
        $sql = "SELECT * FROM `branch`";
        return $this->dbconnect->query($sql);
    }

    // Delete Data
    public function DeleteData($id){
        // Image Name Find Query For Unline Image
        $sqlImage = "SELECT * FROM `branch` WHERE b_id = $id";
        $queryImage = $this->dbconnect->query($sqlImage);
        $img = mysqli_fetch_assoc($queryImage);

        // Delete Query
        $sql = "DELETE FROM `branch` WHERE b_id = $id";
        $deleteQuery = $this->dbconnect->query($sql);
        if($deleteQuery){
            unlink("uploads/".$img['b_image']);
            header("location: index.php");
        }
    }

    // Edit Data
    public function EditData($id){
        $sql = "SELECT * FROM `branch` WHERE b_id = $id";
        return $this->dbconnect->query($sql);
    }

    public function UpdateData($data,$id){
        $updateBranchName = $data['updateBranchName'];
        $updateBranchLocatoin = $data['updateBranchLocatoin'];

        $oldImage = $data['oldImage'];
        $upImage = $_FILES['updateImage']['name'];
        $upTempImg = $_FILES['updateImage']['tmp_name'];

        if($upImage != ''){
            $newImage = $upImage;
        }
        else{
            $newImage = $oldImage;
        }
        if(file_exists("uploads/".$upImage)){
           $sql = "UPDATE `branch` SET `b_name`='$updateBranchName',`b_location`='$updateBranchLocatoin', `b_image`='$newImage' WHERE b_id = $id";

            $this->dbconnect->query($sql);
            header("location: index.php");
        }
        else{
           $sql = "UPDATE `branch` SET `b_name`='$updateBranchName',`b_location`='$updateBranchLocatoin', `b_image`='$newImage' WHERE b_id = $id";

            $updated = $this->dbconnect->query($sql);
            if($updated){
                move_uploaded_file($upTempImg, "uploads/".$newImage);
                unlink("uploads/".$oldImage);
                header("location: index.php");
            }
        }
    }

}

?>