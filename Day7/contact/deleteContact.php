<?php
  require('backend.php');

  if(!isset($_GET["id"])) echo "<script> document.location.href = 'index.php';</script>";
  
  if ($contact->deleteContact($_GET) > 0) {
      echo "
      <script>
        alert('Data successfully deleted');
        document.location.href = 'index.php';
      </script>
    ";
  } else {
      echo "
      <script>
        alert('Failed to delete the data');
        document.location.href = 'index.php';
      </script>
    ";
  }

?>
