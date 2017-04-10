<?php  
if(!isset($_SESSION['simulation']['user_id'])){
			redirect(base_url().'start');	
}

?>

 <style>
    .ui-widget-header{ background:#<?php echo $setting_title_bg['value'];?> !important;}
	.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default{ background:#<?php echo $setting_header_bg['value']; ?> !important}
	.ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight{
		background:#<?php echo $setting_selected_bg['value'];?>
	}
	.ui-state-hover,
.ui-widget-content .ui-state-hover,
.ui-widget-header .ui-state-hover,
.ui-state-focus,
.ui-widget-content .ui-state-focus,
.ui-widget-header .ui-state-focus{ background:#<?php echo $setting_selected_bg['value'];?> !important}
.custom_button_setting .swap{ background:#<?php echo $button_swap_background['value'];?> !important}
.custom_button_setting .import{ background:#<?php echo $button_import_background['value'];?> !important}
.custom_button_setting .exportTxt{ background:#<?php echo $button_txt_background['value'];?> !important}
.custom_button_setting .exportCsv{ background:#<?php echo $button_csv_background['value'];?> !important}
.custom_button_setting .exportXls{ background:#<?php echo $button_excel_background['value'];?> !important}
 .ui-jqgrid tr.jqgrow td{ height:<?php echo $jq_row_height['value'];?>px !important;}
 .ui-jqgrid-titlebar-close{ right:12px !important;}
    </style>
       
	<form id="form_currency">
	<?php if(isset($filter_get_all)){?>
    <input type="hidden" class="filter_get_all" id="filter_get_all" name="filter_get_all" attr='<?php echo $filter_get_all; ?>' />
    <?php }?>
   
    </form>
    <?php //echo "<pre>";print_r($column);exit;

	?>
    <input type="hidden" class="column" id="column" name="column" attr='<?php echo $column; ?>' error='<?php echo $error; ?>' />
   <?php //echo "<pre>";print_r($column);exit;?>
   <?php if($_SESSION['simulation']['user_id'] == 1){?>
   <div class="col-md-6" style="z-index:100;  position: absolute; right: 50px; top:7px;">
        <div class="table-group-actions pull-right custom_button_setting">
        <?php 
		if($table == 'swap'){?>
       		 <button class="btn btn-sm green run_query bg_red" >
                    Run query 
                </button>
       <?php }
		else if($table_export == 'export'){?>
       		 <button class="btn btn-sm green run_export bg_red" >
                    Run export 
                </button>
       <?php }
		else if($table_import == 'import'){?>
       		 <button class="btn btn-sm green run_import bg_red" >
                    Run import 
                </button>
       <?php }else{?>
        		<!--<button class="btn btn-sm green swap " >
                    SWAP 
                </button>
                
        		 <button class="btn btn-sm green import " >
                    IMPORT 
                </button>-->
             
            <button class="btn btn-sm green exportTxt " >
                    TXT 
                </button>
             <button class="btn btn-sm red exportCsv" >
                    CSV 
                </button> 
            <button class="btn btn-sm yellow exportXls" >
                    Excel 
            </button>
            <?php }?>
        </div>
    </div>
    <?php }?>
    <form id="form_tab" action ="" method="post">
    <table id="jqGrid" class="jq_table" attr="<?php echo $table;?>" table_export="<?php echo $table_export ?>" table_import="<?php echo $table_import ?>" order_by="<?php echo $summary_des['order_by'];?>" summary_des="<?php echo $summary_des['description']?>" vndmi ="<?php echo $summary_des['vndmi'];?>" admin ="1" user = '<?php echo $_SESSION['simulation']['user_id'];?>' username = '<?php echo $_SESSION['simulation']['username'];?>' khuvuc = '<?php echo $return_kv;?>'>
    
    </table>	
    <div id="jqGridPager"></div>
    <input type="hidden" value="" name="actexport" id="actexport" />
    <input type="hidden" value="<?php echo $table ?>"  name="table_name_export" id="table_name_export" />
    </form>

   
<!--END TEST-->
