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
    <!-- This is a comment for testing git pull command! -->
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

                    if (isset($_FILES['photo'])) {
                        $allow_types = array(
                            'image/png',
                            'image/jpg',
                            'image/jpeg',
                            'image/gif'
                        );

                        $photos = $_FILES['photo'];

                        //var_dump($photos);

                        $count = count($_FILES['photo']['name']);

                        for ($i=0; $i < $count; $i++) { 

                            $tmp_name = $_FILES['photo']['tmp_name'][$i];
                            //var_dump($tmp_name);
                            $name = $_FILES['photo']['name'][$i];
                            $type = $_FILES['photo']['type'][$i];
                            $size = $_FILES['photo']['size'][$i];


                                if ($size < 1024*1024*2) {
                                    move_uploaded_file($tmp_name,  "uploads/$name"); 

                                } else {
                                    echo "The file size is too big";
                                }                        
                        }
                            

                           
                            

                    

                        
                    }

                  /*  if (isset($_FILES['photo2'])) {
                        $allow_types_2 = array(
                            'image/png',
                            'image/jpg',
                            'image/jpeg',
                            'image/gif'
                        );

                        $tmp_name_2 = $_FILES['photo2']['tmp_name'];
                        $name_2 = $_FILES['photo2']['name'];
                        $type_2 = $_FILES['photo2']['type'];
                        $size_2 = $_FILES['photo2']['size'];

                        if (in_array($type_2, $allow_types_2)) {
                            if ($size_2 < 1024*1024*2) {
                                move_uploaded_file($tmp_name_2,  "uploads/$name_2"); 

                            } else {
                                echo "The file size is too big";
                            }                        
                        } else {
                            echo "We don't allow {$type_2} file type";
                        }

                        
                    }
*/

                   
                            


                    
                    
                   
                
                    ?>
                
                

                <form method="post" enctype="multipart/form-data" >
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname">

                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname">
                    
                    <label for="photo">Photo</label>
                    <input type="file" name="photo[]" id="photo" multiple>
                    
                    <label for="photo2">Photo2</label>
                    <input type="file" name="photo2" id="photo2">

                    <button type="submit"  value='abs'>Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
