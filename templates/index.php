<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Course PHP -  Task 1</title>

        <!-- Bootstrap -->
        <link href="<?php echo PATH;?>css/bootstrap.min.css" rel="stylesheet">

        <!-- My style -->
        <link href="<?php echo PATH;?>css/style.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container mt-50">
            <?php if (isset($error))
            { ?>

                <div class="row">
                    <div class="col-md-12">

                        <?php echo $error;?>

                    </div>
                </div>

            <?php } ?>
            <div class="row">
                <h2>Task 4</h2>
                <div class="col-md-12">
                    
                    <?php if(isset($mysql)) { ?>
                        <div class="col-md-6">MySql:<br>
                            <?php
                            if (is_array($mysql))
                            {
                                foreach($mysql as $item)
                                {
                                    echo $item.'<br>';
                                }
                            }
                            else
                            {
                                echo $mysql;
                            }
                            ?>
                        </div>
                    <?php } ?>
                    <?php if(isset($postgresql)) {?>
                        <div class="col-md-6">PostgreSql:<br>
                            <?php
                            
                            if (is_array($postgresql))
                            {
                                foreach($postgresql as $item)
                                {
                                    echo $item.'<br>';
                                }
                            }
                            else
                            {
                                echo $postgresql;
                            }
                            ?>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
         <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <!-- Include all compiled plugins (below), or include individual files as needed -->
         <script src="<?php echo PATH;?>js/bootstrap.min.js"></script>

    </body>
</html>

