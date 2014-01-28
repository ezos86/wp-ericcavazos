<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, user-scalable=no" />
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

		<script src="https://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=AIzaSyAni9lWk1AIvc6B1Y38JsXt1zR78U3hEA0"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-tabletools/2.1.5/js/TableTools.min.js"></script>
		<link rel="stylesheet" type="text/css" href="dt/tabletools.css">
		<link rel="stylesheet" type="text/css" href="dt/table.css">
		<title>CE Metrics</title>
		
	</head>
	<body>
	<div id="container">
	<button class="metrics">Build Metrics Table</button>
		<table id="datatable">
		</table>
	</div>

	</body>
	<script>

	 // "metrics": [
  //       {
  //           "links": [
  //               {
  //                   "href": "https://codenvy.com/api/analytics/metric/FACTORY_URL_ACCEPTED_NUMBER",
  //                   "rel": "get metric value",
  //                   "requestBody": null,
  //                   "consumes": null,
  //                   "produces": "application/json",
  //                   "method": "GET",
  //                   "parameters": []
  //               }
  //           ],
  //           "name": "FACTORY_URL_ACCEPTED_NUMBER",
  //           "type": "Long",
  //           "description": "The number of usage of factory url"
  //       },

	function build_table(data,headers){
			$('#datatable').empty();
			$('#datatable').dataTable({
				"iDisplayLength": -1,
			    "aaData": data,
			    "bSortCellsTop": true,
			    "bAutoWidth": false,
			    //"sPaginationType": "full_numbers",
			    "aoColumns": headers,
			    "sDom": 'T<"clear">lfrtip',
			    "oTableTools": {
					"sSwfPath": "copy_csv_xls_pdf.swf",
					"aButtons": [ "csv" ]
				}
			});
		}

	function get_json(){
				if($('.location_select').val() == 'none'){
					$('#datatable').empty();
					return false;
				}
				$('#datatable').empty();
				$('.load').fadeIn();
				var operator_information = {username: 'ecavazos', password: 'anthony7'};
				$.ajax({
			        type: "POST",
			        url: 'metrics.php',
			        cache: true,
			        data: operator_information,
			        dataType: "json",
			        success: function(data) {
			        		var build = [];
			        		var obj = data['metrics'][0];
							console.log(obj);

							var keys = [];
							for(var k in obj){
								v = k.replace(/\s+/g,"");
								if(k == 'links'){
									console.log('skipped');
								} else {
									keys.push(JSON.parse('{"sTitle":"'+k+'","mData":"'+k+'", "sClass": "'+ v +'"}'));
								}	
							}
							var obj2 = data['metrics'][0]['links'][0];
							for(var p in obj2){
								v = p.replace(/\s+/g,"");
								keys.push(JSON.parse('{"sTitle":"'+p+'","mData":"'+p+'", "sClass": "'+ v +'"}'));
							}	
			        		for(i = 0; i < data['metrics'].length; i ++){
			        			var oop = data['metrics'][i];
			        			var oop2 = data['metrics'][i]['links'][0];
								jQuery.extend(oop, oop2);
				       			build.push(oop);
								// }
			         		}
							build_table(build,keys);
			        		},
			        error: function() {console.log('Error with Login Function');},
			        complete: function(){
			 			$('.load').hide();
			        }
			    });
		}

		$(document).ready(function(){
			
			$('.metrics').click(function(e){
				e.preventDefault();
				get_json();
			})

		});
	</script>