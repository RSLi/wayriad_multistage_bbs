<br><br><br><br>
<script type="text/javascript" src="/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "#stage_description"
        });
        
</script>
<div class="container">
	<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('create/create_stage_form_01')?>">

	  
	  <div class="form-group">
	    <label class="col-sm-2">The Question/Proposal/Story Plot/Request of Next Stage:</label>
	    <div class="col-sm-10"> 
	      <textarea id="stage_description" name="stage_description"></textarea>
	    </div>
	  </div>
	  
	  
	  
	<input type="hidden" name="postid" value="<?php echo $_POST['postid']?>">
  	<input type="hidden" name="stage" value="<?php echo $_POST['stage'] + 1?>">
	  
	  
	  
	  <div class="form-group"> 
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-warning">Submit</button>
	    </div>
	  </div>
	  
	  
	</form>
</div>