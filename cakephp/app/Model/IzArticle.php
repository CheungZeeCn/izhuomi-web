<?php
App::uses('AppModel', 'Model');
/**
 * IzArticle Model
 *
 */
class IzArticle extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'iz_article';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
    public $primaryKey = 'id';

}
