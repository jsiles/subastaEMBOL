set identity_insert sys_modules on
go
insert into sys_modules values (68,'es', 'Reportes', 0, 'Reportes', '','', 6, 0, 'ACTIVE', 'reporteList.php');
go
insert into sys_modules values (69,'es', 'ReporteList', 68, 'Rep. de subastas', '','', 6, 0, 'ACTIVE', 'reporteList.php');
go
insert into sys_modules values (70,'es', 'ReporteList2', 68, 'Rep. de pujas', '','', 6, 0, 'ACTIVE', 'reporteList2.php');
go
insert into sys_modules values (71,'es', 'Banners', 0, 'Banners', '','', 7, 0, 'ACTIVE', 'bannerList.php');
go
insert into sys_modules values (72,'es', 'BannerList', 71, 'Listado de banners', '','', 7, 0, 'ACTIVE', 'bannerList.php');
go
insert into sys_modules values (73,'es', 'BannerNew', 71, 'Nuevo banner', '','', 7, 0, 'ACTIVE', 'bannerNew.php');
go
set identity_insert sys_modules off
go
set identity_insert sys_modules_users on
go
insert into sys_modules_users values (68, 1, 'MODULE', 0);
go
insert into sys_modules_users values (69, 1, 'MODULE', 0);
go
insert into sys_modules_users values (70, 1, 'MODULE', 0);
go
insert into sys_modules_users values (71, 1, 'MODULE', 0);
go
insert into sys_modules_users values (72, 1, 'MODULE', 0);
go
insert into sys_modules_users values (73, 1, 'MODULE', 0);
go
set identity_insert sys_modules_users off
go
