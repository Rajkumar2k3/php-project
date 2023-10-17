<?php
include 'includes/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head> 
<?php include 'includes/head.php' ?>
<style>
    .commands_container{
        border:10px solid #ccc;
        background-color:#eee;
        border-radius: 15px;
        padding:12px;
        margin:2px 0;
        font-size:15px;
    }
    .conainer img{
        float:left;
    }
</style>
</head>
<body>
<?php include 'includes/navbar.php' ?>


<?php 
            if(isset($_GET['post'])){
                $post_id=$_GET['post'];
            }


                    $select_all_query = "SELECT * FROM posts WHERE post_id=$post_id";
                    $select_all_result = mysqli_query($connection,$select_all_query);

                     while($row=mysqli_fetch_assoc($select_all_result)){
                         $post_id = $row['post_id']; 
                         $post_title = $row['post_title'];
                         $post_content = $row['post_content'];
                         $post_author = $row['post_author'];
                         $post_date = $row['post_date'];
                         $post_tags = $row['post_tags'];
                         $post_category_id = $row['post_category_id'];
                         $post_comment_count = $row['post_comment_count'];
                         $post_status = $row['post_status'];
                         $post_image = $row['post_image'];
                                }
                                
                ?>

    <header class="intro-header" style="background-image: url('img/<?php echo $post_image ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h2 class="subheading"><?php echo $post_title ?></h2>
                        <span class="meta">Posted by <a href="#"><?php echo $post_author ?></a> on <?php echo $post_date ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php echo $post_content ?>
                </div>
            </div>
        </div>
    </article>
    <hr>
    <div class=container>
   
    <h4>Commands</h4>

    <?php 
    $select_all_query = "SELECT * FROM comment WHERE comment_post_id=$post_id AND comment_status='approved'";
    $select_all_result = mysqli_query($connection,$select_all_query);

    while($row=mysqli_fetch_assoc($select_all_result)){
    $comment_author = $row['comment_author'];
    $comment_content = $row['comment_content'];
    $comment_date = $row['comment_date'];
    ?>
<div class="commands_container">
            <img width="90px"  src="img/comment_image.jpg" alt="Avatar">
            <h5><span><?php echo  $comment_author ?></span></h5>
            <p><?php echo  $comment_date ?></p>
            <p><?php echo $comment_content ?></p> 
        
</div>        
    <?php } ?>
    </div>
    <hr>
    <div class="comment-form">
    <div class="container">
        <h4>Leave a Comment</h4>
        <form action="post.php?post=<?php echo$post_id ?>" method="post">
            <div class="form-group form-inline">

            </div>
            <div class="form-group">
                <input type="text" class="form-control mb-10" name="author" placeholder="Name" required=""><br>
                <input type="text" class="form-control mb-10" name="email" placeholder="Email" required=""><br>
                <textarea name="messsage" placeholder="Message" id=""  rows="5"
                class ="form-control mb-10" onfocus="this.placeholder=''" onblur="this.placeholder='Message'" required=""></textarea><br>
                <input type="submit" value="Send Message" name="create_comment" class="primary-btn submit-btn text-uppercase">
            </div>
        </form>
    </div>
    </div>
    <?php 
    if(isset($_POST['create_comment'])){
        $comment_author = $_POST['author'];
        $comment_email = $_POST['email'];
        $comment_message = $_POST['messsage'];
        $comment_status = 'unapprove';
        $comment_date = date('y-m-d'); 


        $create_commant_query="INSERT INTO comment (comment_post_id,comment_author,comment_email,comment_content,comment_date,comment_status) VALUES ($post_id,'$comment_author','$comment_email','$comment_message',now(),'$comment_status')";
        $create_commant_result=mysqli_query($connection,$create_commant_query);
        if(!$create_commant_result){
            echo "Query failed".mysqli_error;
        }else{
            header('location:post.php');
        }


        
    }
    ?>
        <?php include 'includes/footer.php'?>

</body>

</html>
