<?php
App::uses('AppModel', 'Model');
/**
 * IzComment Model
 *
 */
class IzComment extends AppModel {

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
	public $displayField = 'title';
    public $belongsTo  = array(
                    'User' => array(
                        'className' => 'Usermgmt.User',
                        'foreignKey' => 'user_id',
                    ),
                    'UserLogo' => array(
                        'className' => 'IzUsersLogo',
                        'foreignKey' => 'user_id',
                    ),
            );

}
