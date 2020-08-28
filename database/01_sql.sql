#系统表，记录系统中所有的数据表，用于权限操作
create table systemtable(
	id int auto_increment PRIMARY key,
	cnname varchar(50) not null, #表名
	enname varchar(50) not null, #表英文名
	editstate int default 0 #0为不可编辑，1可编辑
)


#模板
CREATE TABLE Templates(
	ID int primary key  auto_increment ,#编号	
	tname varchar(100) default '',#模板名称
	pic varchar(200) default '',#图片
	URL varchar(200) default '',#网址
	State int default 1,#状态 1有效 0无效	
	Orderby int default 0,#排序
	ADate TIMESTAMP default CURRENT_TIMESTAMP  #录入日期
)

# 权限组
create table grouplist(
	id int auto_increment primary key,
	gname varchar(20) not null,  #权限组名称
	state int default 0,  #0无效 1有效
	count int default 0,  #权限组会员数量
	adate TIMESTAMP default CURRENT_TIMESTAMP  #录入日期
)

# 权限明细
create table groupdetials(
	id int auto_increment PRIMARY key,
	groupid int references grouplist(id),  #权限组
	tableid int references systemtable(id),#表ID
	ginsert int default 0,  #新增 0不可以新增 1可新增
	gupdate int default 0,  #新增 0不可以新增 1可新增
	gselect int default 0,  #新增 0不可以新增 1可新增
	gdelete int default 0  #新增 0不可以新增 1可新增
)

# 管理员
create table admin(
	id int auto_increment PRIMARY key,
	groupid int references grouplist(id),  #权限组
	aname varchar(20) default '', #登录名
	apwd varchar(32) default '',#密码
	lastdate datetime default now(),
	logincount int default 0,
	state int default 0, #0无效账号
	adate TIMESTAMP default CURRENT_TIMESTAMP  #录入日期
)

#操作日志
create table adminlog(
	id int auto_increment PRIMARY key,
	adminid int references admin(id),  #管理员ID
	controltype int default 1,  #操作类型 1新增 2修改 3删除 4登录
	tableid int references systemtable(id),#表ID
	dataid int default 0,  #数据ID
	note varchar(500) default '',  #操作说明
	ip varchar(50) default '', #操作IP
	adate TIMESTAMP default CURRENT_TIMESTAMP  #录入日期
)

# 网站基本设置 drop table websetting
create table websetting(
	id int auto_increment PRIMARY key,
	title varchar(50) default '',  #全称
	shouttitle varchar(50) default '', #简称
	keywords varchar(200) default '', #关键词
	description varchar(200) default '',#描述
	copyright varchar(500) default '',#版权
	ICP varchar(50) default '', #备案号
	ICPUrl varchar(50) default '',#备案链接地址
	Logo varchar(200) default '',  #网站logo
	WebUrl varchar(100) default '',#网址
	templateid INT DEFAULT 0 #模板ID
)

#轮播图
create table banner(
	id int auto_increment PRIMARY key,
	title varchar(50) not null,
	subtitle varchar(200) default '',
	pic varchar(500) not null,
	url varchar(100) not null,
	state int default 0,
	hits int default 0, #点击次数
	orderby  int default 0,  #排序
	adate TIMESTAMP default CURRENT_TIMESTAMP  #录入日期
)

# 产品类别/新闻类别/案例类别
create table DataType(
	id int auto_increment PRIMARY key,
	topid int default 0,  #分类ID
	typename varchar(20) default '',
	pic varchar(200) default '',
	keywords varchar(200) default '', #关键词
	description varchar(200) default '',#描述
	state int default 0, #0 无效 1有效
	editstate int default 0,#编辑状态 0不允许编辑  1可以
	hits int default 0, #点击次数
	orderby int default 0,  #排序
	adate TIMESTAMP default CURRENT_TIMESTAMP  #录入日期
)

# 成功案例/产品介绍/新闻资讯/关于我们/服务范围/解决方案
create table DataInfos(
	id int auto_increment PRIMARY key,
	datatypeid int references DataType(id),  #类别ID	
	title varchar(20) default '',
	price DECIMAL(10,2) default 0, #价格
	pic varchar(200) default '',
	keywords varchar(200) default '', #关键词
	description varchar(200) default '',#描述
	content mediumtext, #内容
	mcontent mediumtext, #手机内容
	state int default 0, #0 无效 1有效	
	hits int default 0, #点击次数
	orderby int default 0,  #排序
	adate TIMESTAMP default CURRENT_TIMESTAMP  #录入日期
)

# 联系我们
create table ContactUs(
	ID int primary key auto_increment,#编号ID
	CompanyName varchar(100) default '',#公司名
	Address varchar(100) default '',#地址
	Tel varchar(100) default '',#座机
	Phone varchar(100) default '',#手机
	Contact varchar(100) default '',#联系人
	Email varchar(100) default '',#邮箱	
	Tel400 varchar(100) default '',#400电话
	Zip varchar(6) default '',#邮编
	Map varchar(100) default '',#百度地图
	State int default 0,#状态
	Hits int default 0,#点击量
	OrderBy int default 0,#排序
	ADate TIMESTAMP default CURRENT_TIMESTAMP  #录入日期
)

# 在线客服  drop table services
create table services(
	ID int primary key  auto_increment,#编号ID
	SName varchar(50) unique  default '',#客服昵称称
	Pic varchar(200) default '',#图片
	Number varchar(50) default '',#客服账号
	State int default 1,#状态
	ADate TIMESTAMP default CURRENT_TIMESTAMP  #录入日期
)

# 在线留言
create table Messages(
	ID int primary key  auto_increment ,#编号		
	Title varchar(200) default '',#留言标题
	MesType varchar(20) default '',#留言类型
	CallName varchar(20) default '',#姓名
	CallSex varchar(10) default '',#性别
	Tel varchar(100) default '',#电话/手机号
	Email varchar(100) default '', #邮箱
	Note varchar(2000) default '',#留言内容	
	ADate TIMESTAMP default CURRENT_TIMESTAMP  #录入日期
)

# 友情链接
create table Links(
	ID int primary key  auto_increment ,#编号	
	LName varchar(100) default '',#链接名称
	Pic varchar(200) default '',#图片
	URL varchar(200) default '',#网址
	State int default 1,#状态 1有效 0无效	
	Orderby int default 0,#排序
	Hits int default 0,#点击量
	ADate TIMESTAMP default CURRENT_TIMESTAMP  #录入日期
)

# 栏目导航
create table Navigation(
	ID int primary key  auto_increment ,#编号
	TopID int default 0,#上级ID	
	SDTID int default 0,#数据类别ID
	NName varchar(100) default '',#导航名称
	ENName varchar(50) default '',#英文名
	Position int default 4,#显示位置 0顶部 1默认导航 2底部  3默认和顶部 4全部显示
	ViewPM int default 2,#显示PC或手机端，0PC 1手机端 2PC和手机
	Target varchar(50) default '',#打开方式
	LinkUrl1 varchar(200) default '',#链接地址
	LinkUrl2 varchar(200) default '',#外部链接地址
	Orderby int default 0,#排序
	Hits int default 0,#点击量
	ModelType int default 0,#模块类型 0为系统模块导航 1为用户自定义导航
	State int default 1,#状态 1有效 0无效
	ADate TIMESTAMP default CURRENT_TIMESTAMP  #录入日期
)

