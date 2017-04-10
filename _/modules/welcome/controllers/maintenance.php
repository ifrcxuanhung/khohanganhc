<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Maintenance extends Welcome {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function index() {
        $this->template->write_view('content', 'maintenance/index', $this->data);
        $this->template->render();
    }
    public function clean_data() {
        $list_condition = $this->db->query("select * from clean_data;")->result_array();
        foreach ($list_condition as $condition)
            {  
                if($_SERVER['HTTP_HOST'] == 'apm.ifrc.vn'){
					$list_table = $this->db->query("select distinct table_name from information_schema.columns 
                where `column_name`='".$condition['columns']."';")->result_array();
				}
				else{
					$list_table = $this->db->query("select distinct table_name from information_schema.columns 
                where `column_name`='".$condition['columns']."' and `table_schema`='apm' ;")->result_array();
				}
                foreach ($list_table as $data)
                    {
                    $sql="update ".$data['table_name']." set `".$condition['columns']."`= null where `".$condition['columns']."`= '".$condition['condition']."';";
                    $this->db->query($sql);
                }   
                echo $sql; 
            }
    }
	 public function create_bumpmap_copy() {
			return true; 
	}
    
     public function create_bumpmap() {
        $this->db->query("drop table if exists tmp_bump;");
        $this->db->query("create table tmp_bump select bumpname,concat('x',x) x, round(y,2) y, concat('x',round((100* x)) ) `columns` from bump_list ;");
        $this->db->query("alter table `tmp_bump` add index `y` (`y`), add index `cl` (`columns`) , add index `bn` (`bumpname`) , add index `bnxy` (`bumpname`, `x`, `y`, `columns`);");
        $this->db->query("drop table if exists bump_map;");
       // $sql = 'create table bump_map (  id int not null auto_increment,primary key(id), y varchar(12) null)';
       // $this->db->query($sql);
        $list_columns = $this->db->query("select `columns` from tmp_bump group by `columns`;")->result_array();
        /*foreach ($list_columns as $columns)
        {
            $sql= "ALTER TABLE `bump_map` ADD COLUMN `".$columns['columns'] ."` text NULL ;";
            $this->db->query($sql);
        }*/

         $sql = 'CREATE TABLE bump_map (
                id INT NOT NULL AUTO_INCREMENT,  
                PRIMARY KEY(id),
                y varchar(12) NULL, ';
                 foreach ($list_columns as $columns)
                {
                    $sql .= '`'.$columns['columns'] . '` text NULL ,';
                }
               $sql=substr($sql,0,strlen($sql)-1);
               $sql .= ')';
              $this->db->query($sql);
              $this->db->query("alter table `bump_map` add index `y` (`y`) ;");
              $this->db->query("truncate bump_map;");
              $this->db->query("insert bump_map (y) select y from tmp_bump group by y;");
              $this->update_bumpmap();
              	return true; 
     }
    public function update_bumpmap() {
       
        $list_columns = $this->db->query("select `columns` from tmp_bump group by `columns`;")->result_array();
         foreach ($list_columns as $columns1)
        {
            $sql= "update bump_map a, tmp_bump b set a.".$columns1['columns'] ."=b.bumpname 
            where b.`columns`='".$columns1['columns'] ."' and b.y=a.y;";
            $this->db->query($sql);
        }
        	echo "DONE"; 

    }
	
     public function create_bgamap1() {
		
       $this->db->query("drop table if exists tmp_bga;");
        $this->db->query("create table tmp_bga select  ballalphanum, netname, datasheetname, ballalphanum columns, ballalphanum y from bga_list;");
        $this->db->query("update tmp_bga set columns= null, y= null");
        $this->db->query("alter table `tmp_bga` add index `y` (`y`), add index `cl` (`datasheetname`) , add index `bn` (`netname`) ");
        $list_columns = $this->db->query("select ballalphanum from tmp_bga group by ballalphanum; ")->result_array();
		
        foreach ($list_columns as $columns)
        {
            $numbers = preg_replace('/[^0-9]/', '', $columns['ballalphanum']);
            $letters = preg_replace('/[^a-zA-Z]/', '', $columns['ballalphanum']);
            $sql= "update tmp_bga set columns=concat('x','".$numbers."') , y='".$letters."' where ballalphanum='". $columns['ballalphanum']."'";
            $this->db->query($sql);
        }

        $list_columns = $this->db->query("select `columns` from tmp_bga group by `columns`;")->result_array();
        $this->db->query("drop table if exists bga_map;");
       /* $sql = 'create table bga_map (  id int not null auto_increment,primary key(id), y varchar(12) null)';
        $this->db->query($sql);
        foreach ($list_columns as $columns)
        {
            $sql= "ALTER TABLE `bga_map` ADD COLUMN `".$columns['columns'] ."` text NULL ;";
            $this->db->query($sql);
        }*/
         $sql = 'CREATE TABLE bga_map (
                id INT NOT NULL AUTO_INCREMENT,  
                PRIMARY KEY(id),
                y varchar(12) NULL, ';
                 foreach ($list_columns as $columns)
                {
                    $sql .= '`'.$columns['columns'] . '` text NULL ,';
                }
               $sql=substr($sql,0,strlen($sql)-1);
               $sql .= ')';
              $this->db->query($sql);
              
        $this->db->query("alter table `bga_map` add index `y` (`y`) ;");
        $this->db->query("truncate bga_map;");
        $this->db->query("insert bga_map (y) select y from tmp_bga group by y;");
        $list_columns = $this->db->query("select `columns` from tmp_bga group by `columns`;")->result_array();
         foreach ($list_columns as $columns1)
        {
            $sql= "update bga_map a, tmp_bga b set a.".$columns1['columns'] ."=b.netname 
            where b.`columns`='".$columns1['columns'] ."' and b.y=a.y;";
            $this->db->query($sql);
        }
      	return true; 

      }
      
  public function create_bgamap() {
		
        $this->db->query("drop table if exists bga_array;");
        $this->db->query("create table bga_array select  ballalphanum, netname name from bga_list;");
        $this->db->query("alter table `bga_array` add column `order_x`  int(10) null after `name`,add column `order_y`  int(10) null after `order_x`,
add column `x`  char(10) null after `name`,add column `y`  char(10) null after `x`,add column `tmp`  char(10) null after `y`,
add index `y` (`y`), add index `x` (`x`) , add index `order_x` (`order_x`) , add index `order_y` (`order_y`);");
        $this->db->query("update bga_array set tmp=replace(ballalphanum,0,'');");
        $this->db->query("update bga_array set y=(select substr(tmp, 1, char_length(tmp) - char_length(if(@c:=cast(reverse(tmp) as unsigned), @c, ''))));");
        $this->db->query("update bga_array set x=concat('x',replace(ballalphanum,y,''));");
        $this->db->query("drop table if exists tmp_test_array;");
        $this->db->query("create table tmp_test_array select x from bga_array group by x order by x asc;");
        $this->db->query("alter table `tmp_test_array` add column `order`  int not null auto_increment after `x`,add primary key (`order`),add index `x` (`x`) ;");
        $this->db->query("update bga_array as a, tmp_test_array as b set a.order_x=b.`order` where a.x=b.x;");
        $this->db->query("drop table if exists tmp_test_array;");
        $this->db->query(" create table tmp_test_array select y from bga_array group by y order by y asc;");
        $this->db->query("alter table `tmp_test_array` add column `order`  int not null auto_increment after `y`,add primary key (`order`),add index `y` (`y`);");
         $this->db->query("update bga_array as a, tmp_test_array as b set a.order_y=b.`order` where a.y=b.y;");

  }


}