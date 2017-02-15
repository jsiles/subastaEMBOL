<?php
$uidClient = admin::getSession("uidClient");
if($uidClient){
$name = admin::getDbValue("select concat(cli_companyname, ' ', cli_socialreason) from mdl_client where cli_uid=".$uidClient);
$foto = admin::getDbValue("select cli_photo from mdl_client where cli_uid=".$uidClient);
admin::updateSubasta();
}
$imgs = admin::getDbValue("select top 1 ban_file from mdl_banners_contents, mdl_banners where mbc_delete=0 and mbc_status='ACTIVE' and mbc_ban_uid=ban_uid order by mbc_position ,mbc_ban_uid");
$ban_name = admin::getDbValue("select top 1 ban_title from mdl_banners_contents, mdl_banners where mbc_delete=0 and mbc_status='ACTIVE' and mbc_ban_uid=ban_uid order by mbc_position ,mbc_ban_uid");

?>
<div id="top-header" class="container">
			<div id="logo">
				<h1><a href="<?=$domain?>">Subastas Online</a></h1>
				<p></p>
			</div>
				
			<div id="top-banner">
				<div id="colA">
                    <? if($imgs){?>
					<img src="<?=$domain?>/img/banner/img_<?=$imgs?>?<?=time()?>" alt="<?=$ban_name?>" title="<?=$ban_name?>" border="0"/>
                    <? }?>
				</div>
				<?php if($uidClient){?>
                <div id="colB">
                <p style="text-align:right;padding-left:10px;vertical-align:top;padding-top:0px" ><a href="<?=$domain?>/logout.php"> </a></p>
                <p style="text-align:left;padding-left:10px;vertical-align:top;">Bienvenido <?=$name?></p>
                <p style="text-align:left;padding-left:10px;vertical-align:top;"><?php
                    if(file_exists($rootsystem."/img/client/thumb_".$foto))
					{
					?><img src="<?=$domain."/img/client/thumb_".$foto?>?<?=time()?>" alt="<?=$name?>" title="<?=$name?>" border="0"/>
                    <?php
					}else{
					?>
                    <img src="<?=$domain."/img/user.gif"?>?<?=time()?>" alt="<?=$name?>" title="<?=$name?>" border="0"/>
                    <?php
					}
					?>
                    </p>
                    <div class="clear"></div>
                    <br />
                    <div><a href="<?=$domain."/registro/".$uidClient."/"?>" id="changes">Cambiar</a></div>
                </div>
                <?php } ?>
			</div>
		</div>
		