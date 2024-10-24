

function funerror() {
      const username = document.myform.username.value;
      var num = document.myform.num.value;
      const firstpassword = document.myform.password.value;
      const secondpassword = document.myform.cpassword.value;
  


  if (username == null || username == "") {
             alert("Name can't be blank");
             return false;
  } else if (isNaN(num) || num < 10 || num == null) {
              //  document.getElementById("num").innerHTML="Enter Numeric value only";  
              alert(" Enter number and dont use character .");
              return false;
  }
  else if (password.length > 8) {
              alert("Password must be at least 8 characters long.");
              return false;
  }
   else if (firstpassword == secondpassword) {
     return true;
  }
  else {
              alert("password must be same!");
              return false;
  }
    {
       function funerror(username, password){
       hashed_password = hash(password);
       save_to_database(username, hashed_password);
    }
  }
}  
