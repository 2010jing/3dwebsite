

<?php if($act == 'list' && $role == 'admin'){?>
<h1 class="ui header">News List</h1>
<div id="updatenews" class="ui divided items">

	<?php 

		$nid="end";
		foreach ($nList as $art) {
			foreach ($art as $key => $value) {
				if($key == 'id'){
					$nid = $value;
				}elseif($key == 'title'){
					$ntitle = $value;
				}elseif($key == 'content'){
					$ncontent = $value;
				}elseif($key == 'createtime'){
					$createtime = $value;
					$t = strtotime($createtime);
					$t = date('Y-m-d',$t);	
				}elseif($key == 'newsimg'){
					$newsimg = $value;
				}elseif($key == 'status'){
				  $nstatus = $value;
				  if($nstatus == 0){
				  	$rstxt = "Delete";
				  }elseif($nstatus == 1){
				  	$rstxt = "Enable";
				  }elseif($nstatus == 2){
				  	$rstxt = "Disable";
				  }
				}
			}

			?>
			<div class="item">
				
				<div class="content">
					<a class="header"><?=$ntitle?></a>
					<div class="meta">
						<!-- <span class="cinema">Union Square 14</span> -->
					</div>
					<div class="description">
						<p><b>Publish Time:</b> <?=$t?></p>
						<p id="<?=$nid?>">Status: <?=$rstxt?> </p>
					</div>
					<div class="extra">
						<!-- <div class="ui label">IMAX</div>
						<div class="ui label"><i class="globe icon"></i> Additional Languages</div>
						<div class="ui label">Limited</div> -->
					</div>

					<div class="ui buttons">
					  	<a href="<?=base_url('panel/app/news/edit/'.$nid)?>" class="ui primary button">Edit</a>
					  	<div class="or"></div>
					  	<div class="ui positive button" onclick="enableThisNews(<?=$nid?>)">Enable</div>
					  	<div class="or"></div>
					  	<div class="ui teal button" onclick="disableThisNews(<?=$nid?>)">Disable</div>
						<div class="or"></div>
					  	<div class="ui red button" onclick="deleteThisNews(<?=$nid?>)">Delete</div>
					  	<div class="or"></div>
					  	<a href="<?=base_url('home/news/'.$nid)?>" class="ui orange button" target="_blank">View</a>

					</div>
				</div>
				
			</div>



<?php  
}
?>

<h2 id="more" class="ui horizontal divider">
	<a  onclick="newsLoadmore(<?=$nid?>)" > <i class="arrow circle down icon"></i>more</a>
</h2>

</div>









<?php }elseif($act == "publish" && $role == 'admin'){ ?>
<h1 class="ui header">Add News </h1>

<form class="ui newnews form" action="<?=base_url('panel/publishNews')?>" enctype="multipart/form-data" method="post" onsubmit="return checksubmitpostcourse();">  
  <div class="field">
    <label> Title</label>
    <div  class="ui left icon input">
      <input type="text" name="title" placeholder="Oops!">
      <i class="paint brush icon"></i>
    </div>
  </div>                    
  <div id="coursejpgerror" class="field">
    <label> Image (jpg)</label>
    <div class="ui left icon input">
      <input type="file" name="newsimg" single onchange="selectCourseJPG(this)">
      <i class="file image outline icon"></i>
    </div>
  </div>


  <div class="field">
    <label>Content</label>
    <div class="ui left icon input">
      <textarea name="content"> </textarea>
    </div>
  </div>     
  <div class="ui positive right labeled icon submit button">Yep, new news <i class="checkmark icon"></i> </div>
</form>



<?php }elseif($act == "edit" && $role == 'admin'){ ?>

<?php
	$cid="end";
$createtime='';
	foreach ($cList as $art) {
		foreach ($art as $key => $value) {
			if($key == 'id'){
				$cid = $value;
			}elseif($key == 'name'){
				$cname = $value;
			}elseif($key == 'time'){
				$ctime = $value;
			}elseif($key == 'venue'){
				$cvenue = $value;
			}elseif($key == 'nterm'){
				$cnterm = $value;
			}elseif($key == 'createtime'){
				$createtime = $value;
				$t = strtotime($createtime);
				$t = date('Y-m-d',$t);	   
			}elseif($key == 'status'){
			  $cstatus = $value;
			  if($cstatus == 0){
			  	$rstxt = "Delete";
			  }elseif($cstatus == 1){
			  	$rstxt = "Enable";
			  }elseif($cstatus == 2){
			  	$rstxt = "Disable";
			  }
			}elseif($key == 'introduction'){
				$cintroduction = $value;
			}elseif($key == 'targetstudent'){
				$ctargetstudent = $value;
			}
		}

	}

?>

<h1 class="ui header">New Course </h1>

<form class="ui newcourse form" action="<?=base_url('panel/updateCourseById')?>" enctype="multipart/form-data" method="post" onsubmit="return checksubmitpostcourse();">  
  <div class="field">
    <label> Name</label>
    <div  class="ui left icon input">
      <input type="text" name="name" value="<?=$cname?>">
      <i class="paint brush icon"></i>
    </div>
  </div>                    
  <div id="coursejpgerror" class="field">
    <label> Image (jpg)</label>
    <div class="ui left icon input">
      <input type="file" name="courseimg" single onchange="selectCourseJPG(this)">
      <i class="file image outline icon"></i>
    </div>
  </div>

  <div class="inline fields">

    <label>Teacher</label>

    <?php 
		foreach ($teachers as $teacher) {
			foreach ($teacher as $key => $value) {
				if($key == 'id'){
					$tid = $value;
				}elseif($key == 'name'){
					$tname = $value;
				}elseif($key == 'avatar'){
					$tavatar = $value;
				}
			}
			?>

		    <div class="field">
		      <div class=" radio checkbox">
		        <input type="radio" name="teacherid" value="<?=$tid?>">
					<img class="ui avatar image" src="<?=base_url('public/images/avatar/'.$tavatar)?>">
					        <label><?=$tname?></label>
		      </div>
		    </div>
		
	 	<?php
		}
	    ?>

  </div>



  <div class="field">
    <label> Student</label>
    <div  class="ui left icon input">
      <input type="text" name="targetstudent" value="<?=$ctargetstudent?>">
      <i class="paint brush icon"></i>
    </div>
  </div>  
  <div class="field">
    <label> Time</label>
    <div  class="ui left icon input">
      <input type="text" name="time" value="<?=$ctime?>">
      <i class="paint brush icon"></i>
    </div>
  </div>  
  <div class="field">
    <label> Venue</label>
    <div  class="ui left icon input">
      <input type="text" name="venue" value="<?=$cvenue?>">
      <i class="paint brush icon"></i>
    </div>
  </div>  



  <div class="field">
    <label>Introduction</label>
    <div class="ui left icon input">
      <textarea name="introduction"> <?=$cintroduction?></textarea>
    </div>
  </div>    
      <input type="hidden" name="id" value="<?=$cid?>">
      <input type="hidden" name="createtime" value="<?=$createtime?>">
  <div class="ui positive right labeled icon submit button">Yep, new course <i class="checkmark icon"></i> </div>
</form>


<?php }else{ redirect('panel/app/news/list'); } ?>







