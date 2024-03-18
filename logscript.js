function validateLogin() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var errorMessage = document.getElementById("errorMessage");
  
   
   
    if (username !== "" && password !== "") {
      errorMessage.innerText = ""; 
      alert("Login successful! Redirecting...");
    } else {
      errorMessage.innerText = "Username and password are required.";
    }
  }
  