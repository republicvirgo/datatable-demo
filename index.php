<!DOCTYPE html>
<html>
	<title>Datatable Demo1 | CoderExample</title>
	<head>
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" >
			$(document).ready(function() {


				$("#submit").click(function(){

					$('#employee-grid').DataTable().destroy();

					var dataTable = $('#employee-grid').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"employee-grid-data.php", // json datasource
						 "data": function ( d ) {
                d.nama = $("#nama").val();
                // d.custom = $('#myInput').val();
                // etc
            },
        				type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".employee-grid-error").html("");
							$("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#employee-grid_processing").css("display","none");
							
						}
					},
					    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
        			$(nRow).attr('data-nama', aData[0]);
    },
		


				} );


				});

				$("#form").submit(function(){
				return false;
				});
				

			} );
		</script>
		<style>
			div.container {
			    margin: 0 auto;
			    max-width:760px;
			}
			div.header {
			    margin: 100px auto;
			    line-height:30px;
			    max-width:760px;
			}
			body {
			    background: #f7f7f7;
			    color: #333;
			    font: 90%/1.45em "Helvetica Neue",HelveticaNeue,Verdana,Arial,Helvetica,sans-serif;
			}
		</style>
	</head>
	<body>
		<div class="header"><h1>DataTable demo (Server side) in Php,Mysql and Ajax </h1></div>
		<div class="container">
<h1>Table baru bangettttt </h1>
		<form id="form">
			<input type="text" name="nama" id="nama">
			<button type="submit" id="submit">Submit</button>

		</form>
			<table id="employee-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
					<thead>
						<tr>
							<th>Employee name</th>
							<th>Salary</th>
							<th>Age</th>
							<th>Action</th>

						</tr>
					</thead>
			</table>
		