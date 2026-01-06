<?php
require '../../helpers/init_conn_db.php';
session_start();
if(isset($_SESSION['adminId'])) {
    if(isset($_POST['dep_but'])) {
        $flight_id = $_POST['flight_id'];
        $sql = "UPDATE Flight SET status='dep' WHERE flight_id=?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,'i',$flight_id);         
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header('Location: ../../admin/index.php');
        exit();
    } else if(isset($_POST['arr_but'])) {
      $flight_id = $_POST['flight_id'];
      $sql = "UPDATE Flight SET status='arr'WHERE flight_id=?";
      $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt,$sql);
      mysqli_stmt_bind_param($stmt,'i',$flight_id);         
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
      header('Location: ../../admin/index.php');
      exit();
    } else {
        header('Location: ../../admin/index.php');
        exit();
    }
}else {
    header('Location: ../../admin/index.php');
    exit();
}