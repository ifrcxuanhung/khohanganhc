<?php
class Jq_loadtable extends Welcome{

    public function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->model('jq_loadtable_model');
		$this->load->model('jq_loadtable_vndmi_model');
    }
 
    public function index($tables){
		
		
       // if($this->session->userdata('user_level') && $this->session->userdata('user_level') >= 8){
    		// get in summary have yet
		$this->data->setting_title_bg = $this->db->where('key_setting','table_title_background')->get('setting')->row_array();
		$this->data->setting_header_bg = $this->db->where('key_setting','table_header_background')->get('setting')->row_array();
		$this->data->setting_selected_bg = $this->db->where('key_setting','table_row_selected_background')->get('setting')->row_array();
		$this->data->button_swap_background = $this->db->where('key_setting','button_swap_background')->get('setting')->row_array();
		$this->data->button_import_background = $this->db->where('key_setting','button_import_background')->get('setting')->row_array();
		$this->data->button_txt_background = $this->db->where('key_setting','button_txt_background')->get('setting')->row_array();
		$this->data->button_csv_background = $this->db->where('key_setting','button_csv_background')->get('setting')->row_array();
		$this->data->button_excel_background = $this->db->where('key_setting','button_excel_background')->get('setting')->row_array();
		$this->data->jq_row_height = $this->db->where('key_setting','jq_row_height')->get('setting')->row_array();
		//
			
			if($tables =='export' || $tables =='import'){
				$check_summary = 'true';	
			}else{
				$check_summary = $this->jq_loadtable_model->getSummary($tables);	
			}
			//$check_summary_vndmi = $this->jq_loadtable_vndmi_model->get_summary_des($tables);
            if($check_summary == true){
				 
                $get_summary = $this->db->select('`user_level`')->where('table_name',$tables)->get('web_summary')->row_array();
            
        		
			//if ($this->db->table_exists($tables) && $this->session->userdata('user_level') >= $get_summary['user_level'])
			
					
        				// export theo tung dinh dang file
        				if(isset($_REQUEST['actexport'])&&($_REQUEST['actexport']=='exportCsv'||$_REQUEST['actexport']=='exportTxt')){
        					$this->export();
        				}
        				else if(isset($_REQUEST['actexport'])&&($_REQUEST['actexport']=='exportXls')){
        					$this->exportXls();
        				}
        				//end export theo tung dinh dang file
        				
        				$this->data->table = $tables;
        				 $this->load->model('jq_loadtable_model');
        				 //Kiem tra neu co mother_jq trong summary thi lay format theo cot nay, nguoc lai lay theo cot table name
        				//$mother_jq = $this->db->select('mother_jq')->where('table_name',$tables)->get('web_summary')->row_array();
                        //print_R($mother_jq);exit;
        				//if(isset($mother_jq['mother_jq']) && $mother_jq['mother_jq'] != ''){
        					//$column = $this->jq_loadtable_model->js_sys_format($mother_jq['mother_jq']);
        				//}
						$this->data->table_export = '';
						$this->data->table_import = '';
						if($tables == 'export'){
							$column = $this->jq_loadtable_model->js_sys_format_active_short_export('web_summary');
							$tables ='web_summary';
							$this->data->table = $tables;
							$this->data->table_export = 'export';
						}
						elseif($tables == 'import'){
							$column = $this->jq_loadtable_model->js_sys_format_active_short_import('web_summary');
							$tables ='web_summary';
							$this->data->table = $tables;
							$this->data->table_import = 'import';
						}
						else{
        					$column = $this->jq_loadtable_model->js_sys_format($tables);	
        				}
        				//kiem tra cot trong sys co trong table hay khong
        				$select_column = $this->db->list_fields($tables);
        				// Bien nay kiem tra xem cac cot trong sys co trong table ko, neu khong thi tra ra loi
        				$error = array();
        				foreach($column as $k=>$val_column){
        					if($val_column['searchoptions'] == 'select'){
        						$column[$k]['stype'] = "select";	
        						//get select
        						if(in_array($val_column['name'], $select_column)){
        							$this->db->select($val_column['name']);
        							$this->db->distinct();
        							$this->db->order_by($val_column['name'],"ASC");
        						
        							$query = $this->db->get($tables);
        							$data = $query->result_array();
        						}
        						else{
        							$data = array();
        							$error[] = 	$val_column['name'];
        						}
        						$result='';
        						
        						foreach($data as $key=>$v){
        							if($v[$val_column['name']] == '' || $v[$val_column['name']] == ' '){
        								unset($data[$key]);
        							}else{
        								
        								$result.= $v[$val_column['name']].":".$v[$val_column['name']].";";
        								
        							}
        							
        						}
        						
        						$column[$k]['selectlist'] = json_encode($result,JSON_UNESCAPED_UNICODE);
								
        						
        						
        					}
							// khu vuc
							$khuvuc = $this->khuvuc();
							$noi_khuvuc='';
							foreach($khuvuc as $kv){
								$noi_khuvuc.= $kv['TenLoai'].":".$kv['TenLoai'].";";
							}
							$this->data->return_kv = json_encode($noi_khuvuc,JSON_UNESCAPED_UNICODE);
							
							//echo "<pre>";print_r($return_kv);exit; 
							
        					if($val_column['hidden'] == 'false'){
        						unset($column[$k]['hidden']);	
        					}
        					$column[$k]['headertitles'] = "";
        					$column[$k]['editable']='false';
							// Xoa key tab neu la import
							if($this->data->table_import == 'import'){
									if($column[$k]['name'] == 'tab'){
										unset($column[$k]);
									}
							}
        					
        				}
						//if($this->data->table_export != 'export' && $this->data->table_import != 'import'){
							//$array_action = array('label'=> "Actions",'name'=> "actions",'width'=> '3','formatter'=> "actions");
							//array_push($column,$array_action);
						//}
						
        				$this->data->column =json_encode($column);
        				$this->data->error =json_encode($error);
        				 
        				 // get list neu searchoptions =1 
        		
        				
        				if(isset($_GET))
        					$this->data->filter_get_all = json_encode($_GET);
        				
        				
        				$this->data->summary_des = $this->jq_loadtable_model->get_summary_des($tables);
        				
        				
        				$this->template->write_view('content', 'jq_loadtable',$this->data);
        				$this->template->render();
						
        		
        		
            }else{
                $this->data->table = $tables;
    			$this->template->write_view('content', 'error', $this->data);
                $this->template->render();
            }
	
    }
	public function khuvuc(){
		$kq = $this->db->query("select TenLoai from khuvuc where AnHien = 1 and lang = 'vi'")->result_array();	
		return $kq;
	}
	

	
	public function export() {
	
		$table = isset($_REQUEST['table_name_export'])? $_REQUEST['table_name_export'] :'';
			
		$arr_table_sys = $this->jq_loadtable_model->get_tab($table);
		$table_sys = isset($arr_table_sys["tables"]) ? $arr_table_sys["tables"] : $table;
        $mother_jq = $this->db->select('mother_jq')->where('table_name',$table)->get('web_summary')->row_array();
        //print_R($mother_jq);exit;
		if(isset($mother_jq['mother_jq']) && $mother_jq['mother_jq'] != ''){
			$headers = $this->jq_loadtable_model->js_sys_format($mother_jq['mother_jq']);
		}else{
			$headers = $this->jq_loadtable_model->js_sys_format($table_sys);	
		}
        
        // select columns
        $where = "where 1=1";
        //print_R($headers);exit;
        $aColumns = array();
		$aColumnsHeader = array();
		foreach ($headers as $item) {
			$aColumnsHeader[]=$item['label'];
			$aColumns[] = '`'.$item['name'].'`';
		}
        unset($headers);
		
        
		$sTable = $table_sys; //$category == 'all' ? "efrc_".$table : "(SELECT * FROM efrc_".$table." where category = '".$category."') as sTable " ;
		
		//echo "<pre>";print_r();exit;
		
		 $order_by = (($arr_table_sys['order']!='') && (!is_null($arr_table_sys['order'])))?('order by '.$arr_table_sys['order']):'';
		 //echo $order_by;exit;
		if(is_null($arr_table_sys['limit_export'])){
			$sql = "select sql_calc_found_rows " . str_replace(' , ', ' ', implode(', ', $aColumns)) . "
    					from {$sTable} {$where};"; 
						
			
		}
		else {
			
		$level = $this->session->userdata('user_level');
		$arrlimit = explode(";",$arr_table_sys['limit_export']);
		$limit = isset($arrlimit[$level]) ? $arrlimit[$level] :10;
		$sql = "select sql_calc_found_rows " . str_replace(' , ', ' ', implode(', ', $aColumns)) . "
                from {$sTable} {$where} limit {$limit};";
		
		}
		//echo $sql; exit;
        $this->load->dbutil();
        $query = $this->db->query($sql)->result_array();
		
		
		if(isset($_REQUEST['actexport'])&&($_REQUEST['actexport']=='exportCsv')){
			
		$this->dbutil->export_to_csv("{$table_sys}", $query, $aColumnsHeader, null,",", true);
		}
		else if(isset($_REQUEST['actexport'])&&($_REQUEST['actexport']=='exportTxt')){
			
		$this->dbutil->export_to_txt("{$table_sys}", $query, $aColumnsHeader, null,chr(9), true);
		}		
		die();
		
    }
	public function exportXls(){
		$table = isset($_REQUEST['table_name_export'])? $_REQUEST['table_name_export'] :'';
		
		$content = file_get_contents(base_url().'assets/download/tab_xls.php');
		$content = $this->bodyReport($content,$table);
		header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT");
		header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
		header ( "Pragma: no-cache" );
		header ( "Content-type: application/msexcel");
		header ( "Content-Disposition: inline; filename=\"{$table}_".date("dmYhi").".xls\"");
		print($content);
		die();
	}
	function bodyReport($content,$tab_name){
		$tab = $this->jq_loadtable_model->get_tab($tab_name);	
	
		$table_sys = isset($tab["table_name"]) ? $tab["table_name"] : $tab_name;
	//	$headers = $this->table->gets_headers($tab['table_name'],$tab['query']);
	//	$table_sys = isset($arr_table_sys["tables"]) ? $arr_table_sys["tables"] : $table;
        $mother_jq = $this->db->select('mother_jq')->where('table_name',$table_sys)->get('web_summary')->row_array();
        //print_R($mother_jq);exit;
		if(isset($mother_jq['mother_jq']) && $mother_jq['mother_jq'] != ''){
			$headers = $this->jq_loadtable_model->js_sys_format($mother_jq['mother_jq']);
		}else{
			$headers = $this->jq_loadtable_model->js_sys_format($table_sys);	
		}
        
		
		$this->load->dbutil();
		$arrBody = $this->dbutil->PartitionString('<!--s_heading-->', '<!--e_heading-->', $content);
		$rowInfo = '';
        foreach ($headers as $item) {
			$rowInfo .=$arrBody[1];
			$rowInfo = str_replace('{width}', $item['width'], $rowInfo);
			$rowInfo = str_replace('{align}', $item['align'], $rowInfo);
			$rowInfo = str_replace('{title}', $item['label'], $rowInfo);
		}
		$content = $arrBody[0].$rowInfo.$arrBody[2];
		
		$where = "where 1=1";
		foreach ($headers as $item) {
			$aColumns[] = '`'.$item['name'].'`';
		}
        
		$sTable = $table_sys; 
		
		$order_by = (($tab['order']!='') && (!is_null($tab['order'])))?('order by '.$tab['order']):'';
		 
		if(is_null($tab['limit_export'])){
        	$sql = "select sql_calc_found_rows " . str_replace(' , ', ' ', implode(', ', $aColumns)) . "
                from {$sTable} {$where};";
		}	
		else {
		$level = $this->session->userdata('user_level');
		$arrlimit = explode(";",$tab['limit_export']);
		$limit = isset($arrlimit[$level]) ? $arrlimit[$level] :10;
		$sql = "select sql_calc_found_rows " . str_replace(' , ', ' ', implode(', ', $aColumns)) . "
                from {$sTable} {$where}  limit {$limit};";
		/*$sql = "select sql_calc_found_rows " . str_replace(' , ', ' ', implode(', ', $aColumns)) . "
                from {$sTable} {$where};";*/
		}
		//	echo "<pre>";print_r($sql);exit;
        $data = $this->db->query($sql)->result_array();
		
		$arrBody = $this->dbutil->PartitionString('<!--s_body-->', '<!--e_body-->', $content);
		$rowInfo = '';
		$i= 0;
		foreach ($data as $key => $value) {
			$rowInfo .='<tr>';
            foreach($headers as $item) {
               
				$rowInfo .=$arrBody[1];
				if ($i % 2) 
				$rowInfo = str_replace('{color}', '#f7f7f7', $rowInfo);
				else
				$rowInfo = str_replace('{color}', '#fffff', $rowInfo);
				
				$rowInfo = str_replace('{body}', '<div'.$item['align'].'>'.$value[strtolower($item['name'])].'</div>', $rowInfo);
				$i ++;
            }
			$rowInfo .='</tr>';
        }
		$content = $arrBody[0].$rowInfo.$arrBody[2];
		return $content;
	}
	
	
 
}
