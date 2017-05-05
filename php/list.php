<?php

header ( "Content-type:text/html;charset=utf-8" );  //统一输出编码为utf-8
header('Access-Control-Allow-Origin:*');


// 判断请求的方式
if($_SERVER['REQUEST_METHOD'] == 'POST') {

	$name = $_POST['b_name'];
} else {
	$name = $_GET['b_name'];
}

//参数准备

//创建连接
$conn = new mysqli('localhost', 'root', '', 'bookstores');

//设置字符集
mysqli_query($conn, 'set names utf8');

// print_r($name);

if ($name == 'all') {

	$sql = 'select * from book';
} else {
	// print_r(11);
	$sql = 'select * from book where b_name = "'.$name.'"';
}



$result = $conn->query($sql);


$arr = array();

if($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) {
		array_push($arr, $row);
	}

	print_r(json_encode($arr));
} else {
	echo '没有结果';
}


$conn->close();

?>