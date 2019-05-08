<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{

    public function index()
    {
        $this->load->view('headers/headers');
        $this->load->view('/home');
        $this->load->view('headers/footers');
    }

}
