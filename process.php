<?php
$fullname = $_POST['fullname'];
$regno = $_POST['regno'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$year = $_POST['year'];
$days = $_POST['days'];
$category = $_POST['category'];
$workshop = $_POST['workshop'];
$meal = $_POST['mealOption'];

if(empty($fullname) || empty($email) || empty($phone) || empty($days)){
die("Essential values missing. <a href='register.html'>Go Back</a>");
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
die("Invalid email. <a href='register.html'>Go Back</a>");
}
if(strlen($phone) != 10){
die("Phone must be 10 digits. <a href='register.html'>Go Back</a>");
}
if($days < 1 || $days > 3){
die("Days must be 1-3. <a href='register.html'>Go Back</a>");
}

$reg = 1000;
$perDay = 500;
$wFee = 0;
if($category == "workshop" && $workshop != "none"){
$wFee = 750;
}
$mFee = 0;
if($meal == "yes"){
$mFee = $days * 300;
}

$subtotal = $reg + ($days * $perDay) + $wFee + $mFee;
$discount = 0;
if($days == 3){
$discount = $subtotal * 0.10;
}
$total = $subtotal - $discount;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Registration Success</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<header><h2>STIC 2026</h2><nav><a href="index.html">Home</a></nav></header>

<div class="form-container">
<p class="success">REGISTRATION SUCCESSFUL</p>

<p>Participant: <?php echo $fullname; ?><br>
Admission Number: <?php echo $regno; ?><br>
Email: <?php echo $email; ?><br>
Phone: <?php echo $phone; ?><br>
Year of Study: <?php echo $year; ?><br>
Conference Days: <?php echo $days; ?><br>
Workshop: <?php echo $workshop; ?><br>
Meals: <?php echo $meal; ?></p>

<div class="total">TOTAL AMOUNT PAYABLE: KSh <?php echo $total; ?></div>

<?php if($discount > 0){ ?>
<p>Discount Applied: KSh <?php echo $discount; ?> (10% for 3 days)</p>
<?php } ?>

<div class="thanks">
Thank you for registering for the<br>
Student Technology and Innovation Conference.
</div>

<a href="index.html" class="btn">Home</a>
<a href="register.html" class="btn">New Registration</a>
</div>

<footer>© 2026 STIC Conference</footer>
</body>
</html>