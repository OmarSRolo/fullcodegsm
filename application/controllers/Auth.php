<?php

class Auth extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function login()
    {
        try {
            $data["username"] = $this->input->get_post("username");
            $data["password"] = $this->input->get_post("password");

            $user = $this->user_model->get_by(array('username' => $data['username'], 'password' => sha1($data['password'])));

            if ($user != null) {
                $this->session->set_userdata(array(
                    "username" => $user["username"],
                    "email" => $user["email"],
                    "role" => $user["role"],
                    "id" => $user["id"],
                ));

                $this->json_result(true, 'Login complete', "");
            } else {
                $this->json_result(false, 'Usuario o password incorrecto');
            }
        } catch (Exception $e) {
            $this->json_result(false, $e->getMessage());
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(array('username', "email", "role", "id"));
        $this->json_result(true, 'Logout complete');
    }

    public function register()
    {
        try {
            $data = array();
            $this->input->post('email') != null && $data['email'] = $this->input->post('email');
            $this->input->post('username') != null && $data['username'] = $this->input->post('username');
            $this->input->post('password') != null && $data['password'] = $this->input->post('password');
            $this->input->post('first_name') != null && $data['first_name'] = $this->input->post('first_name');
            $this->input->post('last_name') != null && $data['last_name'] = $this->input->post('last_name');
            $data['role'] = 'user';
            $this->user_model->add_validation(array('field' => 'password', 'label' => 'Password', 'rules' => 'required|min_length[7]'));
            $r = $this->user_model->insert($data);
            $this->json_result($r, $r ? '' : validation_errors());
        } catch (Exception $e) {
            $this->json_result(false, $e->getMessage());
        }
    }


}
