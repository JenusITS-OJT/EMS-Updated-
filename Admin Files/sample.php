<html>
<head>
<title></title></head>
<body>




              	  <!-- echo '<script type="text/javascript">',
              	  'onClick();',
              	  '</script>';
                          ?> -->

	<button type="submit" name="b1" class="btn btn-success btn-flat"  value="Time In" 
                  <?php 

                	$id = null;
                    $breakin = null;
                	$breakout = null;
                	$timeout = null;
                	$timein = 'Time-In';
                	$stat = null;

              		if(empty($id) && $timein == '0000-00-00 00:00:00')
               		 $stat = 'Time-In';
               		 $id = 1;
               		;

                  if(!empty($id) && $breakin == '0000-00-00 00:00:00')
                    $stat = 'Start Lunch Break';
                	$breakin = '2017-03-02 11:11:11';

                  if(!empty($id)  && $breakin != '0000-00-00 00:00:00' && $breakout == '0000-00-00 00:00:00')
                    $stat = 'End Lunch Break';
                	$breakin = '2017-03-02 11:11:11';
                	$breakout = '2017-03-02 11:11:11';

                  if(!empty($id)  && $breakin != '0000-00-00 00:00:00' && $breakout != '0000-00-00 00:00:00' && $timeout == '0000-00-00 00:00:00')
                    $stat = 'Time-Out';
                	$breakin = null;
                	$id = null;
                	$breakout = null;
                	$timeout = null;

                  if(!empty($id)  && $breakin != '0000-00-00 00:00:00' && $breakout != '0000-00-00 00:00:00' && $timeout != '0000-00-00 00:00:00')
                    $stat = 'Time-In';

                          ?>

                           onclick="Time In"/>
                        <?php echo $stat; ?>
                </button>

	<button
	type="submit" class="negative" name="down7913" id="down7913" Value="Time-Out"

	<?php 
                         if(!empty($id) && $timeout == '0000-00-00 00:00:00')
                         	$id = 0;
				    		$breakin = "0000-00-00 00:00:00";
				    		$breakout = "0000-00-00 00:00:00";
				    		$stat = ""
                          ?>
		onclick="this.disabled=true;document.getElementById('up7913').disabled=false; Time-Out" 
	 disabled>Time Out</button>

<!-- 	<p>Clicks: <a id="clicks">0</a></p> -->

</body></html>