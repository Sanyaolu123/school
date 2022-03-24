const formtr = document.querySelector(".wrappertr form"),
buttontr = formtr.querySelector("button");

formtr.onsubmit = (e) =>{
    e.preventDefault();
}

buttontr.onclick = () =>{
    let xhr = new XMLHttpRequest();
    const done = XMLHttpRequest.DONE;

    xhr.open("POST", "../php/allrequests.php?t_rejoin", true);
    xhr.onload = () =>{
        if(xhr.readyState === done){
            if(xhr.status === 200){
                let data = xhr.response;
                

                if(data == "success"){
                    location.href="../classes/";
                }
                if(data != "success"){
                    alert(data);
                }
            }
        }
    }
    let formdata = new FormData(formtr);
    xhr.send(formdata);
}