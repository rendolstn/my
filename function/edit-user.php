<?php
    require_once('session.php');
    $postID = $_POST['postID'];
    $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
    $re_pass = $_POST['pass'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    if($re_pass == ''){
        $query = mysqli_query($conn,"UPDATE `tb_user` SET `full_name` = '$full_name', `no_hp` = '$no_hp', `email` ='$email' WHERE cuid = '$postID'") or die(mysqli_error());
        header('location:../e_user/?notif=1');
    }
    else {
        $query = mysqli_query($conn,"UPDATE `tb_user` SET `pass` = '$pass', `full_name` = '$full_name', `no_hp` = '$no_hp', `email` ='$email' WHERE cuid = '$postID'") or die(mysqli_error());
        $_SESSION['user'] == '';
        unset($_SESSION['user']);
        session_destroy();
        header('location:../');
    }
    
    
?>