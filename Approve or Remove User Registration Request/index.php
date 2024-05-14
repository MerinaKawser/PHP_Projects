<?php 
    include("header.php");
    include("connection.php");
?>
<body>
    <nav class="navbar navbar-inverse">
        <h3 style="color:white; text-align:center;">Approve or Remove User Registration Request</h3>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="Admin/index.php"><img src="icon/user.png" class="img-rounded img_size" alt="admin"><p style="text-align:center; margin: 20px 0;">Admin</p></a>
            </div>
            <div class="col-md-4">
                <a href="User/index.php"><img src="icon/group.png" class="img-rounded img_size" alt="user"><p style="text-align:center; margin: 20px 0;">User</p></a>
            </div>
            <?php 
                $sql = "SELECT* FROM `user` WHERE `request` = 'Rejected' or `request`='Accepted'";
                $query = mysqli_query($con, $sql);
                $row = mysqli_num_rows($query);
            ?>
            <div class="col-md-4">
                <a href="Notification/notification.php">
                    <img src="icon/notification.png" class="img-rounded img_size" alt="notification">
                        <p style="text-align:center; margin: 20px 0;">Notifications
                            <?php 
                                if($row>0){
                                     echo '<span style="color:red;">'.' (' . $row .')' . '</span>';
                                }
                            ?>
                        </p>
                </a>
                
            </div>
        </div>
    </div>
</body>
