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

//App::uses('Controller', 'Controller');

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
 
	/*public $components = array(
    'DebugKit.Toolbar'
    );
   */
public $helpers= array('Html','Text','Form','Session');
public $components =array('Session','Auth');

    function beforeFilter(){
           //partie authentification
        $this->Auth->loginAction=array('controller'=>'users','action'=>'login','admin'=>false);
        //$this->Auth->authenticate=array('Form');
          $this->Auth->authorize = array('Controller');


        if(!isset($this->request->params['prefix'])){
                      $this->Auth->allow();
                         }
    	 // $this->layout = 'admin';
    	if (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin') {
            $this->layout = 'admin';
    	}
        
    }

    function isAuthorized($user) {

            if (!isset($this->request->params['prefix']))  {
            return true;
            debug($user);
            debug($this->request);
               }

          $roles=array(
             'admin'=>10,
             'user'=>5
            );
            if(isset($roles[$this->request->params['prefix']])){
            $lvlAction =$this->request->params['prefix'];
            $lvlUser =$roles[$user['role']];
            if($lvlUser>= $lvlAction){
                return true;
            }else{

                return false;
            }
          }
            return false;
     }  
    
}

