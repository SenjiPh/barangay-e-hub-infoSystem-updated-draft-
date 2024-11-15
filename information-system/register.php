<?php
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'database.php';

    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
    $gender = $_POST['gender'];

    // Check if the username already exists in the database
    $checkUserQuery = "SELECT * FROM `registration` WHERE username = '$username'";
    $checkResult = mysqli_query($con, $checkUserQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Username already exists
        $error = "Username already exists. Please choose a different one.";
    } else {
        // If username is not taken, insert the new user into the database
        $sql = "INSERT INTO `registration` (username, password, firstName, middleName, lastName, email, address, contact, birthdate, gender)
                VALUES ('$username', '$password', '$firstName', '$middleName', '$lastName', '$email', '$address', '$contact', '$birthdate', '$gender')";
        
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "Data inserted successfully";
            header("Location: /information-system/login.php");
            exit;
        } else {
            $error = "Error inserting data: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="register.css">
    <title>Register</title>
</head>
<body>
<header>
    <nav class="navbar" style="border-bottom: solid #ced4da 3px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Create Account</a>
        </div>
    </nav>
</header>

<div class="container mt-5">
    <div class="form-wrapper">
        <form action="/information-system/register.php" method="POST" id="signupForm" novalidate>
            <!-- Error Message Display -->
            <?php if ($error): ?>
                <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
            <?php endif; ?>

            <div class="row g-3">
                <div class="col-sm-4">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo isset($firstName) ? $firstName : ''; ?>" required>
                    <div class="invalid-feedback">Valid first name is required.</div>
                </div>
                
                <div class="col-sm-4">
                    <label for="middleName" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="middleName" name="middleName" value="<?php echo isset($middleName) ? $middleName : ''; ?>">
                </div>
                
                <div class="col-sm-4">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo isset($lastName) ? $lastName : ''; ?>" required>
                </div>
            </div>

            <div class="col-12 mt-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo isset($address) ? $address : ''; ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="contact" class="form-label">Contact Number</label>
                    <input type="tel" class="form-control" id="contact" name="contact" value="<?php echo isset($contact) ? $contact : ''; ?>" required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="birthdate" class="form-label">Birth Date</label>
                    <input type="date" id="birthdate" class="form-control" name="birthdate" value="<?php echo isset($birthdate) ? $birthdate : ''; ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" name="gender" required>
                        <option value="">Choose...</option>
                        <option value="Male" <?php echo (isset($gender) && $gender == 'Male') ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo (isset($gender) && $gender == 'Female') ? 'selected' : ''; ?>>Female</option>
                    </select>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($username) ? $username : ''; ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" pattern=".{8,}" required>
                </div>
            </div>

            <div class="button-position">
                <input type="submit" name="register" class="btn btn-primary" value="Register">
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="register.js"></script>
</body>
</html>
