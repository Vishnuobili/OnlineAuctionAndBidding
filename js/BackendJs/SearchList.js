const form = document.querySelector(".search-bars");
form.onsubmit = (e)=>{
    e.preventDefault();
}

document.addEventListener('input', ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/getAucList.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
})