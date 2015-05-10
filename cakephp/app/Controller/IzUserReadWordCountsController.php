<?php
App::uses('AppController', 'Controller');
/**
 * IzUserReadWordCounts Controller
 *
 */
class IzUserReadWordCountsController extends AppController {
    public $layout = 'wechat';

    public function rank() {
        if($this->userAgent == 'wechat') {
            //echo "wechat ";
        }

        $user = $this->UserAuth->getUser();
        $myNick = $user['User']['first_name'];

        $rankInfo = $this->IzUserReadWordCount->rank($this->UserAuth->getUserId());
        $this->set('topRanks', $rankInfo[0]); 
        $this->set('myRank', $rankInfo[1]); 
        $this->set('myCount', $rankInfo[2]); 
        $this->set('myNick', $myNick); 
    }
}
