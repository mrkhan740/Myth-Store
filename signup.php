<?php
session_start();
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname= "signup";

$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
if(mysqli_connect_error())
{
die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else
{
$SELECT="SELECT email from register where email = ? Limit 1";
$INSERT="INSERT into register (username,email,password,password2)values(?,?,?,?)";

$stmt=$conn->prepare($SELECT);
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum=$stmt->num_rows;

if($rnum==0)
{
$stmt->close();
$stmt=$conn->prepare($INSERT);
$stmt->bind_param("ssss",$username,$email,$password,$password2);
$stmt->execute();
echo'<a href="start.html">Register Successfully!!!! </a>';
}else
{
echo "Email already Exist";
}
$stmt->close();
$conn->close();
}