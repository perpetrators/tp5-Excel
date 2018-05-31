<?php
namespace app\index\controller;

use think\Request;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
class Index
{
    public function index()
    {
        $this->test();
    }
    public function test(){
        echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
        return 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    }

    public function hello($name = 'ThinkPHP5',$id='sasa')
    {

        return json_encode(input());
    }
    public function aLiSMS(){
        $config = [
            'accessKeyId'    => 'LTAIUo39acYQPwZe',
            'accessKeySecret' => 'u6aeY8EN1jl3D9ZBUNEkGjg7sKE3jn',
        ];
        $client  = new Client($config);
        $sendSms = new SendSms;
        $sendSms->setPhoneNumbers('15186768941');//发送目标手机号
        $sendSms->setSignName('茂林');//模板签名
        $sendSms->setTemplateCode('SMS_132996257');//模板编号
        $sendSms->setTemplateParam(['date' => time(),'title'=>'测试']);//模板参数
//        $sendSms->setOutId('demo');//流水号

        print_r($client->execute($sendSms));
    }
}
