<?php
App::uses('AppModel', 'Model');
App::uses('ArticleData', 'Model');
/**
 * IzClassification Model
 *
 */
class IzClassification extends AppModel {

    public function getClsNArticles($cId, $n=5) {
		$this->makeModelThere('ArticleData');
        return $this->ArticleData->getClsNArticles($cId, $n);
    }

}
