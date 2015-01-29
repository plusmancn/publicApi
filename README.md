# publicApi 
> saas化的基础服务平台，由 [ThinkPhp](http://thinkphp.cn) 强力驱动，在合法的范围内，随意使用

**接口目录**

* 二维码生成 (QrCode Generator)
* UEditor Php版本在线集成 

****

###二维码生成 (QrCode Generator)
**接口地址：**  
[http://api.plusman.cn/QrCode/{$SingleBase64Data}.png](http://api.plusman.cn/QrCode/aHR0cDovL3d3dy5iYWlkdS5jb20v5YiY5L2z5qWg.png)    

**请求方式**  
Get

**参数定义**    

参数					|解释			
:------------------|:-------------  
SingleBase64Data	| 原始数据单层base64加密

**示例**  
二维码要存储的数据为：publicApi是个免费的开源基础服务平台  
通过单层base64加密后为：cHVibGljQXBp5piv5Liq5YWN6LS555qE5byA5rqQ5Z+656GA5pyN5Yqh5bmz5Y+w  
最后请求url为：[http://api.plusman.cn/QrCode/cHVibGljQXBp5piv5Liq5YWN6LS555qE5byA5rqQ5Z+656GA5pyN5Yqh5bmz5Y+w.png](http://api.plusman.cn/QrCode/cHVibGljQXBp5piv5Liq5YWN6LS555qE5byA5rqQ5Z+656GA5pyN5Yqh5bmz5Y+w.png)  

效果图

![image](http://api.plusman.cn/QrCode/cHVibGljQXBp5piv5Liq5YWN6LS555qE5byA5rqQ5Z+656GA5pyN5Yqh5bmz5Y+w.png)

****

### UEditor Php版本在线集成 
**非跨域部署**  

> 独立部署的时候，请更改 /ueditor/php/config.json 文件下  `xxxxUrlPrefix`  系列配置为你的域名。如果不存在跨域问题，可以更改为空，建议带上域名，兼容性好点。


**跨域部署**  

> publicApi的设计初衷是为了把开发过程中的公共服务Saas化，所以在真实使用场景下会存在跨域访问问题。这种模式下，publicApi端对外开放 /ueditor/php/controller.php 文件，配置 /ueditor/php/config.json 文件下 `xxxxUrlPrefix` 为主机域名。

注意 /ueditor/php/controller.php 的配置，需要添加跨域支持，在头部加入

	header('Access-Control-Allow-Origin: *'); //*号代表允许任意域名跨域访问,也可设置成特定域名访问，如 http://www.baidu.com
	header('Access-Control-Allow-Headers: X-Requested-With,X_Requested_With'); //设置允许的跨域header


我在实际使用过程中，有一台node.js服务器，与 api.plusman.cn 不同域名，项目目录下有一份完整的 ueditor 的代码，在配置文件中 /ueditor/ueditor.config.js ，serverUrl配置为api地址。

	serverUrl: "http://api.plusman.cn/ueditor/php/controller.php"

在node.js项目中，将 ueditor 文件置入系统项目文件夹，假设放置在根目录下。 `由于跨域原因，资源需要本地加载` 


	<!--示例文件如下-->
	
	<!DOCTYPE HTML>
	<html lang="en-US">
	
	<head>
	    <meta charset="UTF-8">
	    <title>ueditor demo</title>
	</head>
	
	<body>
	    <!-- 加载编辑器的容器 -->
	    <script id="container" name="content" type="text/plain">
	        这里写你的初始化内容
	    </script>
	    <!-- 配置文件 -->
	    <script type="text/javascript" src="ueditor/ueditor.config.js"></script>
	    <!-- 编辑器源码文件 -->
	    <script type="text/javascript" src="ueditor/ueditor.all.js"></script>
	    <!-- 实例化编辑器 -->
	    <script type="text/javascript">
	        var ue = UE.getEditor('container');
	    </script>
	</body>
	
	</html>
	
更多详细使用方法：[http://fex-team.github.io/ueditor](http://fex-team.github.io/ueditor)


**Todo**  

* 实现资源文件，/ueditor.config.js，/ueditor/ueditor.all.js 从publicApi处加载，现在需要从本地加载。
* 插入表情功能，整体浏览网格为空。
* 把文件存储移植到阿里云（暂时没有找到现成的，七牛的有 [https://github.com/widuu/utf8_qiniu_ueditor]([http://fex-team.github.io/ueditor](http://fex-team.github.io/ueditor))

****




