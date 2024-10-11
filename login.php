<?php
include('conn.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style2.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>


<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="nyan-cat.gif" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="post">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="loginpass" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

  </div>
</div>
</body>
</html>

<?php 
if(isset($_POST)){
$email= $_POST['login'];
$pass=$_POST['loginpass'];
$sql = "SELECT `Id`, `email`, `password` FROM `users` WHERE `email` = :email AND `password` = :password";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':password', $pass, PDO::PARAM_STR);
$stmt->execute();

$result= $stmt->fetchAll(PDO::FETCH_ASSOC);
if(count($result)>0){
  
        echo "logged succesfully ";
    
}
else{
  echo "<span>somthing is wrong </span>";
}}

?>