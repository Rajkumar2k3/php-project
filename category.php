<?php
include 'includes/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head> 
<?php include 'includes/head.php' ?>
</head>
<body>
<?php include 'includes/navbar.php' ?>


<?php 
if(isset($_GET['cat_id'])){
$img_category_id = $_GET['cat_id'];
}
$select_all_query = "SELECT * FROM posts WHERE post_category_id=$img_category_id";
$select_all_result = mysqli_query($connection,$select_all_query);

 while($row=mysqli_fetch_assoc($select_all_result)){
     $post_image = $row['post_image'];
    }
    
          
?>

<header class="intro-header" style="background-image: url('img/<?php echo $post_image; ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Mr Blog</h1>
                        <hr class="small">
                        <span class="subheading">A Mr Blog Theme by Rajkamal</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">            
                <?php 
                if(isset($_GET['cat_id'])){
                    $cat_id = $_GET['cat_id'];
                } 
                    $select_posts = "SELECT * FROM posts WHERE post_category_id=$cat_id";
                    $poster_result = mysqli_query($connection, $select_posts);
                    while ($row = mysqli_fetch_assoc($poster_result)){
                        $post_title = $row['post_title'];
                        $post_content = substr($row['post_content'],0,50);
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];  
                        $post_id =$row['post_id']; 
                                   
                    ?>
                    <div class='post-preview'>
                            <a href='post.php?post=<?php echo $post_id ?>'>
                                <h2 class='post-title''>
                                   <?php echo $post_title ?>
                                </h2>
                                <h3 class='post-subtitle'>
                                <?php echo $post_content ?>
                                </h3>
                            </a>
                            <p class='post-meta'>Posted by <a href=''*'><?php echo $post_author ?></a> on  &rarr; <?php echo $post_date ?></p>
                        </div>
                        <hr>
                    <?php } ?>
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
<?php include 'includes/footer.php'?>
</body>
</html>                 