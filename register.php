<?php
$conn = mysqli_connect("localhost","root","","kkk");
if($conn)
{
echo "Connected to database!!!";
}
else
{
echo "Failed to Connect:".mysqli_error();
mysqli_select_db($conn,"kkk") or die("No Database existing:".mysqli_error());
}
$name=$_POST['name'];
$pass=$_POST['pass'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$registration_no=$_POST['register'];
if (($name=="")||($email=="")||($pass=="")||($phone=="")||($registration_no=="") )
{
echo "<script>alert('All fields are required, please fill again.');</script>";

header( "refresh:1;url=register.html" );

}
else
{

$checktable = mysqli_query($conn,"SHOW TABLES LIKE'register'");

$table_exists = mysqli_num_rows($checktable) > 0;
if(!$table_exists)
{
$sql = "CREATE TABLE register(name VARCHAR(30),pass

VARCHAR(40),email VARCHAR(40),phone VARCHAR(40),registration_no VARCHAR(40))";

mysqli_query($conn,$sql);

$sql="INSERT INTO register (`name`,`pass`, `email`,`phone`,`registration_no`) VALUES ( '$name', '$pass','$email','$phone',$registration_no)";
mysqli_query($conn,$sql);
echo "<script>alert('Registration successful');</script>";
}
else
{

$sql="INSERT INTO register (`name`,`pass`, `email`,`phone`,`registration_no`) VALUES ( '$name', '$pass','$email','$phone','$registration_no')";

echo $sql;
echo '<br><br>';
echo '<center><a href="index.html">login here</a></center>';
mysqli_query($conn,$sql);
echo "<script>alert('Registration successful');</script>";
}
}

?>