    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">Rajkamal</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <?php 
                    
                    
                    $select_cat = "SELECT * FROM category LIMIT 3 ";
                    $navbar_result = mysqli_query($connection, $select_cat);

                    while ($row = mysqli_fetch_assoc($navbar_result)){
                        $cat_title = $row['category_title'];
                        $cat_id = $row['category_id'];

                        echo "  <li><a href='category.php?cat_id=$cat_id'>{$cat_title}</a></li>";
    
                    }
                    ?>
                     <li>
                        <a href="../admin/login.php">Login</a>
                    </li>
                    <li>
                        <a href="../admin/index.php">Admin</a>
                    </li>
                    <?php 
                        if(isset($_SESSION['role'])){
                            if(isset($_GET['post'])){
                                $edit_post_id=$_GET['post'];
                                echo "<li>
                                        <a href='../admin/posts.php?page=edit_posts&post_id=$edit_post_id'>Edite</a>
                                      </li>";
                            }
                        }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Header -->