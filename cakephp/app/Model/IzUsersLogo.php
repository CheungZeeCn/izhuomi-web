<?php
App::uses('AppModel', 'Model');
/**
 * IzUsersLogo Model
 *
 */
class IzUsersLogo extends AppModel {

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
	public $useTable = 'iz_users_logo';


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
				'on' => array('create', 'update'), // Limit validation to 'create' or 'update' operations
			),
		),
	);

    public function getUserLogosAddr($uid) {
        $data = $this->findByUserId($uid);;
        if($data == NULL) {
            return array(NULL, NULL, NULL);
        }
        $data = $data['IzUsersLogo'];
        $small = $data["small_logo_addr"];
        $middle = $data["middle_logo_addr"];
        $large = $data["large_logo_addr"];
        return array('small'=>$small, 'middle'=>$middle, 'large'=>$large);
    }

    public function logoFile2Url($fName, $isFullBase = true) {
        $path = Configure::read('userLogoPath');
        if($isFullBase) {
            $urlPath = rtrim(Router::url($path), "/") . "/";
        } else {
            $urlPath = rtrim($path, "/") . "/";
        }

        $fUrl = $urlPath . $fName;   
        return  $fUrl;
    }

    public function genLogoUrl($oriUrl, $size='large', $isFullBase=true) {
        $nullPath = Configure::read('userLogoNullPath');

        if($oriUrl == NULL) {
            $url = $this->logoFile2Url($nullPath[$size], $isFullBase);
        } else {
            $url = $this->logoFile2Url($oriUrl, $isFullBase);
        }
        return $url;
    }

}
