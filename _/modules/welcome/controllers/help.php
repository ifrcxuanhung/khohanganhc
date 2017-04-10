<?php
require('_/modules/welcome/controllers/block.php');

class Help extends Welcome{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $block = new Block();
        
        $this->data->dashboard_stat = $block->dashboard_stat();
		$this->data->chart = $block->flotchart('500px');
		$this->data->bottom_chart = $block->bottom_chart();
        
        $this->data->education_news = $block->table_education_news();
        $this->data->answer_questions = $block->table_answer_questions();
        $this->data->block_contact = $block->contact();
		$this->template->write_view('content', 'help', $this->data);
		$this->template->render();
    }
    
}