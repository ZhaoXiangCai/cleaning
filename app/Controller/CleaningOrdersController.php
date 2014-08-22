<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
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
        
    public function getpics($id = null){
        $dir = new Folder('./img/orders/');
        $dir->cd($id);
        $files = $dir->find('.*\.(png|jpeg|jpg|gif)');
        return $files;
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
        $this->loadModel('Comment');
        $this->loadModel('CommentType');
        $this->set('comments',$this->Comment->find('all',array('conditions'=>array('Comment.cleaning_order_id'=>$id), 'order'=>'Comment.created DESC')));
        $options = array('conditions' => array('CleaningOrder.' . $this -> CleaningOrder -> primaryKey => $id));
        $this -> set('cleaningOrder', $this -> CleaningOrder -> find('first', $options));
        $this -> set('users', $this -> CleaningOrder -> Added_by -> find('list', array('fields' => array('username'))));
        $this -> set('commentTypes',$this->CommentType->find('list'));
                
        // $pics = getpics();
        $pics = $this->getpics($id);
        debug($pics);
        $this -> set('pics',$pics);
        $this -> set('id',$id);
    }



    /**
     * add method
     *
     * @return void
     */
    public function add($clientId = null) {
        $this->loadModel('User');
        $this->loadModel('Commission');
        $this->loadModel('Client');
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
            
            $colors = $this -> CleaningOrder -> Color -> find('list',array('order'=>'name ASC'));
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
                $this -> request -> data['CleaningOrder']['client_id'] = $clientId;
                if ($this -> CleaningOrder -> save($this -> request -> data)) {
                    $users = $this->User->query("select id from users where team_id = ".$this -> request -> data['CleaningOrder']['team_id']);
                    foreach($users as $user){
                        $this->Commission->create();
                        if($this->Commission->save(array(
                        'user_id'=>$user['users']['id'],
                        'cleaning_order_id'=>$this->CleaningOrder->getLastInsertId(),
                        'rate'=>0.1
                        ))){
                            //$this -> Session -> setFlash(__('The commissions have been saved.'));
                        }else{
                            //$this -> Session -> setFlash(__('The commissions could not been saved.'));
                        }
                    }
                    $this -> Session -> setFlash(__('The cleaning order has been saved.'));
                    return $this -> redirect(array('action' => 'index'));
                } else {
                    $this -> Session -> setFlash(__('The cleaning order could not be saved. Please, try again.'));
                }
            }
            $this->CleaningOrder->Client->id = $clientId;
            $this->Client->id = $clientId;
            $addressesClient = $this->CleaningOrder->query("select address from clients where id=".$clientId);
            $clients = $this->Client->find('first',array('conditions'=>array('Client.id'=>$clientId),'fields'=>array('Client.name')));           
            $tempArray = array($clients['Client']['name']);
            $clients = $tempArray;
            $teams = $this -> CleaningOrder -> Team -> find('list');
            $colors = $this -> CleaningOrder -> Color -> find('list',array('order'=>'name ASC'));
            //$clients = $this -> CleaningOrder -> Client -> find('list');
            $companies = $this -> CleaningOrder -> Company -> find('list', array('fields' => array('brand_url')));
            $services = $this -> CleaningOrder -> Service -> find('list');
            $users = $this -> CleaningOrder -> Added_by -> find('list', array('fields' => array('username')));
            $orderStatuses = $this -> CleaningOrder -> OrderStatus -> find('list');
            $this -> set(compact('addressesClient','teams','colors', 'clients','companies', 'services', 'orderStatuses', 'users'));
            
            // $this->set('users', $this->CleaningOrder->Added_by->find('list'));
            
            
        }

    }

    public function addimage($id = null){
        if ($this -> request -> is('post')) {
            $fileOK = $this -> uploadFiles('img/orders/'.$id.'/', $this -> data['CleaningOrder']['order_pic']);
            return $this -> redirect(array('action' => 'view',$id));
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
        $colors = $this -> CleaningOrder -> Color -> find('list',array('order'=>'name ASC'));
        $clients = $this -> CleaningOrder -> Client -> find('list');
        $companies = $this -> CleaningOrder -> Company -> find('list', array('fields' => array('brand_url')));
        $services = $this -> CleaningOrder -> Service -> find('list');
        $users = $this -> CleaningOrder -> Added_by -> find('list', array('fields' => array('username'), ));
        $orderStatuses = $this -> CleaningOrder -> OrderStatus -> find('list');
        $this -> set(compact('teams', 'colors', 'clients', 'companies', 'services', 'orderStatuses', 'users'));
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

    public function getlastsevendays($userid = null){
        //get team id
        echo "sevendays";
        // $teamid = $this -> query("select team.id from team,user where team.id = user.team_id");
        //debug($teamid);
    }
}
