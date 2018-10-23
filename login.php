<?php
error_reporting(0);
session_start();
if($_SESSION['uid'])
{
    header('location:admin/admindash.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
</head>
<body>
    <h1 align="center">Admin Login</h1>
<form action""login.php" method="post">
    <table align="center">
        <tr>
            <td>username</td><td><input type="text" name="uname"></td>
        </tr>
        <tr>
            <td>password</td><td><input type="password" name="pass"></td>
        </tr>
        <tr>
            <td colsspan="2" align="center" style="margin-left:22%" ><input type="submit" name="login" value="Login"></td>
        </tr>

    </table>
</form>
</body>
</html>

<?php
include ('dbcon.php');

if(isset($_POST['login']))
{
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $qry="SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
    $run=mysqli_query($con,$qry);
    $row = mysqli_num_rows($run);
    if($row <1)
    {
        ?>

       <script> alert('Username or Password not match !!');
        
        window.open('login.php','_self');
        </script>  
    <?php
    }
    else
    {
        $data=mysqli_fetch_assoc($run);
        $id=$data['id'];
        
        
        $_SESSION['uid']=$id;
        header('location:admin/admindash.php');
    }


}


?>