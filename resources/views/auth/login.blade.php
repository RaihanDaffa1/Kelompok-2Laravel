<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      height: 100vh;
      display: flex;
    }

    .login-wrapper {
      display: flex;
      width: 100%;
      height: 100vh;
    }

    /* Bagian kiri */
    .left-side {
      flex: 1;
      background: url("/images/kelompok.jpeg") no-repeat center center/cover;
      position: relative;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }

    .left-side::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.59);
    }

    .left-side .content {
      position: relative;
      text-align: center;
      z-index: 2;
    }

    .left-side h1 {
      font-size: 100px;
      font-weight: 800;
      font-style: italic;
    }

    .left-side h1 span {
      color: red;
      border-bottom: 2px solid white; /* garis bawah putih, bisa diganti warna lain */
      padding-bottom: 3px;
    }

    .left-side h2 {
      font-size: 50px;
      font-weight: 600;
      margin-top: 10px;
      font-style: italic;
      margin-left: 350px;
    }

    /* Bagian kanan */
    .right-side {
      flex: 1;
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-card {
      width: 100%;
      max-width: 400px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group input {
      width: 100%;
      padding: 15px;
      border-radius: 50px;
      outline: none;
      border: 1px solid #ccc;
      background: #535353cc;
      font-size: 16px;
    }

    .form-options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .login-btn {
      width: 50%;
      background: black;
      color: white;
      border: none;
      padding: 15px;
      border-radius: 100px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      display: block;       /* supaya bisa diatur margin */
      margin: 0 auto;       /* otomatis center horizontal */
      text-align: center; 
    }

    .login-btn:hover {
      background: #333;
    }
  </style>
</head>
<body>
  <div class="login-wrapper">
    <!-- Kiri -->
    <div class="left-side">
      <div class="content">
        <h1><span>WELCOME</span> TO</h1>
        <h2>LOGIN PAGE</h2>
      </div>
    </div>

    <!-- Kanan -->
    <div class="right-side">
      <div class="login-card">
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
          @csrf

          <!-- Email -->
          <div class="form-group">
            <x-input-label for="email" :value="__('Username')" />
            <x-text-input id="email" type="email" name="email"
              :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>

          <!-- Password -->
          <div class="form-group">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" type="password" name="password"
              required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>

          <!-- Remember & Forgot -->
          <div class="form-options">
            <label for="remember_me" class="inline-flex items-center">
              <input id="remember_me" type="checkbox" name="remember">
              <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:text-red-500">
                Forgot Password ?
              </a>
            @endif
          </div>

          <!-- Button -->
          <button type="submit" class="login-btn">
            LOGIN
          </button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>