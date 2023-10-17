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
<?php include 'includes/header.php' ?>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">            
                <?php 
             
                    $select_posts = "SELECT * FROM posts WHERE post_status='published'";
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
                            <p class='post-meta'>Posted by <a href='*'><?php echo $post_author ?></a> on  &rarr; <?php echo $post_date ?></p>
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