<?php 

session_start();

//cek apakah udah login
if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'backend.php';

$id = $_GET["id"];

$blog_post = getData("SELECT * FROM blog_posts WHERE id=$id")[0];

if(isset($_POST["submit"])) {
  if(editData($_POST) > 0){
  echo "
    <script>
      alert('Data successfully changed');
      document.location.href = 'index.php';
    </script>
  ";
  }
  else{
  echo "
    <script>
      alert('Failed to change the data');
      document.location.href = 'index.php';
    </script>
  ";
  }
}

  include("header.php");
?>

<?php 
  include("section/_admin_edit_blog.php")
?>

<?php 
  include("footer.php")
?>
