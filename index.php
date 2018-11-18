<?php

session_start();
if(isset($_SESSION['username']))
{
    if ($_SESSION['status_role']=='admin')
    {
        header("Location:client/user/admin/index.php");
    }
    else if($_SESSION['status_role']=='pemilik') {
        header("Location:client/user/pemilik/index.php");

    }else if($_SESSION['status_role']=='pencari') {
        header("Location:client/user/pencari/index.php");
    }
}
else {
    header("Location:client/user/umum/index.php");
}




?>