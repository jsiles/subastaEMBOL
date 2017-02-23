USE [subastaBNB]
GO

/****** Object:  Table [dbo].[mdl_item]    Script Date: 2/23/2017 1:19:29 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[mdl_item](
	[ite_uid] [int] IDENTITY(1,1) NOT NULL,
	[ite_name] [varchar](255) NOT NULL,
	[ite_item] [int] NOT NULL,
	[ite_delete] [int] NOT NULL,
 CONSTRAINT [PK_mdl_item] PRIMARY KEY CLUSTERED 
(
	[ite_uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO

