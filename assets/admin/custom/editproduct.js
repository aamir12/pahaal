if($('#option a').length>0){
	$('#option a:first').tab('show');
}
var option_row = parseInt($("#option_row").val());
function optionchange(val){
	if(val==""){
	  return ;
	}
	var check = 0;
	$("input[name='ak_pre_optionid[]']").each(function(){
		if(val == $(this).val()){    
			check = 1;
		}
	});
	
	if(check ==1){
	  return;
	}
	//already exist
	$.ajax({
	type: "POST",
	url: site_url+"Admin/Options/getOptions",
	data: {"optionid":val},
	success: function(data){
		item = JSON.parse(data);
		html  = '<div class="tab-pane" id="tab-option' + option_row + '">';
		html += ' <input type="hidden" name="product_option[' + option_row + '][product_option_id]" value="" />';
		html += ' <input type="hidden" name="product_option[' + option_row + '][name]" value="' + item['label'] + '" />';
		html += ' <input type="hidden" name="product_option[' + option_row + '][option_id]" value="' + item['value'] + '" />';
		html += ' <input type="hidden" name="ak_pre_optionid[]" value="' + val + '" />';
		html += ' <input type="hidden" name="product_option[' + option_row + '][type]" value="' + item['type'] + '" />';
		// html += ' <div class="form-group">';
		// html += '   <label class="col-sm-2 control-label" for="input-required' + option_row + '"> Requried</label>';
		// html += '   <div class="col-sm-10"><select name="product_option[' + option_row + '][required]" id="input-required' + option_row + '" class="form-control">';
		// html += '       <option value="1">{{ text_yes }}</option>';
		// html += '       <option value="0">{{ text_no }}</option>';
		// html += '   </select></div>';
		// html += ' </div>';
		
		if (item['type'] == 'select' || item['type'] == 'radio' || item['type'] == 'checkbox' ) {
			html += '<div class="table-responsive">';
			html += '  <table id="option-value' + option_row + '" class="table table-striped table-bordered table-hover">';
			html += '    <thead>';
			html += '      <tr class="active">';
			html += '        <th class="text-left">Option Value</th>';
			html += '        <th class="text-right">Quantity</th>';
			// html += '        <td class="text-left">{{ entry_subtract }}</td>';
			html += '        <th class="text-right">Price</th>';
			// html += '        <td class="text-right">{{ entry_option_points }}</td>';
			// html += '        <td class="text-right">{{ entry_weight }}</td>';
			html += '        <th class="w50px"></th>';
			html += '      </tr>';
			html += '    </thead>';
			html += '    <tbody>';
			html += '    </tbody>';
			html += '    <tfoot>';
			html += '      <tr>';
			html += '        <td colspan="3"></td>';
			html += '        <td class="text-left"><button type="button" onclick="addOptionValue(' + option_row + ');"  class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>';
			html += '      </tr>';
			html += '    </tfoot>';
			html += '  </table>';
			html += '</div>';
			
			html += '  <select id="option-values' + option_row + '" style="display: none;">';
			
			for (i = 0; i < item['option_value'].length; i++) {
			html += '  <option value="' + item['option_value'][i]['id'] + '">' + item['option_value'][i]['optionKey'] + '</option>';
			}
			
			html += '  </select>';
			html += '</div>';
		}
	
		$('#productOptions .tab-content').append(html);
		$('#option > li:last-child').before('<li><a href="#tab-option' + option_row + '" data-toggle="tab"><i class="fa fa-minus-circle" onclick=" $(\'#option a:first\').tab(\'show\');$(\'a[href=\\\'#tab-option' + option_row + '\\\']\').parent().remove(); $(\'#tab-option' + option_row + '\').remove();"></i>' + item['label'] + '</li>');
		$('#option a[href=\'#tab-option' + option_row + '\']').tab('show');
		option_row++;
		} ///end of success 
	}); //end of ajax
}  
             
             
var option_value_row = parseInt($("#option_value_row").val());
function addOptionValue(option_row){
	html  = '<tr id="option-value-row' + option_value_row + '">';
	html += '  <td class="text-left"><select name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][option_value_id]" class="form-control">';
	html += $('#option-values' + option_row).html();
	html += '  </select><input type="hidden" name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][product_option_value_id]" value="" /></td>';
	html += '  <td class="text-right"><input type="text" name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][quantity]" value="" placeholder="Quantity" class="form-control" /></td>';
	html += ' <td  class="text-right"> <input type="text" name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][price]" value="" placeholder="Price" class="form-control" /></td>';
	html += '  <td class="text-left"><button type="button" onclick="$(\'#option-value-row' + option_value_row + '\').remove();"   class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
	html += '</tr>';
	$('#option-value' + option_row + ' tbody').append(html);
	option_value_row++;
}


function deleteOption(optionnumber){
	var tab_option = "#tab-option"+optionnumber;
	$('a[href=\''+tab_option+'\']').parent().remove(); 
	$(tab_option).remove(); 
	$('#option a:first').tab('show');
}


function deleteOptionValue(optionvaluerow){
	var option_value_row = "#option-value-row"+optionvaluerow;
	$(option_value_row).remove();
}


// Swal.fire({
// 	title: 'Are you sure?',
// 	text: "You want to delete product option, You won't be able to revert this!",
// 	type: 'warning',
// 	showCancelButton: true,
// 	confirmButtonColor: '#3085d6',
// 	cancelButtonColor: '#d33',
// 	confirmButtonText: 'Yes, delete it!'
// }).then((result) => {
// 	if (result.value) {
// 		$.ajax({
// 			type:"POST",
// 			url:"ajxadmin.php",
// 			url: site_url+"Admin/Products/deleteProductOption",
// 			data:{'product_id':product_id, 'product_option_id':product_option_id },
// 			success:function(data){
// 				    console.log(data);
// 						if(data=='1'){
// 								var tab_option = "#tab-option"+optionnumber;
// 								$('a[href=\''+tab_option+'\']').parent().remove(); 
// 								$(tab_option).remove(); 
// 								$('#option a:first').tab('show');
// 								Swal.fire(
// 									'Deleted!',
// 									'Product option deleted.',
// 									'success'
// 								)
// 						}
// 			}
// 		});
// 	}
// });
