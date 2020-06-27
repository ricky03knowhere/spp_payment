$("#sidebarToggleTop").on("click",() => {
	
$("#sidebarToggleTop i").toggleClass("fa-angle-double-right")	
$("#sidebarToggleTop i").toggleClass("fa-times")	

})

$('.delete').on('click',function (e){
	
	e.preventDefault();
	const href =$(this).attr('href');
	
	Swal.fire({ 
		title: 'Yakin...???', 
		text: "Data ini akan dihapus", 
		type: 'warning', 
		showCancelButton: true, 
		confirmButtonColor: '#1CC88A', 
		cancelButtonColor: '#3A3B45', 
		confirmButtonText: 'Delete' 
		}).then((result) => { 
			if (result.value) { 
				document.location.href = href;
			 } 
		})	
})

$('.logout').on('click',function (e){
	
	e.preventDefault();
	const href =$(this).attr('href');
	
	Swal.fire({ 
		title: 'Yakin...???', 
		text: "Anda ingin keluar?", 
		type: 'warning', 
		showCancelButton: true, 
		confirmButtonColor: '#1CC88A', 
		cancelButtonColor: '#3A3B45', 
		confirmButtonText: 'Logout' 
		}).then((result) => { 
			if (result.value) { 
				document.location.href = href;
			 } 
		})	
})

let notif = $('.notification').data('notif');

let link = $('.notification').data('link');

if(notif){
Swal.fire({
	title: 'Success',
	text: 'Data Berhasil '+notif,
	type: 'success',
	confirmButtonColor:'#1CC88A'
}).then((result) => { 
		if (result.value) { 
			notif = ""
			document.location.href = "index.php?url="+link;
		}else{
			notif = ""
			document.location.href = "index.php?url="+link;
	}
})

}