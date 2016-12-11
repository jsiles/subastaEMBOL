<?php
include_once("../../core/simple99.php");
SIMPLE99::initialize('dpf','dpfList',false); 
$itemList=SIMPLE99::getParam("itemList");
if ($itemList!='')
    {
	for ($i=0;$i<count($itemList);$i++)
		{
		$position = $i + 1;
		$sSQL = "update mdl_indicadores set ind_position=".$position." where ind_uid=".$itemList[$i];
		$db->query($sSQL); 
		}
	}
?>