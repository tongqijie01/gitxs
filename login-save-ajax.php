<style>
	.pp{
		width: 500px;
		height: 100px;
		background-color: #f34f4f;
		margin: 10px auto;
		text-align: center;
		line-height: 100px;
		border-radius: 10px 10px 10px 10px;
		font-size: 35px;
		display: none;
		color: color;
	}
</style>
<?php 
	include("conn.php");
		// 邮箱
		$mali = empty($_POST['mali']) ? "null":strtolower($_POST['mali']);
	    // 密码
	    $password = empty($_POST['password']) ? "null":$_POST['password'];

	    // $sql="select email,name,password,question,answer from user where email = '{$mali}' and password='{$password}'";
	    // 
	     $responseArr = array(
	    	"code" => 200,
	    	"msg" => "登录成功"
	    );
	    //首先跟据用户提交的邮件查询，如果至少一条记录，则邮件正确，否则邮箱不正确
	    $sql="select id,email,name,password,question,answer from user where email = '{$mail}'";
	    $result = mysqli_query($conn, $sql);
	    if( mysqli_num_rows($result)>0){
	    //提示邮箱正确
	    //如果邮箱正确，再判断用户提交的密码和上一步查询到密码是否相等，相等则密码正确，否则密码不正确	    
	    	$arr = mysqli_fetch_assoc($result);	
	    	if( $password == $arr["password"]){
	    		//密码也对上了
				//创建一个session，键为usname,值为$mail
				$_SESSION['usemail'] = $arr["email"];
				$_SESSION['usname'] = $arr["name"];
				$_SESSION['usid'] = $arr["id"];

	    	}else{
	    		//邮件对但密码不对
	    		$responseArr["code"] = 20001;
	    		$responseArr["msg"] = "密码错误";
	    	}
	    }else{
	    	//邮箱不存在
	    	$responseArr["code"] = 20004;
	    	$responseArr["msg"] = "邮件不存在";	    	
	    }
	    // print_r( $result);
	    print_r( $responseArr );
		$rcc = mysqli_query($conn,$sql);
		if (mysqli_num_rows($rcc) >=1) {
			// 创建一个session,键为usname,值为$mali
			$_SEEION['usname'] = $mali;
			echo "ok";
			// header("Refresh:1;url=index.php");
		}else{
			echo "error".mysqli_error($conn);
			// header("Refresh:1;url=login.php");
		}
	mysqli_close($conn);
	include ("04_p.style.php");
 ?>
