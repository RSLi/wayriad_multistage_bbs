<div style="position: fixed">
	<div class="row" align="center">
		<span class="glyphicon glyphicon-user" style="font-size: 20px"></span>
		<br>
		<strong>Author: </strong><?php echo $author?>
		<br><br>
		<a class="btn btn-primary btn-lg" href="<?php echo site_url('')?>">Home</a><br><br>
		<a class="btn btn-primary btn-lg" href="<?php echo site_url('discover')?>">Discover</a>
		<br><br>
		<?php 
			if(isset($_SESSION['uid']) && $_SESSION['uid'] == $author_id)
			{
				$this->load->view('browse/browse_toolbox_host');
			}
		?>
	</div>
</div>