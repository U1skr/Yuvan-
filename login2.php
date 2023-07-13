<?php 
$uname=$_POST['UNAME'];
$upswd=$_POST['UPSWD'];
if (!empty($uname)&&!empty($upswd))
{ $host="localhost";
  $dbusername="root";
  $dbpassword=" ";
  $dbname="rephel";
 //create correction
 $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
 if(mysqli_connect_error())
 { die('connect error ('.mysqli_connect_errno().').mysqli_connect_error());
 }
 else 
 {//checking the user name 
 $SELECT="SELECT UNAME1 FROM REGSTER WHERE UNAME=? LIMIT" ;
 //PREPARE STATEMENT 
 $stmt=$conn->prepare($SELECT);
 $stmt->bind_param("s",$uname);
 $stmt->execute();
 $stmt->bind_result($uname);
 $stmt->store_result();
 $rnum=$stmt->num_rows;
 //checking user name 
 if($rnum==0)
 {$stmt->close();
 echo"user name no found<br>;
 }
 else
 {echo"user name found " <br>;
 $checking the username 
 $SELECT="SELECT upswd1 from REGSTER WHERE UNAME =?";
 //PREPARE STATEMENT
 $stmt=$conn->prepare($SELECT);
 $stmt->bind_param("s",$uname);
 $stmt->execute();
 $stmt->bind_result($pswd);
 $stmt->fetch();
 echo"<br> registered  password:" .$pswd;
echo"<br> entered password:".$upswd;
if ($upswd==$pswd)
{echo "<br>correct password <br> successfullly logged in ";}
else{
echo"<br>incorrect password";}
$stmt->close();
$conn->close();
}}
else{
echo"all files need to be filled ";
die();
}
?>