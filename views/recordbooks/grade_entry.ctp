
<div class="navbar actions-container">
	<div class="navbar-inner">
		<div class="container">
			  <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </a>
			  <a class="brand" href="#">Grade Entry</a>
			  <div class="nav-collapse collapse navbar-responsive-collapse">
				<ul class="nav">
				 <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon icon-filter"></i> <b class="caret"></b></a>
					<ul class="dropdown-menu" id="sy_period">
					   <li class="nav-header">
						School Year
					   </li>
						<li class="sy"><a href="#" data-value="2012"><i class="icon icon-check-empty"></i> 2012-2013</a></li>
					  <li class="sy"><a href="#" data-value="2013"><i class="icon icon-check-empty"></i>  2013-2014</a></li>
					   <li class="divider"></li>
					   <li class="nav-header">Grading Period</li>
					 <li class="period"><a href="#" data-value="1"><i class="icon icon-check-empty"></i> First</a></li>
					  <li class="period"><a href="#" data-value="2"><i class="icon icon-check-empty"></i>  Second</a></li>
					  <li class="period"><a href="#" data-value="3"><i class="icon icon-check-empty"></i> Third</a></li>
					  <li class="period"><a href="#" data-value="4"><i class="icon icon-check-empty"></i> Fourth</a></li>
					</ul>
				  </li>
				   <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon icon-book"></i> <b class="caret"></b></a>
					<ul class="dropdown-menu" id="subjects">
					</ul>
				  </li>
				</ul>
				<ul class="nav pull-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon icon-eye-open"></i> <b class="caret"></b></a>
						<ul class="dropdown-menu" id="pre-action">
							<li class="nav-header">Preview</li>
							<li><a href="#"><i class="icon icon-check-empty"></i>Rawscore</a></li>
							<li><a href="#"><i class="icon icon-check-empty"></i>Equivalent</a></li>
							<li><a href="#"><i class="icon icon-check-empty"></i>Summary</a></li>
							<li><a href="#"><i class="icon icon-check-empty"></i>Overall</a></li>
						</ul>
					</li>
					<li><a href="#"><i class="icon icon-print"></i></a></li>
					<li><a href="#"><i class="icon icon-save"></i></a></li>
				</ul>
		  </div><!-- /.nav-collapse -->
		</div>
	</div><!-- /navbar-inner -->
</div>

<div class="content">
	<div id="recordbook" class="simple-sheet handsontable"></div>
</div>
<?php echo $this->Html->css(array('recordbook/gradeentry','handsontable/jquery.handsontable.full','recordbook/simple-sheet'));?>
<?php echo $this->Html->script(array('biz/gradeentry','ser/ser','handsontable/jquery.handsontable.full'),array('inline'=>false));?>