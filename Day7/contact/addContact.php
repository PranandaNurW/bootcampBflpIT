<?php
require('backend.php');

include("header.php");

if (isset($_POST["submit"])) {
    if ($contact->setContact($_POST) > 0) {
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
?>

<?php
include("section/_addContact.php")
?>

<?php
include("footer.php")
?>
