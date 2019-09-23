<h1>Ajouter un utilisateur</h1> 
<?php echo $this->Form->create('User'); ?> 
<?php echo $this->Form->input('username',array('label'=>'Nom d\'utilisateur')); ?> 
<?php echo $this->Form->input('password',array('label'=>'Mot de passe')); ?> 

<?php echo $this->Form->input('role',array('label'=>'Role de l\'utilisateur')); ?> 
<?php echo $this->Form->end('Ajouter'); ?>