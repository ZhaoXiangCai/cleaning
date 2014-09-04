<?php
App::uses('AppController', 'Controller');
/**
 * Commissions Controller
 *
 * @property Commission $Commission
 * @property PaginatorComponent $Paginator
 */
class CommissionsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');
    public $paginate = array('limit' => 25, 'order' => array('Commission.id' => 'desc'));

    /**
     * index method
     *
     * @return void
     */
    public function index() {

        $this -> Commission -> recursive = 0;
        $this -> Paginator -> settings = $this -> paginate;
        $this -> set('commissions', $this -> Paginator -> paginate());

    }

    public function usercommission($id = null) {
        $this -> Commission -> recursive = 0;
        $this -> Paginator -> settings = $this -> paginate;
        $this -> set('commissions', $this -> Paginator -> paginate('Commission', array('Commission.user_id = ' => $id)));
    }
    
    public function ordercommission($id = null) {
        $this -> Commission -> recursive = 0;
        $this -> Paginator -> settings = $this -> paginate;
        $this -> set('commissions', $this -> Paginator -> paginate('Commission', array('Commission.cleaning_order_id = ' => $id)));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this -> Commission -> exists($id)) {
            throw new NotFoundException(__('Invalid commission'));
        }
        $options = array('conditions' => array('Commission.' . $this -> Commission -> primaryKey => $id));
        $this -> set('commission', $this -> Commission -> find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this -> request -> is('post')) {
            $this -> Commission -> create();
            if ($this -> Commission -> save($this -> request -> data)) {
                $this -> Session -> setFlash(__('The commission has been saved.'));
                return $this -> redirect(array('action' => 'index'));
            } else {
                $this -> Session -> setFlash(__('The commission could not be saved. Please, try again.'));
            }
        }
        $users = $this -> Commission -> User -> find('list');
        $cleaningOrders = $this -> Commission -> CleaningOrder -> find('list');
        $this -> set(compact('users', 'cleaningOrders'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null,$userid = null) {
        if (!$this -> Commission -> exists($id)) {
            throw new NotFoundException(__('Invalid commission'));
        }
        if ($this -> request -> is(array('post', 'put'))) {

            if ($this -> Commission -> save($this -> request -> data, true, array('rate'))) {

                $this -> Session -> setFlash(__('The commission has been saved.'));

                if (is_null($userid)) {
                    return $this -> redirect(array('action' => 'index'));
                } else {
                    return $this -> redirect(array('action' => 'usercommission', $userid));
                }
            } else {
                $this -> Session -> setFlash(__('The commission could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Commission.' . $this -> Commission -> primaryKey => $id));
            $this -> request -> data = $this -> Commission -> find('first', $options);
        }
        $users = $this -> Commission -> User -> find('list');
        $cleaningOrders = $this -> Commission -> CleaningOrder -> find('list');
        $this -> set(compact('users', 'cleaningOrders'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this -> Commission -> id = $id;
        if (!$this -> Commission -> exists()) {
            throw new NotFoundException(__('Invalid commission'));
        }
        $this -> request -> allowMethod('post', 'delete');
        if ($this -> Commission -> delete()) {
            $this -> Session -> setFlash(__('The commission has been deleted.'));
        } else {
            $this -> Session -> setFlash(__('The commission could not be deleted. Please, try again.'));
        }
        return $this -> redirect(array('action' => 'index'));
    }

}
