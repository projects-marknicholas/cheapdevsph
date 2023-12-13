<?php
 

require_once "config.php";
 

$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
if(isset($_GET['passid']) && $_GET['email']){
        $query = mysqli_query($link, "SELECT * FROM users WHERE id = '".$_GET['passid']."' AND username = '".$_GET['email']."' ") or die(mysqli_error());
        $fetch = mysqli_fetch_array($query); 

    if(isset($_POST['create'])){
     

        if(empty(trim($_POST["new_password"]))){
            $new_password_err = "Please enter the new password.";     
        } elseif(strlen(trim($_POST["new_password"])) < 6){
            $new_password_err = "Password must have atleast 6 characters.";
        } else{
            $new_password = trim($_POST["new_password"]);
        }
        

        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Please confirm the password.";
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($new_password_err) && ($new_password != $confirm_password)){
                $confirm_password_err = "Password did not match.";
            }
        }
            

        if(empty($new_password_err) && empty($confirm_password_err)){
     
            $hashed = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password = '".$hashed."' WHERE id = '".$_GET['passid']."' ";
            
            if($stmt = mysqli_prepare($link, $sql)){
           
                mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
                
          
                $param_password = password_hash($new_password, PASSWORD_DEFAULT);
                $_SESSION["id"] = $fetch['id'];
                $param_id = $_SESSION["id"];
                
         
                if(mysqli_stmt_execute($stmt)){
               
                    session_destroy();
                    header("location: dashboard");
                    exit();
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

   
                mysqli_stmt_close($stmt);
            }
        }
        

        mysqli_close($link);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CheapDevs PH - New Password</title>

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/favicon.png" rel="apple-touch-icon">
    <link rel="stylesheet" type="text/css" href="css/index.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>

    <main>
        <div class="wrapper">
            <img src="../assets/img/favicon.png" class="wrap-img">
        </div>
        <div class="wrapper wrap-sem">
            <h2>New Password</h2>

            <form action="" method="post">
                <div class="form-group">
                    <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>" placeholder="New Password"><br>
                            <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
                </div>    
                <div class="form-group">
                    <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" placeholder="Confirm Password"><br>
                            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login" name="create">
                </div><br>
            </form>
        </div>
    </main>

</body>
</html>