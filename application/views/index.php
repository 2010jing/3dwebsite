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
  <script src="<?=base_url('public/js/jssor.slider.mini.js')?>"></script>

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
            <div class="seven wide column">
              <div class="ui tabular filter menu">
                  <a class="item active" data-tab="News"><i class="teal newspaper icon"></i>News</a>
              </div>
              <div class="ui divided inbox selection list tab active" data-tab="unread">
                <?php 
                    $nid='';
                    $ndate = '';
                    $ntitle = '';
                    foreach ($news as $item) {
                      foreach ($item as $key => $value) {
                        if($key == 'title'){
                          $ntitle = $value;
                         }elseif($key == 'createdate'){
                          $ndate = $value;
                         }elseif($key == 'id'){
                          $nid = $value;
                         }
                 

                      }?>

                    <a href="<?=base_url('home/news/'.$nid)?>" class="item">
                      <div class="left floated ui star rating"><i class="icon"></i></div>
                      <div class="right floated date"><?=$ndate?></div>
                      <div class="description"><?=$ntitle?></div>
                    </a>
                <?php  
                } ?>


                
              </div>   

            </div>

            <div class="nine wide right column">
                  <div id="slider1_container" style="">
                      <!-- Slides Container -->
                      <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 690px; height: 300px;">
                          
                <?php 
                    $pname = '';
                    foreach ($photoshow as $item) {
                      foreach ($item as $key => $value) {
                        if($key == 'name'){
                          $pname = $value;
                         }
                      }?>

                        <div><img u="image" src="<?=base_url('public/images/photoshow/'.$pname)?>" /></div>

                <?php  
                } ?>
                      </div>
                  </div>
            </div>
          </div>
        </div>
    </div>

  <!-- part 3-->
    <?php $this->load->view('circles')?>

    <!-- footer -->
    <?php $this->load->view('footer')?>
</body>

<script type="text/javascript">

</script>
</html>
