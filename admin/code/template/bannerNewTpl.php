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
?>
<form name="frmBanner" method="post" action="code/execute/bannerAdd.php?token=<?=admin::getParam("token");?>" onsubmit="return false;" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="77%" height="40"><span class="title"><?=admin::labels('banner','create');?></span></td>
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
<input name="ban_title" type="text" class="input" id="ban_title" size="50" onfocus="setClassInput(this,'ON');document.getElementById('div_ban_title').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_ban_title').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_ban_title').style.display='none';" />
<br /><span id="div_ban_title" style="display:none; padding-left:5px; padding-right:5px;" class="error"><?=admin::labels('banner','titleerror');?></span>
			</td>
          </tr>
          
          <tr style="display:none">
            <td><?=admin::labels('banner','place');?>: </td>
            <td>
           <select name="ban_place" class="listMenu" id="ban_place" onchange="subList(this);">
           		<?php 	
							$sSQL="select b.col_title, a.con_uid from mdl_contents a,  mdl_contents_languages b where a.con_uid=b.col_con_uid". 
							" and b.col_language='".$lang."' and a.con_parent=0 and  a.con_delete<>1 and (a.con_uid!=4 and a.con_uid!=6) order by a.con_position asc";
							$db->query($sSQL);
							while ($regContent = $db->next_record())
							{
							?>	
								<option value="<?=$regContent["con_uid"]?>" ><?=$regContent["col_title"]?></option> 
							<?php } ?>
           </select>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><span id="div_con_parent2">   </span></td>
          </tr>
          
          <tr style="display:">
            <td><?=admin::labels('banner','tipo');?>: </td>
            <td>
           <select name="ban_place" class="listMenu" id="ban_place">				
           <? 
		   	$bannerTypeArray = enum_select('mdl_banners_contents','mbc_place');	
			foreach ($bannerTypeArray as $bannerType) {?>
               <option value="<?=$bannerType["value"]?>"><?=$bannerType["value"]?></option>
           <? }?>    
           </select>
            </td>
          </tr>
          
          <tr id="bannerContent" style="display:none" >
            <td><?=admin::labels('contents','in');?>: </td>
            <td>
            <?php 	
			$sSQL="select col_title, con_uid from mdl_contents left join mdl_contents_languages on (con_uid=col_con_uid) 
					where col_language='".$lang."' and con_parent=0 and con_uid=1 and con_delete<>1 order by con_position asc";
			$db->query($sSQL);
			while ($regContent = $db->next_record())
			{
				
				if ($regContent["con_uid"]==1) $existBan=0;
				else $existBan=admin::getDBvalue("SELECT count(ban_content) FROM mdl_banners, mdl_banners_contents WHERE ban_uid=mbc_ban_uid and mbc_con_uid='".$regContent["con_uid"]."' and mbc_place=0 and mbc_status='ACTIVE' and mbc_delete=0 order by mbc_position asc");
				
				if($existBan==0){
			?>
            <input type="checkbox" value="<?=$regContent["con_uid"]?>" name="con_uid[]" id="con_uid<?=$regContent["con_uid"]?>" checked="checked" /><?=$regContent["col_title"]?>
            <br />
		<?php 
				}
			}?>
            </td>
          </tr>
		   <tr>
            <td><?=admin::labels('banner','label');?>: </td>
            <td><input type="file" name="ban_adjunt" id="ban_adjunt" size="31" onclick="setClassInput(this,'ON');document.getElementById('div_ban_adjunt').style.display='none';" class="input">
            <br /><span id="div_ban_adjunt" style="display:none;" class="error">Solo extenciones bmp, jpg, jpeg, gif, png, swf</span>
			</td>
          </tr>
          <tr>
            <td width="29%">Url:</td>
            <td width="64%">
<input name="ban_url" type="text" class="input" id="ban_url" size="50" onfocus="setClassInput(this,'ON');document.getElementById('div_ban_url').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_ban_url').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_ban_url').style.display='none';" />
<br /><span id="div_ban_url" style="display:none; padding-left:5px; padding-right:5px;" class="error"><?=admin::labels('banner','titleerror');?></span>
			</td>
          </tr>
          <tr>
            <td>Target: </td>
            <td>
           <select name="ban_target" class="listMenu" id="ban_target">				
               <option value="_self" selected="selected">_self</option>
               <option value="_blank">_blank</option>
           </select>
            </td>
          </tr>
          
          <tr>
            <td><?=admin::labels('status');?>:</td>
            <td>
			<select name="ban_status" class="listMenu" id="ban_status">
            	<option selected="selected" value="ACTIVE"><?=admin::labels('active');?></option>
              	<option value="INACTIVE"><?=admin::labels('inactive');?></option>
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
				<a href="#" onclick="verifyBanner();" class="button">
				<?=admin::labels('public');?>
				</a> 
				</td>
          <td width="41%" style="font-size:11px;">
		  		o <a href="bannerList.php?token=<?=admin::getParam("token")?>" ><?=admin::labels('cancel');?></a> 
		  </td>
        </tr>
      </table></div>
      <br /><br />
<br />