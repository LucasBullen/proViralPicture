<?php
	//$username = "lucasbul_user";
	//$password = "1227Sansonnet";
	//$hostname = "localhost";
	$username = "user";
	$password = "pro_viral";
	$hostname = "lucasbullencom.ipagemysql.com";
	//$homepage = file_get_contents('/twelvCert.pem');
	//echo "test".$homepage;
	$db_handle = mysql_connect($hostname,$username,$password);
	$db_found = mysql_select_db('pro_viral', $db_handle);
	$post_string = http_build_query($_POST);
	$post_array = explode("&", $post_string);
	$post_array_final = array(); 
	foreach ($post_array as $post_inner) {
		array_push($post_array_final,explode("=", $post_inner));
	}
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$fcn = $post_array_final[0][1];
		switch ($fcn) {
			case 'creator_by_id':
				creator_by_id($post_array_final[1][1]);
				break;
			case 'image_by_id':
				image_by_id($post_array_final[1][1]);
				break;
			case 'user_by_id':
				user_by_id($post_array_final[1][1]);
				break;
			case 'user_by_fb_id':
				user_by_id($post_array_final[1][1]);
				break;
			case 'creator_by_name':
				creator_by_name($post_array_final[1][1]);
				break;
			case 'image_by_name':
				image_by_name($post_array_final[1][1]);
				break;
			case 'user_by_name':
				user_by_name($post_array_final[1][1]);
				break;
			case 'creator_by_image':
				creator_by_image($post_array_final[1][1]);
				break;
			case 'image_by_creator':
				image_by_creator($post_array_final[1][1]);
				break;
			case 'image_by_user':
				image_by_user($post_array_final[1][1]);
				break;
			case 'creator_all':
				creator_all($post_array_final[1][1]);
				break;
			case 'image_all':
				image_all($post_array_final[1][1]);
				break;
			case 'user_all':
				user_all($post_array_final[1][1]);
				break;
			default:
				break;
		}
	}

	function creator_by_id($_id){
		$sql="SELECT * FROM creator WHERE id='$_id'";
		$re =mysql_query($sql);
		if($re){
			$result=array();
			while($row = mysql_fetch_assoc($re)){
				array_push($result,'|'.implode(",",$row));
			}
			echo implode("",$result);
		}else{
			echo implode("",array_fill($re));
		}
	}

	function image_by_id($_id){
		$sql="SELECT * FROM image WHERE id='$_id'";
		$re =mysql_query($sql);
		if($re){
			$result=array();
			while($row = mysql_fetch_assoc($re)){
				array_push($result,'|'.implode(",",$row));
			}
			echo implode("",$result);
		}else{
			echo implode("",array_fill($re));
		}
	}

	function user_by_id($_id){
		$sql="SELECT * FROM user WHERE id='$_id'";
		$re =mysql_query($sql);
		if($re){
			$result=array();
			while($row = mysql_fetch_assoc($re)){
				array_push($result,'|'.implode(",",$row));
			}
			echo implode("",$result);
		}else{
			echo implode("",array_fill($re));
		}
	}
	function user_by_fb_id($_id){
		$sql="SELECT * FROM user WHERE fb_id='$_id'";
		$re =mysql_query($sql);
		if($re){
			$result=array();
			while($row = mysql_fetch_assoc($re)){
				array_push($result,'|'.implode(",",$row));
			}
			echo implode("",$result);
		}else{
			echo implode("",array_fill($re));
		}
	}
	function user_by_name($_id){
		$sql="SELECT * FROM user WHERE name='$_id'";
		$re =mysql_query($sql);
		if($re){
			$result=array();
			while($row = mysql_fetch_assoc($re)){
				array_push($result,'|'.implode(",",$row));
			}
			echo implode("",$result);
		}else{
			echo implode("",array_fill($re));
		}
	}
	function image_by_name($_id){
		$sql="SELECT * FROM user WHERE name='$_id'";
		$re =mysql_query($sql);
		if($re){
			$result=array();
			while($row = mysql_fetch_assoc($re)){
				array_push($result,'|'.implode(",",$row));
			}
			echo implode("",$result);
		}else{
			echo implode("",array_fill($re));
		}
	}
	function creator_by_name($_id){
		$sql="SELECT * FROM user WHERE company='$_id'";
		$re =mysql_query($sql);
		if($re){
			$result=array();
			while($row = mysql_fetch_assoc($re)){
				array_push($result,'|'.implode(",",$row));
			}
			echo implode("",$result);
		}else{
			echo implode("",array_fill($re));
		}
	}

	function creator_by_image($_id){
		$sql="SELECT * FROM creator_image_rel WHERE image_id='$_id'";
		$re =mysql_query($sql);
		if($re){
			$row = mysql_fetch_assoc($re);
			$c_id = $row->creator_id;
			$sql="SELECT * FROM creator WHERE id='$c_id'";
			if($re){
				$result=array();
				while($row = mysql_fetch_assoc($re)){
					array_push($result,'|'.implode(",",$row));
				}
				echo implode("",$result);
			}else{
				echo implode("",array_fill($re));
			}
		}else{
			echo implode("",array_fill($re));
		}
	}

	function image_by_creator($_id){
		$sql="SELECT * FROM creator_image_rel WHERE creator_id='$_id'";
		$re =mysql_query($sql);
		if($re){
			$result=array();
			while($row = mysql_fetch_assoc($re)){
				$c_id = $row->image_id;
				$sql="SELECT * FROM image WHERE id='$c_id'";
				$re =mysql_query($sql);
				if($re){
					$result=array();
					while($row = mysql_fetch_assoc($re)){
						array_push($result,'|'.implode(",",$row));
					}
					echo implode("",$result);
				}else{
					echo implode("",array_fill($re));
				}
			}
		}else{
			echo implode("",array_fill($re));
		}
	}

	function image_by_user($_id){
		$sql="SELECT * FROM user_image_rel WHERE user_id='$_id'";
		$re =mysql_query($sql);
		if($re){
			$result=array();
			while($row = mysql_fetch_assoc($re)){
				$c_id = $row->image_id;
				$sql="SELECT * FROM image WHERE id='$c_id'";
				$re =mysql_query($sql);
				if($re){
					$result=array();
					while($row = mysql_fetch_assoc($re)){
						array_push($result,'|'.implode(",",$row));
					}
					echo implode("",$result);
				}else{
					echo implode("",array_fill($re));
				}
			}
		}else{
			echo implode("",array_fill($re));
		}
	}

	function creator_all($_id){
		$sql="SELECT * FROM creator";
		$re =mysql_query($sql);
		if($re){
			$result=array();
			while($row = mysql_fetch_assoc($re)){
				array_push($result,'|'.implode(",",$row));
			}
			echo implode("",$result);
		}else{
			echo implode("",array_fill($re));
		}
	}

	function image_all($_id){
		$sql="SELECT * FROM image";
		$re =mysql_query($sql);
		if($re){
			$result=array();
			while($row = mysql_fetch_assoc($re)){
				array_push($result,'|'.implode(",",$row));
			}
			echo implode("",$result);
		}else{
			echo implode("",array_fill($re));
		}
	}

	function user_all($_id){
		$sql="SELECT * FROM user";
		$re =mysql_query($sql);
		if($re){
			$result=array();
			while($row = mysql_fetch_assoc($re)){
				array_push($result,'|'.implode(",",$row));
			}
			echo implode("",$result);
		}else{
			echo implode("",array_fill($re));
		}
	}

?>


