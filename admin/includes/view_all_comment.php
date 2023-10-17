<div class="content-wrapper">
    <div class="row">
        <section class="col-lg-12 connectedSortable">
            <div class="container-fluid">
                <div class = "card shadow mb-3">
                    <div class = "card-header py-3">
                        <h4 class = "m-0 font-weight-bold text-primary">View All comments</h4>
                    </div>
                        <div class = "card-body">
                            <table class = "table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Author</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Post</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Approve</th>
                                        <th>Unapprove</th>
                                        <th>Delete </th>
                                    </tr>
                                </thead>
                            <tbody>
                            <?php 
                                $select_all_query = "SELECT * FROM comment";
                                $select_all_result = mysqli_query($connection,$select_all_query);

                                while($row=mysqli_fetch_assoc($select_all_result)){
                                $comment_id = $row['comment_id']; 
                                $comment_post_id = $row['comment_post_id'];
                                $comment_author = $row['comment_author'];
                                $comment_email = $row['comment_email'];
                                $comment_content = $row['comment_content'];
                                $comment_status = $row['comment_status'];
                                $comment_date = $row['comment_date'];
                                
                            echo   "<tr>
                                    <td>{$comment_id}</td>
                                    <td>{$comment_author}</td>
                                    <td>{$comment_email}</td>
                                    <td>{$comment_content}</td>";

                                    $select_comment_query = "SELECT * FROM posts WHERE post_id=$comment_post_id";
                                    $select_comment_result = mysqli_query($connection,$select_comment_query);
                                    
                                    while($row=mysqli_fetch_assoc($select_comment_result)){
                                    $post_id = $row['post_id']; 
                                    $post_title = $row['post_title'];
                            echo    "<td><a href='../post.php?post={$post_id}'>{$post_title}</a></td>";


                            echo    "<td>{$comment_status}</td>
                                    <td>{$comment_date}</td>
                                    <td><a href='comment.php?approved={$comment_id}'>Approve</a></td>
                                    <td><a href='comment.php?unapproved={$comment_id}'>Unapprove</a></td>
                                    <td><a href='comment.php?delete={$comment_id}'>Delete</a></td>
                                </tr>";
                            }
                             }
                             if(isset($_GET['approved'])){
                                $approve_comment_id=($_GET['approved']);
                                $approve_query="UPDATE comment SET comment_status='approved' WHERE comment_id=$approve_comment_id";
                                $approve_result=mysqli_query($connection,$approve_query);
                                if(!$approve_result){
                                    echo 'Query failed'.mysqli_error;
                                }else{
                                    header('location:comment.php');
                                }
                             }
                             if(isset($_GET['unapproved'])){
                                $unapprove_comment_id=($_GET['unapproved']);
                                $unapprove_query="UPDATE comment SET comment_status='unapproved' WHERE comment_id=$unapprove_comment_id";
                                $unapprove_result=mysqli_query($connection,$unapprove_query);
                                if(!$unapprove_result){
                                    echo 'Query failed'.mysqli_error;
                                }else{
                                    header('location:comment.php');
                                }
                             }

                             if(isset($_GET['delete'])){
                                $delete_commant_id= $_GET['delete'];
                                $delete_post_query="DELETE FROM comment WHERE comment_id= $delete_commant_id";
                                $delete_post_result = mysqli_query($connection, $delete_post_query);
                                header('location:comment.php');
                            }
                             ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>