  <!-- Left side column. contains the logo and sidebar -->
   <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
            <img src="../img/<?php echo $_SESSION['image']?>" width="20px" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['user_name']?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            </li>
            <li class="active treeview">
              <a href="posts.php">
                <i class="fa fa-dashboard"></i> <span>Posts</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="posts.php"><i class="fa fa-circle-o"></i>View All Posts</a></li>
                <li class="active"><a href="posts.php?page=add_posts"><i class="fa fa-circle-o"></i>Add New Posts</a></li>
              </ul>
            </li>
            <li class="active treeview">
              <a href="category.php">
                <i class="fa fa-dashboard"></i> <span>Catogries</span> </i>
              </a>
            </li>
            <li class="active treeview">
              <a href="comment.php">
                <i class="fa fa-dashboard"></i> <span>Comments</span> 
              </a>
            </li>
            <li class="active treeview">
              <a href="user.php">
                <i class="fa fa-dashboard"></i> <span>Users</span> 
              </a>
            </li>
            <li class="active treeview">
              <a href="profile.php">
                <i class="fa fa-dashboard"></i> <span>Profile</span> 
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
