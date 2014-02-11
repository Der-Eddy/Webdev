<table border="0">
    <tr><td>Start Value:</td><td><input type="text" id="first" value="2" onkeyup="this.value=this.value.replace(/[^\d]/,'')"></td></tr>
    <tr><td>End Value:</td><td><input type="text" id="second" value="9001" onkeyup="this.value=this.value.replace(/[^\d]/,'')"></td></tr>

    <tr><td>Result #1:</td><td><input type="text" id="res1" value="-" readonly></td><td><button onclick="gen(1)">Generate</button></td></tr>
    <tr><td>Result #2:</td><td><input type="text" id="res2" value="-" readonly></td><td><button onclick="gen(2)">Generate</button></td></tr>
</table>

<script type="text/javascript">
    var res1 = document.getElementById("res1").value;
    var res2 = document.getElementById("res2").value;
    var fInput = document.getElementById("first").value;
    var sInput = document.getElementById("second").value;
    var i = 0;
    
    function gen(inputs = 0) {
        setTimeout(function() {
            random = Math.floor((Math.random() * sInput) + fInput);
            i++;
            console.log(random, inputs, sInput, fInput, i);
            switch (inputs) {
                case 1:
                    document.getElementById("res1").value = random;
                    break;
                case 2:
                    document.getElementById("res2").value = random;
                    break;
            }
            if (i < Math.floor((Math.random() * 20) + 1)) {
                gen(inputs);
            } else {
                i = 0;
            }
        }, 100)
    }
</script>