<?php
require('dbconn.php');

$bookid=$_GET['id1'];
$email=$_GET['id2'];
$sql1="update LMS.record set Date_of_Issue=curdate(),Due_Date=date_add(curdate(),interval 60 day),Renewals_left=1 where BookId='$bookid' and Email='$email'";
 
if($conn->query($sql1) === TRUE) {
    $sql2="update LMS.book set Availability=Availability-1 where BookId='$bookid'";
    $result=$conn->query($sql2);
    $sql3="insert into LMS.message (Email,Msg,Date,Time) values ('$email','Your request for issue of BookId: $bookid  has been accepted',curdate(),curtime())";
    $result=$conn->query($sql3);
    echo "<script type='text/javascript'>alert('Success')</script>";
    header( "Refresh:0.01; url=issue_requests.php", true, 303);
} else {
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:1; url=issue_requests.php", true, 303);
}
?>