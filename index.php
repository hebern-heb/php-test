<?php
if(isset($_POST['SubmitButton'])){

    $selectedScripts = isset($_POST['scripts']) ? $_POST['scripts'] : [];
    $customPattern = isset($_POST['custom_pattern']) ? $_POST['custom_pattern'] : '';
	
    $blockScriptsCode = generateBlockScriptsCode($selectedScripts, $customPattern);
    echo "<script>{$blockScriptsCode}</script>";
}

function generateBlockScriptsCode($selectedScripts, $customPattern) {
    $code = '';

    foreach ($selectedScripts as $script) {
		
        switch ($script) {
            case 'google-ads':
                $code .= "blockGoogleAds();";
                break;
            case 'google-analytics':
                $code .= "blockGoogleAnalytics();";
                break;
            case 'soundcloud':
                $code .= "blockSoundCloud();";
                break;
            case 'youtube-embed':
                $code .= "blockYouTubeEmbed();";
                break;
        }
    }

    // Block custom pattern
    if (!empty($customPattern)) {
        $code .= "blockCustomPattern('{$customPattern}');";
    }

    return $code;
}
?>

<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
    <form method="post">
        <label><input type="checkbox" name="scripts[]" value="google-ads"> Block Google Ads</label><br>
        <label><input type="checkbox" name="scripts[]" value="google-analytics"> Block Google Analytics</label><br>
        <label><input type="checkbox" name="scripts[]" value="soundcloud"> Block SoundCloud</label><br>
        <label><input type="checkbox" name="scripts[]" value="youtube-embed"> Block YouTube Embed</label><br>
        <label>Custom Script: <input type="text" name="custom-pattern"></label><br>
        <button type="submit"  name="SubmitButton">Save</button>
    </form>
</body>
</html>
