<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

/**
 * User Model
 *
 */
class User extends AppModel {


    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'username' => array(
            'notEmpty' => array(
                'rule' => array('notBlank'),
                'message' => 'ユーザーネームを入力してください。',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'hint' => array(
            'email' => array(
                'rule' => array('notBlank'),
                'message' => 'パスワードのヒントを入力してください。',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'password' => array(
            'notEmpty' => array(
                'rule' => array('notBlank'),
                'message' => 'パスワードを入力してください。',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    /**
     * beforeSave method
     * 
     * @param  array $options
     * @return boolean
     */
    public function beforeSave($options = array()) {

        parent::beforeSave($options);

        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
        }

        return true;
    }

    var $belongsTo = array('Store' =>
                            array('className' => 'Store',
                                  'foreignKey' => 'store_id'
                                  ),
                           );
}