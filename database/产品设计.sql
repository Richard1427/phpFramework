--创建_平台数据分类
create table System_DataType(
	SDT_ID int primary key  identity(10000,1) ,--编号
	SDT_WCID int default 0,--企业ID
	SDT_TopID int default 0,--上级ID
	SDT_DataType int default 0,--数据类别 0单页 1图文 2产品
	SDT_CNName nvarchar(100) default '',--类别中文名
	SDT_ENName nvarchar(100) default '',--类别英文名
	SDT_Url nvarchar(100) default '',--类别导航地址
	SDT_Info nvarchar(500) default '',--类别备注
	SDT_KeyWords nvarchar(500) default '',--类别关键词
	SDT_Descriptions nvarchar(500) default '',--类别描述
	SDT_Tags nvarchar(500) default '',--分类标签
	SDT_ICO nvarchar(200) default '',--小图标
	SDT_TopPic nvarchar(200) default '',--顶部广告图
	SDT_BottomPic nvarchar(200) default '',--底部广告图
	SDT_IndexPic nvarchar(200) default '',--首页广告图
	SDT_ISSystem int default 0,--系统分类1 系统分类，0官网分类
	SDT_Opening int default 1,--开启分站，0不开启 1开启，0不开启则查全国数据
	SDT_Hits int default 0,--访问量
	SDT_State int default 0,--状态
	SDT_OrderBy int default 0,--排序
	SDT_ADate datetime default getdate(),--录入日期
	SDT_Edate datetime default getdate(),--编辑日期
	SDT_DADVCount int default 0,--信息广告数量
	SDT_PADVCount int default 0,--图片广告数量
	SDT_WMAID int references Web_Members(WM_ID),--录入员
	SDT_WMEID int references Web_Members(WM_ID),--编辑人
)


--创建_平台数据分类属性
create table System_DataTypeAttribute(
	SDA_ID int primary key  identity(10000,1) ,--编号
	SDA_WCID int default 0 references Web_Company(WC_ID),--企业ID
	SDA_SDTID int references System_DataType(SDT_ID),--类别ID
	SDA_TopID int default 0,--上级ID
	SDA_Title nvarchar(100) default '',--标题
	SDA_Value nvarchar(100) default '',--默认值
	SDA_ValueList nvarchar(4000) default '',--值列表
	SDA_Pic nvarchar(200) default '',--图片
	SDA_State int default 0,--状态
	SDA_OrderBy int default 0,--排序
	SDA_ISAttr int default 0,--当前是属性或属性值 0属性 1属性值
	SDA_ADate datetime default getdate(),--录入日期
	SDA_EDate datetime default getdate(),--编辑日期
	SDA_WMAID int references Web_Members(WM_ID),--录入员
	SDA_WMEID int references Web_Members(WM_ID),--编辑员
)


create table Web_DataInfo(
	WDI_ID int primary key  identity(1,1) ,--编号ID
	WDI_RandomID nvarchar(20) unique  default '',--随机ID
	WDI_SDTID1 int references System_Datatype(SDT_ID),--一级数据类别
	WDI_SDTID2 int default 0,--二级数据类别
	WDI_SDTID3 int default 0,--三级数据类别
	WDI_WCID int default 0,--企业ID
	WDI_Title nvarchar(100) default '',--标题
	WDI_TitleColor nvarchar(20) default '',--标题颜色
	WDI_SubTitle nvarchar(500) default '',--副标题
	WDI_KeyWords nvarchar(250) default '',--关键词
	WDI_Tags nvarchar(500) default '',--数据标签
	WDI_Description nvarchar(500) default '',--描述
	WDI_Notes nvarchar(4000) default '',--概要
	WDI_Content nvarchar(max) default '',--内容
	WDI_SmallPic nvarchar(200) default '',--小图
	WDI_BigPic nvarchar(200) default '',--大图
	WDI_LinkUrl nvarchar(500) default '',--链接外部网址
	WDI_VideoUrl nvarchar(500) default '',--视频地址
	WDI_ProPrice decimal(18,2) default 0,--商品市场价
	WDI_ProSalePrice decimal(18,2) default 0,--平台销售价
	WDI_ProDiscountPrice decimal(18,2) default 0,--平台优惠价,以优惠价为销售价,0为限积分兑换
	WDI_ProPoint int default 0,--兑换积分，0为不参与积分兑换
	WDI_ProDiscountPoint decimal(5,2) default 0,--积分兑换折扣，1为0折
	WDI_ISNav int default 0,--是否添加到导航
	WDI_ISTop int default 0,--置顶显示
	WDI_ISFocus int default 0,--焦点显示
	WDI_ISPopular int default 0,--热门显示
	WDI_ISRecommend int default 0,--推荐显示
	WDI_ISIndex int default 0,--首页显示
	WDI_ISNew int default 0,--最新显示
	WDI_ISVideo int default 0,--是否包含视频
	WDI_MesCount int default 0,--留言数量
	WDI_Fabulous int default 0,--点赞
	WDI_GPID int default 0,--省份ID
	WDI_GCID int default 0,--城市ID
	WDI_GDID int default 0,--县区ID
	WDI_SEID int default 0,--数据来源
	WDI_SEURL nvarchar(500) default '',--原文路径
	WDI_Hits int default 0,--点击量
	WDI_State int default 0,--状态0未审核 1锁定 2已审核
	WDI_ADate datetime default getdate(),--录入日期
	WDI_EDate datetime default getdate(),--修改日期
	WDI_ISADV int default 0,--开启广告
	WDI_StartDate datetime default getdate(),--广告开始时间
	WDI_StartEnd datetime default 0,--广告结束时间
	WDI_ADVState int default 0,--广告审核0未审核 1锁定 2已审核
	WDI_WMAID int references Web_Members(WM_ID),--录入员
	WDI_WMEID int references Web_Members(WM_ID),--修改人
)


create table Web_DataPic(
	WDP_ID int primary key  identity(1,1) ,--编号ID
	WDP_WDIID int references Web_DataInfo(WDI_ID),--数据ID
	WDP_SmallPic nvarchar(200) default '',--信息图片列表小图
	WDP_BigPic nvarchar(200) default '',--信息图片列表大图
	WDP_AltNote nvarchar(200) default '',--图片备注说明
	WDP_OrderBy int default 0,--排序
)


create table Web_DataAttr(
	WDA_ID int primary key  identity(1,1) ,--编号ID
	WDA_WCID int references Web_Company(WC_ID),--公司ID
	WDA_WDIID int references Web_DataInfo(WDI_ID),--数据ID
	WDA_SDTID int references System_DataType(SDT_ID),--数据分类ID
	WDA_SDAID int references System_DataTypeAttribute(SDA_ID),--分类属性ID
	WDA_AttrName nvarchar(4000) default '',--属性名称
	WDA_AttrValue nvarchar(4000) default '',--属性值
	WDA_OrderBy int default 0,--排序
)


create table Web_DataComment(
	WDC_ID int primary key  identity(1,1) ,--编号ID
	WDC_TopID int default 0,--回复ID
	WDC_WDIID int references Web_DataInfo(WDI_ID),--数据ID
	WDC_Title nvarchar(100) default '',--回复标题
	WDC_Content nvarchar(max) default '',--内容
	WDC_Reply nvarchar(max) default '',--回复内容
	WDC_ISClose int default 0,--是否结贴 0否  1是
	WDC_ISOk int default 0,--是否采纳 0否  1是
	WDC_Fabulous int default 0,--点赞人数
	WDC_State int default 0,--状态
	WDC_ViewState int default 0,--查看状态
	WDC_ADate datetime default getdate(),--录入日期
	WDC_EDate datetime default getdate(),--修改日期
	WDC_WMAID int references Web_Members(WM_ID),--录入员
	WDC_WMEID int references Web_Members(WM_ID),--操作员
)