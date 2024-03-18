<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style> 
  #errorMessage {
    color: red;
    margin-top: 10px;
  }
  
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
    background-color: #f4f4f4;
    background-image:url("image/login.webp");
    
  }
  
  .container {
    width: 350px;
    padding: 30px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  }
  
  form {
    display: flex;
    flex-direction: column;
  }
  
  h2 {
    text-align: center;
    color: #333;
  }
  
  label {
    margin-bottom: 8px;
    color: #555;
  }
  
  input {
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  button {
    padding: 12px;
    background-color:rgb(1, 139, 139);
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size:20px;
  }
  
  button:hover {
    background-color: rgb(1, 139, 120);
  }
  
  #errorMessage {
    color: red;
    margin-top: 10px;
    text-align: center;
  }
  

  
.bottom-text {
  text-align: center;
  margin-top: 20px;
  size:20px;
}

.bottom-text p {
  color: #333;
  font-size: 14px;
  margin-left:20px;

}

.bottom-text a {
  color:rgb(4, 80, 80);
  text-decoration: none;
}

.bottom-text a:hover {
  text-decoration: underline;
}
</style>


  <title>Login Page</title>
</head>
<body>
  <div class="container">
    <form id="loginForm" action = "user_login.php" method = "post">
      <h2>Login</h2>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="signup.php">Register</a></p>
    <p id="errorMessage"></p>
  </div>

  
</body>
</html>
