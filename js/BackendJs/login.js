const forml = document.querySelector(".login-form"),
continueBtnl = forml.querySelector(".loginBTN"),
errorTextl = forml.querySelector(".error.login");
console.log(forml,continueBtnl,errorTextl)
forml.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtnl.onclick = ()=>{
    let xhrl = new XMLHttpRequest();
    xhrl.open("POST", "php/login.php", true);
    xhrl.onload = ()=>{
      if(xhrl.readyState === XMLHttpRequest.DONE){
          if(xhrl.status === 200){
              let datal = xhrl.response;
              if(datal === "success"){
                location.href = "index.php";
              }else{
                errorTextl.style.display = "block";
                errorTextl.textContent = datal;
              }
          }
      }
    }
    let formDatal = new FormData(forml);
    xhrl.send(formDatal);
}