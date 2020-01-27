<STYLE TYPE="text/css">
<!--
body{
background-image:url('img/Music_fondo.jpg');
background-repeat:no-repeat;
}


  .mi-menu  {
   
    border-radius: 10px;
    list-style-type: none;
    margin: 0 auto; /* si queremos centrarlo */
    padding: 0;
    /* su ancho dependerán de los textos */
    height: 40px; 
    width: auto;
    /* el color de fondo */
	
    background: #555;
    background: -moz-linear-gradient(#555,#222);
    background: -webkit-linear-gradient(#555,#222);
    background: -o-linear-gradient(#555,#222);
    background: -ms-linear-gradient(#555,#222);
    background: linear-gradient(#555,#222);
	
  }

  /* si es necesario, evitamos que Blogger de problemas con los saltos de línea cuando escribimos el HTML */
  .mi-menu  br { display:none; }

  /* cada item del menu */
  .mi-menu  li {
    display: block;
    float: left; /* la lista se ve horizontal */
    height: 40px;
    list-style: none;
    margin: 0;
    padding: 0;
    position: relative;
	
  }
  .mi-menu li a {
    border-left: 1px solid #000;
    border-right: 1px solid #666;
    color: #EEE;
    display: block;
    font-family:Comic Sans MS;
    font-size: 14px;
    font-weight: bold;
    line-height: 20px;
    padding: 0 14px;
    margin: 6px 0;
    text-decoration: none;
    /* animamos el cambio de color de los textos */
    -webkit-transition: color .2s ease-in-out;
    -moz-transition: color .2s ease-in-out;
    -o-transition: color .2s ease-in-out;
    -ms-transition: color .2s ease-in-out;
    transition: color .2s ease-in-out;
	
  }
  /* eliminamos los bordes del primer y el último */
  .mi-menu li:first-child a { border-left: none; }
  .mi-menu li:last-child a{ border-right: none; }
  /* efecto hover cambia el color */
.mi-menu li:hover > a 
  { 
  background: #990;
  font-family:Comic Sans MS;
  font-size: 14px;
  line-height:28px;
  color: #000;
  
  }

  /* los submenús */
  .mi-menu ul {
    border-radius: 0 0 5px 5px;
    left: 0;
    margin: 0;
    opacity: 0; /* no son visibles */
    position: absolute;
    top: 40px; /* se ubican debajo del enlace principal */
    /* el color de fondo */
    background: #222;
    background: -moz-linear-gradient(#222,#555);
    background: -webkit-linear-gradient(#22,#555);
    background: -o-linear-gradient(#222,#555);
    background: -ms-linear-gradient(#222,#555);
    background: linear-gradient(#222,#555);
    /* animamos su visibildiad */
    -moz-transition: opacity .25s ease .1s;
    -webkit-transition: opacity .25s ease .1s;
    -o-transition: opacity .25s ease .1s;
    -ms-transition: opacity .25s ease .1s;
    transition: opacity .25s ease .1s;
	
  }
  /* son visibes al poner el cursor encima */
  .mi-menu li:hover > ul { opacity: 1; }

   /* cada un ode los items de los submenús */
  .mi-menu ul li {
     /* no son visibles */
	overflow: hidden;
	right:30;
    padding:0;
	height: 10;
	
    /* animamos su visibildiad */
    -moz-transition: height .25s ease .1s;
    -webkit-transition: height .25s ease .1s;
    -o-transition: height .25s ease .1s;
    -ms-transition: height .25s ease .1s;
    transition: height .25s ease .1s;
  }
  .mi-menu li:hover > ul li {
    height: 40px; /* los mostramos */
    overflow: visible;
    padding: 0;
	width:100;
	
  }
  .mi-menu ul li a {
    right:30;
    border:0;
    border-bottom: 1px solid #999000;
    margin-left:10;
    /* el ancho dependerá de los textos a utilizar */
    padding: 4px 0px 15px 25px;
	height: 14px; 
    width:100;
	
  }
   
  
  /* el último n otiene un borde */
  .mi-menu ul li:last-child a { border: none;}



--></STYLE>
<div align="center">
<table border='0' >
<td>

<ul class="mi-menu">
<li><a href="index.php"> Inicio </a></li>
<?php 

if($_SESSION['conectado']=='si'){?> 
<li><a href='?w=personal'><b>Personal</b></a></li>
<li><a href='?w=vehiculos'><b>Vehiculos</b></a></li>
<li><a href='?w=documentos'><b>Documentos</b></a></li>
<li><a href='?w=rutas'><b>Rutas</b></a></li>
<li><a href='?w=enrutamiento'><b>Enrutamiento</b></a></li>
<li><a href='?w=logout'><b>Salir</b></a></li>
<?php } else {?>

	<li><a href='?w=login'><b>Ingresar</b></a></li>

<?php }?>








	
	
	
</ul>

	 


</td>
<table>
</div>