<h1 class="ui header">User Information</h1>

<?php if($action == 'updatepass'){?>
<form class="ui chpwd form" action="<?=base_url('panel/changePassword')?>" method="post" onsubmit="return checksubmitupdatepass();">  
   <div id="opasserror" class="field">
      <label>Original Password</label>
      <div  class="ui left icon input">
        <input type="password" id="opassword" name="opassword" placeholder="******" onblur="checkopassword();">
        <i class="lock icon"></i>
      </div>

    </div>                    
    <div class="field">
      <label>New Password</label>
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
    <div class="ui positive right labeled icon submit button">Yep, that's new password <i class="checkmark icon"></i> </div>
</form>
<?php } else {?>
<form class="ui  form">  
<div class="ui form segment">
    <div class="field">
      <label>Name</label>
      <div class="ui left icon input">
        <input type="text" name="name" value="<?=$uInfo->name?>" disabled>
        <i class="user icon"></i>
      </div>
    </div>
    <div class="field">
      <label>Email</label>
      <div class="ui left icon input">
        <input type="email" name="email" value="<?=$uInfo->email?>" disabled>
        <i class="mail icon"></i>
      </div>
    </div>                    
   <!--  <div class="field">
      <label>Original Password</label>
      <div class="ui left icon input">
        <input type="password" name="original" placeholder="******">
        <i class="lock icon"></i>
      </div>
    </div>                    
    <div class="field">
      <label>New Password</label>
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
    </div>  -->
    <div class="field">
      <label>StudentID</label>
      <div class="ui left icon input">
        <input type="text" name="studentid" value="<?=$uInfo->studentid?>" disabled>
        <i class="leaf icon"></i>
      </div>
    </div>
    <div class="field">
      <label>Major</label>
      <div class="ui left icon input">
        <input type="text" name="major" value="<?=$uInfo->major?>" disabled>
        <i class="road icon"></i>
      </div>
    </div>
    <div class="field">
      <label>Description</label>
      <div class="ui left icon input">
        <textarea name="description" disabled><?=$uInfo->description?> </textarea>
      </div>
    </div>  
        <input type="hidden" name="uid" value="<?=$uid?>">
  </div>
</form>
<?php }  ?>

  
    
   

