<?php
App::uses('AppModel', 'Model');
/**
 * IzUserDigest Model
 *
 */
class IzUserDigest extends AppModel {

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
	public $useTable = 'iz_user_digest';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'digest';

    public $belongsTo = array(
        'IzArticle' => array(
            'className'  => 'IzArticle',
            'foreignKey' => 'article_id', 
            'type' => 'INNER',
            'fields' => array('id', 'name'),
        )
    );

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		//'id' => array(
		//	'maxLength' => array(
		//		'rule' => array('maxLength'),
		//		'message' => 'Must be less than 1024 words~',
		//		'allowEmpty' => false,
		//		'required' => true,
		//		//'last' => false, // Stop validation after this rule
		//		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		//	),
		//),
	);
}
