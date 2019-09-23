<div class="row">
<div class="span12">
<h1>Blog</h1>

<?php foreach ($posts as $k => $v): $v=current($v) ?>
	<h2><?php echo $v['name']; ?></h2>
	<h2><?php echo $this->Text->truncate($v['content'],100,array('exact'=>false,'html'=>true)); ?></h2>
	<a href="<?php echo $this->Html->url($v['link']) ;?>"class="btn">Lire la suite</a>
	<div class="cb"></div>
<?php endforeach ?></div>

<?php echo $this->element('sidebar');?>
</div>
<?php echo $this->Paginator->numbers() ;?>