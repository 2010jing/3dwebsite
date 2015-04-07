
<!DOCTYPE html>
<html>
<head>
	<!-- Standard Meta -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<!-- Site Properities -->
	<title>User Panel</title>

	<link rel="stylesheet" type="text/css" href="<?=base_url('public/css/googleapis.css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700')?>">

	<link rel="stylesheet" type="text/css" href="<?=base_url('public/css/semantic.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('public/css/feed.css')?>">

	<script src="<?=base_url('public/js/jquery.js')?>"></script>
	<script src="<?=base_url('public/js/semantic.min.js')?>"></script>
	<script src="<?=base_url('public/js/feed.js')?>"></script>
</head>
<body id="feed">



	<?php 
		$numData['exhibitionNum'] = $exNum;
		$numData['takecourseNum'] = $tcNum;
		$numData['raceNum'] = $raNum;
		$numData['newsNum'] = $neNum;
		$this->load->view("panel_nav",$numData);

	?>

	<div class="ui celled grid">
		<div class="four wide middle column">

			<div class="ui large  vertical  menu">
			<div>
				<h2 class="ui">
					 <i class="red flag icon"></i><?php echo strtoupper($func); ?>
				</h2>
			</div>


			<!-- funclist here -->
				<?php 
				foreach($funclist as $key => $value) {
					echo "<div class='item'>";
					echo "<b> <a href='$value' > $key </a></b>";
					echo "</div>";
			}

			?>
				
							


			</div>

		</div>
		<div class="twelve wide right column">
		

			<?php 
				if($subpage == 'exhibition'){
					
					$subData['action'] = $act;
					$subData['exList'] = $exhibitionList;
					$this->load->view($subpage,$subData); 

				}elseif($subpage == 'course'){


					if($act == 'list'){
						$subData['cList'] = $courseList;

					}elseif($act == 'publish'){
						$subData['teachers'] = $lecturers;
					}elseif($act == 'edit'){
						$subData['cList'] = $courseList;
						$subData['teachers'] = $lecturers;
					}

					$subData['action'] = $act;
					$subData['role'] = $role;
					$this->load->view($subpage,$subData); 

				}elseif($subpage == 'news'){
					if($act == 'list'){
						$subData['nList'] = $newsList;

					}elseif($act == 'publish'){

					}elseif($act == 'edit'){
						$subData['nList'] = $newsList;
					}

					$subData['action'] = $act;
					$subData['role'] = $role;
					$this->load->view($subpage,$subData); 

				}elseif($subpage == 'race'){
					if($act != 'publish'){
						$subData['rList'] = $raceList;
					}
					$subData['action'] = $act;
					$this->load->view($subpage,$subData); 
					
				}elseif($subpage == 'userinfo'){
					$subData['uInfo'] = $userInfo;
					$subData['action'] = $act;
					$subData['uid'] = $uid;
					$this->load->view($subpage,$subData); 
				}

			?>

			
		</div>
	</div>


</body>

<script type="text/javascript">
var opwderror = 1;
function exhibitionLoadmore(eid){
        var last_msg_id = eid;
        //Get the id of this hyperlink 
        //this id indicate the row id in the database 
        if(last_msg_id!='end'){
            //if  the hyperlink id is not equal to "end"
            $.ajax({//Make the Ajax Request
                type: "POST",
                url: "<?=base_url('panel/loadmoreExhibition')?>",
                data: {lastmsg:last_msg_id},
                beforeSend:  function() {
                    $('a.load_more').html("<img src=<?=base_url('public/images/loading.gif')?> />");//Loading image during the Ajax Request

                },
                success: function(html){//html = the server response html code
                    $("#more").remove();//Remove the div with id=more 
                    $("div#updateexhi").append(html);//Append the html returned by the server .

                }
            });

        }
        return false;
}


function courseLoadmore(gid){
        var last_msg_id = gid;
        //Get the id of this hyperlink 
        //this id indicate the row id in the database 
        if(last_msg_id!='end'){
            //if  the hyperlink id is not equal to "end"
            $.ajax({//Make the Ajax Request
                type: "POST",
                url: "<?=base_url('panel/loadmoreCourse')?>",
                data: {lastmsg:last_msg_id},
                beforeSend:  function() {
                    $('a.load_more').html("<img src=<?=base_url('public/images/loading.gif')?> />");//Loading image during the Ajax Request

                },
                success: function(html){//html = the server response html code
                    $("#more").remove();//Remove the div with id=more 
                    $("div#updatecourse").append(html);//Append the html returned by the server .

                }
            });

        }
        return false;
}




function newsLoadmore(nid){
        var last_msg_id = nid;
        //Get the id of this hyperlink 
        //this id indicate the row id in the database 
        if(last_msg_id!='end'){
            //if  the hyperlink id is not equal to "end"
            $.ajax({//Make the Ajax Request
                type: "POST",
                url: "<?=base_url('panel/loadmoreNews')?>",
                data: {lastmsg:last_msg_id},
                beforeSend:  function() {
                    $('a.load_more').html("<img src=<?=base_url('public/images/loading.gif')?> />");//Loading image during the Ajax Request

                },
                success: function(html){//html = the server response html code
                    $("#more").remove();//Remove the div with id=more 
                    $("div#updatenews").append(html);//Append the html returned by the server .

                }
            });

        }
        return false;
}

function reaceresultLoadmore(cid){
        var last_msg_id = cid;
        //Get the id of this hyperlink 
        //this id indicate the row id in the database 
        if(last_msg_id!='end'){
            //if  the hyperlink id is not equal to "end"
            $.ajax({//Make the Ajax Request
                type: "POST",
                url: "<?=base_url('panel/loadmoreRaceresult')?>",
                data: {lastmsg:last_msg_id},
                beforeSend:  function() {
                    $('a.load_more').html("<img src=<?=base_url('public/images/loading.gif')?> />");//Loading image during the Ajax Request

                },
                success: function(html){//html = the server response html code
                    $("#more").remove();//Remove the div with id=more 
                    $("div#updateraceresult").append(html);//Append the html returned by the server .

                }
            });

        }
        return false;
}

function checkopassword(){
	opwderror = 1;
	var opwd = $('input#opassword').val();
    $.ajax({//Make the Ajax Request
        type: "POST",
        url: "<?=base_url('panel/validatePass')?>",
        data: {opass:opwd},
        beforeSend:  function() {
            $('#opassword').html("<img src=<?=base_url('public/images/loading.gif')?> />");//Loading image during the Ajax Request

        },
        success: function(html){
        	if(html == 1){
        		opwderror = 0;
        	}else if(html == 0){
				var html = '<div id="opwderror" class="ui red pointing prompt label transition visible">Your old password is not correct</div>';
				$("div#opwderror").remove();
				$("div#opasserror").append(html);
			}        	
		}
        
    });
}

function checksubmitupdatepass(){
	if( opwderror == 0){

		$("div#opwderror").remove();

		return true;
	}else{
		var html = '<div id="opwderror" class="ui red pointing prompt label transition visible">Your old password is not correct</div>';
		$("div#opwderror").remove();
		$("div#opasserror").append(html);
		return false;	
	}
		
}
var jpgerror = 1;
var stlerror = 1;

function selectJPG(file){
	var filename = file.value;
	var mime = filename.toLowerCase().substr(filename.lastIndexOf('.'));
	if(mime != '.jpg'){
		var html = '<div id="errorjpg" class="ui red pointing prompt label transition visible">Please select a jpg file</div>';
		$("div#errorjpg").remove();
		$("div#jpgerror").append(html);
	}else{
		jpgerror = 0;
	}
}

function selectSTL(file){
	var filename = file.value;
	var mime = filename.toLowerCase().substr(filename.lastIndexOf('.'));
	if(mime != '.stl'){
		var html = '<div id="errorstl" class="ui red pointing prompt label transition visible">Please select a stl file</div>';
		$("div#errorstl").remove();
		$("div#stlerror").append(html);
	}else{
		stlerror = 0;
	}
}

function checksubmitpostwork(){
	if(stlerror == 1){
		var html = '<div id="errorstl" class="ui red pointing prompt label transition visible">Please select a stl file</div>';
		$("div#errorstl").remove();
		$("div#stlerror").append(html);
	}
	if(jpgerror == 1){
		var html = '<div id="errorjpg" class="ui red pointing prompt label transition visible">Please select a jpg file</div>';
		$("div#errorjpg").remove();
		$("div#jpgerror").append(html);
	}
	if( jpgerror == 0 && stlerror == 0){

		$("div#errorjpg").remove();
		$("div#errorstl").remove();
		return true;
	}else{
		return false;
	}

}
var courseJPGerrro =1;

function selectCourseJPG(file){
	var filename = file.value;
	var mime = filename.toLowerCase().substr(filename.lastIndexOf('.'));
	if(mime != '.jpg'){
		var html = '<div id="errorjpgcourse" class="ui red pointing prompt label transition visible">Please select a jpg file</div>';
		$("div#errorjpgcourse").remove();
		$("div#coursejpgerror").append(html);
	}else{
		courseJPGerrro = 0;
	}
}

function checksubmitpostcourse(){

	if(courseJPGerrro == 1){
		var html = '<div id="errorjpgcourse" class="ui red pointing prompt label transition visible">Please select a jpg file</div>';
		$("div#errorjpgcourse").remove();
		$("div#coursejpgerror").append(html);
		return false;
	}else if( courseJPGerrro == 0 ){
		$("div#errorjpgcourse").remove();
		return true;
	}

}


function enableThisRace(rid){
    var t = Math.floor(Math.random()*100+1)
    var xurl = "<?=base_url('panel/changeRaceStatus/')?>";
    xurl = xurl + '/'+t;
	$.ajax({//Make the Ajax Request
        type: "POST",
        url: xurl,
        data: {rid:rid,status:1},
        beforeSend:  function() {
            //$("#"+rid).html("<img src=<?=base_url('public/images/loading.gif')?> />");//Loading image during the Ajax Request

        },
        success: function(html){
        	if(html == 1){
        	    $("#"+rid).html('Status: Enable');	
			}
        }
    });
}
function disableThisRace(rid){
    var t = Math.floor(Math.random()*100+1)
    var xurl = "<?=base_url('panel/changeRaceStatus/')?>";
    xurl = xurl + '/'+t;
	$.ajax({//Make the Ajax Request
        type: "POST",
        url: xurl,
        data: {rid:rid,status:2},
        beforeSend:  function() {
            //$("#"+rid).html("<img src=<?=base_url('public/images/loading.gif')?> />");//Loading image during the Ajax Request

        },
        success: function(html){
        	if(html == 1){
        	    $("#"+rid).html('Status: Disable');
			}
        }
    });

	
}
function deleteThisRace(rid){
    var t = Math.floor(Math.random()*100+1)
    var xurl = "<?=base_url('panel/changeRaceStatus/')?>";
    xurl = xurl + '/'+t;
	$.ajax({//Make the Ajax Request
        type: "POST",
        url: xurl,
        data: {rid:rid,status:0},
        beforeSend:  function() {
            //$("#"+rid).html("<img src=<?=base_url('public/images/loading.gif')?> />");//Loading image during the Ajax Request

        },
        success: function(html){
        	if(html == 1){
        	   $("#"+rid).html('Status: Delete');
			}
        }
    });	
}


function enableThisCourse(rid){
    var t = Math.floor(Math.random()*100+1)
    var xurl = "<?=base_url('panel/changeCourseStatus/')?>";
    xurl = xurl + '/'+t;
	$.ajax({//Make the Ajax Request
        type: "POST",
        url: xurl,
        data: {rid:rid,status:1},
        beforeSend:  function() {
            //$("#"+rid).html("<img src=<?=base_url('public/images/loading.gif')?> />");//Loading image during the Ajax Request

        },
        success: function(html){
        	if(html == 1){
        	    $("#"+rid).html('Status: Enable');	
			}
        }
    });
}

function disableThisCourse(rid){
    var t = Math.floor(Math.random()*100+1)
    var xurl = "<?=base_url('panel/changeCourseStatus/')?>";
    xurl = xurl + '/'+t;
	$.ajax({//Make the Ajax Request
        type: "POST",
        url: xurl,
        data: {rid:rid,status:2},
        beforeSend:  function() {
            //$("#"+rid).html("<img src=<?=base_url('public/images/loading.gif')?> />");//Loading image during the Ajax Request

        },
        success: function(html){
        	if(html == 1){
        	    $("#"+rid).html('Status: Disable');
			}
        }
    });

	
}
function deleteThisCourse(rid){
    var t = Math.floor(Math.random()*100+1)
    var xurl = "<?=base_url('panel/changeCourseStatus/')?>";
    xurl = xurl + '/'+t;
	$.ajax({//Make the Ajax Request
        type: "POST",
        url: xurl,
        data: {rid:rid,status:0},
        beforeSend:  function() {
            //$("#"+rid).html("<img src=<?=base_url('public/images/loading.gif')?> />");//Loading image during the Ajax Request

        },
        success: function(html){
        	if(html == 1){
        	   $("#"+rid).html('Status: Delete');
			}
        }
    });	
}


function enableThisNews(rid){
    var t = Math.floor(Math.random()*100+1)
    var xurl = "<?=base_url('panel/changeNewsStatus/')?>";
    xurl = xurl + '/'+t;
	$.ajax({//Make the Ajax Request
        type: "POST",
        url: xurl,
        data: {rid:rid,status:1},
        beforeSend:  function() {
            //$("#"+rid).html("<img src=<?=base_url('public/images/loading.gif')?> />");//Loading image during the Ajax Request

        },
        success: function(html){
        	if(html == 1){
        	    $("#"+rid).html('Status: Enable');	
			}
        }
    });
}

function disableThisNews(rid){
    var t = Math.floor(Math.random()*100+1)
    var xurl = "<?=base_url('panel/changeNewsStatus/')?>";
    xurl = xurl + '/'+t;
	$.ajax({//Make the Ajax Request
        type: "POST",
        url: xurl,
        data: {rid:rid,status:2},
        beforeSend:  function() {
            //$("#"+rid).html("<img src=<?=base_url('public/images/loading.gif')?> />");//Loading image during the Ajax Request

        },
        success: function(html){
        	if(html == 1){
        	    $("#"+rid).html('Status: Disable');
			}
        }
    });

	
}
function deleteThisNews(rid){
    var t = Math.floor(Math.random()*100+1)
    var xurl = "<?=base_url('panel/changeNewsStatus/')?>";
    xurl = xurl + '/'+t;
	$.ajax({//Make the Ajax Request
        type: "POST",
        url: xurl,
        data: {rid:rid,status:0},
        beforeSend:  function() {
            //$("#"+rid).html("<img src=<?=base_url('public/images/loading.gif')?> />");//Loading image during the Ajax Request

        },
        success: function(html){
        	if(html == 1){
        	   $("#"+rid).html('Status: Delete');
			}
        }
    });	
}

</script>

</html>