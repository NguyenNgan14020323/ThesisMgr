<?php
	//gọi thư viện
	include('class.smtp.php');
    include "class.phpmailer.php";
	include_once('connectdb.php');
	$sql = mysql_query("SELECT * FROM giangvien");
	while ($row = mysql_fetch_array($sql)){
		//lay thong tin giang vien
		$macanbo = $row['macanbo'];
		$hoten = $row['hoten'];
		$vnuemail = $row['vnuemail'];
		$pass = $row['pass'];

		//gui mai va mat khau toi giang vien
		$nFrom = "Nguễn Ngàn";
		$mFrom = "ngannt1710@gmail.com";
		$mPass = "ngan nguyen";
		$nTo = $hoten;
		$mTo = $vnuemail;
		$mail = new PHPMailer();
		$body = 'Hello, ' . $hoten . ' The password for your ThesisMgr account is: ' . $pass . ' .Vui lòng đăng nhập và đổi mật khẩu';
		$title = "Password Changed";
		$mail->IsSMTP(); 
		$mail->CharSet = "utf-8";
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465;
		//xong phan cau hinh bat dau phan gui mail
		$mail->Username = $mFrom;
		$mail->Password = $mPass;
		$mail->SetFrom($mFrom,$nFrom);
		$mail->AddReplyTo('info@freetuts.net', 'Freetuts.net'); //khi nguoi dung phan hoi se duoc gui den email nay
	    $mail->Subject    = $title;// tieu de email 
	    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
	    $mail->AddAddress($mTo, $nTo);
	    // thuc thi lenh gui mail 
	    if(!$mail->Send()) {
	        echo 'Co loi!';
	         
	    } else {
	         
	        echo 'mail của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả. ';
	    }
	}
	
?>