<?php
header("X-XSS-Protection: 0");
include_once"functions.php";
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
               

                <?php 
                    $name = $email = $checked = '';
                    $nameErr = '';
                    

                    if (empty($_REQUEST['name'])) {
                        $nameErr = "Name is required";
                       
                    } else{
                        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
                    }

                    

                    if(isset($_REQUEST['chb1']) && $_REQUEST['chb1'] == "Yes") {
                      $checked = "checked"; 
                    }

                   /* if (isset($_POST['furts']) && $_POST['furts'] != '') {
                        printf("You have select: %s", filter_input(INPUT_POST, 'furts', FILTER_SANITIZE_SPECIAL_CHARS));
                    }*/

                    // This logic only work for php7 or upper 
                    //$sfurts = $_POST['furts'] ?? array();
                    //$sfurts = isset($_POST['furts']) ? $_POST['furts'] : array();
                    $sfurts = filter_input(INPUT_POST, 'furts', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);



                    if ( count($sfurts) > 0 ) {
                        echo "You have selected furts:".join(', ', $sfurts);
                    }


                ?>
            
                

                <form method="post" >
                    <div>
                        <label for="name">Name*</label>
                        <input type="text" name="name" id="name" value="<?php echo $name; ?>" >
                        <span class="requred"><?php echo $nameErr; ?></span>

                    </div>
                    

                    <div>
                        <label for="email">Email*</label>
                        <input type="text" name="email" id="email">
                    </div>

                    <div>
                        <label for="website">Website</label>
                        <input type="text" name="website" id="website">
                    </div>
                    
                    <div>
                        <label for="gender">Gender*</label>
                        <input type="radio" name="gender" value="Male">Male
                        <input type="radio" name="gender" value="Femal">Female
                        <input type="radio" name="gender" value="Other">Other
                    </div>
                    
                    <div>
                        <input type="checkbox" name="chb1" id="chb1" value="Yes" <?php echo $checked; ?> >
                        <label class="label-inline" for="chb1">Yes</label>
                    </div>

                    <div>
                        <p><strong>Select you fevioret bike</strong></p>

                        <input type="checkbox" name="bikes[]" id="susuki" value="Suzuki" <?php echo isBikeChecked('Suzuki'); ?>>
                        <label class="label-inline" for="suzuki">Suzuli</label><br>
                        <input type="checkbox" name="bikes[]" id="yehaamaha" value="Yehaamaha" <?php echo isBikeChecked('Yehaamaha'); ?>>
                        <label class="label-inline" for="yehaamaha">Yahamaha</label><br>
                        <input type="checkbox" name="bikes[]" id="palsur" value="Palsur" <?php echo isBikeChecked('Palsur'); ?>>
                        <label class="label-inline" for="palsur">Palsur</label><br>
                        <input type="checkbox" name="bikes[]" id="tvs" value="TVS" <?php echo isBikeChecked('TVS'); ?>>
                        <label class="label-inline" for="tvs">TVS</label>
                    </div>


                    <?php
                        $furts = array('Mango', 'COCONUT', 'gowava', 'Orange');
                    ?>


                    <div>
                        <label for="furts">Your fev furts</label>
                        <select name="furts[]" id="furts" multiple style="height:100px;" >
                            <option value="" disabled selected >Select a furt</option>

                            <?php 
                                selectOptions($furts, $sfurts);
                            ?>
                        </select>
                    </div>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>