<?php
App::uses('AppModel', 'Model');
App::uses('HttpSocket', 'Network/Http');
/**
 * Oauth2User Model
 *
 */
class Oauth2User extends AppModel {

/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'w';

    public $h = NULL;

    public $config = array(
        'weibo' => array(
            'appKey' => '627412516',
            'appSecret' => '5d6f118870e34f936759d1d7f7e221ef', 
            //'scope' => 'email,direct_messages_write',
            //'redirect_uri' => 'izhuomi.com',
            'scope' => 'email',
        ),
    );

    public function initOauthHandler($fromSys) {
        if($this->h == NULL) {
            if($fromSys == 'weibo') {
                $this->h = new Oauth2WeiboHandler($this->config['weibo']);
            }
        }
    }

    public function newOrUpdateOauth2User($openId, $username, $izUserId, $acToken, $acTokenExpire,  $userInfo, $fromSys) {
        //new ?
        $oauth2User = $this->findByizUserId($izUserId);
        if($oauth2User) {
            $oauth2User['Oauth2User']['remote_user_name'] = $username;
            $oauth2User['Oauth2User']['open_id'] = $openId;
            $oauth2User['Oauth2User']['access_token'] = $acToken;
            $oauth2User['Oauth2User']['access_token_expire'] = $acToken;
            $oauth2User['Oauth2User']['from_system'] = $fromSys;
            $oauth2User['Oauth2User']['others'] = json_encode($userInfo);
            return $this->save($oauth2User);
        } else {
            $this->create();
            if($fromSys == 'weibo') {
                $this->set('iz_user_id', $izUserId);
                $this->set('remote_user_name', $username);
                $this->set('open_id', $openId);
                $this->set('access_token', $acToken);
                $this->set('access_token_expire', $acTokenExpire);
                $this->set('from_system', $fromSys);
                $this->set('others', json_encode($userInfo));
            }
            return $this->save();
        }
    }


    public function getCode($fromSys, &$c) {
        $this->initOauthHandler($fromSys);
        $code = '';
        if(array_key_exists('code', $_GET)) {
            if($_GET['code']=='code') {
                //redirect for the code        
                $this->h->redirectForCode();
            } else {
                $code = $_GET['code'];
            }
        } else {
            $this->h->redirectForCode($c);
        }
        //code got
        return $code;
    }

    public function getUserInfo($acToken, $openId) {
        return $this->h->getUserInfo($acToken, $openId);
    }

    public function getAcTokenByCode($code) {
        $acToken = $this->h->getAccessTokenByCode($code);     
        return $acToken;
    }


}

class OauthBaseHandler {
    /**
     * 
     * @var curl Handle
     */
    protected $_curlHandle;

    public $acToken;
    
    /**
     * Set up the API root URL.
     *
     * @ignore
     */
    public $host;
    
    /**
     * 
     * @var array
     */
    protected $_curlOptions = array(
        CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_0,
        CURLOPT_USERAGENT       => 'ZenAPI v0.3',
        CURLOPT_CONNECTTIMEOUT  => 30,
        CURLOPT_TIMEOUT         => 30,
        CURLOPT_SSL_VERIFYPEER  => FALSE,
    );
    
    /**
     * Contains the last HTTP headers returned.
     *
     * @ignore
     */
    public $http_header = array();
    
    /**
     * print the debug info
     *
     * @ignore
     */
    public $debug = FALSE;

    protected function _paramsFilter(&$params){
        ;
    }
    protected function _additionalHeaders(){
        return array();
    }

    public function parseResponse($response){
        $json = json_decode($response, true);
        if ($json === null)
            throw new Exception($response);
        
        return $json;
    }

    public function get($url, $parameters = array()) {
        $this->_paramsFilter($parameters);
        $HttpSocket = new HttpSocket(array(
            'ssl_allow_self_signed' => true,
            'ssl_verify_peer' => false,
            ));
        
        $response = $this->http($this->realUrl($url) . (empty($parameters) ? '' : '?' . http_build_query($parameters)), 'GET', null, $this->_additionalHeaders());
        
        return $this->parseResponse($response);
    }



    public function getAccessToken( $type = 'code', $keys ) {
        $params = $keys;
        if ( $type === 'token' ) {
            $params['grant_type'] = 'refresh_token';
            $params['refresh_token'] = $keys['refresh_token'];
        } elseif ( $type === 'code' ) {
            $params['grant_type'] = 'authorization_code';
            $params['code'] = $keys['code'];
            $params['redirect_uri'] = $keys['redirect_uri'];
        } elseif ( $type === 'password' ) {
            $params['grant_type'] = 'password';
            $params['username'] = $keys['username'];
            $params['password'] = $keys['password'];
        } else {
            throw new Exception("wrong auth type");
        }

        $HttpSocket = new HttpSocket(array(
            'ssl_allow_self_signed' => true,
            'ssl_verify_peer' => false,
            ));

        $response = $HttpSocket->post($this->accessTokenURL(), $params);
        //$response = $this->http($this->accessTokenURL(), 'POST', http_build_query($params)); 
        //$response = $this->http($this->accessTokenURL(), 'POST', http_build_query($params)); 
        return $this->_tokenFilter($response);
    }

    protected function _tokenFilter($response){
        return json_decode($response, true);
    }

    public function http($url, $method, $postfields = NULL, $headers = array()) {
        if ($this->_curlHandle !== null){
            curl_close($this->_curlHandle);
            $this->http_header = array();
        }

        $this->_curlHandle = $ci = curl_init();

        /* Curl settings */
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ci, CURLOPT_ENCODING, "");
        //curl_setopt($ci, CURLOPT_HEADERFUNCTION, function($ch, $header){
        //    $this->http_header[] = $header;
        //    return strlen($header);
        //});
        curl_setopt($ci, CURLOPT_HEADERFUNCTION, array($this, 'getHeader'));
        curl_setopt($ci, CURLOPT_HEADER, FALSE);
        curl_setopt($ci, CURLOPT_URL, $url);
        curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ci, CURLINFO_HEADER_OUT, TRUE);

        curl_setopt_array($ci, $this->_curlOptions);

        switch ($method) {
            case 'POST':
                curl_setopt($ci, CURLOPT_POST, TRUE);
                break;
            case 'GET':
                curl_setopt($ci, CURLOPT_POST, FALSE);
                break;
            default:
                curl_setopt($ci, CURLOPT_CUSTOMREQUEST, $method);
        }

        if (!empty($postfields))
            curl_setopt($ci, CURLOPT_POSTFIELDS, $postfields);

        $response = curl_exec($ci);

        if ($response === false){
            //throw new CurlException(curl_error($ci), curl_errno($ci));
            throw new Exception(curl_error($ci), curl_errno($ci));
        }

        if ($this->debug) {
            echo "=====post data======\r\n";
            var_dump($postfields);

            echo '=====info====='."\r\n";
            print_r( curl_getinfo($this->_curlHandle) );

            echo '=====$response====='."\r\n";
            print_r( $response );
        }
        return $response;
    }
    function getHeader($ch, $header) {
        $i = strpos($header, ':');
        if (!empty($i)) {
            $key = str_replace('-', '_', strtolower(substr($header, 0, $i)));
            $value = trim(substr($header, $i + 2));
            $this->http_header[$key] = $value;
        }
        return strlen($header);
    }
}

class Oauth2WeiboHandler extends OauthBaseHandler{
    public $config = array();
    public $host = "https://api.weibo.com/2/";
    public $format = 'json'; 

    public function __construct($config) {
        $this->config = $config;      
    }

    public function authorizeURL() {
        return 'https://api.weibo.com/oauth2/authorize';
    }

    public function accessTokenURL() {
        return 'https://api.weibo.com/oauth2/access_token';
    }

    public function getUserInfo($acToken, $openId) {
        $this->acToken = $acToken;
        $info = $this->get('users/show', array('uid'=> $openId, 'access_token'=>$acToken)); 
        if(array_key_exists('error', $info)) {
            return NULL;    
        }
        return $info;
    }

    public function redirectForCode(&$c) {
        //$cUrl = rawurlencode(rtrim(Router::url('/', true), '/'). $c->request->here());
        $cUrl = rtrim(Router::url('/', true), '/'). $c->request->here();
        $params = array(
            'client_id' => $this->config['appKey'],
            'redirect_uri'  => $cUrl,//设置回调
            'response_type' => 'code',//only for get code
            'state' => 'test',
            'display'   => 'default',
            'scope'     => $this->config['scope'],
            'forcelogin'    => 1, //是否使用已登陆微博账号
        );
        $authorizeUrl = $this->authorizeURL() . "?" . http_build_query($params);    
        $c->redirect($authorizeUrl);
    }

    public function getAccessTokenByCode($code) {
        $keys = array(
            'code'  => $code,
            'client_id' => $this->config['appKey'],
            'client_secret' => $this->config['appSecret'],
            'grant_type' => 'authorization_code',
            'redirect_uri'=> "http://izhuomi.com/response",
        );
        $token = $this->getAccessToken('code', $keys);
        return $token;
    }

    public function realUrl($url){
        return $this->host . $url . '.' . $this->format;
    }

     
}
