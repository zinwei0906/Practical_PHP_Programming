<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>P3Q4 Email</title>
        <style>
            .link {
                margin-left: 15%;
                background-color: skyblue;
                color: white;
                padding: 1em 1.5em;
                text-decoration: none;
                text-transform: uppercase;
            }

            .link:hover {
                cursor: pointer;
                color: white;
                background-color: #555;
            }
        </style>
    </head>
    <body>
        <br/><br/><br/>
        <a class="link" href="../index.php">Home Page</a>
        <br/><br/><br/>
        <?php
        require_once './AbstractDecorator.php';
        require_once './DisclaimerDecorator.php';
        require_once './SecureEmailDecorator.php';
        require_once './Email.php';
//        sql_autoload_register(function ($class_name) {
//            include $class_name . '.php';
//        });

        $email = new Email("abc123@gmail.com", "xyz789@gmail.com", "Happy Birthday");
        $disc = new DisclaimerDecorator($email);
        $sec = new SecureEmailDecorator($email);

        echo "Original Message : " . $email->getContent() . "<br/>";
        echo "Original Message (DisclaimerDecorator): " . $disc->getContent() . "<br/>";
        echo "Original Message (Secure): " . $sec->getContent() . "<br/>";
        ?>
    </body>
</html>
