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
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, md5($_POST['password']));
            if(empty($name) || empty($email) || empty($password)){
                $error = "<h4 class='text-danger'>Please fill out the form first</h4>";
                
            }
            else{
                $sql = "SELECT* FROM `user` WHERE `email` = '$email'";
                $query = mysqli_query($con,$sql);
                $row = mysqli_num_rows($query);
                if($row>0){
                    $msg = "<h4 class='text-danger'>This email adress already exist. Please try again!</h4>";
                }
                else{
                    $sql_insert = "INSERT INTO `user`(`name`, `email`, `password`, `request`)
                                    VALUES('$name', '$email', '$password', 'Pending')";
                    $query_insert = mysqli_query($con, $sql_insert);
                    if($query){
                        $msg = "<h4 class='text-success'>Your request has been sent. Please wait for the admin approval</h4>";
                    }
                    else{
                        $msg = "There is something problem. Please try again";
                    }
                }
            }
        }
    ?>
    <div class="container">
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
            <?php 
                echo @$error . "<br>";
                echo @$msg;
            ?>
            <div class="form-group">
                <label for="name">Name:</label>
                <input name="name" type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input name="email" type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input name="password" type="password" class="form-control" id="password">
            </div>
            <button name="submit" type="submit" class="btn btn-default">Submit</button>
            <br><br>
            <p>Already a Member? <a href="index.php"> Login</a></p>
        </form>
        <a style="text-align:center;" href="../index.php" class="text-primary">Back To Home Page</a>
    </div>
</body>