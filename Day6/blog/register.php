<?php 
  session_start();

  if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
  }
  require("backend.php");

  if (isset($_POST["register"]) ) {
    if(register($_POST) > 0) {
      echo "<script>
          alert('User successfully registered');
        </script>";
    } else {
      echo mysqli_error($db);
    }
  }
?>

<?php 
  include("section/_register.php")
?>

<?php 
  include("footer.php")
?>
