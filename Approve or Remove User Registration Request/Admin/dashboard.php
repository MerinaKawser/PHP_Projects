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
        <div><h4>Admin Dashboard</h4><hr></div>
        <ul class="nav nav-pills">
            <li class="active"><a data-toggle="pill" href="#home">
              <!-- count request -->
              <?php 
                $sql_p = "SELECT* FROM `user` WHERE `request` = 'Pending'";
                $query_p = mysqli_query($con, $sql_p);
                $row_p = mysqli_num_rows($query_p);
              ?>
              <!-- count request -->
              Request
              <?php 
                  if($row_p>0){
                       echo '<span style="color:red;">'.' (' . $row_p .')' . '</span>';
                  }
                ?>
            </a>
            </li>
            <li>
              <!-- count request -->
              <?php 
                $sql = "SELECT* FROM `user` WHERE `request` = 'Accepted'";
                $query = mysqli_query($con, $sql);
                $row = mysqli_num_rows($query);
              ?>
              <!-- count request -->
              <a data-toggle="pill" href="#menu1">
                User List
                <?php 
                  if($row>0){
                       echo '<span style="color:red;">'.' (' . $row .')' . '</span>';
                  }
                ?>
              </a>
              
            </li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <h3>User Request List</h3>
            <?php include("request.php");?>
          </div>
          <div id="menu1" class="tab-pane fade">
            <h3>All The User List</h3>
            <?php include("accepted_user_list.php");?>
          </div>
          
        </div>

    </div>
</body>