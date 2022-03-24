const formTloginC = document.querySelector(".wrappertcl form"),
buttonTloginC = formTloginC.querySelector("button");

formTloginC.onsubmit = (e) =>{
    e.preventDefault();
}

buttonTloginC.onclick = () =>{
    let xhr = new XMLHttpRequest();
    const done = XMLHttpRequest.DONE;

    xhr.open("POST", "../php/allrequests.php?class_activate", true);
    xhr.onload = () =>{
        if(xhr.readyState === done){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data != "success"){
                    alert(data);
                }
                if(data == "success"){
                    location.href = "../dashboard/";
                }
            }
        }
    
    }
    let formdata = new FormData(formTloginC);
    xhr.send(formdata);
}