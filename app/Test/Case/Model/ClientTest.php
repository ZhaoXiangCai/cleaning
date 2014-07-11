<?php
App::uses('Client', 'Model');

/**
 * Client Test Case
 *
 */
class ClientTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.client',
		'app.client_type',
		'app.ownership',
		'app.cleaning_order',
		'app.team',
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
		$this->Client = ClassRegistry::init('Client');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Client);

		parent::tearDown();
	}

}
