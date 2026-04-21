<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Rest API Client Side Demo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <div class="container">
            <h2>(REST)Loan Web Service Client</h2>
            <form class="form-inline" action="" method="POST">
                <div class="form-group">
                    <h2>
                        <label for="name">Loan amount : RM </label>
                        <input type="text" name="loanAmount" class="form-control"  placeholder="Enter Loan Amount"/>
                        <br/>
                        <label for="name">Loan duration : </label>
                        <input type="text" name="numberOfYears" class="form-control"  placeholder="Enter Loan Amount"/>
                        <br/>
                        <label for="name">Interest Rate : </label>
                        <input type="text" name="annualInterestRate" class="form-control"  placeholder="Enter Loan Amount"/>
                    </h2>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
            </form>
            <p>&nbsp;</p>
            <h3>
                <?php
                if (isset($_POST['submit'])) {
                    $amount = $_POST['loanAmount'];
                    $duration = $_POST['numberOfYears'];
                    $rate = $_POST['annualInterestRate'];

                    $url = "http://localhost/Practical(IP)/P5Q1/LoanRESTService.php?amount="
                            . $amount . "&duration=" . $duration . "&rate=" . $rate;

                    $client = curl_init($url);
                    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($client);

                    $result = json_decode($response);

                    echo "<h1>Monthly Payment : " . $result->monthlyPayment;
                    echo "<br/>Total Payment : " . $result->totalPayment;
                }
                ?>
            </h3>
        </div>
    </body>
</html>