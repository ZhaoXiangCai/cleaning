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

    var $uses = array('CleaningOrder', 'Client');
    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this -> CleaningOrder -> recursive = 0;
        $this -> set('cleaningOrders', $this -> Paginator -> paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this -> CleaningOrder -> exists($id)) {
            throw new NotFoundException(__('Invalid cleaning order'));
        }
        $options = array('conditions' => array('CleaningOrder.' . $this -> CleaningOrder -> primaryKey => $id));
        $this -> set('cleaningOrder', $this -> CleaningOrder -> find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($clientId = null) {
        if (is_null($clientId)) {
            if ($this -> request -> is('post')) {
                $this -> CleaningOrder -> create();
                if ($this -> CleaningOrder -> save($this -> request -> data)) {
                    $this -> Session -> setFlash(__('The cleaning order has been saved.'));
                    return $this -> redirect(array('action' => 'index'));
                } else {
                    $this -> Session -> setFlash(__('The cleaning order could not be saved. Please, try again.'));
                }
            }
            $teams = $this -> CleaningOrder -> Team -> find('list');
            $colors = $this -> CleaningOrder -> Color -> find('list');
            $clients = $this -> CleaningOrder -> Client -> find('list');
            $companies = $this -> CleaningOrder -> Company -> find('list', array('fields' => array('brand_url')));
            $services = $this -> CleaningOrder -> Service -> find('list');
            $users = $this -> CleaningOrder -> Added_by -> find('list', array('fields' => array('username')));
            $orderStatuses = $this -> CleaningOrder -> OrderStatus -> find('list');
            $this -> set(compact('teams','colors', 'clients', 'companies', 'services', 'orderStatuses', 'users'));
            // $this->set('users', $this->CleaningOrder->Added_by->find('list'));
        } else {
            if ($this -> request -> is('post')) {
                $this -> CleaningOrder -> create();
                if ($this -> CleaningOrder -> save($this -> request -> data)) {
                    $this -> Session -> setFlash(__('The cleaning order has been saved.'));
                    return $this -> redirect(array('action' => 'index'));
                } else {
                    $this -> Session -> setFlash(__('The cleaning order could not be saved. Please, try again.'));
                }
            }
            $this->CleaningOrder->Client->id = $clientId;
            $this->Client->id = $clientId;
            $clients = $this->Client->find('first',array('conditions'=>array('Client.id'=>$clientId),'fields'=>array('Client.name')));           
            $tempArray = array($clients['Client']['name']);
            $clients = $tempArray;
            $teams = $this -> CleaningOrder -> Team -> find('list');
            $colors = $this -> CleaningOrder -> Color -> find('list');
            //$clients = $this -> CleaningOrder -> Client -> find('list');
            $companies = $this -> CleaningOrder -> Company -> find('list', array('fields' => array('brand_url')));
            $services = $this -> CleaningOrder -> Service -> find('list');
            $users = $this -> CleaningOrder -> Added_by -> find('list', array('fields' => array('username')));
            $orderStatuses = $this -> CleaningOrder -> OrderStatus -> find('list');
            $this -> set(compact('teams','colors', 'clients','companies', 'services', 'orderStatuses', 'users'));
            // $this->set('users', $this->CleaningOrder->Added_by->find('list'));
        }

    }

    public function preadd() {
        $this -> Client -> recursive = 0;
        $this -> set('clients', $this -> Client -> find('all'));

    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this -> CleaningOrder -> exists($id)) {
            throw new NotFoundException(__('Invalid cleaning order'));
        }
        if ($this -> request -> is(array('post', 'put'))) {
            if ($this -> CleaningOrder -> save($this -> request -> data)) {
                $this -> Session -> setFlash(__('The cleaning order has been saved.'));
                return $this -> redirect(array('action' => 'index'));
            } else {
                $this -> Session -> setFlash(__('The cleaning order could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('CleaningOrder.' . $this -> CleaningOrder -> primaryKey => $id));
            $this -> request -> data = $this -> CleaningOrder -> find('first', $options);
        }
        $teams = $this -> CleaningOrder -> Team -> find('list');
        $clients = $this -> CleaningOrder -> Client -> find('list');
        $companies = $this -> CleaningOrder -> Company -> find('list', array('fields' => array('brand_url')));
        $services = $this -> CleaningOrder -> Service -> find('list');
        $users = $this -> CleaningOrder -> Added_by -> find('list', array('fields' => array('username'), ));
        $orderStatuses = $this -> CleaningOrder -> OrderStatus -> find('list');
        $this -> set(compact('teams', 'clients', 'companies', 'services', 'orderStatuses', 'users'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this -> CleaningOrder -> id = $id;
        if (!$this -> CleaningOrder -> exists()) {
            throw new NotFoundException(__('Invalid cleaning order'));
        }
        $this -> request -> allowMethod('post', 'delete');
        if ($this -> CleaningOrder -> delete()) {
            $this -> Session -> setFlash(__('The cleaning order has been deleted.'));
        } else {
            $this -> Session -> setFlash(__('The cleaning order could not be deleted. Please, try again.'));
        }
        return $this -> redirect(array('action' => 'index'));
    }

    public function calendar($userid = null){
        if(is_null($userid)){
            $tasks = $this->CleaningOrder->find('all');
            $this -> set('tasks',$tasks);
        }
    }
}
