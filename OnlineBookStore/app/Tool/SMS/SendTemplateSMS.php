<?php

namespace App\Tool\SMS;

use App\Models\M3Result;
include_once("CCPRestSDK.php");


class SendTemplateSMS
{
    //主帐号
    private $accountSid = '8aaf07085e2d97fd015e362e0b1802b0';

    //主帐号Token
    private $accountToken = '0459f598a9054e9cade2a9ab17c6ef47';

    //应用Id
    private $appId = '8aaf07085e2d97fd015e362e0b6402b5';

    //请求地址，格式如下，不需要写https://
    private $serverIP = 'sandboxapp.cloopen.com';

    //请求端口
    private $serverPort = '8883';

    //REST版本号
    private $softVersion = '2013-12-26';

    /**
     * 发送模板短信
     * @param to 手机号码集合,用英文逗号分开
     * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
     * @param $tempId 模板Id
     */
    function sendTemplateSMS($to, $datas, $tempId)
    {
        // 初始化REST SDK
        $m3_result = new M3Result;
        $rest = new CCPRestSDK($this->serverIP, $this->serverPort, $this->softVersion);
        $rest->setAccount($this->accountSid, $this->accountToken);
        $rest->setAppId($this->appId);

        // 发送模板短信
        $result = $rest->sendTemplateSMS($to, $datas, $tempId);
        if ($result == NULL) {
            $m3_result->status = 3;
            $m3_result->message = 'Empty Result';
        }
        if ($result->statusCode != 0) {
            $m3_result->status = $result->statusCode;
            $m3_result->message = $result->statusMsg;
        } else {
            $m3_result->status = 0;
            $m3_result->message = 'Succeed';
        }
        return $m3_result;
    }
}
//sendTemplateSMS("18576437523", array(1234, 5), 1);
