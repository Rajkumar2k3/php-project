<?php
if(isset($_POST['submitcheck'])){
    foreach($_POST['submitcheck'] as $submitcheckid){
        $select_option=$_POST['select_option'];
        switch($select_option){
            case'published';
            $published_query=" UPDATE posts SET post_status='$select_option' WHERE post_id=$submitcheckid";
            $update_post_status_result=mysqli_query($connection,$published_query);
            break;
            case'unpublished';
            $published_query=" UPDATE posts SET post_status='$select_option' WHERE post_id=$submitcheckid";
            $update_post_status_result=mysqli_query($connection,$published_query);
            break;
            case'delete';
            $delete_post_query="DELETE FROM posts WHERE post_id= $submitcheckid";
            $delete_post_result = mysqli_query($connection, $delete_post_query) ;
            break;
        }
    };
} 
?>
<div class="content-wrapper">
    <div class="row">
        <section class="col-lg-12 connectedSortable">
            <div class="container-fluid">
                <div class = "card shadow mb-3">
                    <div class = "card-header py-3">
                        <h4 class = "m-0 font-weight-bold text-primary">View All Posts</h4>
                    </div>
                        <div class = "card-body">
                        <form action="posts.php" method="post">
                            <table class = "table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Id</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>content</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Tags</th>
                                        <th>Comments</th>
                                        <th>Date</th>
                                        <th>Edit</th>
                                        <th>Delete </th>
                                    </tr>
                                </thead>
                            <tbody>
                            <?php 
                                $select_all_query = "SELECT * FROM posts";
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
                             
                            echo   "<tr>";
                            ?>
                                <td><input class="checkboxs" type="checkbox" name="submitcheck[]" value="<?php echo $post_id; ?>"></td>
                            <?php
                            echo "<td>{$post_id}</td>
                                    <td>{$post_author}</td>
                                    <td>{$post_title}</td>
                                    <td>{$post_content}</td>;
                                    <td><img width='100px' src='../img/$post_image' alt=''></td>";
                                    
                                    $select_all_cat_query = "SELECT * FROM category WHERE category_id=$post_category_id";
                                    $select_all_cat_result = mysqli_query($connection,$select_all_cat_query);

                                       while($row=mysqli_fetch_assoc($select_all_cat_result)){
                                        $cat_id = $row['category_id']; 
                                        $cat_title = $row['category_title'];
                                    echo "<td>{$cat_title}</td>";}
                                          
                            echo   "<td>{$post_status}</td>
                                    <td>{$post_tags}</td>";

                                    $comment_count_query="SELECT * FROM comment WHERE comment_post_id=$post_id AND comment_status='approved'";
                                    $comment_count_result=mysqli_query($connection,$comment_count_query);
                                    $comment_count=mysqli_num_rows($comment_count_result);
                            echo   "<td> $comment_count</td>";

                            echo   "<td>{$post_date}</td>
                                    <td><a href='posts.php?page=edit_posts&post_id={$post_id}'>Edit</a></td>
                                    <td><a href='posts.php?delete={$post_id}'>Delete</a></td>
                                </tr>";
                             }

                             if(isset($_GET['delete'])){
                                $delete_id= $_GET['delete'];
                                $delete_post_query="DELETE FROM posts WHERE post_id= $delete_id";
                                $delete_post_result = mysqli_query($connection, $delete_post_query);
                                header('location:posts.php');
                            }
                             ?>
                            </tbody>
                        </table>
                                <div class="row">
                                    <div class="col-xl-4" id="bulkoption">
                                        <select name="select_option" class="form-control">
                                            <option value="published">Publish</option>
                                            <option value="unpublished">Unpublish</option>
                                            <option value="delete">Delete</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="col-xl-4" style=align-center>
                                        <input type="submit" value="apply" name="submit" class="btn btn-sm btn-primary shadow=sm">
                                    </div>
                                </div>
                                <br> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
           
