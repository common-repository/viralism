var sweetAlert, swal;
jQuery(document).ready(function(){
    jQuery('[data-toggle="tooltip"]').tooltip();
});
jQuery(document).on('click','.vio_delete_social',function(){    
	var datahref 	= jQuery(this).attr('data-href');
	var datatitle 	= jQuery(this).attr('data-title');
	var datamsg 	= jQuery(this).attr('data-msg');
	jQuery('#final_redirect_url').val(datahref);
	swal({
		title: datatitle,
		text: datamsg,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	});
});
jQuery(document).on('click','.confirm',function(){ 	
    var datahref 	  = jQuery('#final_redirect_url').val();
    var adminajax_url = jQuery('#adminajax_url').val();
	if(datahref!='' && datahref!=undefined){
		window.location.href = datahref;
	} else if(adminajax_url=='yes' && adminajax_url!=undefined ){
        var data = {
            action: 'vio_dismiss_notice'
        };
        jQuery.post(ajaxurl, data, function(response) {
            console.log(response);
            jQuery('.notice-warning').hide();
        });
    }else{
		return false;
	}
});
var jQuerypreviousRadio;
var jQueryinputs = jQuery('.vio_content_type');
jQueryinputs.parents("label").mouseup(function () {
    jQuerypreviousRadio = jQueryinputs.filter(':checked');
});
jQueryinputs.change(function () {
    var prev= jQuerypreviousRadio.val();
    var next= jQuery('.vio_content_type:checked').val();
    if(prev!=next){
        jQuery('#pageToken').val('');
    }
});
jQuery(document).on('change','.vio_content_type',function(){
    if(jQuery(this).val()=='viral_content'){
        jQuery('#time_selection_section').show();
    }else{
        jQuery('#time_selection_section').hide();
    }
    jQuery('.search_content').html('');
});
jQuery("#vio_myModal").on("hidden.bs.modal", function () {
	jQuery('#videoiframe').attr('src','');
	jQuery('#myModalLabelPreview').text('');
});
jQuery("#vio_myPost").on("hidden.bs.modal", function () {
    jQuery('.model-body-title-input').hide();
    jQuery('input#custom_title_text').val('');
    jQuery('input#custom_title_text').prop('required',false);
    jQuery('form#vio_addPost')[0].reset();
});
jQuery("#vio_myPost_image").on("hidden.bs.modal", function () {
    jQuery('form#vio_addPost_image')[0].reset();
});
<!--SCROLL DOWN PAGINATION-->
var processing;
jQuery(document).ready(function(){	
	jQuery(document).scroll(function(e){	
		if (processing)
			return false;
        var get_admin_url   = jQuery('#get_admin_url').val();
        var pageToken       = jQuery('#pageToken').val();
        var search_string   = jQuery('#search_string').val(); 
        var content_type    = jQuery('.vio_content_type:checked').val();
        
        if((content_type=='youtube_video' || content_type=='vimeo_video' || content_type=='image_search') && search_string!='' && pageToken!=''){
            if (jQuery(window).scrollTop() >= jQuery(document).height() - jQuery(window).height() - 700){
                jQuery('.ajaxcontentloader').show();
                processing = true;  
                var form_data = { action:'vio_search_more_content', pageToken : pageToken, search_string:search_string, content_type:content_type }
                jQuery.post(ajaxurl, form_data, function(response) {                 
                    jQuery('.ajaxcontentloader').hide();
                    var data = jQuery.parseJSON(response);
                    if(content_type=='youtube_video'){
                        jQuery('#youtube_videos').append(data.html);
                    }else if(content_type=='vimeo_video'){
                        jQuery('#vimeo_videos').append(data.html);
                    } else if(content_type=='image_search'){
                        jQuery('#images_html').append(data.html);
                    }                        
                    jQuery('#pageToken').val(data.pageToken);
                    processing = false;
                });
            } 
        }		
	});
});
<!--HANDLING FORM ACTIONS-->
jQuery(document).ready(function(){
	jQuery('#custom_title').click(function(){
        if(jQuery(this).prop("checked") == true){
            jQuery('.model-body-title-input').show();
			jQuery('input#custom_title_text').prop('required',true);
        }
        else if(jQuery(this).prop("checked") == false){
            jQuery('.model-body-title-input').hide();
			jQuery('input#custom_title_text').val('');
			jQuery('input#custom_title_text').prop('required',false);
        }
    });	
	jQuery('#twitter').click(function(){
        if(jQuery(this).prop("checked") == true){
            jQuery('.model-body-Twitter-select').show();
        }
        else if(jQuery(this).prop("checked") == false){
            jQuery('.model-body-Twitter-select').hide();            
            jQuery('.model-body-Twitter-checkbox').prop('checked', false);
        }
    });	
	jQuery('#pinterest').click(function(){
        if(jQuery(this).prop("checked") == true){
            jQuery('.model-body-Pinterest-select').show();
        }
        else if(jQuery(this).prop("checked") == false){
            jQuery('.model-body-Pinterest-select').hide();            
            jQuery('.model-body-Pinterest-checkbox').prop('checked', false);
        }
    });   
});
<!--HANDLING FORM ACTIONS-->
jQuery(document).on('click','.addvideo',function(){
    var title = jQuery(this).attr('videotitle');
    var image = jQuery(this).attr('videoimage');
    var description = jQuery(this).attr('videodescription');
    var url = jQuery(this).attr('videourl');
    jQuery('#videotitle').val(title);
    jQuery('#videodescription').val(description);
    jQuery('#videourl').val(url);
    jQuery('#videoimage').val(image);
    jQuery('#vio_myPost').modal('show');    
});
jQuery(document).on('click','.previewvideo',function(){
    var links =jQuery(this).attr('videolink');
    var videotitle = jQuery(this).attr('videotitle');
    jQuery('#videoiframe').attr('src',links);
    jQuery('#myModalLabelPreview').text(videotitle);
    jQuery('#vio_myModal').modal('show');
});
jQuery(document).on("submit", "form#vio_addPost", function (e) {
    jQuery('#post_video_submit').hide();
    jQuery('#post_video_image').show();    
    var form_data = jQuery(this).serialize();
    jQuery.post(ajaxurl, form_data, function(response) {  
        jQuery('#post_video_submit').show();
        jQuery('#post_video_image').hide(); 
        var data = jQuery.parseJSON(response);
        if(data.success=='1'){
            jQuery('form#vio_addPost')[0].reset();
            jQuery('.model-body-title-input').hide();
            jQuery('#vio_myPost').modal('hide');
            swal(
                'Success!!!',
                data.message,
                'success'
            )
        }else{
            swal(
                'Oops...',
                data.message,
                'error'
            )
        }
    });
    e.preventDefault();
});
jQuery(document).on('click','.addimage',function(){
    var image_url = jQuery(this).attr('image_url');
    jQuery('#post_image_url').val(image_url);
    jQuery('#vio_myPost_image').modal('show');    
});
jQuery(document).on("submit", "form#vio_addPost_image", function (e) {
    jQuery('#post_image_submit').hide();
    jQuery('#post_image_image').show();
    var form_data = jQuery(this).serialize();
    jQuery.post(ajaxurl, form_data, function(response) {
        jQuery('#post_image_submit').show();
        jQuery('#post_image_image').hide(); 
        var data = jQuery.parseJSON(response);
        if(data.success=='1'){
            jQuery('form#vio_addPost_image')[0].reset();
            jQuery('#vio_myPost_image').modal('hide');
            swal(
                'Success!!!',
                data.message,
                'success'
            )
        }else{
            swal(
                'Oops...',
                data.message,
                'error'
            )
        } 
    });
    e.preventDefault();
});
jQuery(document).ready(function(){
    jQuery('#vio_datatable').DataTable({
        "lengthMenu": [[20, 50, 100, 500, 1000, -1], [20, 50, 100, 500, 1000, "All"]]
    });
});