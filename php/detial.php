<?php

	header ( "Content-type:text/html;charset=utf-8" );  //统一输出编码为utf-8
	header('Access-Control-Allow-Origin:*');


	if(count($_GET)>0){

		$b_name = $_GET["name"];
		

		


		//与数据库建立连接

		$sqlServer = "127.0.0.1" ;
		$sqlLogin = "root";
		$sqlPwd = "";
		$sqldb = "bookstores";

		$con = new mysqli($sqlServer,$sqlLogin,$sqlPwd,$sqldb);

		//设置字符集
		mysqli_query($con,"set names utf8");


		//检测连接

			if($con->connect_error){

				print_r("连接失败");
			}else{


				$sql = "select * from book where b_name= '".$b_name."'";

				$result = $con->query($sql);

				// print_r($result->num_rows);

				$arr = array();

				if($result->num_rows > 0) {

					while($row = $result->fetch_assoc()) {
						array_push($arr, $row);
					}

					print_r(json_encode($arr));
						// $conn->close();
				} else {
					echo '没有结果';
				}
			}

				

		}else{

			$arr = array();
			$arr["status"] = 1111;
			$arr["str"] = "没有参数";

			print_r(json_encode($arr));
		}



	



?>