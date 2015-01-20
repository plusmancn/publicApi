# publicApi 
> saas化的基础服务平台，由 [ThinkPhp](http://thinkphp.cn) 强力驱动，在合法的范围内，随意使用

**接口目录**

* 二维码生成 (QrCode Generator)

****

**附录**

* Nginx下ThinkPhp配置文件参考

****

###二维码生成 (QrCode Generator)
**接口地址：**  
[http://api.plusman.cn/QrCode/{$SingleBase64Data}.png](http://api.plusman.cn/QrCode/aHR0cDovL3d3dy5iYWlkdS5jb20v5YiY5L2z5qWg.png)    

**请求方式：**  `Get`

**参数定义**    

参数					|解释			
:------------------|:-------------  
SingleBase64Data	| 原始数据单层base64加密

**示例**  
二维码要存储的数据为：
publicApi是个免费的开源基础服务平台  

通过单层base64加密后为：
cHVibGljQXBp5piv5Liq5YWN6LS555qE5byA5rqQ5Z+656GA5pyN5Yqh5bmz5Y+w  

最后请求url为：
[http://api.plusman.cn/QrCode/cHVibGljQXBp5piv5Liq5YWN6LS555qE5byA5rqQ5Z+656GA5pyN5Yqh5bmz5Y+w.png](http://api.plusman.cn/QrCode/cHVibGljQXBp5piv5Liq5YWN6LS555qE5byA5rqQ5Z+656GA5pyN5Yqh5bmz5Y+w.png)  

![image](http://api.plusman.cn/QrCode/cHVibGljQXBp5piv5Liq5YWN6LS555qE5byA5rqQ5Z+656GA5pyN5Yqh5bmz5Y+w.png)

****
### Nginx下ThinkPhp配置文件参考
**支持Pathinfo**

	# file：pathinfo.conf
	
	set $script     $uri;
	set $path_info  "";
	if ($uri ~ "^(.+?\.php)(/.+)$") {
	    set $script     $1;
	    set $path_info  $2;
	}
	fastcgi_param  SCRIPT_FILENAME    $document_root$script;
	fastcgi_param  SCRIPT_NAME        $script;
	fastcgi_param  PATH_INFO          $path_info;

**支持FastCgi**
	
	#file：fastcgi.conf
	
	fastcgi_param  SCRIPT_FILENAME    $document_root$fastcgi_script_name;
	fastcgi_param  QUERY_STRING       $query_string;
	fastcgi_param  REQUEST_METHOD     $request_method;
	fastcgi_param  CONTENT_TYPE       $content_type;
	fastcgi_param  CONTENT_LENGTH     $content_length;
	
	fastcgi_param  SCRIPT_NAME        $fastcgi_script_name;
	fastcgi_param  REQUEST_URI        $request_uri;
	fastcgi_param  DOCUMENT_URI       $document_uri;
	fastcgi_param  DOCUMENT_ROOT      $document_root;
	fastcgi_param  SERVER_PROTOCOL    $server_protocol;
	fastcgi_param  HTTPS              $https if_not_empty;
	
	fastcgi_param  GATEWAY_INTERFACE  CGI/1.1;
	fastcgi_param  SERVER_SOFTWARE    nginx/$nginx_version;
	
	fastcgi_param  REMOTE_ADDR        $remote_addr;
	fastcgi_param  REMOTE_PORT        $remote_port;
	fastcgi_param  SERVER_ADDR        $server_addr;
	fastcgi_param  SERVER_PORT        $server_port;
	fastcgi_param  SERVER_NAME        $server_name;
	
	# PHP only, required if PHP was built with --enable-force-cgi-redirect
	fastcgi_param  REDIRECT_STATUS    200;

**站点配置文件**
	
	#file：api.plusman.cn.conf 
	
	server
    {
            listen 80;
            #listen [::]:80;
            server_name api.plusman.cn;
            index index.html index.htm index.php default.html default.htm default.php;
            root  /home/wwwroot/api.plusman.cn;

            include other.conf;
            #error_page   404   /404.html;

            location / {
                    if (!-e $request_filename){
                            rewrite ^(.*)$  /index.php?s=$1  last;
                            break;
                    }
            }

            location ~ [^/]\.php(/|$)
                    {
                            # comment try_files $uri =404; to enable pathinfo
                            try_files $uri =404;
                            fastcgi_pass  unix:/tmp/php-cgi.sock;
                            fastcgi_index index.php;
                            include fastcgi.conf; # 此处包含上述文件
                            include pathinfo.conf; # 此处包含上诉文件
                    }

			# Png 此处默认缺省，如果非api服务的话，需要再做相应配置，Todo，需要更新
            location ~ .*\.(gif|jpg|jpeg|bmp|swf)$   
                    {
                            expires      30d;
                    }

            location ~ .*\.(js|css)?$
                    {
                            expires      12h;
                    }

            access_log  /home/wwwlogs/api.plusman.cn.log  access;
    }
	
