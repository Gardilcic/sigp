
	<style>
	body{
		font: normal 13px Arial;	
		padding-top: 20px;
	}
	.barra{
		background: url('libs/img/barra.jpg') center repeat-y; 
		background-color: #EEE; border: 0px;
		height: 8px;
	}
	.derecha{
		text-align:right;
	}
	.color-negro{
		font-weight: bold;
		color: black;
	}
	.color-verde{
		font-weight: bold;
		color: #5c9a4d;
	}
	.color-plomo{
		color: #b5b5b5;
	}
	#carousel {
		width:800px;
		height: 130px;
		display: relative;
		margin: 0 auto;
	}
	#carousel img {
		display: hidden; /* hide images until carousel prepares them */
		cursor: pointer; /* not needed if you wrap carousel items in links */
	}
	th.headerSortUp { 
	    background-image: url('libs/img/asc.gif'); 
	    background-repeat: no-repeat;
	    background-position: 95%;
	} 
	th.headerSortDown { 
	    background-image: url('libs/img/desc.gif'); 
	    background-repeat: no-repeat;
	    background-position: center right; 

	} 
	th.header {  
		/*background-image: url('libs/img/bg.gif');   */  
	    cursor: pointer; 
	    font-weight: bold; 
	    background-repeat: no-repeat; 
	    background-position: center right; 
	    border-right: 1px solid #dad9c7; 
	    margin-left: -1px; 
	    background-color: #EEE;

	} 
	    
	</style>  

	<div class="navbar navbar-fixed-top">
      <div class="barra">
        <div class="container" style="width:80%;"></div>
      </div>
    </div>

	<div class="container">
    	<div style="position: absolute; float: left;"><img src="libs/img/logo.jpg" border="0" /></div>
    	<div style="position: absolute; float: right; left: 77%;">
			<p><span class="color-negro">Bienvenido:</span> <span class="color-verde"><?php echo $_SESSION['nombre'] ?></span>
			<a href="exit.php"><span class="color-plomo">[Salir]</span></a> </p>
		</div>

		<div id="carousel">
			<img src="libs/img/modulo_control_avance.png" alt="Modulo de Control de Avance" />
			<img src="libs/img/modulo_planificacion.png" alt="Modulo de Planificacion" menu="menu2" />
			<img src="libs/img/modulo_planificacion_integrada.png" alt="Modulo de Planificacion Integrada" />
			<img src="libs/img/modulo_gestion_costos.png" alt="Modulo de Gestion de Costos" />
			<img src="libs/img/modulo_pcm.png" alt="Modulo PCM" />
			<img src="libs/img/modulo_administracion.png" alt="Modulo de Administracion" menu="menu1" />
		</div>
		<br />
		<div class="navbar barra-menu" id="menu1" style="display:none;">  
	        <div class="navbar-inner">  
	            <div class="container">  
	                <ul class="nav">  
	                    <a class="brand" href="#"></a>  
	                    <li class="active"><a href="#">Nuevo Usuario</a></li>  
	                    <li><a href="#">Opcion</a></li>  
	                    <li><a href="#">Opcion</a></li>  
	                    <li><a href="#">Opcion</a></li>  
	                    <li class="dropdown" id="accountmenu">  
	                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Opcion<b class="caret"></b></a>  
	                        <ul class="dropdown-menu">  
	                            <li><a href="#">Sub-Opcion</a></li>  
	                            <li><a href="#">Sub-Opcion</a></li>  
	                            <li class="divider"></li>  
	                            <li><a href="#">Sub-Opcion</a></li>  
	                            <li><a href="#">Sub-Opcion</a></li>  
	                        </ul>  
	                    </li>  
	                </ul>  
	            </div>  
	        </div>  
	    </div>  
	    <div class="navbar barra-menu" id="menu2" style="display:none;">  
	        <div class="navbar-inner">  
	            <div class="container">  
	                <ul class="nav">  
	                    <a class="brand" href="#"></a>  
	                    <li class="active"><a href="#">Opcion2</a></li>  
	                    <li><a href="#">Opcion2</a></li>  
	                    <li><a href="#">Opcion2</a></li>  
	                    <li><a href="#">Opcion2</a></li>  
	                    <li class="dropdown" id="accountmenu">  
	                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Opcion2<b class="caret"></b></a>  
	                        <ul class="dropdown-menu">  
	                            <li><a href="#">Sub-Opcion2</a></li>  
	                            <li><a href="#">Sub-Opcion2</a></li>  
	                            <li class="divider"></li>  
	                            <li><a href="#">Sub-Opcion2</a></li>  
	                            <li><a href="#">Sub-Opcion2</a></li>  
	                        </ul>  
	                    </li>  
	                </ul>  
	            </div>  
	        </div>  
	    </div>  
	</div>
<?php ?>
