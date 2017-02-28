<?php
$categoria = " and cli_delete=0 ";
if ($lang!='es') $urlLangAux=$lang.'/';
else $urlLangAux='';

$search = admin::toSql(admin::getParam("search"),"String");
if (!$search || $search=='')
{
$_pagi_sql= "select * from mdl_solicitud_compra where sol_delete=0";
$nroReg=admin::getDBvalue("select * from mdl_solicitud_compra where sol_delete=0");
}
else
{
$_pagi_sql= "select * from mdl_solicitud_compra where sol_delete=0 and sol_observaciones like '%$search%'";
$nroReg=admin::getDBvalue(" ");
}

$_pagi_cuantos = 20;//Eleg� un n�mero peque�o para que se generen varias p�ginas
//cantidad de enlaces que se mostrar�n como m�ximo en la barra de navegaci�n
$_pagi_nav_num_enlaces = 5;//Eleg� un n�mero peque�o para que se note el resultado
//Decidimos si queremos que se muesten los errores de mysql
$_pagi_mostrar_errores = false;//recomendado true s�lo en tiempo de desarrollo.
include("core/paginator.inc.php");

if ($nroReg>0)
	{
	?>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
      <td width="77%" height="40"><span class="title"><?=admin::modulesLabels()?></span></td>
      <td width="23%" height="40" align="right">
        <?php
        $valuePermit=admin::getDBvalue("select moa_status from sys_modules_options,sys_modules_access where mop_uid=moa_mop_uid and mop_status='ACTIVE'and mop_mod_uid=$moduleCrearId and mop_lab_category='Crear' and moa_rol_uid=".$_SESSION['usr_rol']."");
	if($valuePermit=='ACTIVE'){?>
            <a href="<?=admin::modulesLink($etiquetaCrear)?>&token=<?=admin::getParam("token")?>"><?=admin::modulesLabels($etiquetaCrear)?></a>
        <?php
        }
        ?>
            &nbsp;  
      </td>
  </tr>
  <tr style="display:">
	<td width="90%" height="40"></td>
    <td>
        <div class="boxSearch">
        <form name="frmbuySearch" action="clientList.php" >
        <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
         <tr>
          <td>
            <input type="text" name="search" id="search" value="<?=$search?>" class="input7" />
          </td>
          <td>
          <input name="Buscar" id="Buscar" type="image" src="lib/buscar.png" />
           <input type="hidden" name="qfiltro" id="qfiltro" value="1"/>
           <input type="hidden" name="token" value="<?=admin::getParam("token")?>" />
          </td>
         </tr>
        </table>
         </form>
       </div>
   </td>
  </tr>
  <tr>
    <td colspan="2" width="98%">
  <table width="98%" border="0"  style="padding-left:17px;">
	<tr>
    	<td width="15%" class="list1a" style="color:#16652f;">Fecha:</td>
        <td width="15%" class="list1a" style="color:#16652f;">Nro Solicitud:</td>
	<td width="15%" style="color:#16652f">Unidad:</td>
	<td width="15%" style="color:#16652f">Observaciones:</td>
        <td width="15%" style="color:#16652f">Usuario:</td>
        <td width="10%" style="color:#16652f">Estado:</td>
        <td align="center" width="5%" height="5"></td>
   		<td align="center" width="5%" height="5"></td>
		<td align="center" width="5%" height="5"></td>
		<td align="center" width="5%" height="5"></td>
		<td align="center" width="5%" height="5"></td>
		<td align="center" width="5%" height="5"></td>
	</tr>
	</table>
</td>
  </tr>
  <tr>
    <td colspan="2" id="contentListing">
	<?php
$i=1;
while ($sol_list = $pagDb->next_record())
	{
	$solUid = $sol_list["sol_uid"];
	$solDate = $sol_list["sol_date"];
	$solObservaciones = $sol_list["sol_observaciones"];
	$solUsuUid = admin::getDbValue("select concat(usr_firstname,' ',usr_lastname) form sys_users where usr_uid=".$sol_list["sol_usu_uid"]);
	$solEstado = $sol_list["sol_estado"];
        $unidadArray =  admin::dbFillArray("select uni_uid, uni_description from mdl_unidad, mdl_solicitud_unidad where sor_uni_uid=uni_uid and sor_sol_uid=$solUid group by uni_uid, uni_description");
        $k=0; 
        $solUnidad="";
        if(is_array($unidadArray))
        foreach($unidadArray as $key => $value)
        {
            if($k==0) $solUnidad.= $value;
            else $solUnidad.= ",".$value;
            $k++;
        }
        else $solUnidad="Sin asignar";
        
        switch ($solEstado) {
            case 1:
                $solEstado="Solicitud";
                break;
            case 2:
                $solEstado="Aprobado";
                break;
            case 3:
                $solEstado="Rechazado";
                break;
            default:
                $solEstado="Solicitud";
                break;
        }
  	?> 
  	<div id="sub_<?=$sol_uid?>" class="<?=$class?>">
<table class="list" width="100%" border="0">
	<tr>
    	<td width="15%"><?=$solDate?></td>
    	<td width="15%"><?=$solUid?></td>
    	<td width="15%"><?=$solUnidad?></td>
    	<td width="15%"><?=$solObservaciones?></td>
        <td width="10%"><?=$solUsuUid?></td>        
        <td width="10%"><?=$solEstado?></td>        
        <td align="center" width="5%" height="5">
            <?php
                $valuePermit=admin::getDBvalue("select moa_status from sys_modules_options,sys_modules_access where mop_uid=moa_mop_uid and mop_status='ACTIVE'and mop_mod_uid=$moduleListId and mop_lab_category='Ver' and moa_rol_uid=".$_SESSION['usr_rol']."");
                if($valuePermit=='ACTIVE'){
            ?>
    	<a href="clientView.php?cli_uid=<?=$cli_uid?>&token=<?=admin::getParam("token");?>">
            <img src="lib/view_es.gif" border="0" title="<?=admin::labels('view')?>" alt="<?=admin::labels('view')?>">
	</a>
            <?php
        }else{
            ?>
            <img src="lib/view_off_es.gif" border="0" title="<?=admin::labels('view')?>" alt="<?=admin::labels('view')?>">
        <?php
        
        }
        ?>
    </td>
	<td align="center" width="5%" height="5">
            <?php
            $valuePermit=admin::getDBvalue("select moa_status from sys_modules_options,sys_modules_access where mop_uid=moa_mop_uid and mop_status='ACTIVE'and mop_mod_uid=$moduleListId and mop_lab_category='Editar' and moa_rol_uid=".$_SESSION['usr_rol']."");
            if($valuePermit=='ACTIVE'){
            ?>
    	<a href="clientEdit.php?cli_uid=<?=$cli_uid?>&token=<?=admin::getParam("token");?>">
		<img src="lib/edit_es.gif" border="0" title="<?=admin::labels('edit')?>" alt="<?=admin::labels('edit')?>">
	</a>
            <?php
        }else{
            ?>
		<img src="lib/edit_off_es.gif" border="0" title="<?=admin::labels('edit')?>" alt="<?=admin::labels('edit')?>">

            <?php
            }
            ?>
    </td>
	<td align="center" width="5%" height="5">
            <?php
            $valuePermit=admin::getDBvalue("select moa_status from sys_modules_options,sys_modules_access where mop_uid=moa_mop_uid and mop_status='ACTIVE'and mop_mod_uid=$moduleListId and mop_lab_category='Eliminar' and moa_rol_uid=".$_SESSION['usr_rol']."");
            if($valuePermit=='ACTIVE'){
            ?>
                <a href="" onclick="removeList(<?=$cli_uid?>); return false;">
		<img src="lib/delete_es.gif" border="0" title="<?=admin::labels('delete')?>" alt="<?=admin::labels('delete')?>">
		</a>
            <?php
            }else{
            ?>
            <img src="lib/delete_off_es.gif" border="0" title="<?=admin::labels('delete')?>" alt="<?=admin::labels('delete')?>">
	    <?php
            }
            ?>
            
    </td>
	<td align="center" width="5%" height="5">
    <div id="status_<?=$cli_uid?>">
        <?php
            $valuePermit=admin::getDBvalue("select moa_status from sys_modules_options,sys_modules_access where mop_uid=moa_mop_uid and mop_status='ACTIVE'and mop_mod_uid=$moduleListId and mop_lab_category='Estado' and moa_rol_uid=".$_SESSION['usr_rol']."");
            if($valuePermit=='ACTIVE'){
            ?>
	   <a href=""  onclick="clientCS('<?=$cli_uid?>','<?=$cli_status?>'); return false;">
		<img src="<?=admin::labels($labels_content,'linkImage')?>" border="0" title="<?=admin::labels($labels_content)?>" alt="<?=admin::labels($labels_content)?>">
	   </a>
        <?php
            }else{
                $status = ($cli_status=='ACTIVE') ? 'active_off_es.gif':'inactive_off_es.gif';
        ?>
        <img src="lib/<?=$status?>" border="0" title="<?=admin::labels($labels_content)?>" alt="<?=admin::labels($labels_content)?>">
        <?php
            }
        ?>
	</div>
    </td>
    <td align="center" width="5%" height="5">
	
                <?php
                $valuePermit=admin::getDBvalue("select moa_status from sys_modules_options,sys_modules_access where mop_uid=moa_mop_uid and mop_status='ACTIVE'and mop_mod_uid=$moduleListId and mop_lab_category='Aprobar' and moa_rol_uid=".$_SESSION['usr_rol']."");
                if(($valuePermit=='ACTIVE')&&($cli_status_main==0)){
                ?>
                    <a href="aprobarSubasta" onclick="aprobarSubasta('<?=$cli_uid?>');return false;">
                        <img src="lib/aprobar_on.png" border="0" title="Aprobar" alt="Aprobar">
                    </a>
                <?php
                }else{
                ?>
                    <img src="lib/aprobar_off.png" border="0" title="Aprobar" alt="Aprobar">
	    <?php
                }
            ?>

	</td>
        
        <td align="center" width="5%" height="5">
	
                <?php
                $valuePermit=admin::getDBvalue("select moa_status from sys_modules_options,sys_modules_access where mop_uid=moa_mop_uid and mop_status='ACTIVE'and mop_mod_uid=$moduleListId and mop_lab_category='Rechazar' and moa_rol_uid=".$_SESSION['usr_rol']."");
                if(($valuePermit=='ACTIVE')&&($cli_status_main==0)){
                ?>

         	    <a href="rechazarSubasta" onclick="rechazarSubasta('<?=$cli_uid?>');return false;">
                	<img src="lib/rechazar_on.png" border="0" title="Rechazar" alt="Rechazar">
                    </a>
                <?php
                    }else{
                ?>
                	<img src="lib/rechazar_off.png" border="0" title="Rechazar" alt="Rechazar">
		<?php
                    }
                ?>

	</td>
		</tr>
	</table>
	</div>
	<?php
	$i++;
	}  
        ?>
    </td>
    </tr>
    <tr><td width="100%">
	<table border="0" width="100%">
			  <td colspan="3" align="right" class="txt10"><span class="txt11">
			    <?php		   
				//Incluimos la barra de navegaci�n
				if ($_pagi_totalReg==0) 
					{
					echo "<font face=arial></font>";
					}
					else
					{
					echo $_pagi_navegacion;
					//Incluimos la informaci�n de la p�gina actual
					echo $_pagi_info;
					}		
				?>
			  </span></td>
			</tr>
			</table>
	</td></tr>
</table><br />
<br />
<br />
<?php
} 
else
	{ 
    ?>
	<br />
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0"> 
<tr>
        <td width="77%" height="40"><span class="title"><?=admin::modulesLabels()?></span></td>
    <td width="23%" height="40" align="right">
       <?php
        $valuePermit=admin::getDBvalue("select moa_status from sys_modules_options,sys_modules_access where mop_uid=moa_mop_uid and mop_status='ACTIVE'and mop_mod_uid=$moduleCrearId and mop_lab_category='Crear' and moa_rol_uid=".$_SESSION['usr_rol']."");
	if($valuePermit=='ACTIVE'){?>
            <a href="<?=admin::modulesLink($etiquetaCrear)?>&token=<?=admin::getParam("token")?>"><?=admin::modulesLabels($etiquetaCrear)?></a>
        <?php
        }
        ?>
            &nbsp;  
        
        &nbsp;</td>
  </tr>
  <tr>
	<td width="90%" height="40"></td>
    <td>
        <div class="boxSearch">
        <form name="frmbuySearch" action="clientList.php" >
        <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
         <tr>
          <td>
            <input type="text" name="search" id="search" value="<?=$search?>" class="input7" />
          </td>
          <td>
          <input name="Buscar" id="Buscar" type="image" src="lib/buscar.png" />
           <input type="hidden" name="qfiltro" id="qfiltro" value="1"/>
           <input type="hidden" name="token" value="<?=admin::getParam("token")?>" />
          </td>
         </tr>
        </table>
         </form>
       </div>
   </td>
  </tr>  
  <tr>
    <td colspan="2" id="contentListing">
<div  style="background-color: #f7f8f8;">
<table class="list"  width="100%">
	<tr><td height="30px" align="center" class="bold">
	<?=admin::labels('client','noclient')?>
	</td></tr>	
 </table>
</div>
</td></tr></table>
<?php
}
?>