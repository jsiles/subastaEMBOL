<?php
		$conParent = isset($_GET["con_parent"]) ? '?con_parent='.$_GET["con_parent"].'&token='.$_GET['token'] : '?token='.$_GET['token'];
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td valign="top">    
    <table width="100%" border="0" cellpadding="0" cellspacing="0" id="header">
      <tr>
        <td width="22%" rowspan="2" align="center"><img src="lib/logo.png" width="70" h alt="bnb logo"></td>
        <td width="52%" height="36">&nbsp;</td>
		<td width="26%" rowspan="2">
		<div id="changeDiv" style="display:none;">
		<form id="change_language" method="post" action="code/execute/langChange.php<?=$conParent;?>?token=<?=admin::getParam('token')?>" > 
		<?php	if ($_REQUEST["con_uid"]!="")
		$page_uid = "?con_uid=" . $_REQUEST["con_uid"];
		$urlorigin = $_SERVER['PHP_SELF'].$page_uid; ?>
		<input type="hidden" name="origin" value="<?=$urlorigin?>" />
		<select name="language" id="language" onchange="document.getElementById('change_language').submit();" class="input">
		<?php
		$sql ="select * from sys_language where lan_status='ACTIVE' and lan_delete<>1";
	
		$db->query($sql);
		$numlanguages = $db->numrows(); 
		while ($languages = $db->next_record())
			{ 
			if ($lang==$languages["lan_code"]) $language_name=$languages["lan_language"];
			?>
			<option value="<?=$languages["lan_code"]?>" <? if ($lang==$languages["lan_code"]) echo "selected"; ?>><?=$languages["lan_language"]?></option>
		<?	} ?>
		</select>
		<a href="javascript:changeLanguageHeader('off');"  class='small'><img border="0" src="lib/close.gif" alt="cerrar" title="cerrar"/></a>	
		</form>		
		</div>	 
		
		<div id="exit">
		<a title="<?=admin::labelsSystem('logout')?>" href="<?=admin::labelsSystem('logout','link')?>?token=<?=admin::getParam('token')?>"><img src="lib/buttons/logout.gif" alt="<?=admin::labelsSystem('logout')?>" width="21" height="21" border="0" /></a>
		</div>			
		<div id="userDat">
		<a href="userEdit.php?usr_uidA=<?=$_SESSION['usr_uid']?>&amp;token=<?=admin::getParam('token')?>" class="small" title="<?=admin::labelsSystem('myProfile');?>"><?=$_SESSION["usr_firstname"] . " ". $_SESSION["usr_lastname"];?></a> <a href="userEdit.php?usr_uidA=<?=$_SESSION['usr_uid']?>&amp;token=<?=admin::getParam('token')?>" class="link3" title="<?=admin::labelsSystem('myProfile');?>"><?=admin::labelsSystem('change');?></a><br />
		<? if ($numlanguages>1) { ?>
		<a href="javascript:changeLanguageHeader('on')" class="small"><?=$language_name?></a> <a href="javascript:changeLanguageHeader('on')" class="link3"><?=admin::labelsSystem('change');?></a><br />
		<? } ?>
		<? if ($numsites>1) { ?><!--
		<a href="javascript:changeSiteHeader('on');"  class='small'><?=$site_name;?></a> <a href="javascript:changeSiteHeader('on');" class="link3"><?=admin::labelsSystem('change');?></a>
		-->
		<? } ?>
		</div>
		<div id="userImg">
		<?php
		$usr_photo = admin::getDBValue('select usr_photo from sys_users where usr_uid='.$_SESSION['usr_uid']);
		$imgProfile = "upload/profile/thumb_" . $usr_photo;
		if (file_exists($imgProfile) && $usr_photo!="") { ?>
		<a href="userEdit.php?usr_uidA=<?=$_SESSION['usr_uid']?>&amp;token=<?=admin::getParam('token')?>" title="<?=admin::labelsSystem('myProfile');?>">
			<img border="0" src="<?=$imgProfile?>?<?=time()?>" title="<?=admin::labelsSystem('myProfile');?>" alt="<?=admin::labelsSystem('myProfile');?>"/>
			</a>
		<? } ?>		
		</div>
		<!--Definir tama�o de imagen ALTO POR ANCHO -->
			
			
		  </td>       
      </tr>
      <tr>
        <td height="31" valign="bottom">
		<div id="nav">
            <ul id="navmenu">
                <?=admin::labelsMenu()?>
            </ul>
        </div>
		</td>
        <td width="0%">   		</td>
      </tr>
    </table>
  </td>
  </tr>
  <tr>
    <td id="submenu"><?=admin::labelsSubMenu()?></td>
  </tr>
  </table>