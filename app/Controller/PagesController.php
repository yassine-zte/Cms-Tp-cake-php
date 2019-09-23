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

//App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {
/*
/**
 * This controller does not use a model
 *
 * @var array
 */
//	public $uses = array();
/*
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */

/*	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
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
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}*/

  public $uses = array('Post');


  /**
  * RequestAction , permet de voir la liste des contenu pour le menu 
  **/

	function menu(){
		$pages = $this->Post->find('all',array(
			'conditions' => array('type'=>'page','online'=>1),
			'fields'     => array('id','slug','name','type')
			));
		return $pages;
	}


	/**
	*Permet d'afficher une page
	**/

	function show($id = null,$slug = null){
		if(!$id)
              throw new NotFoundException('Aucune page ne corespond a cet ID ');
		$page = $this->Post->find('first',array(

			'conditions'=>array('id'=>$id,'type'=>'page')
			));
		if (empty($page)) 
			throw new NotFoundException('Aucune page ne corespond a cet ID ');
		if($slug != $page['Post']['slug'])

			 $this->redirect($page['Post']['link'],301);
            
		$d['page'] = current($page);
		$this->set($d);

		
		}

		/**
		*
		**/
	function admin_index(){
		//$this->layout = 'admin';
		//$this->paginate =array('Post'=>array('limit'=> 1));
		$d['pages']=$this->Paginate('Post',array('type'=>'page','online >=0'));
        $this->set($d);
	}

	function admin_delete($id){
		$this->Session->setFlash('La page a bien été supprimée','notif');
		//$this->Session->setFlash('La page non supprimée','notif',array('type'=>'error'));

		 $this->Post->delete($id);
	     $this->redirect($this->referer());
	
		}	

		function admin_edit($id = null){
			if($this->request->is('put') || $this->request->is('post') ){
				if($this->Post->save($this->request->data)){

				$this->Session->setFlash('le contenu a bien été modifié','notif');
				$this->redirect(array('action'=>'index'));	
				}
				}elseif($id){
					
					$this->Post->id=$id;
			       $this->request->data=$this->Post->read();

				}else{
					$this->request->data=$this->Post->getDraft('page');
				}
				
			}
			
		
}
