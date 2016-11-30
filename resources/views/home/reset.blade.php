<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>重置密码邮件</title>
</head>
<body>
<pre>
	尊敬的{{$username}},
		您最近为您的 追梦在线订餐网 提出了密码重设请求。要完成此过程，请点按以下链接。
	<a href="http://zm.com/reset?id={{$id}}&kd={{$kd}}">点击重置密码</a>
	http://zm.com/reset?id={{$id}}&kd={{$kd}}
	(如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)
	如果您未提出此请求，可能是其他用户无意中输入了您的电子邮件地址，您的帐户仍然安全。如果您怀疑有未经授权的人员访问了您的帐户，您应尽快前往您的追梦在线订餐网帐户页面 http://www.zm.com/forget
	此致
	追梦在线订餐网站 管理团队
	http://zm.com/
	<?=date('Y-m-d',time())?><br>
	此为系统自动邮件，请勿回复！
</pre>
</body>
</html>