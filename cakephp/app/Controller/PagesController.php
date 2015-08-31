<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');
App::uses('ArticleDataModel', 'Model');
App::uses('IzClassificationModel', 'Model');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

    public function mainPage() {
        $this->loadModel('ArticleDataModel');               
        $this->loadModel('IzClassification');               
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}

        //get recently article ids
        $articles = $this->ArticleDataModel->getNArticleIds(4);
        foreach($articles as $i => $oneArt) {
            $articles[$i] = $this->ArticleDataModel->getArticleWithPic($oneArt['id']);
        }

        //get classes  
        $classesOut = array();
        $classes = $this->IzClassification->find('list', array(
                                                        'fields' => array('id', 'classification_cn'),
                                                ));
        foreach($classes as $k => $v) {
            $sameCls = $this->ArticleDataModel->getClsNArticles($k, 3);
            for($i=0; $i<count($sameCls); $i++) {
                $a = &$sameCls[$i]['IzArticle'];
                $zipPicUrl = $this->ArticleDataModel->getArticleZipPicByPath($a['url']);
                $a['zipPicUrl'] = $zipPicUrl;
                unset($a);
            }

            if(count($sameCls) >= 1) {
                $classesOut[] = array('id'=>$k, 'name' => $v, 'articles' => $sameCls);
            } 
        }

		$this->set('recentlyNew', $articles);
		$this->set('classesOut', $classesOut);
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
    }
}
