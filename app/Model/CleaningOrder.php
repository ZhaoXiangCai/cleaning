<?php
App::uses('AppModel', 'Model');
/**
 * CleaningOrder Model
 *
 * @property Team $Team
 * @property Client $Client
 * @property Company $Company
 * @property Comment $Comment
 * @property Service $Service
 * @property OrderStatus $OrderStatus
 * @property Added_by $Added_by
 */
class CleaningOrder extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'appointment_time_from' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'pastDate' => array( 
                'rule' => array('pastDate', 'appointment_time_from' ), 
                'message' => 'The start date must not be in the past'
            ),
            'startBeforeEnd' => array( 
                'rule' => array('startBeforeEnd', 'appointment_time_to' ), 
                'message' => 'The start time must be before the end time.'
            ),                
		),
		'appointment_time_to' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ordered_time' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
    
    function startBeforeEnd( $field=array(), $compare_field=null ) { 
        foreach( $field as $key => $value ){ 
            $v1 = $value; 
            $v2 = $this->data[$this->name][ $compare_field ]; 
            if($v1 > $v2) { 
                    return FALSE; 
            } else { 
                    continue; 
            } 
        } 
        return TRUE; 
    }
        
    function pastDate( $field=array()){
        foreach( $field as $key => $value ){
            $v3 = $value;
            if (strtotime($v3) > strtotime(date('Y-m-d H:i:s')) || strtotime($v3) == strtotime(date('Y-m-d H:i:s'))){
                debug($v3);
                return TRUE; 
            } 
            return False; 
        }
    }

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Team' => array(
			'className' => 'Team',
			'foreignKey' => 'team_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Color' => array(
            'className' => 'Color',
            'foreignKey' => 'color_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
		'Client' => array(
			'className' => 'Client',
			'foreignKey' => 'client_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Company' => array(
			'className' => 'Company',
			'foreignKey' => 'company_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Added_by' => array(
            'className' => 'User',
            'foreignKey' => 'added_by',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Last_Invoice' => array(
            'className' => 'User',
            'foreignKey' => 'last_invoice_sent',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Referrer' => array(
            'className' => 'User',
            'foreignKey' => 'referrer',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'cleaning_order_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Service' => array(
			'className' => 'Service',
			'joinTable' => 'cleaning_orders_services',
			'foreignKey' => 'cleaning_order_id',
			'associationForeignKey' => 'service_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'OrderStatus' => array(
			'className' => 'OrderStatus',
			'joinTable' => 'order_statuses_cleaning_orders',
			'foreignKey' => 'cleaning_order_id',
			'associationForeignKey' => 'order_status_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'User' => array(
            'className' => 'User',
            'joinTable' => 'commissions',
            'foreignKey' => 'cleaning_order_id',
            'associationForeignKey' => 'user_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        )
	);

}
