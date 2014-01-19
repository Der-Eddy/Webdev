<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="jquery.knob.js"></script>

<input type="text" class="dial" data-min="0" data-max="20" data-thickness=".2" data-fgColor="#66CC66" data-width="100" data-readOnly=true>

<script>
$(function() {
    $(".dial")
    .knob();
    $('.dial')
    .val(15)
    .trigger('change');
});
</script>

<div id="weatherlabel">Wetterbericht:</div>
<div id="weather"><img src="http://www.epic-crafter.de/wp-content/colorful/32.png"></div>

<style>#weatherlabel { position:absolute; top:10px; right:550px; }
#weather { position:absolute; top:15px; right:400px; }</style>