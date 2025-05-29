const form = document.querySelector(".form-main"),
continueBtn = form.querySelector(".btn"),
errorText = form.querySelector(".error"),
AuctionId = form.querySelector(".auc_id").value;
form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/declarewinner.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                errorText.style.display = "block";
                errorText.classList.add("success");
                errorText.textContent = "Winner declaration Successfull";
                window.location.href = "chat.php?AuctionId="+AuctionId
              }else{
                errorText.style.display = "block";
                errorText.textContent = data;
              }
              errorText.style.marginBottom="10px";
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}