/*
Created		10/10/2010
Modified		10/10/2010
Project		
Model		
Company		
Author		
Version		
Database		mySQL 5 
*/


Create table mdl_subasta (
	sub_uid Char(20) NOT NULL,
	pca_uid Char(20) NOT NULL,
	sub_usr_uid Char(20),
	sub_category Char(20),
	sub_description Char(20),
	sub_typ_uid Char(20),
	sub_pro_uid Char(20),
	sub_date_creation Char(20),
	sub_hour_start Char(20),
	sub_mount_base Char(20),
	sub_moneda Char(20),
	sub_mount_unidad Char(20),
	sub_hour_end Char(20),
	sub_status Char(20),
	sub_delete Char(20),
 Primary Key (sub_uid,pca_uid)) ENGINE = MyISAM;

Create table mdl_bid (
	bid_uid Char(20) NOT NULL,
	sub_uid Char(20) NOT NULL,
	pro_uid Char(20) NOT NULL,
	bid_cli_uid Char(20),
	bid_mount Char(20),
	bid_date Char(20),
	pca_uid Char(20) NOT NULL,
 Primary Key (bid_uid,sub_uid,pro_uid,pca_uid)) ENGINE = MyISAM;

Create table mdl_product (
	pro_uid Char(20) NOT NULL,
	sub_uid Char(20) NOT NULL,
	pro_name Char(20),
	pro_quantity Char(20),
	pro_description Char(20),
	pro_image Char(20),
	pro_document Char(20),
	pca_uid Char(20) NOT NULL,
 Primary Key (pro_uid,sub_uid,pca_uid)) ENGINE = MyISAM;

Create table mdl_pro_category (
	pca_uid Char(20) NOT NULL,
	pca_name Char(20),
 Primary Key (pca_uid)) ENGINE = MyISAM;


Alter table mdl_product add Foreign Key (sub_uid,pca_uid) references mdl_subasta (sub_uid,pca_uid) on delete  restrict on update  restrict;
Alter table mdl_bid add Foreign Key (pro_uid,sub_uid,pca_uid) references mdl_product (pro_uid,sub_uid,pca_uid) on delete  restrict on update  restrict;
Alter table mdl_subasta add Foreign Key (pca_uid) references mdl_pro_category (pca_uid) on delete  restrict on update  restrict;


