<h3>Insérer l'image</h3>

<img src="<?php echo $src; ?>" style="max-width:200px;" >

<?php echo  $this->Form->create('Media');?>
   <?php echo $this->Form->input('alt',array('label'=>"Description de l'image","value"=>$alt));?>
   <?php echo $this->Form->input('src',array('label'=>"chemin de l'image","value"=>$src));?>

    <?php echo $this->Form->input('class',array('legend'=>"Alignement","options"=>array(

                  'alignLeft'=>'Aligner a gauche',
                   'alignCenter'=>'Aligner au centre',
                   'alignRight'=>'Aligner a droite'
                ),'type'=>'radio','value'=>$class)); ?>

            

    

<?php echo  $this->Form->end('Insere dans ma page');?>