<?php
require('dbconn.php');

$bookid=$_GET['id1'];
$email=$_GET['id2'];

$sql1="update LMS.record set Due_Date=date_add(Due_Date,interval 60 day),Renewals_left=0 where BookId='$bookid' and Email='$email'";
 
if($conn->query($sql1) === TRUE)
{$sql2="delete from LMS.renew where BookId='$bookid' and Email='$email'";
 $result=$conn->query($sql2);
 
 $sql3="insert into LMS.message (Email,Msg,Date,Time) values ('$email','Your request for renewal of BookId: $bookid  has been accepted',curdate(),curtime())";
 $result=$conn->query($sql3);
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=renew_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:0.01; url=renew_requests.php", true, 303);

}
?>