USE [subastaBNB]
GO

/****** Object:  Table [dbo].[mdl_client]    Script Date: 2/23/2017 1:19:06 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING OFF
GO

CREATE TABLE [dbo].[mdl_client](
	[cli_uid] [int] IDENTITY(23,1) NOT NULL,
	[cli_nit_ci] [int] NOT NULL,
	[cli_interno] [varchar](255) NOT NULL,
	[cli_lec_uid] [int] NOT NULL,
	[cli_cov_uid] [int] NOT NULL,
	[cli_socialreason] [varchar](255) NOT NULL,
	[cli_legaldirection] [varchar](255) NULL,
	[cli_phone] [varchar](255) NULL,
	[cli_mainemail] [varchar](255) NOT NULL,
	[cli_commercialemail] [varchar](255) NULL,
	[cli_legal_ci] [int] NOT NULL,
	[cli_legalname] [varchar](255) NOT NULL,
	[cli_legallastname] [varchar](255) NOT NULL,
	[cli_legal_ci2] [int] NULL,
	[cli_legalname2] [varchar](255) NULL,
	[cli_legallastname2] [varchar](255) NULL,
	[cli_legal_ci3] [int] NULL,
	[cli_legalname3] [varchar](255) NULL,
	[cli_legallastname3] [varchar](255) NULL,
	[cli_commercialname] [varchar](255) NULL,
	[cli_commerciallastname] [varchar](255) NULL,
	[cli_user] [varchar](50) NOT NULL,
	[cli_password] [varchar](50) NOT NULL,
	[cli_pass_change] [bit] NULL,
	[cli_item_uid] [int] NOT NULL,
	[cli_ite_uid] [int] NOT NULL,
	[cli_logo] [varchar](255) NULL,
	[cli_pts_uid] [int] NOT NULL,
	[cli_status] [int] NOT NULL,
	[cli_status_main] [int] NOT NULL,
	[cli_delete] [int] NOT NULL,
	[cli_date] [datetime2](0) NOT NULL,
 CONSTRAINT [PK_mdl_client_cli_uid] PRIMARY KEY CLUSTERED 
(
	[cli_uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO

