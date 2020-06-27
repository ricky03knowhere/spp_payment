<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="../asset/css/bootstrap.css" rel="stylesheet">
<title>Untitled Document</title>
</head>

<body>
</body>
<script src="../asset/js/sweetalert2.all.min.js"></script>
<script>
Swal.fire({
	title: 'Success',
	text: 'Data Berhasil Diubah...',
	type: 'success'
}).then((result) => { 
		if (result.value) { 
			document.location.href ="../admin/list_masakan.php"
		}else{
			document.location.href ="../admin/list_masakan.php"
		}
})
</script>
</html>