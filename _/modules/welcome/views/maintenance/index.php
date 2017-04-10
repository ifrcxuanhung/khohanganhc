<style>
.form .form-bordered .form-group{
	border-bottom: 1px solid #3e3e3e;
margin: 0;

}
.form .form-bordered label{ color:#0f84c0; padding:20px !important; text-transform:uppercase; }
.portlet.light.bordered.form-fit > .portlet-title{ border-bottom:1px solid #444 !important}
.form .form-bordered .form-group > div{ border-left:1px solid #444 !important}
</style>
<div class="col-md-12">
    <!-- BEGIN PORTLET-->
    <div class="portlet light form-fit bordered" style="width:100%;">
        <div class="portlet-title" style="background:#4c87b9; padding-top:0px; padding-bottom:0px; border:solid 1px #404040 !important;">
        <div class="caption" style="color:#fff; font-weight:bold; line-height:27px;">
            <i class="fa"></i><?php translate('Maintenance'); ?></div>
           
    </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="#" class="form-horizontal form-bordered">
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-3"><?php translate('CLEAN DATA'); ?></label>
                        <div class="col-md-9">
                             <div class="col-md-3">
                                 <button class="btn blue clean_data" type="button">CLEAN DATE</button>
                             </div>
                        </div>
                    </div>
               
                </div>
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-3"><?php translate('CREATE TABLE'); ?></label>
                        <div class="col-md-9">
                             <div class="col-md-3">
                                 <button class="btn blue create_bumpmap" type="button">CREATE BUMP MAP</button>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-3"><?php translate('CREATE TABLE'); ?></label>
                        <div class="col-md-9">
                             <div class="col-md-3">
                                 <button class="btn blue create_bgamap" type="button">CREATE BGA MAP</button>
                             </div>
                        </div>
                    </div>
                </div>
                
            </form>
            
            <!-- END FORM-->
            
        </div>
 </div>
    <!-- END PORTLET-->
</div>


<div id="modal_view_user2" class="modal bs-modal-md fade" tabindex="-1" aria-hidden="true" data-width="500">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header" style="background-color: #E4AD36;">
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	      <h4 class="modal-title"><?php echo translate('Do you want clean data ? '); ?></h4>
	    </div>
	    <form id="form_view_user" role="form" class="form-horizontal" action="" method="post">
	      <div class="modal-footer">
            <a href="#" class="btn default" data-dismiss="modal"><?php echo translate('Cancel'); ?></a>
	        <input type="button" class="btn green re_clean" value="<?php echo translate('OK'); ?>"/>
	      </div>
	    </form>
	  </div>
	</div>
</div>

 <div id="modal_view_user3" class="modal bs-modal-md fade" tabindex="-1" aria-hidden="true" data-width="500">
	<div class="modal-dialog">
	  <div class="modal-content">
	   
	    <form id="form_view_user" role="form" class="form-horizontal" action="" method="post">
	      <div class="modal-footer">
            <a href="#" class="btn green default" data-dismiss="modal"><?php echo translate('Done'); ?></a>
	        
	      </div>
	    </form>
	  </div>
	</div>
</div>