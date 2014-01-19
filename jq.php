<!doctype html>
 
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>jQuery</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <style type='text/css'>
    .ui-progressbar .ui-progressbar-value { background-image: url(images/pbar-ani.gif); }
    td {
      text-align:center;
      vertical-align:middle;
    }
    .bg {background-color: lightgoldenrodyellow;}
    .grey {background-color: lightgrey;}
    .ui-resizable-se {
        bottom: 17px;
    }
    </style>
    <script>
    $(function() {
        $("#progressbar").progressbar({value: 1});
        $("#progressbar .ui-progressbar-value").animate({width: "97%"}, {queue: false});
        $('#progressbar').height(20);
        $('#progressbar').width(200);
        $( "#resizable" ).resizable({
            handles: "se"
        });
    });
    </script>
</head>
<body>
 
<div id="progressbar"></div><br><br>
<table class="Check" border="1">
    <tr class="grey"><td><b>Name</b></td><td><b>Einkauf</b></td><td><b>PSC</b></td><td><b>Checkbox</b></td></tr>
    <tr class="first"><td>Eduard</td><td>Kick Hack</td><td>0529-3566-5118-2651</td><td><input type="checkbox" id="solid" /></td></tr>
    <tr class="second"><td>Anton</td><td>P0rn</td><td>0199-9385-5729-0877</td><td><input type="checkbox" id="solid" /></td></tr> 
</table><br>
<button>Würze</button>
<textarea id="resizable" rows="5" cols="20"></textarea>

<script>
    $("input[type='checkbox']").change(function(){
    if($(this).is(":checked")){
        $(this).parent().parent().addClass("bg"); 
    }else{
        $(this).parent().parent().removeClass("bg");  
    }
});
</script>
</body>
</html>