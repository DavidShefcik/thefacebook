<?php
    require('db_connect.php');
    $isyou = '';
    if(isset($_GET['uid'])) {
      $user_id = $_GET['uid'];
    } else {
        if (isset($_POST['submit']))
            $user_id = $_COOKIE['current_user_id'];
        else
            die('Please specify a user');
    }
    $qtext = "SELECT * FROM users WHERE id = $user_id";
    $query = mysqli_query($conn, $qtext);
    $info = mysqli_fetch_array($query);

    $plural = ($info['name'][strlen($info['name'])-1] == 's') ? '\'' : '\'s';

    $edit = false;
    //Editing the profile
    if(isset($_GET['edit']))
        $edit = true;
?>
