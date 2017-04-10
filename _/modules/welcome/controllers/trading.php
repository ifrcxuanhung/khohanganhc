<?php
require('_/modules/welcome/controllers/block.php');
class Trading extends Welcome{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
		$this->template->write_view('content', 'trading', $this->data);
		$this->template->render();
    }
    
}