<?php
App::uses('AppModel', 'Model');
/**
 * UserProfile Model
 *
 */
class UserProfile extends AppModel {

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
	public $useTable = 'user_profile';

/**
 * Display field
 *
 * @var string
 */
	//public $displayField = 'self_intro';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'self_intro' => array(
			'maxLength' => array(
				'rule' => array('maxLength', 256),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
