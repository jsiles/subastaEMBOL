<div id="footer-wrapper">
	<div id="footer">
		<div id="footer-menu" class="container">
			<?php
if($uidClient) $sWhere= " and con_uid not in (2,3) ";
else $sWhere= " and con_uid not in (2) ";

$sql3 = "select * 
		from mdl_contents 
		left join mdl_contents_languages on (con_uid=col_con_uid) 
		where con_delete<>1 
			  and col_status='ACTIVE' 
			  and con_level=0
			  and col_language='".$lang."'  ".$sWhere."
		order by con_position";
$db3->query($sql3);
$nroReg = $db3->numrows();
$i=1;
if ($lang=='es') $LangFile='';
?>
<ul>
<? 
while($con_category = $db3->next_record()) 
{ 
	if (trim($con_category["col_url"])==trim($urlTitle)) {$aClass="active";}
	else
	{
		if ($urlTitle=='' && $con_category["col_uid"]==1){$aClass="active";}
		else {$aClass="";}
	}
	$existSublvl=admin::getDBvalue("select count(col_url)
					from mdl_contents_languages,mdl_contents 
					where col_con_uid=con_uid
					and con_parent=".$con_category["con_uid"]."
					and col_language='".$lang."'
					and con_delete=0");
	if ($existSublvl>=1)
	{
		$firstSublvl=admin::getDBvalue("select col_url,min(con_position)
											from mdl_contents_languages,mdl_contents 
											where col_con_uid=con_uid
											and con_parent=".$con_category["col_con_uid"]."
											and con_delete=0
											and col_language='".$lang."'
											group by col_url
											order by 2
											limit 1");
		$firstSublvl.='/';
	}
	else $firstSublvl='';
	if (!$urlTitle) $urlTitle=$con_category["col_url"];
 ?>	
	<li class="<?=$aClass?>">
    	<a href="<?=$domain?>/<?=$urlLangAux?><?=$con_category["col_url"]?>/<?=$firstSublvl?>"  accesskey="<?=$i?>" title="<?=$con_category["col_title"];?>">
      <span><?=strtolower($con_category["col_title"])?></span></a>
    </li > 
<? 
$i++;
}?>
</ul>
</br></br>
<div>
	<div style="float:left; margin-left:50px">
    	</br><span>DERECHOS RESERVADOS - Copyright (c) 2016 </span> </br>
        <span>SCLE LTDA.</span> </br>
        <span>SOLUCIONES DE COMPRAS Y LOGISTICA EMPRESARIAL</span>
    </div>
    <div  style="float:right; margin-right:50px">
    <img  src="<?=$domain?>/lib/scle.png" alt="scle">
    </div>
</div>
</br>
