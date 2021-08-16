<?php 
session_start();
//LOGIN SESSION CHECK STARTS
if(isset($_SESSION['standard']) && isset($_SESSION['rollno'])){
    header('location:studentProfile.php');
}
elseif(!(isset($_SESSION['adminEmail']))){
header('location:adminLogin.php');
}
//LOGIN SESSION CHECK ENDS
include_once($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/src/dbconn.php");
$return = "";
if(!empty($_POST['standard_id_arr'])){
    $sql ="INSERT INTO `exams` (`exam_name`) VALUES ('{$_POST['exam_name']}')";
    if($conn->query($sql)){
        $result = $conn->query("SELECT `exam_id` FROM `exams` WHERE `exam_name`='{$_POST['exam_name']}'");
        $r = $result->fetch_assoc();
        $standard_id_arr = $_POST['standard_id_arr'];
        foreach($standard_id_arr as $standard_id){
            $sql = "INSERT INTO `standard-exm`(`exam_id`, `standard_id`) VALUES ({$r['exam_id']},$standard_id)";
            if($conn->query($sql)){
                $return = "'success'";
            }
            else{
                $return = "'fail'";
            }
        }
        header('location:../../public/adminAddExam.php?return='.$return);
    }
    else{
        header('location:../../public/adminAddExam.php?return=\'fail\'');
    }
}
else{
    echo "Array was empty'";
    header('location:../../public/adminAddExam.php?return=\'arrEmpty\'');
}
?>
