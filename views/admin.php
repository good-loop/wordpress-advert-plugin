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
        To get started with Good-loop, simply go to your <a href="/wp-admin/widgets.php">widgets menu</a> and drag a "Good-loop ad unit" into one of your sidebars. The adunit will take care of setup for you.<br/>
        Visit your <a href='https://portal.good-loop.com/#publisher/'>publisher portal</a> for more in-depth settings.
    </p>
    <h1>Explanation of widget settings</h1>
    <p>
        If you are unhappy with the size or shape of the adwidget, you can choose from one of five presets in the <a href="/wp-admin/widgets.php">widgets menu</a>.
        In the widget menu, you will see the following options:
        <ul>
            <li><b>Choose for me:</b> allow the adunit to pick the best size to fill the space provided</li>
            <li><b>Medium rectangle:</b> a 300px by 250px block</li>
            <li><b>Leaderboard:</b> a narrow (728px by 90px) banner that runs across the page</li>
            <li><b>Sticky footer:</b> a thin (90px) banner that occupies the full width of the page. It will remain visible to the user even after scrolling</li>
            <li><b>Vertical banner:</b> a 120px by 240px block that runs vertically down the page</li>
            <li><b>Billboard:</b> a large 970px by 250px rectangle. Best placed at the top or bottom of a page</li>
        </ul>
        You can control the size of the adunit visible to mobile and desktop/laptop users separately. If all of this feels a little bit abstract, you could always play around with the settings
        to see which looks best on your page (refresh the page to see your changes). Failing that, the default setting ("Choose for me") is always easiest.
    </p>
</div>