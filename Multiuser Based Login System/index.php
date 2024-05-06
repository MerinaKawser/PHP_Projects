<?php 
  session_start();
  include("header.php");
  include("connection.php");
?>
<body>
    <nav>
      <p>Multiuser Based Login System</p>
    </nav>
    <div class="container">
      <div class="content">
        <h3>Login</h3>
        <hr>
        <?php 
        if(isset($_POST['submit'])){
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, md5($_POST['password']));
            if(empty($email) || empty($password)){
              $error = "<h4 class='text-danger'>Please! Fill Out the Form</h4>";
            }
            else{
                $sql = "SELECT `email`, `password`  FROM `user` WHERE `email`='$email' && `password`='$password'";
                $query = mysqli_query($con,$sql);
                    $row = mysqli_num_rows($query);
                    if($row>0){
                        while($data = mysqli_fetch_assoc($query)){
                            $_SESSION['id'] = $data['id'];
                            $_SESSION['email'] = $data['email'];
                            $_SESSION['password'] = $data['password'];
                            header("Location:dashboard.php");
                        }
                }
                else{
                    $msg = "<h4 class='text-danger'>Username Or Password could not matched</h4>";
                    
                }
            }
        }
    ?>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
          <?php 
            echo @$error;
            echo @$msg;
          ?>
          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" name="email" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="password" class="form-control" id="pwd">
          </div>
          
          <button type="submit" name="submit" class="btn btn-success">Submit</button>
        </form>
        <br>
        <p>Not Yet a Member? <a href="registration.php"> Register</a></p>

      </div>
    </div>
  </body>
</html>
