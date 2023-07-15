<?php if ($_SERVER['SERVER_NAME'] == "domains.wraith.gg") {
    header('Location: https://wraith.gg');
}

require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Sales Inquery - <?php echo $_SERVER['SERVER_NAME'] ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta+Mahee:300,700,800" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
        <link rel="stylesheet" href="css/styles.css" />
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback" async defer></script>
    </head>
    <body>
        <div class="wrapper">
            <div>
                <div>
                    <span>
                        <strong><?php echo $_SERVER['SERVER_NAME'] ?></strong>
                        <span>is available for purchase</span>
                    </span>
                    <p>Interested in this domain? Please make an offer using the form provided.</p>
                    <div class="mailto">
                        <i class="fa-regular fa-comment"></i>
                        <a href="mailto:<?php echo $your_email ?>"><?php echo $your_email ?></a>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <form id="offer-form" action="submit.php" method="post">
                        <div class="form__group">
                            <label for="name">Name</label>
                            <div class="input__wrapper">
                                <input type="text" name="name" id="name" class="form__input" placeholder="John Doe" />
                            </div>
                        </div>
                        <div class="form__group">
                            <label for="email">Email</label>
                            <div class="input__wrapper">
                                <input type="email" name="email" id="email" class="form__input" placeholder="email@example.com" />
                            </div>
                        </div>
                        <div class="form__group">
                            <label for="price">Offer</label>
                            <div class="input__wrapper">
                                <input type="number" name="price" class="form__input" min="100" placeholder="100" />
                                <span class="currency">USD</span>
                            </div>
                        </div>
                        <div class="form__group">
                            <label for="comments">Message <span>(Optional)</span></label>
                            <textarea name="comments" class="form__input" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."></textarea>
                        </div>
                    </div>
                    <div class="g-recaptcha" data-sitekey=<?php echo $recaptcha_key ?> data-size="invisible" data-callback="setResponse"></div>
                    <input type="hidden" id="captcha-response" name="captcha-response" />
                    <button type="submit" name="submit">Make an offer</button>
                </form>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script>
            $("#offer-form").validate({
                errorClass: "form__input__feedback",
                errorElement: "div",
                highlight: function (element) {
                    $(element).parents(".form__group").addClass("danger");
                },
                unhighlight: function (element) {
                    $(element).parents(".form__group").removeClass("danger");
                },
                rules: {
                    name: "required",
                    email: {
                        required: true,
                        email: true,
                    },
                    price: {
                        required: true,
                        number: true,
                        min: 100,
                    },
                    comments: {
                        maxlength: 500,
                    },
                },
                messages: {
                    name: "Please enter your name.",
                    email: {
                        required: "Please enter your email address.",
                        email: "Please enter a valid email address.",
                    },
                    price: {
                        required: "Please enter your offer.",
                    },
                },
            });

            var onloadCallback = function() {
                grecaptcha.execute();
            };

            function setResponse(response) { 
                document.getElementById('captcha-response').value = response; 
            }
        </script>
    </body>
</html>
