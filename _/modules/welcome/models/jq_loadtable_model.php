<?php
class Jq_loadtable_model extends CI_Model{
    protected $_lang;
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
		if(isset($_SESSION['curent_language'])){
        $this->_lang = $_SESSION['curent_language'];
		}else{
			$this->_lang = 'en';	
		}
    }
	

	public function getTable($page,$limit,$sord, $sidx, $filter,$filter_get ='',$jq_table){
		
		$array_get = array();
		$where = "where 1=1";
		
		$sql_count = "SELECT COUNT(*) AS count FROM $jq_table $where "; 
		//count filter
	
		// get field từ sysformat theo table
		$mother_jq = $this->db->select('mother_jq')->where('table_name',$jq_table)->get('web_summary')->row_array();
		if(isset($mother_jq['mother_jq']) && $mother_jq['mother_jq'] != ''){
			$table_sys = $this->js_sys_format($mother_jq['mother_jq']);
		}else{
			$table_sys = $this->js_sys_format($jq_table);	
		}
		foreach($table_sys as $val){
			if(isset($filter[$val['name']])){
				$val_filter_count = $filter[$val['name']];
				if($val['searchoptions'] == 'select'){
					$sql_count.=" and $val[name] = '$val_filter_count' ";
				}else{
					$sql_count.=" and $val[name] LIKE '%$val_filter_count%' ";
				}
			}
		}
		
		
		
	
		//count filter get tren url
		foreach($table_sys as $val){
			if(isset($filter_get->$val['name'])){
				$val_filter_url = $filter_get->$val['name'];
				if($val['searchoptions'] == 'select'){
					$sql_count.=" and $val[name] = '$val_filter_url' ";
				}else{
					$sql_count.=" and $val[name] LIKE '%$val_filter_url%' ";
				}
			}
		}
		
		$row = $this->db->query($sql_count)->row_array();
		$count = $row['count'];
		
		// calculate the total pages for the query 
		
		if( $count > 0 && $limit > 0) { 
					  $total_pages = ceil($count/$limit); 
		} else { 
					  $total_pages = 0; 
		} 
		 if($count != 0){
			// if for some reasons the requested page is greater than the total 
			// set the requested page to total page 
			if ($page > $total_pages) $page=$total_pages;
			 
			// calculate the starting position of the rows 
			$start = $limit*$page - $limit;
			
			
		$sql = "SELECT * FROM $jq_table $where ";
		
		//filter
		foreach($table_sys as $val){
			if(isset($filter[$val['name']])){
				$val_filter = $filter[$val['name']];
				if($val['searchoptions'] == 'select'){
					$sql.=" and $val[name] = '$val_filter' ";
				}else{
					$sql.=" and $val[name] LIKE '%$val_filter%' ";
				}
			}
		}
		//filter get tu trên url xuong
		//count filter get tren url
		foreach($table_sys as $val){
			if(isset($filter_get->$val['name'])){
				$val_filter_url_2 = $filter_get->$val['name'];
				if($val['searchoptions'] == 'select'){
					$sql.=" and $val[name] = '$val_filter_url_2' ";
				}else{
					$sql.=" and $val[name] LIKE '%$val_filter_url_2%' ";
				}
			}
		}
		
		$sql.="ORDER BY $sidx $sord LIMIT $start , $limit";
		//echo "<pre>";print_r($sql);exit;
		$result = $this->db->query($sql)->result_array();
		
		foreach($result as $k=>$rs){
			if(isset($rs['avatar']) && ($rs['avatar'] == '' || $rs['avatar'] == 'null' || !file_exists($rs['avatar']))){
				$result[$k]['avatar'] = 'assets/upload/avatar/no_avatar.jpg';
			}
			if(isset($rs['image']) && ($rs['image'] == '' ||  $rs['image'] == 'null' || !file_exists($rs['image']))){
				$result[$k]['image'] = 'assets/upload/avatar/no_avatar.jpg';
			}
			if($jq_table == 'web_summary'){
				$file_down = $this->checkExternalFile(base_url().'export/'.$rs['tab'].'.csv');
				//echo "<pre>";print_r($file_down);
				if($file_down > 400){
					$result[$k]['tab'] = '';
				}
			}
		}
		//echo "<pre>";print_r($result);exit;
		$data = array('records'=>$count,'page'=>$page,'total'=>$total_pages,'rows'=>$result);
	
			 return $data;
		 }
		 else{
			 $data = array('records'=> 0 ,'page'=> 0 ,'total'=> 0 ,'rows'=> 0);
			return $data; 
		}
	}
	function checkExternalFile($url)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_exec($ch);
		$retCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
	
		return $retCode;
	}
	
	
	
	public function getTableExport($page,$limit,$sord, $sidx, $filter,$filter_get ='',$jq_table){
		
		$array_get = array();
		$where = "where 1=1 AND export = 1 ";
		
		$sql_count = "SELECT COUNT(*) AS count FROM $jq_table $where "; 
		//count filter
	
		// get field từ sysformat theo table
		$mother_jq = $this->db->select('mother_jq')->where('table_name',$jq_table)->get('web_summary')->row_array();
		if(isset($mother_jq['mother_jq']) && $mother_jq['mother_jq'] != ''){
			$table_sys = $this->js_sys_format($mother_jq['mother_jq']);
		}else{
			$table_sys = $this->js_sys_format($jq_table);	
		}
		foreach($table_sys as $val){
			if(isset($filter[$val['name']])){
				$val_filter_count = $filter[$val['name']];
				if($val['searchoptions'] == 'select'){
					$sql_count.=" and $val[name] = '$val_filter_count' ";
				}else{
					$sql_count.=" and $val[name] LIKE '%$val_filter_count%' ";
				}
			}
		}
		
		
		
	
		//count filter get tren url
		foreach($table_sys as $val){
			if(isset($filter_get->$val['name'])){
				$val_filter_url = $filter_get->$val['name'];
				if($val['searchoptions'] == 'select'){
					$sql_count.=" and $val[name] = '$val_filter_url' ";
				}else{
					$sql_count.=" and $val[name] LIKE '%$val_filter_url%' ";
				}
			}
		}
		
		$row = $this->db->query($sql_count)->row_array();
		$count = $row['count'];
		
		// calculate the total pages for the query 
		
		if( $count > 0 && $limit > 0) { 
					  $total_pages = ceil($count/$limit); 
		} else { 
					  $total_pages = 0; 
		} 
		 if($count != 0){
			// if for some reasons the requested page is greater than the total 
			// set the requested page to total page 
			if ($page > $total_pages) $page=$total_pages;
			 
			// calculate the starting position of the rows 
			$start = $limit*$page - $limit;
			
			
		$sql = "SELECT * FROM $jq_table $where ";
		
		//filter
		foreach($table_sys as $val){
			if(isset($filter[$val['name']])){
				$val_filter = $filter[$val['name']];
				if($val['searchoptions'] == 'select'){
					$sql.=" and $val[name] = '$val_filter' ";
				}else{
					$sql.=" and $val[name] LIKE '%$val_filter%' ";
				}
			}
		}
		//filter get tu trên url xuong
		//count filter get tren url
		foreach($table_sys as $val){
			if(isset($filter_get->$val['name'])){
				$val_filter_url_2 = $filter_get->$val['name'];
				if($val['searchoptions'] == 'select'){
					$sql.=" and $val[name] = '$val_filter_url_2' ";
				}else{
					$sql.=" and $val[name] LIKE '%$val_filter_url_2%' ";
				}
			}
		}
		
		$sql.="ORDER BY $sidx $sord LIMIT $start , $limit";
		//echo "<pre>";print_r($sql);exit;
		$result = $this->db->query($sql)->result_array();
		
		foreach($result as $k=>$rs){
			if(isset($rs['avatar']) && ($rs['avatar'] == '' || !file_exists($rs['avatar']))){
				$result[$k]['avatar'] = 'assets/upload/avatar/no_avatar.jpg';
			}
			if(isset($rs['image']) && ($rs['image'] == '' || !file_exists($rs['image']))){
				$result[$k]['image'] = 'assets/upload/avatar/no_avatar.jpg';
			}	
			$file_down = $this->checkExternalFile(base_url().'export/'.$rs['tab'].'.csv');
			//echo "<pre>";print_r($file_down);
			if($file_down > 400){
				$result[$k]['tab'] = '';
			}
		}
		
		$data = array('records'=>$count,'page'=>$page,'total'=>$total_pages,'rows'=>$result);
	
			 return $data;
		 }
		 else{
			 $data = array('records'=> 0 ,'page'=> 0 ,'total'=> 0 ,'rows'=> 0);
			return $data; 
		}
	}
	
	public function getTableImport($page,$limit,$sord, $sidx, $filter,$filter_get ='',$jq_table){
		
		$array_get = array();
		$where = "where 1=1 AND import = 1 ";
		
		$sql_count = "SELECT COUNT(*) AS count FROM $jq_table $where "; 
		//count filter
	
		// get field từ sysformat theo table
		$mother_jq = $this->db->select('mother_jq')->where('table_name',$jq_table)->get('web_summary')->row_array();
		if(isset($mother_jq['mother_jq']) && $mother_jq['mother_jq'] != ''){
			$table_sys = $this->js_sys_format($mother_jq['mother_jq']);
		}else{
			$table_sys = $this->js_sys_format($jq_table);	
		}
		foreach($table_sys as $val){
			if(isset($filter[$val['name']])){
				$val_filter_count = $filter[$val['name']];
				if($val['searchoptions'] == 'select'){
					$sql_count.=" and $val[name] = '$val_filter_count' ";
				}else{
					$sql_count.=" and $val[name] LIKE '%$val_filter_count%' ";
				}
			}
		}
		
		
		
	
		//count filter get tren url
		foreach($table_sys as $val){
			if(isset($filter_get->$val['name'])){
				$val_filter_url = $filter_get->$val['name'];
				if($val['searchoptions'] == 'select'){
					$sql_count.=" and $val[name] = '$val_filter_url' ";
				}else{
					$sql_count.=" and $val[name] LIKE '%$val_filter_url%' ";
				}
			}
		}
		
		$row = $this->db->query($sql_count)->row_array();
		$count = $row['count'];
		
		// calculate the total pages for the query 
		
		if( $count > 0 && $limit > 0) { 
					  $total_pages = ceil($count/$limit); 
		} else { 
					  $total_pages = 0; 
		} 
		 if($count != 0){
			// if for some reasons the requested page is greater than the total 
			// set the requested page to total page 
			if ($page > $total_pages) $page=$total_pages;
			 
			// calculate the starting position of the rows 
			$start = $limit*$page - $limit;
			
			
		$sql = "SELECT * FROM $jq_table $where ";
		
		//filter
		foreach($table_sys as $val){
			if(isset($filter[$val['name']])){
				$val_filter = $filter[$val['name']];
				if($val['searchoptions'] == 'select'){
					$sql.=" and $val[name] = '$val_filter' ";
				}else{
					$sql.=" and $val[name] LIKE '%$val_filter%' ";
				}
			}
		}
		//filter get tu trên url xuong
		//count filter get tren url
		foreach($table_sys as $val){
			if(isset($filter_get->$val['name'])){
				$val_filter_url_2 = $filter_get->$val['name'];
				if($val['searchoptions'] == 'select'){
					$sql.=" and $val[name] = '$val_filter_url_2' ";
				}else{
					$sql.=" and $val[name] LIKE '%$val_filter_url_2%' ";
				}
			}
		}
		
		$sql.="ORDER BY $sidx $sord LIMIT $start , $limit";
		//echo "<pre>";print_r($sql);exit;
		$result = $this->db->query($sql)->result_array();
		
		foreach($result as $k=>$rs){
			if(isset($rs['avatar']) && ($rs['avatar'] == '' || !file_exists($rs['avatar']))){
				$result[$k]['avatar'] = 'assets/upload/avatar/no_avatar.jpg';
			}
			if(isset($rs['image']) && ($rs['image'] == '' || !file_exists($rs['image']))){
				$result[$k]['image'] = 'assets/upload/avatar/no_avatar.jpg';
			}	
		}
		
		$data = array('records'=>$count,'page'=>$page,'total'=>$total_pages,'rows'=>$result);
	
			 return $data;
		 }
		 else{
			 $data = array('records'=> 0 ,'page'=> 0 ,'total'=> 0 ,'rows'=> 0);
			return $data; 
		}
	}
	
	
	
	
	
	
	
	public function get_summary_des($tables){
	
		$this->db->select('description,order_by,user_level, vndmi');
		$this->db->where('table_name', $tables); 
		$query = $this->db->get('web_summary');
		$result = $query->row_array();
		return $result;
	}
	
	public function js_sys_format($tables){
		
		$this->db->select('*');
		$this->db->where('tables', $tables);
		$this->db->where('active', 1); 
		$this->db->order_by('order', 'asc'); 
		$query = $this->db->get('jq_sys_format');
		$result = $query->result_array();
		return $result;
	}
	public function js_sys_format_active_short($tables){
		
		$this->db->select('*');
		$this->db->where('tables', $tables);
		$this->db->where('active', 1);
		$this->db->where('active_short', 1); 
		$this->db->order_by('order', 'asc'); 
		$query = $this->db->get('jq_sys_format');
		$result = $query->result_array();
		return $result;
	}
	public function js_sys_format_active_short_export($tables){
		
		$this->db->select('*');
		$this->db->where('tables', $tables);
		$this->db->where('active', 1);
		$this->db->where('active_short', 1); 
		$this->db->order_by('order', 'asc'); 
		$query = $this->db->get('jq_sys_format');
		$result = $query->result_array();
		return $result;
	}
	public function js_sys_format_active_short_import($tables){
		
		$this->db->select('*');
		$this->db->where('tables', $tables);
		$this->db->where('active', 1);
		$this->db->where('active_short', 1); 
		$this->db->order_by('order', 'asc'); 
		$query = $this->db->get('jq_sys_format');
		$result = $query->result_array();
		return $result;
	}
	public function get_tab($tab='') {
		$sql = "select *
                from web_summary 
				where table_name = '$tab'";
                //where tab = '$tab' and user_level <=".$this->session->userdata_vnefrc('user_level');
		 return $this->db->query($sql)->row_array();       
    }
	function gets_headers($table='',$field='') {
        $ids = array($table);
        $sql = "select *
                from jq_sys_format 
                where `tables` ='".$table."' order by `order` asc ";
       // print_R($sql);exit;
         return $this->db->query($sql)->result_array();
    }
	function gets_headersActive($table='',$field='') {
        $ids = array($table);
        $sql = "select *
                from jq_sys_format 
                where `tables` ='".$table."' AND `active` = 1 order by `order` asc ";
       // print_R($sql);exit;
         return $this->db->query($sql)->result_array();
    }
	function gets_headersActiveShort($table='',$field='') {
	
        $ids = array($table);
        $sql = "select *
                from jq_sys_format 
                where `tables` ='".$table."' and `active_short` = 1 order by `order` asc ";
         return $this->db->query($sql)->result_array();
    }
	function getSummary($table){
		$this->db->where('table_name',$table);
		$query = $this->db->get('web_summary');
		if ($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}	
	}

   
}

