<?php

$username=$_POST['username'];
$password=$_POST['password'];

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname= "signup";

$link=mysqli_connect($host,$dbUsername,$dbPassword,$dbname) or die($link);
if(mysqli_connect_error())
{
die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else
{
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($link,$username);
$password = mysqli_real_escape_string($link,$password);

$result = mysqli_query($link,"select * from register where username = '$username' and password ='$password'")or die("Failed to query database".mysql_error());
$row = mysqli_fetch_array($result);
if ($row['username']==$username && $row['password'] == $password) {
echo'<a href="page.html">Login Successfull !!!! </a>';
}else {
echo "Failed to Login";
}
} 
?>