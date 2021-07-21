$(document).ready(function() {
    
    $form = $("form");
    $error = $(".warning");
    $form.submit(function(e){
         e.preventDefault();

    });
 });
 const form = document.querySelector("form");
 var error = document.querySelector("form .warning");
 var Obbey = document.querySelector(".left-dashboard");
 function Register(){
     let xhr = new XMLHttpRequest;
     xhr.open("POST","php/profile.php",true);
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
  setInterval(() => {
    let xhr = new XMLHttpRequest;
     xhr.open("GET","php/dashboard.php",true);
     xhr.onload = ()=>{
         if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                Obbey.innerHTML = data;
            }
         }
     }
     xhr.send();  
     }, 500);
