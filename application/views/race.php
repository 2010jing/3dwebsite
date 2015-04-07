
 
<?php if($act == 'list'){ ?>
<h1 class="ui header"> Result</h1>

<div id="updateraceresult" class="ui divided items">

  <?php 
  if($role == 'admin'){
	$gid="end";
	foreach ($rList as $art) {
	  foreach ($art as $key => $value) {
		if($key == 'gname'){
		  $gname = $value;
		}elseif($key == 'nterm'){
		  $gnterm = $value;
		}elseif($key == 'uid'){
		  $guid = $value;
		}elseif($key == 'username'){
		  $gusername = $value;
		}elseif($key == 'avatar'){
		  $gavatar = $value;
		}elseif($key == 'workid'){
		  $gworkid = $value;
		}elseif($key == 'workname'){
		  $gworkname = $value;
		}elseif($key == 'workimg'){
		  $gworkimg = $value;
		  $t = explode('.',$gworkimg);
		  $gcreatetime = $t[0];
		}elseif($key == 'isvoted'){
		  $gisvoted = $value;
		}elseif($key == 'rank'){
		  $grank = $value;
		}elseif($key == 'id'){
		  $gid = $value;
		}
	  }

	  ?>

  <div class="item">
	<div class="image"> 
	  <img src="<?=base_url('public/models/'.$guid.'/'.$gcreatetime.'/'.$gworkimg)?>" >    
	</div>
	<div class="content">
	  <a class="header"><?=$gname?></a>
	  <div class="meta">
		<span class="cinema"></span>
	  </div>
	  <div class="description">
		<p> <b>TITLE :</b>    <?=$gworkname?>  </p>
		<p> <b>AUTHOR :</b>    
			<a class="ui image label" style="margin-bottom:5px">
			 <img class="ui avatar circle image" src="<?=base_url('public/images/avatar/'.$gavatar)?>">
		 admin        </a>
		</p>
		<p> <b>VOTED :</b> <i class=" red heart icon"></i>   <?=$gisvoted?>  </p>
		<p> <b>RANK :</b>    <?=$grank?>  </p>
	  </div>
	  <div class="extra">
		<!-- <div class="ui label">IMAX</div>
		<div class="ui label"><i class="globe icon"></i> Additional Languages</div>
		<div class="ui label">Limited</div> -->

		<div class="ui right floated primary button">
		  View
		  <i class="right chevron icon"></i>
		</div>
	  </div>
	</div>
  </div>

  <?php }?>

  <h2 id="more" class="ui horizontal divider">
	<a  onclick="reaceresultLoadmore(<?=$gid?>)" > <i class="arrow circle down icon"></i>more</a>
  </h2>

<?php  }elseif($role == 'user'){ 
   $gid="end";
	foreach ($rList as $art) {
	  foreach ($art as $key => $value) {
		if($key == 'gname'){
		  $gname = $value;
		}elseif($key == 'nterm'){
		  $gnterm = $value;
		}elseif($key == 'uid'){
		  $guid = $value;
		}elseif($key == 'username'){
		  $gusername = $value;
		}elseif($key == 'avatar'){
		  $gavatar = $value;
		}elseif($key == 'workid'){
		  $gworkid = $value;
		}elseif($key == 'workname'){
		  $gworkname = $value;
		}elseif($key == 'workimg'){

		  $gworkimg = $value;
		  $t = explode('.',$gworkimg);
		  $gcreatetime = $t[0];
		}elseif($key == 'isvoted'){
		  $gisvoted = $value;
		}elseif($key == 'rank'){
		  $grank = $value;
		}elseif($key == 'id'){
		  $gid = $value;
		}
	  }
	?>

  <div class="item">
	<div class="image"> 
	  <img src="<?=base_url('public/models/'.$guid.'/'.$gcreatetime.'/'.$gworkimg)?>" >    
	</div>
	<div class="content">
	  <a class="header"><?=$gname?></a>
	  <div class="meta">
		<span class="cinema"></span>
	  </div>
	  <div class="description">
		<p> <b>TITLE :</b> <?=$gworkname?>  </p>
		<p> <b>VOTED :</b> <i class=" red heart icon"></i>   <?=$gisvoted?>  </p>
		<p> <b>RANK :</b> <?=$grank?>  </p>
	  </div>
	  <div class="extra">
		<!-- <div class="ui label">IMAX</div>
		<div class="ui label"><i class="globe icon"></i> Additional Languages</div>
		<div class="ui label">Limited</div> -->

		<div class="ui right floated primary button">
		  View
		  <i class="right chevron icon"></i>
		</div>
	  </div>
	</div>
  </div>


<?php } ?>

  <h2 id="more" class="ui horizontal divider">
	<a  onclick="reaceresultLoadmore(<?=$gid?>)" > <i class="arrow circle down icon"></i>more</a>
  </h2>

<?php } ?>



<?php }elseif($act == "publish" && $role == 'admin'){ ?>
<h1 class="ui header">Publish</h1>


<form class="ui newrace form" action="<?=base_url('panel/publishRace')?>" enctype="multipart/form-data" method="post">  
  <div class="field">
	<label> Name</label>
	<div  class="ui left icon input">
	  <input type="text" name="name" placeholder="Oops!">
	  <i class="paint brush icon"></i>
	</div>
  </div>                    
  <div  class="field">
	<label> Start Date</label>
	<div class="ui left icon input">
	  <input type="date" name="startdate">
	  <i class="file image outline icon"></i>
	</div>
  </div>

  <div  class="field">
	<label> End time</label>
	<div class="ui left icon input">
	  <input type="date" name="enddate">
	  <i class="file image outline icon"></i>
	</div>
  </div>

  <div class="field">
	<label>Introduction</label>
	<div class="ui left icon input">
	  <textarea name="introduction"> </textarea>
	</div>
  </div>     
  <div class="ui positive right labeled icon submit button">Yep, new race <i class="checkmark icon"></i> </div>
</form>



<?php }elseif($act == "manage" && $role == 'admin'){ ?>
<h1 class="ui header">Manage</h1>

<?php 
	foreach ($rList as $art) {
	  	foreach ($art as $key => $value) {
			if($key == 'id'){
			  $rid = $value;
			}elseif($key == 'name'){
			  $rname = $value;
			}elseif($key == 'startdate'){
			  $rstartdate = $value;
			}elseif($key == 'enddate'){
			  $renddate = $value;
			}elseif($key == 'createtime'){
			  $gavatar = $value;
			}elseif($key == 'nterm'){
			  $rnterm = $value;
			}elseif($key == 'introduction'){
			  $rintroduction = $value;
			}elseif($key == 'publisher'){
			  $rpublisher = $value;
			}elseif($key == 'status'){
			  $rstatus = $value;
			  if($rstatus == 0){
			  	$rstxt = "Delete";
			  }elseif($rstatus == 1){
			  	$rstxt = "Enable";
			  }elseif($rstatus == 2){
			  	$rstxt = "Disable";
			  }
			}	  	
		}

		?>

		<div class="ui green segment">
			<h2>Name: <?=$rname?> </h2>	
			<p>Start Date: <b> <?=$rstartdate?> </b> -- End Date:  <b>  <?=$renddate?> </b> 
			Nterm :   <b> <?=$rnterm?> </b> 
			Publisher :   <b> <?=$rpublisher?></b>  </p>
			<p id="<?=$rid?>">Status: <?=$rstxt?> </p>
			<div class="ui buttons">
			  	<a href="<?=base_url('panel/app/race/edit/'.$rid)?>" class="ui primary button">Edit</a>
			  	<div class="or"></div>
			  	<div class="ui positive button" onclick="enableThisRace(<?=$rid?>)">Enable</div>
			  	<div class="or"></div>
			  	<div class="ui teal button" onclick="disableThisRace(<?=$rid?>)">Disable</div>
				<div class="or"></div>
			  	<div class="ui red button" onclick="deleteThisRace(<?=$rid?>)">Delete</div>			
			</div>
		</div>

		<?php
	}  



?>


<?php }elseif($act == "edit" && $role == 'admin'){ ?>
<?php
	foreach ($rList as $art) {
	  	foreach ($art as $key => $value) {
			if($key == 'id'){
			  $rid = $value;
			}elseif($key == 'name'){
			  $rname = $value;
			}elseif($key == 'startdate'){
			  $rstartdate = $value;
			}elseif($key == 'enddate'){
			  $renddate = $value;
			}elseif($key == 'nterm'){
			  $rnterm = $value;
			}elseif($key == 'introduction'){
			  $rintroduction = $value;
			}  	
		}

	}
?>

<form class="ui newrace form" action="<?=base_url('panel/updateRaceById')?>" enctype="multipart/form-data" method="post">  
  <div class="field">
	<label> Name</label>
	<div  class="ui left icon input">
	  <input type="text" name="name" value="<?=$rname?>">
	  <i class="paint brush icon"></i>
	</div>
  </div>                    
  <div  class="field">
	<label> Start Date</label>
	<div class="ui left icon input">
	  <input type="date" name="startdate" value="<?=$rstartdate?>">
	  <i class="file image outline icon"></i>
	</div>
  </div>

  <div  class="field">
	<label> End time</label>
	<div class="ui left icon input">
	  <input type="date" name="enddate" value="<?=$renddate?>">
	  <i class="file image outline icon"></i>
	</div>
  </div>

  <div class="field">
	<label>Introduction</label>
	<div class="ui left icon input">
	  <textarea name="introduction"><?=$rintroduction?></textarea>
	</div>
  </div>    
	  <input type="hidden" name="rid" value="<?=$rid?>">
  <div class="ui positive right labeled icon submit button">Yep, new race <i class="checkmark icon"></i> </div>
</form>




<?php }else{ redirect('panel/app/race/list'); } ?>








