<?php
App::uses('CleaningOrdersService', 'Model');

/**
 * CleaningOrdersService Test Case
 *
 */
class CleaningOrdersServiceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cleaning_orders_service',
		'app.order',
		'app.service'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CleaningOrdersService = ClassRegistry::init('CleaningOrdersService');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CleaningOrdersService);

		parent::tearDown();
	}

}
