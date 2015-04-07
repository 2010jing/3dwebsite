<!-- part 1-->
<div class="ui menu">
  <a class="ui left launch icon button item"><i class="sidebar icon"></i>User Panel</a>
  <a href="<?=base_url()?>"class="item">
    <i class="home icon"></i> Home </a>


  <div class="ui mobile dropdown link item">
        <i class="photo icon"></i>Exhibition
    <i class="dropdown icon"></i>
    <div class="menu">
      <a href="<?=base_url('panel/app/exhibition/list')?>" class="item">List</a>
      <a href="<?=base_url('panel/app/exhibition/publish')?>" class="item">Publish</a>

    </div>
  </div>


  <div class="ui mobile dropdown link item">
    <i class="book icon"></i>Course
    <i class="dropdown icon"></i>
    <div class="menu">
      <a href="<?=base_url('panel/app/course/list')?>" class="item">List</a>
      <?php if($this->session->userdata('role') == 'admin'){?>
      <a href="<?=base_url('panel/app/course/publish')?>" class="item">Publish</a>
      <?php }?>
    </div>
  </div>
  <div class="ui mobile dropdown link item">
    <i class="thumbs up icon"></i>Race
    <i class="dropdown icon"></i>
    <div class="menu">
      <a href="<?=base_url('panel/app/race/list')?>" class="item">Result</a>
      <?php if($this->session->userdata('role') == 'admin'){?>
      <a href="<?=base_url('panel/app/race/publish')?>" class="item">Publish</a>
      <a href="<?=base_url('panel/app/race/manage')?>" class="item">Manage</a>
      <?php }?>
    </div>
  </div>
  <?php if($this->session->userdata('role') == 'admin'){?>
  <div class="ui mobile dropdown link item">
    <i class="thumbs up icon"></i>News
    <i class="dropdown icon"></i>
    <div class="menu">
      <a href="<?=base_url('panel/app/news/list')?>" class="item">List</a>
      <a href="<?=base_url('panel/app/news/publish')?>" class="item">Publish</a>
    </div>
  </div>
  <?php }?>


  <div class="ui mobile dropdown link item">
    <i class="info icon"></i>Profile
    <i class="dropdown icon"></i>
    <div class="menu">
      <a href="<?=base_url('panel/app/profile/information')?>" class="item">Informtion</a>
      <a href="<?=base_url('panel/app/profile/updatepass')?>" class="item">Change Password</a>
    </div>
  </div>

  <div class="ui dropdown link item">
    <i class="red user icon"></i><?=$this->session->userdata('username')?>
    <div class="menu">
      <?php if($this->session->userdata('username')){?>
      <a href="<?=base_url('panel')?>" class="item">Panel</a>
      <a href="<?=base_url('auth/logout')?>" class="item">Logout</a>

      <?php }else{ ?>
      <a  class="item registnow">Join us</a>
      <?php } ?>
    </div>
  </div>

</div>



<div class="ui large inverted vertical sidebar menu">
  <a href="<?=base_url()?>" class="item"><b>Home</b></a>

  <div class="item">
    <b>Function</b>
    <div class="menu">
      <a href="<?=base_url('panel/app/exhibition')?>" class="item">
        Exhibition <span class="ui label"><?= $exhibitionNum ?></span>
      </a>
      <a href="<?=base_url('panel/app/course')?>" class="item">
        Course <span class="ui label"><?= $takecourseNum ?></span>
      </a>
      <a href="<?=base_url('panel/app/race')?>" class="item">
        Race <span class="ui label"><?= $raceNum ?></span>
      </a>
      <?php if($this->session->userdata('role') == 'admin'){?>
      <a href="<?=base_url('panel/app/news')?>" class="item">
        News <span class="ui label"><?= $newsNum ?></span>
      </a>
      <?php }?>
    </div>
  </div>

  <div class="item">
    <b>Information</b>
    <div class="menu">
      <a href="<?=base_url('panel/app/profile')?>" class="item">
        Profile <i class="info icon"></i></span>
      </a>
    </div>
  </div>
</div>