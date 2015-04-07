$(document)
  .ready(function() {

    $('.filter.menu .item').tab();

    // $('.ui.rating')
    //   .rating({
    //     clearable: true
    //   })
    // ;

    $('.ui.sidebar').sidebar('attach events', '.launch.button');

    $('.ui.dropdown').dropdown();


    validationChpwdRules = {
        password: {
          identifier  : 'password',
          rules: [
            {
              type   : 'length[6]',
              prompt : 'Your password is at least six character'
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
        opassword: {
          identifier  : 'opassword',
          rules: [
            {
              type   : 'length[6]',
              prompt : 'Your password is at least six character'
            }
          ]
        }

    };

    $('.ui.chpwd')
      .form(validationChpwdRules, {
      inline : true,
      on     : 'blur'
    });


validationNewWorkRules = {
        title: {
          identifier  : 'title',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please enter a model name'
            }
          ]
        },

        coverfile:{
          identifier  : 'coverfile',
          rules:[
          {
            type : 'empty',
            prompt : 'Please select a cover image'
          }

          ]
        },
        modelfile: {
          identifier  : 'modelfile',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please select a model file'
            }
          ]
        },
        category: {
          identifier  : 'category',
          rules: [
            {
              type   : 'checked',
              prompt : 'Please select a category'
            }
          ]
        },

        description: {
          identifier  : 'description',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please write something'
            }
          ]
        },
    };

    $('.ui.newexhibition')
      .form(validationNewWorkRules, {
      inline : true,
      on     : 'blur'
    });

validationNewCourseRules = {
        name: {
          identifier  : 'name',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please enter a model name'
            }
          ]
        },

        courseimg:{
          identifier  : 'courseimg',
          rules:[
          {
            type : 'empty',
            prompt : 'Please select a cover image'
          }

          ]
        },
        teacherid:{
          identifier  : 'teacherid',
          rules:[
          {
            type : 'checked',
            prompt : 'Please select a teacher'
          }

          ]
        },

        targetstudent: {
          identifier  : 'targetstudent',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please write down your target students'
            }
          ]
        },
        time: {
          identifier  : 'time',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please write down the course time'
            }
          ]
        },
        venue: {
          identifier  : 'venue',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please write down the course venue'
            }
          ]
        },
        introduction: {
          identifier  : 'introduction',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please write something'
            }
          ]
        },
    };

    $('.ui.newcourse')
      .form(validationNewCourseRules, {
      inline : true,
      on     : 'blur'
    });


validationNewRaceRules = {
        name: {
          identifier  : 'name',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please enter a model name'
            }
          ]
        },

        startdate:{
          identifier  : 'startdate',
          rules:[
          {
            type : 'empty',
            prompt : 'Please choose a game start date '
          }

          ]
        },
        enddate:{
          identifier  : 'enddate',
          rules:[
          {
            type : 'empty',
            prompt : 'Please choose a game end date '
          }

          ]
        },

        introduction: {
          identifier  : 'introduction',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please write something'
            }
          ]
        },
    };

    $('.ui.newrace')
      .form(validationNewRaceRules, {
      inline : true,
      on     : 'blur'
    });


validationNewNewsRules = {
        title: {
          identifier  : 'title',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please enter a news title'
            }
          ]
        },

       

        content: {
          identifier  : 'content',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please write something'
            }
          ]
        },
    };

    $('.ui.newnews')
      .form(validationNewNewsRules, {
      inline : true,
      on     : 'blur'
    });



  })
;