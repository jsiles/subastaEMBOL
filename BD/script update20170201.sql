USE [subasta]
GO
TRUNCATE TABLE [dbo].[sys_modules]
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (1, N'es', N'roles', 0, N'Roles', N'', N'', 1, 0, N'ACTIVE', N'rolesNew.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (2, N'es', N'createRoles', 1, N'Crear rol', N'', N'', 2, 0, N'ACTIVE', N'rolesNew.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (3, N'es', N'usersRoles', 1, N'Ver/Modificar roles', N'', N'', 2, 0, N'ACTIVE', N'rolesList.php')
GO

INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (4, N'es', N'users', 0, N'Usuarios', N'', N'', 2, 0, N'ACTIVE', N'userNew.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (5, N'es', N'usersNew', 4, N'Crear usuario', N'', N'', 2, 0, N'ACTIVE', N'userNew.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (6, N'es', N'usersList', 4, N'Ver/Modificar usuarios', N'', N'', 2, 0, N'ACTIVE', N'userList.php')
GO

INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (7, N'es', N'subastaRavParametros', 0, N'RAV Par&aacute;metros', N'', N'', 3, 0, N'ACTIVE', N'subastasRavEdit.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (8, N'es', N'subastasRavEdit', 7, N'RAV Par&aacute;metros', N'', N'', 3, 0, N'ACTIVE', N'subastasRavEdit.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (9, N'es', N'subastasRavList', 7, N'Ver/Modificar RAV Par&aacute;metros', N'', N'', 3, 0, N'ACTIVE', N'subastasRavList.php')
GO

INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (10, N'es', N'subastaRavInforme', 0, N'RAV Informes', N'', N'', 4, 0, N'ACTIVE', N'subastasRavInfEdit.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (11, N'es', N'subastasRavInfEdit', 10, N'RAV Informe', N'', N'', 4, 0, N'ACTIVE', N'subastasRavInfEdit.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (12, N'es', N'subastasRavInfList', 10, N'Ver/Modificar RAV Informe', N'', N'', 4, 0, N'ACTIVE', N'subastasRavInfList.php')
GO

INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (13, N'es', N'client', 0, N'Proveedores', N'', N'', 5, 0, N'ACTIVE', N'clientNew.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (14, N'es', N'clientNew', 13, N'Crear proveedor', N'', N'', 5, 0, N'ACTIVE', N'clientNew.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (15, N'es', N'clientList', 13, N'Ver/Modificar proveedores', N'', N'', 5, 0, N'ACTIVE', N'clientList.php')
GO

INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (16, N'es', N'subastas', 0, N'Subastas', N'', N'', 6, 0, N'ACTIVE', N'subastasNew.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (17, N'es', N'subastasNew', 16, N'Crear Subasta', N'', N'', 6, 0, N'ACTIVE', N'subastasNew.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (18, N'es', N'subastasList', 16, N'Ver/Modificar subastas', N'', N'', 6, 0, N'ACTIVE', N'subastasList.php')
GO

INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (19, N'es', N'parametrizaciones', 0, N'Parametrizaciones', N'', N'', 7, 0, N'ACTIVE', N'autorizacionList.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (20, N'es', N'parametrizacionesList', 19, N'Ver/Modificar Parametrizaciones', N'', N'', 7, 0, N'ACTIVE', N'autorizacionList.php')
GO

INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (21, N'es', N'informes', 0, N'Informes Subasta', N'', N'', 7, 0, N'ACTIVE', N'autorizacionList.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (22, N'es', N'informesList', 21, N'Ver/Modificar Informes', N'', N'', 7, 0, N'ACTIVE', N'autorizacionList.php')
GO

INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (23, N'es', N'Reportes', 0, N'Reportes', N'', N'', 8, 0, N'ACTIVE', N'reporteList.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (24, N'es', N'ReporteList', 23, N'Reporte Par&aacute;metros', N'', N'', 8, 0, N'ACTIVE', N'reporteList.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (25, N'es', N'ReporteList2', 23, N'Reporte Informes', N'', N'', 8, 0, N'ACTIVE', N'reporteList2.php')
GO

INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (26, N'es', N'Banners', 0, N'Banners', N'', N'', 9, 0, N'ACTIVE', N'bannerNew.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (27, N'es', N'BannerNew', 26, N'Nuevo banner', N'', N'', 9, 0, N'ACTIVE', N'bannerNew.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (28, N'es', N'BannerList', 26, N'Ver/Modificar banners', N'', N'', 9, 0, N'ACTIVE', N'bannerList.php')
GO
TRUNCATE TABLE [dbo].[sys_modules_users]
GO
SET IDENTITY_INSERT [dbo].[sys_modules_users] ON 
GO
INSERT [dbo].[sys_modules_users] ([mus_uid], [mus_mod_uid], [mus_rol_uid], [mus_place], [mus_delete]) VALUES (1, 1, 1, N'MODULE', 0)
GO
INSERT [dbo].[sys_modules_users] ([mus_uid], [mus_mod_uid], [mus_rol_uid], [mus_place], [mus_delete]) VALUES (2, 2, 1, N'MODULE', 0)
GO
INSERT [dbo].[sys_modules_users] ([mus_uid], [mus_mod_uid], [mus_rol_uid], [mus_place], [mus_delete]) VALUES (3, 3, 1, N'MODULE', 0)
GO
INSERT [dbo].[sys_modules_users] ([mus_uid], [mus_mod_uid], [mus_rol_uid], [mus_place], [mus_delete]) VALUES (4, 4, 1, N'MODULE', 0)
GO
INSERT [dbo].[sys_modules_users] ([mus_uid], [mus_mod_uid], [mus_rol_uid], [mus_place], [mus_delete]) VALUES (5, 5, 1, N'MODULE', 0)
GO
INSERT [dbo].[sys_modules_users] ([mus_uid], [mus_mod_uid], [mus_rol_uid], [mus_place], [mus_delete]) VALUES (6, 6, 1, N'MODULE', 0)
GO
SET IDENTITY_INSERT [dbo].[sys_modules_users] OFF
GO

TRUNCATE TABLE [dbo].[sys_modules_options]
GO
SET IDENTITY_INSERT [dbo].[sys_modules_options] ON 
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (1, 3, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (2, 3, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (3, 3, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (4, 3, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (5, 3, N'Crear', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (6, 6, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (7, 6, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (8, 6, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (9, 6, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (10, 6, N'Crear', N'ACTIVE')
GO
--RAV PARAMETROS
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (11, 9, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (12, 9, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (13, 9, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (14, 9, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (15, 9, N'Crear', N'ACTIVE')
GO
--RAV INFORMES
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (16, 12, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (17, 12, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (18, 12, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (19, 12, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (20, 12, N'Crear', N'ACTIVE')
GO
--PROVEEDORES
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (21, 15, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (22, 15, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (23, 15, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (24, 15, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (25, 15, N'Crear', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (26, 15, N'Aprobar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (27, 15, N'Rechazar', N'ACTIVE')
GO
--SUBASTAS
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (28, 18, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (29, 18, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (30, 18, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (31, 18, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (32, 18, N'Crear', N'ACTIVE')
GO
--PARAMETRIZACIONES
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (33, 20, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (34, 20, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (35, 20, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (36, 20, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (37, 20, N'Crear', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (38, 20, N'Aprobar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (39, 20, N'Rechazar', N'ACTIVE')
GO
--INFORME SUBASTA
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (40, 22, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (41, 22, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (42, 22, N'Aprobar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (43, 22, N'Rechazar', N'ACTIVE')
GO
--REPORTES PARAMETROS
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (44, 24, N'Ver', N'ACTIVE')
GO
--REPORTES INFORMES
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (45, 25, N'Ver', N'ACTIVE')
GO
--BANNERS
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (46, 28, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (47, 28, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (48, 28, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (49, 28, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (50, 28, N'Crear', N'ACTIVE')
GO
SET IDENTITY_INSERT [dbo].[sys_modules_options] OFF
GO
TRUNCATE TABLE [dbo].[sys_modules_access] 
GO
SET IDENTITY_INSERT [dbo].[sys_modules_access] ON 
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (1, 1, 1, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (2, 1, 2, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (3, 1, 3, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (4, 1, 4, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (5, 1, 5, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (6, 1, 6, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (7, 1, 7, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (8, 1, 8, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (9, 1, 9, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (10, 1, 10, N'ACTIVE')
GO
SET IDENTITY_INSERT [dbo].[sys_modules_access] OFF
GO
