<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
  <title>Login - BAC System</title>
</head>

<body>
  <div class="login-container">
    <h1>BAC System Login</h1>

    <!-- Error Message -->
    @if ($errors->any())
    <div class="error-message">
      {{ $errors->first('error') }}
    </div>
  @endif

    <!-- Login Form -->
    <form action="{{ route('login') }}" method="POST" id="loginForm">
      @csrf
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required
          value="{{ old('username') }}" />
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required />
      </div>

      <button type="submit" id="loginButton">
        <span class="button-text">Login</span>
        <span class="loading-spinner" style="display: none;">
          Loading...
        </span>
      </button>
    </form>

    <p>or</p>

    <!-- Google Login Button -->
    <button class="google-btn">
      <img src="{{ asset('images/google-logo.png') }}" alt="Google Logo" />
      Login with Google
    </button>
  </div>

  <script>
    document.getElementById('loginForm').addEventListener('submit', function (e) {
      const button = document.getElementById('loginButton');
      const buttonText = button.querySelector('.button-text');
      const loadingSpinner = button.querySelector('.loading-spinner');

      buttonText.style.display = 'none';
      loadingSpinner.style.display = 'inline-block';
      button.disabled = true;
    });
  </script>
</body>

</html>