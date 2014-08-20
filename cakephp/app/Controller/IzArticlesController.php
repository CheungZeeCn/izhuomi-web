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
    public function addWord($name) {
        if($this->Auth->loggedIn() == true){
            $this->loadModel('IzWordlist');
            $now = new DateTime();
        
            $this->IzWordlist->set(array(
                'name'=>$name,
                'user_id'=>$this->Auth->user('id'),
                'description'=>NULL,
                'created'=> $now->format('Y-m-d H:i:s')
            ));
            $this->IzWordlist->save();
           
            $ret = 1;
            $stat = 'OK';
        }else{
            $ret = 0;
            $stat = 'BAD';
        }
        $this->set( array(
            'return' => $ret,
            'status' => $stat,
            '_serialize' => array('return', 'status')
            )
        );
    }

    public function show($id=-1) {
        $ret = $this->ArticleDataModel->getArticle($id);
        if (!$ret) {
            throw new NotFoundException(__('Invalid id'));
        }
        $retHtml = $this->ArticleDataModel->getArticleHtmlByPath($ret['url']);

        $this->set('name', $ret['name']);
        $this->set('classification', $ret['classification']);
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
