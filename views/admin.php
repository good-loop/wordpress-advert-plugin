<div style="float: left; width: 550px;">
    <script>
        window.onload = function(e) {
            var goodLoopPubBase = 'https://portal.good-loop.com/#publisher/';
            var pubURL = goodLoopPubBase + (window.location.hostname||'');

            document.querySelector("p > a").setAttribute('href', pubURL);
        }
    </script>

    <h1>Good-loop Wordpress Widget</h1>
    <p>
        Visit your <a href='https://portal.good-loop.com/#publisher/'>publisher portal</a> to manage your settings and claim your earnings.
    </p>
</div>
