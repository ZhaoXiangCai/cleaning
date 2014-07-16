<?php
App::uses('AppModel', 'Model');
/**
 * OrderStatusesCleaningOrder Model
 *
 * @property OrderStatus $OrderStatus
 * @property CleaningOrder $CleaningOrder
 */
class OrderStatusesCleaningOrder extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'order_status_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cleaning_order_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'OrderStatus' => array(
			'className' => 'OrderStatus',
			'foreignKey' => 'order_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CleaningOrder' => array(
			'className' => 'CleaningOrder',
			'foreignKey' => 'cleaning_order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
