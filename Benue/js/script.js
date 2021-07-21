function toggle() {
    document.getElementById("bars").style.display = 'none';
    document.getElementById("clone").style.display = 'block'; 
    document.getElementById("list").style.transition = '0.5s ease all';
    document.getElementById("list").style.display = 'block';
}
function clone() {
   document.getElementById("bars").style.display = 'block';
   document.getElementById("clone").style.display = 'none';
   document.getElementById("list").style.transition = '0.5s ease all';
   document.getElementById('list').style.display = 'none' 
}

// Registration form

// form.onsubmit =(e)=>{
//     e.preventDefault()
// }