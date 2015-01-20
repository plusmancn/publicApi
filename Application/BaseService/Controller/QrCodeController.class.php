<?php
namespace BaseService\Controller;
use Think\Controller;
/**
 * @abstract 二维码开放服务接口
 * @link http://api.plusman.cn/BaseService/QrCode/index/
 * 路由后地址：http://api.plusman.cn/QrCode/aHR0cDovL3d3dy5iYWlkdS5jb20v5YiY5L2z5qWg.png
 */
class QrCodeController extends Controller {
    public function index($imageData=''){
        // 包含二维码类库
        include(LIB_PATH.'Org/phpqrcode/qrlib.php');
        // 解码Base64
        $imageData = base64_decode($imageData);
        // 生成图片
        \QRcode::png($imageData);
    }
}