<?php
App::uses('AppModel', 'Model');
App::uses('IzArticle', 'Model');
App::uses('IzClassification', 'Model');

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
    
    public function getCls($id) {
		$this->makeModelThere('IzClassification');
        $ret = $this->IzClassification->findById($id)['IzClassification'];
        return $ret;
    }

    public function getClsNArticles($cId, $n=5) {
		$this->makeModelThere('IzArticle');
        $mapping = array(
                        'id' => 'classification_id',
                    );
        $values = array(
                        'id' => $cId,
                    );
         
        $conditions = $this->makeConditions($mapping, $values);
        $ret = $this->IzArticle->find('all', array("order"=>"id desc", "limit"=>$n, "conditions" => $conditions,));
        #var_dump($ret);
        return $ret;
    }

    public function getNArticleIds($n=5) {
		$this->makeModelThere('IzArticle');
        $ret = $this->IzArticle->find('all', array("order"=>"id DESC", "limit"=>$n, 'fields'=>'id'));
        $ret = $this->deleteModelNameFromData($ret);
        return $ret;
    }

    public function getArticleWithZipPic($id) {
        $article = $this->getArticle($id);  
        $url = $article['url'];
        $zipPicUrl = $this->getArticleZipPicByPath($url);
        $article['zipPicUrl'] = $zipPicUrl;
        return $article;
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

    public function getArticleMetaByPath($htmlPath) {
        $meta = $this->getFileContent($htmlPath."/meta.json");
        $meta = json_decode($meta);
        return $meta;
    }

    public function getArticleZipPicByPath($path) {
        $path = $path."/__zipPic__.jpg";
        $path = Router::url("/".$path);
        return $path;
    }

    public function getArticleHtmlByPath($htmlPath, $showEmbPics=False) {
        $ret = $this->getFileContent($htmlPath."/"."content.html");  
        if($showEmbPics) {
            $meta = $this->getArticleMetaByPath($htmlPath);
            #var_dump($meta->embPics);
            foreach($meta->embPics as $picUrl) {
                $fileName = basename($picUrl);
                $newUrl = Router::url("/".$htmlPath."/".$fileName);
                $ret = str_replace($fileName, $newUrl, $ret);
            }
        }
        return $ret;
    }

    public function getRandomArticleId() {
		$this->makeModelThere('IzArticle');
        $ret = $this->IzArticle->find('first', array('fields' => array('MAX(id) as id')));
        $id = rand(1, $ret[0]['id']);
        return $id;
    }

    public function getNextArticleId($id) {
		$this->makeModelThere('IzArticle');
        $id = $id + 1;
        if($this->IzArticle->exists($id)) {
            return $id;
        } else {
            return NULL;
        }
    }

}
