<?php
App::uses('OrderStatus', 'Model');

/**
 * OrderStatus Test Case
 *
 */
class OrderStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_status',
		'app.cleaning_order',
		'app.team',
		'app.client',
		'app.client_type',
		'app.ownership',
		'app.company',
		'app.referrer',
		'app.service',
		'app.cleaning_orders_service',
		'app.order_statuses_cleaning_order'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrderStatus = ClassRegistry::init('OrderStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrderStatus);

		parent::tearDown();
	}

}
