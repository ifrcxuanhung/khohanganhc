<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bump_map_topview extends Welcome {
    function __construct() {
        parent::__construct();
		$this->load->model("Bump_model",'bump');
    }
    
    function index() {
		$this->data->get_header_x = $this->bump->get_bump_list_x();
		$this->data->get_header_y = $this->bump->get_bump_list_y();
        $this->template->write_view('content', 'bump_map_topview', $this->data);
        $this->template->render();
    }

}