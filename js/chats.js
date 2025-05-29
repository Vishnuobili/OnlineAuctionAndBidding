var form = document.querySelector(".message-form")
var inputfeild = form.querySelector(".input-message");
var incoming_id = form.querySelector(".to-user").value;
var sendBtn = form.querySelector(".SendBtn");
var chatbox = document.querySelector(".chat-area");
var status_main = document.querySelector(".status");
inputfeild.focus();
form.onsubmit = (e)=>{
    e.preventDefault();
}
sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputfeild.value = "";
              scrollToBottom();
              let data = xhr.response;
              console.log(data);
              if(data="Exit"){
                location.reload();
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}


setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatbox.innerHTML = data;
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 500);

function scrollToBottom(){
    chatbox.scrollTop = chatbox.scrollHeight;
  }

setInterval(()=>{
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/status.php", true);
  xhr.onload = () =>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        status_main.innerHTML = data;
      }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("incoming_id="+incoming_id);
},500)