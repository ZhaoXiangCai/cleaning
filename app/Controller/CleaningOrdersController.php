<?php
App::uses('AppController', 'Controller');
/**
 * CleaningOrders Controller
 *
 * @property CleaningOrder $CleaningOrder
 * @property PaginatorComponent $Paginator
 */
class CleaningOrdersController extends AppController {

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
		$this->CleaningOrder->recursive = 0;
		$this->set('cleaningOrders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CleaningOrder->exists($id)) {
			throw new NotFoundException(__('Invalid cleaning order'));
		}
		$options = array('conditions' => array('CleaningOrder.' . $this->CleaningOrder->primaryKey => $id));
		$this->set('cleaningOrder', $this->CleaningOrder->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CleaningOrder->create();
			if ($this->CleaningOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The cleaning order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cleaning order could not be saved. Please, try again.'));
			}
		}
		$teams = $this->CleaningOrder->Team->find('list');
		$clients = $this->CleaningOrder->Client->find('list');
		$companies = $this->CleaningOrder->Company->find('list');
		$services = $this->CleaningOrder->Service->find('list');
		$orderStatuses = $this->CleaningOrder->OrderStatus->find('list');
		$this->set(compact('teams', 'clients', 'companies', 'services', 'orderStatuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CleaningOrder->exists($id)) {
			throw new NotFoundException(__('Invalid cleaning order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CleaningOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The cleaning order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cleaning order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CleaningOrder.' . $this->CleaningOrder->primaryKey => $id));
			$this->request->data = $this->CleaningOrder->find('first', $options);
		}
		$teams = $this->CleaningOrder->Team->find('list');
		$clients = $this->CleaningOrder->Client->find('list');
		$companies = $this->CleaningOrder->Company->find('list');
		$services = $this->CleaningOrder->Service->find('list');
		$orderStatuses = $this->CleaningOrder->OrderStatus->find('list');
		$this->set(compact('teams', 'clients', 'companies', 'services', 'orderStatuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CleaningOrder->id = $id;
		if (!$this->CleaningOrder->exists()) {
			throw new NotFoundException(__('Invalid cleaning order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CleaningOrder->delete()) {
			$this->Session->setFlash(__('The cleaning order has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cleaning order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
