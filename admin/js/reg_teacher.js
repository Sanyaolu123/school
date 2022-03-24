const formTeacher = document.querySelector(".teacher form");

const tButton = formTeacher.querySelector("button");

formTeacher.onsubmit = (e) =>{
    e.preventDefault();
}

tButton.onclick = () =>{
    let xhr = new XMLHttpRequest();
    const done = XMLHttpRequest.DONE;

    xhr.open("POST", "php/register_teach.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === done){
            if(xhr.status === 200){
                let data = xhr.response;
                alert(data);
            }
        }
    }
    let formdata = new FormData(formTeacher);
    xhr.send(formdata);
}