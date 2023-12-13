<?php
session_start();
 
if(!isset($_SESSION["loggedinhr"]) || $_SESSION["loggedinhr"] !== true){
    header("location: ../../");
    exit;
}

require_once "../config.php";
 
$firstname = $middlename = $lastname = $username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$firstname_err = $middlename_err = $lastname_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter an email.";
    }
    if (empty(trim($_POST['firstname']))) {
         $firstname_err = "Please enter a firstname";
     }if (empty(trim($_POST['middlename']))) {
         $middlename_err = "Please enter a middlename";
     }if (empty(trim($_POST['lastname']))) {
         $lastname_err = "Please enter a lastname";
     } else{
        $sql = "SELECT id FROM hr WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        $first_name = $_POST['firstname'];
        $middle_name = $_POST['middlename'];
        $last_name = $_POST['lastname'];
        $employee_id = $_POST['employee_id'];
        $code = rand(000000, 999999);
        
        $sql = "INSERT INTO hr (firstname, middlename, lastname, employee_id, code, username, password) VALUES ('$first_name','$middle_name', '$last_name', '$employee_id', '$code', ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            
            if(mysqli_stmt_execute($stmt)){
                header("location: index.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="Unionworks, Construction Company, Unionworks Construction Company, Unionworks Construction Company Incorporation, Unionworks Construction Company Inc.">
    <meta name="Description" content="Unionworks Construction Company Incorporation is a company that undertake construction management of civil engineering, formwork, and concrete secondary products.">
    <meta property="og:image" content="assets/img/og-image.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="436">
    <meta property="og:image:height" content="228">
    <meta property="og:description" content="Unionworks Construction Company Incorporation is a company that undertake construction management of civil engineering, formwork, and concrete secondary products.">
    <title>HR Registration Portal - Unionworks Construction Company Inc.</title>
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Bakbak+One&family=Dancing+Script&family=Gideon+Roman&family=Lobster&family=Montserrat:wght@100;200;300;400;600&family=Moo+Lah+Lah&family=Mukta:wght@800&family=Neonderthaw&family=Open+Sans:wght@300;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@100;200;300;400;600;700&family=Raleway:wght@100&family=Roboto:wght@100;300;400;500&family=Shizuru&family=Space+Mono&family=Spline+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
</head>
<body>
    <main>
        <nav></nav>
        <div class="main-wrapper">
            <h1>Register</h1>
            <p class="sign-description">Create an hr account</p>

            <?php 
            if(!empty($login_err)){
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }        
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <input type="text" name="firstname" class="form-control <?php echo (!empty($firstname_err)) ? 'is-invalid' : ''; ?>" placeholder="First Name" value="<?php echo $firstname; ?>" maxlength="40" autocomplete="off">
                    <span class="invalid-feedback"><?php echo $firstname_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="text" name="middlename" class="form-control <?php echo (!empty($middlename_err)) ? 'is-invalid' : ''; ?>" placeholder="Middle Name" value="<?php echo $middlename; ?>" maxlength="40" autocomplete="off">
                    <span class="invalid-feedback"><?php echo $middlename_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="text" name="lastname" class="form-control <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" placeholder="Last Name" value="<?php echo $lastname; ?>" maxlength="40" autocomplete="off">
                    <span class="invalid-feedback"><?php echo $lastname_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="text" name="employee_id" class="form-control" value="<?php echo date('m-d')?>" hidden="" style="display: none;">
                </div>
                <div class="form-group">
                    <input type="email" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Email" autocomplete="off">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group">
                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" placeholder="Password">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" placeholder="Confirm Password">
                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
    </main> 
</body>
</html>