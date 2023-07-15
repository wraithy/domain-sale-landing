<?php
    require_once "includes/config.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Error - <?php echo $_SERVER['SERVER_NAME'] ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta+Mahee:300,700,800" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
        <link rel="stylesheet" href="/css/styles.css" />
    </head>
    <body>
        <div class="error__wrapper">
                <div>
                    <span>
                        <strong>Error</strong>
                        <span>Page not found.</span>
                    </span>
                    <p>The page that you are looking for either doesn't exist or you don't have access to view it. Think this is a mistake? Contact the owner using the email provided below.</p>
                    <div class="mailto">
                        <i class="fa-regular fa-comment"></i>
                        <a href="mailto:<?php echo $your_email ?>"><?php echo $your_email ?></a>
                    </div>
                </div>
            </div>
    </body>
</html>