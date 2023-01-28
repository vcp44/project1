<?php
$conn = mysqli_connect("localhost","root","","kkk");
if($conn)
echo "Connected to database!!!";
else
echo "Failed to Connect:".mysqli_error(); 
mysqli_select_db($conn,"kkk") or die("No Database existing:" .mysqli_error());
$name=$_REQUEST['name'];
$pass=$_REQUEST['pass'];
        $sql="SELECT email,phone FROM register WHERE name='$name' and pass='$pass'";
            $result= mysqli_query($conn,$sql);   
            $count= mysqli_num_rows($result);
if($count==1)
{
    $row = mysqli_fetch_assoc($result);
        echo "<center> <h1>WELCOME</h1> </center> <br> <br>";
        echo "USER_NAME: ".$name."<br>";
        echo "EMAIL ID: ".$row['email']."<br>";        
        echo '<a href="mainnn.html">home page</a>';
        echo "<center><form action='index.html'><input type='submit' value='LOGOUT'/></form></center>";
        

} 

else{
    echo "<script> alert('invalid details!');</script>";
    header( "refresh:1;url=index.html" );
}
?>