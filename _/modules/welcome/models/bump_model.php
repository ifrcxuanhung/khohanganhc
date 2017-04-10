<?php
class Bump_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
	public function get_bump_list_x()
    {
        $sql="select * from bump_list GROUP BY x order by x desc";
        $query = $this->db->query($sql);
        $data = $query->result_array();
      // echo "<pre>";print_r($data);exit;
        return $data;  
    }
	public function get_bump_list_y()
    {
        $sql="select * from bump_list GROUP BY y order by y desc";
        $query = $this->db->query($sql);
        $data = $query->result_array();
      // echo "<pre>";print_r($data);exit;
        return $data;  
    }
	public function test(){
		$sql = "
				SET @sql = NULL;
				SELECT 
				  GROUP_CONCAT(DISTINCT
					CONCAT(
					  'MAX(IF(x = ''',
					  x,
					  ''', bumpname, NULL)) '
					)
				  ) INTO @sql
				FROM bump_list;
				SET @sql = CONCAT('SELECT id,y, ', @sql, ' FROM bump_list GROUP BY id');
				PREPARE stmt FROM @sql;
				EXECUTE stmt;
				DEALLOCATE PREPARE stmt;";
	}
	
    

}