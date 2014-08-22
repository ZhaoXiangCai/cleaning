<?php
App::uses('Commision', 'Model');

/**
 * Commision Test Case
 *
 */
class CommisionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.commision',
		'app.user',
		'app.role',
		'app.team',
		'app.cleaning_order',
		'app.color',
		'app.client',
		'app.client_type',
		'app.ownership',
		'app.company',
		'app.comment',
		'app.comment_type',
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
		$this->Commision = ClassRegistry::init('Commision');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Commision);

		parent::tearDown();
	}

}
