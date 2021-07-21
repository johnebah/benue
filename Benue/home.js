var table = document.querySelector(".table-status");
setInterval(() => {
    let xhr = new XMLHttpRequest;
    xhr.open("GET","php/home.php",true);
    xhr.onload =()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if (xhr.status == 200) {
                let data = xhr.response;
               table.innerHTML = data;
            }
        }
    }
    xhr.send();
}, 5000);