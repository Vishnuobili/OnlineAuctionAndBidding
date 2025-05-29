var forms = document.querySelector(".signup-form"),
continueBtns = forms.querySelector(".signupBTN"),
errorTexts = forms.querySelector(".error.signup");
console.log(forms,continueBtns,errorTexts);
forms.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtns.onclick = ()=>{
    let xhrs = new XMLHttpRequest();
    xhrs.open("POST", "php/signup.php", true);
    xhrs.onload = ()=>{
      if(xhrs.readyState === XMLHttpRequest.DONE){
          if(xhrs.status === 200){
              let datas = xhrs.response;
              if(datas === "success"){
                location.href = "index.html";
              }else{
                errorTexts.style.display = "block";
                errorTexts.textContent = datas;
              }
          }
      }
    }
    let formDatas = new FormData(forms);
    xhrs.send(formDatas);
}