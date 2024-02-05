<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
    
require 'backend.php';

$id = $_GET["id"];

if(deleteData($id) > 0){
	echo "
			<script>
				alert('Data successfully deleted');
				document.location.href = 'index.php';
			</script>
		";
}
else {
	echo "
			<script>
				alert('Data failed to delete');
				document.location.href = 'index.php';
			</script>
		";
}
?>