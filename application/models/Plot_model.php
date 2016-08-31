<?php
class Plot_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function get_author_id($post_id)
	{
		$sql = "SELECT uid FROM plotpost WHERE post_id = ?";
		$query = $this->db->query($sql, $post_id);
		return $query->row()->uid;
	}
	public function get_descriptions($post_id)
	{
		$sql = "SELECT * FROM plotpost WHERE post_id = ?";
		$query = $this->db->query($sql, $post_id);
		if($query->num_rows() === 1)//check if the post id exist
		{
			/*
			 * Unique info about the entire post
			 */
			$row = $query->row();
			$data['title'] = $row->title;
			$data['description'] = $row->description;
			$data['date'] = $row->date;
			$data['quality'] = $row->quality;
			//find the author by uid
			$author_id = $row->uid;
			$query_uid = $this->db->query('SELECT username FROM users WHERE uid = '.$author_id);
			$data['author'] = $query_uid->row()->username;
			$data['author_id'] = $author_id;
			return $data;
		}
		else
		{
			return -1;//Err code: post id not exist
		}
	}
	
	public function get_stage_info($post_id)
	{
		$sql = "SELECT * FROM plotstage WHERE post_id = ?";
		$query = $this->db->query($sql, $post_id);
		$data['max_stage'] = $query->num_rows();//stage number
		if($data['max_stage'] > 0)//check if at least one stage exist
		{
			/*
			 * query every stage
			*/
			
			for($k = 1;$k <= $data['max_stage']; $k++)
			{
				$row = $query->row($k-1);
				$data['stage_no'][$k] = $row->stage;
				$data['stage_description'][$k] = $row->description;
				$data['stage_date'][$k] = $row->date;
				$data['chosen_answer'][$k] = $row->chosen_answer;
			}
			return $data;
		}
		else
		{
			return -1;//Err code: post id not exist
		}
	}
	
	
	public function get_answers($post_id)
	{
		$this->load->model('users_model');
		$sql = "SELECT * FROM plotresponse WHERE post_id = ?";
		$query = $this->db->query($sql, $post_id);
		$data['max_response'] = $query->num_rows();//response number
			/*
			 * query every response
			*/
				
			for($k = 1;$k <= $data['max_response']; $k++)
			{
			$row = $query->row($k-1);
			$data['a_stage'][$k] = $row->stage;
			$data['a_content'][$k] = $row->content;
			$data['a_date'][$k] = $row->date;
			$data['a_vote'][$k] = $row->vote;
			//find the author by uid
			$query_uid = $this->db->query('SELECT username FROM users WHERE uid = '.$row->uid);
			$data['a_author'][$k] = $query_uid->row()->username;
			}
			return $data;
	}
	
	public function insert_answers($post_id,$stage,$author_id,$answer_string)
	{
		//use CI query builder
		$data = array('post_id' => $post_id, 'stage' => $stage,'uid'=>$author_id, 'content' => $answer_string, 'vote' => 0);
		$str = $this->db->insert_string('plotresponse', $data);
		$this->db->query($str);
		
	}
	
	/**
	 * creates a plot and calls create_stage to create the initial stage with a user-assigned description of the problem
	 */
	public function create_plot($author_id,$title,$description,$stage_description)
	{
		//create row in postplot
		$data = array('title' => $title,'uid'=>$author_id, 'description' => $description, 'quality' => 5);
		
		$str = $this->db->insert_string('plotpost', $data);
		$query_success = $this->db->query($str);
		$post_id = $this->db->insert_id();//get the post id
		//create the first stage
		if($query_success)
		{
			$this->create_stage($post_id,1,$stage_description);
		}
	}
	
	public function create_stage($post_id,$stage,$description)
	{
		$data = array('post_id' => $post_id, 'stage' => $stage, 'description' => $description, 'chosen_answer' => 0);
		$str = $this->db->insert_string('plotstage', $data);
		$this->db->query($str);
		
		redirect('plots/view/'.$post_id, 'refresh');
	}
}