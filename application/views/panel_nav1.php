  

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