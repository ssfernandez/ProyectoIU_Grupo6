<?php
session_start();
if(!isset($_SESSION['idioma']) ){
    session_destroy();
    header("Location: ../../index.php?logout=true");
  }


if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
header("Location: ../../index.php");
}
include('../../Interfaz/Cabecera.php');
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <li class="contBandera"><a href="../../Controllers/ESPACIOS_Controller.php?idioma=esp&acc=Buscar"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
            <li class="contBandera"><a href="../../Controllers/ESPACIOS_Controller.php?idioma=eng&acc=Buscar"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>
          </ul>
        </div>
          
        
      </div><!-- /container -->
    </div>
    <!-- /Header -->
<?php
    include('../../Interfaz/BarraLateral.php');
?>

<div class="col-xs-1">
</div>

<div class="col-xs-8"><!-- 8 -->
	<div>
		<form action="../../Controllers/ESPACIOS_Controller.php" method="POST">
			<fieldset>
			<!-- Form Name -->
			
				<legend><?=TITULO_LIST_SPACE?></legend>
				

				<!-- Text input-->
				
				  <label class="col-xs-1 control-label" for="besp"><?=FILTER?></label>  
				  <div class="col-xs-3">
				  <input id="bSpace" name="bSpace" type="text" placeholder="" class="form-control input-xs" >
				  </div>
				  <div class="col-xs-1" id="ConsultarUsrButtons">
				  <?php
				   echo '<input type="hidden" name="acc" value="Buscar" >';
			   	   echo '<input type="submit" value="'.BUSCAR.'" class="btn">';
				   ?>
				  </div>
				
			</fieldset>
		</form>
	</div>
	

	<div class="col-xs-10">
		<table class="table table-striped table-bordered table-list " id="tablaConsultaUsuarios">
              	<thead>
                    <tr>
                        <th id='textoConsultSpace'><?=CODE_INPUT?></th>
                        <th id='textoConsultSpace'><?=SPACE_SEATING_INPUT?></th>
                        <th id='textoConsultSpace'><?=SPACE_NAME_INPUT?></th>
                        <th id='textoConsultSpace'><?=SPACE_TYPE_INPUT?></th>

                        <th><em class="fa fa-cog"></em></th>
                    </tr> 
              	</thead>
              	<tbody >
                        <?php
		                           			$ax = $_SESSION['espacios'];
											for ($i=0; $i < sizeof($ax) ; $i+=4) { 
											 	?>
											  <tr>
											  	<?php  		
											  	echo "<td id='textoConsultUserxt' align='center'>".$ax[$i]."</td>";
											  	echo "<td id='textoConsultUserxt' align='center'>".$ax[$i+1]."</td>";
											  	echo "<td id='textoConsultUserxt' align='center'>".$ax[$i+2]."</td>";
											  	echo "<td id='textoConsultUserxt' align='center'>".$ax[$i+3]."</td>";
											  
											  	?>
											  	<td align="center" >
											  	<?php
			                            			echo '<a class="btn btn-default glyphicon glyphicon-list-alt" href="../../Controllers/ESPACIOS_Controller.php?acc=Consultar&cod='.$ax[$i].'"></em></a>'
			                            		?>
			                        			</td>
											  </tr>
											  <?php
											}
		                           			?>
                    
                 </tbody>
            </table>
		</div>
	</div><!-- /8 -->
</body>
</html>
