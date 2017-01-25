		<div id="content">
				<div id="box7" class="box-style">
                	
					<!-- info de productos -->
                  	<?php
                    
					$sSQL ="select xit_uid, xit_sub_uid, xit_product, xit_description, xit_image, xit_price, xit_unity from mdl_xitem, mdl_clixitem where clx_xit_uid=xit_uid and xit_sub_uid= ".$details["sub_uid"]." and xit_delete=0 and clx_delete=0 and clx_cli_uid=".admin::getSession("uidClient");
					$db2->query($sSQL);
					echo $sSQL;
					while($xitem=$db2->next_record())
					{
					?> 
                    <div class="title">
						<h2><span><?=utf8_encode($xitem["xit_product"])?></span></h2>
					</div>
                    <div class="item-box">
                    <p style="margin-left:<?=$maxAncho?>px;">
                    <?php
					if(file_exists(PATH_ROOT.'/img/subasta/img_'.$xitem["xit_image"]))
					{
					?>
                    <img src="<?=$domain.'/img/subasta/img_'.$xitem["xit_image"]?>" class="alignleft" alt="<?=utf8_encode($xitem["xit_product"])?>" title="<?=utf8_encode($xitem["xit_product"])?>"/>
                    <?php
					}
					?>
                    </p>
                    	<div id="subastaDetail" class="details">
                                <?php
//echo $timeSubasta;
								   $bidsCompra=admin::getDBvalue("SELECT sub_type FROM mdl_subasta where sub_uid=".$xitem["xit_sub_uid"]);
									if($bidsCompra=='COMPRA') 
									$valBids=admin::getDBvalue("SELECT min(bid_mount) FROM mdl_bid where bid_pro_uid='".$xitem["xit_uid"]."'");
									else
									$valBids=admin::getDBvalue("SELECT max(bid_mount) FROM mdl_bid where bid_pro_uid='".$xitem["xit_uid"]."'");
									
									$factor = admin::getDbValue("select inc_ajuste from mdl_incoterm where inc_delete=0 and inc_cli_uid=".admin::getSession("uidClient")." and inc_sub_uid=".$xitem["xit_sub_uid"]);
									//$regBids = admin::getDbValue("select count(*) from mdl_bid where bid_sub_uid = ".$details["sub_uid"]);
									
									if(!$valBids) 
								    {
										$centavos=substr($xitem["xit_price"],-3);
										$montoGlobal=str_replace($centavos,'',$xitem["xit_price"]);
										$valBids=$xitem["xit_price"];
										}
									else
									{
										$centavos=substr($valBids,-3);
										$montoGlobal=str_replace($centavos,'',$valBids);
										}
								
									$centavos=str_replace('.','',$centavos);
									
								?>
									<p class="left">Precio: <?=$moneda?> 
					       <?=$montoGlobal?>.<sup><?=$centavos?></sup></p> <div class="clear"></div>
                                   <?php
                                   if($factor)
								   {
								   ?>
                                    <p class="left"> Factor de ajuste:<?=$factor?>%
                                    <div class="clear"></div>
                                    <?php
								    }
				                    ?><p class="left" id="tiempoRestante" style="display:">Tiempo de inicio:&nbsp; 
 <div id="defaultCountdown" class="defCountDown"></div>
 </p>

<p class="left" id="tiempoSubasta" style="display:none">Tiempo de subasta:&nbsp;
 <div id="defaultCountdown1" class="defCountDown"></div>
 </p>

										<form name="frmContact" id="formA" action="" method="post">
		<p id="subastaP" style="display:none;">
			<label class="bold">Oferta:</label>
			<input name="ct_value" id="ct_value" type="text" size="15" class="inputB" value="" onKeyUp="valOfertIt();"/> <a href="<?=$domain?>/code/bidsIt.php?uid=<?=$xitem["xit_sub_uid"]?>&ofert=<?=$valBids?>" id="planCuentas" rel="facebox" class="addcart">Aceptar</a> (Ingrese <?php 
		if($bidsCompra=='COMPRA')
		{
		if($xitem["xit_price"]<=$valBids) echo $moneda.' '.number_format(round(($xitem["xit_price"]-$xitem["xit_unity"]),2),2).' o menos)'; 
		else echo $moneda.' '.($valBids-$xitem["xit_price"]).' o menos)'; 
		
			}
		else
		{
		if($xitem["xit_price"]>=$valBids) echo $moneda.' '.number_format(round(($xitem["xit_price"]+$xitem["xit_unity"]),2),2).' o m&aacute;s)'; 
		else echo $moneda.' '.($valBids+$xitem["xit_price"]).' o m&aacute;s)'; 
			}
		?></p>
      
									  <p id="unidadmejora"><label class="bold">Unidad de Mejora:</label> <?=$moneda?> <?=$xitem["xit_price"]?></p>
                                    
           <input type="hidden" name="hOk" id="hOk" value="" />
            <input type="hidden" name="domain" id="domain" value="<?=$domain?>" />
            <input type="hidden" name="uid" id="uid" value="<?=$xitem["xit_sub_uid"]?>" />
</form>
                    </div>
                    
                    
                    								</div>
                     <div class="content">
                     <?=$xitem["xit_description"]?><br /><br />
                     </div>
                                                    
					<?php
					}
					?>
                    <!-- info de productos -->
                    <div class="content">
                    <?php
					$extension = admin::getExtension($details["pro_document"]);
					$imgextension = admin::getExtensionImage($extension);
					?>
                    <?php
					 if ((strlen($imgextension)>0)&&(strlen($details["pro_document"])>0)) { ?>
                    <p>Reglamento espec&iacute;fico de la subasta:
				  <a href="<?=$domain?>/docs/subasta/<?=$details["pro_document"]?>" target="_blank"><img border="0" src="<?=$domain."../admin/".$imgextension?>" width="16" height="16"/><!-- <?=$details["pro_document"]?>--></a></p><?php } ?>	
						<p><?=utf8_encode($details["pro_description"])?></p>
					</div>
				</div>`
                
			</div>
	