<?php
App::uses('ClientsController', 'Controller');

/**
 * ClientsController Test Case
 *
 */
class ClientsControllerTest extends ControllerTestCase {

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
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->markTestIncomplete('testIndex not implemented.');
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$this->markTestIncomplete('testView not implemented.');
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
		$this->markTestIncomplete('testAdd not implemented.');
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
		$this->markTestIncomplete('testEdit not implemented.');
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
		$this->markTestIncomplete('testDelete not implemented.');
	}

}
