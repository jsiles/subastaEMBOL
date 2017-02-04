USE [subasta]
GO
TRUNCATE TABLE [dbo].[mdl_contents]
GO
TRUNCATE TABLE [dbo].[mdl_contents_languages]
GO
TRUNCATE TABLE [dbo].[mdl_currency]
GO
TRUNCATE TABLE [dbo].[mdl_roles]
GO
TRUNCATE TABLE [dbo].[mdl_roles_users]
GO
TRUNCATE TABLE [dbo].[sys_labels]
GO
TRUNCATE TABLE [dbo].[sys_users]
GO
TRUNCATE TABLE [dbo].[mdl_tipologia]
GO

--LIMPIEZA RESTO TABLAS

TRUNCATE TABLE [dbo].[mdl_banners]
GO
TRUNCATE TABLE [dbo].[mdl_banners_contents]
GO
TRUNCATE TABLE [dbo].[mdl_bid]
GO
TRUNCATE TABLE [dbo].[mdl_biditem]
GO
TRUNCATE TABLE [dbo].[mdl_client]
GO
TRUNCATE TABLE [dbo].[mdl_clixitem]
GO
TRUNCATE TABLE [dbo].[mdl_divisas]
GO
TRUNCATE TABLE [dbo].[mdl_incoterm]
GO
TRUNCATE TABLE [dbo].[mdl_incoterm_language]
GO
TRUNCATE TABLE [dbo].[mdl_japonesa]
GO
TRUNCATE TABLE [dbo].[mdl_pro_category]
GO
TRUNCATE TABLE [dbo].[mdl_product]
GO
--TRUNCATE TABLE [dbo].[mdl_rav]
--GO
TRUNCATE TABLE [dbo].[mdl_round]
GO
TRUNCATE TABLE [dbo].[mdl_subasta]
GO
TRUNCATE TABLE [dbo].[mdl_subasta_adjudicar]
GO
TRUNCATE TABLE [dbo].[mdl_subasta_aprobar]
GO
TRUNCATE TABLE [dbo].[mdl_terminos]
GO
TRUNCATE TABLE [dbo].[mdl_transporte]
GO
TRUNCATE TABLE [dbo].[mdl_users]
GO
TRUNCATE TABLE [dbo].[mdl_xitem]
GO
TRUNCATE TABLE [dbo].[sys_item]
GO
TRUNCATE TABLE [dbo].[sys_language]
GO
TRUNCATE TABLE [dbo].[sys_log]
GO
TRUNCATE TABLE [dbo].[sys_session]
GO
TRUNCATE TABLE [dbo].[sys_users_verify]
GO
--CONTENIDOS
SET IDENTITY_INSERT [dbo].[mdl_contents] ON 

GO
INSERT [dbo].[mdl_contents] ([con_uid], [con_parent], [con_level], [con_position], [con_createuser], [con_createdate], [con_updateuser], [con_updatedate], [con_delete]) VALUES (1, 0, 0, 0, 2, CAST(N'2010-10-10 13:07:22.0000000' AS DateTime2), 2, CAST(N'2010-10-10 13:07:22.0000000' AS DateTime2), 0)
GO
INSERT [dbo].[mdl_contents] ([con_uid], [con_parent], [con_level], [con_position], [con_createuser], [con_createdate], [con_updateuser], [con_updatedate], [con_delete]) VALUES (2, 0, 0, 2, 2, CAST(N'2010-10-10 21:00:28.0000000' AS DateTime2), 2, CAST(N'2010-10-10 21:00:28.0000000' AS DateTime2), 0)
GO
INSERT [dbo].[mdl_contents] ([con_uid], [con_parent], [con_level], [con_position], [con_createuser], [con_createdate], [con_updateuser], [con_updatedate], [con_delete]) VALUES (3, 0, 0, 3, 2, CAST(N'2010-10-10 21:00:58.0000000' AS DateTime2), 2, CAST(N'2010-10-16 17:54:07.0000000' AS DateTime2), 0)
GO
INSERT [dbo].[mdl_contents] ([con_uid], [con_parent], [con_level], [con_position], [con_createuser], [con_createdate], [con_updateuser], [con_updatedate], [con_delete]) VALUES (4, 0, 0, 1, 2, CAST(N'2011-01-06 11:05:30.0000000' AS DateTime2), 2, CAST(N'2011-01-13 08:49:32.0000000' AS DateTime2), 0)
GO
SET IDENTITY_INSERT [dbo].[mdl_contents] OFF
GO
SET IDENTITY_INSERT [dbo].[mdl_contents_languages] ON 

GO
INSERT [dbo].[mdl_contents_languages] ([col_uid], [col_con_uid], [col_language], [col_title], [col_description], [col_content], [col_url], [col_metatitle], [col_metadescription], [col_metakeyword], [col_media], [col_image], [col_status]) VALUES (1, 1, N'es', N'Inicio', NULL, N'', N'inicio', N'Inicio', N'Inicio', N'Inicio', NULL, NULL, N'ACTIVE')
GO
INSERT [dbo].[mdl_contents_languages] ([col_uid], [col_con_uid], [col_language], [col_title], [col_description], [col_content], [col_url], [col_metatitle], [col_metadescription], [col_metakeyword], [col_media], [col_image], [col_status]) VALUES (2, 2, N'es', N'Categorias', NULL, N'', N'categorias', N'Categorias', N'Categorias', N'Categorias', NULL, NULL, N'ACTIVE')
GO
INSERT [dbo].[mdl_contents_languages] ([col_uid], [col_con_uid], [col_language], [col_title], [col_description], [col_content], [col_url], [col_metatitle], [col_metadescription], [col_metakeyword], [col_media], [col_image], [col_status]) VALUES (3, 3, N'es', N'Registro', NULL, N'\r\n<br />', N'registro', N'Registro', N'Registro', N'Registro', NULL, NULL, N'ACTIVE')
GO
INSERT [dbo].[mdl_contents_languages] ([col_uid], [col_con_uid], [col_language], [col_title], [col_description], [col_content], [col_url], [col_metatitle], [col_metadescription], [col_metakeyword], [col_media], [col_image], [col_status]) VALUES (4, 4, N'es', N'Divisas', NULL, N'', N'divisas', N'Compra Venta Divisas', N'Compra Venta Divisas', N'Compra Venta Divisas', NULL, NULL, N'ACTIVE')
GO
SET IDENTITY_INSERT [dbo].[mdl_contents_languages] OFF
GO

--MONEDAS
SET IDENTITY_INSERT [dbo].[mdl_currency] ON 

GO
INSERT [dbo].[mdl_currency] ([cur_uid], [cur_description], [cur_delete]) VALUES (1, N'Bs', 0)
GO
INSERT [dbo].[mdl_currency] ([cur_uid], [cur_description], [cur_delete]) VALUES (2, N'$us', 0)
GO
SET IDENTITY_INSERT [dbo].[mdl_currency] OFF
GO

--ROLES
INSERT [dbo].[mdl_roles] ([rol_uid], [rol_description], [rol_delete], [rol_status]) VALUES (1, N'ADMIN', 0, N'ACTIVE')
GO
--INSERT [dbo].[mdl_roles] ([rol_uid], [rol_description], [rol_delete], [rol_status]) VALUES (2, N'ANALISTA', 0, N'INACTIVE')
--GO
--INSERT [dbo].[mdl_roles] ([rol_uid], [rol_description], [rol_delete], [rol_status]) VALUES (3, N'SUBASTADOR', 0, N'INACTIVE')
--GO
--INSERT [dbo].[mdl_roles] ([rol_uid], [rol_description], [rol_delete], [rol_status]) VALUES (4, N'JEFATURA', 0, N'INACTIVE')
--GO
--INSERT [dbo].[mdl_roles] ([rol_uid], [rol_description], [rol_delete], [rol_status]) VALUES (5, N'GERENCIA', 0, N'INACTIVE')
--GO
--ROL USUARIO
INSERT [dbo].[mdl_roles_users] ([rus_uid], [rus_usr_uid], [rus_rol_uid]) VALUES (1, 1, 1)
GO
--ETIQUETAS
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'active', N'label', N'es', N'Activo', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'add', N'label', N'es', N'Agregar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'address', N'alt', N'es', N'Zona, calle y numero', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'address', N'label', N'es', N'Dirección', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'annex', N'adjunt', N'es', N'Documento adjunto', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'annex', N'adjunthelp', N'es', N'Puede introducir todo tipo de documentos como los documentos de word o archivos pdf .', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'annex', N'label', N'es', N'Anexos', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'annex', N'multimedia', N'es', N'Código multimedia', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'annex', N'multimediahelp', N'es', N'Puede introducir codigo proporcionado por youtube, bliptv u otro tipo de codigo.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'annex', N'required', N'es', N'Documento requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'author', N'create', N'es', N'Crear autor', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'author', N'label', N'es', N'Periodista', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'author', N'list', N'es', N'Listado de Autores', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'author', N'noexist', N'es', N'En este momento el sitio no tiene autores registrados', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'back', N'label', N'es', N'Volver', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'balance', N'create', N'es', N'Nuevo', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'balance', N'label', N'es', N'Balance general del FCI', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'balance', N'list', N'es', N'Listado balance general del FCI', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'banner', N'content', N'es', N'Contenido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'banner', N'create', N'es', N'Crear banners', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'banner', N'edit', N'es', N'Editar banner', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'banner', N'footer', N'es', N'Footer', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'banner', N'gallery', N'es', N'Galería', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'banner', N'inhelp', N'es', N'Donde colocar el banner', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'banner', N'label', N'es', N'Banner', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'banner', N'left', N'es', N'Izquierda', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'banner', N'list', N'es', N'Listado de banners', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'banner', N'main', N'es', N'Main', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'banner', N'place', N'es', N'Ubicación', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'banner', N'right', N'es', N'Derecha', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'banner', N'statushelp', N'es', N'Estado del banner', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'banner', N'title', N'es', N'T&iacute;tulo del banner', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'banner', N'titleerror', N'es', N'T&iacute;tulo del banner es necesario', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'banner', N'titlehelp', N'es', N'Introduzca el t&iacute;tulo del banner', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'banner', N'view', N'es', N'Ver banner', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'banner_required', N'label', N'es', N'Solo se permite archivos jpg bmp gif png y swf', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'birthday', N'label', N'es', N'Fecha de nacimiento', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'blog', N'create', N'es', N'Registrar blog', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'blog', N'edit', N'es', N'Editar blog', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'blog', N'titleerror', N'es', N'Título de blog requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'blog', N'urlerror', N'es', N'Dirección WEB requerida', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'blogs', N'list', N'es', N'Lista de blogs', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'completed', N'es', N'completado', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'create', N'es', N'Crear bolet&iacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'data', N'es', N'Datos del boletín', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'datehelp', N'es', N'Introduzca la fecha de envío del boletín', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'descriptionc', N'es', N'Descripcion corta', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'descriptionl', N'es', N'Descripcion larga', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'div_bul_descriptionl', N'es', N'Descripcion larga requerida', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'edit', N'es', N'Editar bolet&iacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'grouperror', N'es', N'Grupo requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'list', N'es', N'Listado de boletines', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'mail', N'es', N'Correo', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'mailerror', N'es', N'Correo requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'nameerror', N'es', N'Nombre requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'need_subject', N'es', N'Asunto del bolet&iacute;n requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'need_title', N'es', N'Título de boletín', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'send', N'es', N'Enviando bolet&iacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'sending', N'es', N'Enviando bolet&iacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'sendingend', N'es', N'Env&iacute;o de bolet&iacute;n finalizado', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'sendingto', N'es', N'Enviando a', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'sendtest', N'es', N'Enviar prueba', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'subjecthelp', N'es', N'Introduzca el asunto del boletín', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'template', N'es', N'Plantillas', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'templatehelp', N'es', N'Seleccione la plantilla deseada para en envío del boletín', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'test', N'es', N'Correo de prueba', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'testmailerror', N'es', N'Correo de prueba requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'testmailhelp', N'es', N'Correo de prueba para el envío de boletines', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'bulletin', N'titleerror', N'es', N'Título de bolet&iacute;n requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'buys', N'buyslist', N'es', N'Listado de noticias pagadas', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'buys', N'create', N'es', N'Crear noticia pagada', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'cancel', N'label', N'es', N'Cancelar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'area', N'es', N'&Aacute;rea', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'catCategoryerror', N'es', N'Título de categoría requerido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'catcreate', N'es', N'Nueva categor&iacute;a', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'catedit', N'es', N'Editar categor&iacute;a', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'comment', N'es', N'Permitir comentarios', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'commenthelp', N'es', N'Los usuarios podr&aacute;n opinar acerca de  las oferta laborals', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'contact', N'es', N'Contacto', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'cost', N'es', N'Costo', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'create', N'es', N'Crear oferta de capacitación', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'date', N'es', N'Fecha de publicaci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'datehelp', N'es', N'Fecha de publicaci&oacute;n de la oferta laboral.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'description', N'es', N'Descripci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'descriptionhelp', N'es', N'Breve descripcion que sera mostrada en la lista de oferta laboral.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'edit', N'es', N'Editar oferta', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'email', N'es', N'Correo de contacto', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'image', N'es', N'Imagen', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'imagehelp', N'es', N'La imagen debe tener el tamaño definido, por que en caso contrario, ser&aacute; redimencionada al mismo.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'in', N'es', N'Colocar en', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'list', N'es', N'Listado de ofertas de capacitación', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'necerror', N'es', N'Es necesario clasificar el contenido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'thematic', N'es', N'Tem&aacute;tica', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'title', N'es', N'T&iacute;tulo', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'titleerror', N'es', N'Titulo de oferta laboral requerido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'capa', N'titlehelp', N'es', N'Introduzca el titular de la oferta laboral.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'category', N'label', N'es', N'Categor&iacute;a', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'cellular', N'alt', N'es', N'Telefono movil', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'cellular', N'label', N'es', N'Celular', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'change', N'label', N'es', N'cambiar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'changelanguage', N'es', N'es', N'English', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'changelanguage1', N'es', N'es', N'Deutsche', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'ci', N'label', N'es', N'Carnet de identidad', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'city', N'alt', N'es', N'Ciudad', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'city', N'label', N'es', N'Ciudad', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'client', N'clientedit', N'es', N'Editar cliente', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'client', N'clientlist', N'es', N'Listado de clientes', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'client', N'clientnew', N'es', N'Crear cliente', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'client', N'noclient', N'es', N'En este momento el sitio no tiene clientes.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'close', N'label', N'es', N'X', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'close2', N'label', N'es', N'cerrar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'code', N'label', N'es', N'Código', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'comment', N'label', N'es', N'Comentarios', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'communique', N'create', N'es', N'Crear comunicado', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'communique', N'date', N'es', N'Fecha de expiraci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'communique', N'description', N'es', N'Descripci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'communique', N'edit', N'es', N'Editar comunicado', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'communique', N'hour', N'es', N'Hora de expiraci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'communique', N'list', N'es', N'Lista de comunicados', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'communique', N'title', N'es', N'T&iacute;tulo de comunicado', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'communique', N'titleerror', N'es', N'Titulo de comunicado requerido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'communique', N'view', N'es', N'Ver comunicado', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'contents', N'create', N'es', N'Crear contenido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'contents', N'data', N'es', N'Datos generales', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'contents', N'edit', N'es', N'Editar contenido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'contents', N'in', N'es', N'Colocar en', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'contents', N'inhelp', N'es', N'Ubica el contenido en el nivel espesificado del menu.', N'INACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'contents', N'name', N'es', N'Nombre del contenido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'contents', N'namehelp', N'es', N'T&iacute;tulo del contenido a publicar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'contents', N'statushelp', N'es', N'Si el contenido se coloca en estado inactivo, no aparecerá en el sitio', N'INACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'contents', N'title', N'es', N'Listado de contenidos', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'contents', N'titleerror', N'es', N'Nombre del contenido es necesario', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'continue', N'label', N'es', N'Continuar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'country', N'alt', N'es', N'País de procedencia', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'country', N'label', N'es', N'Pais', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'data', N'label', N'es', N'Datos', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'date', N'begin', N'es', N'Fecha de inicio', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'date', N'end', N'es', N'Fecha de culminaci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'date', N'event', N'es', N'Fecha del evento', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'date', N'label', N'es', N'Fecha', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'date', N'publication', N'es', N'Fecha de publicación', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'date', N'publicationhelp', N'es', N'Fecha en la cual fue publicado el contenido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'del', N'label', N'es', N'eliminar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'delete', N'label', N'es', N'Eliminar registro.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'delete', N'linkImage', N'es', N'lib/delete_es.gif', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'delete', N'linkPage', N'es', N'view.php', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'delete', N'ready', N'es', N'¿Esta seguro de eliminar este registro?', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'delete', N'sure', N'es', N'Está seguro de eliminar el registro', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'description', N'label', N'es', N'Descripción', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'adjunts', N'es', N'Documentos adjuntos', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'catCategoryerror', N'es', N'Título de categoría requerido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'catcreate', N'es', N'Nueva categor&iacute;a', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'catedit', N'es', N'Editar categor&iacute;a', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'comment', N'es', N'Permitir comentarios', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'commenthelp', N'es', N'Los usuarios podr&aacute;n opinar sobre las publicaciones', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'create', N'es', N'Crear Publicación', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'date', N'es', N'Fecha de publicaci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'datehelp', N'es', N'Fecha de publicaci&oacute;n de la noticia.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'description', N'es', N'Descripci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'descriptionhelp', N'es', N'Breve descripcion que ser&aacute; mostrada en publicaciones.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'edit', N'es', N'Editar publicaci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'image', N'es', N'Imagen', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'imagehelp', N'es', N'La imagen debe tener el tamaño definido, por que en caso contrario, ser&aacute; redimencionada al mismo.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'in', N'es', N'Colocar en', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'inhelp', N'es', N'Define la categoría a la cual pertenece.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'label', N'es', N'Publicación', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'list', N'es', N'Listado de Publicaciones', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'name', N'es', N'Nombre del documento', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'new', N'es', N'Imagen', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'prcerror', N'es', N'Es necesario clasificar el contenido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'stresshelp', N'es', N'Destacado', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'thematic', N'es', N'Temática', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'thematichelp', N'es', N'Define el tipo de página a publicar. Esta se divide en las siguientes temáticas: Político, Social, Económico,Jurídico, Hidrocarburos,Medio ambiente y tierra y Temas Regionales', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'title', N'es', N'T&iacute;tulo de la publicaci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'titleerror', N'es', N'Título de publicaci&oacute;n requerido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'docs', N'titlehelp', N'es', N'Introduzca el titular de la publicaci&oacute;n.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'edit', N'label', N'es', N'Editar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'edit', N'linkImage', N'es', N'lib/edit_es.gif', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'edit', N'linkPage', N'es', N'view.php', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'email', N'label', N'es', N'Correo electr&oacute;nico', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'catCategoryerror', N'es', N'Título de categoría requerido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'catcreate', N'es', N'Nueva categor&iacute;a', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'catedit', N'es', N'Editar categor&iacute;a', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'comment', N'es', N'Permitir comentarios', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'commenthelp', N'es', N'Los usuarios podr&aacute;n opinar sobre los eventos', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'create', N'es', N'Crear evento', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'date', N'es', N'Fecha de publicaci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'datehelp', N'es', N'Fecha de publicaci&oacute;n de la noticia.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'description', N'es', N'Descripci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'descriptionc', N'es', N'Descripci&oacute;n corta', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'descriptionhelp', N'es', N'Breve descripcion que sera mostrada en la lista de eventos.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'edit', N'es', N'Editar evento', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'evcerror', N'es', N'Seleccione una categoría para el contenido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'image', N'es', N'Imagen', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'imagehelp', N'es', N'La imagen debe tener el tamaño definido, por que en caso contrario, ser&aacute; redimencionada al mismo.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'in', N'es', N'Colocar en', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'inhelp', N'es', N'Define la categoría a la cual pertenece.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'list', N'es', N'Lista de eventos', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'location', N'es', N'Lugar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'locationhelp', N'es', N'Ubicaci&oacute;n del evento', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'thematic', N'es', N'Temática', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'thematichelp', N'es', N'Define el tipo de página a publicar.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'title', N'es', N'T&iacute;tulo de evento', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'titleerror', N'es', N'Titulo de evento requerido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'events', N'titlehelp', N'es', N'Introduzca el titular del evento.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'faq', N'answer', N'es', N'Respuesta', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'faq', N'create', N'es', N'Crear pregunta frecuente', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'faq', N'label', N'es', N'Preguntas frecuentes', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'faq', N'list', N'es', N'Listado de preguntas frecuentes', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'faq', N'nofaqs', N'es', N'No existen preguntas guardadas', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'faq', N'question', N'es', N'Pregunta', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'fax', N'alt', N'es', N'Numero de fax', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'fax', N'label', N'es', N'Fax', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'filequestion', N'label', N'es', N'Está seguro de eliminar el archivo', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'firstname', N'alt', N'es', N'Ingrese su nombre completo', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'firstname', N'label', N'es', N'Nombre', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'form', N'email', N'es', N'E-mail', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'form', N'email_exist', N'es', N'Email ya registrado', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'form', N'forbidden', N'es', N'No tiene permisos suficientes', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'form', N'form_invalid', N'es', N'Valor no válido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'form', N'form_required', N'es', N'Campo requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'form', N'invalid', N'es', N'Valor inválido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'form', N'invalid_email', N'es', N'Email no válido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'form', N'invalid_password', N'es', N'Contraseña invalida', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'form', N'password_mismatch', N'es', N'Contraseña no coincide', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'form', N'required', N'es', N'Este es un campo requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'form', N'select', N'es', N'Seleccionar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'form', N'submit', N'es', N'Enviar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'gallery', N'addGallery', N'es', N'Adjuntar imágenes', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'gallery', N'albumnew', N'es', N'Crear Album de fotos', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'gallery', N'create', N'es', N'Crear galería', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'gallery', N'edit', N'es', N'Editar galer&iacute;a', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'gallery', N'editalbum', N'es', N'Editar Album de fotos', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'gallery', N'in', N'es', N'Colocar en', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'gallery', N'inhelp', N'es', N'En que categoria se ubica la galería de fotos', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'gallery', N'label', N'es', N'Galería', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'gallery', N'list', N'es', N'Listado de galerías', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'gallery', N'noimages', N'es', N'En este momento la galeria no cuenta con fotografías.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'gallery', N'statushelp', N'es', N'Si se encuentra inactivo no se verá en la galería de imágenes', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'gallery', N'titleerror', N'es', N'Título de album requerido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'gallery', N'titlehelp', N'es', N'Título de la galería', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'gallery', N'uploadphoto', N'es', N'Subir fotografías', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'gender', N'label', N'es', N'G&eacute;nero', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'group', N'create', N'es', N'Crear grupo', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'group', N'label', N'es', N'Grupo', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'groups', N'label', N'es', N'Grupos', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'hour', N'label', N'es', N'Hora', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'htmltitlepage', N'label', N'es', N'admin', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'image', N'current', N'es', N'Imagen actual', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'image', N'foot', N'es', N'Pie de foto', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'image', N'recomended', N'es', N'Se recomienda subir fotografías en formato JPG', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'image', N'search', N'es', N'Buscar en archivo de imágenes', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'imagequestion', N'label', N'es', N'Está seguro de eliminar la imágen', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'in', N'label', N'es', N'en', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'inactive', N'label', N'es', N'Inactivo', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'interior', N'wysiwyg', N'es', N'Editor wysiwyg', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'labels', N'anual', N'es', N'Anual', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'labels', N'category', N'es', N'Categoría', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'labels', N'categoryerror', N'es', N'Categoría requerida', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'labels', N'description', N'es', N'Descripción', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'labels', N'descriptionerror', N'es', N'Descripción requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'labels', N'id', N'es', N'Etiqueta', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'labels', N'list', N'es', N'Listado de etiquetas', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'labels', N'mensual', N'es', N'Mensual', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'labels', N'new', N'es', N'Nueva Etiqueta', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'labels', N'quantity', N'es', N'Cantidad', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'labels', N'semestral', N'es', N'Semestral', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'labels', N'target', N'es', N'Ubicación', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'labels', N'time', N'es', N'Tiempo', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'labels', N'trimestral', N'es', N'Trimestral', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'labels', N'uiderror', N'es', N'Identificador requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'language', N'label', N'es', N'Lenguaje', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'lastname', N'alt', N'es', N'Ingrese su apellido completo', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'lastname', N'label', N'es', N'Apellido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'line', N'label', N'es', N'Lineas', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'list', N'label', N'es', N'Listado', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'login', N'alt', N'es', N'Será utilizado para ingresar al sistema', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'login', N'altpassword', N'es', N'Ingrese su contrase&ntilde;a de usuario', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'login', N'altuser', N'es', N'Ingrese su nombre de usuario', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'login', N'error', N'es', N'Los datos ingresados no son correctos, por favor vuelva a intentarlo.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'login', N'label', N'es', N'Ingresar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'login', N'password', N'es', N'Contrase&ntilde;a', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'login', N'user', N'es', N'Usuario', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'logo', N'label', N'es', N'Simple99', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'logo', N'link', N'es', N'http://www.simple99.com', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'logo', N'text', N'es', N'Logo', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'logout', N'label', N'es', N'Cerrar sesión', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'logout', N'link', N'es', N'logout.php', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'metadescription', N'help', N'es', N'Breve reseña de lo que representa la informacion a publicar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'metakeyword', N'help', N'es', N'Palabras claves permiten identificar el tipo de contenido permitiendo que se posicione en las primeras posiciones de los buscadores.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'metatitle', N'help', N'es', N'Herramienta para buscadores', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'minus_on', N'label', N'es', N'Cerrar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'minus_on', N'linkImage', N'es', N'lib/buttons/minus.gif', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'minus_on', N'linkPage', N'es', N'minus.php', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'modules', N'alias', N'es', N'Alias', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'modules', N'location', N'es', N'Colocar en', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'modules', N'name', N'es', N'Nombre del modulo', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'modules', N'php', N'es', N'Ubicación php', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'modules', N'status', N'es', N'Estado', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'more_off', N'label', N'es', N'No existe opciones', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'more_off', N'linkImage', N'es', N'lib/buttons/more_off.gif', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'more_off', N'linkPage', N'es', N'more.php', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'more_on', N'label', N'es', N'Ver Más', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'more_on', N'linkImage', N'es', N'lib/buttons/more.gif', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'more_on', N'linkPage', N'es', N'more.php', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'catCategoryerror', N'es', N'Título de categoría requerido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'catcreate', N'es', N'Nueva categor&iacute;a', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'catedit', N'es', N'Editar categor&iacute;a', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'comment', N'es', N'Permitir comentarios', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'commenthelp', N'es', N'Los usuarios podr&aacute;n opinar sobre las publicaciones', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'create', N'es', N'Crear contenido multimedia', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'date', N'es', N'Fecha de publicaci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'datehelp', N'es', N'Fecha de publicaci&oacute;n del contenido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'description', N'es', N'Descripci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'descriptionhelp', N'es', N'Breve descripcion que ser&aacute; mostrada en publicaciones.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'edit', N'es', N'Editar publicaci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'image', N'es', N'Imagen', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'imagehelp', N'es', N'La imagen debe tener el tamaño definido, por que en caso contrario, ser&aacute; redimencionada al mismo.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'in', N'es', N'Colocar en', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'inhelp', N'es', N'Define la categoría a la cual pertenece.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'list', N'es', N'Lista multimedia', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'new', N'es', N'Imagen', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'prcerror', N'es', N'Es necesario clasificar el contenido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'stresshelp', N'es', N'Destacado', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'thematic', N'es', N'Temática', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'thematichelp', N'es', N'Define el tipo de página a publicar.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'title', N'es', N'T&iacute;tulo de la contenido multimedia', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'titleerror', N'es', N'Título de multimedia requerido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'mult', N'titlehelp', N'es', N'Introduzca el titular multimedia.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'myprofile', N'label', N'es', N'Mi Cuenta', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'myprofile', N'link', N'es', N'myProfile.php', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'name', N'label', N'es', N'Nombre', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'new', N'label', N'es', N'Nuevo', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'audio', N'es', N'Archivo de sonido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'audio_file', N'es', N'Archivo de sonido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'audio_name', N'es', N'Nombre de archivo de sonido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'catCategoryerror', N'es', N'Título de categoría requerido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'catcreate', N'es', N'Nueva categor&iacute;a', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'catedit', N'es', N'Editar categor&iacute;a', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'category', N'es', N'Categoría', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'column', N'es', N'Ubicación', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'comment', N'es', N'Permitir comentarios', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'commenthelp', N'es', N'Los usuarios podr&aacute;n opinar acerca de  las noticias', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'create', N'es', N'Crear noticia', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'date', N'es', N'Fecha de publicaci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'datehelp', N'es', N'Fecha de publicaci&oacute;n de la noticia.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'description', N'es', N'Epígrafe', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'descriptionhelp', N'es', N'Breve descripcion que sera mostrada en la lista de noticias.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'edit', N'es', N'Editar noticia', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'foot_img', N'es', N'Pie de foto', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'forbidden', N'es', N'Estimado usuario, para ver la noticia extensa debe ser un usuario con suscripción', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'free_access', N'es', N'Acceso libre', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'home', N'es', N'Publicar en home', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'image', N'es', N'Imagen', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'imagehelp', N'es', N'La imagen debe tener el tamaño definido, por que en caso contrario, ser&aacute; redimencionada al mismo.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'imagesize', N'es', N'Imagen', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'in', N'es', N'Área', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'last', N'es', N'Última noticia', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'list', N'es', N'Listado de noticias', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'location', N'es', N'Lugar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'necerror', N'es', N'Es necesario clasificar el contenido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'news', N'es', N'Noticias', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'related', N'es', N'Noticias relacionadas', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'template', N'es', N'Template del día', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'thematic', N'es', N'Tem&aacute;tica', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'title', N'es', N'T&iacute;tulo de noticia', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'titleerror', N'es', N'Titulo de noticia requerido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'titlehelp', N'es', N'Introduzca el titular de la noticia.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'toeditor', N'es', N'Enviar a Revisión', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'news', N'update', N'es', N'Actualizar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'no', N'label', N'es', N'No', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'noarti', N'label', N'es', N'En este momento el sitio no tiene artículos.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'noblogs', N'label', N'es', N'En este momento el sitio no tiene blogs registrados.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'nobulletin', N'label', N'es', N'En este momento el sitio no tiene boletines.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'nocapa', N'label', N'es', N'En este momento no hay ofertas de capasitación.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'nocommuniques', N'label', N'es', N'En este momento el sitio no tiene communicados vigentes.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'nocontent', N'label', N'es', N'En este momento el sitio no tiene contenidos.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'nodocs', N'label', N'es', N'En este momento el sitio no tiene documentos.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'noevents', N'label', N'es', N'En este momento el sitio no tiene eventos.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'nogallery', N'label', N'es', N'En este momento no existen galerías disponibles.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'nointer', N'label', N'es', N'En este momento el sitio no tiene entrevistas.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'nomult', N'label', N'es', N'En este momento el sitio no tiene contenido multimedia.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'nonews', N'label', N'es', N'En este momento el sitio no tiene noticias.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'noopinion', N'label', N'es', N'En este momento el sitio no tiene opiniones.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'nopress', N'label', N'es', N'En este momento el sitio no tiene páginas en Sala de prensa.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'noproducts', N'label', N'es', N'En este momento el sitio no tiene productos.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'note', N'label', N'es', N'Nota', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'note', N'list', N'es', N'Lista de notas', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'note', N'none', N'es', N'El boletín no tiene notas', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'note', N'save', N'es', N'Guardar nota', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'notheme', N'label', N'es', N'En este momento el sitio no tiene temas.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'nousers', N'label', N'es', N'En este momento no hay usuarios registrados', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'nro', N'label', N'es', N'Número', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'of', N'label', N'es', N'de', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'opinion', N'authorerror', N'es', N'Autor requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'opinion', N'authorhelp', N'es', N'Autor', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'opinion', N'column', N'es', N'Columna', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'opinion', N'create', N'es', N'Crear opinión', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'opinion', N'create2', N'es', N'Crear autor', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'opinion', N'edit', N'es', N'Editar opini&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'opinion', N'list', N'es', N'Listado de opiniones', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'opinion', N'opinant', N'es', N'Opinante', N'ACTIVE', 1)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'opinion', N'opinante', N'es', N'Autor', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'opinion', N'title', N'es', N'Título de opinión', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'opinion', N'titleerror', N'es', N'Título de opini&oacute;n requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'or', N'label', N'es', N'o', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'other', N'label', N'es', N'Otro', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'other_category_error', N'label', N'es', N'Categor&iacute;a requirida', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'other_thematic_error', N'label', N'es', N'Temática requerida', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'others', N'label', N'es', N'Otros', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'paginator', N'next', N'es', N'Siguiente', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'paginator', N'previus', N'es', N'Anterior', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'pass', N'label', N'es', N'Paso', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'password', N'alt', N'es', N'Si deja este campo en blanco, se mantendrá la clave anterior.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'permit', N'list', N'es', N'Listado de permisos', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'permit', N'name', N'es', N'Nombre del permiso:', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'permit', N'newpermit', N'es', N'Crear permisos', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'permit', N'nopermit', N'es', N'En este momento el sitio no tiene permisos.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'permit', N'upd', N'es', N'Editar permisos', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'phone', N'alt', N'es', N'Numero telefonico', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'phone', N'label', N'es', N'Tel&eacute;fono', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'photo', N'alt', N'es', N'La fotografia será redimencionada. <br>Se recomienda el uso de JPG.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'photo', N'label', N'es', N'Fotografía', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'photos', N'label', N'es', N'Fotografías', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'presentation', N'label', N'es', N'Presentación', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'create', N'es', N'Crear página', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'date', N'es', N'Fecha de publicaci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'datehelp', N'es', N'Fecha de publicaci&oacute;n de la noticia.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'description', N'es', N'Descripci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'descriptionhelp', N'es', N'Breve descripcion que sera mostrada en la página de prensa.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'edit', N'es', N'Editar página', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'image', N'es', N'Imagen', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'imagehelp', N'es', N'La imagen debe tener el tamaño definido, por que en caso contrario, ser&aacute; redimencionada al mismo.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'in', N'es', N'Colocar en', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'inhelp', N'es', N'Define la categoría a la cual pertenece la página de prensa.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'list', N'es', N'Listo de páginas en Sala de prensa', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'new', N'es', N'Imagen', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'prcerror', N'es', N'Es necesario clasificar el contenido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'statushelp', N'es', N'Si desactiva este contenido no aparecer&aacute; en la p&aacute;gina web.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'thematic', N'es', N'Temática', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'thematichelp', N'es', N'Define el tipo de página a publicar. Esta se divide en las siguientes temáticas: Político, Social, Económico,Jurídico, Hidrocarburos,Medio ambiente y tierra y Temas Regionales', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'title', N'es', N'T&iacute;tulo de prensa', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'titleerror', N'es', N'Título de prensa requerido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'press', N'titlehelp', N'es', N'Introduzca el titular de la página de prensa.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'price', N'label', N'es', N'Precio', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'principal', N'label', N'es', N'Men&uacute; principal', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'product', N'label', N'es', N'Producto', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'catCategoryerror', N'es', N'Título de categoría requerido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'catcreate', N'es', N'Crear lineas', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'catedit', N'es', N'Editar categor&iacute;a', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'comment', N'es', N'Permitir comentarios', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'commenthelp', N'es', N'Los usuarios podr&aacute;n opinar acerca de  las productos', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'create', N'es', N'Crear productos y servicios', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'date', N'es', N'Fecha de publicaci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'datehelp', N'es', N'Fecha de publicaci&oacute;n de la producto.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'description', N'es', N'Descripci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'descriptionhelp', N'es', N'Breve descripcion que sera mostrada en la lista de productos.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'edit', N'es', N'Editar producto', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'image', N'es', N'Imagen', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'imagehelp', N'es', N'La imagen debe tener el tamaño definido, por que en caso contrario, ser&aacute; redimencionada al mismo.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'in', N'es', N'Colocar en', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'list', N'es', N'Lista de productos', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'necerror', N'es', N'Es necesario clasificar el contenido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'thematic', N'es', N'Tem&aacute;tica', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'title', N'es', N'T&iacute;tulo de producto', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'titleerror', N'es', N'Titulo de producto requerido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'products', N'titlehelp', N'es', N'Introduzca el titular de la producto.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'public', N'label', N'es', N'Publicar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'register', N'alt', N'es', N'Registrar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'register', N'label', N'es', N'Registrar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'required', N'label', N'es', N'Requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'roles', N'edit', N'es', N'Editar Rol', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'roles', N'list', N'es', N'Listado de roles', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'roles', N'name', N'es', N'Rol', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'save', N'label', N'es', N'Guardar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'select', N'label', N'es', N'Seleccionar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'select', N'opinion', N'es', N'Opinante', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'send', N'error', N'es', N'Error al enviar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'send', N'label', N'es', N'Enviar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'send', N'ok', N'es', N'Env&iacute;o satisfactorio', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'seo', N'label', N'es', N'Optimizaci&oacute;n para buscadores (SEO)', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'seo', N'metadescription', N'es', N'Descripci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'seo', N'metakeywords', N'es', N'Palabras claves', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'seo', N'metatitle', N'es', N'T&iacute;tulo', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'site', N'label', N'es', N'Sitio', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'state', N'alt', N'es', N'Si se encuentra en estados unidos', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'stats', N'create', N'es', N'Crear nuevo documento de estadísticas', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'stats', N'edit', N'es', N'Editar estadísticas', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'stats', N'label', N'es', N'Estadísticas', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'stats', N'list', N'es', N'Listado de estadísticas', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'stats', N'month', N'es', N'Mes', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'stats', N'year', N'es', N'Año', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'status', N'label', N'es', N'Estado', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'status_off', N'label', N'es', N'Desactivado', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'status_off', N'linkImage', N'es', N'lib/inactive_es.gif', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'status_off', N'linkPage', N'es', N'inactive_es.php', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'status_on', N'label', N'es', N'Activado', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'status_on', N'linkImage', N'es', N'lib/active_es.gif', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'status_on', N'linkPage', N'es', N'active.php', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'stress', N'help', N'es', N'El contenido aparecerá al principio de la lista. Solo existe un destacado por lista.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'stress', N'label', N'es', N'Destacar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'stressed', N'label', N'es', N'Destacado', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'subastas', N'create', N'es', N'Crear subasta', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'subastas', N'list', N'es', N'Listado de subastas', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'subastas', N'nosubasta', N'es', N'no hay subastas', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'subject', N'label', N'es', N'Asunto', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'catCategoryerror', N'es', N'Título de categoría requerido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'catcreate', N'es', N'Nueva categor&iacute;a', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'catedit', N'es', N'Editar categor&iacute;a', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'comment', N'es', N'Permitir comentarios', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'commenthelp', N'es', N'Los usuarios podr&aacute;n opinar acerca de  los temas', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'create', N'es', N'Crear tema', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'date', N'es', N'Fecha de publicaci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'datehelp', N'es', N'Fecha de publicaci&oacute;n del tema.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'description', N'es', N'Descripci&oacute;n', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'descriptionhelp', N'es', N'Breve descripcion que sera mostrada en la lista de temas.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'edit', N'es', N'Editar tema', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'image', N'es', N'Imagen', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'imagehelp', N'es', N'La imagen debe tener el tamaño definido, por que en caso contrario, ser&aacute; redimencionada al mismo.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'in', N'es', N'Colocar en', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'list', N'es', N'Lista de temas', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'necerror', N'es', N'Es necesario clasificar el contenido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'thematic', N'es', N'Tem&aacute;tica', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'title', N'es', N'T&iacute;tulo del tema', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'titleerror', N'es', N'Titulo del tema requerido.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'theme', N'titlehelp', N'es', N'Introduzca el titular del tema.', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'title', N'label', N'es', N'Agencia de Noticias Fides - ANF', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'type', N'label', N'es', N'Tipo', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'update', N'label', N'es', N'Actualizar', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'url', N'label', N'es', N'Url', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'user', N'edit', N'es', N'Editar usuario', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'user', N'editar', N'es', N'Editar usuario', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'user', N'generaldata', N'es', N'Datos generales', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'user', N'label', N'es', N'Listado de usuarios', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'user', N'link', N'es', N'userList.php', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'user', N'namerol', N'es', N'Nombre del rol', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'user', N'new', N'es', N'Crear usuario', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'user', N'newrol', N'es', N'Crear rol', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'user', N'personaldata', N'es', N'Datos personales', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'user', N'type', N'es', N'Tipo de usuario', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'user', N'userrol', N'es', N'Rol de usuario', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'user', N'view', N'es', N'Ver usuarios', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'users', N'addressreq', N'es', N'dirección requerida', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'users', N'cityreq', N'es', N'ciudad requerida', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'users', N'countryreq', N'es', N'pa&iacute;s requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'users', N'label', N'es', N'Usuarios', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'users', N'lasterror', N'es', N'Apellido requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'users', N'mailerror', N'es', N'Correo requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'users', N'nameerror', N'es', N'Nombre requerido', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'users', N'passreq', N'es', N'Contrase&ntilde;a requerida', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'usertype', N'alt', N'es', N'Tipo de usuario', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'view', N'historic', N'es', N'Ver historico de pagos', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'view', N'label', N'es', N'Ver', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'view', N'linkImage', N'es', N'lib/view_es.gif', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'view', N'linkPage', N'es', N'view.php', N'ACTIVE', 0)
GO
INSERT [dbo].[sys_labels] ([lab_uid], [lab_category], [lab_language], [lab_label], [lab_status], [lab_delete]) VALUES (N'yes', N'label', N'es', N'Sí', N'ACTIVE', 0)
GO

--USUARIOS
INSERT [dbo].[sys_users] ([usr_uid], [usr_login], [usr_pass], [usr_firstname], [usr_lastname], [usr_email], [usr_phone], [usr_fax], [usr_cellular], [usr_address], [usr_status], [usr_delete], [usr_uid_old], [usr_pass_old], [usr_date], [usr_photo]) VALUES (1, N'admin', N'21232f297a57a5a743894a0e4a801fc3', N'admin', N'admin', N'admin@admin.com', NULL, NULL, NULL, NULL, N'ACTIVE', 0, NULL, NULL, CAST(N'2016-08-24 09:10:45.0000000' AS DateTime2), N'')
GO

--MODULOS

TRUNCATE TABLE [dbo].[sys_modules]
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (1, N'es', N'roles', 0, N'Roles', N'', N'', 1, 0, N'ACTIVE', N'rolesList.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (2, N'es', N'usersRoles', 1, N'Ver/Modificar roles', N'', N'', 2, 0, N'ACTIVE', N'rolesList.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (3, N'es', N'createRoles', 1, N'Crear rol', N'', N'', 2, 0, N'ACTIVE', N'rolesNew.php')
GO

INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (4, N'es', N'users', 0, N'Usuarios', N'', N'', 2, 0, N'ACTIVE', N'userList.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (5, N'es', N'usersList', 4, N'Ver/Modificar usuarios', N'', N'', 2, 0, N'ACTIVE', N'userList.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (6, N'es', N'usersNew', 4, N'Crear usuario', N'', N'', 2, 0, N'ACTIVE', N'userNew.php')
GO


INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (7, N'es', N'subastaRavParametros', 0, N'RAV Par&aacute;metros', N'', N'', 3, 0, N'ACTIVE', N'subastasRavList.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (8, N'es', N'subastasRavList', 7, N'Ver/Modificar RAV Par&aacute;metros', N'', N'', 3, 0, N'ACTIVE', N'subastasRavList.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (9, N'es', N'subastasRavEdit', 7, N'RAV Par&aacute;metros', N'', N'', 3, 0, N'ACTIVE', N'subastasRavEdit.php')
GO

INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (10, N'es', N'subastaRavInforme', 0, N'RAV Informes', N'', N'', 4, 0, N'ACTIVE', N'subastasRavInfList.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (12, N'es', N'subastasRavInfEdit', 10, N'RAV Informe', N'', N'', 4, 0, N'ACTIVE', N'subastasRavInfEdit.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (11, N'es', N'subastasRavInfList', 10, N'Ver/Modificar RAV Informe', N'', N'', 4, 0, N'ACTIVE', N'subastasRavInfList.php')
GO

INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (13, N'es', N'client', 0, N'Proveedores', N'', N'', 5, 0, N'ACTIVE', N'clientList.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (15, N'es', N'clientNew', 13, N'Crear proveedor', N'', N'', 5, 0, N'ACTIVE', N'clientNew.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (14, N'es', N'clientList', 13, N'Ver/Modificar proveedores', N'', N'', 5, 0, N'ACTIVE', N'clientList.php')
GO

INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (16, N'es', N'subastas', 0, N'Subastas', N'', N'', 6, 0, N'ACTIVE', N'subastasList.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (18, N'es', N'subastasNew', 16, N'Crear Subasta', N'', N'', 6, 0, N'ACTIVE', N'subastasNew.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (17, N'es', N'subastasList', 16, N'Ver/Modificar subastas', N'', N'', 6, 0, N'ACTIVE', N'subastasList.php')
GO

INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (19, N'es', N'parametrizaciones', 0, N'Parametrizaciones', N'', N'', 7, 0, N'ACTIVE', N'autorizacionList.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (20, N'es', N'parametrizacionesList', 19, N'Ver/Modificar Parametrizaciones', N'', N'', 7, 0, N'ACTIVE', N'autorizacionList.php')
GO

INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (21, N'es', N'informes', 0, N'Informes Subasta', N'', N'', 7, 0, N'ACTIVE', N'autorizacionList.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (22, N'es', N'informesList', 21, N'Ver/Modificar Informes', N'', N'', 7, 0, N'ACTIVE', N'autorizacionList.php')
GO

INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (23, N'es', N'ReportesP', 0, N'Reportes Par&aacute;metros', N'', N'', 8, 0, N'ACTIVE', N'reporteList.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (24, N'es', N'ReporteList', 23, N'Reporte Par&aacute;metros', N'', N'', 8, 0, N'ACTIVE', N'reporteList.php')
GO

INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (25, N'es', N'ReportesI', 0, N'Reportes Informes', N'', N'', 9, 0, N'ACTIVE', N'reporteList2.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (26, N'es', N'ReporteList2', 25, N'Reporte Informes', N'', N'', 9, 0, N'ACTIVE', N'reporteList2.php')
GO

INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (27, N'es', N'Banners', 0, N'Banners', N'', N'', 10, 0, N'ACTIVE', N'bannerList.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (28, N'es', N'BannerList', 27, N'Ver/Modificar banners', N'', N'', 10, 0, N'ACTIVE', N'bannerList.php')
GO
INSERT [dbo].[sys_modules] ([mod_uid], [mod_language], [mod_alias], [mod_parent], [mod_name], [mod_lab_uid], [mod_lab_category], [mod_position], [mod_delete], [mod_status], [mod_index]) VALUES (29, N'es', N'BannerNew', 27, N'Nuevo banner', N'', N'', 10, 0, N'ACTIVE', N'bannerNew.php')
GO

--MODULOS USUARIOS
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

--MODULOS OPCIONES
TRUNCATE TABLE [dbo].[sys_modules_options]
GO
SET IDENTITY_INSERT [dbo].[sys_modules_options] ON 
GO
--ROLES
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (1, 2, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (2, 2, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (3, 2, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (4, 2, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (5, 3, N'Crear', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (6, 2, N'Aprobar', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (7, 2, N'Rechazar', N'INACTIVE')
GO
--USUARIOS
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (8, 5, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (9, 5, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (10, 5, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (11, 5, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (12, 6, N'Crear', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (13, 5, N'Aprobar', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (14, 5, N'Rechazar', N'INACTIVE')
GO

--RAV PARAMETROS
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (15, 8, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (16, 8, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (17, 8, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (18, 8, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (19, 9, N'Crear', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (20, 8, N'Aprobar', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (21, 8, N'Rechazar', N'INACTIVE')
GO

--RAV INFORMES
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (22, 11, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (23, 11, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (24, 11, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (25, 11, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (26, 12, N'Crear', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (27, 11, N'Aprobar', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (28, 11, N'Rechazar', N'INACTIVE')
GO

--PROVEEDORES
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (29, 14, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (30, 14, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (31, 14, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (32, 14, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (33, 15, N'Crear', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (34, 14, N'Aprobar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (35, 14, N'Rechazar', N'ACTIVE')
GO
--SUBASTAS
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (36, 17, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (37, 17, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (38, 17, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (39, 17, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (40, 18, N'Crear', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (41, 17, N'Aprobar', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (42, 17, N'Rechazar', N'INACTIVE')
GO

--PARAMETRIZACIONES
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (43, 20, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (44, 20, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (45, 20, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (46, 20, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (47, 20, N'Crear', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (48, 20, N'Aprobar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (49, 20, N'Rechazar', N'ACTIVE')
GO
--INFORME SUBASTA
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (50, 22, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (51, 22, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (52, 22, N'Eliminar', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (53, 22, N'Estado', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (54, 22, N'Crear', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (55, 22, N'Aprobar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (56, 22, N'Rechazar', N'ACTIVE')
GO
--REPORTES PARAMETROS
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (57, 24, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (58, 24, N'Editar', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (59, 24, N'Eliminar', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (60, 24, N'Estado', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (61, 24, N'Crear', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (62, 24, N'Aprobar', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (63, 24, N'Rechazar', N'INACTIVE')
GO
--REPORTES INFORMES
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (64, 26, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (65, 26, N'Editar', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (66, 26, N'Eliminar', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (67, 26, N'Estado', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (68, 26, N'Crear', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (69, 26, N'Aprobar', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (70, 26, N'Rechazar', N'INACTIVE')
GO
--BANNERS
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (71, 28, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (72, 28, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (73, 28, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (74, 28, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (75, 29, N'Crear', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (76, 28, N'Aprobar', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (77, 28, N'Rechazar', N'INACTIVE')
GO
SET IDENTITY_INSERT [dbo].[sys_modules_options] OFF
GO
--MODULOS ACCESSOS
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
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (10, 1, 11, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (10, 1, 12, N'ACTIVE')
GO

SET IDENTITY_INSERT [dbo].[sys_modules_access] OFF
GO
-- TIPOLOGIA
SET IDENTITY_INSERT [dbo].[mdl_tipologia] ON 

GO
INSERT [dbo].[mdl_tipologia] ([tip_uid], [tip_descrip]) VALUES (1, N'SUBASTA')
GO
INSERT [dbo].[mdl_tipologia] ([tip_uid], [tip_descrip]) VALUES (2, N'SUBASTA_INFORME')
GO
SET IDENTITY_INSERT [dbo].[mdl_tipologia] OFF
GO


