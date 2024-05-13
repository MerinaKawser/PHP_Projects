<?php 
    include("../header.php");
    include("../connection.php")
?>
<body>
    <nav class="navbar navbar-inverse">
        <h3 style="color:white; text-align:center;">Approve or Remove User Registration Request</h3>
    </nav>
    <div class="container">
        <p class="bg-primary text-primary">This message will be sent in email addresses.</p>
        <div class="row">
            <div class="col-md-6">
                <div class="well well-sm">Rejected</div>
                <!-- Rejected Names -->
                <?php 
                     $sql = "SELECT* FROM `user` WHERE `request` = 'Rejected'";
                     $query = mysqli_query($con, $sql);
                     $row = mysqli_num_rows($query);
                     if($row>0){
                         while($data = mysqli_fetch_assoc($query)){
                             ?>
                             <div class="alert alert-warning">
                                <strong class="red"><a href="details.php?id=<?php echo $data['id'];?>"><?php echo '<span style="text-decoration:underline;">'.$data['name'].'</span>';?></a></strong> your registration has been rejected. Plsease try again!
                            </div>                                
                             <?php
                         }
                     }
                 ?>
                <!-- Rejected Names -->                     
            </div>
            <div class="col-md-6">      
                <div class="well well-sm">Accepted</div>          
                <!-- Accepted Names -->
                <?php 
                     $sql = "SELECT* FROM `user` WHERE `request` = 'Accepted'";
                     $query = mysqli_query($con, $sql);
                     $row = mysqli_num_rows($query);
                     if($row>0){
                         while($data = mysqli_fetch_assoc($query)){
                             ?>
                             <div class="alert alert-warning">
                                <strong class="red"><a href="details.php?id=<?php echo $data['id'];?>"><?php echo '<span style="text-decoration:underline;">'.$data['name'].'</span>';?></a></strong> your registration has been accepted. You can access your account!
                            </div>
                            <?php
                         }
                     }
                 ?>
                <!-- Accepted Names -->                             
                        
            </div>
            
        </div>        
        <a style="text-align:center;" href="../index.php" class="text-primary">Back To Home Page</a>
    </div>
</body>