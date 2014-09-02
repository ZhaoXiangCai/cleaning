
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>Cleaning CRM</title>
		<!-- Bootstrap core CSS -->

		<!-- Custom styles for this template -->

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<?php
        echo $this -> Html -> script(array('jquery-1.8.0.min', 'jquery-ui-1.8.23.custom.min','bootstrap.js,docs.min'));
        echo $this -> Html -> meta('icon');

        echo $this -> Html -> css('cake.generic');
        echo $this -> Html -> css('bootstrap');
        echo $this -> Html -> css('bootstrap-theme');
        echo $this -> Html -> css('dashboard');

        echo $this -> fetch('meta');
        echo $this -> fetch('css');
        echo $this -> fetch('script');
    ?>
	</head>
	<body>

		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Cleaning CRM</a>
				</div>
				<?php if ($this->Session->read('Auth.User')){ ?>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<?php echo $this -> Html -> link('Orders', array('controller' => 'cleaningorders', 'action' => 'index')); ?>
						</li>
						<?php if (AuthComponent::user('role_id')!=3) { ?>
						<li>
							<?php echo $this -> Html -> link('Clients', array('controller' => 'clients', 'action' => 'index')); ?>
						</li>
						<li>
							<?php echo $this -> Html -> link('Teams', array('controller' => 'teams', 'action' => 'index')); ?>
						</li>
						<?php } ?>
						<?php if (AuthComponent::user('role_id')==1) { ?>
						<li>
							<?php echo $this -> Html -> link('User', array('controller' => 'users', 'action' => 'index')); ?>
						</li>
						<?php } ?>
						<li>
                            <?php echo $this -> Html -> link('Log out', array('controller' => 'users', 'action' => 'logout')); ?>
                        </li>
					</ul>
				</div>
				<?php } ?>
			</div>
		</div>


    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul>Company Logo
              <img src="..." class="img-responsive" alt="Responsive image">
          </ul>
          <ul class="nav nav-sidebar">
            <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='display') )?'active' :'inactive' ?>">
                <?php echo $this -> Html -> link('Dashboard', array('controller' => 'pages', 'action' => 'display')); ?></li>
          </ul>
          <?php if($this->Session->read('Auth.User')&&AuthComponent::user('role_id')!=3){ ?>
          <ul class="nav nav-sidebar">
            <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='preadd') )?'active' :'inactive' ?>">
                <?php echo $this -> Html -> link('New Order', array('controller' => 'cleaningorders', 'action' => 'preadd')); ?></li>
          </ul>
          <?php } ?>
          <ul class="nav nav-sidebar">
            <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='calendar') )?'active' :'inactive' ?>">
                <?php echo $this -> Html -> link('Calendar', array('controller' => 'cleaningorders', 'action' => 'calendar')); ?></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='summary') )?'active' :'inactive' ?>">
                <?php echo $this -> Html -> link('Summary', array('controller' => 'cleaningorders', 'action' => 'summary')); ?></li>

          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php echo $this -> fetch('content'); ?>
      </div>
    </div>
    <?php //echo $this -> fetch('content'); ?>
</body>
			
<!-- 
		<div id="footer">
			<?php echo $this -> Html -> link($this -> Html -> image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')); ?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div> -->

		<!-- <?php echo $this -> element('sql_dump'); ?> -->
	</body>
</html>
