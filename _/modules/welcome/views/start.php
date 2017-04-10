<?php //echo "<pre>";print_r($blockstart);exit;?>
<style>
.center-wrap{ overflow:inherit !important;}
.webapp-btn{ border:1px solid #536473;}
.webapp-btn p{ color:#a8b9c8;}
.webapp-btn h3{ color:#<?php echo $start_title_color['value'];?> !important; font-size:<?php echo $start_title_size['value'];?>px !important; text-align:center; line-height:90px;}
.webapp-btn p{ color:#<?php echo $start_stitle_color['value'];?> !important; font-size:<?php echo $start_stitle_size['value'];?>px !important;}
.webapp-btn:focus,.webapp-btn:hover{ background:#ffffff !important;}
</style>
<?php
if(empty($_SESSION['simulation']['token']))
			$_SESSION['simulation']['token'] = md5(uniqid(mt_rand(),true));
?>
        <!-- BEGIN PAGE BASE CONTENT -->
        <!-- Center Wrap BEGIN -->
        <div class="center-wrap">
            <div class="center-align">
                <div class="center-body">
                    <div class="row" style="margin-left: 0px; margin-right: 0px;">
                        <?php 
						$i = 1;
						foreach($blockstart as $value){
							
							?>
                         <div class="col-sm-6 margin-bottom-30 <?php 
						 			if($i == 1 || $i==4 || $i == 7 || $i == 10){
							 			echo "padding_right_20";
									}if($i == 2 || $i==5 || $i == 8 || $i == 11){
										echo "padding_left_right_10";	
									}if($i == 3 || $i==6 || $i == 9 || $i == 12){
										echo "padding_left_20";
									}
									
									?>">
                                   <?php if($i == 1){?>
                                    <img alt="" class="img-hide1" src="<?php echo base_url() .'assets/images/warehouse.png'; ?>" width="100" height=100"" style="position:absolute; top:-7px; left:30px; z-index:100;"/>
                                    <?php }else{?>
                                    <img alt="" class="img-hide1" src="<?php echo base_url() .'assets/images/staff.png'; ?>" width="100" height=100"" style="position:absolute; top:-7px; left:30px; z-index:100;"/>
                                    <?php }?>
                            <a href="<?php if(isset($_SESSION['simulation']['username']) && $value['url'] !='bummap' && $value['url'] !='bgamap'){ echo $simulation_url.$value['url'];}else{ echo 'javascript:void(0)';} ?>" class="webapp-btn <?php if(!isset($_SESSION['simulation']['username'])) echo "click_show_box";?> <?php if($value['url'] =='bummap'){ echo 'show_bummap';}?> <?php if($value['url'] =='bgamap'){ echo 'show_bgamap';}?>">
                                <?php
                                	if(isset($curent_language['code']) && $curent_language['code'] == 'fr'){ ?>
										 	<h3><?php echo $value['fr'] ?></h3>
                                            <?php if($value['info_fr'] != ''){?>
                                				<p><?php echo $value['info_fr'] ?></p>
                                            <?php }else{?>
                                            	<p><?php echo $value['info'] ?></p>
                                            <?php }?>
									<?php }else if(isset($curent_language['code']) && $curent_language['code'] == 'vn'){ ?>
										 	<h3><?php echo $value['vn'] ?></h3>
                                			 <?php if($value['info_vn'] != ''){?>
                                				<p><?php echo $value['info_vn'] ?></p>
                                            <?php }else{?>
                                            	<p><?php echo $value['info'] ?></p>
                                            <?php }?>
									<?php }else if(isset($curent_language['code']) && $curent_language['code'] == 'en'){ ?>
											<h3><?php echo $value['en'] ?></h3>
                                			 <?php if($value['info_en'] != ''){?>
                                				<p><?php echo $value['info_en'] ?></p>
                                            <?php }else{?>
                                            	<p><?php echo $value['info'] ?></p>
                                            <?php }?>
									<?php }
											else{
									 ?>
                                     		<h3><?php echo $value['name'] ?></h3>
                                			<p><?php echo $value['info'] ?></p>
                                     <?php }?>
                                
                            </a>
                            <div class="clear"></div>
                        </div>
                        <?php $i++; }?>
                                        
                    </div>
                    <?php if(!isset($_SESSION['simulation']['username'])) {?>
                   <div class="col-md-12 webapp-signin">
                        <div class="col-md-offset-3 col-md-6 margin-bottom-30" style="color: #fff;">
                            <form method="post" action="<?php echo $simulation_url; ?>futures_trading" class="login-form" novalidate="novalidate">
                                <h3 class="form-title font-yellow upper_login"><?php translate('Đăng nhập'); ?></h3>
                                <div class="alert alert-danger display-hide">
                                    <button data-close="alert" class="close"></button>
                                    <span> Enter any username and password. </span>
                                </div>
                                
                                <div class="row">
                                	<div class="alert alert-danger login-alert" id="login_alert" style="display:none;">
                <button class="close" data-close="alert"></button>
                <span class="aler_msg"><?php translate('mess_login_failed'); ?></span>
            </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                            <label class="control-label visible-ie8 visible-ie9">Username</label>
                                            <input type="text" id="username" name="username" placeholder="<?php translate('Tên đăng nhập'); ?>" autocomplete="off" class="form-control form-control-solid placeholder-no-fix"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label visible-ie8 visible-ie9">Password</label>
                                            <input type="password" id="password" name="password" placeholder="<?php translate('Mật khẩu'); ?>" autocomplete="off" class="form-control form-control-solid placeholder-no-fix"> </div>
                                    </div>
                                    
                                    <input type="hidden" id="remember" name="remember" value="1"/>
                <input type="hidden" id="token" name="token" value="<?php if(isset($_SESSION['simulation']['token'])) echo $_SESSION['simulation']['token']; ?>"/>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-1 col-md-10">
                                            <button class="btn yellow uppercase " type="button" id="LoginProcess"><?php translate('Đăng nhập'); ?></button>
                                            <label class="rememberme check mt-checkbox mt-checkbox-outline upper_login_cap" >
                                                <input type="checkbox" value="1" name="remember"><?php translate('Nhớ'); ?>
                                                <span></span>
                                            </label>
                                            <a style="color:#fff;" class="forget-password upper_login_cap" id="forget-password" href="<?php echo base_url();?>user-manage/forgot_password.php">| <?php translate('Quên mật khẩu'); ?></a>
                                            
                                            <!--<a style="color:#fff;" id="register-btn" class="upper_login_cap" href="<?php echo base_url();?>user-manage/sign_up.php">| <?php translate('Tạo tài khoản'); ?></a>--> 
                                        </div>
                                    </div>
                                </div>
                                
                                <!--<div class="login-options">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-6">
                                            <h4 class="col-md-6"  style="text-align: right;"><?php translate('text_or_login_with'); ?></h4>
                                            <ul class="social-icons">
                                                <li>
                                                    <a href="javascript:;" data-original-title="facebook" class="social-icon-color facebook"></a>
                                                </li>
                                               <li>
                                                    <a href="javascript:;" data-original-title="Twitter" class="social-icon-color twitter"></a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" data-original-title="Goole Plus" class="social-icon-color googleplus"></a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" data-original-title="Linkedin" class="social-icon-color linkedin"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>-->
                                
                            </form>
                        </div>
                   </div>
                    <?php }?>
                </div>
            </div>
            
        </div>
        
        <!-- Center Wrap END -->
        <!-- END PAGE BASE CONTENT -->
        <!-- BEGIN FOOTER -->
        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
        <!--button type="button" class="quick-sidebar-toggler" data-toggle="collapse">
            <span class="sr-only">Toggle Quick Sidebar</span>
            <i class="icon-logout"></i>
        </button-->
        <!-- END QUICK SIDEBAR TOGGLER -->
       
        <!-- END FOOTER -->

<!-- END CONTAINER -->