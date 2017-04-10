define([
    'jquery',
    'underscore',
    'backbone'
    ], function($, _, Backbone){
        var maintenanceView = Backbone.View.extend({
            el: $(".main-container"),
            initialize: function() {

            },
            events: {
                 "click .clean_data": "actionClean_data",
                 "click .re_clean": "actionReclean",
                 "click .create_bumpmap": "actionCreate_BM",
                 "click .create_bgamap": "actionCreate_BGAM",
                
            },
            
            actionCreate_BGAM: function(event) {
                var $this = $(event.currentTarget);
				bootbox.confirm({
					message: "Are you sure create BGA_MAP ?",
					callback: function(result){
						if(result == true){
						  $.ajax({
								url: $base_url + "maintenance/create_bgamap",
								type: "POST",
								data: {},
								async: false,
								success: function(response) {
									// window.location.reload();
                                    $('#modal_view_user3').modal('show');
								}
							});	
						}
					}
				}); 
            },  
            
            actionCreate_BM: function(event) {
                var $this = $(event.currentTarget);
				bootbox.confirm({
					message: "Are you sure create BUMP_MAP ?",
					callback: function(result){
						if(result == true){
						  $.ajax({
								url: $base_url + "maintenance/create_bumpmap",
								type: "POST",
								data: {},
								async: false,
								success: function(response) {
									// window.location.reload();
                                    $('#modal_view_user3').modal('show');
								}
							});	
						}
					}
				}); 
            },  
            
            actionClean_data: function(event) {
            var $this = $(event.currentTarget);
            $('#modal_view_user2').modal('show');
            
            },
            actionReclean: function(event) {
                var $this = $(event.currentTarget);
                     $.ajax({
						url: $base_url + "maintenance/clean_data",
						async: false,
						success: function(response) {
                        $('#modal_view_user2').modal('hide');
						}
					});   
            },
            
           
           
           
           
           
           
            
            index: function(){
                $(document).ready(function(){
                    
                });
            },
            render: function(){
                if(typeof this[$app.action] != 'undefined'){
                    new this[$app.action];
                }
            }
        });
    return new maintenanceView;
});