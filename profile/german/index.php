<html><head>
<title>Der-Eddy's Profiledesign Guide</title>
<meta charset='utf-8'> 
<style>body {
    font-family: sans-serif;
    background: #333 url('../pattern.png') repeat;
    color: #eee;
}

a {
    text-decoration: none;
    color: hsl(0, 80%, 50%);
}

.roll {
    display: inline-block;
    overflow: hidden;

    vertical-align: top;

    -webkit-perspective: 400px;
       -moz-perspective: 400px;

    -webkit-perspective-origin: 50% 50%;
       -moz-perspective-origin: 50% 50%;
}
.roll span {
    display: block;
    position: relative;
    padding: 0 2px;

    -webkit-transition: all 400ms ease;
       -moz-transition: all 400ms ease;
    
    -webkit-transform-origin: 50% 0%;
       -moz-transform-origin: 50% 0%;
    
    -webkit-transform-style: preserve-3d;
       -moz-transform-style: preserve-3d;
}
    .roll:hover span {
        background: #111;

        -webkit-transform: translate3d( 0px, 0px, -30px ) rotateX( 90deg );
           -moz-transform: translate3d( 0px, 0px, -30px ) rotateX( 90deg );
    }
.roll span:after {
    content: attr(data-title);

    display: block;
    position: absolute;
    left: 0;
    top: 0;
    padding: 0 2px;

    color: #fff;
    background: hsl(0, 80%, 40%);

    -webkit-transform-origin: 50% 0%;
       -moz-transform-origin: 50% 0%;

    -webkit-transform: translate3d( 0px, 105%, 0px ) rotateX( -90deg );
       -moz-transform: translate3d( 0px, 105%, 0px ) rotateX( -90deg );
}

#footer { position:absolute; bottom:0; font-size:10px; }</style>
</head><body><center>
<frameset cols="250,*">
  <frame src="menu.html" name="navigation">
  <frame src="main.html" name="main">
</frameset>

<script>var supports3DTransforms =  document.body.style['webkitPerspective'] !== undefined || 
                            document.body.style['MozPerspective'] !== undefined;

function linkify( selector ) {
    if( supports3DTransforms ) {
        
        var nodes = document.querySelectorAll( selector );

        for( var i = 0, len = nodes.length; i < len; i++ ) {
            var node = nodes[i];

            if( !node.className || !node.className.match( /roll/g ) ) {
                node.className += ' roll';
                node.innerHTML = '<span data-title="'+ node.text +'">' + node.innerHTML + '</span>';
            }
        };
    }
}

linkify( 'a' );</script>
</center></body></html>