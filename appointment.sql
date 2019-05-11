CREATE DATABASE APPOINTMENT;
USE APPOINTMENT;

CREATE TABLE SCHOOL
(   SchoolID    char(2)         NOT NULL,
    SchoolName  varchar(3)      NOT NULL,
    PRIMARY KEY (SchoolID)  );

CREATE TABLE PROFESSOR
(	ProfID		char(6)		NOT NULL,
	ProfName	varchar(20)	NOT NULL,
    Office		varchar(20)	NOT NULL,
    ProfMail    varchar(30) NOT NULL,
    Education	tinytext,
    SchoolID    char(2)     NOT NULL,
    PRIMARY KEY (ProfID),
    FOREIGN KEY (SchoolID) REFERENCES SCHOOL(SchoolID)	);

CREATE TABLE ProfField
(   Field   varchar(10)     NOT NULL,
    ProfID  char(6)         NOT NULL,
    PRIMARY KEY (Field, ProfID) );

CREATE TABLE PROFCALENDAR
(	ProfID			char(6)		NOT NULL,
    weekday			char(1)		NOT NULL,
	HourblockNum	int			NOT NULL,
    HourblockState	BOOLEAN 	NOT NULL,
    PRIMARY KEY (ProfID, weekday, HourBlockNum),
	FOREIGN KEY (ProfID) REFERENCES PROFESSOR(ProfID)	);

CREATE TABLE STUDENT
(   StuID       char(9)     NOT NULL,
    StuName     varchar(20) NOT NULL,
    StuMail     varchar(30) NOT NULL,
    SchoolID    char(2)     NOT NULL,
    PRIMARY KEY (StuID),
    FOREIGN KEY (SchoolID) REFERENCES SCHOOL(SchoolID)  );


CREATE TABLE StuInterest
(   Field   varchar(10)     NOT NULL,
    StuID   char(9)         NOT NULL,
    PRIMARY KEY (Field, StuID) );

CREATE TABLE STUCALENDAR
(	StuID			char(9)		NOT NULL,
    weekday			char(1)		NOT NULL,
	HourblockNum	int			NOT NULL,
    HourBlockState  BOOLEAN 	NOT NULL,
    PRIMARY KEY (StuID, weekday, HourBlockNum),
	FOREIGN KEY (StuID) REFERENCES STUDENT(StuID)	);

    
--    INSERSION
INSERT INTO SCHOOL VALUES("01", "SSE");
INSERT INTO SCHOOL VALUES("02", "SME");
INSERT INTO SCHOOL VALUES("03", "HSS");


INSERT INTO PROFESSOR VALUES("000001", "徐杨生", "Administry 808", "ysxu@cuhk.edu.cn",
							"He is very good.", "01");
INSERT INTO PROFESSOR VALUES("000002", "蔡玮", "RA413", "caiwei@cuhk.edu.cn",
							"蔡玮教授2008年毕业于厦门大学软件工程系，2011年获韩国首尔大学电气工程与计算机科学硕士，2016年获加拿大不列颠哥伦比亚大学电气与计算机工程博士，并于2016年至2018年期间在该校担任博士后研究员。求学期间曾赴日本国立情报学研究所、香港理工大学、台湾中央研究院等科研院所从事访问研究工作。蔡玮教授于2018年8月加入香港中文大学(深圳)，担任理工学院助理教授、博士生导师，软件与区块链系统实验室主任。他的研究兴趣主要包括软件系统、云与边缘计算、区块链系统以及游戏系统等，目前已在国际主流学术期刊和会议发表40余篇论文，曾荣获2015年度中国国家优秀自费留学生奖学金，CloudCom2014、SmartComp2014以及CloudComp2013最佳论文奖等。", "01");



INSERT INTO STUDENT VALUES("116010312", "赵立行", "116010312@link.cuhk.edu.cn", "01");
INSERT INTO STUDENT VALUES("116010131", "林乐昊", "116010131@link.cuhk.edu.cn", "01");
INSERT INTO STUDENT VALUES("116010165", "吕雨南", "116010165@link.cuhk.edu.cn", "01");


LOAD DATA LOCAL INFILE "C:\Users\asus\OneDrive - CUHK-ShenZhen\Year3\term2\CSC3170\project\generated_data\profcalendar.csv"
INTO TABLE profcalendar 
FIELDS TERMINATED BY '\t'
LINES TERMINATED BY '\n';

LOAD DATA LOCAL INFILE "C:\Users\asus\OneDrive - CUHK-ShenZhen\Year3\term2\CSC3170\project\generated_data\stucalendar.csv"
INTO TABLE stucalendar 
FIELDS TERMINATED BY '\t'
LINES TERMINATED BY '\n';


-- --    QUERY
-- SELECT *
-- FROM PROFESSOR;


-- SELECT ProfFName, ProfLName, date, HourBlockNum, HourBlockState
-- FROM PROFESSOR, PROFCALENDAR
-- WHERE HourBlockState = "free" AND date BETWEEN now() - interval 7 day and now();




