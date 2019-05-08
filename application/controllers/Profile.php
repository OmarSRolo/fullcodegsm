<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller
{

    public function get($id)
    {
        $userdata = $this->session->get_userdata('username');

        if (array_key_exists("username", $userdata)) {
            $user = $this->user_model->get($id);
            if (($user["role"] === "user" || $user["role"] === "admin") && !empty($user)) {
                $this->load->view('headers/headers');
                $this->load->view('profile/perfil');
                $this->load->view('headers/footers');
            } else {
                $a["heading"] = "Error, Pagina no encontrada";
                $a["message"] = "El perfil de este usuario no ha sido encontrado";
                $this->load->view('headers/headers');
                $this->load->view('errors/html/error_404', $a);
                $this->load->view('headers/footers');
            }
        } else {
            redirect('/home/');
        }

    }

}
