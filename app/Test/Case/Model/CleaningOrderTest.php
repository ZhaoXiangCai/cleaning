<?php
App::uses('CleaningOrder', 'Model');

/**
 * CleaningOrder Test Case
 *
 */
class CleaningOrderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cleaning_order',
		'app.team',
		'app.client',
		'app.company',
		'app.referrer',
		'app.service',
		'app.cleaning_orders_service',
		'app.order_status',
		'app.order_statuses_cleaning_order'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CleaningOrder = ClassRegistry::init('CleaningOrder');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CleaningOrder);

		parent::tearDown();
	}

}
