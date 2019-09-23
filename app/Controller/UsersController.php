<?php

class UsersController extends AppController{

	function login(){
      if($this->request->is('post')){

      if($this->Auth->login()){
      	  return $this->redirect($this->Auth->redirect());
      }else{

      	$this->Session->setFlash("Votre login ou mot de passe invalide",'notif',array('type'=>'error'));
      }
	}
}

	function logout(){
		/*premier ecriture a verifier
		$this->Session->destroy();
		*/
		$this->Auth->logout();
        $this->Session->setFlash("Vous ête maintenant dèconnecté ",'notif');
        $this->redirect('/');
	}

	function addUser(){

	if (!empty($this->request->data)) { 
         $this->User->create($this->request->data); 
       $token = md5(time() . '-' . uniqid()); 
       if ($this->User->validates()) { 
        $this->User->create(array( 
         'username' => $this->request->data['User']['username'], 
         'password' => $this->Auth->password($this->request->data['User']['password']), 
         )); 
      $this->User->save(); 
     $this->Session->setFlash('Utilisateur ajouté !'); 
      } else { 
        $this->Session->setFlash('Erreur dans votre saisie !', 'flash', array('class' => 'error')); 
    } 
   } 
  } 
}