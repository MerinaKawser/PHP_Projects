
<body>
  <?php 
    if(isset($_SESSION['email'])){
      $email = $_SESSION['email'];
      $sql = "SELECT* FROM `user` WHERE `email` = '$email'";
      $query = mysqli_query($con, $sql);
      $row = mysqli_num_rows($query);
      if($row>0){
        while($data = mysqli_fetch_assoc($query)){
          ?>
            <div class="panel panel-default">
                <div class="panel-heading">Name</div>
                <div class="panel-body"><?php echo $data['name'];?></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Email</div>
                <div class="panel-body"><?php echo $data['email'];?></div>
            </div>
            <div class="panel panel-default">
                
                <div class="panel-body"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout </a></div>
            </div>
            
          <?php
        }
      }
    }
  ?>    
</body>
</html>
