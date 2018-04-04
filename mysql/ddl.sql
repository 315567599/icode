TEE 1.LOG
SELECT NOW();
DROP TABLE IF EXISTS example_db.example;
CREATE TABLE example_db.example(                                                                #常规字段为 int,bigint,varchar,text,tinyint,timestamp
    `iAutoID` int(10) UNSIGNED NOT NULL COMMENT 'comment' AUTO_INCREMENT,
    `iIntID` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'comment',                              #财务相关字段，建议使用bigint
    `sVar0` varchar(5) NOT NULL DEFAULT '' COMMENT 'comment',                                       #varchar字段，建议使用长度5,30,50,100,255,500,1000,5000
    `sVar1` varchar(30) NOT NULL DEFAULT '' COMMENT 'comment',
    `sVar2` varchar(50) NOT NULL DEFAULT '' COMMENT 'comment',
    `sVar3` varchar(100) NOT NULL DEFAULT '' COMMENT 'comment',
    `sVar4` varchar(255) NOT NULL DEFAULT '' COMMENT 'comment',
    `sVar5` varchar(500) NOT NULL DEFAULT '' COMMENT 'comment',
    `sVar6` varchar(1000) NOT NULL DEFAULT '' COMMENT 'comment',
    `sVar7` varchar(5000) NOT NULL DEFAULT '' COMMENT 'comment',                                    #使用该长度时，建议分表
    `sDesc` text NOT NULL COMMENT 'comment',                                                        #存储json格式字段
    `iStatus` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'comment',                             #系统字段，业务请勿使用
    `iCreateTime` int(10) UNSIGNED  NOT NULL DEFAULT 0 COMMENT '创建时间',                                             #系统字段，业务请勿使用
    `iUpdateTime` int(10) UNSIGNED  NOT NULL DEFAULT 0 COMMENT '更新时间',                                              #系统字段，业务请勿使用
    PRIMARY KEY `idx_iAutoID` (`iAutoID`),                                                          #主键，请合理选择
    KEY `idx_sVar1` (`sVar1`)                                                                       #请加必要的业务相关索引，命名规则为idx_field1_field2
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='comment';                 
SELECT NOW();
NOTEE


INSERT INTO antiques (buyerid, sellerid, item) VALUES (01, 21, 'Ottoman');
INSERT INTO table1(field1, field2) SELECT field1, field2 FROM table2
UPDATE ORDER SET discount=discount * 1.05
UPDATE owner SET ownerfirstname = 'John' WHERE ownerid = (SELECT buyerid FROM antiques WHERE item = 'Bookcase');
desc table;
RENAME TABLE `old_name` TO `new_name`
select distinct iBusinessID, sResponse from t_fin_api_log;
select * from t_hfd_clearing_sheet_contract where iClearingSheetID in (select iAutoID from t_hfd_clearing_sheet);

SELECT word FROM word_table WHERE id = 1
 UNION
 SELECT word FROM word_table WHERE id = 2
 
 (SELECT ID_ENTRY FROM TABLE WHERE ID_AGE = 1)
 UNION DISTINCT 
 (SELECT ID_ENTRY FROM TABLE WHERE ID_AGE=2)

 SELECT City FROM Offices 
 WHERE Target > (SELECT SUM(Quota) FROM SalesReps 
     WHERE RepOffice = OfficeNbr)

INSERT into Singer
(F_Name, L_Name, Birth_place, Language) 
values 
("", "Homer", NULL, "Greek"),
("", "Sting", NULL, "English"),
("Jonny", "Five", NULL, "Binary");


 SELECT COUNT(*) FROM `antiques`
 SELECT COUNT(DISTINCT *) FROM `antiques`
 SELECT MAX(LENGTH(CONCAT(`first_name`, ' ', `last_name`))) FROM `subscribers`

----------------------------
item_id - user_id - title - supplier_id - - supplier_name
--------------------------------

explain SELECT aid,
activity_name, 
(activity_end_time-activity_start_time) as left_ts
 FROM sh_beenest.sh_activity_portal_goods 
 #where left_ts > 0
 where (activity_end_time-activity_start_time) > 0
 order by left_ts desc;
