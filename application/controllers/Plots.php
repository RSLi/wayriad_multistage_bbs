<?php
class Plots extends CI_Controller {
	
	public function view($post_id)
	{
		$this->load->model('plot_model');
		$data_array = $this->plot_model->get_descriptions($post_id);//post info
		if($data_array == -1){show_404();}
		$data = $this->plot_model->get_stage_info($post_id);//stage info, note that the array has been appended
		$data = array_merge($data,$this->plot_model->get_answers($post_id));//answer info
		$data['title'] = $data_array['title'];
		$data['description'] = $data_array['description'];
		$data['date'] = $data_array['date'];
		$data['quality'] = $data_array['quality'];
		$data['author'] = $data_array['author'];
		$data['author_id'] = $data_array['author_id'];
		
		$data['post_id'] = $post_id;//use this in the view to connect back to controller
		
		$this->load->view('templates/header', $data);
		$this->load->view('browse/browse_view', $data);
		$this->load->view('templates/footer');
	}
	/*
	 * @ insert the answer passed by forms to latest stage in this post
	 * @ from i_response_form.php
	 */
	public function insert_answers()
	{
		//check log in status
		if(!isset($_SESSION['uid']))
		{
			redirect('users_main/please_log_in','refresh');//send to the log in page
		}
		$post_id = $_POST['postid'];
		$stage = $_POST['stage'];
		
		$this->load->model('plot_model');
		$this->plot_model->insert_answers($post_id,$stage,$_SESSION['uid'], $_POST['content']);
		redirect('plots/view/'.$post_id,'refresh');
	}
	
	
}