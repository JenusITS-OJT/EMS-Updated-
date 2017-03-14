<!-- Modal Branch-->
<form method="POST" action="_CM_Branch.php">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="form">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Branch</h4>
      </div>
      <div class="modal-body">
        
            <div class="col-md-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Branch Address</label>
                <textarea class="form-control" id="address" name="address" placeholder="Address Line, Street, State, Country" required/></textarea>
              </div>
            </div>
                      
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Contact Number</label>
                <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact Number" required/>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
              </div>
            </div>

            <!-- Date -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Date Established</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control pull-right" id="datepicker" required></input>
                </div>
                <!-- /.input group -->
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <select class="form-control" id="status" name="status" placeholder="Status" required>
                            <?php $sql="SELECT
                              s.`ID`, s.`Status_Name`
                            FROM `status` as s where s.`id` = '1' or s.`id` = '8'";
                              $result = mysqli_query($con, $sql);
                              while($row = mysqli_fetch_array($result)){
                            ?>
                        <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                            <?php } ?>
                  </select>
              </div>
            </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>