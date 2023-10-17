<?php 
ob_start();
    include 'includes/header.php'; 
    include 'includes/navbar.php'; 
    include 'includes/sidebar.php'; 
    include '../includes/db.php';

?>
<div class = "container-fluid">
    <?php 

        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else{
         $page = '';   
        }
        switch($page){
            case 'add_posts';
            include 'includes/add_posts.php';
            break;

            case 'edit_posts';
            include 'includes/edit_posts.php';
            break;

            default:
            include 'includes/edit_profile.php';
            break;
        }

    ?>
</div>