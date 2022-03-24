const formStudent = document.querySelector(".wrapperstu form"),
buttonSS = formStudent.querySelector("button");

formStudent.onsubmit = (e) =>{
    e.preventDefault();
}

buttonSS.onclick = () =>{
    let xhr = new XMLHttpRequest();
    const done = XMLHttpRequest.DONE;

    xhr.open("POST", "php/register_stud.php", true);

    xhr.onload = () =>{
        if(xhr.readyState === done){
            if(xhr.status === 200){
                let data = xhr.response;
                alert(data);
            }
        }
    }

    let formdata = new FormData(formStudent);
    xhr.send(formdata);
}