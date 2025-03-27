<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
  <title>Login - BAC System</title>
</head>
<body>
  <div class="login-container">
    <h1>BAC System Login</h1>
    
    <!-- Error Message -->
    @if ($errors->any())
      <p class="error-message">{{ $errors->first('error') }}</p>
    @endif

    <!-- Login Form -->
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Enter your username" required />

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required />

      <button type="submit">Login</button>
    </form>

    <p>or</p>

    <!-- Google Login Button -->
    <button class="google-btn">
      <img src="{{ asset('images/google-logo.png') }}" alt="Google Logo" />
      Login with Google
    </button>
  </div>
</body>
</html>
