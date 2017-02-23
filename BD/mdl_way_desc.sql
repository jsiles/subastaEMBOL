USE [subastaBNB]
GO

/****** Object:  Table [dbo].[mdl_way_desc]    Script Date: 2/23/2017 1:20:21 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[mdl_way_desc](
	[wde_uid] [int] IDENTITY(1,1) NOT NULL,
	[wde_cli_uid] [int] NOT NULL,
	[wde_wtp_uid] [int] NOT NULL,
	[wde_description] [varchar](255) NOT NULL,
	[wde_delete] [int] NOT NULL,
 CONSTRAINT [PK_mdl_way_desc] PRIMARY KEY CLUSTERED 
(
	[wde_uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO

