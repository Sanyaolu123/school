const formCClass = document.querySelector(".wrapperjc form"),

buttonCClass = formCClass.querySelector("button");

formCClass.onsubmit = (e) =>{
    e.preventDefault();
}

buttonCClass.onclick = () =>{
    let xhr = new XMLHttpRequest();
    const done = XMLHttpRequest.DONE;

    xhr.open("POST", "../php/allrequests.php?join_class", true);
    xhr.onload = () =>{
        if(xhr.readyState === done){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data != "success"){
                    alert(data);
                }else{
                    location.href = "./";
                }


            }
        }
    }
    let formdata = new FormData(formCClass);
    xhr.send(formdata);
}