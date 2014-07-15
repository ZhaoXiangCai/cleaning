<?php
App::uses('Color', 'Model');

/**
 * Color Test Case
 *
 */
class ColorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.color',
		'app.cleaning_order',
		'app.team',
		'app.client',
		'app.client_type',
		'app.ownership',
		'app.company',
		'app.user',
		'app.role',
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
		$this->Color = ClassRegistry::init('Color');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Color);

		parent::tearDown();
	}

}
