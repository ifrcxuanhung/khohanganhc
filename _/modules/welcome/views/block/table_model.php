
<div class="portlet box red blocks" style="position:relative;">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa"></i><?php translate('head_box_pricing'); ?></div>
             <div class="tools">
                        <i class="fa fa-arrows-alt fullscreens"></i>
                        <i class="fa fa-compress minscreens"></i>
                    </div>
      
      
    </div>
    <div class="portlet-body background_portlet">

         <div class="portlet-body background_portlet">
                <div class="table-responsive">
                    <table class="table  table-bordered">
                    	
                        <tbody>
                            <tr>
                                <td colspan="2" class="td_custom font_size_new" align="center"> <div class="col-md-12 bg_trading"><h6 class="color_h6 cus_type" data-target="#menu_model" data-toggle="modal"><?php translate('head_model'); ?><i class="m-icon-swapright m-icon-white icon_sma"></i></h6><h6 class="cus_h6" data-target="#menu_model" data-toggle="modal"><?php translate('text_individual_futures'); ?></h6></div></td>
                                
                        </tr>
                           
                          <tr>
                                <td width="50%" class="td_custom font_size_new" align="center"> <div class="col-md-12 bg_trading"><h6 class="color_h6 cus_type" data-target="#simul_expiry" data-toggle="modal"><?php translate('head_expiry'); ?><i class="m-icon-swapright m-icon-white icon_sma"></i></h6><h6 class="cus_h6" data-target="#simul_expiry" data-toggle="modal"><?php echo date('M-y');?></h6></div></td>
                                <td width="50%" class="td_custom font_size_new" align="center"><div class="col-md-12 bg_trading"><h6 class="color_h6 cus_type"><?php translate('head_spot'); ?><i class="m-icon-swapright m-icon-white icon_sma"></i></h6><h6 class="cus_h6"><?php echo $underlying_setting['last'];?></h6></div></td>
                                
                        </tr>
                        
                        <tr>
                                <td width="50%" class="td_custom font_size_new"  align="center"> <div class="col-md-12 bg_trading"><h6 class="color_h6 cus_type"><?php translate('head_interest'); ?><i class="m-icon-swapright m-icon-white icon_sma"></i></h6><h6 class="cus_h6 load_modals" edit_for="interest" data-target="#modals" data-toggle="modal" data-type="input"><?php echo '3.50%';?></h6></div></td>
                                <td width="50%" class="td_custom font_size_new" align="center"><div class="col-md-12 bg_trading"><h6 class="color_h6 cus_type"><?php translate('head_dividend'); ?><i class="m-icon-swapright m-icon-white icon_sma"></i></h6><h6 class="cus_h6 load_modals" edit_for="dividend" data-target="#modals" data-toggle="modal" data-type="input"><?php echo '12.35';?></h6></div></td>
                                
                            </tr>
                          <tr>
                                <td colspan="2" class="td_custom font_size_new" align="center"><div class="col-md-12"><a class="btn btn-lg green form-control" style="min-height: 40px; background-color: #00a800 ;"><strong><?php translate('btn_calculate'); ?></strong></a></div></td>
                            </tr>
                         <tr>
                                <td width="50%" class="td_custom font_size_new" align="center"><div class="col-md-12 bg_trading"><h6 class="color_h6 cus_type"><?php translate('head_fair_value'); ?><i class="m-icon-swapright m-icon-white icon_sma"></i></h6><h6 class="cus_h6"><?php echo $dashboard_future['last'];?></h6></div></td>
                                <td width="50%" class="td_custom font_size_new" align="center"><div class="col-md-12 bg_trading"><h6 class="color_h6 cus_type"><?php translate('head_base'); ?><i class="m-icon-swapright m-icon-white icon_sma"></i></h6><h6 class="cus_h6"><?php echo  '-39.40';?></h6></div></td>
                            </tr>
                         
                            <tr>
                                <td colspan="2" class="td_custom font_size_new" align="center"><div class="col-md-12"><a class="btn btn-lg blue form-control" style="min-height: 40px;" href="<?php base_url() ?>futures_live"><strong><?php translate('btn_order'); ?></strong></a></div></td>
                            </tr>
                         
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
 </div>
