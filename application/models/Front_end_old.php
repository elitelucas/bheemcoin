<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Front_end extends CI_Model {  
  
    function __construct()  
    {  
        //call model constructor  
        parent::__construct();  
		
		$this->load->database();
		$this->load->library("session");
		$this->load->helper('url');
    }   
	function process_register()
	{
		$name=$this->input->post('name');
		$pass=md5($this->input->post('pass'));
		$refer=$this->input->post('refer');
		$bitcoin=$this->input->post('bitcoin');
		$email=$this->input->post('email');
		$find=$this->input->post('find');
		$date=date("Y-m-d");
		
		$this->db->where("username",$refer);
		$query=$this->db->get('users');
		$q=$query->result_array();
		$ref_id="";
		if($query->num_rows()==1)
		{
			$ref_id=$q[0]['id'];
		}
		
		$ip=$this->input->ip_address();
			$link=base_url()."index.php/welcome/refer/".$name;
			
			$data=array('username'  =>$name,
					'password'  =>$pass,
					'refered_by'  => $ref_id,
					'bitcoin_address'  => $bitcoin,
					'email'  => $email,
					'reference_link'  => $link,
					'how_find'  => $find,
					'ip_address'  => $ip,
					'status'  => '1',
					'date'  => $date
				);
				$this->db->insert("users",$data);
		
		
		$this->db->where("username",$name);
		$query=$this->db->get('users');
		$q=$query->result_array();

		if($query->num_rows()==1)
		{
			$user_id=$q[0]['id'];
			$this->session->set_userdata('user_login','true');
			$this->session->set_userdata('user_id',$user_id);
			$this->session->set_userdata('user_name',$name);
			
			return "success";
		}
		else
		{
			return "false";
		}
	}
	function check_username_availability()
	{
		$name=$this->input->post('name');
		
		$this->db->where("username",$name);
		$query=$this->db->get('users');
		$q=$query->result_array();

		if($query->num_rows()==1)
		{
			return "false";
		}
		else
		{
			return "success";
		}
	}
	function check_email_availability()
	{
		$email=$this->input->post('email');
		
		$this->db->where("email",$email);
		$query=$this->db->get('users');
		$q=$query->result_array();

		if($query->num_rows()==1)
		{
			return "false";
		}
		else
		{
			return "success";
		}
	}
	function validate_reference()
	{
		$refer_data=$this->input->post('refer_data');
		
		$this->db->where("username",$refer_data);
		$query=$this->db->get('users');
		$q=$query->result_array();

		if($query->num_rows()==1)
		{
			return "success";
		}
		else
		{
			return "false";
		}
	}
	
	function process_login()
	{
		$name=$this->input->post('username');
		$password=md5($this->input->post('password'));
		
		$where = "username='$name' AND password='$password'";
		$this->db->where($where);
		$query=$this->db->get('users');
		$q=$query->result_array();

		if($query->num_rows()==1)
		{
			$user_id=$q[0]['id'];
			$this->session->set_userdata('user_login','true');
			$this->session->set_userdata('user_id',$user_id);
			$this->session->set_userdata('user_name',$name);
			
			$this->db->where("username",$name);
			$data=array("status"=>1);
			$this->db->update("users",$data);
			return "success";
		}
		else
		{
			return "false";
		}		
	}
	function update_logout($id)
	{
		$this->db->where("id",$id);
		$data=array("status"=>0);
		$this->db->update("users",$data);
	}
	function get_user_details($id)
	{
		$this->db->where("id",$id);
		$query=$this->db->get('users');
		return $q=$query->result_array();
	}
	function get_user_edit_profile($id)
	{
		$this->db->where("username",$id);
		$query=$this->db->get('users');
		return $q=$query->result_array();
	}
	public function update_profile($id)
	{
		
		$this->load->library('image_lib');
		
		$this->db->where('username',$id);
		$query=$this->db->get('users');
		$q=$query->result_array();
		$user_id=$q[0]['id'];
		
		$name=$this->input->post('name');
		$bitcoin=$this->input->post('bitcoin');
		$email=$this->input->post('email');
		$find=$this->input->post('find');
		$path="";
		if (!empty($_FILES['file']['name']))
        {
			$new_name = rand(10,99).str_replace(" ","_",($_FILES["file"]['name']));
			
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';  
			$config['file_name'] = $new_name;	

			$this->load->library('upload',$config);

            if ($this->upload->do_upload('file'))
            {
				$path="uploads/".$new_name;
				
				 $upload_data = $this->upload->data();

					//resize:

					$config2['image_library'] = 'gd2';
					$config2['source_image'] = $upload_data['full_path'];
					$config2['overwrite'] = TRUE;
					$config2['height']   = 150;
					

					$this->load->library('image_lib', $config2); 
					$this->image_lib->initialize($config2);
					$this->image_lib->resize();
			}
			
			$data=array(
					'username'  =>$name,
					'bitcoin_address'  => $bitcoin,
					'email'  => $email,
					'how_find'  => $find,
					'image'  => $path
				);
		}
		else
		{
			$data=array(
					'username'  =>$name,
					'bitcoin_address'  => $bitcoin,
					'email'  => $email,
					'how_find'  => $find
				);
		}
		$this->db->where('id',$user_id);
		$this->db->update('users',$data);
		
	}
	public function update_wallet($id)
	{
		$this->db->where('username',$id);
		$query=$this->db->get('users');
		$q=$query->result_array();
		$user_id=$q[0]['id'];
		
		$bitcoin=$this->input->post('bitcoin');
		
		$data=array('bitcoin_address'  => $bitcoin);
		$this->db->where('id',$user_id);
		$this->db->update('users',$data);
		
	}
	public function update_password($id)
	{
		$old=md5($this->input->post('old'));
		$new=md5($this->input->post('password'));
		
		$this->db->where('username',$id);
		$query=$this->db->get('users');
		$q=$query->result_array();
		$user_id=$q[0]['id'];
		$user_pass=$q[0]['password'];
		if($user_pass==$old)
		{
			$data=array('password'  => $new);
			$this->db->where('id',$user_id);
			$this->db->update('users',$data);
			return "success";
		}
		else
		{
			return "failed";
		}		
	}
	//*************************Chat****************************************
	public function send_message_chat()
	{
		$message=$this->input->post('message');
		
		$user_id=$this->session->userdata('user_id');
		$date=date("Y-m-d");
		$time=date("h:i:s");
		
		$this->db->where('id',$user_id);
		$query=$this->db->get('users');
		$q=$query->result_array();
		$name=$q[0]['username'];
		$image=$q[0]['image'];
		
		$data=array("user_id"=>$user_id,
					"username"=>$name,
					"date"=>$date,
					"time"=>$time,
					"message"=>$message,
					"image"=>$image
					);
					$this->db->insert("chat",$data);
	}
	public function update_chat()
	{
		$q = $this->db->get('chat'); 
		$total= $q->num_rows();
		if($total>=6)
		{
			$start=$total-5;
			$this->db->limit('5',$start);
		}
		$query=$this->db->get('chat');
		$result=$query->result_array();
		return $result;
	}
	public function update_chat_history()
	{
		$q = $this->db->get('chat'); 
		$total= $q->num_rows();
		if($total>=100)
		{
			$start=$total-100;
			$this->db->limit('100',$start);
		}
		$query=$this->db->get('chat');
		$result=$query->result_array();
		return $result;
	}
	public function delete_old_msg()
	{
		$q = $this->db->get('chat'); 
		$total= $q->num_rows();
		if($total>=26)
		{
			$limit=$total-25;
			$query = $this->db->query('DELETE FROM chat ORDER BY id ASC limit '.$limit);
		}
	}
	public function get_online_player()
	{
		$this->db->where('status',"1");
		$query=$this->db->get('users');
		$q=$query->result_array();
		return $q;
	}
	public function get_user_details_lost()
	{
		$email=$this->input->post('email');
		$this->db->where('email',$email);
		$query=$this->db->get('users');
		$q=$query->result_array();
		return $q;
	}
	public function get_all_user()
	{
		$query=$this->db->get('users');
		$q=$query->result_array();
		return $q;
	}
}
?>