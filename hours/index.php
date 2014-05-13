<?php
	$name = $_GET['name'];
	$grp = $_GET['grp'];

	if(!isset($name)||!isset($grp)){
		header( 'Location: error.php' ) ;
	}
?>
<!DOCTYPE html>
<html>
	<head>
                <?php include("../headers/header1.php");?>
		<script>
			$(document).ready(function(){

                                $("#title").html("Entering Hours for " + date);

				$("#send").click(function(){
					today = new Date();
					$("#date").val(today);
					send();
				});


				function send(){
					var url="submit_log.php";

					$.post(url, $( "#form1" ).serialize()
					).done(function( data ) {
						$.mobile.changePage('done.php');
//						window.location.replace("done.php");	
					}).fail(function() {
						alert( "error - Unable to Send" );
					});

				}
			});
		</script>
	</head>
	<body>
		<div data-role="page" data-theme="a">
                        <?php include("../php/nav_home.php");?>
			<div data-role="content" data-theme="a">
                            <form id="form1">
				<label>Entering time for: <?php echo "$name";?></label>
				<hr>
				
				<input type=hidden name="name" value="<?php echo $name;?>">
				<input type=hidden name="grp" value="<?php echo $grp;?>">

				<input type="hidden" name="date" id="date" placeholder="date">

				<label>Time In:</label>
				<input type="time" id="in_time" name="in_time" placeholder="enter clock in time">
				<label>Time Out:</label>
				<input type="time" id="out_time" name="out_time" placeholder="enter clock out time">
				<label>Comments</label>
				<input type="text" id="comments" name="comments" form="form1">

				<div class="ui-grid-a">
					<div class="ui-block-a"><button id="send" data-theme="b">Submit</button></div>
				</div>
                            </form>
			</div>
		</div>
	</body>
</html>
