<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{
	public function __construct()
        {
                parent::__construct();
					
					$this->load->model('front_end');
					$this->load->helper('email');
					$this->load->library('email');
        }
	public function index()
	{
		if(	$this->session->userdata('user_login'))
		{
			redirect('welcome/login_success');
		}
		else
		{
			$this->load->view('front_end/index');
		}
	}
	public function login()
	{
		if(	$this->session->userdata('user_login'))
		{
			redirect('welcome/login_success');
		}
		else
		{
			$rand_function=rand(1,3);
			if($rand_function==1)
			{
				$data['f_number']=rand(1,9);
				$data['s_number']=rand(1,9);
				$data['operation']="+";
				$data['result']=$data['f_number']+$data['s_number'];
			}
			if($rand_function==2)
			{
				$data['f_number']=rand(1,9);
				$data['s_number']=rand(1,9);
				$data['operation']="-";
				$data['result']=$data['f_number']-$data['s_number'];
			}
			if($rand_function==3)
			{
				$data['f_number']=rand(1,9);
				$data['s_number']=rand(1,5);
				$data['operation']="x";
				$data['result']=$data['f_number']*$data['s_number'];
			}
			$this->load->view('front_end/login',$data);
		}
	}
	public function logout()
	{
		$user_id=$this->session->userdata('user_id');
		$this->front_end->update_logout($user_id);
		$this->session->unset_userdata('user_login');
		redirect('welcome/index');
	}
	//***********************Registration*****************************
	public function register()
	{
		if(	$this->session->userdata('user_login'))
		{
			redirect('welcome/login_success');
		}
		else
		{
				$rand_function=rand(1,3);
				if($rand_function==1)
				{
					$data['f_number']=rand(1,9);
					$data['s_number']=rand(1,9);
					$data['operation']="+";
					$data['result']=$data['f_number']+$data['s_number'];
				}
				if($rand_function==2)
				{
					$data['f_number']=rand(1,9);
					$data['s_number']=rand(1,9);
					$data['operation']="-";
					$data['result']=$data['f_number']-$data['s_number'];
				}
				if($rand_function==3)
				{
					$data['f_number']=rand(1,9);
					$data['s_number']=rand(1,5);
					$data['operation']="x";
					$data['result']=$data['f_number']*$data['s_number'];
				}
				$ranStr = md5(microtime());
				$ranStr = substr($ranStr, 0, 6);
				$data['smart_captcha']=rand(1001,9999);
				$data['image_captcha']=$ranStr;
				$this->load->view('front_end/register',$data);
		}
	}
	public function process_register()
	{
		$result=$this->front_end->process_register();
		if($result=="success")
		{
			redirect('welcome/login_success');
		}
		else
		{
			redirect('welcome/register');
		}
	}
	public function check_username_availability()
	{
		$result=$this->front_end->check_username_availability();
		echo $result;
	}
	public function validate_reference()
	{
		$result=$this->front_end->validate_reference();
		echo $result;
	}
	function check_email_availability()
	{
		$result=$this->front_end->check_email_availability();
		echo $result;
	}
	function refer()
	{
		$id = $this->uri->segment(3);
		$data['refer']=$id;
		$rand_function=rand(1,3);
		if($rand_function==1)
		{
			$data['f_number']=rand(1,9);
			$data['s_number']=rand(1,9);
			$data['operation']="+";
			$data['result']=$data['f_number']+$data['s_number'];
		}
		if($rand_function==2)
		{
			$data['f_number']=rand(1,9);
			$data['s_number']=rand(1,9);
			$data['operation']="-";
			$data['result']=$data['f_number']-$data['s_number'];
		}
		if($rand_function==3)
		{
			$data['f_number']=rand(1,9);
			$data['s_number']=rand(1,5);
			$data['operation']="x";
			$data['result']=$data['f_number']*$data['s_number'];
		}
		$this->load->view('front_end/refer',$data);
	}
	//***********************Login*****************************
	public function process_login()
	{
		$result=$this->front_end->process_login();
		echo $result;
	}
	public function login_success()
	{
		if($this->session->userdata('user_login')=="true")
		{
			$user_id=$this->session->userdata('user_id');
			$data['user']=$this->front_end->get_user_details($user_id);
			
			$this->load->view('front_end/login_success',$data);
		}
		else
		{
			redirect('welcome/login');
		}
	}
	public function players()
	{
		$this->load->view('front_end/players');
	}
	//***********************Edit Profile*****************************************	
	public function edit_profile()
	{
		if($this->session->userdata('user_login')=="true")
		{
			$id = $this->uri->segment(3);
			$data['user']=$this->front_end->get_user_edit_profile($id);
			$rand_function=rand(1,3);
			if($rand_function==1)
			{
				$data['f_number']=rand(1,9);
				$data['s_number']=rand(1,9);
				$data['operation']="+";
				$data['result']=$data['f_number']+$data['s_number'];
			}
			if($rand_function==2)
			{
				$data['f_number']=rand(1,9);
				$data['s_number']=rand(1,9);
				$data['operation']="-";
				$data['result']=$data['f_number']-$data['s_number'];
			}
			if($rand_function==3)
			{
				$data['f_number']=rand(1,9);
				$data['s_number']=rand(1,5);
				$data['operation']="x";
				$data['result']=$data['f_number']*$data['s_number'];
			}
			$this->load->view('front_end/edit_profile',$data);
		}
		else
		{
			redirect('welcome/login');
		}
		
	}
	public function update_profile()
	{
		$id = $this->uri->segment(3);
		$data=$this->front_end->update_profile($id);
		redirect('welcome/login_success');
	}
	public function change_wallet()
	{
		if($this->session->userdata('user_login')=="true")
		{
				$id = $this->uri->segment(3);
				$data['user']=$this->front_end->get_user_edit_profile($id);
				$rand_function=rand(1,3);
				if($rand_function==1)
				{
					$data['f_number']=rand(1,9);
					$data['s_number']=rand(1,9);
					$data['operation']="+";
					$data['result']=$data['f_number']+$data['s_number'];
				}
				if($rand_function==2)
				{
					$data['f_number']=rand(1,9);
					$data['s_number']=rand(1,9);
					$data['operation']="-";
					$data['result']=$data['f_number']-$data['s_number'];
				}
				if($rand_function==3)
				{
					$data['f_number']=rand(1,9);
					$data['s_number']=rand(1,5);
					$data['operation']="x";
					$data['result']=$data['f_number']*$data['s_number'];
				}
				$this->load->view('front_end/edit_wallet',$data);
		}
		else
		{
			redirect('welcome/login');
		}
		
	}
	public function update_wallet()
	{
		$id = $this->uri->segment(3);
		$data=$this->front_end->update_wallet($id);
		redirect('welcome/login_success');
	}
	public function change_password()
	{
		if($this->session->userdata('user_login')=="true")
		{
				$id = $this->uri->segment(3);
				$data['user']=$this->front_end->get_user_edit_profile($id);
				$rand_function=rand(1,3);
				if($rand_function==1)
				{
					$data['f_number']=rand(1,9);
					$data['s_number']=rand(1,9);
					$data['operation']="+";
					$data['result']=$data['f_number']+$data['s_number'];
				}
				if($rand_function==2)
				{
					$data['f_number']=rand(1,9);
					$data['s_number']=rand(1,9);
					$data['operation']="-";
					$data['result']=$data['f_number']-$data['s_number'];
				}
				if($rand_function==3)
				{
					$data['f_number']=rand(1,9);
					$data['s_number']=rand(1,5);
					$data['operation']="x";
					$data['result']=$data['f_number']*$data['s_number'];
				}
				$this->load->view('front_end/change_password',$data);
		}
		else
		{
			redirect('welcome/login');
		}
		
	}
	public function update_password()
	{
		$id = $this->uri->segment(3);
		$data=$this->front_end->update_password($id);
		
		if($data=="success")
		{
			redirect('welcome/login_success');
		}
		else
		{
			
			$this->session->set_flashdata('abc','error');
			redirect('welcome/change_password/'.$id);
		}
		
	}
	//******************************Chat*****************************************************
	public function chat()
	{
		if($this->session->userdata('user_login')=="true")
		{
			$this->load->view('front_end/chat');
		}
		else
		{
			redirect('welcome/login');
		}
	}
	public function send_message_chat()
	{
		$result=$this->front_end->send_message_chat();	
		echo $result;
	}
	function update_chat()
	{
		$data=$this->front_end->update_chat();
		foreach($data as $row)
		{
			$sess_name=$this->session->userdata('user_name');
			$name=$row['username'];
			$date=$row['date'];
			$time=$row['time'];
			$message=$row['message'];
			$image=$row['image'];
			if($sess_name==$name)
			{
				$name="You";
			}
			if($image=="")
			{
				$image="client_assets/assets/user1.jpg";
			}
			echo '
					 <div class="entry row large-collapse">
					<div class="date small-3 large-2 columns">
					  <img src="'.base_url().$image.'"/>
					</div>
					
					<div class="article-preview small-13 large-14 columns">
					  <h6><a>'.$name.'</a> <span style="font-size: 12px;">'.$time.'</span></h6>
					  <p>'.$message.'</p>
					</div>
					
				  </div>';
		}
	}
	//******************************Chat*****************************************************
	public function chat_history()
	{
		if($this->session->userdata('user_login')=="true")
		{
			
			$this->load->view('front_end/chat_history');
		}
		else
		{
			redirect('welcome/login');
		}
	}
	
	function update_chat_history()
	{
		$data=$this->front_end->update_chat_history();
		foreach($data as $row)
		{
			$sess_name=$this->session->userdata('user_name');
			$name=$row['username'];
			$date=$row['date'];
			$time=$row['time'];
			$message=$row['message'];
			$image=$row['image'];
			if($sess_name==$name)
			{
				$name="You";
			}
			if($image=="")
			{
				$image="client_assets/assets/user1.jpg";
			}
			echo '
					 <div class="entry row large-collapse">
					<div class="date small-3 large-2 columns">
					  <img src="'.base_url().$image.'"/>
					</div>
					
					<div class="article-preview small-13 large-14 columns">
					  <h6><a>'.$name.'</a> <span style="font-size: 12px;">'.$time.'</span></h6>
					  <p>'.$message.'</p>
					</div>
					
				  </div>';
		}
	}
	function delete_old_msg()
	{
		$this->front_end->delete_old_msg();
	}
	function online_players()
	{
		$data['player']=$this->front_end->get_online_player();
		$this->load->view("front_end/online-players",$data);	
	}
	function lost_password()
	{
		$rand_function=rand(1,3);
				if($rand_function==1)
				{
					$data['f_number']=rand(1,9);
					$data['s_number']=rand(1,9);
					$data['operation']="+";
					$data['result']=$data['f_number']+$data['s_number'];
				}
				if($rand_function==2)
				{
					$data['f_number']=rand(1,9);
					$data['s_number']=rand(1,9);
					$data['operation']="-";
					$data['result']=$data['f_number']-$data['s_number'];
				}
				if($rand_function==3)
				{
					$data['f_number']=rand(1,9);
					$data['s_number']=rand(1,5);
					$data['operation']="x";
					$data['result']=$data['f_number']*$data['s_number'];
				}
		
		$this->load->view('front_end/lost_password',$data);
	}
	function send_password_link()
	{
		$email=$this->input->post('email');
		$data=$this->front_end->get_user_details_lost();
		$user_id=$data[0]['id'];
		$username=$data[0]['username'];
		
			$email_body  = 'Dear  : '.$username.'\n\n';
			$email_body .= '<a href="http://mindapps.net/projects/all_projects/bheem_coin_2/index.php/welcome/reset_password/'.$user_id.'">Click here</a> to reset your password :\n\n';
			
			$this->email->from('no-reply@bheemcoins.in', 'Reset Password Link');
			$this->email->to($email);
			$this->email->subject('Reset Password Link');
			$this->email->message($email_body);
			$this->email->send();
		
		redirect("welcome/index/#send_link");
		
	}
	function get_user()
	{
		$data=$this->front_end->get_all_user();
		print_r($data);
	}
}

