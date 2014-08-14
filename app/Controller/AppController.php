<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array('DebugKit.Toolbar', 'Session','RequestHandler',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'pages',
                'action' => 'display'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            'authorize' => array('Controller'),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Simple'
                )
            )
        )
    );
    
    public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['role_id'])) {
            return true;
        }
        // return false;
    }
    
    
    var $helpers = array('Html', 'Form');
    
    /**
     * uploads files to the server
     * @params:
     * $folder = the folder to upload the files e.g. 'img/files'
     * $formdata = the array containing the form files
     * $itemId = id of the item (optional) will create a new sub folder
     * @return:
     * will return an array with the success of each file upload
     */
    function uploadFiles($folder, $formdata, $itemId = null) {
        //print_r($formdata);
        // echo "<br />";
        // echo $formdata['name'];
        // setup dir names absolute and relative
        $folder_url = WWW_ROOT . $folder;
        $rel_url = $folder;

        // create the folder if it does not exist
        if (!is_dir($folder_url)) {
            mkdir($folder_url);
        }

        // if itemId is set create an item folder
        if ($itemId) {
            // set new absolute folder
            $folder_url = WWW_ROOT . $folder . '/' . $itemId;
            // set new relative folder
            $rel_url = $folder . '/' . $itemId;
            // create directory
            if (!is_dir($folder_url)) {
                mkdir($folder_url);
            }
        }

        // list of permitted file types
        //http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types
        $permitted = array('application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf', 'application/x-rar-compressed', 'application/vnd.ms-powerpoint','application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'application/vnd.ms-excel', 'application/vnd.ms-excel.addin.macroenabled.12', 'application/vnd.ms-excel.addin.macroenabled.12','application/vnd.ms-excel.sheet.binary.macroenabled.12',
        'application/vnd.ms-excel.sheet.macroenabled.12','application/vnd.ms-excel.template.macroenabled.12', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'text/html', 'text/plain', 'text/rtf', 'text/csv',
        'image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/tiff', 
        'application/zip', 'audio/mpeg', 'audio/mpeg3', 
        'audio/x-mpeg-3', 'video/mpeg', 'video/mp4', 'video/quicktime', 'video/x-ms-wmv');

        // replace spaces with underscores
        $filename = str_replace(' ', '_', $formdata['name']);
        // assume filetype is false
        $typeOK = false;
        // check filetype is ok
        foreach ($permitted as $type) {
            if ($type == $formdata['type']) {
                $typeOK = true;
                break;
            }
        }
        // if file type ok upload the file
        if ($typeOK) {
            // switch based on error code
            switch($formdata['error']) {
                case 0 :
                    // create full filename
                    $full_url = $folder_url . '/' . $formdata['name'];
                    $url = $rel_url . '/' . $formdata['name'];
                    // upload the file - overwrite existing file
                    $success = move_uploaded_file($formdata['tmp_name'], $url);

                    // if upload was successful
                    if ($success) {
                        //save the filename of the file
                        $result['urls'][] = $formdata['name'];
                    } else {
                        $result['errors'][] = "Error uploaded " . $formdata['name'] . "Please try again.";
                    }
                    break;
                case 3 :
                    // an error occurred
                    $result['errors'][] = "Error uploading " . $formdata['name'] . " Please try again.";
                    break;
                default :
                    // an error occurred
                    $result['errors'][] = "System error uploading " . $formdata['name'] . "Contact webmaster.";
                    break;
            }
        } elseif ($formdata['error'] == 4) {
            // no file was selected for upload
            $result['nofiles'][] = "No file Selected";
        } else {
            // unacceptable file type
            $result['errors'][] = $formdata['name'] . " cannot be uploaded. Acceptable file types: gif, jpg, png.";
        }

        return $result;
    }
    
}
