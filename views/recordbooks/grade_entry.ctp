
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

<div class="row-fluid">
	<div class="span12">
		<div class="row-fluid">
			<div class="span3">
				<div class="wrapper">
					<h4 class='studname'>Student Name</h4>
				</div>
				<ul class="classlist">
					<?php for($i=1;$i<25;$i++): ?>
					<li class="student">Student Name</li>
					<?php endfor; ?>
				</ul>
			</div>
			<div class="span9 record">
				<div class='margin-top-3px'>
					<table id="recordbook" class="simple-sheet table table-striped table-bordered  table-condensed records">
						<thead class="header">
							<tr>
								<th class="text-center"><a>Head</a></th>
								<th class="text-center"><a>Q2</a></th>
								<th class="text-center"><a>Q3</a></th>
								<th class="text-center"><a>Q4</a></th>
								<th class="text-center"><a>Q5</a></th>
								<th class="text-center"><a>Quiz (15%)</a></th>
								<th class="text-center"><a>HW1</a></th>
								<th class="text-center"><a>HW2</a></th>
								<th class="text-center"><a>HW3</a></th>
								<th class="text-center"><a>Homework (15%)</a></th>
								<th class="text-center"><a>Exam</a></th>
								<th class="text-center"><a>Exam (30%)</a></th>
								<th class="text-center"><a>Project</a></th>
								<th class="text-center"><a>Project (40%)</a></th>
								<th class="text-center"><a>Total (100%)</a></th>
							</tr>
						</thead>
						<tbody id="recordbook_tbody">
							<?php for($x=1;$x<=23;$x++):?>
							<tr>
								<td><span class="cell"></span></td>
								<td><span class="cell"></span></td>
								<td><span class="cell"></span></td>
								<td><span class="cell"></span></td>
								<td><span class="cell"></span></td>
								<td><span class="cell"></span></td>
								<td><span class="cell"></span></td>
								<td><span class="cell"></span></td>
								<td><span class="cell"></span></td>
								<td><span class="cell"></span></td>
								<td><span class="cell"></span></td>
								<td><span class="cell"></span></td>
								<td><span class="cell"></span></td>
								<td><span class="cell"></span></td>
								<td><span class="cell"></span></td>
							</tr>
							<?php endfor;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $this->Html->css(array('recordbook/gradeentry'));?>
<?php echo $this->Html->script(array('biz/gradeentry','ser/ser'),array('inline'=>false));?>