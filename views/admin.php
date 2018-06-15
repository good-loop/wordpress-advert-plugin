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
<div>
    <p>Adunit variant</p>
    <form action="options.php" method="post">
        <?php
            settings_fields('good_loop');
            do_settings_sections('good_loop');
        ?>
        <input type="radio" name="dataFormat" value="">
            <label>default</label>
        </input>
        <input type="radio" name="dataFormat" value="medium-rectangle">
            <label>medium-rectangle</label>
        </input>
        <input type="radio" name="dataFormat" value="leaderboard">
            <label>leaderboard</label>
        </input>
        <input type="radio" name="dataFormat" value="sticky-footer">
            <label>sticky-footer</label>
        </input>
        <input type="radio" name="dataFormat" value="vertical-banner">
            <label>vertical-banner</label>
        </input>
        <p>Adunit mobile variant</p>
        <input type="radio" name="dataMobileFormat" value="">
            <label>default</label>
        </input>
        <input type="radio" name="dataMobileFormat" value="medium-rectangle">
            <label>medium-rectangle</label>
        </input>
        <input type="radio" name="dataMobileFormat" value="leaderboard">
            <label>leaderboard</label>
        </input>
        <input type="radio" name="dataMobileFormat" value="sticky-footer">
            <label>sticky-footer</label>
        </input>
        <input type="radio" name="dataMobileFormat" value="vertical-banner">
            <label>vertical-banner</label>
        </input>
        <button type="submit">Submit changes</button>
    </form>
</div>
