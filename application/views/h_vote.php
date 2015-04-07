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

   <!-- sidebar  -->

    <!-- part 1-->
    <?php $this->load->view('home_nav')?>

    <!-- contact module -->
   <div class="ui vertical segment">
        <div class="ui stackable left aligned page grid">




          <!-- sdfe -->
                <?php 
                    $allNum = count($allexhi);
                    $etitle ='';
                    $ecategory ='';
                    $eimgname ='';
                    $emodlefile ='';
                    $epublisher ='';
                    $ecreatetime ='';
                    $i = 0; 
                    foreach ($allexhi as $item) {
                      if($i % 3 == 0){
                        echo "<div class='three column row'>";

                      }
                      foreach ($item as $key => $value) {
                        if($key == 'title'){
                          $etitle = $value;
                         }elseif($key == 'category'){
                          $ecategory = $value;
                         }elseif($key == 'imgname'){
                          $eimgname = $value;
                         }elseif($key == 'publisher'){
                          $epublisher = $value;
                         }elseif($key == 'createtime'){
                          $ecreatetime = $value;
                         }
                 

                      }?>
                          <div class="column">
                              <div class="ui segment fluid rounded ">
                              <div class="ui red ribbon label"><i class="hotel icon"></i> <?=$ecategory;?></div>
                              <div class="ui bottom attached label"><?=$epublisher ?></div>
                                  <img src="<?=base_url('public/images/exhibition/'.$ecreatetime.'/'.$eimgname)?>" style="width:295px; height:250px; margin-bottom:20px;">
                              </div>
                          </div>
                <?php 

                  $i++;
                  if($i % 3 == 0 || $i > $allNum){
                        echo "</div>";
                  }
                  

                } ?>


    <h3 class="ui header"> </h3>


  <div class="ui grid hvote">
    <div class="ten wide column">
      <div class="ui pagination menu column">
          <a class="icon item"><i class="icon left arrow"></i></a>
          <a class="active item">1</a>
          <div class="disabled item">...</div>
          <a class="item">10</a>
          <a class="item">11</a>
          <a class="item">12</a>
          <a class="icon item"><i class="icon right arrow"></i></a>
        </div>      
    </div>
    <div class="six wide column right">
      <div id="h_exli" class="page">Showing <b>6</b> of 213</div>

    </div>

  </div>   

       <h3 class="ui header"> </h3>


        </div>

    </div>



 

  <!-- part 2-->
 


    <!-- footer -->
    <?php $this->load->view('footer')?>
</body>

<script type="text/javascript">

</script>
</html>
