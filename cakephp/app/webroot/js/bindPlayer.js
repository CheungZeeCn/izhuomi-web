$(document).ready(function(){
    var myCirclePlayer = new CirclePlayer("#jquery_jplayer_1",
    {
        mp3: <?php echo "'$mp3File'"; ?> ,
    }, {
        cssSelectorAncestor: "#cp_container_1",
        swfPath: "js",
        wmode: "window",
        keyEnabled: true
    });
    window.myCirclePlayer = myCirclePlayer;
});
