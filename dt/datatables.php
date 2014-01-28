<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatables-tabletools/2.1.5/js/TableTools.min.js"></script>
	<link rel="stylesheet" type="text/css" href="table.css">
	<link rel="stylesheet" type="text/css" href="tabletools.css">
</head>
<style type="text/css">
.dataTables_length{
	display:none;
}

.MID{
	position: relative;
	/* site defaults */
}

/*mobile*/
@media (max-width: 400px) { 
  html { background: blue; }
}

/* tablet */
@media (min-width: 401px) and (max-width: 800px) {
  .MID{
  	display: none;
  }
}

/* This doesn't have to exist unless your design needs it, as these settings are above */
@media (min-width: 801px) and (max-width: 1199px) {
  html { background: red; }
}

/* large desktop and browsers that know a media query*/
@media (min-width: 1200px) {
  html { background: blue; }
}
</style>
<body>
<button class="btn create">Click Here</button>
<button class="btn btn2">Add Data</button>
<button class="btn delete">Delete Data</button>
<button class="btn sumby">Sum By Location</button>
<table id="demo">
</table>
	
</body>
<script>

/**Globals**/
var g = 0;
var p = [];


function addData(data){
	$('#demo').dataTable().fnAddData(data);
}

function build_table(data,headers){
	//$('#demo').empty();

	$('#demo').dataTable({
		"iDisplayLength": 500,
	    "aaData": data,
	    "bSortCellsTop": true,
	    "bAutoWidth": false,
	    "sPaginationType": "full_numbers",
	    "aoColumns": headers,
	    "sDom": 'T<"clear">lfrtip',
	    "oTableTools": {
			"sSwfPath": "copy_csv_xls_pdf.swf",
			"aButtons": [ "csv", "xls","pdf" ]
		},
		"fnRowCallback": function( nRow, aData, iDisplayIndex ) {
				if($(nRow).hasClass('done')){
					//console.log('has class');
				} else {
					g++
	                $(nRow).addClass('row'+g);
	                $(nRow).addClass('done');
				}
				 var t = (aData['Location']).replace(/\s+/g,"");
				 $(nRow).addClass(t);

				// if(aData['Location'] == 'Laf 2'){
				// 	console.log('Here it is');
				// 	$(nRow).remove();
				// }
        },
        "fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
			/* Calculate Total */
			var iTotalMarket = 0;
			for ( var i=0 ; i<aaData.length ; i++ )
			{
				iTotalMarket += aaData[i]['PTD Parking Fees']*1;
			}
			//console.log(aaData[3]['PTD Parking Fees']);
			/* Calculate Total for Page */
			var iPageMarket = 0;
			for ( var i=iStart ; i<iEnd ; i++ )
			{
				iPageMarket += aaData[ aiDisplay[i] ]['PTD Parking Fees']*1;
			}
			/* Add Foot row for Page Totals and Grand Total*/
			var nCells = nRow.getElementsByTagName('th');
			var sum_total = parseFloat(Math.round(iTotalMarket * 100) / 100).toFixed(2);
			nCells[14].innerHTML = '$' + parseFloat(Math.round(iPageMarket * 100) / 100).toFixed(2);
			$('tfoot th.CreditCardType').html('Grand Total: '+sum_total);
		}
		// "fnDrawCallback": function ( oSettings ) {
  //           var that = this;
 
  //           /* Need to redo the counters if filtered or sorted */
  //           if ( oSettings.bSorted || oSettings.bFiltered )
  //           {
  //               this.$('td:first-child', {"filter":"applied"}).each( function (i) {
  //                   that.fnUpdate( i+1, this.parentNode, 0, false, false );
  //               } );
  //           }
  //       },
  //       "aoColumnDefs": [
  //           { "bSortable": false, "aTargets": [ 0 ] }
  //       ],
  //       "aaSorting": [[ 1, 'asc' ]]
	});
	
	$('#demo th.Location').click();
	$('th').unbind('click.DT');
	
	var b = $('#demo > tbody > tr').length;
	for(h = 0; h < b; h++){
		$('#demo > tbody > tr:eq('+h+')').addClass('line'+h);	
	}
	// var b = $('#demo > tbody > tr').length;
	// for(c = 0; c < b; c++){
	// 	var numItems = $('.total_row').length;
	// 	var location1 = $('.line'+ c +' td.Location').text();
	// 	if(location1 !== $('.line'+(c+1)+' td.Location').text()){
	// 		console.log(numItems);
	// 		add_total_row(location1,0,c);
	// 	}
	// }
		// var numItems = $('.total_row').length;
		// console.log(numItems);
		// //console.log($('#demo > tbody > tr:eq('+h+') > td.Location').text());
		// //var h = h+b;
		// var h2 = h+1;
		// var h3 = h+2;
		// // if(b == false){
		// // 	var locationName1 = $('#demo > tbody > tr:eq('+h+') > td.Location').text();
		// // 	var locationName2 = $('#demo > tbody > tr:eq('+h2+') > td.Location').text();
		// // } else {
		// // 	var locationName1 = $('#demo > tbody > tr:eq('+h2+') > td.Location').text();
		// // 	var locationName2 = $('#demo > tbody > tr:eq('+h3+') > td.Location').text();
		// // }
		// var locationName1 = $('#demo > tbody > tr:eq('+h+') > td.Location').text();
		// var locationName2 = $('#demo > tbody > tr:eq('+h2+') > td.Location').text();
		// //console.log(locationName1 + 'vs.' + locationName2);
		// if(locationName2 !== locationName1){
		// 	$('#demo > tbody > tr').eq(h + numItems).after('<tr class="total_row"><td>gere</td><td class="Location">BAD</td></tr>');
		// 	b = true;
		// 	console.log(b);
		// } else {
		// 	b = false;
		// 	console.log('same');
		// }
	//}
	// $('#demo > tbody > tr').eq(3).after('<tr><td>gere</td></tr>');
	// var yrow = $(this).parent().parent().children().index(this.parentNode);
}

function sort_column(){
	$('#demo th.Location').click();
	$('th').unbind('click.DT');
}

function sort_by_location(){
	var b = $('#demo > tbody > tr').length;
	for(c = 0; c < b; c++){
		var numItems = $('.total_row').length;
		var location1 = $('.line'+ c +' td.Location').text();
		if(location1 !== $('.line'+(c+1)+' td.Location').text()){
			add_total_row(location1);
		}
	}
}

function add_total_row(location){
	var parkingFees_total = 0;
	var ptdParkingFees_total = 0;
	locSlim = location.replace(/\s+/g,"");
	$('tr.'+locSlim+' td.ParkingFees').each(function(index, obj) {
    	var x = $(obj).text();
    	parkingFees_total += eval(x);
	});
	$('tr.'+locSlim+' td.PTDParkingFees').each(function(index, obj) {
    	var x = $(obj).text();
    	ptdParkingFees_total += eval(x);
	});
	// for(m = rowStart; m < rowEnd; m++){
	// 	j += eval($('.line'+ m +' td.ParkingFees').text());
	// 	console.log(j);
	// }
	var oTable = $('#demo').dataTable();
	var a = oTable.fnAddData([{
	"Address": "",
	"City": "",
	"Credit Card Type": "",
	"Device": "",
	"Duration": "",
	"License Plate": "",
	"Location": location,
	"MID": "",
	"PTD Parking Fees": ptdParkingFees_total,
	"PTD User Transactions": "",
	"Parking Fees": parkingFees_total,
	"Session ID": "Totals for "+location,
	"Session Start": "",
	"Space": "",
	"Transaction Date": "",
	"User": ""}]
	);
	var nTr = oTable.fnSettings().aoData[ a[0] ].nTr;
	$(nTr).addClass('total_row');
	$('tr.total_row td').each(function(index, obj) {
    	if($(obj).text() == location){
    		$(obj).text('');
    	}
	});
	$('.total_row').css({
		"font-weight":"700",
		"border-top":"2px solid"
	});
}


function get_json(){
		var operator_information = {name: 'test'};
		$.ajax({
	        type: "POST",
	        url: 'get_json.php',
	        cache: true,
	        data: operator_information,
	        dataType: "json",
	        success: function(data) {
	       				var obj = data[0];
						var keys = [];
						for(var k in obj){
							v = k.replace(/\s+/g,"");
							keys.push(JSON.parse('{"sTitle":"'+k+'","mData":"'+k+'", "sClass": "'+ v +'"}'));
							p.push(v);
						}
						var k = keys.length;
						build_footer(k);
						console.log(keys);
						console.log(p);
						build_table(data,keys);
	        		},
	        error: function() {alert('Error with Login Function');},
	        complete: function(){
	 
	        }
	    });
}

function build_footer(k){
	$('#demo').append('<tfoot><tr></tr></tfoot>');
	for(i = 0; i < k; i++){
		$('#demo tfoot tr').append('<th class='+ p[i] +'></th>');
	}
}

function add_json(){
		var operator_information = {name: 'test'};
		$.ajax({
	        type: "POST",
	        url: 'get_json.php',
	        cache: true,
	        data: operator_information,
	        dataType: "json",
	        success: function(data) {
	       				addData(data);
	        		},
	        error: function() {alert('Error with Login Function');},
	        complete: function(){
	        }
	    });
}

/* Get the rows which are currently selected */
function fnGetSelected( oTableLocal,loc )
{
    return oTableLocal.$('tr.'+loc);
}

function fnGetSelected2( oTableLocal,loc ){
    var aReturn = new Array();
    var aTrs = oTableLocal.fnGetNodes();  
    for ( var i=0 ; i<aTrs.length ; i++ ){
    	var tdgen = aTrs[i].getElementsByTagName('td');
    	for(p = 0; p < tdgen.length; p ++){
    		var contCheck = tdgen[p].className;
    		if(contCheck.indexOf('Location') >= 0){
    			var locCheck = tdgen[p].innerHTML;
    			if(locCheck == 'Laf 2'){
    				aReturn.push( aTrs[i] );
    			}
    		}
        }
    }
    return aReturn;
}

// Using an array of objects as a data source (mData)
$(document).ready( function () {

	$('.create').click(function(e){
		e.preventDefault();
		get_json();
	});

	$('.sumby').click(function(e){
		e.preventDefault();
		sort_column();
		sort_by_location();
	});

	$('.btn2').click(function(e){
		e.preventDefault();
		add_json();

		/* TEMP CHECKS - DELTE */
		//var oTable = $('#demo').dataTable();
    	//console.log(oTable.fnGetData());
		
	});

	/* Add a click handler for the delete row */
    $('.delete').click( function() {
    	var oTable = $('#demo').dataTable();
        var anSelected = fnGetSelected(oTable,'Laf2');
        console.log(anSelected.length);
        var delrows = fnGetSelected2(oTable);
        console.log(delrows.length);
        console.log(delrows);
        if ( anSelected.length !== 0 ) {
        	for(q = 0; q < delrows.length; q++){
        		oTable.fnDeleteRow(delrows[q]);
        	}  
        }
        var nodes = oTable.fnGetNodes();
		var tr = $(nodes).filter('.Laf2')[0];
		var data = oTable.fnGetData(tr);
        //oTable.fnDeleteRow( $('tr.Laf2', oTable.fnGetNodes())[0] );
        var wha = nodes[1].getElementsByTagName('td');
        console.log(wha[1].innerHTML);
        console.log(wha[1].className);

        console.log(data);
        console.log(tr);
        for(u = 0; u < data.length; u++){
        	if(data[u].Location == 'Laf 2'){
        		console.log('Laf 2');
        	}
        	//console.log(data[u]);
        }
    } );

});

</script>
</html>


