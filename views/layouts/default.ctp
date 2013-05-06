<!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php __('SAM'); ?>
			<?php echo $title_for_layout; ?>
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
  
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php
			echo $this->Html->meta('icon');
			echo $this->Html->css(array('bootstrap','pccr','simple','template','font-awesome','jquery_ui'));
			echo '<!--[if IE 7]>';
			echo $this->Html->css(array('font-awesome-ie7.min'));
			echo '<![endif]-->';
			echo $this->Html->css(array('profile/banner','profile/home','profile/submodule','profile/navigation','profile/modal','profile/form-canvas','profile/pagination'));
			echo $this->Html->css(array('card/info_card','effects/index'));
			echo $this->Html->css(array('ss/ssMetrics','ss/ssInterface'));
			echo $this->Html->css(array('joyride/joyride-2.0.3'));
			echo $this->Html->css(array('dataTable'));
			echo $this->Html->script(array('jquery','jquery.dataTables'));

		?>
		<style>
			.pBottom{
				padding-bottom:20px;
			}
		</style>

	</head>
	<body class="paper" >
	<!--Side Navigation-->
	<nav class="main-nav animate" id="main-nav">
		

		 <?php echo $this->Html->link( 	$this->Html->tag('i', '', array('class' => 'icon-home')).' '.
										$this->Html->tag('span', 'Home', array('class' => 'module-label')),
										array('controller'=>'pages','plugin'=>null,'action'=>'home'), array('escape' => false)
										);  ?>
		<?php echo $this->Html->link( 	$this->Html->tag('i', '', array('class' => 'icon-th-large')).' '.
										$this->Html->tag('span', 'Apps', array('class' => 'module-label')),
										array('controller'=>'pages','plugin'=>null,'action'=>'apps'), array('escape' => false)
										);  ?>	
		<?php echo $this->Html->link( 	$this->Html->tag('i', '', array('class' => 'icon-cogs')).' '.
										$this->Html->tag('span', 'Common Services', array('class' => 'module-label')),
										array('controller'=>'pages','plugin'=>null,'action'=>'services'), array('escape' => false)
										);  ?>										
		<?php echo $this->Html->link( 	$this->Html->tag('i', '', array('class' => 'icon-certificate')).' '.
										$this->Html->tag('span', 'Accounting and Finance', array('class' => 'module-label')),
										array('controller'=>'pages','plugin'=>null,'action'=>'finance'), array('escape' => false)
										);  ?>										
		<?php echo $this->Html->link( 	$this->Html->tag('i', '', array('class' => 'icon-exchange')).' '.
										$this->Html->tag('span', 'Disbursement', array('class' => 'module-label')),
										array('controller'=>'pages','plugin'=>null,'action'=>'disbursement'), array('escape' => false)
										);  ?>										
		<?php echo $this->Html->link( 	$this->Html->tag('i', '', array('class' => 'icon-folder-open')).' '.
										$this->Html->tag('span', 'File Management', array('class' => 'module-label')),
										array('controller'=>'pages','plugin'=>null,'action'=>'filemgt'), array('escape' => false)
										);  ?>										
		<?php echo $this->Html->link( 	$this->Html->tag('i', '', array('class' => 'icon-building')).' '.
										$this->Html->tag('span', 'Property Management', array('class' => 'module-label')),
										array('controller'=>'pages','plugin'=>null,'action'=>'propertymgt'), array('escape' => false)
										);  ?>	
	

		
	</nav>
		<div class="page-wrap animate">
			<!--Header-->
			<div class="header-container">
				<header class="main-header animate">
					<a href="#main-nav" class="open-menu " ><i class=" icon-reorder "></i></a>
					<a href="#" class="close-menu "><i class="icon-reorder"></i></a>
					<span class="simpilified-solution-header-inner ">Simplified Accounting Module</span>
					
				</header>	
			</div>
			<!--CONTENT-->
			<div class="content">  
				<div class="content-background"></div>
				<?php echo $content_for_layout; ?>
				<!--<div class="footer-container">
						<footer>The SimplifiedSolutions, Inc. &copy; <?php echo date('Y'); ?> </footer>
					</div>-->
				<?php
					//echo $this->element('sql_dump'); 
					echo $this->Html->script(array('bootstrap','jqueryForm', 'jquery_ui','navigation','intents','utils/money' ));
					echo $this->Html->script(array('joyride/jquery.joyride-2.0.3'));
					echo $this->Html->script(array('ui/uiInputNumeric'));

					echo $scripts_for_layout;
				?>
				<!-- Start the Joyride Engine  
				<script charset="UTF-8">	
				  $(window).load(function() {
					$('#joyRideTipContent').joyride({postStepCallback : function (index, tip) {
					  if (index == 2) {
						$(this).joyride('set_li', false, 1);
					  }
					}});
				  });
				  

				</script>
				-->
				<!--END CONTENT-->

		
				<?php echo $this->Html->script('simplyconnect',array('id'=>'smplycnnct')); ?>


				</div>
			</div>
		</div>
	</body>
</html>