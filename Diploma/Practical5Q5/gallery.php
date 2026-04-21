<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if(isset($_POST['delete'])){
            if(isset($_GET['image'])){
                $deleteImage=$_GET['image'];
                $path="images/$deleteImage";
                unlink($path);
            }
        }
        ?>
        <h1>Image Gallery</h1>
        <?php
        
        echo "<table styple='width:50%'><tr><td><ul>";
        $ListImage = glob("images/*.{jpg,jpeg,gif,png}", GLOB_BRACE);
        foreach ($ListImage as $file) {
            $basename = pathinfo($file, PATHINFO_BASENAME);
            //printf('<li><a href="?images=%s" alt="">%s</a></li>', $basename, $basename);
            echo "<li><a href='?image=$basename' alt=''>$basename</a></li>";
        }
        echo "</ul></td></tr></table>";
        
        if(isset($_GET['image'])){
            $image=$_GET['image'];
            echo "<img height='200' width='200' src='images/$image'  ";
        }
        echo "<br/><br/>[\t<a href='upload.php'>Upload Image</a>\t]";
        ?>
        <form action="" method="post">
            <input type='submit' name='delete' value='Delete'/>
        </form>
    </body>
</html>
