
var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject(){
var xmlHttp;

if(window.ActiveXObject){ 
    try{
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }catch(e){
        xmlHttp = false;
    }
}else{ 
    try{
        xmlHttp = new XMLHttpRequest();
    }catch(e){
        xmlHttp = false;
    }
}

if(!xmlHttp)
    alert("Cant create that object !")
else
    return xmlHttp;
}


function process_login(){
    
if(xmlHttp.readyState==0 || xmlHttp.readyState==4){
    login = encodeURIComponent(document.getElementById("username").value);
    xmlHttp.open("POST", "login.php",true);
    
    xmlHttp.onreadystatechange = handleLogin;
        xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlHttp.send('login=' + login);
    
}else{
    setTimeout('process_login()',1000);
}  
}
function process_password(){
    if(xmlHttp.readyState==0 || xmlHttp.readyState==4){
    password = encodeURIComponent(document.getElementById("password").value);
    login2 = encodeURIComponent(document.getElementById("username").value);
    xmlHttp.open("POST", "login.php",true);
    
    xmlHttp.onreadystatechange = handlePassword;
        xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlHttp.send('password='+ password+"&"+'login2='+ login2);
}else{
    setTimeout('process_password()',1000);
}
}
function handleLogin(){
    
if(xmlHttp.readyState==4){ 
    if(xmlHttp.status==200){
        xmlDocumentElement=xmlHttp.responseXML.documentElement.getElementsByTagName("errorLogin");
        //alert(xmlDocumentElement[0]);
        msg= xmlDocumentElement[0].firstChild.nodeValue;
        //alert(msg);
        document.getElementById("err_log").src =msg;
        
        setTimeout('process_login()', 1000);
    }else{
        alert('Someting went wrong !');
    }
}
}

function handlePassword(){
    if(xmlHttp.readyState==4){ 
    if(xmlHttp.status==200){
     x=xmlHttp.responseXML.documentElement.getElementsByTagName("errorPassword");
     msg=x[0].firstChild.nodeValue;
    
     document.getElementById("err_pass").src =msg;
         
    }else{
        alert('Someting went wrong !');
    }
}
}


