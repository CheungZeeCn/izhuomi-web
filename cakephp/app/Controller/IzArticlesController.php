<?php
App::uses('AppController', 'Controller');
App::uses('Model', 'Model');
App::uses('CakeTime', 'Utility');
/**
 * IzArticles Controller
 *
 */
class IzArticlesController extends AppController {
    public $components = array('RequestHandler');

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

    public function show($id=-1) {
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
        $this->set('classification', $classification);
        $this->set('sameCls', $sameCls);
        $this->set('classificationCn', $classificationCn);
        $this->set('ori_url', $ret['ori_url']);
        $this->set('time_create', $ret['time_create']);
        $this->set('abstract', $ret['abstract']." | " . $this->generateRandomString(50));
        $this->set('data', $retHtml);
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
