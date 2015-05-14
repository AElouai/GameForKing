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
function test_url(){
if(xmlHttp.readyState==0 || xmlHttp.readyState==4){
   
    var url = window.location.href;
    var params= url.split('=');
    if(params[1]!=null)
    { xmlHttp.open("POST", "profile.php",true);
      
    xmlHttp.onreadystatechange = handleServerResponse;
        xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlHttp.send("visited=" + params[1]);}
  
}}
function handleServerResponse(){
if(xmlHttp.readyState==4){ 
    if(xmlHttp.status==200){  
        //x=xmlHttp.responseXML.documentElement;
        //firstName,lastName,score,followed,following,battles
        
         x0=xmlHttp.responseXML.documentElement.getElementsByTagName("f_name");
        x1=xmlHttp.responseXML.documentElement.getElementsByTagName("l_name");
        x2=xmlHttp.responseXML.documentElement.getElementsByTagName("score");
        x3=xmlHttp.responseXML.documentElement.getElementsByTagName("followed");
         x4=xmlHttp.responseXML.documentElement.getElementsByTagName("following");
         x5=xmlHttp.responseXML.documentElement.getElementsByTagName("battles");
followed=x3[0].firstChild.data;

        document.getElementById("fl_name").innerHTML =x0[0].firstChild.data+" "+x1[0].firstChild.data; 
         document.getElementById("score").innerHTML =x2[0].firstChild.data; 
          document.getElementById("following").innerHTML =x4[0].firstChild.data; 
           document.getElementById("followers").innerHTML =x3[0].firstChild.data; 
           document.getElementById("battles").innerHTML =x5[0].firstChild.data; 
    }else{
        alert('Someting went wrong !');
    }
}
}

 function follow(){
    if(xmlHttp.readyState==0 || xmlHttp.readyState==4){
         if(document.getElementById("follow").innerHTML!="Followed"){
             $fct=2;
              var url = window.location.href;
    var params= url.split('=');
    if(params[1]!=null){
        xmlHttp.open("POST", "follow2.php",true);
      
    xmlHttp.onreadystatechange = handlefollowing;
        xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
     xmlHttp.send("visited=" + params[1]);
   
        
    }
             
         }
    } 
 }

function handlefollowing(){
    if(xmlHttp.readyState==4){ 
    if(xmlHttp.status==200){  
        xmlDoc =xmlHttp.responseXML.documentElement;
        msg= xmlDoc.firstChild.data;
        if(msg==='ok')
      document.getElementById("follow").innerHTML="Followed";
  document.getElementById("followers").innerHTML=parseInt(document.getElementById("followers").innerHTML)+1;
 
        //document.getElementById("follow").innerHTML=
         
    }else{
        alert('Someting went wrong !');
    }
}
    
}
