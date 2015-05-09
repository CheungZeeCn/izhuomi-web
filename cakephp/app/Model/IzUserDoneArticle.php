<?php
App::uses('AppModel', 'Model');
/**
 * IzUserDoneArticle Model
 *
 */
class IzUserDoneArticle extends AppModel {

/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'w';

/**
 * Display field
 *
 * @var string
 */
	//public $displayField = 'article_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

    public function getUserRank($rank, $userId) {
        $i = 0;
        foreach($rank as $r) {
            $uId = $r['IzUserDoneArticle']['user_id'];
            if($userId == $uId) {
                return $i;
            }
            $i += 1;
        }
        return -1;
    }

    public function rank($userId=-1, $length=25) {
        if(!is_int($userId) && !is_int($length)) {
            return array();
        }
        $theDayBegin = date("Y-m-d 00:00:00", time());
        $theDayEnd = date("Y-m-d 00:00:00", time() + 3600 * 24);

        //$sql = "select user_id, Users.first_name, count(iz_user_done_articles.*) as num from iz_user_done_articles where donetime>=\"$theDayBegin\" and donetime <\"$theDayEnd\" group by user_id order by num desc";
        $options = array(
            'conditions' => array(
                    'donetime >=' => $theDayBegin, 
                    'donetime <' => $theDayEnd, 
                ),
            'fields'=>array('user_id', 'Users.first_name', 'COUNT(*) as `count`'),
            'joins' => array('LEFT JOIN `users` AS Users ON `Users`.`id` = `user_id`'),
            'group' => 'user_id',
            'order' => 'count desc', 
            //'contain' => array('Domain' => array('fields' => array('title')))
        );

        $rank = $this->find('all', $options);


        $topRank = array_slice($rank, 0, 25);
        /*
            array(1) {
              [0]=>
              array(2) {
                ["IzUserDoneArticle"]=>
                array(1) {
                  ["user_id"]=>
                  string(2) "24"
                }
                [0]=>
                array(1) {
                  ["count"]=>
                  string(1) "4"
                }
              }
            }
        */
        $myRank = $this->getUserRank($rank, $userId);
        $myCount = $myRank==-1 ? NULL : $rank[$myRank][0]['count'];
        return array($topRank, $myRank, $myCount);
    }
}
