<?php
session_start();

include 'connect.php';
echo "<br/>";

if (!empty($_POST['username'])&&!empty($_POST['password']))
{

    echo "success";
    $username=$_POST['username'];
    $password=$_POST['password'];

    $query=pg_query($link,"SELECT * FROM user_app WHERE username='$username' AND password='$password'");
    $rows=pg_num_rows($query);
    if ($rows==1)
    {

        // Memulai session

        // menyimpan informasi pada session
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;

        $row=pg_fetch_array($query);

        $roleuser=$row['status_role'];
        $_SESSION['status_role']=$roleuser;
        echo $roleuser;
        if ($roleuser=='admin')
        {

            header("Location:../client/user/admin/index.php");

        }else if($roleuser=='pemilik'){
            header("Location:../client/user/pemilik/index.php");

        }else if($roleuser=='pencari'){
                 header("Location:../client/user/pencari/index.php");
        }

        //Mengambil data type role username

    }
    else {
        echo "</br>Login Gagal";
    }
}
?>
