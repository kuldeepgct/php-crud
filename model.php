<?php
class Model{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'crud';
    private $conn;

    function __construct(){
        $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
       if($this->conn->connect_error){
        echo "Connection failed";
       } 
       else{
        // echo "connected";
        return $this->conn;
       }
    }
    public function insertRecord($post){
        // print_r($post);
        $fname = $post['fname'];
        $lname = $post['lname'];
        $gender = $post['gender'];
        $email = $post['email'];
        $birthdate = $post['bdate'];
        $dept = $post['dept'];
    
        $filename= $_FILES["image"]["name"];
        $tempname=$_FILES['image']['tmp_name']; 
        $folder = "images/".$filename;
        move_uploaded_file($tempname, $folder);
        $sql = "INSERT INTO student1(FirstName,LastName,Gender,Email,Birthdate,DeptName,Image)VALUES('$fname', '$lname', '$gender', '$email', '$birthdate', '$dept','$folder')";
        $result = $this->conn->query($sql);
        if($result){
        
            header('location:insert.php');
        }
    }
}
?>