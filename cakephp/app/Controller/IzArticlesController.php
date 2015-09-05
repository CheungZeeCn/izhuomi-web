<?php
App::uses('AppController', 'Controller');
App::uses('Model', 'Model');
App::uses('CakeTime', 'Utility');
/**
 * IzArticles Controller
 *
 */
class IzArticlesController extends AppController {
    public $components = array('RequestHandler', 'Paginator');
    public $uses = array("IzArticle", "IzComment", "IzUsersLogo");
    //public $helpers = array('Comments.CommentWidget');

/**
 * Scaffold
 *
 * @var mixed
 */
    public $layout = 'articles';

    //public $scaffold;
    public function __construct ($request = null, $response = null ) {
        $this->loadModel('ArticleDataModel');
        parent::__construct ($request, $response);
    }

    protected function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ,.?!';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            if($i%10 == 0) {
                $randomString .= " ";
            } else {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
        }
        return $randomString;
    } 
    
    // need user_id to be inserted to the database 
    // was moved to IzWordbook class by zhangzhi @ 20140821
    //public function addWord($name) {
    //    if($this->Auth->loggedIn() == true){
    //        $this->loadModel('IzWordlist');
    //        $now = new DateTime();
    //    
    //        $this->IzWordlist->set(array(
    //            'name'=>$name,
    //            'user_id'=>$this->Auth->user('id'),
    //            'description'=>NULL,
    //            'created'=> $now->format('Y-m-d H:i:s')
    //        ));
    //        $this->IzWordlist->save();
    //       
    //        $ret = 1;
    //        $stat = 'OK';
    //    }else{
    //        $ret = 0;
    //        $stat = 'BAD';
    //    }
    //    $this->set( array(
    //        'return' => $ret,
    //        'status' => $stat,
    //        '_serialize' => array('return', 'status')
    //        )
    //    );
    //}

    public function ajax_addLikeNum($id) {
        $status = 'OK';
        $likeNum = $this->ArticleDataModel->addArtcleLikeNum($id);
        if($likeNum === False) {
            $status = 'DB ERROR';
        }

        $this->set( array(
            'return' => $likeNum,
            'status' => $status,
            '_serialize' => array('return', 'status')
            )
        );
    }

    public function show($id=-1) {//can't add params here any more, since we use some hard code about url in js 
        $myUser = $this->UserAuth->getUser();
        $myUserId = $this->UserAuth->getUserId();
        $wordId = $this->request->query('wordId');
        $readNum = $this->ArticleDataModel->addArtcleReadNum($id);
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
        //$readNum = $ret['read'];
        $likeNum = $ret['like'];
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

        $cOptions = array(
            'conditions' => array(
                'model' => 'IzArticle',
                'foreign_key' => $id,
            ),
            'order' => 'IzComment.created',
        );
        $comments = $this->IzComment->find('all', $cOptions);
        foreach($comments as $k => $v) {
            $comments[$k]['UserLogo']['small_logo_addr'] = $this->IzUsersLogo->genLogoUrl($v['UserLogo']['small_logo_addr'], 'small', false);
            $comments[$k]['UserLogo']['large_logo_addr'] = $this->IzUsersLogo->genLogoUrl($v['UserLogo']['large_logo_addr'], 'large', false);
            $comments[$k]['IzComment']['isMine'] = $v['IzComment']['user_id']==$myUserId?TRUE:FALSE;
        }
        if($myUser) {
            $myUserLogo = $this->IzUsersLogo->genLogoUrl($myUser['IzUsersLogo']['small_logo_addr'], 'small', false);
        } else {
            $myUserLogo = NULL;
        }

        //var_dump(Inflector::variable($this->modelClass));
        //exit(0);

        $this->set('name', $ret['name']);
        $this->set('myUser', $myUser);
        $this->set('myUserId', $myUserId);
        $this->set('myUserLogo', $myUserLogo);
        $this->set('comments', $comments);
        $this->set('mp3Url', $mp3Url);
        $this->set('randomId', $randomId);
        $this->set('nextId', $nextId);
        $this->set('readNum', $readNum);
        $this->set('likeNum', $likeNum);
        $this->set('preId', $preId);
        $this->set('id', $id);
        $this->set('cId', $cId);
        $this->set('wordId', $wordId);
        $this->set('classification', $classification);
        $this->set('sameCls', $sameCls);
        $this->set('classificationCn', $classificationCn);
        $this->set('ori_url', $ret['ori_url']);
        $this->set('time_create', $ret['time_create']);
        $this->set('abstract', $ret['abstract']." | " . $this->generateRandomString(50));
        $this->set('data', $retHtml);
        $this->set('izArticle', $this->IzArticle->read(null, $id));
    }

    public function view($id) {
        $ret = $this->ArticleDataModel->getArticle($id);
        if (!$ret) {
            throw new NotFoundException(__('Invalid id'));
        }
        $ret = $ret[0];
        $this->set('id', $ret['id']);
        $this->set('data', $ret['abstract']);
        $this->set('time_create', $ret['time_create']);
        $this->set('classification', $ret['classification']);
    }
}
