$(document).ready(function() {
    
    $form = $("#form1");
    $form2 = $("#form2");
    $error = $(".warning");
    $form.submit(function(e){
         e.preventDefault();

    });
    $form2.submit(function(e){
         e.preventDefault();

    });
 });
 const form = document.querySelector("#form1");
 var error = document.querySelector("#form1 #chat_message");
 function Register(){
     let xhr = new XMLHttpRequest;
     xhr.open("POST","php/chat_dashboard.php",true);
     xhr.onload = ()=>{
         if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
               error.value = '';
            }
         }
     }
     let formData = new FormData(form);
     xhr.send(formData);
 }
 var chat = document.querySelector("#chat_character");
const form2 = document.querySelector("#form2");
setInterval(() => {
     let xhr = new XMLHttpRequest;
     xhr.open("POST","php/my_message.php",true);
     xhr.onload = ()=>{
         if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
              let data = xhr.response;
              chat.innerHTML = data;
            }
         }
     }
    let formData = new FormData(form2)
     xhr.send(formData);
 }, 500);
 