<?php 
  session_start();

  require('backend.php');

  $query = "
  SELECT BP.id, BP.title, BP.excerpt, BP.image, U.username, BC.name as category
  FROM blog_posts AS BP 
  LEFT JOIN users AS U ON BP.user_id = U.id
  INNER JOIN blog_categories AS BC ON BP.category_id = BC.id;
  ";
  $blog_posts = getData($query);


  include("header.php");
?>

<?php 
  include("section/_blog.php")
?>

<?php 
  include("footer.php")
?>
