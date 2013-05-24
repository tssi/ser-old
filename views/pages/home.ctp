
			<div class="navbar actions-container hide-mobile" style="margin-bottom:0px">
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
                        <ul class="dropdown-menu">
                           <li class="nav-header">
							School Year
						   </li>
						    <li><a href="#"><i class="icon icon-check"></i> 2012-2013</a></li>
                          <li><a href="#"><i class="icon icon-check-empty"></i>  2013-2014</a></li>
						   <li class="divider"></li>
						   <li class="nav-header">Grading Period</li>
                         <li><a href="#"><i class="icon icon-check"></i> First</a></li>
                          <li><a href="#"><i class="icon icon-check-empty"></i>  Second</a></li>
                          <li><a href="#"><i class="icon icon-check-empty"></i> Third</a></li>
                          <li><a href="#"><i class="icon icon-check-empty"></i> Fourth</a></li>
                        </ul>
                      </li>
					   <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon icon-book"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
							<li class="nav-header">Grade 5 Filipino</li>
                          <li class="active"><a href="#">Justice</a></li>
                          <li><a href="#">Hope</a></li>
						  <li class="divider"></li>
						  <li class="nav-header">Grade 6 Filipino</li>
                          <li><a href="#">Diamond</a></li>
                          <li><a href="#">Pearl</a></li>
						  <li class="divider"></li>
                          <li><a href="#"><i class="icon icon-plus"></i> Recordbook</a></li>
                        </ul>
                      </li>
                    </ul>
                    <ul class="nav pull-right">
                     
                     
					   <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon icon-eye-open"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
						<li class="nav-header">Preview</li>
                         <li><a href="#"><i class="icon icon-check"></i> Rawscore</a></li>
                          <li><a href="#"><i class="icon icon-check-empty"></i>  Equivalent</a></li>
                          <li><a href="#"><i class="icon icon-check-empty"></i> Summary</a></li>
                          <li><a href="#"><i class="icon icon-check-empty"></i> Overall</a></li>
                        </ul>
                      </li>
					  
					   <li><a href="#"><i class="icon icon-print"></i></a></li>
					   <li><a href="#"><i class="icon icon-save"></i></a></li>
                    </ul>
                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div>


<link rel="stylesheet" media="screen" href="/jquery-handsontable/dist/jquery.handsontable.full.css">
<?php echo $this->Html->css('recordbook/simple-sheet'); ?>
<div class="content" style="padding:0px">
<div id="dataTable" style="overflow: visible;" class="handsontable simple-sheet " ></div>

</div>
<script src="/jquery-handsontable/dist/jquery.handsontable.full.js"></script>
<script>
var maxed = false
  , resizeTimeout
  , availableWidth
  , availableHeight
  , $window = $(window)
  , $example1 = $('#dataTable');
  
function randomString(length, chars) {
    var result = '';
    for (var i = length; i > 0; --i) result += chars.charAt(Math.round(Math.random() * (chars.length - 1)));
    return parseInt(result);
  }
  
  function createBigData() {
    var arr = [];
    var str = '0124878909879888450004668';
    var i;
  
    for (i = 0; i < 35; i++) {
      arr.push([
        i,
        randomString(2, str),
        randomString(2, str),
        randomString(2, str),
        randomString(2, str),
        randomString(2 , str),
        randomString(2, str),
        randomString(2, str),
        randomString(2, str),
        randomString(2, str),
        randomString(2, str),
        randomString(2, str),
        randomString(2, str),
        randomString(2, str)
      ]);
    }
  
    return arr;
  }
var calculateSize = function () {
  var offset = $example1.offset();
  availableWidth = $window.width() - offset.left + $window.scrollLeft();
  availableHeight = $window.height() - offset.top + $window.scrollTop();
};
$window.on('resize', calculateSize);

$example1.handsontable({
  data: createBigData(),
  colWidths: [50, 50, 50, 50, 50, 50, 50,50,50, 50,50,50, 50,50], //can also be a number or a function
  colHeaders: ["Q1","Q2","Q3","Q4","Q5","Q6","QZ","Q1","Q2","Q3","Q4","Q5","Q6","QZ"],
  rowHeaders: ["Dave alaras","Dave","Dave","Dave","dave","dave","hgarry","paulo","jd","vak","Q4","Q5","Q6","QZ"],
  minSpareRows: 1,
  width: function () {
    if (maxed && availableWidth === void 0) {
      calculateSize();
    }
    return maxed ? availableWidth : $window.width();
  },
  height: function () {
    if (maxed && availableHeight === void 0) {
      calculateSize();
    }
    return maxed ? availableHeight : $window.height()-70;
  }
});

$('.maximize').on('click', function () {
  maxed = !maxed;
  $example1.handsontable('render');
});

</script>