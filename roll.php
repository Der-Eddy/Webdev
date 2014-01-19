<html><head>
<style>body {
    font-family: sans-serif;
    background: #333;
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
}</style>
</head><body>
<h1><a href="http://slipsum.com/">Uuummmm, this is a tasty burger!</a></h1>
<p>Your bones don't break, mine do. That's clear. Your cells react to <a href="http://en.wikipedia.org/wiki/Bacteria">bacteria</a> and <a href="http://en.wikipedia.org/wiki/Virus">viruses</a> differently than mine. You don't get sick, I do. That's also clear. But for some reason, you and I react the exact same way to water. We swallow it too fast, we choke. We get some in our lungs, we drown. However unreal it may seem, we are connected, you and I. We're on the same curve, just on opposite ends. </p>

<h1><a href="http://slipsum.com/">We happy?</a></h1>
<p>You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the <a href="http://en.wikipedia.org/wiki/World">world</a> once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don't know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I'm breaking now. We said we'd say it was the snow that killed the other two, but it wasn't. Nature is lethal but it doesn't hold a candle to man. </p>

<h1><a href="http://slipsum.com/">I gotta piss</a></h1>
<p>Do you see any <a href="http://en.wikipedia.org/wiki/Teletubbies">Teletubbies</a> in here? Do you see a slender plastic tag clipped to my shirt with my name printed on it? Do you see a little Asian child with a blank expression on his face sitting outside on a mechanical helicopter that shakes when you put quarters in it? No? Well, that's what you see at a toy store. And you must think you're in a toy store, because you're here shopping for an infant named Jeb. </p>

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
</body></html>