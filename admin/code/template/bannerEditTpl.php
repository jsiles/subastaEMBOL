<? 
function enum_select($table,$field) { 
    $result=mysql_query("SHOW COLUMNS FROM `$table` LIKE '$field'"); 
    if(mysql_num_rows($result)>0){ 
        $row=mysql_fetch_row($result); 
        $options=explode("','", preg_replace("/(enum|set)\('(.+?)'\)/","\\2", $row[1])); 
        $options2 = array(); 
        foreach ($options as $value) { 
            $options2[] = array( 
                'value' => $value, 
                'display' => htmlentities($value) 
            ); 
        } 
    } else { 
        $options=array(); 
    } 
    return $options2; 
}

$sql =  "select distinct mdl_banners.*, mbc_place, mbc_status from mdl_banners, mdl_banners_contents where mbc_ban_uid=ban_uid and ban_uid=".$_REQUEST["ban_uid"]." and mbc_delete=0";
			  
$db->query($sql);
$bannerexist = $db->numrows();
if ($bannerexist==0) echo '<script language="javascript" type="text/javascript">document.location.href=\'bannerList.php?token='.admin::getParam("token").'</script>';
$banner = $db->next_record();
?>
<br />
<form name="frmBanner" method="post" action="code/execute/bannerUpd.php?token=adminE99::getParam("token");?>" onsubmit="return false;" enctype="multipart/form-data">
<input type="hidden" name="uid" value="<?=$banner["ban_uid"]?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="77%" height="40"><span class="title"><?=admin::labels('banner','edit');?></span></td>
    <td width="23%" height="40">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" id="contentListing"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="50%" valign="top"><table width="50%" border="0" cellpadding="5" cellspacing="5" class="box">
          <tr>
            <td colspan="3" class="titleBox"><?=admin::labels('data');?></td>
            </tr>
          <tr>
            <td width="29%"><?=admin::labels('banner','title');?>:</td>
            <td width="64%">
<input name="ban_title" type="text" class="input" id="ban_title" size="50" onfocus="setClassInput(this,'ON');document.getElementById('div_ban_title').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_ban_title').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_ban_title').style.display='none';" value="<?=$banner["ban_title"]?>" />
<br /><span id="div_ban_title" style="display:none; padding-left:5px; padding-right:5px;" class="error"><?=admin::labels('banner','titleerror');?></span>
			</td>
          </tr>
         
          <tr style="display: ">
            <td><?=admin::labels('banner','place');?>: </td>
            <td>
           <select name="ban_place" class="listMenu" id="ban_place" ><!--onchange="viewBannerContent(this);"-->				
		   <? 
		   	$bannerTypeArray = enum_select('mdl_banners_contents','mbc_place');	
			foreach ($bannerTypeArray as $bannerType) {?>
               <option value="<?=$bannerType["value"]?>" <? if($banner["mbc_place"]==$bannerType["value"]) echo 'selected="selected"';?>><?=$bannerType["value"]?></option>
           <? }?> 
           </select>
            </td>
          </tr>
          
         <tr>
            <td valign="top"><?=admin::labels('banner','label');?>:</td>
            <td>
			<?
			$imgSavedroot1 = PATH_ROOT."/img/banner/".$banner["ban_file"];
			$imgSaveddomain1 = PATH_DOMAIN."/img/banner/thumb_".$banner["ban_file"];
			$imgSaveddomain2 = PATH_DOMAIN."/img/banner/".$banner["ban_file"];
			if (file_exists($imgSavedroot1) && $banner["ban_file"]!="")
				{
				$extensionFile = admin::getExtension($banner["ban_file"]);
				if ($extensionFile=='swf') $imgSaveddomain1 = PATH_DOMAIN."/img/banner/swf.bmp";
			?>
			<div id="image_edit_<?=$banner["ban_uid"]?>">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableUpload">
			<tr>
				<td width="25%" rowspan="2" align="center" valign="middle" style="padding:4px;">
				<a href="<?=$imgSaveddomain2?>" target="_blank"><img src="<?=$imgSaveddomain1?>?<?=time()?>" border="0" /></a>				</td>
				<td width="75%" style="font-size:11px;">
				<?=$banner["ban_title"];?><br />
				<a href="javascript:viewInputFile('on')" title="<?=admin::labels('change');?>" class="small2"><?=admin::labels('change');?></a>
				<span class="pipe">|</span> <a href="#" onclick="removeImg(<?=$banner["ban_uid"]?>);return false;" title="<?=admin::labels('del')?>" class="small3"><?=admin::labels('del')?></a></td>
			</tr>
			<tr>
				<td height="24">
				<div id="imageChange1" style="display:none">
			<input type="file" name="ban_adjunt" id="new_image" size="14" style="font-size:11px;" />  <a href="javascript:viewInputFile('off')" onclick="document.getElementById('new_image').value='';document.getElementById('button_next').innerHTML='<?=admin::labels('public');?>';"><img border="0" src="lib/close.gif" align="top"/></a>
			
			<span id="div_ban_adjunt" class="error" style="display:none">Solo extenciones bmp, jpg, jpeg, gif, png, swf</span>			</div></td>
			</tr>
			</table>
			</div>
			<div id="image_add_<?=$banner["ban_uid"]?>" style="display:none;"></div>
			<?	}
			else
				{ ?>
				<input type="file" name="ban_adjunt" id="ban_adjunt" size="32" class="input" />
				<span id="div_ban_adjunt" class="error" style="display:none">Solo extenciones bmp, jpg, jpeg, gif, png, swf</span>	
			<?	} ?>			</td>
          </tr>
        <tr>
            <td width="29%">Url:</td>
            <td width="64%">
<input name="ban_url" type="text" class="input" id="ban_url" size="50" onfocus="setClassInput(this,'ON');document.getElementById('div_ban_url').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_ban_url').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_ban_url').style.display='none';" value="<?=$banner["ban_url"]?>" />
<br /><span id="div_ban_url" style="display:none; padding-left:5px; padding-right:5px;" class="error"><?=admin::labels('banner','titleerror');?></span>
			</td>
          </tr>
          <tr>
            <td>Target: </td>
            <td>
           <select name="ban_target" class="listMenu" id="ban_target">				
               <option value="_self" <? if($banner["ban_target"]=="_self") echo 'selected="selected"';?>>_self</option>
               <option value="_blank" <? if($banner["ban_target"]=="_blank") echo 'selected="selected"';?>>_blank</option>
           </select>
            </td>
          </tr>
          <tr>
            <td><?=admin::labels('status');?>:</td>
            <td>
			<select name="ban_status" class="listMenu" id="ban_status">
            	<option <? if ($banner["mbc_status"]=="ACTIVE") echo "selected"; ?> value="ACTIVE"><?=admin::labels('active');?></option>
              	<option <? if ($banner["mbc_status"]=="INACTIVE") echo "selected"; ?> value="INACTIVE"><?=admin::labels('inactive');?></option>
			</select>
			<span id="div_ban_status" style="display:none;" class="error"></span>			
			</td>
          </tr>
          
        </table></td>
      </tr>
    </table></td>
    </tr>
</table>
</form>
      <br />
      <br />
      <div id="contentButton">
	  	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="59%" align="center">
				<a href="#" onclick="verifyBanner2();" class="button">
				<?=admin::labels('public');?>
				</a> 
				</td>
          <td width="41%" style="font-size:11px;">
		  		o <a href="bannerList.php?token=<?=admin::getParam("token");?>"><?=admin::labels('cancel');?></a> 
		  </td>
        </tr>
      </table></div>
      <br /><br />
<br /><iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calendario/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>