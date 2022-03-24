const formAdminLogin = document.querySelector(".wrapperadm form"),

buttonAdmLogin = formAdminLogin.querySelector("button");

formAdminLogin.onsubmit = (e) =>{
    e.preventDefault();
}

buttonAdmLogin.onclick = () =>{
    let xhr = new XMLHttpRequest();
    const done = XMLHttpRequest.DONE;

    xhr.open("POST", "php/adminlogin.php", true);

    xhr.onload = () =>{
        if(xhr.readyState === done){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data != "success"){
                    alert(data);
                }

                if(data == "success"){
                    location.href="../admin/";
                }
            }
        }
    }

    let formdata = new FormData(formAdminLogin);
    xhr.send(formdata);
}