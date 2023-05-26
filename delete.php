<?php
require_once('classes/DBBL.php');
$dbblObj = new DBBL;
$id =$_GET['id'];

if(isset($id)){
    $dbblObj->DeleteData($id);
}

?>