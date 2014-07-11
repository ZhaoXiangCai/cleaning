<?php
App::uses('AppController', 'Controller');
/**
 * OrderStatusesCleaningOrders Controller
 *
 * @property OrderStatusesCleaningOrder $OrderStatusesCleaningOrder
 * @property PaginatorComponent $Paginator
 */
class OrderStatusesCleaningOrdersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OrderStatusesCleaningOrder->recursive = 0;
		$this->set('orderStatusesCleaningOrders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrderStatusesCleaningOrder->exists($id)) {
			throw new NotFoundException(__('Invalid order statuses cleaning order'));
		}
		$options = array('conditions' => array('OrderStatusesCleaningOrder.' . $this->OrderStatusesCleaningOrder->primaryKey => $id));
		$this->set('orderStatusesCleaningOrder', $this->OrderStatusesCleaningOrder->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrderStatusesCleaningOrder->create();
			if ($this->OrderStatusesCleaningOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The order statuses cleaning order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order statuses cleaning order could not be saved. Please, try again.'));
			}
		}
		$orderStatuses = $this->OrderStatusesCleaningOrder->OrderStatus->find('list');
		$cleaningOrders = $this->OrderStatusesCleaningOrder->CleaningOrder->find('list');
		$this->set(compact('orderStatuses', 'cleaningOrders'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OrderStatusesCleaningOrder->exists($id)) {
			throw new NotFoundException(__('Invalid order statuses cleaning order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrderStatusesCleaningOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The order statuses cleaning order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order statuses cleaning order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrderStatusesCleaningOrder.' . $this->OrderStatusesCleaningOrder->primaryKey => $id));
			$this->request->data = $this->OrderStatusesCleaningOrder->find('first', $options);
		}
		$orderStatuses = $this->OrderStatusesCleaningOrder->OrderStatus->find('list');
		$cleaningOrders = $this->OrderStatusesCleaningOrder->CleaningOrder->find('list');
		$this->set(compact('orderStatuses', 'cleaningOrders'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OrderStatusesCleaningOrder->id = $id;
		if (!$this->OrderStatusesCleaningOrder->exists()) {
			throw new NotFoundException(__('Invalid order statuses cleaning order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OrderStatusesCleaningOrder->delete()) {
			$this->Session->setFlash(__('The order statuses cleaning order has been deleted.'));
		} else {
			$this->Session->setFlash(__('The order statuses cleaning order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
