<?php

  class MediasController extends AppController{

  	public $components = array('Img');

  	public function beforeFilter(){
  		parent::beforeFilter();
  		$this->layout='modal';
  	}

  	function admin_index($post_id){
  		if($this->request->is('post')){

  			$data=$this->request->data['Media'];
  			if(isset($data['url'])){
  				//selon le forum a cause de la # de version cake faut changé
  				//$this->redirect(array('action'=>'show','?class=&alt=&src='.urlencode($data['url'])));
  				$this->redirect(array('action'=>'show','?' =>array('class'=>'','alt'=>'','src'=>urlencode($data['url']))));
  			}
  			//pour creer des dossiers de stockage organisé par date
  			$dir=IMAGES.date('Y');
  			if(!file_exists($dir))
  				mkdir($dir,0777);
  			$dir .=DS.date('m');
  			if(!file_exists($dir))
  				mkdir($dir,0777);
  			// pr normaliser le nom des image a uplaoder
  			$f=explode('.',$data['file']['name']);
  			/* ecriture normal mais pr facilité la savgarde en utilise l ecriture 2
  			$ext=end($f);
  			*/
   			$ext='.'.end($f);
  			//debug($ext);
  			$filename=Inflector::slug(implode('.',array_slice($f,0,-1)),'-');
  			//sauvgarde en  base de données
  			 $success=$this->Media->save(array(
  				'name'=>$data['name'],
  				/* si on utilise l ecriture 1 ds $ext
                'url' =>date('Y').'/'.date('m').'/'.$filename.'.'.$ext))
                */
  			'url' =>date('Y').'/'.date('m').'/'.$filename.$ext,
  			'post_id' => $post_id
  				));

     //  $success=true;
  			if($success){
  				move_uploaded_file($data['file']['tmp_name'], $dir.DS.$filename.$ext);
  				foreach (Configure::read('Media.formats') as $k=>$v) {
  					//$prefix = substr($k,0,1);
  					$prefix = $k;
  					$size = explode('x',$v);
  					$this->Img->crop( $dir.DS.$filename.$ext,$dir.DS.$filename.'_'.$prefix.'.jpg', $size[0],$size[1]);

  				}

  			}else{
  				$this->Session->setFlash("l'image n'est pas au bon format","notif",array('type'=>'error'));
  			}

  		}
  		$d['medias'] = $this->Media->find('all',array(
  			'conditions'=>array('post_id'=> $post_id)
  			));
  		$d['formats']= Configure::read('Media.formats');
     $this->set($d);
  	}
    
    function admin_show($id = null,$format =''){
      $d=array();
      if($this->request->is('post')){
      	$this->set($this->request->data['Media']);
      	$this->layout = false;
      	$this->render('tinymce');
      	return;
      }
      if($id){
      	$this->Media->id=$id;

      	$media=current($this->Media->read());
      	debug($media);
      	$d['src']= Router::url('/img/'.$media['url'.$format]);
      	$d['alt']= $media['name'];
      	$d['class']= 'alingLeft';


      }else{
      	$d = $this->request->query;
      	$d['src']= urldecode($d['src']);

      }
      $this->set($d);
    }

  	function admin_delete($id){
  		
  		//unlink(IMAGES.DS.$file);
  		$this->Media->delete($id);
  		$this->Session->setFlash("l'image a bien été supprimmée","notif",array('type'=>'success'));
  		$this->redirect($this->referer());
  		
  	}
  }