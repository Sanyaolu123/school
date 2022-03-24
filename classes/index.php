<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class is Ongoing!</title>
    <link rel="stylesheet" href="../plugins/tailwind/tailwind.css">
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.css">
</head>
<body class="h-screen bg-gray-200 flex" id="app">


<script>
    setInterval(() => {
        let xhr = new XMLHttpRequest();
        const done = XMLHttpRequest.DONE;

        xhr.open("get", "backend.php", true);
        xhr.onload = () =>{
            if(xhr.readyState === done){
                if(xhr.status === 200){
                    let data = xhr.responseText;
                    let box = document.getElementById("app");
                    
                    

                           if (data == "e"){
                               location.href="../";
                           }else{
                               box.innerHTML=data;
                           }
                        
                        
                    
                }
            }
        }
        xhr.send();

    }, 1000);
    

</script>
</body>
</html>