<?php
header("X-XSS-Protection: 0");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h1>Welcome</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus incidunt quas ex numquam earum eligendi quo soluta? Eaque adipisci aperiam commodi alias repudiandae quaerat atque, quae sit, veritatis error doloribus?</p>
            </div>
        </div>
        <div class="row">
            <div class="column column-60 column-offset-20">
                <?php if(isset($_GET['fname']) && !empty($_GET['fname'])): ?>
                    First Name: <?php echo $_GET['fname']; ?>
                <?php endif; ?>
                <?php if(isset($_GET['lname']) && !empty($_GET['lname'])): ?>
                    Last Name: <?php echo $_GET['lname']; ?>
                <?php endif; ?>

                <form action="GET">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname">

                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname">

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>