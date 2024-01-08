
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scripts & Iframes</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</head>

<body>
    
    <h3>Blocker for Script & Iframe</h3>

    <form id="blockForm">
        <label>
            <input type="checkbox" id="blockGoogleAds"> Block Google Ads
        </label>
        <br>
        <label>
            <input type="checkbox" id="blockGoogleAnalytics"> Block Google Analytics
        </label>
        <br>
        <label>
            <input type="checkbox" id="blockSoundCloud"> Block SoundCloud
        </label>
        <br>
        <label>
            <input type="checkbox" id="blockYoutube"> Block YouTube Embed
        </label>
        <br>  <br>
        <label>
             Block Pattern:
            <input type="text" id="pattern">
        </label>
        <br>  <br>
        <button type="button" onclick="formSubmit()">Save</button>
    </form>

    <script>
        function formSubmit() {
            var blockGoogleAds  = document.getElementById('blockGoogleAds').checked;
            var blockGoogleAnalytics = document.getElementById('blockGoogleAnalytics').checked;
            var blockSoundCloud = document.getElementById('blockSoundCloud').checked;
            var blockYoutube    = document.getElementById('blockYoutube').checked;
            var customPattern   = document.getElementById('pattern').value;

            var scripts = document.querySelectorAll('script');
            var iframes = document.querySelectorAll('iframe');

            scripts.forEach(function (myscript) {

                //console.log("RES"+myscript.innerText)

                if (blockGoogleAds && myscript.src.includes('pagead2.googlesyndication.com')) {
                    console.log("addRES"+myscript)
                    myscript.remove();
                   // myscript.parentNode.removeChild(myscript);
                }
                if (blockGoogleAnalytics && myscript.src.includes('www.google-analytics.com')) {
                    console.log('anystics removed'+myscript);
                    myscript.parentNode.removeChild(myscript);
                }
                if (blockSoundCloud && myscript.src.includes('connect.soundcloud.com')) {
                    console.log('cloud removed'+script);
                    myscript.parentNode.removeChild(script);
                }
                if (customPattern && myscript.src.includes(customPattern)) {
                    console.log('PATTERN CUSTOME'+script);
                    myscript.parentNode.removeChild(myscript);
                }
            });

            if (blockYoutube) {
                var youtubeIframe = document.getElementById('ytplayer');
                if (youtubeIframe) {
                    console.log('youtube removed');
                    youtubeIframe.parentNode.removeChild(youtubeIframe);
                }
            }
        }
    </script>

     <?php  include('SAMPLE-HTML.html'); ?>

</body>

</html>
