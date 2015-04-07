<!DOCTYPE html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title>Panel</title>
  <link rel="stylesheet" type="text/css" href="<?=base_url('public/css/googleapis.css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700')?>">

  <link rel="stylesheet" type="text/css" href="<?=base_url('public/css/semantic.css')?>">

  <script src="<?=base_url('public/js/jquery.js')?>"></script>
  <script src="<?=base_url('public/js/semantic.min.js')?>"></script>
  <link rel="stylesheet" type="text/css" href="<?=base_url('public/css/feed.css')?>">
  <script src="<?=base_url('public/js/feed.js')?>"></script>


</head>
<body id="feed">

  <?php $this->load->view("panel_nav");?>

  <div class="ui celled grid">
    <div class="four wide middle column">

      <div class="ui left floated launch icon button mypanelmenu">
        <i class="sidebar icon"></i>
      </div>
      <div>
        <h2 class="ui header">
          Functions
        </h2>
      </div>
      
      
    <!--   <div class="ui divided inbox selection list active tab" data-tab="unread">
        <a class="active item">
          <div class="left floated ui star rating"><i class="icon"></i></div>
          <div class="right floated date">Sep 14, 2013</div>
          <div class="description">Weekly Webcomic Wrapup fought the law, and the law won</div>
        </a>
        <a class="item">
          <div class="left floated ui star rating"><i class="icon"></i></div>
          <div class="right floated date">Sep 14, 2013</div>
          <div class="description">Scientists discover new breed of dog</div>
        </a>
        <a class="item">
          <div class="left floated ui star rating"><i class="icon"></i></div>
          <div class="right floated date">Sep 10, 2013</div>
          <div class="description">Dogs colony in Antarctica</div>
        </a>
        <a class="item">
          <div class="left floated ui star rating"><i class="icon"></i></div>
          <div class="right floated date">Sep 09, 2013</div>
          <div class="description">Famous dog whisperer Chakotay dies today at 104</div>
        </a>
        <a class="item">
          <div class="left floated ui star rating"><i class="icon"></i></div>
          <div class="right floated date">Sep 07, 2013</div>
          <div class="description">Top 10 Things to Know about Labradoodles</div>
        </a>
        <a class="item">
          <div class="left floated ui star rating"><i class="icon"></i></div>
          <div class="right floated date">Sep 05, 2013</div>
          <div class="description">Study shows children enjoy the company of animals</div>
        </a>
      </div>
     -->

      <div class="ui divider"></div>

<!--       <div class="page">Showing <b>6</b> of 213</div>
      <div class="ui pagination menu">
        <a class="icon item"><i class="icon left arrow"></i></a>
        <a class="active item">1</a>
        <div class="disabled item">...</div>
        <a class="item">10</a>
        <a class="item">11</a>
        <a class="item">12</a>
        <a class="icon item"><i class="icon right arrow"></i></a>
      </div> -->
    </div>
    <div class="twelve wide right column">
      <h1 class="ui header">Weekly Webcomic Wrapup fought the law, and the law won</h1>
      Tags: <a class="ui teal label">Unread</a> <a class="ui teal label">Comics</a>

      <p>So there's this video game coming out Tuesday called Grand Theft Auto 5. Don't know if you've heard of it. Anyways, it's all about crime and gangs and some roughneck ne'er-do-wells, so I thought this would be the perfect time to talk about times when we've been... well, less than perfect.</p>
      <p>When I was a young'un, I was a frequent visitor to the local swimming pool. I was also a frequent lover of AirHeads candy, which the pool happened to sell. Waiting, watching, stalking the counter like a big cat in the savannah, I waited for the perfect opportunity to strike. While the lifeguards were busy, I snuck through the gate, reached up and took both cherry and "mystery white" AirHeads. I quickly ran out to the sidewalk and reveled in my sweet, delicious victory... for all of ten seconds, before I felt guilty enough to sneak back in and return the .20 worth of candy I had stolen.</p>
      <p>While you confess your crimes - hopefully minor, and nothing you can be persecuted for - take a moment to enjoy this week's webcomics, and vote for your favorite after the jump.</p>
      <div class="ui divider"></div>
      <div class="ui basic button">Save</div>
      <div class="ui basic button">Delete</div>
    </div>
  </div>
</body>

</html>