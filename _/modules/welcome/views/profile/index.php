<!-- BEGIN PAGE HEADER-->
<div class="page-content">
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT INNER -->
<div class="row profile">
	
	<div class="col-md-12">
		<!--BEGIN TABS-->				
				<div class="row">
					<div class="col-md-3">
                        <div class="portlet light">
                        
                            <div class="portlet-body">
                            <!--class="scroller" data-height="310px"-->
                                    <div data-always-visible="1" data-rail-visible="1">
                						<!--ul class="list-unstyled profile-nav">
                							<li>
                							<?php $base_url = base_url(); ?>
                								<img id="avatar" name="avatar" src="<?php echo is_file($detail_user['info']['avatar']) ? $base_url.$detail_user['info']['avatar'] : $base_url.'assets/upload/avatar/no_avatar.jpg'; ?>" class="img-responsive-avatar" alt=""/>
                								<div class="change-avatar" translate="<?php echo translate('change_avatar'); ?>"></div>
                							</li>
                						</ul-->
                                        <form enctype="multipart/form-data" method="POST"  id="fileupload" class="" style="width: 100%;"> 
                                            <center>
                                            <div class="fileinput <?php echo (isset($detail_user['info']['avatar']) && is_file($detail_user['info']['avatar'])) ? 'fileinput-exists' : 'fileinput-new'; ?>"
                                             data-provides="fileinput" data-name="avatar"style="width:100%;" >
                                                    <div class="margin-bottom-5 align-right"> <!-- style="margin: 0 20px; position: absolute; text-align: right !important; z-index: 1000;" -->
                                                       <span class="btn btn-icon-only blue btn-file" style="margin-top: 10px;">
                                                        <span class="fileinput-new"><i class="fa fa-edit"></i></span>
                                                        <span class="fileinput-exists">
                                                        <i class="fa fa-edit" ></i> </span>
                                                        <input type="file" name="fileavatar" id ="fileavatar" value="<?php echo (isset($detail_user['info']['avatar']) && is_file($detail_user['info']['avatar'])) ? str_replace(base_url(), "", $detail_user['info']['avatar']) : 'assets/upload/avatar/no_avatar.jpg'; ?>"/>
                                                        </span>
                                                        <a href="javascript:;" class="btn btn-icon-only red fileinput-exists remove-image-profile" data-dismiss="fileinput"style="margin-top: 10px;margin-left: 0px!important;">
                                                        <i class="fa fa-remove"></i> </a>
                                                        <a class="btn btn-icon-only green save-avatar" href="javascript:;" style="margin-top: 10px;margin-left: 0px!important;">
                                                        <i class="fa fa-check"></i> </a>
                                                        <a class="btn btn-icon-only yellow mix-preview fancybox-button" data-fancybox-group="avatar" title='<?php echo $detail_user['firstname'].' '.$detail_user['lastname']; ?>' href="<?php echo (isset($user['avatar']) && is_file($detail_user['info']['avatar'])) ? str_replace(base_url(), "", $detail_user['info']['avatar']) : 'assets/upload/avatar/no_avatar.jpg'; ?>"style="margin-top: 10px;margin-left: 0px!important;">
                                                        <i class="fa fa-search-plus"></i></a>
                                                    </div>
                                                    <div id="file" class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 86.5%">
                                                        <img id="myavatar" width="190" height="160" src="<?php
                                                        echo base_url();
                                                        echo (isset($detail_user['info']['avatar']) && is_file($detail_user['info']['avatar'])) ? str_replace(base_url(), "", $detail_user['info']['avatar']) : 'assets/upload/avatar/no_avatar.jpg';
                                                        ?>" alt=""/>
                                                    </div>                                                             
                                            </div>                          
                                            </center> 
                                        </form>
                                    </div>
                            </div>
                        </div>
					</div>
					<div class="col-md-9">
                            
        						<div class="portlet light bordered box red blocks" style="margin-bottom:5px;">
                                <div class="portlet-title header-table" style="position:relative;">
    
                                    <div class="caption" style=" line-height:28px; padding:10px; text-transform:uppercase;"><?php echo translate('PROFILE'); ?></div>
                                      <div class="tools">
                                       <!-- <a href="" class="fullscreen"> </a>-->
                                        <i class="fa fa-arrows-alt fullscreens"></i>
                                        <i class="fa fa-compress minscreens"></i>
                                    </div>
                                    
                                    <div class="actions" style=" line-height:28px; padding:10px;">
                                                <a class="view-user btn btn-icon-only blue" href="<?php echo base_url()?>user-manage/admin/users.php?uid=<?php echo $detail_user['info']['user_id'];?>">
                                                <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                </div>
                                
                                
                                		<!--<div class="portlet-title">
                                            <div class="caption">
                                                <i class="icon-bubble font-red-sunglo"></i>
                                                <span class="caption-subject font-red-sunglo "><?php echo translate('Profile'); ?> </span>
                                            </div>
                                            
                                            <div class="actions">
                                                <a class="view-user btn btn-icon-only blue" href="<?php echo base_url()?>user-manage/admin/users.php?uid=<?php echo $detail_user['info']['user_id'];?>">
                                                <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
        							    </div>-->
        								<div class="portlet-body background_portlet">
        									
                                            <!--class="scroller" data-height="262px"-->
                                                <div   data-always-visible="1" data-rail-visible="1">  
															<table class="table table-striped table-bordered table-advance table-hover set_background">
                                                           
													
														<tbody>
                                                        <?php 
														array_shift($detail_user);
														foreach($detail_user as $key=>$value){
																
															?>
														<tr>
															<td class="td_custom" align="right" width="20%">
																<a class="upper_title" href="javascript:;" style="color:#6fb9fc; font-weight:bold;">
																<?php echo translate($key);?> </a>
															</td>
															<td class="hidden-xs active_color td_custom"  width="80%">
																 <?php echo $value;?>
															</td>
															
														</tr>
                                                       <?php }?> 
                                                       
														</tbody>
														</table>
            										
                                                </div>
                                              
        									</div>
        								</div>
                      
					</div>
					<!--end row-->
				</div>
				
					
		<!--END TABS-->
	</div>
</div>

</div><!--page-content-->
			<!-- END PAGE CONTENT INNER -->
<!-- MODAL CHANGE -->

<!-- END MODAL CHANGE -->
   <style>
   .borderless tbody tr td, .borderless thead tr th {
    border: none;
	}

   </style>
<!--MODAL VIEW USER -->

<!-- END MODAL VIEW USER -->