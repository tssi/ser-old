<?php echo $this->Html->css(array('recordbook/gradeentry'));?>
<div class="actions-container row-fluid animate">
	 <div id="profile-navigation" class="span12 nav-marginTop">		
		<div class="row-fluid">
			<div class="span2">
				<div class="module">
					<div class="module-wrap">
						<div class="module-name rawScores">
								<?php echo $this->Html->link( 'Grade Entry',
										'javascript:void()'
									);  ?>								
						</div>
					</div>
				</div>
			</div>
			<div class="span4">
				<div class="row-fluid">
					<div class="span5">
						<div class="btn-group">
							<button class="btn btn-medium">SCHOOL YEAR</button>
							<button class="btn btn-medium dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li>
									<div>
										<span>SY:</span>
										<select name="data[SY]" id="SY"  class="w80">
											<option value="">select</option>
											<option value="0">2012-2014</option>
											<option value="1">2013-2014</option>
										</select>
									</div>
								</li>
								<li>
									<div >
										<span>QTR:</span>
										<div class="btn-group" id="QTR">
											<button class="btn">1</button>
											<button class="btn">2</button>
											<button class="btn">3</button>
											<button class="btn">4</button>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="span4">						
						<div class="btn-group">
										<button class="btn btn-medium">SUBJECT</button>
										<button class="btn btn-medium dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
										</button>
							<ul class="dropdown-menu">
								<li>
									<!-- DROPDOWN -->
									<li><a href="#"> English</a></li>								
									<li><a href="#"> Math</a></li>	
									<li class="divider"></li>
									<li><a href="#"><i class="icon-plus"></i> Subject</a></li>
								</li>
								
							</ul>
						</div>
					</div>
						<div class="span3">
							<div class="btn-group">
								<button class="btn btn-medium">SECTION</button>
								<button class="btn btn-medium dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li>
										<!-- DROPDOWN -->	
										<li><a href="#" class='btn'><i class="icon-plus"></i> SECTION</a></li>
										<li><a>No section(s) find. Click to Add</a></li>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			<div class="pull-right text-right">
				<div class="nav-collapse collapse navbar-responsive-collapse">
						<a href="#" class=" btn dropdown-toggle" data-toggle="dropdown"><i class='icon-cog'></i> <b class="caret"></b></a>
						<ul class="dropdown-menu pull-left text-left">
								<li>
									<div>
										<span>SY:</span>
										<select name="data[SY]" id="SY"  class="w80">
											<option value="">select</option>
											<option value="0">2012-2014</option>
											<option value="1">2013-2014</option>
										</select>
									</div>
								</li>
								<li>
									<div >
										<span>QTR:</span>
										<div class="btn-group" id="QTR">
											<button class="btn">1</button>
											<button class="btn">2</button>
											<button class="btn">3</button>
											<button class="btn">4</button>
										</div>
									</div>
								</li>
							</ul>
					
				</div>
			</div>
			<div class="pull-right text-right">
				<div class="nav-collapse collapse navbar-responsive-collapse">
						<a href="#" class=" btn dropdown-toggle" data-toggle="dropdown"><i class='icon-save'></i> <b class="caret"></b></a>
						<!-- DROP DOWn -->
					
				</div>
			</div>
			<div class="pull-right text-right">
				<div class="nav-collapse collapse navbar-responsive-collapse">
						<a href="#" class=" btn dropdown-toggle" data-toggle="dropdown"><i class='icon-eye-open'></i> <b class="caret"></b></a>
						<ul class="dropdown-menu pull-left text-left">
								<li><a href="#"><input type='checkbox'>Raw Score</a></input></li>
								<li><a href="#"><input type='checkbox'>Quivalent</a></input></li>
								<li><a href="#"><input type='checkbox'>Summary</a></input></li>
						</ul>
						</li>
					
				</div>
			</div>

		</div>
	</div>
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
					<li class="student">John Derick Ramilo</li>
					<?php endfor; ?>
				</ul>
			</div>
	<div class="span9 record">
	<div class='datasheet'>
		<div class="datahead">
			<table class="table table-striped table-bordered  table-condensed records">
				<thead>
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
				<tbody>
					<?php for($i=1;$i<25;$i++): ?>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<?php endfor; ?>
				</tbody>
			</table>
		</div>
		<div class="datawrap">
		<div class="databody">
			<table class="table table-striped table-bordered  table-condensed records">
				<thead>
					<tr>
						<th class="text-center"><a>Q1</a></th>
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
				<tbody>
					<?php for($i=1;$i<25;$i++): ?>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>8</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<?php endfor; ?>
				</tbody>
			</table>
		</div>
		</div>

	</div>
	</div>
</div>
</div>