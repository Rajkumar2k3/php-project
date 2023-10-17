   <?php
    ob_start();  
    include 'includes/header.php'; 
    include 'includes/navbar.php'; 
    include 'includes/sidebar.php'; 
    include '../includes/db.php';

    if(isset($_POST['submit'])){
      $cat_title = $_POST['cat_title'];
      if(empty($cat_title)){
        echo 'this field is empty';
      }
      else{
        $cat_insert_query = "INSERT INTO category(category_title) VALUES ('$cat_title')";
        $select_all_result = mysqli_query($connection,$cat_insert_query);
          if(!$select_all_result)
            {
               echo 'category is not inserted';
            }
      }
    }

    ?>
   <div class="content-wrapper">
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
            <div class="container-fluid">
                <div class ="row">
          <div class ="col-xl-6 col-lg-6" style="height:200px;">
      <div class ="card shadow mb-4">
        <div class ="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 clas ="m-0 font-weoght-bold text-primary">Add category</h6>
        </div>
        <div class ="card-body"> 
          <form action="category.php" method="post">
            <input type="text" class = "form-control" name = "cat_title"><br>
            <input type="submit" class ="btn btn-primary" value="submit" name ="submit">
          </form>
        </div>
      </div>
  </div>
  <div class ="col-xl-6 col-lg-6">
  <div class ="card shadow mb-4">
  <div class ="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class ="m-0 font-weight-bold text-primary">All category</h6>
    <div class="dropdown no-arrow">
    </div>  
</div>
<div class ="card-body">
  <table class ="table table-bordered table-hover">
    <thead>
      <tr>
         
        <th>category</th>
        <th>Remove</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $select_all_query = "SELECT * FROM category";
    $select_all_result = mysqli_query($connection,$select_all_query);

    while($row=mysqli_fetch_assoc($select_all_result)){
      $cat_id = $row['category_id']; 
      $cat_title = $row['category_title'];
      echo "<tr>
        
              <td>{$cat_title}</td>
              <td><a href='category.php?delete={$cat_id}'>Delete</a></td>
              <td><a href='category.php?edit={$cat_id}'>Edit</a></td>
            </tr>";
    }
    ?>
    </tbody>
  </table>
</div>
  </div>
</div>
   </div>       
   </div>
            </section>
    </div>
  </div>

<?php

      if(isset($_GET['edit'])){
        $edit_cat_id = $_GET['edit'];
        $edit_cat_query = "SELECT * FROM category WHERE category_id = $edit_cat_id";
        $edit_cat_result = mysqli_query($connection,$edit_cat_query);
    
        while($row=mysqli_fetch_assoc($edit_cat_result)){
          $cat_id = $row['category_id']; 
          $cat_title = $row['category_title'];
          ?>
          <div class="content-wrapper">
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
            <div class="container-fluid">
                <div class ="row">
          <div class ="col-xl-6 col-lg-6" style="height:200px;">
      <div class ="card shadow mb-4">
        <div class ="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 clas ="m-0 font-weoght-bold text-primary">Edit category</h6>
        </div>
        <div class ="card-body"> 
          <form action="category.php?id=<?php echo $cat_id ;?>" method="post">
            <input type="text" class = "form-control" value = "<?php echo $cat_title;?>" name = "cat_title"><br>
            <input type="submit" class ="btn btn-primary" value="edit" name ="edit">
          </form>
        </div>
      </div>
  </div>
    <?php }} ?>
      
    <?php
      if(isset($_POST['edit'])){
        $update_cat_title = $_POST['cat_title'];
        $update_cat_id = $_GET['id'];

        $update_cat_query = "UPDATE category SET category_title = '$update_cat_title' WHERE category_id = '$update_cat_id'";
        $update_cat_result = mysqli_query($connection, $update_cat_query);

        if(!$update_cat_result){
          die('Query failed').mysqli_error;
        }
        else{
          header('location:category.php');
        }
      }
      ?>

      <?php
      if(isset($_GET['delete'])){
        $cat_delete = $_GET['delete'];
        $cat_delete_query = "DELETE FROM category WHERE category_id = $cat_delete";
        $cat_delete_result = mysqli_query($connection, $cat_delete_query);
        header('location: category.php');
      }


    ?>