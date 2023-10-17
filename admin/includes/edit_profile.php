<?php
if(isset($_SESSION['user_email'])){
    $user_email=$_SESSION['user_email'];
    $select_all_query = "SELECT * FROM users WHERE user_email = '$user_email'";
    $select_all_result = mysqli_query($connection,$select_all_query);

    while($row=mysqli_fetch_assoc($select_all_result)){
    $user_name = $row['user_name']; 
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $password = $row['password'];
    $_SESSION['user_image']=$user_image;
}
}
if(isset($_POST['update_user_details']) && isset($_FILES['user_image'])){
    $update_user_name = $_POST['user_name'];
    $update_user_email = $_POST['user_email'];
    $update_user_password = $_POST['password'];
    $update_user_image =$_FILES["user_image"]["name"];
$update_user_image_tmp = $_FILES["user_image"]["tmp_name"];
// echo $post_image;
// print_r($post_image_tmp);
move_uploaded_file($update_user_image_tmp,"../img/$update_user_image");

if(empty($update_user_image)){
    $image_no_image_query = "SELECT * FROM users WHERE user_email='$update_user_email'";
    $image_no_image_result = mysqli_query($connection,$image_no_image_query);
    while($row = mysqli_fetch_assoc($image_no_image_result)){
        $update_user_image =$row['user_image'];
    }
}

$update_user_details_query="UPDATE users SET user_name='$update_user_name',user_email='$update_user_email',user_image='$update_user_image', password='$update_user_password' WHERE user_email='$update_user_email'";
$update_user_details_result=mysqli_query($connection,$update_user_details_query);
if(!$update_user_details_result){
    echo('Query failed').mysqli_error;
}else{
    header('location:profile.php');
}}
?>

<div class="content-wrapper">
    <div class="row">
        <section class="col-lg-12 connectedSortable">
            <div class="container-fluid">
                <div class = "card shadow mb-3">
                <div class = "container-fluid">   
                    <div class = "card shadow mb-4">
                            <div class = "card-header py-3">
                                <h6 class = "m-0 font-weight-bold text-primary">Edit Profile</h6>
                            </div>
                            <div class = "card-body">
                                <form action="profile.php" method ="post" enctype ="multipart/form-data">
                                    <div class = "form-group">
                                        <label for="title">User Name</label>
                                        <input type="text" value="<?php echo $user_name ?>" class="form-control" name="user_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Email</label>
                                        <input type="text" value="<?php echo $user_email ?>" class="form-control" name="user_email">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">User Image</label>
                                        <input type="file" value="<?php echo $user_image ?>" class="form-control" name="user_image">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Password</label>
                                        <input type="password" value="<?php echo $password ?>" class="form-control" name="password">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Update Profile" class="btn btn-primary" name="update_user_details">
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
