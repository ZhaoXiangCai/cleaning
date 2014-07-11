<?php
App::uses('Ownership', 'Model');

/**
 * Ownership Test Case
 *
 */
class OwnershipTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ownership',
		'app.client',
		'app.client_type',
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
		$this->Ownership = ClassRegistry::init('Ownership');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ownership);

		parent::tearDown();
	}

}
