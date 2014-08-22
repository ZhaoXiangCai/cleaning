<?php
/**
 * CleaningOrderFixture
 *
 */
class CleaningOrderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'appointment_time_from' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'appointment_time_to' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'ordered_time' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'address' => array('type' => 'text', 'null' => false, 'default' => null),
		'order_price' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '19,2', 'unsigned' => false),
		'discount' => array('type' => 'decimal', 'null' => false, 'default' => '0.00', 'length' => '19,2', 'unsigned' => false),
		'postcode_discount' => array('type' => 'text', 'null' => true, 'default' => 'b\'0\'', 'length' => 1),
		'up_sale' => array('type' => 'text', 'null' => true, 'default' => 'b\'0\'', 'length' => 1),
		'parking_type' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'added_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'team_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'client_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'company_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'last_invoice_sent' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'referrer_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'added_by' => array('column' => 'added_by', 'unique' => 0),
			'team_id' => array('column' => 'team_id', 'unique' => 0),
			'client_id' => array('column' => 'client_id', 'unique' => 0),
			'company_id' => array('column' => 'company_id', 'unique' => 0),
			'last_invoice_sent' => array('column' => 'last_invoice_sent', 'unique' => 0),
			'referrer_id' => array('column' => 'referrer_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'appointment_time_from' => '2014-07-11 03:48:15',
			'appointment_time_to' => '2014-07-11 03:48:15',
			'ordered_time' => '2014-07-11 03:48:15',
			'address' => '888 Clayton',
			'order_price' => '',
			'discount' => '',
			'postcode_discount' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'up_sale' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'parking_type' => 'Lorem ipsum dolor sit amet',
			'added_by' => 1,
			'team_id' => 1,
			'client_id' => 1,
			'company_id' => 1,
			'last_invoice_sent' => 1,
			'referrer_id' => 1
		),
	);

}
