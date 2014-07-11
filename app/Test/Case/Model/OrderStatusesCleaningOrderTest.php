<?php
App::uses('OrderStatusesCleaningOrder', 'Model');

/**
 * OrderStatusesCleaningOrder Test Case
 *
 */
class OrderStatusesCleaningOrderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_statuses_cleaning_order',
		'app.order_status',
		'app.cleaning_order',
		'app.team',
		'app.client',
		'app.client_type',
		'app.ownership',
		'app.company',
		'app.referrer',
		'app.service',
		'app.cleaning_orders_service'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrderStatusesCleaningOrder = ClassRegistry::init('OrderStatusesCleaningOrder');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrderStatusesCleaningOrder);

		parent::tearDown();
	}

}
