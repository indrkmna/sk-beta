<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    function index()
    {

    	//$logged = $this->session->userdata('id');
		//if ($logged == FALSE) {	

		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|sha1');
		
		//validate form input
		if ($this->form_validation->run() == FALSE)
        {
			// fails
			$site = $this->mConfig->list_config();
			$data = array ( 'title'  => 'Register - '.$site['nameweb'],
							'isi'    => 'register_view',
							'site'	 => $site);
		$this->load->view('layout/wrapper',$data);
        }
		else
		{
			//insert the user registration details into database
			$data = array(
				'username' 	=> $this->input->post('username'),
				'email' 	=> $this->input->post('email'),
				'password' 	=> $this->input->post('password'),					
			);
			
			// insert form data into database
			if ($this->users_model->registerStudent($data))
			{
				// send email
				if ($this->users_model->sendEmail($this->input->post('email')))
				{
					// successfully sent mail
					$this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please confirm the mail sent to your Email.</div>');
					redirect('register');
				}
				else
				{
					// error
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
					redirect('register');
				}
			}
			else
			{
				// error
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">ga masuk</div>');
				redirect('register');
			}		
		}
		/*}else{	
			redirect(base_url('login'));			
		}*/
	}	

	function verify($hash=NULL)
	{
		if ($this->users_model->verifyEmailID($hash))
		{
			$this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
			redirect('login');
		}
		else
		{
			$this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
			redirect('login');
		}
	}
	
}