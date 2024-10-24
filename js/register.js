

          function validateForm(){ 
            const username= document.getElementById("username").value;  
            const num= document.getElementById("num").value;
            const email= document.getElementById("email").value;
            const password= document.getElementById("password").value;
            const userNameError = document.getElementById("usernameerror");
            const numberError = document.getElementById("numerror");
            const emailError = document.getElementById("emailerror");
            
          

            if (username=="") {
                
                userNameError.innerHTML="Invalid name. .";
            } 
            else{
            userNameError.innerHTML=""; 
          }
          
          if(num==""){
            numberError.innerHTML=" Invalid phone number. "; 
          }
          else{
            numberError.innerHTML=""; 

          }
          if(email==""){
            emailError.innerHTML=" Email can't be empty."; 
          }else{
            emailError.innerHTML=""; 

          }
           return username != "" && num!="" && email!="";
        
        }
        function validateName(username) {
            const nameRegex = /^[A-Za-z\s'-]+$/;
           
            console.log(nameRegex.test(username));
            return nameRegex.test(username);
        }
        function validateemail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function validateNum(num) {
            const phoneRegex = /^\d{10}$/;
            return phoneRegex.test(num);
        }

        // $('body').on('keyup','#username',function(){ va
        // let name =$('#username').val(); 
        // if(name!=''){ 
        // $('#usernameerror').html('');}
        //  else{ $('.remove').html('Required'); }

        // });
        // $(document).ready(function(){
        //  $('body').on('keyup','.jquery',function(){
        //   const btn = $(this);
        //   const inputvalue = btn.val();
        //   if(inputvalue==""){
        //     btn.parents('.inputcontainer').find('.error').text('required');
        //   }else{
        //     btn.parents('.inputcontainer').find('.error').text('');
        //   }

          
        // });
        // for name
        $(document).ready(function(){
          $('body').on('keyup','#username',function(){
            const btn = $(this);
            const inputvalue = btn.val();
            const errorid = btn.attr('data-errorid');
            if(inputvalue==""){
              $(errorid).parents('.inputcontainer').find('#usernameerror').text('Required');
            }else if(!validateName(inputvalue)){
              $(errorid).parents('.inputcontainer').find('#usernameerror').text('Invalid name. Only letters, spaces, and - or are allowed.');
            }else{
              $(errorid).parents('.inputcontainer').find('#usernameerror').text('');
            } 
        });
      
      // for email
     
        $('body').on('keyup','#email',function(){
          const btn = $(this);
          const inputvalue = btn.val();
          const errorid = btn.attr('data-errorid');
          if(inputvalue==""){
            $(errorid).parents('.inputcontainer').find('#emailerror').text('Required');
          }else if(!validateemail(inputvalue)){
            $(errorid).parents('.inputcontainer').find('#emailerror').text('Invalid email format');
          }else{
            $(errorid).parents('.inputcontainer').find('#emailerror').text('');
          } 
        });
      

      //for number

     
        $('body').on('keyup','#num',function(){
          const btn = $(this);
          const inputvalue = btn.val();
          const errorid = btn.attr('data-errorid');
          if(inputvalue==""){
            $(errorid).parents('.inputcontainer').find('#numerror').text('Required');
          }else if(!validateNum(inputvalue)){
            $(errorid).parents('.inputcontainer').find('#numerror').text('Invalid phone number. It should be 10 digits.');
          }else{
            $(errorid).parents('.inputcontainer').find('#numerror').text('');
          } 
        });
      });
