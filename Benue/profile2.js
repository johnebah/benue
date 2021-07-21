var table = document.querySelector(".table-statu");
setInterval(() => {
    let xhr = new XMLHttpRequest;
    xhr.open("GET","php/home2.php",true);
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