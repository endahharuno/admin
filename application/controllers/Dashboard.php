<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Dashboard
 * @property Admin_model admin_model
 * @property CI_Input input
 * @property CI_Session session
 * @property CI_Pagination pagination
 * @property CI_URI uri
 * @property CI_Upload upload
 */

class Dashboard extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Admin_model', 'admin_model');
    }

	function index()
	{
	    if ($this->session->userdata('logged_in')) {
	        redirect('dashboard/admin_page');
        } else{
            $this->load->view('form_login');
        }
	}

	function login_adm()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('pwd');
        $admin = $this->admin_model->select_from('admin', 'email', $email);
        if ($admin->num_rows() > 0) {
            $admin = $admin->row();
            $hash_pw = crypt($password, $admin->salt);
            if ($hash_pw === $admin->password) {
                $ses_log = array(
                    'logged_in' => 1,
                    'email' => $email
                );

                $this->session->set_userdata($ses_log);
                $this->admin_model->update('email', $email, 'admin',
                    array(
                        'last_login' => date('Y-m-d H:i:s')
                    ));
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('alert', 'Wrong password');
                redirect('dashboard');
            }
        } else {
            $this->session->set_flashdata('alert', 'User not found');
            redirect('dashboard');
        }
    }

    function admin_page()
    {
        $logged_in = $this->is_auth();
        if ($logged_in) {
            $data['admin'] = $this->admin_model->select('admin')->result_array();
            $this->load->view('content', $data);
        }
    }

    function form_admin()
    {
        $logged_in = $this->is_auth();
        if ($logged_in) {
            $id = $this->uri->segment(3);
            if (empty($id)) {
                $data['id'] = '';
                $data['username'] = '';
                $data['email'] = '';
                $data['pwd'] = '';
            } else {
                $get_admin = $this->admin_model->select_from('admin', 'id', $id);
                if ($get_admin->num_rows() > 0) {
                    foreach ($get_admin->result_array() as $row) {
                        $data['id'] = $row['id'];
                        $data['username'] = $row['username'];
                        $data['email'] = $row['email'];
                        $data['pwd'] = $row['password'];
                    }
                }
            }

            $this->load->view('form_admin', $data);
        }
    }

    function save_admin()
    {
        $id = $this->uri->segment(3);
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $salt = $this->_get_random();
        $hashed_password = crypt($password, $salt);
        $data = array(
            'username' => $username,
            'email' => $email,
            'password' => $hashed_password,
            'salt' => $salt
        );
        $admin = $this->admin_model->select_from('admin', 'email', $email);
        $get_email = $admin->row();
        $before_email = $get_email->email;
        if ($before_email != $email) {
            if ($admin->num_rows() > 0) {
                $this->session->set_flashdata('alert', 'Email already taken');
                redirect('dashboard/admin_page');
            }
        }

        if (!empty($id)) {
            $update = $this->admin_model->update('id', $id, 'admin', $data);
            if ($update) {
                $this->session->set_flashdata('info', 'Update account success');
                redirect('dashboard/admin_page');
            } else {
                $this->session->set_flashdata('alert', 'Update account failed');
                redirect('dashboard/admin_page');
            }

        } else {
            $insert = $this->admin_model->insert_data('admin', $data);
            if ($insert) {
                $this->session->set_flashdata('info', 'Add account success');
                redirect('dashboard/admin_page');
            } else {
                $this->session->set_flashdata('alert', 'Add account failed');
                redirect('dashboard/admin_page');
            }
        }
    }

    function delete_admin()
    {
        $logged_in = $this->is_auth();
        if ($logged_in) {
            $id = $this->uri->segment(3);
            $delete = $this->admin_model->delete('admin', 'id', $id);
            if ($delete) {
                $this->session->set_flashdata('info', 'Delete account success');
                redirect('dashboard/admin_page');
            } else {
                $this->session->set_flashdata('alert', 'Delete account failed');
                redirect('dashboard/admin_page');
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('dashboard');
    }

    private
    function _get_random()
    {
        $start_blow = '$en$13$';
        $end_blow = '$';
        $salt = substr(base64_encode(openssl_random_pseudo_bytes(17)),0,22);

        return $start_blow . $salt . $end_blow;
    }

    function is_auth()
    {
        $email = $this->session->userdata('email');
        if (empty($email)) {
            $this->session->sess_destroy();
            redirect('dashboard');
        } else {
            return $email;
        }
    }
}
