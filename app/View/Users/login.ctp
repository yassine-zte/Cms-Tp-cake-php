<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->input('username',array('label'=>"login")) ;?>
<?php echo $this->Form->input('password',array('label'=>"Mot de passe")) ;?>
<?php echo $this->Form->end('se conecter'); ?>