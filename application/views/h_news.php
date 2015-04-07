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

    <?php 

    foreach ($detailnews as $item) {
      foreach ($item as $key => $value) {
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
        }elseif($key == 'publisher'){
          $npublisher = $value;
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
    }

    ?>


              <div class="ui  centered vertical center feature segment">
                <div class="ui very relaxed stackable page grid">

                  <div class="row">
                    <div class="wide column">
                      <div class="ui raised segment">
                        <h2 class="ui dividing header"><?=$ntitle?><a class="anchor" id="types"></a></h2>


                        <img class="ui centered image" src="<?=base_url('public/images/news.png')?>">
                        <a class="ui ribbon label">Author</a> <span><?=$npublisher?> - <?=$t?> </span>
                        <p> </p>
                        <a class="ui teal ribbon label">Content</a>
                        <p> <?=$ncontent?></p>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="ui divider"></div>

    <!-- footer -->
    <?php $this->load->view('footer')?>
</body>

<script type="text/javascript">

</script>
</html>

