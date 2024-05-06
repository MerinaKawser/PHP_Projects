
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
          <img class="img-rounded" style="width:200px; height:auro;" src="profile_pic/<?php echo $data['file'];?>" alt="profilePic">
          <br><br>
          <h4><?php echo $data['name'];?></h4>
          
          <?php
        }
      }
    }
  ?>    
</body>
</html>
