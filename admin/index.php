  <?php include 'includes/header.php'; ?>
  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/sidebar.php'; ?> 
  <?php include '../includes/db.php'; ?> 
   <!-- Right side column. Contains the navbar and content of the page -->
   <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            HI <?php echo $_SESSION['user_name'];?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php 
                  $post_query="SELECT * FROM posts";
                  $post_result=mysqli_query($connection,$post_query);
                  $post_final_result=mysqli_num_rows($post_result);
                    echo $post_final_result;
                  ?></h3>
                  <p>Posts</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="posts.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php 
                  $category_query="SELECT * FROM category";
                  $category_result=mysqli_query($connection,$category_query);
                  $category_final_result=mysqli_num_rows($category_result);
                    echo $category_final_result;
                  ?></h3>
                  <p>Category</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="category.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php 
                  $users_query="SELECT * FROM users";
                  $users_result=mysqli_query($connection,$users_query);
                  $users_final_result=mysqli_num_rows($users_result);
                    echo $users_final_result;
                  ?></h3>
                  <p>Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="profile.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php 
                  $comment_query="SELECT * FROM comment";
                  $comment_result=mysqli_query($connection,$comment_query);
                  $comment_final_result=mysqli_num_rows($comment_result);
                    echo $comment_final_result;
                  ?></h3>
                  <p>All comment</p>
                </div>
                <div class="icon">
                  <i class="fa fa-comment" aria-hidden="true"></i>
                </div>
                <a href="comment" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <?php 
            $post_un_query="SELECT * FROM posts WHERE post_status='unpublished'";
            $post_un_result=mysqli_query($connection,$post_un_query);
            $post_un_final_result=mysqli_num_rows($post_un_result);

            $comment_un_query="SELECT * FROM comment WHERE comment_status='unapprove'";
            $comment_un_result=mysqli_query($connection,$comment_un_query);
            $comment_un_final_result=mysqli_num_rows($comment_un_result);
          ?>
          <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Total' ],
          <?php 
          echo"['Posts',$post_final_result],"; 
          echo"['UnPosts',$post_un_final_result],"; 
          echo"['category',$category_final_result],";
          echo"['users',$users_final_result],";
          echo"['comment',$comment_final_result]";
            
          ?>
        ]);

        var options = {
          chart: {
            title: 'Website Details',
            subtitle: 'Posts,Category,Users,Commands',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
        <div id="columnchart_material" style="width: auto; height: 500px;"></div>

        </section>
     </div>
      <?php include 'includes/footer.php' ?>
    