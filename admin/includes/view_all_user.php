<div class="content-wrapper">
    <div class="row">
        <section class="col-lg-12 connectedSortable">
            <div class="container-fluid">
                <div class = "card shadow mb-3">
                    <div class = "card-header py-3">
                        <h4 class = "m-0 font-weight-bold text-primary">View All Users</h4>
                    </div>
                        <div class = "card-body">
                            <table class = "table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Admin</th>
                                        <th>Subscriber</th>
                                        <th>Delete </th>
                                    </tr>
                                </thead>
                            <tbody>
                            <?php 
                                $select_all_query = "SELECT * FROM users";
                                $select_all_result = mysqli_query($connection,$select_all_query);

                                while($row=mysqli_fetch_assoc($select_all_result)){
                                $user_id = $row['user_id']; 
                                $user_name = $row['user_name'];
                                $user_email = $row['user_email'];
                                $user_role = $row['user_role'];
                             
                            echo   "<tr>
                                    <td>{$user_id}</td>
                                    <td>{$user_name}</td>
                                    <td>{$user_email}</td>   
                                    <td>{$user_role}</td>              
                                    <td><a href='user.php?admin={$user_id}'>Admin</a></td>               
                                    <td><a href='user.php?subscriber={$user_id}'>Subscriber</a></td>
                                    <td><a href='user.php?delete={$user_id}'>Delete</a></td>
                                </tr>";
                             }

                             if(isset($_GET['admin'])){
                                $admin_user_id= $_GET['admin'];
                                $admin_user_query="UPDATE users SET user_role='admin' WHERE user_id = $admin_user_id";
                                $admin_user_result = mysqli_query($connection, $admin_user_query);
                                header('location:user.php');
                            } 
                            
                            if(isset($_GET['subscriber'])){
                                $subscriber_id= $_GET['subscriber'];
                                $subscriber_user_query="UPDATE users SET user_role='subscriber' WHERE user_id = $subscriber_id";
                                $subscriber_user_result = mysqli_query($connection, $subscriber_user_query);
                                header('location:user.php');
                            }

                             if(isset($_GET['delete'])){
                                $delete_id= $_GET['delete'];
                                $delete_user_query="DELETE FROM users WHERE user_id = $delete_id";
                                $delete_user_result = mysqli_query($connection, $delete_user_query);
                                header('location:user.php');
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