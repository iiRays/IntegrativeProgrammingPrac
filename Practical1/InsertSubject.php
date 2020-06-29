<?php
include "DBUtil.php";

$conn = new mysqli("localhost", "root", "", "collegedb");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$code = isset($_POST['code']) ? $_POST['code']  : null;
$title = isset($_POST['title']) ? $_POST['title']  : null;
$credit = isset($_POST['credit']) ? $_POST['credit']  : null;
$year = isset($_POST['year']) ? $_POST['year']  : null;

$subject = new Subject($code, $title, $credit, $year);
echo "code is $code";
if(DBUtil::insert($subject)){
    //Success
    echo "Successful insert!";
}else{
    //Error
    echo "Cannot insert into DB:<br>" . $conn->error;
}

$conn->close();

//redirect to show results
header("Location: DisplaySubjects.php");
?>

<html>
    <body>
        <table></table>
    </body>
</html>




