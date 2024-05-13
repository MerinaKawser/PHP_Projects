<body>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Profile</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            
            $sql = "SELECT* FROM `user` WHERE `request` = 'Accepted'";
            $query = mysqli_query($con, $sql);
            $row = mysqli_num_rows($query);
            if($row>0){
                while($data = mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                    <td><a href="details.php?id=<?php echo $data['id'];?>"><?php echo $data['name'];?></a></td>
                        
                        <td><?php echo $data['request'];?></td>
                        
                    </tr>
                    <?php
                }
            }
?>
        </tbody>

    </table>
</body>