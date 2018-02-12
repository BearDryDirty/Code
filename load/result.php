<?php
require_once('connect.php'); //连接数据库
$page = intval($_GET['page']);  //获取请求的页数
$start = $page*10;
$query=mysql_query("select * from phpcms_content order by contentid desc limit $start,10");
while ($row=mysql_fetch_array($query)) {
    $arr[]= array(
        'title'=>$row['title'],
		'url'=>$row['url'],
		'thumb'=>$row['thumb'],
		'description'=>$row['description']
    );
}
echo json_encode($arr);  //转换为json数据输出

?>