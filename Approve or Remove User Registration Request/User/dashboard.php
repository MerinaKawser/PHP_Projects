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
      <div class="content-dash">
        <h3 style="text-align:center;">Dashboard</h3>
        <hr>
        <div class="row">
            <div class="col-md-2"></div>
           
            <div class="col-md-8">
              <?php include("user_detail.php");?>
            </div>
            <div class="col-md-2"></div>
        </div>
       
      </div>
    </div>
  </body>
</html>
