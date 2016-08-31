<style>
.login {
	font-size: 300%;
	border-style: groove;
	border-color: gray;
}
</style>
<script type="text/javascript" src="/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "#myresponse"
        });
    </script>
<div class="container">
	<h3>Fixed Nav bar</h3>
	<br>
	<h2><?php echo $title?></h2>
	<div class="row">
		<div class="col-sm-9">
			<div class="row">
				
					  <h4> - Overview - </h4>
					  <p><?php echo $description?></p>
					  <ul class="nav nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#stage-1">Stage-1</a></li>
					    
					     <?php 
					    	for($k = 2;$k <= $max_stage;$k++)
					    	{
					    		echo "<li><a data-toggle=\"tab\" href=\"#stage-$k\">Stage-$k</a></li>";
					    	}
					    ?>
					    
					  </ul>
					
					  <div class="tab-content">
					    
					    <?php 
					    	$active_string = 'active';
					    	for($k = 1;$k <= $max_stage;$k++)
					    	{
					    		if($k == 2){$active_string = '';}
					    		echo "<div id=\"stage-$k\" class=\"tab-pane fade in $active_string\">
							      <h3>Stage-$k</h3>
							      <p>$stage_description[$k]</p>";
					    		for($j = 1;$j <= $max_response; $j++)
					    		{
					    			if($k == $a_stage[$j])//allocate the responses according to their stages
					    			{
					    				
					    				echo '<hr><span class="glyphicon glyphicon-user"></span> '.$a_author[$j].': '.date('F jS Y h:i:s A',strtotime($a_date[$j]));//show author and time
					    				echo "<br><br><div class=\"answer\">$a_content[$j]</div><br>";//show content
					    			}
					    		}
							      
							    echo '</div><hr>';
					    	}
					    	
					    	if(isset($_SESSION['uid']))
							{
					    		$this->view('browse/i_response_form');
							}else{
								echo "  <a href=\"".site_url('')."\"><button type=\"button\" class=\"btn btn-success login\">Log in to Respond</button>";
							}
					    ?>
					    	
					  </div>
				
				
			</div>
		</div>
		
		<div class="col-sm-3">
			<?php $this->load->view('browse/browse_toolbox');?>
		</div>
	</div>
</div>