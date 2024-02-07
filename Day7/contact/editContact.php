<?php 
  require('backend.php');

  include("header.php");

  if(!isset($_GET["id"])) echo "<script> document.location.href = 'index.php';</script>";
  else $id = $_GET["id"];
  
  $contactOldValue = $contact->getContact($id)[0];

  if (isset($_POST["submit"])) {
    if ($contact->updateContact($_POST) > 0) {
        echo "
        <script>
          alert('Data successfully updated');
          document.location.href = 'index.php';
        </script>
      ";
    } else {
        echo "
        <script>
          alert('Failed to update the data');
          document.location.href = 'index.php';
        </script>
      ";
    }
}
  
?>

<?php 
  include("section/_editContact.php")
?>

<?php 
  include("footer.php")
?>
