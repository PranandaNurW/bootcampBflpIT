<?php 
  session_start();

  if (!isset($_SESSION["login"])) {
      header("Location: login.php");
      exit;
  }
  require('backend.php');

  $user_id = $_SESSION["user_id"];

  $query = "
  SELECT BP.id, BP.title
  FROM blog_posts AS BP
  INNER JOIN users AS U ON BP.user_id = U.id
  WHERE U.id = $user_id
  ";
  $blog_posts = getData($query);

  include("header.php");
?>

<?php 
  include("section/_admin_blog.php")
?>

<?php 
  include("footer.php")
?>
