<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml : lang="fr" lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title_for_layout ; ?></title>
    <link rel="stylesheet/less" href="<?php echo $this->Html->url('/css/bootstrap.less') ;?>">
    <?php echo $this->Html->script('less.js');?>
    <?php echo $scripts_for_layout ;?>

    <!-- Bootstrap -->
    <!--<link href="" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
       
  <body>
    <h1></h1>
 <div class="topbar">
              <div class="topbar-inner">
                 <div class="container">

                    <h3><a href="#">Administration</a></h3>
                    <ul class="menu">
                   <li>
                   <?php echo $this->Html->link("Pages",array('action'=>'index','controller'=>'pages')) ;?>
                     
                   </li>
                   <li>
                   <?php echo $this->Html->link("Articles",array('action'=>'index','controller'=>'posts')) ;?>
                     
                   </li>
                    <li>
                   <?php echo $this->Html->link("Categories",array('action'=>'index','controller'=>'categories')) ;?>
                     
                   </li>
                   <li><?php echo $this->Html->link("voir le site ",'/') ;?></li>
                   <li><?php echo $this->Html->link("Se dèconnecter",array('controller'=>'users','action'=>'logout','admin'=>false)) ;?></li>
                 </ul>
             </div>
          </div>
        </div>
      
      <div class="container">
   <?php echo $this->Session->flash('flash') ;?>
      <?php echo $content_for_layout ;?>
      </div>
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php echo $this->element('sql_dump');?>
  </body>
  <script type="text/JavaScript" 
    src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="js/bootstrap.min.js"></script>-->
    <?php echo $this->Html->script('admin');?>
    <?php echo $scripts_for_layout ;?>
</html>