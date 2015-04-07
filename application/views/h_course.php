<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title>3D</title>

  <link rel="stylesheet" type="text/css" href="<?=base_url('public/css/semantic.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('public/css/homepage.css')?>">

  <script src="<?=base_url('public/js/jquery.js')?>"></script>
  <script src="<?=base_url('public/js/semantic.js')?>"></script>
  <script src="<?=base_url('public/js/homepage.js')?>"></script>

</head>
<body id="home">


  <!-- contact module -->

  <!-- sidebar  -->

  <!-- part 1-->
  <?php $this->load->view('home_nav')?>


  <!-- part 2-->
  <div class="ui  vertical feature segment">
    <div class="ui very relaxed stackable page grid">

      <div class="row">
        <div class="ten wide column">


<div class="main container">
<?php 
$cname = '';
$cintr = '';
$ctargetstudent = '';
$ctime = '';
$cvenue = '';
$cstatus = '';
$cimg ='';
$cnterm = '';
foreach ($lcourse as $item) {
    foreach ($item as $key => $value) {
      if($key == 'name'){
        $cname = $value;
      }elseif($key == 'introduction'){
        $cintr = $value;
      }elseif($key == 'targetstudent'){
        $ctargetstudent = $value;
      }elseif($key == 'time'){
        $ctime = $value;
      }elseif($key == 'venue'){
        $cvenue = $value;
      }elseif($key == 'status'){
        $cstatus = $value;
      }elseif($key == 'id'){
        $cid = $value;
      }elseif($key == 'courseimg'){
        $cimg = $value;
      }elseif($key == 'nterm'){
        $cnterm = $value;
      }elseif($key == 'createtime'){
        $createtime = $value;
      }
    }
}

$tname = '';
$tavatar = '';
$tdesc = '';
$tjoin ='';


foreach ($teacher as $item) {
    foreach ($item as $key => $value) {
      if($key == 'name'){
        $tname = $value;
      }elseif($key == 'avatar'){
        $tavatar = $value;
      }elseif($key == 'description'){
        $tdesc = $value;
      }elseif($key == 'regtime'){
        $tjoin = $value;
      }

    }
}

$tjoin=substr($tjoin,0,4);//取得年份

?>
  <div id="showstudents" class="introduction">
    <h2 class="ui dividing header"><b><?=$cname?> </b></h2>

    <h3 class="ui header"><b>Introduction</b></h3>

    <p><?=$cintr?></p>


    <h3 class="ui header">Target Students</h3>


    <p><?=$ctargetstudent?></p>


    <h3 class="ui header">Course Time</h3>

    <p><?=$ctime?></p>


    <h3 class="ui header">Venue</h3>


    <p><?=$cvenue?></p>

    <h3 class="ui header">Students</h3>
    <?php 
      $cuid = '';
      $cavatar = '';
      $cusername= '';

      foreach ($whos as $who) {
        foreach ($who as $key => $value) {
          if($key == 'uid'){
            $cuid = $value;
          }elseif($key == 'avatar'){
            $cavatar = $value;
          }elseif($key == 'username'){
            $cusername = $value;
          }
        }
        ?>

        <a class="ui image label" style="margin-bottom:5px">
        <img class="ui avatar circle image" src="<?=base_url('public/images/avatar/'.$cavatar)?>">
         <?=$cusername?>
        </a>

        <?php
      }


    ?>
    <h3 class="ui header"> </h3>

    

    <?php if($cstatus == 1){ ?>
      <form id="takecourseform"  class="ui takecourse form" action="<?=base_url('panel/takeThisCourse')?>" method="post" onsubmit="return checksubmittakecourse();">  
          <input type="hidden" name='uid' value="<?=$uid?>">
          <input type="hidden" name='coursename' value="<?=$cname?>">
          <input type="hidden" name='courseid' value="<?=$cid?>">
          <input type="hidden" id="istake" name='istake' value="<?=$istake?>">
          <input type="hidden" name='coursetime' value="<?=$ctime?>">
          <input type="hidden" name='coursevenue' value="<?=$cvenue?>">
          <input type="hidden" name='courseimg' value="<?=$cimg?>">
          <input type="hidden" name='nterm' value="<?=$cnterm?>">
          <input type="hidden" name='createtime' value="<?=$createtime?>">
          <input type="hidden" name='email' value="<?=$email?>">
          <input type="hidden" id="username" name='username' value="<?=$username?>">
          <input type="hidden" name='avatar' value="<?=$avatar?>">

          <div class="ui primary submit button">Take this course</div>

      </form>

      <?php } ?>


  <div class="ui divider"></div>

    <h3 class="ui header"> </h3>


  </div>







</div>
</div>

<div class="six wide column">

  <div class="ui card">

    <div class="image">
      <img src="<?=base_url('public/images/avatar/'.$tavatar)?>" >
    </div>
    <div class="content">
      <a class="header"><?=$tname?></a>
      <div class="meta">
        <span class="date">Joined in <?=$tjoin?></span>
      </div>
      <div class="description">
        <?=$tdesc?>
      </div>
    </div>
    <div class="extra content">
      <a>
        <i class="user icon"></i>
        22 Friends
      </a>
    </div>
  </div>



</div>


</div>
</div>
</div>

<!-- part 3-->

<!-- footer -->
<?php $this->load->view('footer')?>
</body>

<script type="text/javascript">
    function checksubmittakecourse(){

      var uname = $('#username').val();
      var istake = $('#istake').val();
      if(uname == ''){
          alert("Please login first");
          return false;
      }else if(istake == 'yes'){
          alert("Please you have signed up this course");
          return false;
      }else{
          return true;
      }
    }
</script>
</html>
