--insert into sys_modules values (74,'es', 'subastasRav', 0, 'RAV', '','', 8, 0, 'ACTIVE', 'subastasRavList.php');
--insert into sys_modules values (75,'es', 'subastasRavList', 74, 'Listado RAV', '','', 8, 0, 'ACTIVE', 'subastasRavList.php');
--insert into sys_modules values (76,'es', 'subastasRavEdit', 74, 'Editar RAV', '','', 8, 0, 'ACTIVE', 'subastasRavEdit.php');
--insert into sys_modules_users values (74, 1, 'MODULE', 0);
--insert into sys_modules_users values (75, 1, 'MODULE', 0);
--insert into sys_modules_users values (76, 1, 'MODULE', 0);
delete from sys_modules where mod_uid in (74,75,76);
delete from sys_modules_users where mus_mod_uid in (74,75,76);
update sys_modules set mod_alias='aprobacion', mod_name='Aprobaci&oacute;n' where mod_uid=66;
update sys_modules set mod_alias='aprobacionList',mod_name='Listado de Aprobaciones' where mod_uid=67;
insert into sys_modules values (74,'es', 'subastasRavList', 66, 'Listado RAV Par&aacute;metros', '','', 5, 0, 'ACTIVE', 'subastasRavList.php');
insert into sys_modules values (75,'es', 'subastasRavEdit', 66, 'Editar RAV Par&aacute;metros', '','', 5, 0, 'ACTIVE', 'subastasRavEdit.php');
insert into sys_modules values (76,'es', 'subastasRavInfList', 66, 'Listado RAV Informe', '','', 5, 0, 'ACTIVE', 'subastasRavInfList.php');
insert into sys_modules values (77,'es', 'subastasRavInfEdit', 66, 'Editar RAV Informe', '','', 5, 0, 'ACTIVE', 'subastasRavInfEdit.php');
insert into sys_modules_users values (74, 1, 'MODULE', 0);
insert into sys_modules_users values (75, 1, 'MODULE', 0);
insert into sys_modules_users values (76, 1, 'MODULE', 0);
insert into sys_modules_users values (77, 1, 'MODULE', 0);
