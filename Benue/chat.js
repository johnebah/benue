var latest = document.querySelector(".latests");
setInterval(() => {
    let xhr = new XMLHttpRequest;
    xhr.open("GET","php/message.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if (xhr.status == 200) {
                let data = xhr.response;
                latest.innerHTML = data;
            }
        }
    }
    xhr.send()
}, 500);