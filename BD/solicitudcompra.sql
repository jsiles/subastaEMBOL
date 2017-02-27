USE [subastaBNB]
GO
/****** Object:  Table [dbo].[mdl_categoria1]    Script Date: 26/2/2017 9:08:40 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[mdl_categoria1](
	[ca1_uid] [int] IDENTITY(1,1) NOT NULL,
	[ca1_description] [varchar](50) NOT NULL,
	[ca1_delete] [int] NOT NULL,
 CONSTRAINT [PK_mdl_categoria1] PRIMARY KEY CLUSTERED 
(
	[ca1_uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[mdl_categoria2]    Script Date: 26/2/2017 9:08:40 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[mdl_categoria2](
	[ca2_uid] [int] IDENTITY(1,1) NOT NULL,
	[ca2_ca1_uid] [int] NOT NULL,
	[ca2_description] [varchar](50) NOT NULL,
	[ca2_delete] [int] NOT NULL,
 CONSTRAINT [PK_mdl_categoria2] PRIMARY KEY CLUSTERED 
(
	[ca2_uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[mdl_categoria3]    Script Date: 26/2/2017 9:08:40 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[mdl_categoria3](
	[ca3_uid] [int] IDENTITY(1,1) NOT NULL,
	[ca3_ca2_uid] [int] NOT NULL,
	[ca3_description] [varchar](50) NOT NULL,
	[ca3_delete] [int] NOT NULL,
 CONSTRAINT [PK_mdl_categoria3] PRIMARY KEY CLUSTERED 
(
	[ca3_uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[mdl_solicitud_compra]    Script Date: 26/2/2017 9:08:40 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[mdl_solicitud_compra](
	[sol_uid] [int] IDENTITY(1,1) NOT NULL,
	[sol_date] [datetime] NOT NULL,
	[sol_usu_uid] [int] NOT NULL,
	[sol_observaciones] [varchar](150) NOT NULL,
	[sol_apr_uid] [int] NOT NULL,
	[sol_apr_date] [datetime] NOT NULL,
	[sol_imp_date] [datetime] NOT NULL,
 CONSTRAINT [PK_mdl_solicitud_compra] PRIMARY KEY CLUSTERED 
(
	[sol_uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[mdl_solicitud_material]    Script Date: 26/2/2017 9:08:40 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[mdl_solicitud_material](
	[som_uid] [int] IDENTITY(1,1) NOT NULL,
	[som_sol_uid] [int] NOT NULL,
	[som_ca3_uid] [int] NOT NULL,
	[som_description] [varchar](50) NOT NULL,
	[som_cantidad] [int] NOT NULL,
	[som_unidad] [int] NOT NULL,
	[som_delete] [int] NOT NULL,
 CONSTRAINT [PK_mdl_solicitud_material] PRIMARY KEY CLUSTERED 
(
	[som_uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[mdl_solicitud_proveedor]    Script Date: 26/2/2017 9:08:40 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[mdl_solicitud_proveedor](
	[sop_uid] [int] IDENTITY(1,1) NOT NULL,
	[sop_sol_uid] [int] NOT NULL,
	[sop_cli_uid] [int] NOT NULL,
	[sop_date] [datetime] NOT NULL,
	[sop_delete] [int] NOT NULL,
 CONSTRAINT [PK_mdl_solicitud_proveedor] PRIMARY KEY CLUSTERED 
(
	[sop_uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
