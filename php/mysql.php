<?php
/**
 * mysql "ON DUPLICATE KEY UPDATE" 语法
 * 如果在INSERT语句末尾指定了ON DUPLICATE KEY UPDATE，并且插入行后会导致在一个UNIQUE索引或PRIMARY KEY中出现重复值，则在出现重复值的行执行UPDATE；如果不会导致唯一值列重复的问题，则插入新行。 
 * 例如，如果列 a 为 主键 或 拥有UNIQUE索引，并且包含值1，则以下两个语句具有相同的效果：
 * 复制代码 代码如下:
 *
 * INSERT INTO TABLE (a,c) VALUES (1,3) ON DUPLICATE KEY UPDATE c=c+1;
 * UPDATE TABLE SET c=c+1 WHERE a=1;
 *
 *
 */
$db->query(
    "INSERT INTO " . $db->tableName( 'accountaudit_login' ) .
        "( aa_user, aa_method, aa_lastlogin ) VALUES (" .
        $db->addQuotes( $user->getId() ) . ", " .
        $db->addQuotes( $requestMethod ) . ", " .
        $db->addQuotes( $db->timestamp( $time ) ) .
        ") ON DUPLICATE KEY UPDATE aa_lastlogin = " .
        $db->addQuotes( $db->timestamp( $time ) ),
    $method
);
