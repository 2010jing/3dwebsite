    <!-- homepage modal  -->
    <div class="ui dimmer animating page visible">
        <!-- signin now -->
       
        <div class="ui standard signin modal transition visible scrolling" style="display:none;;">
            <i class="close icon"></i>
            <div class="header">Sign In </div>
            <div class="content">

                <div class="description">
                    <div class="ui two column middle aligned relaxed fitted stackable grid">
                        
                        <div class="column">
                            <div class="ui medium image">
                                <img src="<?=base_url('public/images/cat.png')?>" style="width:50px">
                            </div>          
                            <form class="ui signin form" action="<?=base_url('auth/signin')?>" method="post">  
                                <div class="ui form segment">
                                    <div class="field">
                                        <label>Email</label>
                                        <div class="ui left icon input">
                                            <input type="text" name="email" placeholder="name@example.com">
                                            <i class="user icon"></i>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label>Password</label>
                                        <div class="ui left icon input">
                                            <input type="password" name="password">
                                            <i class="lock icon"></i>
                                        </div>
                                    </div>

                                    <!-- <div class="ui blue submit button">Login</div> -->
                                    <div class="ui positive right labeled icon submit button">Yep, that's me <i class="checkmark icon"></i> </div>
                                </div>
                            </form>
                        </div>
                        <div class="ui vertical divider left">Or </div>
                        <div class="center aligned column">
                            <div class="huge green ui labeled icon button signupnow"><i class="signup icon"></i> Sign Up </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="actions">
                <div class="ui black button">Nope </div>
                <div class="ui positive right labeled icon button">Yep, that's me <i class="checkmark icon"></i> </div>
            </div> -->
        </div>

        <div class="ui standard signup modal transition visible scrolling" style="display:none;;">
            <i class="close icon"></i>
            <div class="header">Sign Up </div>
            <div class="content">
              <div class="ui medium image">
                <img src="<?=base_url('public/images/cat.png')?>" style="width:200px" >
              </div>
              <div class="description">
                <form class="ui signup form" action="<?=base_url('auth/signup')?>" method="post">  
                  <div class="ui form segment">
                    <div class="field">
                      <label>Name</label>
                      <div class="ui left icon input">
                        <input type="text" name="name" placeholder="name">
                        <i class="user icon"></i>
                      </div>
                    </div>
                    <div class="field">
                      <label>Email</label>
                      <div class="ui left icon input">
                        <input type="email" name="email" placeholder="name@example.com">
                        <i class="mail icon"></i>
                      </div>
                    </div>
                    <div class="field">
                      <label>Password</label>
                      <div class="ui left icon input">
                        <input type="password" name="password" placeholder="******">
                        <i class="lock icon"></i>
                      </div>
                    </div>
                    <div class="field">
                      <label>Re Password</label>
                      <div class="ui left icon input">
                        <input type="password" name="repassword" placeholder="******">
                        <i class="lock icon"></i>
                      </div>
                    </div>
                    <div class="field">
                      <label>StudentID</label>
                      <div class="ui left icon input">
                        <input type="text" name="studentid" placeholder="b630300007">
                        <i class="leaf icon"></i>
                      </div>
                    </div>
                    <div class="field">
                      <label>Major</label>
                      <div class="ui left icon input">
                        <input type="text" name="major" placeholder="cst">
                        <i class="road icon"></i>
                      </div>
                    </div>
                    <div class="field">
                      <label>Description</label>
                      <div class="ui left icon input">
                        <textarea name="description"> </textarea>
                      </div>
                    </div>                      
                    <div class="inline field">
                        <div class="ui inputcheckbox">
                          <input type="checkbox" name="terms">
                          <label>  I agree to the terms and conditions </label>
                        </div>
                    </div>

                    
                    <div class="ui positive right labeled icon submit button">Yep, that's me <i class="checkmark icon"></i> </div>

                    <!-- <div class="actions">
                      <div class="ui black button">Nope </div>
                      <div class="ui positive right labeled icon submit button">Yep, that's me <i class="checkmark icon"></i> </div>
                    </div> -->
                  </div>
                </form>
              </div>
            </div>
            <!-- <div class="actions">
              <div class="ui black button">Nope </div>
              <div class="ui positive right labeled icon button">Yep, that's me <i class="checkmark icon"></i> </div>
            </div> -->
        </div>
    </div>   
     <!-- homepage modal  -->
    <div class="ui dimmer animating page visible">
    
        <!-- signup now -->

    </div>   
    <!-- sidebar  -->
    <div class="ui left vertical inverted labeled icon sidebar menu">
        <a href="<?=base_url()?>" class="item">
            <i class="teal home icon"></i>
            Home
        </a>
        <a  href="<?=base_url('home/exhibition')?>" class="item">
            <i class="blue photo icon"></i>
            Exhibition
        </a>
        <a  href="<?=base_url('home/course')?>" class="item">
            <i class="green book icon"></i>
            Course
        </a>
        <a  href="<?=base_url('home/vote')?>" class="item">
            <i class="red thumbs up icon"></i>
            Vote
        </a>
        <a  href="<?=base_url('home/about')?>" class="item">
            <i class="orange anchor icon"></i>
            About
        </a>
        <a  href="<?=base_url('panel')?>" class="item">
            <i class="purple dashboard icon"></i>
            Panel
        </a>
      </div>

  <!-- part 1-->
    <div class="ui inverted masthead segment">
        <div class="ui page grid">
          <div class="column">
            <div class="ui inverted blue menu">
              <div class="header item launch homesidebar"><i class="list layout icon"></i> Menu</div>
              <div class="right menu">
                <div class="ui mobile dropdown link item">
                  Menu
                  <i class="dropdown icon"></i>
                  <div class="menu">
                      <a href="<?=base_url()?>" class="item">Home</a>
                      <a href="<?=base_url('home/exhibition')?>" class="item">Exhibition</a>
                      <a href="<?=base_url('home/course')?>" class="item">Course</a>
                      <a href="<?=base_url('home/vote')?>" class="item">Vote</a>
                      <a href="<?=base_url('home/about')?>" class="item">About</a>

                  </div>
                </div>



                  <a href="<?=base_url()?>" class="item">Home</a>
                  <a href="<?=base_url('home/exhibition')?>" class="item">Exhibition</a>
                  <a href="<?=base_url('home/course')?>" class="item">Course</a>
                  <a href="<?=base_url('home/vote')?>" class="item">Vote</a>
                  <a href="<?=base_url('home/about')?>" class="item">About</a>

                  <div class="ui dropdown link item">
                  <i class="red user icon"></i>
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
            </div>
            <img src="<?=base_url('public/images/cat.png')?>" class="ui medium image">
            <div class="ui hidden transition information">
              <h1 class="ui inverted header">
                3D, IN THE FUTURE ...
              </h1>
              <p>Anything you want to print with 3D printer?</p>
              <div class="large basic inverted animated fade ui button">

                <?php if(empty($this->session->userdata('username'))){?>
                    <div class="visible content">Join Us!</div>
                    <div class="hidden content registnow">Register Now!</div>
                <?php }else{ ?>
                    <div class="visible content">Enjoy!</div>
                    <div class="hidden content">Have Fun!</div>

                <?php } ?>


              
              </div>
            </div>
          </div>
        </div>
    </div>


