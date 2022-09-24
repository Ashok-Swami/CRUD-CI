<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_models');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data["all_users"] = $this->User_models->get_all_users();

		$this->load->view('index',$data);
	}
	public function create()
	{
		$this->load->view('create');
	}
	public function save_data()
	{
		if (isset($_POST)) {
			$insert_data['fname'] = $_POST['fname'];
			$insert_data['lname'] = $_POST['lname'];
			$insert_data['email'] = $_POST['email'];
			$insert_data['mobile'] = $_POST['mobile'];
			$insert_data['gender'] = $_POST['gender'];
			$insert_data['state'] = $_POST['statu'];

			$data = $this->User_models->insert_data('users', $insert_data);
			if (!empty($data)) {
				print json_encode(array('status' => '1', 'msg' => "successfully inserted user's records"));
				die;
			} else {
				print json_encode(array('status' => '0', 'msg' => 'somthing worng try again'));
				die;
			}
		}
	}
	public function edit()
    {
        $user_id = $this->uri->segment(3);
        $response['edit_user'] = $this->User_models->get_id_wise_detail('users', $user_id);
        $this->load->view('edit', $response);
    }
	public function update_data()
	{
		if (isset($_POST)) {
			$user_id = $_POST['userid'];
			$insert_data['fname'] = $_POST['fname'];
			$insert_data['lname'] = $_POST['lname'];
			$insert_data['email'] = $_POST['email'];
			$insert_data['mobile'] = $_POST['mobile'];
			$insert_data['gender'] = $_POST['gender'];
			$insert_data['state'] = $_POST['statu'];
			$insert_data['state'] = $_POST['statu'];

			$data = $this->User_models->update_data('users', $insert_data,$user_id);
			if (!empty($data)) {
				print json_encode(array('status' => '1', 'msg' => "successfully updated user's records"));
				die;
			} else {
				print json_encode(array('status' => '0', 'msg' => 'somthing worng try again'));
				die;
			}
		}



	}
	public function delete()
    {
        $user_id = $this->uri->segment(3);
        $delete = $this->User_models->delete_data($user_id);
        if ($delete) {
            
            redirect('/');
        } else {
            print json_encode(array('status' => '0', 'msg' => 'somthing worng try again'));
            die;
        }
    }

}
