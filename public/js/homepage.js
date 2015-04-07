$(document)
  .ready(function() {

    var
      changeSides = function() {
        $('.ui.shape')
          .eq(0)
            .shape('flip over')
            .end()
          .eq(1)
            .shape('flip over')
            .end()
          .eq(2)
            .shape('flip back')
            .end()
          .eq(3)
            .shape('flip back')
            .end()
        ;
      },
      validationSigninRules = {
        email: {
          identifier  : 'email',
          rules: [
            {
              type   : 'empty',
              prompt :  'Please enter a valid email'
            },
            {
              type   : 'email',
              prompt : 'Please enter a valid email'
            },
            {
              type  : 'contains[@mail.uic.edu.hk]',
              prompt : 'Please use uic student email'
            }
          ]
        },

        password: {
          identifier  : 'password',
          rules: [
            {
              type   : 'length[6]',
              prompt : 'Please enter your password'
            }
          ]
        },
      };

      validationSignupRules = {

        name:{
          identifier  : 'name',
          rules: [
          {
              type    : 'empty',
              prompt  : 'Please enter a username'
          }
          ]
        },

        email: {
          identifier  : 'email',
          rules: [
            {
              type   : 'empty',
              prompt :  'Please enter an email'
            },
            {
              type   : 'email',
              prompt : 'Please enter a valid email'
            },
            {
              type  : 'contains[@mail.uic.edu.hk]',
              prompt : 'Please use uic student email'
            }
          ]
        },

        studentid:{
          identifier  : 'studentid',
          rules:[
          {
            type: 'length[10]', 
            prompt: 'Please input your valid student id'
          },
          {
            type: 'maxLength[10]',
            prompt: 'Please input your valid student id'
          }
          ]
        },

        password: {
          identifier  : 'password',
          rules: [
            {
              type   : 'length[6]',
              prompt : 'Please enter your password'
            }
          ]
        },

        repassword:{
          identifier  : 'repassword',
          rules:[
          {
            type : 'match[password]',
            prompt : 'Please enter the same password'
          }

          ]
        },
        terms: {
          identifier : 'terms',
          rules: [
            {
              type   : 'checked',
              prompt : 'You must agree to the terms and conditions'
            }
          ]
        }

      };


      validationTakecourseRules = {

        username: {
          identifier  : 'username',
          rules: [
            {
              type   : 'empty',
              prompt :  'Please login first'
            }
          ]
        }
      };


    $('.ui.dropdown')
      .dropdown({
        on: 'hover'
      })
    ;

    // $('.ui.form')
    //   .form(validationRules, {
    //     on: 'blur'
    //   })
    // ;



    $('.ui.takecourse')
      .form(validationTakecourseRules,{
      inline : true,
      on     : 'blur'
    });

    $('.ui.signin')
      .form(validationSigninRules, {
      inline : true,
      // on     : 'blur'
    });

    $('.ui.signup')
      .form(validationSignupRules, {
      inline : true,
      on     : 'blur'
    });

    $('.masthead .information')
      .transition('scale in');

    setInterval(changeSides, 3000);

    $('.ui.sidebar').sidebar('attach events', '.homesidebar');
    jQuery(document).ready(function ($) {
        var options = { $AutoPlay: true };
        var jssor_slider1 = new $JssorSlider$('slider1_container', options);
    });

    // $(".contact").click(function(){
    //    $('.basic.contactus.modal').modal('show');
    // });
    $(".registnow").click(function(){
       $('.standard.signin.modal').modal('show');
    });

    $(".signupnow").click(function(){
       $('.standard.signup.modal').modal('show');
    });








  });



