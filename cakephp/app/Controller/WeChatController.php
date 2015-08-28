<?php
App::uses('AppController', 'Controller');
App::uses('Xml', 'Utility');
App::uses('HttpSocket', 'Network/Http');
App::uses('Model', 'Model');
App::uses('Usermgmt.User', 'Model');

/**
 * WeChat Controller
 *
 * @property WeChat $WeChat
 * @property PaginatorComponent $Paginator
 */

class WeChatController extends AppController {
    public $components = array('RequestHandler');

    public $WeChatDataModel=NULL;
    public $ArticleDataModel=NULL;
    public $wechatUser = NULL;

    public $uses = array('Usermgmt.User');

    public function __construct($request = null, $response = null ) {
        parent::__construct($request, $response);
        $this->loadModel('WeChatDataModel');
        $this->loadModel('WechatUser');
        $this->loadModel('ArticleDataModel');
    }

    public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = $this->WeChatDataModel->TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

    public function responseMsg2()
    {
        //get post data, May be due to the different environments
        $post = $this->request->data;

        //$postObj = $this->request->input('Xml::build', array('return' => 'domdocument'));

        //extract post data
        if ($post){
                $postObj = Xml::build($post);
                $RX_TYPE = trim($postObj->MsgType);

                switch($RX_TYPE)
                {
                    case "text":
                        $resultStr = $this->handleText($postObj);
                        break;
                    case "event":
                        $resultStr = $this->handleEvent($postObj);
                        break;
                    default:
                        $resultStr = "Unknow msg type: ".$RX_TYPE;
                        break;
                }
                echo $resultStr;
                exit ;
        }else {
            echo "Sth. Wrong. ::(";
            exit;
        }
    }

    public function handleText($postObj)
    {
        $fromUsername = "{$postObj->FromUserName}";
        $toUsername = "{$postObj->ToUserName}";
        $keyword = trim($postObj->Content);
        $time = time();
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>0</FuncFlag>
                    </xml>";             
        if(!empty( $keyword ))
        {
            $msgType = "text";

            if($keyword=="阅读"){
                $contentStr = "hello";
            }elseif($keyword=="排名"){
                $contentStr = $this->getRanks($fromUsername);
            }elseif($keyword=="排名2"){
                $contentStr = $this->getRanks($fromUsername);
            }elseif($keyword=="debug" || $keyword=="d"){
                $contentStr = "openId:[{$fromUsername} | " . strtolower($fromUsername) . "]";
                $userInfo = $this->WeChatDataModel->getWechatUser($fromUsername);
                $str = "昵称_{$userInfo->nickname}|" . "头像_{$userInfo->headimgurl} <a src='http://www.baidu.com'>t</a>". '<img src="../../_static/cake-logo.png" alt="CakePHP" width="70">';
                $contentStr .= $str;
            }elseif($keyword=="r"){
                //$userInfo = $this->WeChatDataModel->getWechatUser($fromUsername);
                $article = $this->getArticleRecord();
                echo $this->_response_news($postObj, $article);
                exit(0);
            }elseif($keyword=="p"){
                $contentStr =  "<a href='http://izhuomi.com/IzUserReadWordCounts/rank/'>temp</a>";
            }else{
                $contentStr = "hello";
            }
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            echo $resultStr;
        }else{
            echo "Input something...";
        }
    }

    private function getArticleRecord() {
        $ret = $this->ArticleDataModel->getArticle(-1);  //newest
        if (!$ret) {
            throw new NotFoundException(__('Invalid id'));
        }
        $retHtml = $this->ArticleDataModel->getArticleHtmlByPath($ret['url'], True);
        $id = $ret['id'];
        //$mp3Url = $ret['url'].'/content.mp3'; 
        //$randomId = $this->ArticleDataModel->getRandomArticleId(); //todo support random in wechat later
        //$nextId = $this->ArticleDataModel->getNextArticleId($id);
        //$preId = $this->ArticleDataModel->getPreArticleId($id);

        //$ret['time_create'] = explode(' ', $ret['time_create']);
        //$ret['time_create'] = $ret['time_create'][0];

        #contentPic
        if($ret['contentPic']) {
            $contentPicUrl = $ret['url'].'/'.$ret['contentPic'];
            //$this->set('contentPicUrl', $contentPicUrl);
            //$this->set('contentPicCaption', $ret['contentPicCaption']);
        }

        $record=array(
            'title' => $ret['name'],
            'description' => $ret['abstract'],
            //'picUrl' => 'http://izhuomi.com/izhuomi-data/201409/_content_youngest-designer-ever-in-new-york-fashion-week_2446387.html/content.jpg',
            'picUrl' => Router::url('/'.$contentPicUrl, true),
            'url' => 'http://izhuomi.com/IzArticles/show/',
            //'url' => 'http://www.baidu.com/',
        );
        return $record;
    }

    private function _response_news($object, $newsContent){
        $newsTplHead = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[news]]></MsgType>
                        <ArticleCount>1</ArticleCount>
                        <Articles>";
        $newsTplBody = "<item>
                        <Title><![CDATA[%s]]></Title> 
                        <Description><![CDATA[%s]]></Description>
                        <PicUrl><![CDATA[%s]]></PicUrl>
                        <Url><![CDATA[%s]]></Url>
                        </item>";
        $newsTplFoot = "</Articles>
                        <FuncFlag>0</FuncFlag>
                        </xml>";

        $header = sprintf($newsTplHead, $object->FromUserName, $object->ToUserName, time());

        $title = $newsContent['title'];
        $desc = $newsContent['description'];
        $picUrl = $newsContent['picUrl'];
        $url = $newsContent['url'];
        $body = sprintf($newsTplBody, $title, $desc, $picUrl, $url);
        
        $FuncFlag = 0;
        $footer = sprintf($newsTplFoot, $FuncFlag);

        return $header.$body.$footer;
    }

    private function _response_text($object, $content){
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>%d</FuncFlag>
                    </xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $flag);
        return $resultStr;
    }  

    public function getRanks($wechatId) {
        $retStr = "$wechatId \n 1 \n 2 \n 3 \n";
        return $retStr;
    }

    public function debug() {
        //$this->WeChatDataModel->getWechatUser("cheungzee");
        echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
        exit(0);
    }

    public function handleEvent($object)
    {
        $contentStr = "";
        switch ($object->Event)
        {
            case "subscribe":
                $contentStr = "感谢关注，在紧凑开发中哈";
                break;
            default :
                $contentStr = "Unknow Event: ".$object->Event;
                break;
        }
        $resultStr = $this->responseText($object, $contentStr);
        return $resultStr;
    }
    
    public function responseText($object, $content, $flag=0)
    {
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>%d</FuncFlag>
                    </xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $flag);
        return $resultStr;
    }

    public function receive() {
        //$this->valid();
        $this->responseMsg2();
        exit(0);
    }

    public function showAccessToken() {
        echo $this->WeChatDataModel->acToken;
        exit(0);
    }

    public function showWechatServerIpList() {
        $wechatServerIpList = $this->WeChatDataModel->wechatServerIpList;
        $this->set(array('wechatServerIpList'=>$wechatServerIpList, 
                        '_serialize' => array("wechatServerIpList")
                    ));
    }

    private function redirectForCode() {
        $cUrl = rawurlencode(Router::url('/', true).$this->request->here());
        $fwdUrl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$this->WeChatDataModel->appid}&redirect_uri={$cUrl}&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
        $this->redirect($fwdUrl);
    }

    public function filterBeforeAction() {
        //call it manually now
        //$wechatUserInfo = $this->Session->read('wechatUserInfo');
        $wechatUserInfo = NULL;
        $acToken = '';
        $rToken = '';
        $acExpr = 0;

        if($wechatUserInfo) {
            $openId = $wechatUserInfo->openid;
        } else {
            $code = '';
            if(array_key_exists('code', $_GET)) {
                if($_GET['code']=='code') {
                    //redirect for the code        
                    $this->redirectForCode();
                } else {
                    $code = $_GET['code'];
                }
            } else {
                $this->redirectForCode();
            }

            $ret = $this->WeChatDataModel->getWebAcToken($code);
            //echo "acToken: {$ret->access_token} <br/>";
            //echo "refresh_token: {$ret->refresh_token} <br/>";
            //echo "openid: {$ret->openid} <br/>";
            //echo "scope: {$ret->scope} <br/>";

            $user = $this->WeChatDataModel->getUserByWebAcToken($ret->openid, $ret->access_token);
            $acToken = $ret->access_token;
            $rToken = $ret->refresh_token;
            $acExpr = $ret->expires_in;

            $this->Session->write('wechatUserInfo', $user);
            $wechatUserInfo = $user;
            $openId=$ret->openid;
        }
        //user account about wechat's system is done

        //bind our system id;
        //wecaht user data stored in db
        $username = $wechatUserInfo->nickname;
        $wechatUser = $this->WeChatDataModel->getWechatUserByOpenId($openId);
        if(!$wechatUser) {///yes
            //create sys user
            if($username == '' ) {
                $wechatUserInfo = $this->Session->read('wechatUserInfo');
                $username = $wechatUserInfo->nickname;
            }
            //create and bind it
            $sysUser = $this->UserAuth->newEmptyUserByWechat($openId, $username);
            //$this->UserAuth->debug($openId, $username);
            //var_dump($sysUser);
            //bind
            $userId = $sysUser['User']['id'];
            $data = array();
            $data['WechatUser']['iz_user_id'] = $userId;
            $data['WechatUser']['wechat_name'] = $username; // when we update these? todo
            $data['WechatUser']['open_id'] = $openId;
            $data['WechatUser']['access_token'] = $acToken;
            $expTime = $acExpr + time();
            $exptimeStamp = date("Y-m-d H:i:s", $expTime);
            $data['WechatUser']['access_token_expire'] = $exptimeStamp;
            $data['WechatUser']['refresh_token'] = $rToken;
            $this->WechatUser->save($data);
        }

        $wechatUser = $this->WeChatDataModel->getWechatUserByOpenId($openId);
        $this->wechatUser = $wechatUser; 
        // got the info of our system' user account
        $userId = $wechatUser['WechatUser']['iz_user_id'];    
        // login our sys
        $sysUser = $this->User->findById($userId);
        $this->UserAuth->login($sysUser);
        return TRUE;
    }

    public function showArticle($id=-1) {
        //$this->debug();

        //check code / get code
        $this->filterBeforeAction();//todo consider should we make it called hidden
        $wechatUserInfo = $this->Session->read('wechatUserInfo');
        //var_dump($wechatUserInfo);
        //var_dump($this->wechatUser);
        //###
        $wordId = $this->request->query('wordId');
        $ret = $this->ArticleDataModel->getArticle($id);
        if (!$ret) {
            throw new NotFoundException(__('Invalid id'));
        }
        $cId = $ret['classification_id'];
        $cls = $this->ArticleDataModel->getCls($cId);
        if (!$cls) {
            throw new NotFoundException(__('Invalid classification id'));
        }
        $classification = $cls['classification'];
        $classificationCn = $cls['classification_cn'];
        $sameCls = $this->ArticleDataModel->getClsNArticles($cId);
        if(count($sameCls) >= 1) {
            $a = &$sameCls[0]['IzArticle'];
            $zipPicUrl = $this->ArticleDataModel->getArticleZipPicByPath($a['url']);
            $a['zipPicUrl'] = $zipPicUrl;
            unset($a);
        }
        #var_dump($sameCls);

        $retHtml = $this->ArticleDataModel->getArticleHtmlByPath($ret['url'], True);
        $id = $ret['id'];
        $mp3Url = $ret['url'].'/content.mp3'; 
        $randomId = $this->ArticleDataModel->getRandomArticleId();
        $nextId = $this->ArticleDataModel->getNextArticleId($id);
        $preId = $this->ArticleDataModel->getPreArticleId($id);

        $ret['time_create'] = explode(' ', $ret['time_create']);
        $ret['time_create'] = $ret['time_create'][0];

        #contentPic
        if($ret['contentPic']) {
            $contentPicUrl = $ret['url'].'/'.$ret['contentPic'];
            $this->set('contentPicUrl', $contentPicUrl);
            $this->set('contentPicCaption', $ret['contentPicCaption']);
        }

        $this->set('name', $ret['name']);
        $this->set('mp3Url', $mp3Url);
        $this->set('randomId', $randomId);
        $this->set('nextId', $nextId);
        $this->set('preId', $preId);
        $this->set('id', $id);
        $this->set('wordId', $wordId);
        $this->set('classification', $classification);
        $this->set('sameCls', $sameCls);
        $this->set('classificationCn', $classificationCn);
        $this->set('ori_url', $ret['ori_url']);
        $this->set('time_create', $ret['time_create']);
        $this->set('abstract', $ret['abstract']);
        $this->set('data', $retHtml);
    }

/*

    public function show($id=-1) {//can't add params here any more, since we use some hard code about url in js 
        $wordId = $this->request->query('wordId');
        $ret = $this->ArticleDataModel->getArticle($id);
        if (!$ret) {
            throw new NotFoundException(__('Invalid id'));
        }
        $cId = $ret['classification_id'];
        $cls = $this->ArticleDataModel->getCls($cId);
        if (!$cls) {
            throw new NotFoundException(__('Invalid classification id'));
        }
        $classification = $cls['classification'];
        $classificationCn = $cls['classification_cn'];
        $sameCls = $this->ArticleDataModel->getClsNArticles($cId);
        if(count($sameCls) >= 1) {
            $a = &$sameCls[0]['IzArticle'];
            $zipPicUrl = $this->ArticleDataModel->getArticleZipPicByPath($a['url']);
            $a['zipPicUrl'] = $zipPicUrl;
            unset($a);
        }
        #var_dump($sameCls);

        $retHtml = $this->ArticleDataModel->getArticleHtmlByPath($ret['url'], True);
        $id = $ret['id'];
        $mp3Url = $ret['url'].'/content.mp3'; 
        $randomId = $this->ArticleDataModel->getRandomArticleId();
        $nextId = $this->ArticleDataModel->getNextArticleId($id);
        $preId = $this->ArticleDataModel->getPreArticleId($id);

        $ret['time_create'] = explode(' ', $ret['time_create']);
        $ret['time_create'] = $ret['time_create'][0];

        #contentPic
        if($ret['contentPic']) {
            $contentPicUrl = $ret['url'].'/'.$ret['contentPic'];
            $this->set('contentPicUrl', $contentPicUrl);
            $this->set('contentPicCaption', $ret['contentPicCaption']);
        }

        $this->set('name', $ret['name']);
        $this->set('mp3Url', $mp3Url);
        $this->set('randomId', $randomId);
        $this->set('nextId', $nextId);
        $this->set('preId', $preId);
        $this->set('id', $id);
        $this->set('wordId', $wordId);
        $this->set('classification', $classification);
        $this->set('sameCls', $sameCls);
        $this->set('classificationCn', $classificationCn);
        $this->set('ori_url', $ret['ori_url']);
        $this->set('time_create', $ret['time_create']);
        $this->set('abstract', $ret['abstract']." | " . $this->generateRandomString(50));
        $this->set('data', $retHtml);
    }
*/



}

