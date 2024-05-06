<?php 
  include("header.php");
  include("connection.php");
?>
 <body>
    <nav>
      <p>Multiuser Based Login System</p>
    </nav>
    <div class="container">
      <div class="content">
        <h3>Registration</h3>
        <hr>
        <?php
          if(isset($_POST['submit'])){
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            // image upload
            $file_name = $_FILES['image']['name'];
            $file_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $file_size = $_FILES['image']['size'];
            $folder = 'profile_pic/' . $file_name;
            move_uploaded_file($tmp_name,$folder);
            // image upload
            $password = mysqli_real_escape_string($con, md5($_POST['password']));
            $re_password = mysqli_real_escape_string($con, md5($_POST['re_password']));
            //$password_len = strlen($password);
            if(empty($name) || empty($email) || empty($file_name) || empty($password)){
              $error = "<h4 class='text-danger'>Please! Fill Out the Form</h4>";
              
            }
            else{
              $sql = "SELECT* FROM `user` WHERE `email`='$email'";
              $query = mysqli_query($con, $sql);
              $row = mysqli_num_rows($query);
              if($row>0){
                $msg = "<h4 class='text-danger'>This email address already exist.Pleaser try again!</h4>";
              }
              
              elseif($password != $re_password){
                $msg = "<h4 class='text-danger'>Password didn't match</h4>";
              }
              else{
                  $sql_insert = "INSERT INTO `user`(`name`, `email`, `file`, `password`, `re_password`)
                                VALUES('$name', '$email', '$file_name', '$password', '$re_password')";
                $query_insert = mysqli_query($con, $sql_insert);
                if($sql_insert){
                  $msg = "<h4 class='text-success'>Successfully Registered! Please go to login page.</h4>";
                }
                else{
                  $msg = "<h4 class='text-danger'>There is something problem. Please try again!</h4>";
                }
                }
                
              }
            }
        ?>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data" autocomplete="off">
            <?php 
              echo @$error;
              echo @$msg;
            ?>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="email" name="name">
            </div>
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
              <label for="image">Profile:</label>
              <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="password">
            </div>
            <div class="form-group">
                <label for="pwd">Re-type Password:</label>
                <input type="password" class="form-control" id="re-type" name="re_password">
            </div>
            
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
        </form>
        <br>
        <p>Already a Member? <a href="index.php"> Login</a></p>

      </div>
    </div>
  </body>
</html>
