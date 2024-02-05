<?php 

  session_start();
  require 'backend.php';

  $id = $_GET["id"];
  $query = "
  SELECT BP.id, BP.title, BP.body, BP.image, U.username, BC.name as category
  FROM blog_posts AS BP 
  INNER JOIN users AS U ON BP.user_id = U.id
  INNER JOIN blog_categories AS BC ON BP.category_id = BC.id
  WHERE BP.id=$id;
  ";

  $blog_post = getData($query)[0];
  include("header.php");
?>

<?php 
  include("section/_blog_detail.php")
?>

<?php 
  include("footer.php")
?>
