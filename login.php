<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Setifismed</title>
  <link rel="stylesheet" href="styles/css/login.css">
</head>
<body>
<!-- Login Page -->
<div class="login-wrapper" id="loginPage">
  <div class="company-branding">
    <div class="company-logo">
      <img src="https://via.placeholder.com/180" alt="Company Logo" id="companyLogo">
    </div>
    <div class="company-info">
      <h2>Setifismed</h2>
      <p>Your trusted medical partner</p>
    </div>
  </div>

  <div class="login-container">
    <div class="login-header">
      <h1>Welcome back</h1>
      <p>Please enter your details to sign in</p>
    </div>

    <form class="login-form" id="loginForm" method="post">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Enter your email" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <div class="password-container">
          <input type="password" id="password" placeholder="Enter your password" required>
          <span class="toggle-password" id="togglePassword">Show</span>
        </div>
        <a href="#" class="forgot-password">Forgot password?</a>
      </div>

      <button type="submit" class="login-button">Sign In</button>
    </form>
  </div>
</div>

</body>
</html>