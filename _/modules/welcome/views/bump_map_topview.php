<!-- <div class="portlet box red blocks" style="margin-bottom:5px; position:relative;">
    
        <div class="portlet-title header-table">
            <div class="caption">
                <i class="fa"></i><?php translate('head_box_bumb_list_topview'); ?></div>
                <div class="tools">
                        <i class="fa fa-arrows-alt fullscreens"></i>
                        <i class="fa fa-compress minscreens"></i>
                    </div>
        </div>
        <div class="portlet-body background_portlet">
            <div class="table-responsive height">
                <table class="table table-bordered table-hover table_color table_scroll table_cus">
                
                
                   
                        <tr>
                        <?php 
						$i = 1;
						foreach($get_header_x as $get_x){?>
                            <td class="th_custom cus_pri" style="text-align:left"><?php echo $get_x['x']; ?></td>
                        <?php $i++;
						}?> 
                        </tr>
                          <?php 
						 $j = 1;
						 foreach($get_header_y as $get_y){?>
							<tr>
								<td class="td_custom cus_pri"><?php echo $get_y['y']; ?> </td>
                               
							</tr>
               		 <?php $j++; }?>
                    
                   
                   
                  
                </table>
            </div>
        </div>
 
        
    </div>-->
    <?php
$aaa = $bbb = array();
for($i =0; $i<=20; $i++){
$aaa[$i] = $bbb[$i] = $i;
}


?>
<div class="portlet box red blocks" style="margin-bottom:5px; position:relative;">
    
        <div class="portlet-title header-table">
            <div class="caption">
                <i class="fa"></i><?php translate('head_box_bumb_list_topview'); ?></div>
                <div class="tools">
                        <i class="fa fa-arrows-alt fullscreens"></i>
                        <i class="fa fa-compress minscreens"></i>
                    </div>
        </div>
        <div class="portlet-body background_portlet">
            <div class="table-responsive height">
            
            
<table class="table table-bordered table-hover table_color table_scroll table_cus">
<thead>
<tr>
<td></td>
<?php foreach($aaa as $value){?>
	<td><?php echo $value;?></td>
<?php }?>
</tr>
</thead>
<tbody>
<?php foreach($bbb as $value){?>
<tr>
	<td><?php echo $value;?></td>
    
<?php foreach($bbb as $b){?>
<?php if(isset($aaa[$b])&&$aaa[$b]==$value){?>
	<td class="red"><?php echo $aaa[$b];?></td>
<?php }else{?>
	<td></td>
<?php }?>
<?php }?>

</tr>
<?php }?>
</tbody>

</table>
                
    </div>
</div>


</div>
 