<div class="span4">
	  <h2>Side bar</h2>

	  <?php $categories = $this->requestAction(array ('controller'=>'categories','action'=>'sidebar','admin'=>false)) ;?>
<ul>
    <?php foreach($categories as $k=>$v): $v = current($v); ?>
	<li><?php echo  $this->Html->link($v['name'].'('.$v['post_count'].')',$v['link']) ;?> </li>
	<?php endforeach ;?>
</ul>

   </div>