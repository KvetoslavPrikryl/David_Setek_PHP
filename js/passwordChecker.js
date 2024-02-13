const password1 = document.getElementById("password1")
const password2 = document.getElementById("password2")
const paragraph = document.querySelector(".result-text")

password1.addEventListener("input", ()=>{
    const password1Value = password1.value
    const password2Value = password2.value

    if(password1Value === password2Value){
        paragraph.textContent = "Hesla jsou shodná.";
        paragraph.classList.remove("invalid");
        paragraph.classList.add("valid");
        console.log(paragraph)
    }else{
        paragraph.textContent = "Hesla nejsou shodná!";
        paragraph.classList.remove("valid");
        paragraph.classList.add("invalid");
    }

    if(password1Value == "" & password2Value == ""){
        paragraph.textContent = "";
    }
})

password2.addEventListener("input", ()=>{
    const password1Value = password1.value
    const password2Value = password2.value

    if(password1Value === password2Value){
        paragraph.textContent = "Hesla jsou shodná.";
        paragraph.classList.remove("invalid");
        paragraph.classList.add("valid");
        console.log(paragraph)
    }else{
        paragraph.textContent = "Hesla nejsou shodná!";
        paragraph.classList.remove("valid");
        paragraph.classList.add("invalid");
    }

    if(password1Value == "" & password2Value == ""){
        paragraph.textContent = "";
    }
})