<?php session_start(); // Session Start at the beginning ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Registration Form -->
    <div class="container" id="signup" style="display:none;">
        <h1 class="form-title">Register</h1>
        <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="fName" id="fName" placeholder="First Name" required value="<?= isset($_POST['fName']) ? $_POST['fName'] : ''; ?>">
                <label for="fName">First Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="lName" id="lName" placeholder="Last Name" required value="<?= isset($_POST['lName']) ? $_POST['lName'] : ''; ?>">
                <label for="lName">Last Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" required value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-phone"></i>
                <input type="tel" name="mobile" id="mobile" placeholder="Mobile Number" required value="<?= isset($_POST['mobile']) ? $_POST['mobile'] : ''; ?>">
                <label for="mobile">Mobile Number</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required value="<?= isset($_POST['password']) ? $_POST['password'] : ''; ?>">
                <label for="password">Password</label>
            </div>
            <input type="submit" class="btn" value="Sign Up" name="signUp">
        </form>
        <div class="links">
            <p>Already Have Account?</p>
            <button id="signInButton">Sign In</button>
        </div>
    </div>

    <!-- Sign In Form -->
    <div class="container" id="signIn">
        <h1 class="form-title">Sign In</h1>
        
        <!-- Display success message after successful login -->
        <?php if (isset($_SESSION['loginSuccess'])): ?>
            <div style="color: green; margin-bottom: 10px;">
                <p><?= $_SESSION['loginSuccess']; ?></p>
            </div>
            <?php unset($_SESSION['loginSuccess']); ?>
        <?php endif; ?>
        
        <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="emailSignIn" placeholder="Email" required value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                <label for="emailSignIn">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="passwordSignIn" placeholder="Password" required value="<?= isset($_POST['password']) ? $_POST['password'] : ''; ?>">
                <label for="passwordSignIn">Password</label>
            </div>

            <!-- Display error message if sign-in fails -->
            <?php if (isset($_SESSION['errorMessage'])): ?>
                <div style="color: red; margin-bottom: 10px;">
                    <p><?= $_SESSION['errorMessage']; ?></p>
                </div>
                <?php unset($_SESSION['errorMessage']); ?>
            <?php endif; ?>

            <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
        <div class="links">
            <p>Don't have account yet?</p>
            <button id="signUpButton">Sign Up</button>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>