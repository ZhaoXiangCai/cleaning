<?php
App::uses('AppController', 'Controller');
/**
 * Ownerships Controller
 *
 * @property Ownership $Ownership
 * @property PaginatorComponent $Paginator
 */
class OwnershipsController extends AppController {

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
		$this->Ownership->recursive = 0;
		$this->set('ownerships', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ownership->exists($id)) {
			throw new NotFoundException(__('Invalid ownership'));
		}
		$options = array('conditions' => array('Ownership.' . $this->Ownership->primaryKey => $id));
		$this->set('ownership', $this->Ownership->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ownership->create();
			if ($this->Ownership->save($this->request->data)) {
				$this->Session->setFlash(__('The ownership has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ownership could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ownership->exists($id)) {
			throw new NotFoundException(__('Invalid ownership'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ownership->save($this->request->data)) {
				$this->Session->setFlash(__('The ownership has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ownership could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ownership.' . $this->Ownership->primaryKey => $id));
			$this->request->data = $this->Ownership->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Ownership->id = $id;
		if (!$this->Ownership->exists()) {
			throw new NotFoundException(__('Invalid ownership'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Ownership->delete()) {
			$this->Session->setFlash(__('The ownership has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ownership could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
