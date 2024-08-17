<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('restclient');
    }

    public function index() {
        $data['proyek'] = json_decode($this->restclient->get('http://localhost:8080/api/proyek'), true);
        $data['lokasi_data'] = json_decode($this->restclient->get('http://localhost:8080/api/lokasi'), true);
    
        // Debugging data
        // echo '<pre>';
        // print_r($data['lokasi_data']);
        // echo '</pre>';
        
        $this->load->view('dashboard', $data);
    }
    
}
