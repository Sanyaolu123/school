const formCreateClass = document.querySelector(".wrapperClass form"),
buttonCreateClass = formCreateClass.querySelector("button");

formCreateClass.onsubmit = (e) =>{
    e.preventDefault();
}

buttonCreateClass.onclick = () =>{
    let xhr = new XMLHttpRequest();
    const done = XMLHttpRequest.DONE;

    xhr.open("POST", "../php/allrequests.php?create_class", true);
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
    let formdata = new FormData(formCreateClass);
    xhr.send(formdata);
}
