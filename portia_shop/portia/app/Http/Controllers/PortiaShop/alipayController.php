<?php


namespace App\Http\Controllers\PortiaShop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;
class alipayController extends Controller
{
    protected $config = [
        'app_id' => '2016110200785785',
        'notify_url' => 'http://yansongda.cn/notify.php',
        'return_url' => 'http://yansongda.cn/return.php',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAozFwYXqaaI1RSILHcdi4tNEMpTeyEBUZ5rooSXlUutURtUgeu8MwYASKE90G+lHsAUBSFeDM3IYKPImdKHt2k7mrDrPrSJCkLNd3pBxmbo9JUif9CKAy/t5FtEYrIpC9IlVtwn4StTmXmmeo9GVbnYwETo3llfpJEZ8viFYUcIrvv0LxesQrdQw8wfBAIh4nYk8whtnmPMO/CRwLns4Beykw2IuM2btulvOspTXrbgKhnLPfDKlgfLj49jcYI9nEp9yMpgZeI6Dqp7MHZ7fvAiZiB8n4WBCQhmy4Y6iN6lA16X3mHn1KPRrBINrHD6cDCW7e4F4hrHnj3nmWXrJ1dQIDAQAB',
        // 加密方式： **RSA2**
        'private_key' => 'MIIEowIBAAKCAQEAozFwYXqaaI1RSILHcdi4tNEMpTeyEBUZ5rooSXlUutURtUgeu8MwYASKE90G+lHsAUBSFeDM3IYKPImdKHt2k7mrDrPrSJCkLNd3pBxmbo9JUif9CKAy/t5FtEYrIpC9IlVtwn4StTmXmmeo9GVbnYwETo3llfpJEZ8viFYUcIrvv0LxesQrdQw8wfBAIh4nYk8whtnmPMO/CRwLns4Beykw2IuM2btulvOspTXrbgKhnLPfDKlgfLj49jcYI9nEp9yMpgZeI6Dqp7MHZ7fvAiZiB8n4WBCQhmy4Y6iN6lA16X3mHn1KPRrBINrHD6cDCW7e4F4hrHnj3nmWXrJ1dQIDAQABAoIBAHpl4EYccKcuJuLdw70tsQtdJ8DbTyAk03Jr+T9yUwx2NnvjBboKIcRCY1WWl180BnDBz089dimIFzFkfY0ZXMxbm2LBqxyX76r6SG+8JU+TBIksGOpZTSY/i8Q0RLH+IP0ZWeNgL6Pg+EYErYHwa5B0rd5FKwcb26Xt4Pa+qUHmoF8UUCC+4YtmAP/UsbUy+XwCDwafXxOdJqJfc0Jw+1NooftyVLabzXi9XLsuw3+9Xtw346M5dTw6/0rF2G7wzbj4WilUXGFnLzwM623mWfwCDJdLzReU3tKP8PAg+OVl5Zxb6Zk5S5yFphM7u2YqjyfonPoJ4CXNfUTUHee8ltkCgYEAzqBEgBbwosuHImFyj3mppQNWQv0KUb0iYOYan5RwscV8Q4FRt2neWcDSIjpZh13z5pbRVqYByp0q601OK7BM24IjCBtLe+FczYExTzyOxLMaO7RVINFnuvbZZR23WldiZ0WpDZgxyo9RmIZRBk2jfG+HKYb4bZkmbnnAGXeM1Z8CgYEAyjBKrvxwmU5Op789HJzOYzCnWlfE561zQPPxzLGAlPxu6XcpFWXx1INpSmAigmxnRqJP53Qt+9w9xyHzeruv1+Y0vxU2FAdlTp8C7NmE+YG+Pla+85HbbylmCb6dZb8+9HMYp9/0CiSWPavPKdu4pZ5KoyNidocQEgAAsIQjVGsCgYEAynYPqNLRhzKWfwGtFxjHOYFDjPAUpHMGtJvDiooQwqAXWq3kPCvoS1m8jP1PrGxLCK7PAHA5YScPXvCon/Zn2M5zNQZJuGDiZhspDdLwsZwtIENbBoUpdvFZotKzTjpBmZ+QPlnar/guo50410xL3SoK7o3p7roaBjYWHN4fiVECgYBRY2Ec0VdODvyQf+XMt75IpVQohL4peGO1mL0T5bvZvUe0SRhLmc7f+coPe2VI1PQ5taqug9Di2oQvvZXyKM0e/nbrGFG9fECmhlG6H9FsUnLPS0HwcB1BwQtnDsjzJSnlYtNg+ECXOKUVzCxHMEBCwtZOlzbSeYnZhRDB/V7vYwKBgBHczQdF89dmeEbocYuxgcMeUqg03CW4cSEvhhGFk14dBwWt+ZX/Q8NW/i/8wmwkYEsQSO08mgsAU+AtPZ3rtwyu85HMOXLIjJHYenFf4HSwqyGJwQjyHNIzyn0RD5RDvbYBYPuQYNxNVkARyurytPSaYWJfd+9+yPGpYd+8ogdX',
        // 使用公钥证书模式，请配置下面两个参数，同时修改ali_public_key为以.crt结尾的支付宝公钥证书路径，如（./cert/alipayCertPublicKey_RSA2.crt）
        // 'app_cert_public_key' => './cert/appCertPublicKey.crt', //应用公钥证书路径
        // 'alipay_root_cert' => './cert/alipayRootCert.crt', //支付宝根证书路径
        'log' => [ // optional
            'file' => './logs/alipay.log',
            'level' => 'info', // 建议生产环境等级调整为 info，开发环境为 debug
            'type' => 'single', // optional, 可选 daily.
            'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
        ],
        'http' => [ // optional
            'timeout' => 5.0,
            'connect_timeout' => 5.0,
            // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
        ],
        'mode' => 'dev', // optional,设置此参数，将进入沙箱模式
    ];

    public function AliPayGetNo(Request $request){

        $order = [
            'out_trade_no' => time(),
            'total_amount' => '1',
            'subject' => 'test subject - 测试',
        ];

        $alipay = Pay::alipay($this->config)->app($order);

        return $alipay;
//        return $alipay->send();// laravel 框架中请直接 `return $alipay`

//        return 'Hello World';
//        return response()->json($users);


    }

}
