<?php
$uidClient = admin::getSession("uidClient");
if($uidClient){
$name = admin::getDbValue("select concat(cli_firstname,' ',cli_lastname) from mdl_client where cli_uid=".$uidClient);
$foto = admin::getDbValue("select cli_photo from mdl_client where cli_uid=".$uidClient);
}
$imgs = admin::getDbValue("select top 1 ban_content from mdl_banners_contents, mdl_banners where mbc_delete<>1  and mbc_ban_uid=ban_uid order by mbc_position ,mbc_ban_uid");
?>
<div id="top-header" class="container">
			<div id="logo">
				<h1><a href="#">Subastas Online</a></h1>
				<p>Antonio Cabrera Osio</p>
			</div>
				
			<div id="top-banner">
				<div id="colA">
					<?=$imgs?>
				</div>
				<?php if($uidClient){?>
                <div id="colB">
                <p style="text-align:right;padding-left:10px;vertical-align:top;padding-top:0px" ><a href="<?=$domain?>/logout.php">X</a></p>
					<p style="text-align:left;padding-left:10px;vertical-align:top;">Bienvenido <?=$name?> 
                    <p style="text-align:left;padding-left:10px;vertical-align:top;"><?php
                    if(file_exists($rootsystem."/img/client/thumb_".$foto))
					{
					?><img src="<?=$domain."/img/client/thumb_".$foto?>" alt="<?=$name?>" title="<?=$name?>" border="0"/>
                    <?php
					}else{
					?>
                    <img src="<?=$domain."/img/user.gif"?>" alt="<?=$name?>" title="<?=$name?>" border="0"/>
                    <?php
					}
					?>
                    </p>
					<p><!--<a href="#" class="viewcart">View Cart (3)</a>--></p>
				</div>
                <?php } ?>
			</div>
		</div>
		