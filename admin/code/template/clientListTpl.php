<?php
$rolDesc = admin::getDBvalue("select rol_description from mdl_roles where rol_uid='".$_SESSION['usr_rol']."' and rol_delete<>1");
$rolAccess  = ($rolDesc==='ADMIN' || $rolDesc==='ROOT') ? "" : " and new_usr_uid='".$_SESSION['usr_uid']."' ";

$new_public =3; //isset($_GET['new_public']) ? $_GET['new_public'] : 0 ;
if($new_public==0) $categoria = " and cli_status='ACTIVE' and cli_delete=0 ";
elseif($new_public==1) $categoria = " and cli_status='INACTIVE' and cli_delete=0 ";
elseif($new_public==3) $categoria = " and cli_delete=0 ";
if ($lang!='es') $urlLangAux=$lang.'/';
else $urlLangAux='';

$order = admin::toSql(admin::getParam("order"),"Number");
if ($order==0) {$orderCode=' order by cli_uid desc'; $titClass='up'; $nameClass='up'; $dateClass='up';}
elseif ($order==1) {$orderCode='  order by cli_firstname asc'; $titClass='up'; $nameClass='up'; $dateClass='up';}
elseif ($order==2) {$orderCode='  order by cli_firstname desc'; $titClass='down'; $nameClass='up'; $dateClass='up';}
elseif ($order==3) {$orderCode='  order by cli_lastname asc'; $titClass='up'; $nameClass='up'; $dateClass='up';}
elseif ($order==4) {$orderCode='  order by cli_lastname desc'; $titClass='up'; $nameClass='down'; $dateClass='up';}
//elseif ($order==6) {$orderCode='  order by mcc_permit desc'; $titClass='up'; $nameClass='up'; $dateClass='down';}

if ($titClass=='up') $titOrder=2;
else $titOrder=1;
if ($nameClass=='up') $nameOrder=4;
else $nameOrder=3;
if ($dateClass=='up') $dateOrder=6;
else $dateOrder=5;

$search = admin::toSql(admin::getParam("search"),"String");
if (!$search || $search=='')
{
$_pagi_sql= "select cli_uid, cli_user, cli_pass, cli_lastname, cli_firstname, cli_status from mdl_client where 1=1 ".$categoria.$orderCode;
$nroReg=admin::getDBvalue("select count(cli_uid) from mdl_client where cli_delete=0");
}
else
{
$_pagi_sql= "select cli_uid, cli_user, cli_pass, cli_lastname, cli_firstname, cli_status from mdl_client where (cli_user like '%".$search."%' or cli_firstname like '%".$search."%' or cli_lastname like '%".$search."%' or cli_email like '%".$search."%') ".$noRoot.$categoria.$orderCode;

$nroReg=admin::getDBvalue("select count(cli_uid) from mdl_client where (cli_user like '%".$search."%' or cli_firstname like '%".$search."%' or cli_lastname like '%".$search."%' or cli_email like '%".$search."%') ".$categoria.$noRoot);
}

//echo $_pagi_sql;	
$_pagi_cuantos = 20;//Elegí un número pequeño para que se generen varias páginas
//cantidad de enlaces que se mostrarán como máximo en la barra de navegación
$_pagi_nav_num_enlaces = 5;//Elegí un número pequeño para que se note el resultado
//Decidimos si queremos que se muesten los errores de mysql
$_pagi_mostrar_errores = false;//recomendado true sólo en tiempo de desarrollo.
include("core/paginator.inc.php");

if ($nroReg>0)
	{
	?>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
      <td width="77%" height="40"><span class="title">Listado de proveedores</span></td>
    <td width="23%" height="40">&nbsp;</td>
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
    	<td width="14%" class="list1a" style="color:#ed1b21">
         	<a href="clientList.php?order=<?=$titOrder?><?=$searchURL?>&token=<?=admin::getParam("token")?>" class="<?=$titClass;?>">
		 		<?=admin::labels('firstname');?>:
            </a>
        </td>
		<td width="14%" class="list1a" style="color:#ed1b21">
        	<a href="clientList.php?order=<?=$nameOrder?><?=$searchURL?>&token=<?=admin::getParam("token")?>" class="<?=$nameClass;?>">
				<?=admin::labels('lastname');?>:
            </a>
        </td>
		<td width="15%" style="color:#ed1b21">Usuario</td>
        <td width="8%" style="color:#ed1b21">Contrase&ntilde;a</td>
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
while ($user_list = $pagDb->next_record())
	{
	//	print_r($user_list);die;
	$mcl_uid = $user_list["cli_uid"];
	$mcl_lastname = $user_list["cli_lastname"];
	$mcl_firstname = $user_list["cli_firstname"];
	$mcl_user = $user_list["cli_user"];
	$mcl_pass = $user_list["cli_pass"];
	
	$mcl_status = $user_list["cli_status"];
	if ($mcl_status=='ACTIVE') $labels_content='status_on';
	else $labels_content='status_off';
	if ($i%2==0) $class='row';
	else  $class='row0';
	
  	?> 
  	<div id="sub_<?=$mcl_uid?>" class="<?=$class?>">
<table class="list" width="100%">
	<tr><td width="14%"><?=$mcl_firstname;?></td>
    <td width="14%"><?=$mcl_lastname;?></td>
    <td width="15%"><?=$mcl_user;?></td>
    <td width="8%"><?=trim(SymmetricCrypt::decrypt($mcl_pass));?></td>
	<td align="center" width="11%" height="5">
    	<a href="clientView.php?mcl_uid=<?=$mcl_uid?>&token=<?=admin::getParam("token");?>"><img src="lib/view_es.gif" border="0" title="<?=admin::labels('view')?>" alt="<?=admin::labels('view')?>">
	</a>
    </td>
	<td align="center" width="12%" height="5">
    	<a href="clientEdit.php?mcl_uid=<?=$mcl_uid?>&token=<?=admin::getParam("token");?>">
		<img src="lib/edit_es.gif" border="0" title="<?=admin::labels('edit')?>" alt="<?=admin::labels('edit')?>">
		</a>
    </td>
	<td align="center" width="12%" height="5">
    	<a href="" onclick="removeList(<?=$mcl_uid?>); return false;">
		<img src="lib/delete_es.gif" border="0" title="<?=admin::labels('delete')?>" alt="<?=admin::labels('delete')?>">
		</a>
    </td>
	<td align="center" width="14%" height="5">
    <div id="status_<?=$mcl_uid?>">
	   <a href=""  onclick="clientCS('<?=$mcl_uid?>','<?=$mcl_status?>'); return false;">
		<img src="<?=admin::labels($labels_content,'linkImage')?>" border="0" title="<?=admin::labels($labels_content)?>" alt="<?=admin::labels($labels_content)?>">
		</a>
	</div>
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
<?php
} 
else
	{ 
    ?>
	<br />
<br />
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