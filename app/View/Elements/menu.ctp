<?php $pages = $this->requestAction(array ('controller'=>'pages','action'=>'menu')) ;?>
<ul class="nav">
    <?php foreach($pages as $k=>$v): $v = current($v); ?>
	<li><?php echo $this->Html->link($v['name'],$v['link']) ;?></li>
	<?php endforeach; ?>
	<li><?php echo $this->Html->link('News',array('controller'=>'posts','action'=>'index')) ;?></li>
</ul>