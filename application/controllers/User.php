<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Users_model');
        $this->load->model('Obat_model');
    }

    public function index()
    {
        $data['title'] = "Landing";
        $data['category'] = "All Items";
        $data['user'] = $this->Users_model->getUserSession();
        $data['obat'] = $this->Obat_model->getAllObat();
        $this->load->view('templates/user_header', $data);
        $this->load->view('user/user_landing', $data);
        $this->load->view('templates/user_footer', $data);
    }

    public function sort()
    {
        $data['title'] = "Landing";
        $data['category'] = $_GET['id'];
        $data['user'] = $this->Users_model->getUserSession();
        $data['obat'] = $this->Obat_model->getSortObat();
        $this->load->view('templates/user_header', $data);
        $this->load->view('user/user_landing', $data);
        $this->load->view('templates/user_footer', $data);
    }

    public function about()
    {
        $data['title'] = "About";
        $this->load->view('user/user_about', $data);
    }
}
