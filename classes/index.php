<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class is Ongoing!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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