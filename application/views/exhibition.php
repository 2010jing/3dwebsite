
 
<?php if($act == 'list'){?>
<h1 class="ui header">Exhibition List</h1>
<div id="updateexhi" class="ui divided items">

<?php 

$title='';
$createtime='';
$imagename='';
$description='';
$publisher='';
$category='';
$id='end';
foreach ($exList as $art) {
  foreach ($art as $key => $value) {
   if($key == 'title'){
    $title = $value;
   }elseif($key == 'createtime'){
    $createtime = $value;
   }elseif($key == 'imgname'){
    $imagename = $value;
   }elseif($key == 'description'){
    $description = $value;
   }elseif($key == 'publisher'){
    $publisher = $value;
   }elseif($key == 'category'){
    $category = $value;
   }elseif($key == 'id'){
    $id = $value;
   }elseif($key == 'uid'){
    $euid = $value;
   }
  }
 ?>

  <div class="item">
    <div class="image">
      <img src="<?=base_url('public/models/'.$euid.'/'.$createtime.'/'.$imagename)?>" style="width:175px; height:100px;">    
    </div>
    <div class="content">
      <a class="header"><?=$title?></a>
      <div class="meta">
        <span class="cinema">Union Square 14</span>
      </div>
      <div class="description">
<!--         <p>    <img src="<?=base_url('public/images/short-paragraph.png')?>" >   </p>
 -->      </div>
      <div class="extra">
        <div class="ui label"><?=$publisher?></div>
        <div class="ui label"><i class="globe icon"></i> <?=$category?></div>
        <div class="ui label">Limited</div>

        <div class="ui right floated primary button">
          view
          <i class="right chevron icon"></i>
        </div>
      </div>
    </div>
  </div>




<?php
}
?>  




       <h2 id="more" class="ui horizontal divider">
        <a  onclick="exhibitionLoadmore(<?=$id?>)" > <i class="arrow circle down icon"></i>more</a>
      </h2>

</div>




<?php }elseif($act == "publish"){ ?>
<h1 class="ui header"> New Work</h1>
<form class="ui newexhibition form" action="<?=base_url('panel/publishWork')?>" enctype="multipart/form-data" method="post" onsubmit="return checksubmitpostwork();">  
  <div class="field">
    <label>Model name</label>
    <div  class="ui left icon input">
      <input type="text" id="title" name="title" placeholder="Oops!">
      <i class="paint brush icon"></i>
    </div>

  </div>                    
  <div id="jpgerror" class="field">
    <label>Cover Image (jpg)</label>
    <div class="ui left icon input">
      <input type="file" name="coverfile" single onchange="selectJPG(this)">
      <i class="file image outline icon"></i>
    </div>
  </div>
  <div id="stlerror" class="field">
    <label>Model File (stl)</label>
    <div class="ui left icon input">
      <input type="file" name="modelfile" single onchange="selectSTL(this)">
      <i class="file icon"></i>
    </div>
  </div> 

  <div class="inline fields">
    <label>Category</label>

    <div class="field">
      <div class=" radio checkbox">
        <input type="radio" name="category" value="Figure">
        <label>Figure</label>
      </div>
    </div>
    <div class="field">
      <div class=" radio checkbox">
        <input type="radio" name="category" value="Building">
        <label>Building</label>
      </div>
    </div>
    <div class="field">
      <div class=" radio checkbox">
        <input type="radio" name="category" value="Animals">
        <label>Animals</label>
      </div>
    </div>
    <div class="field">
      <div class=" radio checkbox">
        <input type="radio" name="category" value="Scene">
        <label>Scene</label>
      </div>
    </div>
    <div class="field">
      <div class=" radio checkbox">
        <input type="radio" name="category" value="Game">
        <label>Game</label>
      </div>
    </div>
    <div class="field">
      <div class=" radio checkbox">
        <input type="radio" name="category" value="Animation">
        <label>Animation</label>
      </div>
    </div>
    <div class="field">
      <div class=" radio checkbox">
        <input type="radio" name="category" value="Other" checked>
        <label>Other</label>
      </div>
    </div>
  </div>
  <div class="field">
    <label>Description</label>
    <div class="ui left icon input">
      <textarea name="description"> </textarea>
    </div>
  </div>     
  <div class="ui positive right labeled icon submit button">Yep, my new work <i class="checkmark icon"></i> </div>
</form>

<?php } ?>

