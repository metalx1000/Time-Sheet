<!DOCTYPE html>
<html>
	<head>
                <?php include("../headers/header1.php");?>
		<script>
			$(document).ready(function(){
				today = new Date();
				var d = today.getDate();
				var m = today.getMonth() + 1;
				var y = today.getFullYear();

				today = m + "/" + d + "/" + y;
				$("#startDate").val(today);
				$("#endDate").val(today);
				send(today, today);

                                $("#title").html("Viewing Hours");

				$("#send").click(function(){
					var start = $("#startDate").val();
					var end = $("#endDate").val();
					send(start,end);
				});

				function send(start,end){
					var url="get_date_cells.php";
					console.log(start);
					console.log(end);
	
					$.get(url,
					{ 
						startDate: start, 
						endDate: end 

					}).done(function( data ) {
						$("tbody tr").remove();
						$("tbody").append(data);
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
				
				<input type=hidden name="name" value="<?php echo $name;?>">
				<input type=hidden name="grp" value="<?php echo $grp;?>">

				<input type="date" name="startDate" id="startDate" placeholder="Start Date">
				<input type="date" name="endDate" id="endDate" placeholder="End Date">
				<button id="send" data-theme="b">Search By Date</button>
<form>
    <input id="filterTable-input" data-type="search" placeholder="Filter">
</form>

<table data-role="table" id="table" data-filter="true" data-input="#filterTable-input" class="ui-responsive">
    <thead>
        <tr>
            <th data-priority="1">Name</th>
            <th data-priority="persist">Date</th>
            <th data-priority="2">Clocked In</th>
            <th data-priority="3">Clocked Out</th>
            <th data-priority="4">Comments</th>
            <th data-priority="4">Total Hours</th>
        </tr>
        </thead>
	<tbody id="list">
	</tbody>

</table>
				</div>
			</div>
		</div>
	</body>
</html>
