<div id="order_product" class="modal fade" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    
                                                  
                                                        <div class="portlet box">
    <div class="portlet-title" style="background:#00a800; font-weight:bold;">
        <div class="caption">
            <i class="fa"></i><?php translate('model_head_other_products'); ?></div>
       <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>-->
         <button data-style="slide-right" class="btn red mt-ladda-btn ladda-button" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
    </div>
    <div class="portlet-body background_portlet">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table_modal">
                <thead>

                </thead>
                <tbody>
                <?php
				foreach($simul_ortherproduct as $product){
					?>
                       <tr>
                        <td class="td_custom cus_pri ma_cat" style=" text-transform:uppercase" id="<?php echo $product['dsymbol'];?>">
						<?php 
						//echo "<pre>";print_r($product).'hung3';	
								/*if(isset($curent_language['code']) && $curent_language['code'] == 'fr' && $product['fr'] !=''){
									echo $product['fr'];
								}else if(isset($curent_language['code']) && $curent_language['code'] == 'vn' && $product['vn'] !=''){
									echo $product['vn'];	
								}else if(isset($curent_language['code']) && $curent_language['code'] == 'en' && $product['en'] != ''){
									echo $product['en'];		
								}
								else{*/
									echo $product['name'];	
								//}
								?></td>
                      </tr>
                 <?php }?>
                     
                </tbody>
            </table>
        </div>
    </div>
    
     <div class="modal-footer">
                                                        <button type="button" style=" background-color: #3598dc ; margin-right:20px;" class="btn green btn_order_product" data-dismiss="modal" ><?php translate('btn_ok'); ?></button>
                                                        
                                                       
                                                    </div>
</div>
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
<div id="simul_expiry" class="modal fade" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    
                                                  
                                                        <div class="portlet box">
    <div class="portlet-title" style="background:#00a800; font-weight:bold;">
        <div class="caption">
            <i class="fa"></i><?php translate('model_head_expiry'); ?></div>
       <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>-->
         <button data-style="slide-right" class="btn red mt-ladda-btn ladda-button" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
    </div>
    <div class="portlet-body background_portlet">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table_modal">
                <thead>

                </thead>
                <tbody>
                <?php 
				foreach($simul_expiry as $expiry){ ?>
                
                       <tr>
                        <td class="td_custom cus_pri ma_cat" style=" text-transform:uppercase" id="<?php echo $expiry['expiry'] ?>"><?php 
						echo date('M-y',strtotime($expiry['expiry']));	
						?></td>
                      </tr>
                 <?php }?>
                     
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="modal-footer">
                                                        <button type="button" style=" background-color: #3598dc ; margin-right:20px;" class="btn green btn_expiry" data-dismiss="modal" ><?php translate('btn_ok '); ?></button>
                                                        
                                                       
                                                    </div>
</div>
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
<div id="order_type" class="modal fade" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    
                                                  
                                                        <div class="portlet box">
    <div class="portlet-title" style="background:#00a800; font-weight:bold;">
        <div class="caption">
            <i class="fa"></i><?php translate('model_head_order_type'); ?></div>
       <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>-->
         <button data-style="slide-right" class="btn red mt-ladda-btn ladda-button" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
    </div>
    <div class="portlet-body background_portlet">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table_modal">
                <thead>

                </thead>
                <tbody>
                <?php foreach($simul_ordertype as $ordertype){?>
                       <tr>
                        <td class="td_custom cus_pri ma_cat" style=" text-transform:uppercase"><?php 
								if(isset($curent_language['code']) && $curent_language['code'] == 'fr' && $ordertype['fr'] !=''){
									echo $ordertype['fr'];
								}else if(isset($curent_language['code']) && $curent_language['code'] == 'vn' && $ordertype['vn'] !=''){
									echo $ordertype['vn'];	
								}else if(isset($curent_language['code']) && $curent_language['code'] == 'en' && $ordertype['en'] !=''){
									echo $ordertype['en'];		
								}
								else{
									echo $ordertype['name'];	
								}?></td>
                      </tr>
                 <?php }?>
                     
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="modal-footer">
                                                        <button type="button" style=" background-color: #3598dc ; margin-right:20px;" class="btn green btn_order_type" data-dismiss="modal" ><?php translate('btn_ok'); ?></button>
                                                        
                                                       
                                                    </div>
</div>
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>  
                                        
<div id="menu_duration" class="modal fade" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    
                                                  
                                                        <div class="portlet box">
    <div class="portlet-title" style="background:#00a800; font-weight:bold;">
        <div class="caption">
            <i class="fa"></i><?php translate('model_head_duration'); ?></div>
      <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>-->
         <button data-style="slide-right" class="btn red mt-ladda-btn ladda-button" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
    </div>
    <div class="portlet-body background_portlet">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table_modal">
                <thead>

                </thead>
                <tbody>
                <?php foreach($simul_duration as $duration){?>
                       <tr>
                        <td class="td_custom cus_pri ma_cat" style=" text-transform:uppercase"><?php 
								if(isset($curent_language['code']) && $curent_language['code'] == 'fr' && $duration['fr'] !=''){
									echo $duration['fr'];
								}else if(isset($curent_language['code']) && $curent_language['code'] == 'vn' && $duration['vn'] !=''){
									echo $duration['vn'];	
								}else if(isset($curent_language['code']) && $curent_language['code'] == 'en' && $duration['en'] !=''){
									echo $duration['en'];		
								}
								else{
									echo $duration['name'];	
								}?></td>
                      </tr>
                 <?php }?>
                     
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal-footer">
                                                        <button type="button" style=" background-color: #3598dc ; margin-right:20px;" class="btn green btn_duration" data-dismiss="modal" ><?php translate('btn_ok '); ?></button>
                                                        
                                                       
                                                    </div>
</div>
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>   
                                        
 <div id="menu_model" class="modal fade" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    
                                                  
                                                        <div class="portlet box">
    <div class="portlet-title" style="background:#00a800; font-weight:bold;">
        <div class="caption">
            <i class="fa"></i><?php translate('model_head_model'); ?></div>
      <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>-->
         <button data-style="slide-right" class="btn red mt-ladda-btn ladda-button" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
    </div>
    <div class="portlet-body background_portlet">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table_modal">
                <thead>

                </thead>
                <tbody>
                <?php foreach($simul_model as $model){?>
                       <tr>
                        <td class="td_custom cus_pri ma_cat" style=" text-transform:uppercase"><?php 
								if(isset($curent_language['code']) && $curent_language['code'] == 'fr' && $model['fr'] !=''){
									echo $model['fr'];
								}else if(isset($curent_language['code']) && $curent_language['code'] == 'vn' && $model['vn'] !=''){
									echo $model['vn'];	
								}else if(isset($curent_language['code']) && $curent_language['code'] == 'en' && $model['en'] !=''){
									echo $model['en'];		
								}
								else{
									echo $model['name'];	
								}?></td>
                      </tr>
                 <?php }?>
                     
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal-footer">
     <button type="button" style=" background-color: #3598dc ; margin-right:20px;" class="btn green" data-dismiss="modal" ><?php translate('btn_ok'); ?></button>
                                                        
                                                       
                                                    </div>
</div>
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>                                
                                        
 <div id="sell_buy" class="modal fade" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    
                                                  
                                                        <div class="portlet box">
                                                    <div class="portlet-title" style="background:#00a800; font-weight:bold;">
                                                        <div class="caption">
                                                            <i class="fa"></i><?php translate('model_head_confirmation'); ?></div>
                                                     
                                                    <!--  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>-->
                                                     <button data-style="slide-right" class="btn red mt-ladda-btn ladda-button" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                    </div>
                                                     
                                                    
                                                     <div class="modal-body" style="text-align:center; font-size:16px;"><?php translate('text_do_you_want'); ?></div>
                                                    
                                                    <div class="modal-footer">
                                                        <button type="button" style=" background-color: #3598dc ; margin-right:20px;" class="btn green" data-dismiss="modal" ><?php translate('btn_yes'); ?></button>
                                                        
                                                        <button type="button" style=" background-color: #ee2222 ;" class="btn green" data-dismiss="modal"><?php translate('btn_no'); ?></button>
                                                    </div>
    
</div>                                       
            </div>
        </div>
    </div>
   
 <div id="info_box" class="modal fade" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    
                                                  
                                                        <div class="portlet box">
                                                    <div class="portlet-title" style="background:#00a800; font-weight:bold;">
                                                        <div class="caption">
                                                            <i class="fa"></i><?php translate('model_head_information'); ?></div>
                                                      <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>-->
                                                         <button data-style="slide-right" class="btn red mt-ladda-btn ladda-button" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                    </div>
                                                    
                                                     <div class="modal-body append_ajax">
                                                    
                                                     </div>
                                                    
                                                    <div class="modal-footer">
                                                       
                                                    </div>
    
</div>
                                    
            </div>
        </div>
    </div>
 
  <div id="lots_box" class="modal fade" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    
                                                  
                                                        <div class="portlet box">
                                                    <div class="portlet-title" style="background:#00a800; font-weight:bold;">
                                                        <div class="caption">
                                                            <i class="fa"></i><?php translate('model_head_lots'); ?></div>
                                                      <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>-->
                                                         <button data-style="slide-right" class="btn red mt-ladda-btn ladda-button" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                    </div>
                                                    
                                                     <div class="modal-body append_ajax">
                                                    
                                                     </div>
                                                    
                                                    <div class="modal-footer">
                                                       
                                                    </div>
    
</div>
                                    
            </div>
        </div>
    </div>
   
                                        
                                   <!------------------------------------------------------------>     
                                        
                     <div class="col-md-3">
                            <div class="dashboard-stat blue-ebonyclay">
                                <div class="visual">
                                <span class="times cus_pri index_time"><?php echo ($underlying_setting['time'] == '00:00:00')?'-':$underlying_setting['time'];?></span>
                                <i class="fa fa-line-chart"></i>
                            </div>
                            
                            <div class="details" id="details_a">
                                <div class="number" id="number_p"> <?php 
								if(isset($_SESSION['array_other_product']['usymbol']))
									echo $_SESSION['array_other_product']['usymbol'];
								//echo $simul_settings['index']['name'][0]['name'];?> </div>
                               
                                
                            </div>
                            <div class="details">
                            	<?php if($underlying_setting['last']!='-') { ?>
                                <div class="number"> <span data-counter="counterup" data-value="<?php echo $underlying_setting['last'];?>" class="index_last">0</span></div>
                                <?php } else { ?>
									<div class="number"> <span class="index_last">-</span></div>
								<?php } ?>
                                <div class="desc"> <span class="index_change"><?php echo $underlying_setting['change'];?></span>&nbsp; &nbsp; <span class="index_var"><?php echo $underlying_setting['var'];?></span> </div>
                            </div>
                            
                            <!-- <div class="vnx_options"><a href="#" data-target="#order_product" data-toggle="modal" class="btn yellow-crusta" type="button"><?php translate('dash_other_product'); ?></a>  <i class="m-icon-swapright m-icon-white cus_h"></i></div>-->
                            <a class="more" id="p" href="javascript:;">
                            <?php 
							   if(isset($_SESSION['array_other_product']['utype']))
							   echo $_SESSION['array_other_product']['utype']; ?>                             
                                <!-- <span class="right_ex">OTHER PRODUCT </span>
                                 <i class="m-icon-swapright m-icon-white"></i>-->
                            </a>
                        </div>                        
                       </div>                   
                                        
                    
                 
                      <div class="col-md-6">
                      
                      <div class="col-md-6" style="padding-left:0px !important; ">

                          
                          <div class="dashboard-stat red-thunderbird"  style="text-align: left !important; width: 100%;">
                            <div class="visual"> 
                            </div>
                            <div class="details" id="details_p">
                                <div class="number" id="number_p"> <?php 
								if(isset($_SESSION['array_other_product']['dsymbol']))
									echo $_SESSION['array_other_product']['dsymbol'];
								//echo $simul_settings['index']['name'][0]['name'];?> </div>
                               
                                
                            </div>
                             <div class="futures" ><?php echo $_SESSION['array_other_product']['dtype']; ?></div>

                            <div class="vnx_options"><a href="<?php echo $simulation_url; ?>options_live" class="btn yellow-crusta" type="button"><?php translate('dash_options'); ?></a>  <i class="m-icon-swapright m-icon-white cus_h"></i></div>
                            <a class="more" style="height:32px;" href="javascript:;">
                               <?php 
							   /*if(isset($_SESSION['array_other_product']['utype']))
							  echo $_SESSION['array_other_product']['utype']*/; ?>
                               
                            </a>
                            
                             <div class="vnx_other_product"><a href="#" data-target="#order_product" data-toggle="modal" class="btn yellow-crusta" type="button"><?php translate('dash_other_product'); ?></a>  <i class="m-icon-swapright m-icon-white cus_h"></i></div>
                            
                            
                        </div>       
                       
                    </div>
                      
                        <div class="col-md-6" style="padding-right:0px !important;">
                            <div class="dashboard-stat blue-ebonyclay">
                                <div class="visual"> 
                                  <span class="month cus_pri uppercase val_expiry"><?php echo ($_SESSION['session_expiry']) ?></span>
                                  <span class="times cus_pri future_time"><?php echo $dashboard_future['time'];?></span> 
                                  <i class="fa fa-bar-chart"></i>
                                </div>
                                <div class="details">
                                <?php if($dashboard_future['last']!='-') { ?>
                                    <div class="number"><span data-counter="counterup" data-value="<?php echo $dashboard_future['last'];?>" class="futures_last">0</span></div>
                                 <?php } else { ?>
                                 	<div class="number"><span class="futures_last">-</span></div>
                                 <?php } ?>
                                    <div class="desc"> <span class="futures_change"><?php echo $dashboard_future['change'];?></span> &nbsp; &nbsp; <span class="futures_var"><?php echo $dashboard_future['var'];?></span> </div>
                                </div>
                                <div class="vnx_options"><a href="#" data-target="#simul_expiry" data-toggle="modal" class="btn yellow-crusta" type="button"><?php translate('dash_expiry'); ?></a>  <i class="m-icon-swapright m-icon-white cus_h"></i></div>
                                <a class="more" id="p" href="javascript:;">
                                    <?php translate('dash_futures'); ?>
                                   <!-- <span class="right_ex">EXPIRY </span>
                                     <i class="m-icon-swapright m-icon-white"></i>-->
                                </a>
                            </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dashboard-stat blue-ebonyclay">
                            <div class="visual">
                             <i class="fa fa-balance-scale"></i>
                            </div>
                            <div class="details">
                                <div class="number"> <span data-counter="counterup" data-value="<?php echo $simul_settings['portfolio']['value'][0]['name'];?>" id="portfolio_value">0</span></div>
                                <div class="desc"> <span class="po" id="portfolio_change">+<?php echo $simul_settings['portfolio']['change'][0]['name'];?></span>&nbsp; &nbsp; <span class="po" id="portfolio_var">+<?php echo number_format($simul_settings['portfolio']['var'][0]['name'],2,'.',',');?>%</span> </div>
                            </div>
                            
                             <div class="vnx_options"><a href="<?php echo $simulation_url; ?>futures_finances" class="btn yellow-crusta" type="button"><?php translate('dash_more'); ?></a>  <i class="m-icon-swapright m-icon-white cus_h"></i></div>
                            <a class="more" id="p" href="javascript:;">
                                <?php translate('dash_your_account'); ?>
                                <!--<i class="m-icon-swapright m-icon-white"></i>-->
                            </a>
                        </div>

                    </div>
                
            