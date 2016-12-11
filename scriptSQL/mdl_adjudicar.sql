USE [subasta]
GO

/****** Object:  Table [dbo].[mdl_adjudicar]    Script Date: 26/10/2016 09:51:45 a.m. ******/
DROP TABLE [dbo].[mdl_adjudicar]
GO

/****** Object:  Table [dbo].[mdl_adjudicar]    Script Date: 26/10/2016 09:51:45 a.m. ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[mdl_adjudicar](
	[adj_uid] [smallint] IDENTITY(1,1) NOT NULL,
	[adj_rol_uid] [int] NOT NULL,
	[adj_monto] [decimal](18, 0) NOT NULL,
	[adj_validacion] [char](4) NOT NULL,
	[adj_estado] [smallint] NOT NULL,
 CONSTRAINT [PK_mdl_adjudicar] PRIMARY KEY CLUSTERED 
(
	[adj_uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO

