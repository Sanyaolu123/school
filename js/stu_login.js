const formStu_Login = document.querySelector(".wrapper_stul form"),
buttonStu_Login = formStu_Login.querySelector("button");


formStu_Login.onsubmit = (e) =>{
    e.preventDefault();
}

buttonStu_Login.onclick = () =>{
    let xhr = new XMLHttpRequest();
    
    const done = XMLHttpRequest.DONE;

    xhr.open("POST", "php/allrequests.php?stud_login", true);

    xhr.onload = () => {
        if(xhr.readyState === done){
            if(xhr.status === 200){
                let data = xhr.response;
                

                if(data != "success"){
                    alert(data);
                }
                if(data == "success"){
                    location.href="dashboard/";
                }
            }
        }
    }

    let formdata = new FormData(formStu_Login);
    xhr.send(formdata);
}