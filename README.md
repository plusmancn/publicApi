# publicApi 
> saas化的基础服务平台，由 [ThinkPhp](http://thinkphp.cn) 强力驱动，在合法的范围内，随意使用

**接口目录**

* 二维码生成 (QrCode Generator)

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

