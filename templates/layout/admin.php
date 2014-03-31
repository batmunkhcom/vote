<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div style="margin: 0px auto; width: 980px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>SMS center</h1>
                    </div>
                </div>
                <?php if ($_SESSION['is_logged'] == 1): ?>
                    <div class="row">
                        <div class="col-lg-12 m_menu">
                            <a href="manage.php?c=admin_home">Admin home</a>
                            <a href="manage.php?action=logout">Logout</a>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">

                        <?php load_template($_SESSION['template']); ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12"></div>
                </div>
            </div>
        </div>

    </body>
</html>