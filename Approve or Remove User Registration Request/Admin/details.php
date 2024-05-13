<?php 
    session_start();
    include("../header.php");
    include("../connection.php")
?>
<body>
    <nav class="navbar navbar-inverse">
        <h3 style="color:white; text-align:center;">Approve or Remove User Registration Request</h3>
    </nav>
    <div class="container">
        <?php
        //include("../connection.php");
            $id = $_GET['id'];
            $sql_u = "SELECT* FROM `user` WHERE `id`='$id'";
            $query_u = mysqli_query($con, $sql_u);
            $row = mysqli_num_rows($query_u);
            if($row>0){
             while($data_u=mysqli_fetch_assoc($query_u)){
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">Name</div>
                    <div class="panel-body"><?php echo $data_u['name'];?></div>                        
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Email</div>
                    <div class="panel-body"><?php echo $data_u['email'];?></div>
                </div>
                
                <?php
             }
            }
        ?>
        <div class="panel panel-default">
            <div class="panel-body"><a href="dashboard.php" type="button" class="btn btn-primary">Back</a></div>
        </div>
    </div>
</body>