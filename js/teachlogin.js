const formTLogin = document.querySelector(".wrapperte form"),
buttonTS = formTLogin.querySelector("button");

formTLogin.onsubmit = (e) =>{
    e.preventDefault();
}

buttonTS.onclick = () =>{
    let xhr = new XMLHttpRequest();
    const done = XMLHttpRequest.DONE;

    xhr.open("POST", "../php/allrequests.php?t_login", true);
    xhr.onload = () =>{
        if(xhr.readyState === done){
            if(xhr.status === 200){
                let data = xhr.response;
                

                if(data == "success"){
                    location.href="../dashboard/";
                }
                if(data != "success"){
                    alert(data);
                }
            }
        }
    }
    let formdata = new FormData(formTLogin);
    xhr.send(formdata);
}