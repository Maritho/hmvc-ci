<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Migrate extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        // Akses di seluruh class migrate hanya boleh dari Command Line Interface (CLI)
        if (is_cli() == FALSE) {
            show_404();
        }
    }

    public function index()
    {
        // load migration library
        $this->load->library('migration');

        if ( ! $this->migration->current())
        {
            echo 'Error' . $this->migration->error_string();
        } else {
            echo 'Migrations ran successfully!';
        }   
    }

    public function insert()
    {
        for ($i = 1; $i <= 100; $i++)
        {
            $this->db->insert('users', [
                'email'      => "user-{$i}@mail.com",
                'password'   => password_hash('codeigniter', PASSWORD_DEFAULT),
                'firstname'  => "Firstname {$i}",
                'lastname'   => "Lastname {$i}",
                'created_at' => date('Y-' . rand(1, 12) . '-' . rand(1, 28) . ' H:i:s'),
            ]);
        }
    }   
}