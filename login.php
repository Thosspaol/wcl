<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    html {
      height: 100%;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      background: rgba(0, 0, 0, 0.5)
    }

    .login-box {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 500px;
      padding: 40px;
      transform: translate(-50%, -50%);
      background-color: #B9B9B9;
      box-sizing: border-box;
      box-shadow: 0 15px 25px rgba(0, 0, 0, 1);
      border-radius: 10px;
    }

    .login-box h2 {
      margin: 0 0 30px;
      padding: 0;
      color:black;
      text-align: center;
    }

    .login-box .user-box {
      position: relative;
    }

    .login-box .user-box input {
      width: 100%;
      padding: 10px 0;
      font-size: 16px;
      color: black;
      margin-bottom: 30px;
      border: none;
      border-bottom: 1px solid black;
      outline: none;
      background: transparent;
    }

    .login-box .user-box label {
      position: absolute;
      top: 0;
      left: 0;
      padding: 10px 0;
      font-size: 16px;
      color: black;
      pointer-events: none;
      transition: .5s;
    }

    .login-box .user-box input:focus~label,
    .login-box .user-box input:valid~label {
      top: -20px;
      left: 0;
      color: black;
      font-size: 12px;
    }

    .login-box form a {
      position: relative;
      display: inline-block;
      padding: 10px 20px;
      color: black;
      font-size: 16px;
      text-decoration: none;
      text-transform: uppercase;
      overflow: hidden;
      transition: .5s;
      margin-top: 40px;
      letter-spacing: 4px
    }

    .login-box a:hover {
      background: #9ACD32;
      color: black;
      border-radius: 5px;
      box-shadow: 0 0 5px #336699,
    }

    .login-box a span {
      position: absolute;
      display: block;
    }

    .login-box form .b {
      position: relative;
      display: inline-block;
      padding: 10px 20px;
      color: black;
      font-size: 16px;
      text-decoration: none;
      text-transform: uppercase;
      overflow: hidden;
      transition: .5s;
      margin-top: 40px;
      letter-spacing: 4px;
      margin-left: 173px;
    }

    .login-box .b:hover {
      background: #DAA520;
      color: black;
      border-radius: 5px;
      box-shadow: 0 0 5px #FF4500,
    }
  </style>
</head>

<body>
  <div class="login-box">
    <h2>Login</h2>
    <form>
      <div class="user-box">
        <input type="text" name="" required>
        <label>Username</label>
      </div>
      <div class="user-box">
        <input type="password" name="" required>
        <label>Password</label>
      </div>
      <a href="#">
        Submit
      </a>
      <a class="b btn-right" href="singup.php">
        Signup</a>

    </form>
  </div>

</body>

</html>