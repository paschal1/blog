<?php

class Misc{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function getnumposts(){
        $query = "SELECT * FROM news";
        $run = mysqli_query($this->conn, $query);
        $result = mysqli_num_rows($run);
        return $result;
    }
    public function getnumusers(){
        $query = "SELECT * FROM users";
        $run = mysqli_query($this->conn, $query);
        $result = mysqli_num_rows($run);
        return $result;
    }
    public function getnumcommments(){
        $query = "SELECT * FROM comments WHERE status='Approved'";
        $run = mysqli_query($this->conn, $query);
        $result = mysqli_num_rows($run);
        return $result;
    }
    public function getnumcategories(){
        $query = "SELECT * FROM category";
        $run = mysqli_query($this->conn, $query);
        $result = mysqli_num_rows($run);
        return $result;
    }
}