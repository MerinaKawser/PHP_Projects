<td><a href="details.php?id=<?php echo $data['id'];?>" data-toggle="modal" data-target="#myModal"><?php echo $data['name'];?></a></td>
<!-- user details -->
<div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">User Details</h4>
                                  </div>
                                  <div class="modal-body">
                                    <?php include("details.php");?>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <!-- user details -->