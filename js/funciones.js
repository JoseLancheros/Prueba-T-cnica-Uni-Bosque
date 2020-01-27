function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch(e) {
	   try {
		  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	   } catch(E) {
			xmlhttp = false;
	   }
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		   xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
/* validacion de existaencia de usuario */
function valida_usuario(){
	
    numidenti=document.form1.numident.value;	   
	document.form1.numident.focus()
	divResultado = document.getElementById('resultado');
    ajax=objetoAjax();
	
    ajax.open("POST", "./models/ajax_validacion.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//divResultado.innerHTML =ajax.responseText;//"<p style=\"background-color:#585858;border:2px solid red;width:300px;color:white;\"><b>Usuario ya existe</b></p>";
			
			if(ajax.responseText===numidenti){
				//document.getElementById('numident').value=0
				console.log(ajax.responseText);
				console.log(numidenti);
				//divResultado.innerHTML="<p style=\"background-color:#585858;border:2px solid red;width:300px;color:white;\"><b>Usuario ya existe</b></p>";
			}
		}
    }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("&numident="+numidenti)	
}