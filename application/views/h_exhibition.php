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
        <div id="updatehexhi" class="ui stackable left aligned page grid">

  

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
                    $eid='';
                    $euid='';
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
                         }elseif($key == 'id'){
                          $eid = $value;
                         }elseif($key == 'uid'){
                          $euid = $value;
                         }
                 

                      }?>
                          <div class="column">
                              <div class="ui segment fluid rounded ">
                              <div class="ui blue ribbon label"><i class="hotel icon"></i> <?=$ecategory;?></div>
                              <div class="ui bottom attached label"><?=$epublisher ?></div>
                                  <img src="<?=base_url('public/models/'.$euid.'/'.$ecreatetime.'/'.$eimgname)?>" style="width:295px; height:250px; margin-bottom:20px;">
                              </div>
                          </div>
                <?php 

                  $i++;
                  if($i % 3 == 0 || $i > $allNum){
                        echo "</div>";
                  }

                } ?>

       <h2 id="more" class="ui horizontal divider">
        <a  onclick="loadmore(<?=$eid?>)" > <i class="arrow circle down icon"></i>more</a>
      </h2>


        </div>

    </div>


  <!-- part 2-->
 


    <!-- footer -->
    <?php $this->load->view('footer')?>


</body>

<script type="text/javascript">

function loadmore(eid){
        var last_msg_id = eid;
        //Get the id of this hyperlink 
        //this id indicate the row id in the database 
        if(last_msg_id!='end'){
            //if  the hyperlink id is not equal to "end"
            $.ajax({//Make the Ajax Request
                type: "POST",
                url: "<?=base_url('home/loadmoreHexhi')?>",
                data: {lastmsg:last_msg_id},
                beforeSend:  function() {
                    $('a.load_more').html("<img src=<?=base_url('public/images/loading.gif')?> />");//Loading image during the Ajax Request

                },
                success: function(html){//html = the server response html code
                    $("#more").remove();//Remove the div with id=more 
                    $("div#updatehexhi").append(html);//Append the html returned by the server .

                }
            });

        }
        return false;
  }
</script>
</html>
