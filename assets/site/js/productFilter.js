
let url = window.location.search;
function getParameterByName(name) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}


function setCatSub(cat,subcat){
	$("#parentCat").val(cat);
	$("#subCat").val(subcat);
	$('#pageNumber').val(1);
	filter();
}

$(document).ready(function(){
	$(".colors").on('click',function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		let dv = $(this).attr('data-value');
		let chk = $("#color"+dv);
		if(chk.is(':checked')) {
			chk.prop("checked", false);
		}else{
			chk.prop("checked", true);
		}
		$('#pageNumber').val(1);
		filter();
	});

	
	var page = getParameterByName('page');
	if(page){
		filter('page='+page);
	}else{
		filter();
	}
});

$(document).on("click", ".pagination li", function(event){
	event.preventDefault();
	var page = $(this).attr("p");
	if(page){
		$('#pageNumber').val(page);
		filter('page='+page);
	}
	
});

function clearAll(){
	$("input[name='colors[]']").each(function () {
        $(this).attr('checked',false);
	});

	$(".colors").each(function () {
        $(this).removeClass('active');
	});
	$("input[name='price']").attr('checked',false);
	$('#pageNumber').val(1);
	filter();
}

function filter(extinfo = ''){
	if ($(window).width() > 991) {
		$(".collection-wrapper").css("opacity","0.2");
		
	}else {
		$(".collection-product-wrapper").css("opacity","0.2");
	}

	$("#filterFrm").serialize();
	var data = $("#filterFrm").serialize();
	var urlArray = new Array();
    if ($("input[name='q']").val() != "") {
        urlArray.push("q=" + $("input[name='q']").val());
	}
	
	if ($("#parentCat").val() != "") {
        urlArray.push("parentCat=" + $("#parentCat").val());
    }

	if ($("#subCat").val() != "") {
        urlArray.push("subCat=" + $("#subCat").val());
	}
	
	var filterArr = [];
	var colors = new Array();
    $("input[name='colors[]']:checked").each(function () {
		colors.push(this.value);
		filterArr.push(this.value);
    });

    if (colors.length > 0) {
        urlArray.push("colors=" + colors);
    }


    if ($("input[name='price']:checked").length>0) {
		urlArray.push("price=" + $("input[name='price']:checked").val());
		filterArr.push(this.value);
	}
	
    if (extinfo != "") {
        urlArray.push(extinfo);
	}
	
	if (filterArr.length > 0) {
		$("#clearBtn").show();
	}else{
		$("#clearBtn").hide();
	}


    urldata = '';
    if (urlArray.length > 0) {
		urldata = "?" + urlArray.join("&");
	}

	history.pushState("", "", site_url+"shop" + urldata);
	$.ajax({
        type: "get",
        data: data,
        url: `${site_url}Site/Product/getFilterProduct`,
        success: function (result) {
			let data = JSON.parse(result);
			if(data.status){
				setTimeout(function(){
					$("#productResult").html(data.productHtml);
					if(data.totalProducts>data.perPage){
					   $("#pageHtml").html(data.pageHtml);
					   $("#pageInfo").html(`Showing Products
					   ${data.pageStart} - ${data.pageEnd} of ${data.totalProducts} Results`);
					   $("#pageDiv").show();
					}else{
						$("#pageDiv").hide();
					} 
					$(".collection-wrapper, .collection-product-wrapper").css("opacity","1");
				}, 1500);

			}else{
				setTimeout(function(){
					let html = "<div class='text-center'><h4>No matching product found</h4></div>";
					$("#productResult").html(html);
					$("#pageDiv").hide();
					$(".collection-wrapper, .collection-product-wrapper").css("opacity","1");
				}, 1500);
			}
			
		},
		error: function (request, status, error) {
			console.log(error);
			$("input[name='colors[]']").each(function () {
				$(this).prop('checked',false);
			});
		
			$(".colors").each(function () {
				$(this).removeClass('active');
			});
			$("input[name='price']").prop('checked',false);
			
			setTimeout(function(){
				$("#pageDiv").hide();
				$(".collection-wrapper, .collection-product-wrapper").css("opacity","1");
			}, 1500);
		}

    });
	
	
	
}

