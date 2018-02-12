<?php
    $mysql_server_name="localhost"; //数据库服务器名称
    $mysql_username="root"; // 连接数据库用户名
    $mysql_password="root"; // 连接数据库密码
    $mysql_database="load"; // 数据库的名字
    
    // 连接到数据库
    $conn=mysql_connect($mysql_server_name, $mysql_username,
                        $mysql_password);
    mysql_select_db('load',$conn);

?>