$(document).ready(function() {
    
    $form = $("form");
    $error = $(".warning");
    $form.click(function(e){
         e.preventDefault();

    });
 });
 const form = document.querySelector("form");
 var error = document.querySelector("form .warning");
 function Register(){
     let xhr = new XMLHttpRequest;
     xhr.open("POST","php/signup.php",true);
     xhr.onload = ()=>{
         if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
            if(data == 'success'){
                location.href = 'dashboard.php';
            }else{
               error.textContent = data;
            }
                }
         }
     }
     let formData = new FormData(form);
     xhr.send(formData);
 }
