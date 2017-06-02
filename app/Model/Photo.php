<?php
App::uses('AppModel', 'Model');


 /**
 * Photo Model
 *
 */
class Photo extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

	public $actsAs = array( 'SoftDelete' );

/**
 * SoftdeletedBehaviorを使用する際に、論理削除されてしまう現象を
 * 回避するために、このfunctionを追加。
 *
 * @var array
 */
	public function exists($id = null) {
        if ($this->Behaviors->loaded('SoftDelete')) {
            return $this->existsAndNotDeleted($id);
        } else {
            return parent::exists($id);
        }
	}

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
}
