<?php
if(isset($_POST['add_new_post']) && isset($_FILES['post_image'])){
$post_title = $_POST['post_title'];
$post_category_id = $_POST['post_category_id'];
$post_author = $_POST['post_author'];
$post_status = $_POST['post_status'];
$post_tags = $_POST['post_tags'];
$post_content = $_POST['post_content'];
$post_date = date('y-m-d');
$post_comment_count = 4;  

$post_image =$_FILES["post_image"]["name"];
$post_image_tmp = $_FILES["post_image"]["tmp_name"];
// echo $post_image;
// print_r($post_image_tmp);
move_uploaded_file($post_image_tmp,"../img/$post_image");

$create_post_query="INSERT INTO posts (post_title, post_content, post_author, post_date, post_tags, post_category_id,post_comment_count,post_status,post_image) VALUES  ('$post_title','$post_content','$post_author', now(),'$post_tags',$post_category_id, $post_comment_count,'$post_status','$post_image')";
$create_post_result=mysqli_query($connection,$create_post_query);
if(!$create_post_result){
    echo('Query failed').mysqli_error;
}else{
    header('location:posts.php');
}

}

?>

<div class="content-wrapper">
    <div class="row">
        <section class="col-lg-12 connectedSortable">
            <div class="container-fluid">
                <div class = "card shadow mb-3">
                <div class = "container-fluid">   
                    <div class = "card shadow mb-4">
                            <div class = "card-header py-3">
                                <h6 class = "m-0 font-weight-bold text-primary">Add Posts</h6>
                            </div>
                            <div class = "card-body">
                                <form action="posts.php?page=add_posts" method ="post" enctype ="multipart/form-data">
                                    <div class = "form-group">
                                        <label for="title">Post Title</label>
                                        <input type="text" value="" class="form-control" name="post_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Post Category Id</label><br>
                                        <select name="post_category_id" id="">
                                            <?php 
                                            
                                            $select_all_query = "SELECT * FROM category";
                                            $select_all_result = mysqli_query($connection,$select_all_query);

                                            while($row=mysqli_fetch_assoc($select_all_result)){
                                                $cat_id = $row['category_id']; 
                                                $cat_title = $row['category_title'];
                                                
                                                echo "<option value='$cat_id'>$cat_title</option>";
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Post Author</label>
                                        <input type="text" value="" class="form-control" name="post_author">
                                    </div>
                                    <div class="form-group"> 
                                        <label for="title">Post Image</label>
                                        <!-- <img width="200px" src="img/image1.jpg" alt="" srcset=""> -->
                                        <input type="file" value="" class="form-control" name="post_image">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Post Status</label><br>
                                        <select name="post_status" id="">
                                            <option value="published">published</option>
                                            <option value="unpublished">unpublished</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Post Tags</label>
                                        <input type="text" value="" class="form-control" name="post_tags">
                                    </div>
                                    <div class="form-group">
                                        <label for="post_content">Post Content</label>
                                        <textarea name="post_content" id="" cols="30" rows="8" class="form-control" value="" ></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="publish post" class="btn btn-primary" name="add_new_post">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </section>
</div>
