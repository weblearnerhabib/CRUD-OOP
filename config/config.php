<?php
class dbConnection{
    protected $dbconnect;
    public function __construct(){
        $this->dbconnect = new mysqli("localhost","root",'','dbbl');
    }
}
?>