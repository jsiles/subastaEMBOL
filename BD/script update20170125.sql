USE [subasta]
GO
IF OBJECT_ID('dbo.sys_modules_options', 'U') IS NOT NULL 
  DROP TABLE dbo.sys_modules_options; 
GO
IF OBJECT_ID('dbo.mdl_xitem', 'U') IS NOT NULL 
  DROP TABLE dbo.mdl_xitem; 
GO
IF OBJECT_ID('dbo.sys_modules_access', 'U') IS NOT NULL 
  DROP TABLE dbo.sys_modules_access; 
GO
/****** Object:  Table [dbo].[sys_modules_options]    Script Date: 24/1/2017 3:30:52 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[sys_modules_options](
	[mop_uid] [int] IDENTITY(49,1) NOT NULL,
	[mop_mod_uid] [int] NOT NULL DEFAULT ((0)),
	[mop_lab_category] [varchar](255) NOT NULL,
	[mop_status] [varchar](8) NOT NULL,
 CONSTRAINT [PK_sys_modules_options_mop_uid] PRIMARY KEY CLUSTERED 
(
	[mop_uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'subasta.sys_modules_options' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'sys_modules_options'
GO
TRUNCATE TABLE  [dbo].[sys_modules_options] 
GO
SET IDENTITY_INSERT [dbo].[sys_modules_options] ON 
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (1, 26, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (2, 26, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (3, 26, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (4, 26, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (5, 44, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (6, 44, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (7, 44, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (8, 44, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (9, 57, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (10, 57, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (11, 57, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (12, 57, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (13, 60, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (14, 60, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (15, 60, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (16, 60, N'Estado', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (17, 67, N'Ver', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (18, 67, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (19, 67, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (20, 67, N'Aprobar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (21, 67, N'Rechazar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (22, 67, N'Adjudicar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (23, 72, N'Ver', N'INACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (24, 72, N'Editar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (25, 72, N'Eliminar', N'ACTIVE')
GO
INSERT [dbo].[sys_modules_options] ([mop_uid], [mop_mod_uid], [mop_lab_category], [mop_status]) VALUES (26, 72, N'Estado', N'ACTIVE')
GO
SET IDENTITY_INSERT [dbo].[sys_modules_options] OFF
GO
UPDATE [dbo].[sys_modules]
SET
mod_name='RAV'
WHERE mod_uid=66;
GO

UPDATE [dbo].[sys_modules]
SET
mod_name='Modificaci&oacute;n de privilegios y roles',
mod_delete=0,
mod_status='ACTIVE'
WHERE mod_uid=44;
GO

UPDATE [dbo].[sys_modules]
SET
mod_status='INACTIVE',
mod_delete = 1
WHERE mod_uid=63;
GO

USE [subasta]
GO
/****** Object:  Table [dbo].[mdl_xitem]    Script Date: 25/1/2017 5:20:02 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[mdl_xitem](
	[xit_uid] [int] NOT NULL,
	[xit_sub_uid] [int] NOT NULL,
	[xit_product] [varchar](255) NOT NULL,
	[xit_description] [varchar](255) NOT NULL,
	[xit_image] [varchar](255) NOT NULL,
	[xit_price] [numeric](32, 2) NOT NULL,
	[xit_unity] [int] NOT NULL,
	[xit_delete] [int] NOT NULL CONSTRAINT [DF__mdl_xitem__xit_d__6D0D32F4]  DEFAULT ((0)),
 CONSTRAINT [PK_mdl_xitem_xit_uid] PRIMARY KEY CLUSTERED 
(
	[xit_uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'subasta.mdl_xitem' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'mdl_xitem'
GO
USE [subasta]
GO
/****** Object:  Table [dbo].[sys_modules_access]    Script Date: 25/1/2017 7:00:30 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[sys_modules_access](
	[moa_uid] [int] IDENTITY(1,1) NOT NULL,
	[moa_rol_uid] [int] NOT NULL,
	[moa_mop_uid] [int] NOT NULL,
	[moa_status] [varchar](8) NOT NULL,
 CONSTRAINT [PK_sys_modules_access] PRIMARY KEY CLUSTERED 
(
	[moa_uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO

TRUNCATE TABLE [dbo].[sys_modules_access]
GO
SET IDENTITY_INSERT [dbo].[sys_modules_access] ON 
GO
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
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (11, 1, 11, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (12, 1, 12, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (13, 1, 13, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (14, 1, 14, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (15, 1, 15, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (16, 1, 16, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (17, 1, 17, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (18, 1, 18, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (19, 1, 19, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (20, 1, 20, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (21, 1, 21, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (22, 1, 22, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (23, 1, 24, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (24, 1, 25, N'ACTIVE')
GO
INSERT [dbo].[sys_modules_access] ([moa_uid], [moa_rol_uid], [moa_mop_uid], [moa_status]) VALUES (25, 1, 26, N'ACTIVE')
GO

SET IDENTITY_INSERT [dbo].[sys_modules_access] OFF
GO
