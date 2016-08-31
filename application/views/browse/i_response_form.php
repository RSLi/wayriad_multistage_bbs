<form method="post" action="<?php echo site_url('plots/insert_answers')?>">
	<h6>Reply to the latest stage:</h6>
  	<textarea id="myresponse" name="content"> </textarea>
  	<input type="hidden" name="postid" value="<?php echo $post_id?>">
  	<input type="hidden" name="stage" value="<?php echo $max_stage?>">
  	<button type="submit" class="btn btn-warning" style="width: 100%">Submit</button>
</form>