<div class="container">
	<h3>Fixed Nav Bar</h3>
	<div class="row" id="account-info">
		<h2>Welcome</h2><a class="btn btn-lg btn-warning" href="<?php echo site_url('create/index')?>">Create a New Thread</a>
	</div>

	<div class="row">
		<br /><br /><br />
		<h3>List of your threads:</h3>
		
		
		<table class="table table-hover">
	    <thead>
	      <tr>
	        <th>No.</th>
	        <th>Title</th>
	      </tr>
	    </thead>
	    <tbody>
		<?php 
		$query_list = $this->db->query('SELECT * FROM plotpost WHERE uid ='.$_SESSION['uid']);
			
		
		foreach($query_list->result_array() as $row)
		{
			$post_id = $row['post_id'];
			$title = $row['title'];
			echo "<tr>
			<td>$post_id</td>
			<td><a href=\"".site_url('plots/view')."/".$post_id."\">$title</a></td>
			</tr>";
		}
		?>
		</tbody>
	  </table>
	</div>
</div>