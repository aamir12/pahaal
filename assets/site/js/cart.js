function addToCart(pid,pOption){
  if(pOption.trim() != ''){
	window.location.href = `${site_url}shop_detail/${pid}`;
  }else{
	 $.ajax({
		 type:'post',
		 url:`${site_url}/Site/cart/addToCart`,
		 data:{pid:pid},
		 success:function(response){
			let data = JSON.parse(response);
			console.log(JSON.stringify(data,null,2))
		 },
		 error:function (request, status, error){

		 }
	 })
  }
}
