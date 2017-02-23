USE [subastaBNB]
GO

/****** Object:  Table [dbo].[mdl_waytopay]    Script Date: 2/23/2017 1:20:38 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[mdl_waytopay](
	[wtp_uid] [int] IDENTITY(1,1) NOT NULL,
	[wtp_pts_uid] [int] NOT NULL,
	[wtp_name] [varchar](255) NOT NULL,
	[wtp_delete] [int] NOT NULL,
 CONSTRAINT [PK_mdl_waytopay] PRIMARY KEY CLUSTERED 
(
	[wtp_uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO

