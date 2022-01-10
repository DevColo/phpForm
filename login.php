<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap1.min.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <style>
    .error{
        color: red;
        font-style: italic;
        font-weight: bold;
    }
  </style>
</head>
<body>
    <div class = "container">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "panel panel-primary">
                <div class = "panel-heading">
                    User Login Form
                </div>
                <?php
                 $error = $_GET['error'];
                if ($error == "invalidAccount") {
                  echo '<p class="error">Invalid Account Credentials</p>';
              }
              ?>
                <div class = "panel-body">
                    <form id = "registration" method="post" action="connect.php" onsubmit="return submitUserForm();" enctype="multipart/form-data">
                        <input type = "text" class = "form-control" name = "email" placeholder = "Email"/>
                        <br/>
                        <input type = "password" class = "form-control" name = "password" placeholder = "Password" id = "password"/>
                        <br/>
                        
                        <div class="g-recaptcha form-group" data-sitekey="6Lf9AUEcAAAAAJbC6K5jPKfx7t2xTPE-qaZX2pfH" data-callback="verifyCaptcha"></div>
                                     <div id="g-recaptcha-error"></div>
                        <br/>
                        <button type = "submit" class = "btn btn-primary" id="submit" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    var recaptcha_response = '';
function submitUserForm() {
    if(recaptcha_response.length == 0) {
        document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">This field is required.</span>';
        return false;
    }
    return true;
}
 
function verifyCaptcha(token) {
    recaptcha_response = token;
    document.getElementById('g-recaptcha-error').innerHTML = '';
}

    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/register.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>  
</body>
</html>