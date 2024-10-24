
        
  document.getElementById("Reset").addEventListener("submit", function (event) {
         
         const old_password = document.getElementById("oldpassword").value;
         const new_password = document.getElementById("Newpassword").value;
         const confirm_password = document.getElementById("confirmpassword").value;
         
         if (old_password == '') {
               document.getElementById('oldpass').innerHTML = "enter your old password."
         } else if (old_password.length < 8) {
               document.getElementById('oldpass').innerHTML = 'old Password must be at least 8 character long.'
         } 
         else {
               document.getElementById('oldpass').innerHTML = '';
         }
         if (new_password == '') {
               document.getElementById('newpass').innerHTML = 'enter your new password.'
         }
         else if (new_password.length < 8) {
               document.getElementById('newpass').innerHTML = 'New Password must be at least 8 character long.'
         }
         else {
              document.getElementById('newpass').innerHTML = '';
         }
         
         if (confirm_password == '') {
             document.getElementById('confirmpass').innerHTML = 'confirm your password.'
         }
         else if (confirm_password != new_password) {
             document.getElementById('confirmpass').innerHTML = 'Not same as password.';
         }
         else {
             document.getElementById('confirmpass').innerHTML = '';
         }
         
         if (old_password == '' || new_password == '' || confirm_password == '' || old_password.length < 8 || new_password.length < 8 || confirm_password != new_password) {
             event.preventDefault();
             }
    });
