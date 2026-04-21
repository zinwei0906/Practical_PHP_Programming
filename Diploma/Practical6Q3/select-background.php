<!DOCTYPE html>
<!--
Author : TAN ZIN WEI
-->
<html>
    <body>
        <h2>Select you favorite background image : </h2>
        <?php
        if(isset($_GET['image'])){
            if($_GET['image']==0){
                setcookie("backgroundImage",null,time()-999999999);

            }
            else{
                setcookie("backgroundImage",$_GET['image'],time()+60*60);
            }
            
            header("location:homepage.php");
        }
        
        for($number=1;$number<5;$number++){
            echo "<a href='?image=$number' ><img src='image/small/image$number.jpg ' width=200px height=100px /></a> ";
        }
        ?>
        <p>I <a href="?image=0">don't want</a> a background image.</p>
    </body>
</html>