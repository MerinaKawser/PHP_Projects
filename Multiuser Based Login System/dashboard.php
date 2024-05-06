<?php 
    session_start();
    include("header.php");
    include("connection.php")
?>
<body>
    <nav>
      <p>Multiuser Based Login System</p>
    </nav>
    <div class="container">
      <div class="content-dash">
        <h3 style="text-align:center;">Dashboard</h3>
        <hr>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
              <?php include("profile_doc/image.php");?>
            </div>
            <div class="col-md-4">
              <?php include("profile_doc/info.php");?>
            </div>
            <div class="col-md-2"></div>
        </div>
       
      </div>
    </div>
  </body>
</html>
