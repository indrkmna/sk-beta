<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model','mUsers');
		$this->load->model('admins_model','mAdmins');
	}

	public function index()
	{
		$site  	 = $this->mConfig->list_config();
		$package = $this->mPackage->listPackage();
		$data = array(	'title'		=> 'Daftar User - '.$site['nameweb'],
						'package'	=> $package,						
						'isi'		=> 'admin/users/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function admin()
	{
		$site  = $this->mConfig->list_config();
		
		$data = array(	'title'		=> 'Daftar Admin - '.$site['nameweb'],
						'isi'		=> 'admin/users/content_admin');
		$this->load->view('admin/layout/wrapper',$data);
	}	

	public function ajax_list()
	{
		$list = $this->mUsers->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $user) {
			$no++;
			$row = array();
			$row[] = $user->first_name.' '.$user->last_name;
			$row[] = $user->email;	
			if ($user->gender == 'male'){			
				$row[] = 'Laki-laki';
			}else{
				$row[] = 'Perempuan';
			}
			$row[] = date('d M Y',strtotime($user->created));			


			//$lihat 	=  base_url('admin/users/payment/'.$user->user_id);

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary btn-xs" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$user->user_id."'".')"><i class="fa fa-pencil"></i> Edit</a>
					 
				 	  <a class="btn btn-sm btn-danger btn-xs" href="javascript:void(0)" title="Hapus" onclick="delete_user('."'".$user->user_id."'".')"><i class="fa fa-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->mUsers->count_all(),
						"recordsFiltered" => $this->mUsers->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function admin_ajax_list()
	{
		$list = $this->mAdmins->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $admin) {
			$no++;
			$row = array();
			$row[] = $admin->username;
			$row[] = $admin->email;
			$row[] = date('d M Y',strtotime($admin->created));
			$row[] = date('d M Y',strtotime($admin->modified));

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_admin('."'".$admin->admin_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_admin('."'".$admin->admin_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->mAdmins->count_all(),
						"recordsFiltered" => $this->mAdmins->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}	

	public function ajax_edit($id)
	{
		$data = $this->mUsers->get_by_id($id);
		echo json_encode($data);
	}

	public function admin_ajax_edit($id)
	{
		$data = $this->mAdmins->get_by_id($id);
		echo json_encode($data);
	}	

	public function ajax_add()
	{
		$this->_validate();
		//$slug = url_title($this->input->post('category_name'), 'dash', TRUE);
		$date = date('Y-m-d H:i:s');
		$data = array(
				'username' 		=> $this->input->post('username'),
				'email' 		=> $this->input->post('email'),
				'password'		=> sha1($this->input->post('password')),
				'first_name' 	=> $this->input->post('first_name'),
				'last_name'		=> $this->input->post('last_name'),
				'gender' 		=> $this->input->post('gender'),
				'created' 		=> $date,
				'modified' 	    => $date,
			);


		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload();
			$data['photo'] = $upload;
		}

		$insert = $this->mUsers->save($data);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload()
	{
		$config['upload_path']          = 'assets/upload/image/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}	

	public function admin_ajax_add()
	{
		$this->_validate();
		$date = date('Y-m-d H:i:s');
		$data = array(
				'username' 		=> $this->input->post('username'),
				'email' 		=> $this->input->post('email'),
				'password'		=> sha1($this->input->post('password')),
				'created' 		=> $date,
				'modified' 	    => $date,
			);
		$insert = $this->mAdmins->save($data);
		echo json_encode(array("status" => TRUE));
	}	

	public function ajax_update()
	{
		$this->_validate();
	
		$date = date('Y-m-d H:i:s');		
		$data = array(
				'username' 		=> $this->input->post('username'),
				'email' 		=> $this->input->post('email'),
				'password'		=> sha1($this->input->post('password')),
				'first_name' 	=> $this->input->post('first_name'),
				'last_name'		=> $this->input->post('last_name'),
				'gender' 		=> $this->input->post('gender'),
				'modified' 	    => $date,
			);

		if($this->input->post('remove_photo')) // if remove photo checked
		{
			if(file_exists('assets/upload/image/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
				unlink('assets/upload/image/'.$this->input->post('remove_photo'));
			$data['photo'] = '';
		}

		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload();
			
			//delete file
			$user = $this->mUsers->get_by_id($this->input->post('id'));
			if(file_exists('assets/upload/image/'.$user->photo) && $user->photo)
				unlink('assets/upload/image/'.$user->photo);

			$data['photo'] = $upload;
		}

		$this->mUsers->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function admin_ajax_update()
	{
		$this->_validate();
		$date = date('Y-m-d H:i:s');		
		$data = array(
				'username' 	=> $this->input->post('username'),
				'email' 	=> $this->input->post('email'),
				'password'	=> sha1($this->input->post('password')),
				'modified' 	=> $date,
			);
		$this->mAdmins->update(array('admin_id' => $this->input->post('admin_id')), $data);
		echo json_encode(array("status" => TRUE));
	}	

	public function ajax_delete($id)
	{

		$user = $this->mUsers->get_by_id($id);
		if(file_exists('assets/upload/image/'.$user->photo) && $user->photo)
			unlink('assets/upload/image/'.$user->photo);

		$this->mUsers->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	public function admin_ajax_delete($id)
	{
		$this->mAdmins->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}	


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('username') == '')
		{
			$data['inputerror'][] = 'username';
			$data['error_string'][] = 'Username is required';
			$data['status'] = FALSE;
		}


		if($this->input->post('email') == '')
		{
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Email is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('password') == '')
		{
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'Password is required';
			$data['status'] = FALSE;
		}				

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
