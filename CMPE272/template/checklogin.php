
<?php
include('../content/users_dbh.php');
if (isset($_POST['submit'])
    && !empty($_POST['uid'])
    && !empty($_POST['pwd'])) {
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    echo 'SELECT * FROM users WHERE uid = "'.$uid.'" and user_password = "'.$pwd.'"';
    $result = mysqli_query($conn, 'SELECT * FROM users WHERE uid = "' . $uid .'" and user_password = "' . $pwd .'"');
    //$result = mysqli_query($conn, 'SELECT * FROM users');
    $resultCheck = mysqli_num_rows($result);
    echo $result;
    if ($resultCheck > 0) {
        session_start();
        $_SESSION['username'] = $uid;
        header("Location: ../index.php");
        exit;
    } else {
        //echo 'fail';
        
        header("Location: login.php");
        exit;
    }


    //$result = mysqli_query($conn, "INSERT INTO users (user_name,user_pwd)VALUES ('$uid','$pwd')");
    //header("Location: http://localhost:8080/chef/index.php");

    //mysqli_close($conn);
}
?>
