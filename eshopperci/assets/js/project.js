$(document).ready(function(){
    if(localStorage.cartcnt){
    	$(".cartcnt").html(localStorage.cartcnt)
    }
    else{
    	$(".cartcnt").html(0)
    }
	//console.log(curl)
	$.get(curl+"get_categories",function(data,status){
		//console.log(status)
		if(status=="success"){
			console.log(JSON.parse(data))
		}
	});

	$.get(curl+"get_brands",function(data,status){
		console.log(data)
		if(status=="success"){
			$(".brands_data").html(data)
			// onsole.log(JSON.parse(data))
			// var str=""
			// $.each(JSON.parse(data),function(key,val){
			// 	console.log(val)
			// 	str = str + "<li><a href='#'>"+val.br_name+"</a></li>";
			// });
			// //console.log(str)
			// $(".brands_data").html(str)
		}
	});


	$.get(curl+"get_products",function(data,status){
		//console.log(status)
		if(status=="success"){
           console.log(data)
            $(".features_items").html(data)
		}

	});

	$(document).on("click",".br_data",function(aobj){
		aobj.preventDefault();
		var id = $(this).attr("for")
		alert(id);
		//alert("brid="+id)
		$.ajax({
			type:"post",
			data:"brid="+id,
			url:curl+"get_products_brandwise",
			success:function(response){
				// alert(response)
				console.log(response)
				$(".features_items").html(response)
			}
		})
	})
	$(document).on("click",".add-to-cart",function(aobj){
		aobj.preventDefault();
		id = $(this).attr("for")
		//alert(id);
		//alert("brid="+id)
		$.ajax({
			type:"post",
			data:"proid="+id,
			url:curl+"cart",
			success:function(response){
				//alert(response)
				console.log(response)
				rans = response.split("#")
				$(".cartcnt").html(rans[0])
				localStorage.cartcnt = rans[0];
				alert(rans[1])
				//$(".features_items").html(response)
			}
		});
	});

	/// check cart//
	$.get(curl+"get_cart_products",function(data,status){
		console.log(status)
		if(status=="success"){
			// console.log(data)
			$(".cart_items").html(data)
		}
	});
	/// check cart//

});