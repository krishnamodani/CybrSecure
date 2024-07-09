<?php
session_start();
if(isset($_SESSION['custno'])){
    header("Location: forum.php");
}
else{
    header("Location: forumpresignup.php");
}