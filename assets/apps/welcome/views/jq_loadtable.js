define([
    'jquery',
    'underscore',
    'backbone'
    ], function($, _, Backbone){
        var jq_loadtableView = Backbone.View.extend({
            el: $(".main-container"),
            initialize: function(){

            },
            events: {
				"click .exportTxt": "actionExportTxt",
				"click .exportCsv": "actionExportCsv",
				"click .exportXls": "actionExportXls",
				"click .run_query": "actionRunquery",
				"click .run_export": "actionRunexport",
				"click .run_import": "actionRunimport",
            },
			actionRunexport: function(event) {
				var selIds = $("#jqGrid").jqGrid ('getGridParam', 'selarrrow');
				getAll = [];
				for (i = 0, n = selIds.length; i < n; i++) {
					var valueArray = new Array();
					valueArray[0] = $("#"+selIds[i]).find("[aria-describedby='jqGrid_table_name']").find('a').text();
					valueArray[1] = $("#jqGrid").jqGrid("getCell", selIds[i], "export");
					getAll.push(valueArray);
				}
				if ( getAll.length <= 0 ){
					bootbox.alert("YOU HAVE NOT SELECTED TABLE ! ");
					return false;
					
				}else{
					bootbox.confirm('EXPORT TABLES SELECTED ?', function(result) {
						
						if(result == false){
								return true;
					   }
					   else{
							 $.ajax({
									type: "POST",
									url: $base_url + "ajax/export_list_csv",
									async: false,
									data:{getAll:getAll},
									 beforeSend: function(){
										 $(".loader").show();
										
									 },
									 complete: function(){
										 $(".loader").hide();
										 
									 },
									success: function() {
										bootbox.alert("Done ! "); 
										$('.modal-header').html("INFOMATION"); 
										$('.modal-header').css("padding",'7px');
										$('.modal-header').css("color",'#fff');
										//setTimeout(function () { location.reload(1); }, 3000);
										//setInterval(function(){ bootbox.hideAll(); }, 3000);
										//window.location.reload();	
									},
									 error: function(){
										 bootbox.alert("Error ! "); 
										$('.modal-header').html("INFOMATION"); 
										$('.modal-header').css("padding",'7px');
										$('.modal-header').css("color",'#fff');	
										//setTimeout(function () { location.reload(1); }, 3000);
										//setInterval(function(){ bootbox.hideAll(); }, 5000);
										//window.location.reload();
									  }
								});     
						}
					});
				}
				
            },
			
			actionRunimport: function(event) {
				var selIds = $("#jqGrid").jqGrid ('getGridParam', 'selarrrow');
				getAll = [];
				for (i = 0, n = selIds.length; i < n; i++) {
					var valueArray = new Array();
					valueArray[0] = $("#"+selIds[i]).find("[aria-describedby='jqGrid_table_name']").find('a').text();
					valueArray[1] = $("#jqGrid").jqGrid("getCell", selIds[i], "import");
					getAll.push(valueArray);
				}
				//console.log(getAll);return false;
				if ( getAll.length <= 0 ){
					bootbox.alert("YOU HAVE NOT SELECTED TABLE ! ");
					return false;
					
				}else{
					bootbox.confirm('IMPORT TABLES SELECTED ?', function(result) {
						
						if(result == false){
								return true;
					   }
					   else{
							 $.ajax({
									type: "POST",
									url: $base_url + "ajax/import_file_txt",
									async: false,
									data:{getAll:getAll},
									 beforeSend: function(){
										 $(".loader").show();
										
									 },
									 complete: function(){
										 $(".loader").hide();
										 
									 },
									success: function() {
										bootbox.alert("Done ! "); 
										$('.modal-header').html("INFOMATION"); 
										$('.modal-header').css("padding",'7px');
										$('.modal-header').css("color",'#fff');
										//setTimeout(function () { location.reload(1); }, 3000);
										//setInterval(function(){ bootbox.hideAll(); }, 3000);
										//window.location.reload();	
									},
									 error: function(){
										 bootbox.alert("Error ! "); 
										$('.modal-header').html("INFOMATION"); 
										$('.modal-header').css("padding",'7px');
										$('.modal-header').css("color",'#fff');	
										//setTimeout(function () { location.reload(1); }, 3000);
										//setInterval(function(){ bootbox.hideAll(); }, 5000);
										//window.location.reload();
									  }
								});     
						}
					});
				}
				
            },
			actionRunquery: function(event) {
				var selIds = $("#jqGrid").jqGrid ('getGridParam', 'selarrrow');
				getAll = [];
				for (i = 0, n = selIds.length; i < n; i++) {
					var valueArray = new Array();
					valueArray[0] = $("#jqGrid").jqGrid("getCell", selIds[i], "table_name");
					valueArray[1] = $("#jqGrid").jqGrid("getCell", selIds[i], "type");
					valueArray[2] = $("#jqGrid").jqGrid("getCell", selIds[i], "value_from");
					valueArray[3] = $("#jqGrid").jqGrid("getCell", selIds[i], "value_by");
					valueArray[4] = $("#"+selIds[i]).find("[aria-describedby='jqGrid_active']").find('input').val();
					getAll.push(valueArray);
				}
				
				if ( getAll.length <= 0 ){
					bootbox.alert("YOU HAVE NOT SELECTED TABLE ! ");
					return false;
					
				}else{
					bootbox.confirm('UPDATE TABLES ?', function(result) {
						
						if(result == false){
								return true;
					   }
					   else{
							 $.ajax({
									type: "POST",
									url: $base_url + "ajax/update_list_table",
									async: false,
									data:{getAll:getAll},
									 beforeSend: function(){
										 $(".loader").show();
										
									 },
									 complete: function(){
										 $(".loader").hide();
										 
									 },
									success: function() {
										bootbox.alert("Done ! "); 
										$('.modal-header').html("INFOMATION"); 
										$('.modal-header').css("padding",'7px');
										$('.modal-header').css("color",'#fff');
										setTimeout(function () { location.reload(1); }, 3000);
										//setInterval(function(){ bootbox.hideAll(); }, 3000);	
										//window.location.reload();	
									}, 
									error: function(){
										 bootbox.alert("Error ! "); 
										$('.modal-header').html("INFOMATION"); 
										$('.modal-header').css("padding",'7px');
										$('.modal-header').css("color",'#fff');	
										setTimeout(function () { location.reload(1); }, 3000);
										//setInterval(function(){ bootbox.hideAll(); }, 3000);
										//window.location.reload();
									  }
								});     
						}
					});
				}
            },
			actionExportTxt: function(event) {
				$("#actexport").val('exportTxt');
				$('#form_tab').submit();
            },
			actionExportCsv: function(event) {
				$("#actexport").val('exportCsv');
				$('#form_tab').submit();
            },
			actionExportXls: function(event) {
				$("#actexport").val('exportXls');
				$('#form_tab').submit();
            },
            index: function(){
                  $(document).ready(function() {
					  $(window).on("resize", function () {
						var $grid = $("#jqGrid"),
							newWidth = $grid.closest(".ui-jqgrid").parent().width();
						$grid.jqGrid("setGridWidth", newWidth, true);
					});
					
                   //begin jqgrid
				 
				   
          // var form_currency = $('#form_currency').serialize();
		   var filter_get_all = $(".filter_get_all").attr('attr');
		
		 	var jq_table = $(".jq_table").attr('attr');
			var table_export = $(".jq_table").attr('table_export');
			var table_import = $(".jq_table").attr('table_import');
			var user = $(".jq_table").attr('user');
			var username = $(".jq_table").attr('username');
			
			var khuvuc = $(".jq_table").attr('khuvuc');
			//console.log(khuvuc);
			if(table_export == 'export'){
				
				var summary_des = 'Export';	
			}
			else if(table_import == 'import'){
				var summary_des = 'Import';		
			}
			else{
				var summary_des = $(".jq_table").attr('summary_des');
			}
			var order_by = $(".jq_table").attr('order_by');
			var admin = $(".jq_table").attr('admin');
			
			
		
			var arr_order_by = order_by.split(' ');
			var order_last = arr_order_by.pop();
			var order_first = arr_order_by.join(' ');
				
			//console.log(arr[0]);
			var column = jQuery.parseJSON($("#column").attr('attr'));// Phai parse json vi no la object
			var error = jQuery.parseJSON($("#column").attr('error'));// Phai parse json vi no la object
			//console.log(error);
			//var col = [{"label":"Code","name":"code"}];
			//bengin 1
			// phan nay neu dang co nhay thi an nhay di
			
			var vndmi = $(".jq_table").attr('vndmi');
			if(vndmi == 1){
				var link_ajax = "ajax/jq_loadtable_vndmi";
				var link_edit_ajax = 'ajax/edit_del_add_vndmi_jq_loadtable?jq_table=';	
			}else{
				var link_ajax = "ajax/jq_loadtable";
				var link_edit_ajax = 'ajax/edit_del_add_jq_loadtable?jq_table=';			
			}
			
			if(jq_table == 'swap' || table_export == 'export' || table_import == 'import'){
				multiselect = true;
			}else{
				multiselect = false;	
			}
			if(jq_table == 'khohang'){
				var width_custom = 	2500;
				var active_custom = false;
			}else{
				var width_custom = 	0;
				var active_custom = true;	
			}
			//console.log(column);
			$.each(column, function() {
				//console.log(this.name);
				if(this.formatoptions!='' && this.formatoptions != null){
					this.formatoptions = {decimalSeparator:".", thousandsSeparator: ",", decimalPlaces:parseInt(this.formatoptions), defaultValue: "" };
				}
				
				if(this.editoptions != '' && this.editoptions != null){
					var editops = this.editoptions.replace('"','');
					
					if(this.editoptions == "dropdown"){
						if(this.name == 'name_area'){
							var cut_khuvuc = khuvuc.replace('"','').slice(0,-2);
							this.editoptions = { value: cut_khuvuc};
						}else if(this.name == 'property_type'){
							var cut_loaisp = "Căn hộ cao cấp:Căn hộ cao cấp;Nhà Phố:Nhà Phố;Đất nền nhà phố:Đất nền nhà phố;Biệt thự:Biệt thự;Đất nền biệt thự:Đất nền biệt thự";
							this.editoptions = { value: cut_loaisp};	
						}
						else if(this.name == 'huongcua'){
							var cut_huongcua = "Đông:Đông;Tây:Tây;Nam:Nam;Bắc:Bắc;Tây bắc:Tây bắc;Tây nam:Tây nam;Đông bắc:Đông bắc; Đông nam:Đông nam";
							this.editoptions = { value: cut_huongcua};	
						}
						else if(this.name == 'huongview'){
							var cut_huongview = "Đông:Đông;Tây:Tây;Nam:Nam;Bắc:Bắc;Tây bắc:Tây bắc;Tây nam:Tây nam;Đông bắc:Đông bắc; Đông nam:Đông nam";
							this.editoptions = { value: cut_huongview};	
						}
						else if(this.name == 'hientrangsanpham'){
							var cut_hientrangsanpham = "Đang ở:Đang ở;Nhà trống:Nhà trống;Đang cho thuê:Đang cho thuê";
							this.editoptions = { value: cut_hientrangsanpham};	
						}
						else if(this.name == 'noithat'){
							var cut_noithat = "Đầy đủ nội thất:Đầy đủ nội thất;Chưa có nội thất:Chưa có nội thất";
							this.editoptions = { value: cut_noithat};	
						}
						else if(this.name == 'transaction_type'){
							var cut_transaction_type = "Cho thuê:Cho thuê;Bán:Bán";
							this.editoptions = { value: cut_transaction_type};	
						}
					}
					else if(this.editoptions == "datecurrent"){
						var utc = new Date().toJSON().slice(0,10).replace(/-/g,'-');
						this.editoptions = { value:utc};	
					}
					else{
						this.editoptions = {dataInit: function (element) {$(element).datepicker({id: "orderDate_datePicker",dateFormat:editops,maxDate: new Date(2020, 0, 1),showOn: "focus"});}} ;
					}
					
				}
				
				if(this.edittype == 'textarea'){
					this.editoptions = {cols:94};
				}
				
				if(this.searchoptions != '' && this.searchoptions != null){
					
					var seops = this.searchoptions.replace('"','');
					if(seops.length == 8){
							this.searchoptions = {dataInit: function (element) {$(element).datepicker({id: "orderDate_datePicker",dateFormat: 'yy-mm-dd',maxDate: new Date(2020, 0, 1),showOn: "focus"});}};	
					//console.log(this.searchoptions);
					}
					else{
						//var selectoption = buildSearchSelect(this.name,jq_table);
						//var responseText = selectoption.responseText.replace('"','').slice(0,-2);
						var responseText = this.selectlist.replace('"','').slice(0,-2);
						if(responseText){
							this.searchoptions = { value: ":[All];"+ responseText}
						}
						else{
							this.searchoptions = {}
						}
						
							
					
					}
				}
				
				
				if(this.editrules != '' && this.editrules != null){
					var seops=this.editrules.split(",");
					var obj = [];
					$.each( seops, function( key, value ) {
						var val=value.split(":");
					  	obj[val[0]]=val[1];
					});
					
					this.editrules ={
							//custom: true, 
							//custom_func: checkforduplicates,				
							number: (typeof(obj["number"]) === 'undefined' || obj["number"] === null) ? false :((obj["number"].trim())==='true' ? true :false),
							required: (typeof(obj["required"]) === 'undefined' || obj["required"] === null) ? false :((obj["required"].trim())=='true' ?true:false),
							edithidden: (typeof(obj["edithidden"]) === 'undefined' || obj["edithidden"] === null) ? false :((obj["edithidden"].trim())=='true' ?true:false) 
						}
				console.log(this.editrules);
						
				}
				if(this.editable=='true'){
					this.editable = true;	
				}
				if(this.hidden=='true'){
					this.hidden = true;	
				}
				if(this.editable=='false'){
					this.editable = false;	
				}
				
				if(this.key=='true'){
					this.key = true;	
				}
				if(this.key=='false'){
					this.key = false;	
				}
				if(this.headertitles==''){
					this.headertitles = true;
				}
				if(this.formatter=='' || (this.formatter==null)){
					this.formatter = nullFormatter;
				}
				if(this.formatter=='link'){
					this.format_notedit = 'not_edit';
					this.formatter = formatLink;
				}
				if(this.formatter=='link_default'){
					this.format_notedit = 'not_edit';
					this.formatter = formatLinkDefault;
				}
				if(this.formatter=='link_download'){
					this.format_notedit = 'not_edit';
					this.formatter = formatLinkDownload;
				}
				if(this.formatter=='info'){
					this.format_notedit = 'not_edit';
					this.formatter = formatInfo;
				}
				if(this.formatter=='noedit'){
					this.format_notedit = 'not_edit';
					this.formatter = nullFormatter;
				}
				if(this.formatter=='hiden_field' && user != 1){
					this.formatter = formatHiden;
				}
				if(this.formatter=='m2'){
					this.formatter = formatM2;
				}
				if(this.formatter=='actions'){
					this.format_notedit = 'not_edit';
				}
				if(this.formatter=='image'){
					this.format_notedit = 'not_edit';
					this.formatter = formatImage;
				}
                if(this.cellattr == ''){
					this.cellattr = function (rowId, tv, rawObject, cm, rdata) { return 'style="white-space: normal;"' };
				}
				
			  });
			// end 1
			// neu la admin moi duoc quyen sua tren tung dong
			
			if(user == 1){
				var edit_row = editRow;	
				var admin_per = true;
			}
			else{
				var edit_row='';
				var admin_per = true;	
			}
			
            $("#jqGrid").jqGrid({
               // url: 'ajax/jq_efrc_currency_data',
			    url: $base_url+link_ajax,
				editurl: $base_url+link_edit_ajax+jq_table,
			
                mtype: "POST",
                datatype: "json",
				postData:{jq_table:jq_table,table_export:table_export,table_import:table_import,filter_get_all:filter_get_all},
                page: 1,
                colModel:column,
				//loadonce: true,
				loadtext: "Loading...",
				onSelectRow: edit_row,
				
			
				viewrecords: true,
				//multiSort: true,
				//sortname: arr_order_by[0],
               // sortorder: arr_order_by[1],
				sortname: order_first,
               	sortorder: order_last,
				sortable: true,
				loadOnce:false,
				width:width_custom,
			   	autowidth: active_custom,
               	
			   cmTemplate: { title: false },
			   
			  // width: null,
				//shrinkToFit: false,
             	//gridview    :   true,
				//autoheight: true, // muon cuon xuong load them thi tat dong nay di va bat height o duoi len
                height:"100%", // co the de % de fix chieu cao auto
                rowNum: 15,
				//rownumbers: true, 
                pager: "#jqGridPager",
				caption: summary_des,// hien tren title
				//scroll: 1,// phai de chieu cao co dinh no moi hoat dong
				rowList:[10,15,20,25,30,35,40,45,50,55,100000000],// hien thi so trang can xem
				multiselect: multiselect,
				 //recordpos: 'left',
			  loadComplete: function() {
				 
				 /* $('.stooltip').hover(function(event){
					  	var $this = $(event.currentTarget); 
				  		$this.$('.tooltiptext').css("visibility","visible"); 
					}, 
					function(){ 
						var $this = $(event.currentTarget); 
				  		$this.$('.tooltiptext').css("visibility","hidden"); 
					});*/
				  // when enter then userupdate and date update change
				
				 $(document).keypress(function(event) {
					 
						var keycode = (event.keyCode ? event.keyCode : event.which);
						if (keycode == '13') {
							$('.editable').parent().parent().find("[aria-describedby='jqGrid_dateupdate']").html($dateupdate);
							$('.editable').parent().parent().find("[aria-describedby='jqGrid_userupdate']").html($userupdate);
							//$('.editable').addClass('hung');
						}
					});
					
				  $('#gs_actions').parent().next().remove();
				  $('#gs_actions').parent().remove();
				 
				  
				  
				  
				 	if(error){
						var html ='';
						$.each(error, function( key, value) {
							$(".show-error").css("display", "block");
							html += "["+value+"] ";
							
						});
						$(".show-error strong").html(html);
					}
					//$("tr.jqgrow:odd").css("background", "#E0E0E0");
					$("tr.jqgrow:odd").addClass('myAltRowClass');
					$(".ui-icon-locked").parent().addClass("dis_none");
					$("#edit_jqGrid").hide();
					$("#del_jqGrid").hide();
					if(user == 1){
						$("#add_jqGrid").hide();
					}
					
					$.each(column, function() {
						$("#jqgh_jqGrid_"+this.name).attr("data-toggle", "tooltip");
						$("#jqgh_jqGrid_"+this.name).attr("title", this.tooltips);
						$('[data-toggle="tooltip"]').tooltip({position: { my: "center bottom", at: "left+30 top" }});
						
					});
					$("option[value=100000000]").text('All');
					
				},// gan class chan le cho tung dong
				
				
				 
            });
			//Set null convert empty
			var nullFormatter = function(cellvalue, options, rowObject) {
				if(cellvalue === undefined || isNull(cellvalue)) {
					cellvalue = 'NULL';
				}
				return cellvalue;
			}
			function formatLink(cellValue, options, rowObject) {
				//console.log(cellValue);
				//$.each(column, function(key,val) {
					if (cellValue == "")
						return "";
					if (cellValue == null || cellValue == 'null')
						return "";
					else{
						if( cellValue.indexOf("http") == 0 ) {
							return "<a target='_blank' href='"+ cellValue+"' class='link_overview'>LINK</a>";
						}else{
							
							return "<a target='_blank' href='" + cellValue+ "' class='link_overview '>LINK</a>";
						}
						
					}
		
            };
			
			function formatLinkDefault(cellValue, options, rowObject) {
				//console.log(rowObject.nb);
					if (cellValue == "")
						return "";
					if (cellValue == null || cellValue == 'null')
						return "";
					else{
						return "<a href='"+$base_url+"jq_loadtable/" + cellValue + "' class='link_overview'>" + cellValue.substring(0, 25) + "</a>";
					}
            };
			
			function formatInfo(cellValue, options, rowObject) {
				//return '<a target="_blank" href="'+$base_url+cellValue+'" class="btn btn-sm green"><i class="fa fa-question"></i></a>';
				if (cellValue == "")
						return "";
					if (cellValue == null || cellValue == 'null')
						return "";
					else{
				 		return '<div class="stooltip format_row"><i class="fa fa-question"></i><span class="tooltiptext">'+ cellValue +'</span></div>';
					}
            };
			function formatHiden(cellValue, options, rowObject) {
				if(rowObject.userupdate == username){
					return	cellValue;
				}else{
					return '<div target="_blank" href="" class="btn btn-sm green"><i class="fa fa-question"></i></div>';
				}
				
            };
			function formatM2(cellValue, options, rowObject) {
				return cellValue+'m²';
				
            };
			function formatLinkDownload(cellValue, options, rowObject) {
					if (cellValue == "")
						return "";
					if (cellValue == null || cellValue == 'null')
						return "";
					else{
						return '<a  href="'+$base_url+"export/"+cellValue+'.csv" class="btn btn-sm green"><i class="fa fa-download"></i></a>';
					}
            };
			
			function formatImage(cellValue, options, rowObject) {
				//console.log(cellValue);
                var end = getMeta($base_url+ cellValue);
				//return "<img height='50' data-height='"+end.h+"' class='thumb' src='"+$base_url+ cellValue +"'>";
				return "<a class='mix-preview fancybox-button' href='"+$base_url+ cellValue +"'  data-fancybox-group=''><img height='32' data-height='160' width='32' class='thumb' src='"+$base_url+ cellValue +"'></a>";	
				
				
            };
			 function getMeta(url){
				 var w; var h;
				 var img=new Image;
				 img.src=url;
				 img.onload=function(){w=this.width; h=this.height;};
				 return {w:w,h:h}    
            } ;
			
			/*function checkforduplicates(){
				var fruits = ["Banana"];
				return fruits;
			}*/
			
			
			
			 var lastSelection;

            function editRow(id) {
				
                //if (id && id !== lastSelection) {
                    var grid = $("#jqGrid");
					
                    grid.jqGrid('restoreRow',lastSelection);
                    grid.jqGrid('editRow',id, {keys:true, focusField: 4});
                    lastSelection = id;
					
					//jQuery('#jqGrid').editRow(id, true); 
               // }
				
            }
			
			/*function buildSearchSelect(name,table){
				
                return $.ajax({
                    url: $base_url + "ajax/getSelected",
                    type: "POST",
                    data: {name:name,table:table},
                    async: false,
                  
                });
				//var a = result;//"ALFKI:ALFKI;ANATR:ANATR;ANTON:ANTON";
				//console.log(a);
			}*/
			
			// activate the toolbar searching
            $('#jqGrid').jqGrid('filterToolbar');
			
			$('#jqGrid').jqGrid('navGrid',"#jqGridPager", {                
                search: false, // show search button on the toolbar
                add: admin_per,
                edit: admin_per,
                del: admin_per,
                refresh: true,
            },
			
			{ 
					closeAfterEdit: true,
					width:1000,
					recreateForm: true,
					addCaption: "Thay đổi",
					beforeShowForm: function ($form) {
						 $("tr#tr_id").hide();
						$("tr#tr_ngaycapnhat").hide();
						/*var html = $("[aria-selected='true'] .tooltiptext").text();
						var div = document.createElement("div");
						div.innerHTML = html;
						var text = div.textContent || div.innerText || "";
						setTimeout(function() {
							$form.find('#note').val(text);
						},50);*/
						$("#area").attr("placeholder","m²");
						
						$form.closest(".ui-jqdialog").position({
							of: window, // or any other element
							my: "center top",
							at: "center top"
						});
						
						$('#sData').addClass("btn blue format_button");
					
						$('#cData').addClass("btn red format_button");
						$("#sData").html('<i class="fa fa-edit"></i> Lưu');
						$("#cData").html('<i class="fa fa-remove"></i> Hủy');
						
						$("#editmodjqGrid").css("padding","0.833em");
						$("#editmodjqGrid").css("border","1px solid white");
						$("#editmodjqGrid").attr('style', ' width:100%; background:#EFB');
						$(".ui-jqdialog-titlebar").attr('style', ' padding:10px; font-size:20px;');
						
						// them du an
						$("#tr_name_area").append('<div class="col-md-12"><div class="input-group"> <input name="tenduan_add_new" id="tenduan_add_new" class="form-control" type="text" style="height:31px;"><div class="input-group-btn"><button value_id="owner" type="button" class="btn green add-new-tenduan tooltips" data-original-title="Add new item"><i class="fa fa-plus"></i></button> </div></div></div>');
						$("#tenduan_add_new").attr("placeholder","Thêm dự án");
						$(".add-new-tenduan").click(function(event){
							  event.preventDefault();
							  var $this = $(event.currentTarget);
							  $('#name_area').append($('<option/>', { 
								value: $("#tenduan_add_new").val(),
								text : $("#tenduan_add_new").val() 
							   }));
							   //var selectList = $('.select2_'+$id+' > option');
							  var selectList = $('#name_area'+' > option');
							 
							
							  selectList.sort(function(a,b){
							   a = a.value;
							   b = b.value;
							   return a == b ? 0 : (a < b ? -1 : 1);    
							  });
							  
							  $('#name_area').html(selectList);
							  $('#name_area').val($('#tenduan_add_new').val());
							  $("#tenduan_add_new").val('');
						 });
						 
						 //them loai san pham
						 $("#tr_property_type").append('<div class="col-md-12"><div class="input-group"> <input name="loaisp_add_new" id="loaisp_add_new" class="form-control" type="text" style="height:31px;"><div class="input-group-btn"><button value_id="owner" type="button" class="btn green add-new-loaisp tooltips" data-original-title="Add new item"><i class="fa fa-plus"></i></button> </div></div></div>');
						 $("#loaisp_add_new").attr("placeholder","Thêm loại sản phẩm");
						$(".add-new-loaisp").click(function(event){
							  event.preventDefault();
							  var $this = $(event.currentTarget);
							  $('#property_type').append($('<option/>', { 
								value: $("#loaisp_add_new").val(),
								text : $("#loaisp_add_new").val() 
							   }));
							   //var selectList = $('.select2_'+$id+' > option');
							  var selectList = $('#property_type'+' > option');
							 
							
							  selectList.sort(function(a,b){
							   a = a.value;
							   b = b.value;
							   return a == b ? 0 : (a < b ? -1 : 1);    
							  });
							  
							  $('#property_type').html(selectList);
							  $('#property_type').val($('#loaisp_add_new').val());
							  $("#loaisp_add_new").val('');
						 });
						/*$('<a href="#">Clear<span class="ui-icon ui-icon-document-b"></span></a>')
							.click(function() {
							  $(".ui-jqdialog input").val("");    
							}).addClass("fm-button ui-state-default ui-corner-all fm-button-icon-left")
							  .prependTo("#Act_Buttons>td.EditButton");*/
					}
				},// Dong form edit sau khi sua
				{
					closeAfterAdd:true,
					width:1000,
					recreateForm: true,
					addCaption: "Thêm mới",
					beforeShowForm: function ($form) {
						$("tr#tr_id").hide();
						$("tr#tr_ngaycapnhat").hide();
						 
						$("#area").attr("placeholder","m²");
						
						$("#ngaycapnhat").css("background","#323232");
						 $form.closest(".ui-jqdialog").position({
							of: window, // or any other element
							my: "center top",
							at: "center top"
						});
						$('#sData').addClass("btn blue format_button");
						$('#cData').addClass("btn red format_button");
						$("#sData").html('<i class="fa fa-edit"></i> Thêm');
						$("#cData").html('<i class="fa fa-remove"></i> Hủy');
						
						$("#editmodjqGrid").css("padding","0.833em");
						$("#editmodjqGrid").css("border","1px solid white");
						$("#editmodjqGrid").attr('style', ' width:100%; background:#EFB');
						$(".ui-jqdialog-titlebar").attr('style', ' padding:10px; font-size:20px;');
						
						// them du an
						$("#tr_name_area").append('<div class="col-md-12"><div class="input-group"> <input name="tenduan_add_new" id="tenduan_add_new" class="form-control" type="text" style="height:31px;"><div class="input-group-btn"><button value_id="owner" type="button" class="btn green add-new-tenduan tooltips" data-original-title="Add new item"><i class="fa fa-plus"></i></button> </div></div></div>');
						$("#tenduan_add_new").attr("placeholder","Thêm dự án");
						$(".add-new-tenduan").click(function(event){
							  event.preventDefault();
							  var $this = $(event.currentTarget);
							  $('#name_area').append($('<option/>', { 
								value: $("#tenduan_add_new").val(),
								text : $("#tenduan_add_new").val() 
							   }));
							   //var selectList = $('.select2_'+$id+' > option');
							  var selectList = $('#name_area'+' > option');
							 
							
							  selectList.sort(function(a,b){
							   a = a.value;
							   b = b.value;
							   return a == b ? 0 : (a < b ? -1 : 1);    
							  });
							  
							  $('#name_area').html(selectList);
							  $('#name_area').val($('#tenduan_add_new').val());
							  $("#tenduan_add_new").val('');
						 });
						 
						 //them loai san pham
						 $("#tr_property_type").append('<div class="col-md-12"><div class="input-group"> <input name="loaisp_add_new" id="loaisp_add_new" class="form-control" type="text" style="height:31px;"><div class="input-group-btn"><button value_id="owner" type="button" class="btn green add-new-loaisp tooltips" data-original-title="Add new item"><i class="fa fa-plus"></i></button> </div></div></div>');
						 $("#loaisp_add_new").attr("placeholder","Thêm loại sản phẩm");
						$(".add-new-loaisp").click(function(event){
							  event.preventDefault();
							  var $this = $(event.currentTarget);
							  $('#property_type').append($('<option/>', { 
								value: $("#loaisp_add_new").val(),
								text : $("#loaisp_add_new").val() 
							   }));
							   //var selectList = $('.select2_'+$id+' > option');
							  var selectList = $('#property_type'+' > option');
							 
							
							  selectList.sort(function(a,b){
							   a = a.value;
							   b = b.value;
							   return a == b ? 0 : (a < b ? -1 : 1);    
							  });
							  
							  $('#property_type').html(selectList);
							  $('#property_type').val($('#loaisp_add_new').val());
							  $("#loaisp_add_new").val('');
						 });
						/*$('<a href="#">Clear<span class="ui-icon ui-icon-document-b"></span></a>')
							.click(function() {
							  $(".ui-jqdialog input").val("");    
							}).addClass("fm-button ui-state-default ui-corner-all fm-button-icon-left")
							  .prependTo("#Act_Buttons>td.EditButton");*/
					},
					
					/*afterSubmit:function(response, postdata) { 
						//alert(postdata.dienthoaididong);
						var masp = postdata.code_product;
						var result = 0;
						$.ajax({
							url: $base_url + 'ajax/checkuser_exists',
							type: 'POST',
							data:{masp: masp},
							success: function(response){
								//console.log(response);
								if(response >=1){
									result = response;
								}
								
							}	
						});
						//alert(result);
						if(result == 0){
							return [false,"Lỗi. Mã sản phẩm đã tồn tại"];
						}else{
							return [true,"Ok"];
						}	
						
					
					},*/
					//beforeSubmit:function(postdata,formid) { alert(); },
					onClose: function() {
						//alert("In onClose");
					}
							
				
				}
			);
			
			
			// Click disable will not edit inline 
			if(user == 1){
				$('#jqGrid').jqGrid('navButtonAdd',"#jqGridPager",
					{caption:"Không được sửa",
					title:"Không được sửa",
					buttonicon :'ui-icon-locked',
					onClickButton:function(){
						$.each(column, function() {
							$('#jqGrid').jqGrid("setColProp", this.name, {editable: false});
							
						});
						
						$(".ui-icon-locked").parent().hide();
						$("#jqGrid").trigger('reloadGrid');
						$("#edit_jqGrid").hide();
						$("#del_jqGrid").hide();
						$("#add_jqGrid").hide();
						$(".ui-icon-unlocked").parent().show();
						 
					}}
				);
				if(table_export != 'export' && table_import != 'import'){
						$('#jqGrid').jqGrid('navButtonAdd',"#jqGridPager",
							{caption:"Được sửa",
							title:"Được sửa",
							buttonicon :'ui-icon-unlocked',
							onClickButton:function(){
								$.each(column, function() {
									if(this.format_notedit == "not_edit"){	
										$('#jqGrid').jqGrid("setColProp", this.name, {editable: false});	
									}else{
										$('#jqGrid').jqGrid("setColProp", this.name, {editable: true});
									}
									$(".ui-icon-unlocked").parent().hide();
									
									//$("#jqGrid").trigger("reloadGrid");
									
									if(user == 1){
										$("#edit_jqGrid").show();
										$("#del_jqGrid").show();
									}
									$("#add_jqGrid").show();
									//$('.ui-inline-edit').click();
									$(".ui-icon-locked").parent().show();
									
									
									//$('.jqgrow').removeClass("ui-state-highlight");
									
									
								});
							}}
						);
				}
			}else{
				if(jq_table == 'khohang'){
					$("#add_jqGrid").show();	
					$.each(column, function() {
						$('#jqGrid').jqGrid("setColProp", this.name, {editable: true});
						
					});
				}
			}
			// gan lai cho filter phia duoi
			/*var code = $('#filter_code').val();
			$('#gs_code').val(code);
			var date = $('#filter_date').val();
			$('#gs_date').val(date);
			var closes = $('#filter_close').val();
			$('#gs_close').val(closes);
			var cur_from = $('#filter_cur_from').val();
			$('#gs_cur_from').val(cur_from);
			var cur_to = $('#filter_cur_to').val();
			$('#gs_cur_to').val(cur_to);*/
  			// end jqgrid
				   
                   
           });   
                      
            },
            render: function(){
                if(typeof this[$app.action] != 'undefined'){
                    new this[$app.action];
                }
            }
        });
        return new jq_loadtableView;
});// JavaScript Document