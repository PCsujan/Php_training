<!DOCTYPE html>
<html>

<head>
  <title>Register</title>

  <style>
    /* RESET */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: #f0f4f8;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      padding: 20px;
    }

    /* CONTAINER */
    .register-box {
      background: #ffffff;
      padding: 40px;
      width: 380px;
      border-radius: 12px;
      box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.15);
      animation: fadeIn 0.4s ease-in-out;
    }

    .register-box h2 {
      text-align: center;
      color: #004080;
      margin-bottom: 25px;
      font-size: 1.9em;
      font-weight: 600;
    }

    /* INPUT WRAPPER */
    .input-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      font-size: 0.95em;
      font-weight: 600;
      margin-bottom: 5px;
      color: #004080;
    }

    input {
      width: 100%;
      padding: 12px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 1em;
      transition: 0.3s;
    }

    input:focus {
      border-color: #004080;
      outline: none;
      box-shadow: 0 0 5px rgba(0, 64, 128, 0.3);
    }

    /* BUTTON */
    button {
      width: 100%;
      padding: 12px;
      background-color: #ffcc00;
      border: none;
      border-radius: 6px;
      color: #004080;
      font-size: 1.1em;
      cursor: pointer;
      font-weight: bold;
      margin-top: 10px;
      transition: 0.3s;
    }

    button:hover {
      background: #e6b800;
    }

    /* ERROR BOX */
    .error-box {
      background: #ffe5e5;
      color: #c40000;
      padding: 12px;
      border-radius: 8px;
      margin-bottom: 20px;
      font-size: 0.9em;
    }

    /* ANIMATION */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>

  <div class="register-box">

    <h2>Create Account</h2>

    @if ($errors->any())
    <div class="error-box">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('register.store') }}">
      @csrf

      <div class="input-group">
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required autofocus>
      </div>

      <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" autocomplete="off" required>
      </div>

      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" autocomplete="new-password" required>
      </div>

      <div class="input-group">
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" autocomplete="new-password" required>
      </div>


      <button type="submit">Register</button>
    </form>

  </div>

</body>

</html>