<?php

class Home extends CI_Controller {
    
        public function __construct() {
            parent::__construct();
        }

	public function index($page='index')
	{
            if ( ! file_exists('application/views/pages/'.$page.'.php'))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}

	$data['title'] = 'Home- Welcome to Writers'; // Capitalize the first letter

	$this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
	$this->load->view('pages/'.$page, $data);
	$this->load->view('templates/footer', $data);

	}
}