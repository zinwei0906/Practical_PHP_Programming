<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <body>
        <h1>Upload Image</h1>
        <?php
        if (isset($_FILES['image'])) {
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            $extensions = array("jpeg", "jpg", "png","gif");

            if (in_array($file_ext, $extensions) === false) {
                $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 1048576) {
                $errors[] = 'File size must be excately 1 MB';
            }


            if (empty($errors) == true) {
                $savefilename = uniqid() . '.' . $file_ext;
                move_uploaded_file($file_tmp, "images/" . $savefilename);
                echo "<table style='height:60px; width:600px;background-color:skyblue'><tr><td style='font-size:20px'>";
                echo "Image upload successfully .It is saved as [$savefilename]";
                echo "</table>";
            } 
            else {
                echo "<table style='background-color:pink'><tr><td><ul>";
                foreach ($errors as $value) {
                    echo "<li>$value</li>";
                }
                echo "</ul></td></tr></table>";
            }
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" id="image" accept="image/*"/>
            <br/><br/><input type="submit" value="Upload"/><br/><br/>
        </form>
        <?php
        echo "[\t<a href='gallery.php'>Image Gallery</a>\t]";
        ?>
    </body>
</html>