<?php
class Users_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        
        public function get_username_by_id($uid)
        {
        	$sql = "Select username from users where uid = ".$uid.";";
        	$query = $this->db->query($sql);
        	return $query;
        }
        
        public function forget_password($email)
        {
        	//query for basic info about this user
        	$sql = "SELECT * from users where email = '$email'";
        	$query_user = $this->db->query($sql);
        	$row = $query_user->row();
        	$username = $row->username;
        	
        	
        	/*
        	 * Change to a random password
        	 */
        	$new_password = rand(54321,95005);//generate a random integer for hashing, will be sent to mail
        	$new_hash = password_hash($new_password, PASSWORD_BCRYPT);//hash the interger with the same algorithm
        	$sql = "UPDATE users SET password = '$new_hash';";//update the password into database
        	$query = $this->db->query($sql);
        	
        	//sent a mail to notify the user about the new password
        	$this->load->library('email');
        	
        	$this->email->from('automatic@wayriad.org', 'Wayriad Automatic');
        	$this->email->to($email);	
        	$this->email->subject('Password Change');
        	$this->email->message('We have just received your request to change your password. Your new password will be '.$new_password.'<br> Welcome back to <a href="www.wayriad.org">Wayriad !</a>');
        	
        	$this->email->send();
        }
}