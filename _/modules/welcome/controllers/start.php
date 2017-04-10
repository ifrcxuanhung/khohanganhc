<?php

class Start extends Welcome{
    public function __construct() {
        parent::__construct();

    }
    
    public function index() {
		
		$this->data->start_title_size = $this->db->where('key_setting','start_title_size')->get('setting')->row_array();
		$this->data->start_title_color = $this->db->where('key_setting','start_title_color')->get('setting')->row_array();
		$this->data->start_stitle_size = $this->db->where('key_setting','start_stitle_size')->get('setting')->row_array();
		$this->data->start_stitle_color = $this->db->where('key_setting','start_stitle_color')->get('setting')->row_array();
		$this->template->write_view('content', 'start', $this->data);
		$this->template->render();
    }
    
}