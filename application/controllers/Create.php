<?php
class Create extends CI_Controller
{
	
	public function index()
	{
		$data['title'] = 'Create';
		$this->load->view('templates/header',$data);
		$this->load->view('create_view/create_index_view',$data);
		$this->load->view('templates/footer');
	}
	
	public function create_plot($plot_type = 1)
	{
		if(!isset($_SESSION['uid']))//check session
		{
			$data['title'] = 'Please Log in';
			$this->load->view('templates/header',$data);
			$this->load->view('loggedin/please_log_in',$data);
			$this->load->view('templates/footer');
		}
		else
		{
			switch($plot_type)
			{
				case 1:
					$data['title']= 'Create Plots';
					$this->load->view('templates/header',$data);
					$this->load->view('create_view/create_plot_view_01',$data);
					$this->load->view('templates/footer');
					break;
				default:
					$data['title']= 'Create Plots';
					$this->load->view('templates/header',$data);
					$this->load->view('create_view/create_plot_view_01',$data);
					$this->load->view('templates/footer');
			}
			
		}
		
	}
	
	public function create_plot_form_01()
	{
		$this->load->model('plot_model');
		if(!isset($_SESSION['uid']))//if not logged in
		{
			$data['title'] = 'Please Log in';
			$this->load->view('templates/header',$data);
			$this->load->view('loggedin/please_log_in',$data);
			$this->load->view('templates/footer');
		}
		else//if logged in
		{
			$author_id = $_SESSION['uid'];
			$title = $_POST['title'];
			$description = $_POST['description'];
			$stage_description = $_POST['stage_description'];
			
			$this->plot_model->create_plot($author_id,$title,$description,$stage_description);
		}
	}
	
	public function create_stage($plot_type = 1)
	{
		if(!isset($_SESSION['uid']))//check session
		{
			$data['title'] = 'Please Log in';
			$this->load->view('templates/header',$data);
			$this->load->view('loggedin/please_log_in',$data);
			$this->load->view('templates/footer');
		}
		else
		{
			switch($plot_type)
			{
				case 1:
					$data['title']= 'Create New Stage';
					
					$this->load->view('templates/header',$data);
					$this->load->view('create_view/create_plot_new_stage_view',$data);
					$this->load->view('templates/footer');
					break;
				default:
					$data['title']= 'Create New Stage';
					$this->load->view('templates/header',$data);
					$this->load->view('create_view/create_plot_new_stage_view',$data);
					$this->load->view('templates/footer');
			}
				
		}
	}
	
	public function create_stage_form_01()
	{
		$this->load->model('plot_model');
		$author_id = $this->plot_model->get_author_id($_POST['postid']);
		if(!isset($_SESSION['uid']) && $_SESSION['uid'] == $author_id)//if it's the author of the thread
		{
			$data['title'] = 'Please Log in';
			$this->load->view('templates/header',$data);
			$this->load->view('loggedin/please_log_in',$data);
			$this->load->view('templates/footer');
		}
		else//if logged in
		{
			$post_id = $_POST['postid'];
			$stage = $_POST['stage'];
			$stage_description = $_POST['stage_description'];
				
			$this->plot_model->create_stage($post_id,$stage,$stage_description);
		}
	}
	
	public function create_tutorial()
	{
		//TODO
	}
	
	
}
//end of file