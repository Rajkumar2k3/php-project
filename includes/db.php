<?php 
$connection = mysqli_connect('localhost','root','','mr blog');
if(!$connection){
    echo 'not connected to database'. mysqli_error();
}
?>