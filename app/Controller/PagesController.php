<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array('CleaningOrder');

    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     * @throws NotFoundException When the view file could not be found
     *	or MissingViewException in debug mode.
     */
    public function display() {
        if ($this -> Auth -> user('role_id') != '3') {
            $this -> set('numofclients', $this -> getnumofclients());

            $this -> set('numofteams', $this -> getnumofteams());
            $this -> set('numofunpaid', $this -> getnumofunpaid());
            $this -> set('numofupcoming', $this -> getnumofupcoming());
        } else {
            $this -> set('orders', $this -> getsevendaysorder());
        }

        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this -> redirect('/');
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this -> set(compact('page', 'subpage', 'title_for_layout'));

        try {
            $this -> render(implode('/', $path));
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    public function getnumofclients() {
        $this -> loadModel('Client');
        $result = $this -> Client -> query("select count(*) from cleaning.clients");
        return $result[0][0]['count(*)'];
    }

    public function getnumofteams() {
        $this -> loadModel('Team');
        $result = $this -> Team -> query("select count(*) from cleaning.teams");
        return $result[0][0]['count(*)'];
    }

    public function getnumofunpaid() {
        $this -> loadModel('OrderStatusesCleaningOrder');
        $result = $this -> OrderStatusesCleaningOrder -> query("select count(*) from cleaning.order_statuses_cleaning_orders c, cleaning.order_statuses o 
                                                            where c.order_status_id = o.id and o.name like 'Not-Paid'");
        return $result[0][0]['count(*)'];
    }

    public function getnumofupcoming() {
        $this -> loadModel('CleaningOrder');
        $result = $this -> CleaningOrder -> query("select count(*) from cleaning.cleaning_orders where appointment_time_from > NOW()");
        return $result[0][0]['count(*)'];
    }
    
    public function getsevendaysorder(){
        $this -> loadModel('CleaningOrder');
        $userid = $this->Auth->user('id');
        //debug($id);
        $result = $this -> CleaningOrder -> query("select teams.id from teams,users where teams.id = users.team_id and users.id = $userid");
        $teamid = $result[0]['teams']['id'];
        $result = $this -> CleaningOrder -> query("select appointment_time_from,order_price,rate,clients.address from clients,users,commisions,cleaning_orders where users.id = commisions.user_id 
                                                        and cleaning_orders.id = commisions.cleaning_order_id
                                                        and clients.id = cleaning_orders.client_id
                                                        and users.id = $userid
                                                        and DATEDIFF(NOW(),appointment_time_from)>7");
        return $result;
    }

}
