<?php 
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />


</head>
<body>
    

<div class="container register-form">
            <div class="form">
                <form method="post">
                <div class="note">
                    <p>This is a simpleRegister Form made using Boostrap.</p>
                </div>

                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name *"  name="urname" value=""/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email *" name="email" value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Password *" name="pass" value=""/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Confirm Password *" name="conpass" value=""/>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btnSubmit">Submit</button>
                </div>
</form>
            </div>
        </div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name= $_POST['urname'];
    $email=$_POST['email'];
    $pass = $_POST['pass'];

     try {
     
        $stmt = $conn->prepare("INSERT INTO `users` (`fname`, `email`, `password`) VALUES (:name, :email, :pass)");

    
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);

     
        if ($stmt->execute()) {
            echo "User registered successfully.";
        } else {
            echo "Error: Could not execute the statement.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>