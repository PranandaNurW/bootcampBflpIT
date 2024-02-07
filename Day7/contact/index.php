<?php 
  require('backend.php');

  include("header.php");
  
  if (isset($_GET["search"])) $contactViews = $contact->searchContact($_GET["search"]);
  else if (isset($_GET["sort"])) $contactViews = $contact->orderByContact($_GET["sort"]);
  else $contactViews = $contact->getContacts();
?>

<?php 
  include("section/_listContact.php")
?>

<?php 
  include("footer.php")
?>
