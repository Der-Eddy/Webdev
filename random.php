<table border="0">
    <tr><td>Start Value:</td><td><input type="text" id="first" value="2" onkeyup="this.value=this.value.replace(/[^\d]/,'')"></td></tr>
    <tr><td>End Value:</td><td><input type="text" id="second" value="9001" onkeyup="this.value=this.value.replace(/[^\d]/,'')"></td></tr>

    <tr><td>Result #1:</td><td><input type="text" id="res1" value="-" readonly></td><td><button onclick="gen(1)">Generate</button></td></tr>
    <tr><td>Result #2:</td><td><input type="text" id="res2" value="-" readonly></td><td><button onclick="gen(0)">Generate</button></td></tr>
</table>

<script type="text/javascript">
    var res1 = document.getElementById("res1").value;
    var res2 = document.getElementById("res2").value;
    var fInput = document.getElementById("first").value;
    var sInput = document.getElementById("second").value;
    var i = 1;
    
    function gen(inputs = 0) {
        setTimeout(function() {
            alert(sInput, fInput);
            res2.value = Math.floor((Math.random() * sInput) + fInput);
            i++;
            console.log(i);
            if (i < Math.floor((Math.random() * 50) + 1)) {
                gen();
            }
        }, 500)
    }
</script>