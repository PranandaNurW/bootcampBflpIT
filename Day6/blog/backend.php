<?php
require("db.php");

function register($data) {
    global $db;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $repassword = mysqli_real_escape_string($db, $data["repassword"]);

    $result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script> 
					alert('Username already used');
					</script>";
        return false;
    }

    if ($password !== $repassword) {
        echo "<script>
                    alert('Re-type password doesn't match');
					</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($db, "INSERT INTO users VALUES('', '$username', '', '$password', '', '', '', null,'')");

    return mysqli_affected_rows($db);
}

function getData($query) {
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function setData($data) {
    global $db;

    $title = htmlspecialchars($data["blog-title"]);
    $body = htmlspecialchars($data["blog-body"]);
    $user_id = $_SESSION["user_id"] ?? 1;
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $title);
    $excerpt = wordwrap(substr($body, 0, 20), 19, '...');

    $image = uploadImage();
    if(!$image) return false;

    $query = "INSERT INTO blog_posts VALUES 
			('', '1', '$user_id', '$title','$slug', '$excerpt', '$body', '$image', '', null)";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function uploadImage() {
    $filename = $_FILES['blog-image']['name'];
    $filesize = $_FILES['blog-image']['size'];
    $error = $_FILES['blog-image']['error'];
    $tmpName = $_FILES['blog-image']['tmp_name'];

    if($error === 4){
        echo "<script> 
                alert('Choose an image first');
            </script>";
        return false;
    }

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $filename);
    $imageExtension = strtolower(end($imageExtension));

    if(!in_array($imageExtension, $validImageExtension)){
        echo "<script> 
                alert('Upload an image! (jpg, jpeg, png)');
            </script>";
        return false;
    }

    if ($filesize > 1000000) {
        echo "<script> 
                alert('Image size is too big!');
            </script>";
        return false;
    }

    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $imageExtension;

    move_uploaded_file($tmpName, "img/" . $newFileName);
    return "img/" . $newFileName;
}

function deleteData($id){
    global $db;
    mysqli_query($db, "DELETE FROM blog_posts WHERE id = $id");

    return mysqli_affected_rows($db);
}

function editData($data){
    global $db;

    $id = $data["blog-id"];
    $title = htmlspecialchars($data["blog-title"]);
    $body = htmlspecialchars($data["blog-body"]);
    $old_image = htmlspecialchars($data["old-image"]);
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $title);
    $excerpt = wordwrap(substr($body, 0, 20), 19, '...');

    if( $_FILES["blog-image"]["error"] === 4) {
        $image = $old_image;
    }
    else {
        $image = uploadImage();
    }

    $query = "UPDATE blog_posts SET 
                title = '$title',
                body = '$body',
                slug = '$slug',
                excerpt = '$excerpt',
                image = '$image'
            WHERE id = $id
            ";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}