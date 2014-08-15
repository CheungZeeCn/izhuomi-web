<?php
App::uses('AppModel', 'Model');
App::uses('IzArticle', 'Model');

/**
 * Companyinfor Model
 *
 */
class ArticleDataModel extends AppModel {
    public $useTable = FALSE;
    public $IzArticle = NULL;

    public function makeModelThere() {
        $arg_array = func_get_args();
        foreach($arg_array as $modelName) {
            if($this->$modelName == NULL) {
                $this->$modelName = new $modelName();
            }
        }
        return TRUE;
    }

    public function getArticle($id) {
		$this->makeModelThere('IzArticle');
        if($id == -1) {
            $ret = $this->IzArticle->find('all', array("limit" => 1, "order" => "id DESC"));
        } else {
            $mapping = array(
                            //'timeBegin' => 'date >=', 
                            //'timeEnd' => 'date <=',
                            'id' => 'id'
                        );
            $values = array(
                            //'timeBegin' => $timeBegin, 
                            //'timeEnd' => $timeEnd,
                            'id' => $id,
                        );
             
            $conditions = $this->makeConditions($mapping, $values);
            $ret = $this->IzArticle->find('all', array("conditions" => $conditions,));
        }
        $ret = $this->deleteModelNameFromData($ret);
        if (!$ret) {
            throw new NotFoundException(__('Invalid id'));
            return NULL;
        }
        return $ret[0];
    }

    public function getArticleHtmlByPath($htmlPath) {
        $ret = $this->getFileContent($htmlPath);  
        return $ret;
    }

}
