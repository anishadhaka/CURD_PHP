
function loginvalidate(){ 

    const username= document.getElementById("username").value;  
    const password= document.getElementById("password").value;
alert('2222211111');
    if(username==''){

      alert('wwwww');
        
        userNameError.innerHTML="Invalid name. .";
      
    } 
    else{
      alert('222222');

    userNameError.innerHTML=""; 
  }

  if(password==""){
    alert('1111111');

    passworderror.innerHTML="please enter same password.";

  }else{
    alert('1212');

    passworderror.innerHTML="";
  }

}