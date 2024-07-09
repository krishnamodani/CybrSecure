<?php
session_start();
if(isset($_SESSION['custno'])){
    echo "available";
} else {
    echo "not_available";
}
?>