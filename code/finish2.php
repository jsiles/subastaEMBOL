<?php
include_once("../admin/core/admin.php");
$deadTime = admin::getParam("deadTime");
$sub_uid = admin::getParam("sub_uid");
$sql = "SELECT * FROM mdl_product, mdl_subasta, mdl_pro_category WHERE sub_uid=pro_sub_uid and sub_pca_uid=pca_uid and sub_delete=0 and sub_uid=".$sub_uid; //and sub_deadTime>='".$deadTime."' 
$db->query($sql);
if($details = $db->next_record())
{
$moneda = admin::getDbValue("select cur_description from mdl_currency where cur_uid='".$details["sub_moneda"]."'");
	
$timetobe=admin::time_diff($details["sub_hour_end"],date('Y-m-d H:i:s'));
$timedead=admin::time_diff($details["sub_deadtime"],date(
'Y-m-d H:i:s'));
$finish=$details["sub_finish"];
$timeSubasta = $details["sub_tiempo"];
//$quantityDates = ceil(((($details["sub_mountdead"]-$details["sub_mount_base"])/($details["sub_mount_unidad"]))+1));
$yearTD = substr($details["sub_hour_end"],0,4);
$monthTD = substr($details["sub_hour_end"],5,2);
$dayTD = substr($details["sub_hour_end"],8,2);
$hourTD = substr($details["sub_hour_end"],11,2);
$minuteTD = substr($details["sub_hour_end"],14,2);
$secondTD = substr($details["sub_hour_end"],17,2);
$sw=false;				
$fechahora=date('Y-m-d H:i:s');
$l=0;
/*echo "hour end:". $details["sub_hour_end"]."<br>";
echo "hora-minuto-segundo:".$hourTD."-".$minuteTD."-".$secondTD."<br>";
echo "noow:".date("Y/m/d H:i:s");
echo "<br>";
echo "timedead:".$timedead."<br>"."sub_deadtime:".$details["sub_deadtime"]."<br>".$sw;*/

if (($timetobe>0)&&($finish==0)){
$daystobe=intval($timetobe/86400);
$timetobe=$timetobe-($daystobe*86400);
$hourstobe=intval($timetobe/3600);
$timetobe=$timetobe-($hourstobe*3600);
$minutetobe=intval($timetobe/60);
$timetobe=$timetobe-($minutetobe*60);
$faltante =$daystobe.'d '.$hourstobe.'h '.$minutetobe.'m '.$timetobe.'s ';
$timeInicio = 1;
$m=1;
}
elseif(($timedead>0)&&($finish==0))
{
$faltante='Iniciada';
//echo $faltante;
$daysdead=intval($timedead/86400);
$timedead=$timedead-($daysdead*86400);
$hoursdead=intval($timedead/3600);
$timedead=$timedead-($hoursdead*3600);
$minutedead=intval($timedead/60);
$timedead=$timedead-($minutedead*60);
$timeInicio = 2;
}else {
	$faltante='Concluida';
	$daystobe=0;
	$hourstobe=0;
	$minutetobe=0;
	$timetobe=0;
	$timeInicio = 3;
	}
$regBidsWin = admin::getDbValue("select max(bid_uid) from mdl_bid where bid_sub_uid = ".$details["sub_uid"]." and bid_cli_uid=".admin::getSession("uidClient"));
									if(isset($regBidsWin))
									{
									$regBidsWinMax = admin::getDbValue("select max(bid_uid) from mdl_bid where bid_sub_uid = ".$details["sub_uid"]);
									if($regBidsWin==$regBidsWinMax) $winMessage="Su oferta gan&oacute;";
									else
									$winMessage="Su oferta perdi&oacute;";
									}	
																		
?>

<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loading_image : '<?=$domain?>/loading.gif',
        close_image   : '<?=$domain?>/closelabel.gif'
      }) 
    })
  </script>
<div id="subastaDetail" class="details">
                                <?php
								    $bidsCompra=admin::getDBvalue("SELECT sub_type FROM mdl_subasta where sub_uid=".$details["sub_uid"]);
									if($bidsCompra=='COMPRA') 
									$valBids=admin::getDBvalue("SELECT min(bid_mount) FROM mdl_bid where bid_pro_uid='".$details["pro_uid"]."'");
									else
									$valBids=admin::getDBvalue("SELECT max(bid_mount) FROM mdl_bid where bid_pro_uid='".$details["pro_uid"]."'");
									
									$factor = admin::getDbValue("select inc_ajuste from mdl_incoterm where inc_delete=0 and inc_cli_uid=".admin::getSession("uidClient")." and inc_sub_uid=".$details["sub_uid"]);
									//$regBids = admin::getDbValue("select count(*) from mdl_bid where bid_sub_uid = ".$details["sub_uid"]);
									
									if(!$valBids) 
								    {
										$centavos=substr($details["sub_mount_base"],-3);
										$montoGlobal=str_replace($centavos,'',$details["sub_mount_base"]);
										$valBids=$details["sub_mount_base"];
										}
									else
									{
										$centavos=substr($valBids,-3);
										$montoGlobal=str_replace($centavos,'',$valBids);
										}
								
									$centavos=str_replace('.','',$centavos);
									
									
								?>
									<p class="left">Precio: <?=$moneda?> <?=$montoGlobal?>.<sup><?=$centavos?></sup></p>
                                    <div class="clear"></div>
                                    <p class="left" id="tiempoRestante" style="display:">Fecha de la subasta:&nbsp; 
 <div id="defaultCountdown" class="defCountDown"><?=admin::changeFormatDate($details["sub_deadtime"],7)?></div>
 </p>

<p class="left" id="tiempoSubasta" style="display:">Tiempo de subasta:&nbsp;
 <div id="defaultCountdown1" class="defCountDown"></div>
 </p>

										<form name="frmContact" id="formA" action="" method="post">
		<p id="subastaP" style="width:500px;display:none;">
			<label class="bold">Oferta:</label>
			<input name="ct_value" id="ct_value" type="text" size="15" onKeyUp="valOfertIt();" class="inputB"/> <a href="<?=$domain?>/code/bidsIt.php?uid=<?=$details["sub_uid"]?>" id="planCuentas" rel="facebox" class="addcart">Ofertar</a>
        (Ingrese <?php 
		if($bidsCompra=='COMPRA')
		{
		if($details["sub_mount_base"]<=$valBids) echo '$'.number_format(round(($details["sub_mount_base"]-$details["sub_mount_unidad"]),2),2).' o menos)'; 
		else echo '$'.($valBids-$details["sub_mount_unidad"]).' o menos)'; 
		
			}
		else
		{
		if($details["sub_mount_base"]>=$valBids) echo '$'.number_format(round(($details["sub_mount_base"]+$details["sub_mount_unidad"]),2),2).' o m&aacute;s)'; 
		else echo '$'.($valBids+$details["sub_mount_unidad"]).' o m&aacute;s)'; 
			}
		?></p>
      
									  <p id="unidadmejora" style="display:none"><label class="bold">Unidad de Mejora:</label> <?=$moneda?> <?=$details["sub_mount_unidad"]?></p>
                                    
           <input type="hidden" name="hOk" id="hOk" value="" />
            <input type="hidden" name="domain" id="domain" value="<?=$domain?>" />
            <input type="hidden" name="uid" id="uid" value="<?=$details["sub_uid"]?>" />
</form>
                    </div>
<?php
}
$sql = "update mdl_subasta set sub_finish=3 WHERE sub_finish=1 and sub_delete=0 and sub_deadTime='".$deadTime."' and sub_uid=".$sub_uid;
$db->query($sql);
?>            
        