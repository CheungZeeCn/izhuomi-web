<?php
App::uses('AppModel', 'Model');
App::uses('IzUserDigest', 'Model');
App::uses('IzUserDoneArticle', 'Model');
App::uses('IzUserLastingDay', 'Model');
App::uses('IzUserRank', 'Model');
App::uses('IzUserLastReadingProgress', 'Model');
App::uses('IzhuomiTime', 'Lib');


/**
 * Companyinfor Model
 *
 */
 //do nothing now

class UserDataModel extends AppModel {
    public $useTable = FALSE;
    protected $IzUserDoneArticle = NULL;
    protected $IzUserDigest = NULL;
    protected $IzUserLastingDay = NULL;
    protected $IzUserRank = NULL;

    public function getUserLastingDays($userId) {
        $this->makeModelThere('IzUserLastingDay');
        App::uses('CakeTime', 'Utility');
        $today = date("Y-m-d");
        $defaultLastingDays = array(
            'IzUserLastingDay' => array( 
                'user_id' => $userId, 
                'max_begin_day' => $today,
                'max_end_day' => $today,
                'max_lasting_days' => 0,
                'now_begin_day' => $today,
                'now_end_day' => $today,
                'now_lasting_days' => 0,
            ),
        );
        $lastingDays = $this->IzUserLastingDay->find('first', array('conditions' => array('user_id'=>$userId)));
        if(count($lastingDays) == 0) {
            $lastingDays = $defaultLastingDays;
        }
        return $lastingDays;
    }

    public function setUserLastingDays($userId, $lastingDays=array()) {
        $this->makeModelThere('IzUserLastingDay');
        App::uses('CakeTime', 'Utility');
        $today = date("Y-m-d");
        $defaultLastingDays = array(
            'IzUserLastingDay' => array( 
                'user_id' => $userId, 
                'max_begin_day' => $today,
                'max_end_day' => $today,
                'max_lasting_days' => 1,
                'now_begin_day' => $today,
                'now_end_day' => $today,
                'now_lasting_days' => 1,
            ),
        );
        if($lastingDays==array()) {
            $lastingDays = $defaultLastingDays;  
            $this->IzUserLastingDay->save($lastingDays);
        } else {
            $this->IzUserLastingDay->save($lastingDays);
        }
    }

    public function updateUserLastingDays($userId) {
        $today = date("Y-m-d");
        $lastingDays = $this->getUserLastingDays($userId);

        //just first update //should be update //updated before
        if($lastingDays['IzUserLastingDay']['max_lasting_days'] == 0 ) {//init
            $this->setUserLastingDays($userId);
        } elseif(! CakeTime::isToday($lastingDays['IzUserLastingDay']['now_end_day'])) {//update
            //update it 
            $dayDiff = IzhuomiTime::countDayDiff($today, $lastingDays['IzUserLastingDay']['now_end_day']);
            $lastingDays['IzUserLastingDay']['now_end_day'] = $today;
            if($dayDiff != 1) {//lasting break down, so sad... :(
                $lastingDays['IzUserLastingDay']['now_begin_day'] = $today; 
                $lastingDays['IzUserLastingDay']['now_lasting_days'] = 1;
            } else {
                $lastingDays['IzUserLastingDay']['now_lasting_days'] += 1;
            }
            //update max lasting ?
            if($lastingDays['IzUserLastingDay']['now_lasting_days'] >
                $lastingDays['IzUserLastingDay']['max_lasting_days']) {
                $lastingDays['IzUserLastingDay']['max_lasting_days'] = 
                    $lastingDays['IzUserLastingDay']['now_lasting_days'];
                $lastingDays['IzUserLastingDay']['max_begin_day'] = 
                    $lastingDays['IzUserLastingDay']['now_begin_day'];
                $lastingDays['IzUserLastingDay']['max_end_day'] =
                    $lastingDays['IzUserLastingDay']['now_end_day'];
            }
            $this->setUserLastingDays($userId, $lastingDays);
        } else { // updated
            // do nothing ;
        }
    }
    

    public function countUserDoneArticles($userId) {
        $this->makeModelThere('IzUserDoneArticle');
        $ret = $this->IzUserDoneArticle->find('count', array('conditions'=>array('user_id' => $userId)));
        return $ret;
    }

    public function getUserDigests($userId, $limit=-1) {
        $this->makeModelThere('IzUserDigest');

        $mapping = array(
                    'user_id' => 'user_id',
                );
        $values = array(
                    'user_id' => $userId,
                );

        $conditions = $this->IzUserDigest->makeConditions($mapping, $values);
        if($limit <= 0) {
            $userDigests = $this->IzUserDigest->find('all', array("order"=>"id desc", "conditions" => $conditions,));
        } else {
            $userDigests = $this->IzUserDigest->find('all', array("order"=>"id desc", "limit"=>$limit, "conditions" => $conditions,));
        }
        return $userDigests;
    }

    public function getUserRanks($userId) {
        $this->makeModelThere('IzUserRank');
        $ranks = $this->IzUserRank->find('first', array('conditions'=>array('user_id' => $userId)));
        $emptyRanks = array(
            'IzUserRank' => array(
                'user_id' => $userId,
                'article_done_rank' => NULL,
                'credit_rank' => NULL,
            ),
        );
        if($ranks == NULL) {
            $ranks = $emptyRanks;
        }
        return $ranks; 
    }

    public function getUserLastReadingProgress($userId) {
        $this->makeModelThere('IzUserLastReadingProgress');
        $lastReadingProgress = $this->IzUserLastReadingProgress->find('first', array('conditions'=>array('user_id' => $userId)));
        return $lastReadingProgress;
    }
}
