<br><br><br><br>
<script type="text/javascript" src="/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "#description"
        });
        tinymce.init({
            selector: "#stage_description"
        });
        
</script>
<div class="container">
	<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('create/create_plot_form_01')?>">
	  <div class="form-group">
	    <label class="col-sm-2">Title:</label>
	    <div class="col-sm-10">
	      <input id="title" name="title" class="form-control" placeholder="Title of the Project/Question/Discussion Thread">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2">Topic Overview:</label>
	    <div class="col-sm-10"> 
	      <textarea id="description" name="description"></textarea>
	    </div>
	  </div>
	  
	  <div class="form-group">
	    <label class="col-sm-2">The Initial Question/Proposal/Story Plot/Request:</label>
	    <div class="col-sm-10"> 
	      <textarea id="stage_description" name="stage_description"></textarea>
	    </div>
	  </div>
	  
	  <div class="form-group"> 
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-warning">Submit</button>
	    </div>
	  </div>
	</form>
</div>