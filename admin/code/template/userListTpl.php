<?php
if ($lang!='es') $urlLangAux=$lang.'/';
else $urlLangAux='';

$autor = admin::toSql(admin::getParam("autor"),"Number");
if ($autor==0 && !$autor) $autor='';
else $autor=" and new_nec_uid=".$autor;

$order = admin::toSql(admin::getParam("order"),"Number");
if ($order==0) {$orderCode=' order by usr_uid desc'; $titClass='up'; $nameClass='up'; $dateClass='up';}
elseif ($order==1) {$orderCode='  order by usr_firstname asc'; $titClass='up'; $nameClass='up'; $dateClass='up';}
elseif ($order==2) {$orderCode='  order by usr_firstname desc'; $titClass='down'; $nameClass='up'; $dateClass='up';}
elseif ($order==3) {$orderCode='  order by usr_lastname asc'; $titClass='up'; $nameClass='up'; $dateClass='up';}
elseif ($order==4) {$orderCode='  order by usr_lastname desc'; $titClass='up'; $nameClass='down'; $dateClass='up';}
elseif ($order==5) {$orderCode='  order by rol_description asc'; $titClass='up'; $nameClass='up'; $dateClass='up';}
elseif ($order==6) {$orderCode='  order by rol_description desc'; $titClass='up'; $nameClass='up'; $dateClass='down';}

if ($titClass=='up') $titOrder=2;
else $titOrder=1;
if ($nameClass=='up') $nameOrder=4;
else $nameOrder=3;
if ($dateClass=='up') $dateOrder=6;
else $dateOrder=5;

$rolLogged = admin::getDBValue('select rol_description from mdl_roles_users left join mdl_roles on rus_rol_uid=rol_uid where rus_usr_uid='.$_SESSION["usr_uid"].' and rol_delete=0');
switch($rolLogged){
		case 'ROOT' : $noRoot=''; break;
		case 'ADMIN' :	$noRoot=" and rol_description<>'ROOT' "; break;
		case 'EDITOR' :	$noRoot=" and rol_description<>'ROOT' AND rol_description<>'ADMIN' "; break;
		default : $noRoot=" and usr_uid=".$_SESSION["usr_uid"]; break;
	
	}

$search = admin::toSql(admin::getParam("search"),"String");

if (!$search || $search==''){
	$_pagi_sql= "select usr_uid,usr_lastname,usr_firstname,usr_status, rol_description from sys_users,mdl_roles, mdl_roles_users where rus_rol_uid=rol_uid and usr_delete=0 and rus_usr_uid=usr_uid ".$noRoot.$orderCode;
	$nroReg=admin::getDBvalue("select count(usr_uid) from sys_users,mdl_roles, mdl_roles_users where rus_rol_uid=rol_uid and usr_delete=0 and rus_usr_uid=usr_uid ".$noRoot);
}
else{
	$_pagi_sql= "select usr_uid,usr_lastname,usr_firstname,usr_status, rol_description, rol_description from sys_users,mdl_roles, mdl_roles_users where rus_rol_uid=rol_uid and usr_delete=0 and rus_usr_uid=usr_uid and (MATCH(usr_login, usr_firstname, usr_lastname, usr_email, usr_phone, usr_cellular, rol_description) AGAINST('+".$search."%' IN BOOLEAN MODE) or usr_login like '%".$search."%' or usr_firstname like '%".$search."%' or usr_lastname like '%".$search."%' or usr_email like '%".$search."%' or usr_phone like '%".$search."%' or usr_cellular like '%".$search."%' or rol_description like '%".$search."%') ".$noRoot.$orderCode;
	$nroReg=admin::getDBvalue("select count(usr_uid) from sys_users,mdl_roles, mdl_roles_users where rus_rol_uid=rol_uid and usr_delete=0 and rus_usr_uid=usr_uid and usr_login like '%".$search."%' or usr_firstname like '%".$search."%' or usr_lastname like '%".$search."%' or usr_email like '%".$search."%' or usr_phone like '%".$search."%' or usr_cellular like '%".$search."%' or rol_description like '%".$search."%') ".$noRoot);
}	
//echo $_pagi_sql;
//krumo($_SESSION);
$_pagi_cuantos = 20;//Elegí un número pequeño para que se generen varias páginas
//cantidad de enlaces que se mostrarán como máximo en la barra de navegación
$_pagi_nav_num_enlaces = 5;//Elegí un número pequeño para que se note el resultado
//Decidimos si queremos que se muesten los errores de mysql
$_pagi_mostrar_errores = false;//recomendado true sólo en tiempo de desarrollo.
include("core/paginator.inc.php");

if ($nroReg>0){
	?>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
      <td width="77%" height="40"><span class="title"><?=admin::labels('user')?></span></td>
    <td width="23%" height="40">&nbsp;</td>
  </tr>
  <tr>
	<td width="90%" height="40"></td>
    <td>
        <div class="boxSearch">
        <form name="frmbuySearch" action="userList.php" >
        <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
         <tr>
          <td>
            <input type="text" name="search" id="search" value="<?=$search?>" class="input7" />
          </td>
          <td>
          <input name="Buscar" id="Buscar" type="image" src="lib/btn_search.gif" />
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
  <table width="100%" >
	<tr>
    	<td width="14%" class="list1a" style="color:#16652f">
         	<a href="userList.php?order=<?=$titOrder?><?=$searchURL?>&token=<?=admin::getParam("token")?>" class="<?=$titClass;?>">
		 		<?=admin::labels('firstname');?>:
            </a>
        </td>
		<td width="14%" class="list1a" style="color:#16652f">
        	<a href="userList.php?order=<?=$nameOrder?><?=$searchURL?>&token=<?=admin::getParam("token")?>" class="<?=$nameClass;?>">
				<?=admin::labels('lastname');?>:
            </a>
        </td>
		<td width="15%">
        	<a href="userList.php?order=<?=$dateOrder?><?=$searchURL?>&token=<?=admin::getParam("token")?>" class="<?=$dateClass;?>">
				<?=admin::labels('user','userrol');?>:
            </a>
        </td>
        <td width="8%" ></td>
        <td align="center" width="11%" height="5"></td>
   		<td align="center" width="12%" height="5"></td>
		<td align="center" width="12%" height="5"></td>
		<td align="center" width="14%" height="5"></td>
	</tr>
	</table>
</td>
  </tr>
  <tr>
    <td colspan="2" id="contentListing">
	<?php
	$i=1;
	while ($user_list = $pagDb->next_record()){
		$usr_uidA = $user_list["usr_uid"];
		$UserRol=$user_list["rol_description"];
		$usr_lastnameA = $user_list["usr_lastname"];
		$usr_firstnameA = $user_list["usr_firstname"];
		$usr_status = $user_list["usr_status"];
		if ($usr_status=='ACTIVE') $labels_content='status_on';
		else $labels_content='status_off';
		if ($i%2==0) $class='row';
		else  $class='row0';
	
  	?> 
  	<div id="sub_<?=$usr_uidA?>" class="<?=$class?>">
<table class="list" width="100%">
	<tr><td width="14%"><?=$usr_firstnameA;?></td>
    <td width="14%"><?=$usr_lastnameA;?></td>
    <td width="15%"><?=$UserRol;?></td>
    <td width="8%"></td>
	<td align="center" width="11%" height="5">
		   <a href="userView.php?usr_uidA=<?=$usr_uidA?>&token=<?=admin::getParam("token");?>">
		<img src="lib/view_es.gif" border="0" title="<?=admin::labels('view')?>" alt="<?=admin::labels('view')?>">
		</a>
	</td>
	<td align="center" width="12%" height="5">
		<a href="userEdit.php?usr_uidA=<?=$usr_uidA?>&token=<?=admin::getParam("token");?>">
		<img src="lib/edit_es.gif" border="0" title="<?=admin::labels('edit')?>" alt="<?=admin::labels('edit')?>">
		</a>
	</td>
	<td align="center" width="12%" height="5">
          <?php 
	if($_SESSION['usr_uid']==$usr_uidA){
	?>
		<img src="lib/delete_off_es.gif" border="0" title="<?=admin::labels('delete')?>" alt="<?=admin::labels('delete')?>">
    <?php }
	else{?>
		<a href="" onclick="removeList(<?=$usr_uidA?>); return false;">
		<img src="lib/delete_es.gif" border="0" title="<?=admin::labels('delete')?>" alt="<?=admin::labels('delete')?>">
		</a>
    <?php } ?>
	</td>
	<td align="center" width="14%" height="5">
	<div id="status_<?=$usr_uidA?>">
    <?php 
	if($_SESSION['usr_uid']==$usr_uidA){
	$status = ($usr_status=='ACTIVE') ? 'active_off_es.gif':'inactive_off_es';
	?>
		<img src="lib/<?=$status?>" border="0" title="<?=admin::labels($labels_content)?>" alt="<?=admin::labels($labels_content)?>">
    <?php }
	else{?>
	   <a href=""  onclick="userCS('<?=$usr_uidA?>','<?=$usr_status?>'); return false;">
		<img src="<?=admin::labels($labels_content,'linkImage')?>" border="0" title="<?=admin::labels($labels_content)?>" alt="<?=admin::labels($labels_content)?>">
		</a>
    <?php } ?>
	</div>
	</td>
		</tr>
	</table>
	</div>
	<?php
	$i++;
	}  ?>
    </td>
    </tr>
    <tr><td width="100%">
	<table border="0" width="100%">
			  <td colspan="3" align="right" class="txt10"><span class="txt11">
			    <?php		   
				//Incluimos la barra de navegación
				if ($_pagi_totalReg==0) 
					{
					echo "<font face=arial></font>";
					}
					else
					{
					echo $_pagi_navegacion;
					//Incluimos la información de la página actual
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
<?php 	} 
else
	{ ?>
	<br />
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">   
  <tr>
    <td colspan="2" id="contentListing">
<div  style="background-color: #f7f8f8;">
<table class="list"  width="100%">
	<tr><td height="30px" align="center" class="bold">
	<?=admin::labels('nocontent')?>
	</td></tr>	
 </table>
</div>
</td></tr></table>

<?php 	} ?>