<?php 
session_start();

if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}

require('backend.php');

if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

	//cek username
	if(mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"]) ) {
			//set session
			$_SESSION["login"] = true;
			$_SESSION["user_id"] = $row["id"];

			header("Location: index.php");
			exit;
		}
	}

	echo "<script>
          alert('Wrong username/password');
        </script>";
}

?>

<?php 
  include("section/_login.php")
?>

<?php 
  include("footer.php")
?>
