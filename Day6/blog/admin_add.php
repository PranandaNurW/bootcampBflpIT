<?php 
  session_start();

  if (!isset($_SESSION["login"])) {
      header("Location: login.php");
      exit;
  }

  require 'backend.php';

  if (isset($_POST["submit"])) {
    print_r("data masuk"); 
    if(setData($_POST) > 0) {
      echo "
        <script>
          alert('Data successfully added');
          document.location.href = 'index.php';
        </script>
      ";
    } else {
      echo "
        <script>
          alert('Failed to add the data');
          document.location.href = 'index.php';
        </script>
      ";
    }
  }

  include("header.php");
?>

<?php 
  include("section/_admin_add_blog.php")
?>

<?php 
  include("footer.php")
?>
