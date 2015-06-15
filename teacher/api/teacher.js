$(function() {
    //$('.address').ajaddress({ city: "台東縣", county: "池上鄉" });  
    $("#tabs").tabs().addClass("ui-tabs-vertical ui-helper-clearfix");
    $("#tabs li").removeClass("ui-corner-top").addClass("ui-corner-left");


    $(document).ready(function() {

        var setLanguage = {

            "sProcessing": "處理中...",
            "sLengthMenu": "顯示 _MENU_ 項結果",
            "sZeroRecords": "沒有符合結果",
            "sInfo": "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
            "sInfoEmpty": "顯示第 0 至 0 項結果，共 0 項",
            "sInfoFiltered": "(從 _MAX_ 項結果過濾)",
            "sInfoPostFix": "",
            "sSearch": "全部欄位搜尋:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "首頁",
                "sPrevious": "上頁",
                "sNext": "下頁",
                "sLast": "尾頁",
            }
        };

        var opt;

        opt = {
            "oLanguage": setLanguage,
            "lengthMenu": [
                [25, 50, 100, -1],
                [25, 50, 100, "全部"]
            ],
            "bPaginate": true, //開起換頁
            //"sScrollY":"380px", //設定成拉頁y
            //"sScrollX":"400px", //設定成拉頁x
            // "sWidth":"5%",
        };
        $("#table_s").dataTable(opt);


        var table = $('#table_s').DataTable();
        $('#container').css('display', 'block');
        table.columns.adjust().draw();


    });




    $(document).ready(function() { //多搜尋列表

        $('#table_s').dataTable().columnFilter({

            sPlaceHolder: "head:after",



            aoColumns: [{
                    type: "text"
                }, //user_id
                {
                    type: "text"
                }, //user_pw
                {
                    type: "text"
                }, //name
                {
                    type: "select",
                    values: ['男', '女']
                }, //性別
                {
                    type: "select",
                    values: ['老師', '學生']
                }, //身分
                {
                    type: "text"
                }, //county,city
                {
                    type: "text"
                }, //class.grade
                {
                    type: "text"
                }, //email
                null,
            ]

        });


    });




    $("#addone").hide();
    $("#addall").hide();

    

    $("#Btaddone").click(function() {

        $("#addone").dialog({

            //height:500,
            width: 400,
            modal: true, //開遮罩
            resizable: false,


            buttons: {
                "確定": function() {


                    var numengtest = /[a-zA-Z0-9]/;

                    if (numengtest.test($("#user_id").val()) != true) {
                        alert('帳號需改成英文數字格式，請重新輸入！');
                        return;
                    }
                    if (numengtest.test($("#user_pw").val()) != true) {
                        alert('密碼需改成英文數字格式，請重新輸入！');
                        return;
                    } else if ($("#user_id").val().length < 4 || $("#user_id").val().length > 10) {
                        alert("帳號字數不符，請重新輸入！");
                        return;
                    } else if ($("#user_pw").val().length < 6 || $("#user_pw").val().length > 10) {
                        alert("密碼字數不符，請重新輸入！");
                        return;
                    } else if ($("#user_pw").val() !== $("#user_pw2").val()) {
                        alert("請確認密碼等兩個欄位有輸入正確！");
                        return;
                    } else if ($("#user_id").val() == "" ||
                        $("#user_pw").val() == "" ||
                        $("#user_pw2").val() == "" ||
                        $("#name").val() == "" ||
                        $("#gender").val() == "" ||
                        $("#grade").val() == "" ||
                        $("#school").val() == "" ||
                        $("#city").val() == "" ||
                        $("#county").val() == "" ||
                        $("#class").val() == "" ||
                        $("#stu_id").val() == "" ||
                        $("#supervisor").val() == "") {
                        alert("請確認資料是否確實填寫！");
                        return;
                    }

                    $.ajax({ //ajax傳值
                        url: "../../register/api/register.php",
                        type: "POST",
                        data: {

                            identify: "S", //學生身分
                            user_id: $("#user_id").val(),
                            user_pw: $("#user_pw").val(),
                            name: $("#name").val(),
                            gender: $("#gender").val(),
                            grade: $("#grade").val(),
                            school: $("#school").val(),
                            city: $("#city").val(),
                            county: $("#county").val(),
                            nclass: $("#class").val(),
                            stu_id: $("#stu_id").val(),
                            supervisor: $("#supervisor").val(),

                            action: "s_addone"

                        },
                        error: function(e) {
                            alert("error add");
                            return;

                        },
                        success: function(data) {
                            // $("#grid").trigger("reloadGrid");

                            console.log(data); //印出傳送的資料

                            if (data == 'add') {
                                alert("註冊成功，感謝您的加入!");
                                window.location.reload();

                            } else {
                                alert("帳號重複囉!!! 請重新註冊。");
                            }

                            // console.log($("#students_number").val());
                        }
                    })
                    $(this).dialog("close");
                },
                "取消": function() {
                    $(this).dialog("close");
                }
            }
        });

    });

    $("#Btaddall").click(function() {

        $("#addall").dialog({

            //height:500,
            width: 550,
            modal: true, //開起遮罩
            resizable: false,
            buttons: {
                "確定": function() {

                    if ($("#allschool").val() == "" ||
                        $("#allcity").val() == "" ||
                        $("#allcounty").val() == "" ||
                        $("#allclass").val() == "" ||
                        $("#allsupervisor").val() == "") {
                        alert("請確認資料是否確實填寫！");
                        return;
                    }
                    $.ajaxFileUpload({ //ajax傳值

                        url: "../../register/api/register.php",
                        secureuri: false,
                        fileElementId: 'allfile',
                        dataType: 'json',
                        type: 'POST',

                        data: {

                            //identify: 	"S",//學生身分

                            school: $("#allschool").val(),
                            city: $("#allcity").val(),
                            county: $("#allcounty").val(),
                            grade: $("#allgrade").val(),
                            nclass: $("#allclass").val(),
                            supervisor: $("#allsupervisor").val(),

                            action: "importall"

                        },
                        error: function(data, status, e) {
                            alert(e);
                            // alert("error add");
                            return;

                        },
                        success: function(data, status) {

                            console.log(data); //印出傳送的資料

                            if (typeof(data.error) != 'undefined') {
                                if (data.error != '') {
                                    alert(data.error);
                                } else {
                                    alert(data.msg);
                                    window.location.reload();
                                }
                            }



                        }
                    })
                    $(this).dialog("close");
                },
                "取消": function() {
                    $(this).dialog("close");
                }
            }
        });

    });

    $("#postnews").click(function() {

        if ($("#newsp").val() == "" ||
            $("#topic").val() == "") {
            alert("請確認資料是否確實填寫！");
            return;
        }
        //發表文章送出鈕
        var ct = CKEDITOR.instances.editor1.getData();
        $.ajax({
            url: "/first/C/data.php",
            type: "POST",
            data: {
                data: ct,
                topic: $("#topic").val(),
                action: 'savenews'
            },

            error: function() {
                alert("error");
                return;
            },
            success: function(data) {
                alert("已更新最新消息!");
                location.href = "/first/news";
            }
        })

    })

    $("#postindex").click(function() {

        //發表文章送出鈕
        var ct = CKEDITOR.instances.editor2.getData();
        $.ajax({
            url: "/first/C/data.php",
            type: "POST",
            data: {
                data: ct,
                action: 'saveindex'
            },

            error: function() {
                alert("error");
                return;
            },

            success: function(data) {
                alert("已更新首頁!");
                location.href = "/first/";
            }
        })

    })

        $("#postmessage").click(function() {

        if ($("#topic").val() == "" ||
            $("#mtype").val() == ""||
            $("#mtowho").val() == "") {
            alert("請確認資料是否確實填寫！");
            return;
        }

        //發表訊息送出鈕
        var ct = CKEDITOR.instances.editor3.getData();
        $.ajax({
            url: "/first/C/data.php",
            type: "POST",
            data: {
            	topic: $("#topic").val(),
            	mtype: $("#mtype").val(),
                data: ct,
                mtowho: $("#mtowho").val(),

                action: 'savemessage'
            },

            error: function() {
                alert("error");
                return;
            },

            success: function(data) {
                alert("已發送訊息!");
                location.href = "/first/";
            }
        })

    })

    $("#sendseetask").click(function() {
	//alert($("#flist").html());
        if ($("#taskp").val() == ""   	 			||
        	$("#tasktiltle").val() == "" 			||
            $("#subject").val() == "" 				||
            $("input[name=from]").val() == ""  	||
            $("#relate").val() == "" 				||
            $("input[name=degree]").val() == ""	    ||
            $("#tools").val() == ""			        ||
            //$("#").val() == "" 						||
            $("#research_purposes_1").val() == "" 	||
            $("#research_step_1").val() == "" 		||
            $("#discuss_1").val() == "" 			||
            $("#conclusion_1").val() == "" 			||
            $("#research_purposes_2").val() == "" 	||
            $("#research_step_2").val() == "" 		||
            $("#discuss_2").val() == "" 			||
            $("#conclusion_2").val() == "" 			||
            $("#research_purposes_3").val() == ""   ||
            $("#research_step_3").val() == "" 		||
            $("#discuss_3").val() == "" 			||
            $("#conclusion_3").val() == ""			) {
            alert("請確認資料是否確實填寫！");
            return;
        } else {
           var ccc = [];	//tfrom checkbox的值	
		var ddd = [];   //degree checkbox的值

		$("input[name='tfrom[]']:checked").each(function()
		{
		    ccc.push($(this).val());
		});

		$("input[name='degree[]']:checked").each(function()
		{
		    ddd.push($(this).val());
		});

		//alert('2');
		//alert($("#flist").html());
  
        $.ajax({
            url: "/first/C/task.php",
            type: "POST",
            data: {
   
                tasktitle			: $("#tasktitle").val(),
                subject 			: $("#subject").val(),
                tfrom               : ccc,
                relate 				: $("#relate").val(),
                degree				: ddd,
                tools 				: $("#tools").val(),
                toolsbox            : $("#flist").html(),
                research_purposes_1 : $("#research_purposes_1").val(),
                research_step_1		: $("#research_step_1").val(),
                discuss_1			: $("#discuss_1").val(),
                conclusion_1		: $("#conclusion_1").val(),
                research_purposes_2 : $("#research_purposes_2").val(),
                research_step_2		: $("#research_step_2").val(),
                discuss_2			: $("#discuss_2").val(),
                conclusion_2		: $("#conclusion_2").val(),
                research_purposes_3 : $("#research_purposes_3").val(),
                research_step_3		: $("#research_step_3").val(),
                discuss_3			: $("#discuss_3").val(),
                conclusion_3		: $("#conclusion_3").val(),                

                action: 'save'

            },

            error: function() {
                alert("error");
                return;
            },
            success: function(data) {
                alert("已新增實驗任務!");
                location.href = "/first/teacher/editask/nowtask/";
            }
        })

            
        }
    })

     $("#sendnewtask").hide();//送出按鈕
     $("#canceltask").hide(); //修改按鈕

	 /*
    $("#sendnewtask").click(function() {

		var ccc = [];	//tfrom checkbox的值	
		var ddd = [];   //degree checkbox的值

		$("input[name='tfrom[]']:checked").each(function()
		{
		    ccc.push($(this).val());
		});

		$("input[name='degree[]']:checked").each(function()
		{
		    ddd.push($(this).val());
		});

		alert('test');

  
        $.ajax({
            url: "/first/C/task.php",
            type: "POST",
            data: {
   
                tasktitle			: $("#tasktitle").val(),
                subject 			: $("#subject").val(),
                tfrom               : ccc,
                relate 				: $("#relate").val(),
                degree				: ddd,
                tools 				: $("#tools").val(),
                toolsbox            : $("#flist").html(),
                research_purposes_1 : $("#research_purposes_1").val(),
                research_step_1		: $("#research_step_1").val(),
                discuss_1			: $("#discuss_1").val(),
                conclusion_1		: $("#conclusion_1").val(),
                research_purposes_2 : $("#research_purposes_2").val(),
                research_step_2		: $("#research_step_2").val(),
                discuss_2			: $("#discuss_2").val(),
                conclusion_2		: $("#conclusion_2").val(),
                research_purposes_3 : $("#research_purposes_3").val(),
                research_step_3		: $("#research_step_3").val(),
                discuss_3			: $("#discuss_3").val(),
                conclusion_3		: $("#conclusion_3").val(),                

                action: 'save'

            },

            error: function() {
                alert("error");
                return;
            },
            success: function(data) {
                alert("已新增實驗任務!");
                location.href = "/first/teacher/editask/nowtask/";
            }
        })


    })*/

    $("#canceltask").click(function() {


	    $("#sendseetask").show(); //顯示預覽按鈕
	    $("#sendnewtask").hide(); //隱藏取消按鈕
	    $("#canceltask").hide();  //隱藏送出按鈕

        $("span#show").prev().show().end().remove();
        //前一個function加入的表單value標籤，都有加一個<span id="show"></span>
        //因此用$("span#show")選取所有標籤為span id為show的元素，然後把他的前一個
        //同輩元素顯示，end()表示返回$("span#show")這個元素，然後移除掉。

        $("input:text").show();                     //所有<input type="text">顯示
        $("input:radio").each(function () {         //所有<input type="radio">顯示

            $(this).show();
            $(this).next("label").show();           //將後面的label顯示
        });

        $("select").show();                          //所有<select>顯示

        $("input:checkbox").each(function () {      //所有<input type="checkbox">顯示
            $(this).show();
            $(this).next("label").show();           //將後面的label顯示

        });

   

    })

     $("#taskguide").hide(); //隱藏任務導引
	 $("#tasklearn").hide();  //隱藏送出按鈕

   $("#newtask1").click(function() {//點擊新增任務引導
	     $("#taskguide").show(); //顯示新增任務內容
	     $("#tasklearn").hide();
    })

   $("#newtask2").click(function() {//點擊新增任務學習單
	     $("#tasklearn").show(); //顯示新增任務學習單
	     $("#taskguide").hide();
    })





});










function previewClick() { //預覽..

    $("#sendseetask").hide(); //預覽按鈕隱藏
    $("#sendnewtask").show(); //送出按鈕顯示
    $("#canceltask").show();  //取消按鈕顯示


    $("input:text").hide().each(function() { //所有<input type="text">隱藏
        //標籤之後加上輸入的value
        $(this).after("<span id='show'>" + this.value + "</span>");

    });


    $("textarea").hide().each(function() { //所有<input type="text">隱藏
        //標籤之後加上輸入的value
        $(this).after("<span id='show'>" + this.value + "</span>");

    });

    $("select").hide().each(function() { //所有<select>隱藏
        //標籤之後加上選取的text
        $(this).after("<span id='show'>" + this[this.selectedIndex].text + "</span>");
    });

    $("input:radio").each(function() { //所有<input type="radio">隱藏
        //沒選到的後面一個label隱藏
        $(this).hide();
        if (!this.checked) {
            $(this).next("label").hide();
        }

    $("input:checkbox").each(function() {
            //所有<input type="checkbox">隱藏
            //沒選到的後面一個label隱藏
            $(this).hide();
            if (!this.checked) {
                $(this).next("label").hide();
            }
        });
    });

}



function delCheck() {
    var flag = window.confirm("你確認要刪除嗎?");
    if (flag == true) {} else if (flag == false) {
        window.event.returnValue = false;
    }

}

function sure() {
    var flag = window.confirm("你確認要送出資料嗎?");
    if (flag == true) {} else if (flag == false) {
        window.event.returnValue = false;
    }

}
