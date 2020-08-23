function preview_image(input, imageId,ImageId2=NULL) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('#' + imageId).attr('src', e.target.result);
        $('#' + ImageId2).attr('src', e.target.result);
        $('#' + imageId).show();
      }
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
$(document).on('change','#category',function(){
	var cat_id=$(this).val();

	$.ajax({
		url:site_url+'admin/get-subcategory',
		type:"POST",
		data:{'cat_id':cat_id},
		success:function(data){
			$('.subcategory').html(data);
			
		}
	});
	return false;
});

