
$(function() {


$(document).ready(function(){

    	var setLanguage={

		    "sProcessing":   "處理中...",
		    "sLengthMenu":   "顯示 _MENU_ 項結果",
		    "sZeroRecords":  "沒有符合結果",
		    "sInfo":         "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
		    "sInfoEmpty":    "顯示第 0 至 0 項結果，共 0 項",
		    "sInfoFiltered": "(從 _MAX_ 項結果過濾)",
		    "sInfoPostFix":  "",
		    "sSearch":       "全部欄位搜尋:",
		    "sUrl":          "",
		    "oPaginate": {
		        "sFirst":    "首頁",
		        "sPrevious": "上頁",
		        "sNext":     "下頁",
		        "sLast":     "尾頁",
		    }
		};

		var opt;

		opt={
	           "oLanguage":setLanguage,
	           "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "全部"]],
	            "bPaginate":true, //開起換頁
                //"sScrollY":"380px", //設定成拉頁y
                //"sScrollX":"400px", //設定成拉頁x
               // "sWidth":"5%",
	    };

		$("#table_news").dataTable(opt);


      var table = $('#table_news').DataTable();
		$('#container').css( 'display', 'block' );




     });




$(document).ready(function(){//多搜尋列表
    $('#table_news').dataTable().columnFilter({
    	order: [ 0, "desc" ],
    	sPlaceHolder: "head:after",
			aoColumns: [
						{ type: "text" },//time
						{ type: "text" },//topic
						{ type: "text" },//who
		     			]

		});


   });







 });

