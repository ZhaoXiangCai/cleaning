<?php
App::uses('AppController', 'Controller');
/**
 * CleaningOrdersServices Controller
 *
 * @property CleaningOrdersService $CleaningOrdersService
 * @property PaginatorComponent $Paginator
 */
class CleaningOrdersServicesController extends AppController {

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
		$this->CleaningOrdersService->recursive = 0;
		$this->set('cleaningOrdersServices', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CleaningOrdersService->exists($id)) {
			throw new NotFoundException(__('Invalid cleaning orders service'));
		}
		$options = array('conditions' => array('CleaningOrdersService.' . $this->CleaningOrdersService->primaryKey => $id));
		$this->set('cleaningOrdersService', $this->CleaningOrdersService->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CleaningOrdersService->create();
			if ($this->CleaningOrdersService->save($this->request->data)) {
				$this->Session->setFlash(__('The cleaning orders service has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cleaning orders service could not be saved. Please, try again.'));
			}
		}
		$orders = $this->CleaningOrdersService->Order->find('list');
		$services = $this->CleaningOrdersService->Service->find('list');
		$this->set(compact('orders', 'services'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CleaningOrdersService->exists($id)) {
			throw new NotFoundException(__('Invalid cleaning orders service'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CleaningOrdersService->save($this->request->data)) {
				$this->Session->setFlash(__('The cleaning orders service has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cleaning orders service could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CleaningOrdersService.' . $this->CleaningOrdersService->primaryKey => $id));
			$this->request->data = $this->CleaningOrdersService->find('first', $options);
		}
		$orders = $this->CleaningOrdersService->Order->find('list');
		$services = $this->CleaningOrdersService->Service->find('list');
		$this->set(compact('orders', 'services'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CleaningOrdersService->id = $id;
		if (!$this->CleaningOrdersService->exists()) {
			throw new NotFoundException(__('Invalid cleaning orders service'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CleaningOrdersService->delete()) {
			$this->Session->setFlash(__('The cleaning orders service has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cleaning orders service could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
