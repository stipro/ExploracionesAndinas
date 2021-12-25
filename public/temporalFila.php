<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
 
    <script>
    window.onload=function() {
 
		// creamos los eventos para cada elemento con la clase "boton"
		let elementos=document.getElementsByClassName("boton");
        console.log(elementos);
		for(let i=0;i<elementos.length;i++)
		{
 
			// cada vez que se haga clic sobre cualquier de los elementos,
			// ejecutamos la función obtenerValores()
			elementos[i].addEventListener("click",obtenerValores);
		}
    }
 
	// funcion que se ejecuta cada vez que se hace clic
	function obtenerValores(e) {
		var valores="";
 
		// vamos al elemento padre (<tr>) y buscamos todos los elementos <td>
		// que contenga el elemento padre
		var elementosTD=e.srcElement.parentElement.getElementsByTagName("td");
 
		// recorremos cada uno de los elementos del array de elementos <td>
		for(let i=0;i<elementosTD.length;i++)
		{
 
			// obtenemos cada uno de los valores y los ponemos en la variable "valores"
			valores+=elementosTD[i].innerHTML+"\n";
		}
 
		alert(valores);
	}
    </script>
 
    <style>
        .boton {border:1px solid #808080;cursor:pointer;padding:2px 5px;color:Blue;}
    </style>
</head>
 
<body>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <td>val 1</td>
            <td>val 2</td>
            <td>val 3</td>
            <td class="boton">coger valores de la fila</td>
        </tr>
        <tr>
            <td>val 4</td>
            <td>val 5</td>
            <td>val 6</td>
            <td class="boton">coger valores de la fila</td>
        </tr>
        <tr>
            <td>val 7</td>
            <td>val 8</td>
            <td>val 9</td>
            <td class="boton">coger valores de la fila</td>
        </tr>
    </table>
</body>
</html>