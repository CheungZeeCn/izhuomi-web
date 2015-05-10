<?php
App::uses('AppModel', 'Model');
/**
 * IzUserReadWordCount Model
 *
 */
class IzUserReadWordCount extends AppModel {

/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'w';

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'iz_user_read_word_count';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = array('count');

    public function getUserRank($rank, $userId) {
        $i = 0;
        foreach($rank as $r) {
            $uId = $r['IzUserReadWordCount']['user_id'];
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
        $theDay = date("Y-m-d", time());

        //$sql = "select user_id, Users.first_name, count(iz_user_done_articles.*) as num from iz_user_done_articles where donetime>=\"$theDayBegin\" and donetime <\"$theDayEnd\" group by user_id order by num desc";
        $options = array(
            'conditions' => array(
                    'date' => $theDay, 
                ),
            'fields'=>array('user_id', 'Users.first_name', 'count'),
            'joins' => array('LEFT JOIN `users` AS Users ON `Users`.`id` = `user_id`'),
            'order' => 'count desc', 
            //'contain' => array('Domain' => array('fields' => array('title')))
        );

        $rank = $this->find('all', $options);
        //var_dump($rank);

        $topRank = array_slice($rank, 0, 25);
        $myRank = $this->getUserRank($rank, $userId);
        //var_dump($myRank);
        $myCount = $myRank==-1 ? NULL : $rank[$myRank]['IzUserReadWordCount']['count'];
        return array($topRank, $myRank, $myCount);
    }

}
