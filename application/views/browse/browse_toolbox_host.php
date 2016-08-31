<form method="post" action="<?php echo site_url('create/create_stage')?>">
<input type="hidden" name="postid" value="<?php echo $post_id?>">
<input type="hidden" name="stage" value="<?php echo $max_stage?>">
<button type="submit" class="btn btn-warning btn-lg">New Stage</button>
</form>