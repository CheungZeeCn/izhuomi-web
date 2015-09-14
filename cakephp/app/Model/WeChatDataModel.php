<?php
App::uses('AppModel', 'Model');
//App::uses('IzArticle', 'Model');
App::uses('WechatUser', 'Model');
App::uses('IzClassification', 'Model');
App::uses('HttpSocket', 'Network/Http');
App::uses('Xml', 'Utility');

/**
 * Companyinfor Model
 *
 */
class WeChatDataModel extends AppModel {
    public $useTable = FALSE;

    public $wechatConf = '';
    
    public $isInit = False;

    public $acToken = '';

    public $TOKEN = '';

    public $appid = '';

    public $appsecret = '';

    public $wechatServerIpList = array();

    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        $this->makeModelThere('WechatUser');
        $this->init();
    }

    public function init() {
        if($this->isInit == True) {
            return 0;
        }
        $this->wechatConf = Configure::read('wechat');
        //
        $fLoc = $this->wechatConf['accessKeyFile'];
        $acToken = file_get_contents($fLoc);   
        $this->acToken = str_replace(PHP_EOL, '', $acToken); 

        $this->TOKEN = $this->wechatConf['TOKEN']; 
        $this->appid = $this->wechatConf['appid']; 
        $this->appsecret = $this->wechatConf['appsecret']; 

        $fLoc = $this->wechatConf['wechatServerIpListFile'];
        $ipListText = file_get_contents($fLoc);   
        foreach(preg_split("/((\r?\n)|(\r\n?))/", $ipListText) as $line){
            // do stuff with $line
            $ip = str_replace(PHP_EOL, '', $line);
            $this->wechatServerIpList[] = $ip;
        } 
    }

    public function getWechatUserByOpenId($openId) {
        $ret = $this->WechatUser->find('first', array('conditions'=>array('open_id' => $openId)));
        return $ret;
    }

    public function getWechatUser($openId)  {
        //return "user"; 
        $HttpSocket = new HttpSocket(array(
            'ssl_allow_self_signed' => true,
            'ssl_verify_peer' => false,
            )); 
        $url = 'https://api.weixin.qq.com/cgi-bin/user/info';
        $q = array('access_token' => $this->acToken, 'openid' => "$openId" , 'lang'=>'zh_CN');
        $results = $HttpSocket->get($url, $q);
        $body = json_decode($results->body());
        return $body;
    }

    public function getWebAcToken($code)  {
        //return "user"; 
        $HttpSocket = new HttpSocket(array(
            'ssl_allow_self_signed' => true,
            'ssl_verify_peer' => false,
            )); 
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token';
        $q = array('appid' => $this->appid, 
            'secret' => $this->appsecret,
            'code' => $code,
            'grant_type' => 'authorization_code'
        );
        //var_dump($q);

        $results = $HttpSocket->get($url, $q);
        $body = json_decode($results->body());
        if(!property_exists($body, 'openid')) {
            //log the error?
            //$body == NULL;
            //var_dump($body);  
            CakeLog::write('error', "getWebAcTokenError:[code:{$code}][cUrl:" . $cUrl . "][body:" .var_export($body). "]");
            return NULL;
        }
        CakeLog::write('debug', "getWebAcTokenError:[code:{$code}][cUrl:" . $cUrl . "][body:" .var_export($body). "]");
        return $body;
    }

    public function refreshWebAcToken($code, $openid, $reToken)  {
        //return "user"; 
        $HttpSocket = new HttpSocket(array(
            'ssl_allow_self_signed' => true,
            'ssl_verify_peer' => false,
            )); 
        $url = 'https://api.weixin.qq.com/sns/oauth2/refresh_token';
        $q = array('appid' => $this->appid, 
            'refresh_token' => $reToken,
            'grant_type' => 'refresh_token',
        );
        //var_dump($q);

        $results = $HttpSocket->get($url, $q);
        $body = json_decode($results->body());
        return $body;
    }

    public function getUserByWebAcToken($openid, $webAcToken, $lang='zh_CN')  {
        //return "user"; 
        $HttpSocket = new HttpSocket(array(
            'ssl_allow_self_signed' => true,
            'ssl_verify_peer' => false,
            )); 
        $url = 'https://api.weixin.qq.com/sns/userinfo';
        $q = array(
            'openid' => $openid,
            'access_token' => $webAcToken,
            'lang' => $lang,
        );

        $results = $HttpSocket->get($url, $q);
        $body = json_decode($results->body());
        return $body;
    }


}
