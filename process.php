
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $dob = trim($_POST["dob"] ?? "");
    $gender = trim($_POST["gender"] ?? "");
    $course = trim($_POST["course"] ?? "");
    $address = trim($_POST["address"] ?? "");

    $error = "";

    if ($name == "" || $email == "" || $phone == "" ||
        $dob == "" || $gender == "" || $course == "" ||
        $address == "") {

        $error = "Please fill in all the fields.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error = "Please enter a valid email address.";

    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {

        $error = "Phone number must contain exactly 10 digits.";

    }

} else {
    header("Location: index.html");
    exit();
}

function safe($value) {
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registration Result</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <?php if ($error != "") { ?>

            <h1>Registration Failed</h1>

            <div class="error">
                <?php echo safe($error); ?>
            </div>

            <a href="index.html" class="back-button">
                Go Back
            </a>

        <?php } else { ?>

            <div class="result">

                <h2>Registration Successful!</h2>

                <p class="success">
                    Your details have been submitted successfully.
                </p>

                <p><b>Full Name:</b> <?php echo safe($name); ?></p>

                <p><b>Email:</b> <?php echo safe($email); ?></p>

                <p><b>Phone Number:</b> <?php echo safe($phone); ?></p>

                <p><b>Date of Birth:</b> <?php echo safe($dob); ?></p>

                <p><b>Gender:</b> <?php echo safe($gender); ?></p>

                <p><b>Course:</b> <?php echo safe($course); ?></p>

                <p><b>Address:</b> <?php echo safe($address); ?></p>

                <a href="index.html" class="back-button">
                    Register Another Student
                </a>

            </div>

        <?php } ?>

    </div>

</body>
</html>
