<?php 
    include("../header.php");
    include("../connection.php");
?>
<body>
    <nav class="navbar navbar-inverse">
        <h3 style="color:white; text-align:center;">Approve or Remove User Registration Request</h3>
    </nav>
    <?php 
        if(isset($_POST['submit'])){
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            if(empty($email) || empty($password)){
                $error = "<h4 class='text-danger'>Please fill out the form first</h4>";
            }
            else{
                $sql = "SELECT* FROM `admin` WHERE `email`='$email' and `password`= '$password'";
                $query = mysqli_query($con, $sql);
                $row = mysqli_num_rows($query);
                if($row>0){
                    while($data = mysqli_fetch_assoc($query)){
                        session_start();
                        $_SESSION['id'] = $data['id'];
                        $_SESSION['email'] = $data['email'];
                        $_SESSION['password'] = $data['password'];
                        header("Location:dashboard.php");
                    }
                }
                else{
                    $msg = "<h4 class='text-danger'>Wrong email address or password. Please try again</h4>";
                }
            }
            
        }
    ?>
    <div class="container">
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
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
        <a style="text-align:center;" href="../index.php" class="text-primary">Back To Home Page</a>

    </div>
</body>