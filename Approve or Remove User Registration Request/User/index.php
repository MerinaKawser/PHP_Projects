<?php 
    session_start();
    include("../header.php");
    include("../connection.php");
?>
<body>
    <nav class="navbar navbar-inverse">
        <h3 style="color:white; text-align:center;">Approve or Remove User Registration Request</h3>
    </nav>
    <div class="container">
    <?php 
        if(isset($_POST['submit'])){
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, md5($_POST['password']));
            if(empty($email) || empty($password)){
              $error = "<h4 class='text-danger'>Please! Fill Out the Form</h4>";
            }
            else{
                $sql = "SELECT `email`, `password`  FROM `user` WHERE `email`='$email' and `password`='$password' and `request` = 'Accepted'";
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
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
            <?php 
                echo @$error;
                echo @$msg;
            ?>
            <div class="form-group">
              <label for="email">Email address:</label>
              <input name="email" type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input name="password" type="password" class="form-control" id="pwd">
            </div>
            <button name="submit" type="submit" class="btn btn-default">Submit</button>
        </form>
        <br>
        <p>Not Yet a Member? <a href="registration.php"> Register</a></p>
        <a style="text-align:center;" href="../index.php" class="text-primary">Back To Home Page</a>
    </div>
</body>