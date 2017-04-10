<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends MY_Controller {

    protected $data;

    function __construct() {
        parent::__construct();
        $this->data = new stdClass();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->load->library('user_agent');
        $this->load->library('ion_auth');
        $this->load->library('session');
		$this->load->model('User_model', 'user_detail');
		$this->db3 = $this->load->database('database3', TRUE);
		/*if(!isset($_SESSION)){
			session_start();
		}
		if (isset($_SESSION['simulation']['username'])) :
			$this->ion_auth->logout();
		endif;
		*/
		
		if(isset($_SESSION['simulation']['user_id'])){
			$this->session->set_userdata('user_id', $_SESSION['simulation']['user_id']);
			$this->data->avatar = $_SESSION['simulation']['gravatar'];
			$this->data->name = $_SESSION['simulation']['username'];
		}
	
		/*if(!isset($_SESSION['array_other_product']['dsymbol']) || $_SESSION['array_other_product']['dsymbol'] == ''){
			
			$_SESSION['array_other_product']['dsymbol'] = "FVNX25";
			$get_vus = $this->db3->where('dsymbol','FVNX25')->get('vdm_contracts_ref')->row_array();
			
			$_SESSION['array_other_product']['usymbol'] = $get_vus['usymbol'];
			$_SESSION['array_other_product']['dtype'] = $get_vus['dtype'];
			$_SESSION['array_other_product']['codeint'] = $get_vus['codeint'];
			$_SESSION['array_other_product']['utype'] = $get_vus['utype'];	
			
		}*///
        /*if(!isset($_SESSION['option_product']['dsymbol']) || $_SESSION['option_product']['dsymbol'] == ''){
			
			$_SESSION['option_product']['dsymbol'] = "OVNX25";
			$get_vus = $this->db3->where('dsymbol','OVNX25')->get('vdm_contracts_ref')->row_array();
			
			$_SESSION['option_product']['usymbol'] = $get_vus['usymbol'];
			$_SESSION['option_product']['dtype'] = $get_vus['dtype'];
			$_SESSION['option_product']['codeint'] = $get_vus['codeint'];	
			
		}*/
		//echo "<pre>";print_r($_SESSION['array_other_product']);exit;
		//echo $this->data->avatar;exit;
	
        $this->data->config = $this->db->get('config')->row_array();
        /*$this->load->model('language_model', 'language');
        $where = array('status' => 1);
        $langList = $this->language->find(NULL, $where);
        if (is_array($langList) == TRUE && count($langList) > 0) {
            foreach ($langList as $value) {
                $this->data->list_language[$value['code']] = $value;
            }
            $this->data->default_language = $langList[0];
        }
        unset($langList);
		//echo "<pre>";print_r($_SESSION);exit;
        $this->session->set_userdata('default_language', $this->data->default_language);
		
        if (!isset($_SESSION['curent_language'])) {
            $this->session->set_userdata('curent_language', $this->data->default_language);
			$file = file_get_contents(base_url().'assets/translate/translate.json');
			$this->data->curent_language = array('code'=>'en');
			$_SESSION['curent_language'] = array('code'=>'en');
        }else{
        	$this->data->curent_language = $_SESSION['curent_language'];
		}*/
    
		//user info
		
		
		//user info
		/*if($this->session->userdata('user_id')) {
            $this->session->set_userdata('login',1);
			if (!$this->session->userdata('user_level')) {
				 $this->load->model('User_model', 'user_detail');
				 $detail = $this->user_detail->get_detail_user($this->session->userdata('user_id'));
				 $this->session->set_userdata('user_level', $detail['user_level']);
				
			}
		}
		else {
		      $this->session->set_userdata('login',0);
			 $this->session->set_userdata('user_level', 0);
		}*/
	
       // $this->data->loginAuth = $this->session->userdata('login');
		
		//menu
        /*if (!$this->session->userdata('id_menu')) {
            $this->session->set_userdata('id_menu', '1');
        }*/
        $this->data->template_url = template_url();
        $this->data->setting = $this->registry->setting;
        $this->template->set_template('default');
        
        // load data sidebar
        $this->load->model('Menu_model', 'menu');
        $this->data->menu = $this->menu->getMenu();
		
		// menu active
		// BACKGROUND BUTTON
		$this->data->text_menu_color = $this->db->where('key_setting','text_menu_color')->get('setting')->row_array();
		$this->data->button_management_background = $this->db->where('key_setting','button_management_background')->get('setting')->row_array();
		$this->data->logo_txt_left = $this->db->where('key_setting','logo_txt_left')->get('setting')->row_array();
		$this->data->logo_txt_right = $this->db->where('key_setting','logo_txt_right')->get('setting')->row_array();
		$this->data->multilanguage = $this->db->where('key_setting','multilanguage')->get('setting')->row_array();
		//echo "<pre>";print_r($this->data->text_menu_color);exit;
		$get_url = explode("table",$_SERVER['REQUEST_URI']);
		/*$menu =$this->session->userdata('id_menu') ? $this->session->userdata('id_menu') :'' ;
		if(isset($get_url[1])){
			$link_menu = "table".$get_url[1];
			 $sql ="SELECT * FROM menu WHERE link = '$link_menu'";
			$get_menu = $this->db->query($sql)->row_array();
			$menu = isset($get_menu['id']) ? $get_menu['id']:$menu;
		
		}
		$this->data->id_menu_actived = $menu;
        */
		
       $id_menu = $this->menu->getMenuByLink(current_url_domain());
		$this->data->id_menu_actived = (isset($id_menu["parent_id"]) && $id_menu["parent_id"]!=0) ? $id_menu["parent_id"] :((isset($id_menu["id"])&& $id_menu["id"]!=134) ? $id_menu["id"] : 0);
		$this->session->set_userdata('id_menu', $this->data->id_menu_actived);
        
        $this->data->setting_ = $this->getSettings();

        $this->data->list_lang = $this->db->where('status', 1)
            ->order_by('sort_order', 'asc')
            ->get('language')->result_array();
			
		$info = $this->db->where('user_id', $this->session->userdata('user_id'))
                    ->limit(1)
                    ->get('login_users')->row_array();
		//echo "<pre>";print_r($info);exit;
		if(isset($info['avatar'])){
			$info['thumb'] = str_replace('assets/upload/avatar','assets/upload/avatar/thumb',$info['avatar']);
		}		
		$this->data->user = $info;
	
		/*$this->data->user = $this->db->where('id', $this->session->userdata('user_id'))
                    ->join('user_info', 'user_info.id_user = user.id')
                    ->limit(1)
                    ->get('user')->row_array();
					
		/*$this->data->detail_user = $this->db->where('user_id', $this->session->userdata('user_id'))
                    ->limit(1)
                    ->get('login_users')->row_array();
         */
        $this->data->user_job = $this->db->where_in('userid', array($this->session->userdata('user_id'),0))->where('active', 1)
                                ->get('int_shortcuts')->result_array();
        // load media
		$this->data->simulation_url = base_url();
		$this->data->logo_txt = $this->db->query("SELECT * FROM simul_settings ss WHERE ss.type='logo'")->result_array();
        //print_R($logo_txt);exit;
		
		$simul_settings = $this->db->get('simul_settings')->result_array();
		
		foreach($simul_settings as $simul){
			$arr_simul[$simul['type']][$simul['stype']][] = $simul;
		}
		$this->data->simul_settings = $arr_simul;
		
		/* dashboar_futures for box futures */
		$this->data->simul_menu = $this->db->where('type','menu')->where('stype','main')->where('active','1')->order_by('order','asc')->get('simul_settings')->result_array();
		
		$this->data->simul_model = $this->db->where('type','menu')->where('stype','model')->where('active','1')->order_by('order','asc')->get('simul_settings')->result_array();
		
		/*$this->data->simul_ortherproduct = $this->db->where('type','menu')->where('stype','otherproduct')->where('active','1')->order_by('order','asc')->get('simul_settings')->result_array();*/
		//$this->data->simul_ortherproduct = $this->db3->where("dtype LIKE '%FUTURES%'")->where("(active = 1 or active = 2)")->get('vdm_contracts_ref')->result_array();
		
		//echo "<pre>";print_r($this->data->simul_ortherproduct);exit;

		
		$this->data->simul_callput = $this->db->where('type','menu')->where('stype','callput')->where('active','1')->order_by('order','asc')->get('simul_settings')->result_array();
		
	//	$this->data->simul_expiry = $expiry;
		$this->data->simul_ordertype = $this->db->where('type','menu')->where('stype','order')->where('active','1')->order_by('order','asc')->get('simul_settings')->result_array();
		//echo "<pre>";print_r($this->data->simul_ordertype);exit;
		
		$simul_tooltip = $this->db->where('type','tooltips')->where('active','1')->order_by('order','asc')->get('simul_settings')->result_array();
		
		//foreach($simul_tooltip as $tooltip){
		//	$arr_tooltip[$tooltip['stype']] = $tooltip;
		//}
		//$this->data->simul_tooltip = $arr_tooltip;
		
		
		$this->data->simul_duration = $this->db->where('type','menu')->where('stype','duration')->where('active','1')->order_by('order','asc')->get('simul_settings')->result_array();
		
		$this->data->blockstart = $this->db->query("SELECT * FROM simul_settings ss WHERE ss.type='menu' AND ss.stype = 'main' AND ss.active = 1 ORDER BY ss.`order`")->result_array();
		$this->data->status_market = $this->db3->query("SELECT value FROM setting  WHERE `key_setting` = 'market_making_seconds'")->row_array();
        $this->load->model('Media_model', 'media');
        
        $this->template->write_view('header', 'header', $this->data);
        
        $this->template->write_view('footer', 'footer', $this->data);
    }

    public function index() {
        //redirect(base_url() . 'home');
		$this->data->blockstart = $this->db->query("SELECT * FROM simul_settings ss WHERE ss.type='menu' AND ss.stype = 'main' AND ss.active = 1 ORDER BY ss.`order`")->result_array();
		
        /*$template_url_ = template_url();
        $this->data->template_url = $template_url_;
        $this->data->simulation_url = base_url().DIR_SIMULATION;*/
		
		
    }

    public function active($langCode = '') {
        $ls = $this->language_model->find();
        foreach ($ls as $key => $value) {
            $this->data->list_language[$value['code']] = $value;
        }
        if (isset($this->data->list_language[$langCode]) == TRUE) {
            $this->session->set_userdata('curent_language', $this->data->list_language[$langCode]);
            $this->output->set_output(json_encode(array('result' => 1)));
        }
    }

    public function getSettings(){
        // load setting
        $array = array();
        $data = $this->db->where('active', 1)
        ->get('setting')->result_array();
        foreach($data as $value){
            $array[$value['key_setting']] = $value['value'];
        }
        return $array;  
    }
    public function timer() {
        $this->output->set_output(date('H:i:s'));
    }
	private function objectToArray( $object )
    {
        if( !is_object( $object ) && !is_array( $object ) )
        {
            return $object;
        }
        if( is_object( $object ) )
        {
            $object = get_object_vars( $object );
        }
        return array_map( 'objectToArray', $object );
    }
    
    public function _thumb(&$image = NULL) {
        $thumb = 'assets/upload/images/no-image.jpg';
        if ($image == NULL) {
            $image = $thumb;
            return $thumb;
        }
        if (isset($image) == TRUE && $image != '') {
            image_thumb($image, 200, 150);
        }
        return $image;
    }
    
    public function userOnline(){
        $query = $this->db->where('user_id',$this->session->userdata('user_id'))->get('user_log');
        if ($query->num_rows() > 0){
            $this->db->where('user_id',$this->session->userdata('user_id'))->delete('user_log');
        }
        $data_user = array(
            'user_id' => $this->session->userdata('user_id'),
            'lastactive' => $this->session->userdata('lastActivity'),
            'status' => $this->session->userdata('login')
        );
        $this->db->insert('user_log', $data_user);
    }
    public function getListUserOnline(){
        $this->db->where('status', 1);
        $this->db->from('user_log');
        $this->db->join('user', 'user_log.user_id = user.id');
        $this->db->join('user_info', 'user_info.id_user = user.id');
        $this->db->where('user_log.user_id !=', $this->session->userdata('user_id'));
        $query = $this->db->get();
        return $query->result_array();
    } 
}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */