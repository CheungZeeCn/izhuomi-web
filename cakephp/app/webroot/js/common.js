var action;
var agent = navigator.userAgent.toLowerCase();
var platformName = '';
var _timeout;
var search_word
//var search_description

function spanClick(e) {
	var e = e || window.event ;
    var ele = e.target;
    var id = ele.id
    //console.log(ele);
    if (ele.tagName == "SPAN") {
        //console.log(e.target.id + " | " +times_indexed_by_id[e.target.id]);
        var time = times_indexed_by_id[id];
        //$('jquery_jplayer_1').jPlayer( "playHeadTime", time);
        window.myCirclePlayer.myTimeupdate(time);
        //var url = "click:" + e.target.id;
        //document.location = url;
    } else {
        //alert(ele.tagName);
    }
}

function spanDblClick(e) {
	var e = e || window.event ;
    var ele = e.target;
    if (ele.tagName == "SPAN") {
        //console.log(e.target.id + " | " +times_indexed_by_id[e.target.id]);
        var time = times_indexed_by_id[e.target.id];
        console.log("dblClick time " + time + "id " + e.target.id);
        //alert("dblClick time " + time + "id " + e.target.id);
        var word = $("#"+e.target.id).text();
        word = word.replace(/^(\W+)|(\W+)$/g, '');
        //replaceAll('^\W+|\W+$', '');
        
        //var url = "../../Translator/view/" + word;
        var url = "../../TranslatorData/getWord/" + word + ".json";
        //$( '#wordIframe' ).contentWindow.document.body.innerHTML = ''; 
        $.ajax({
        url: url,
        }).done(function(ret) {
            //alert(ret);
            var html = makeItHtml(ret);
            if(html == '') {
                html = '嗷嗷~ 没有找到关于 ' + word +' 的解释。';
            }
            $( '#wordMsg').html(html);
            $( '#popupWordDict').popup('open', {positionTo: '#' + e.target.id});
        });
        //$( '#wordMsg').html("something about word:"+ word);
        //$( '#wordMsg').html(ret._word);
        //$( '#wordIframe' ).attr('src',url); 
        //$( '#popupWordDict').popup('open');
        //$( '#popupWordDict').popup('open');
    }
}

function makeItHtml(ret) {
    if(ret == undefined || ret.return['_word'] == undefined) {
        console.log("sth. is wrong in quering dictionary in server, sorry.");
        return '';
    } else { 
        ret = ret.return;
        var word = ret['_word'];
        var from = ret['_from'];
        ret = ret['_basic'];
        var phonetic = '';
        if(ret['phonetic']) {
            phonetic = ret['phonetic'];
        } else if (ret['us-phonetic']) {
            phonetic = ret['us-phonetic'];
        }
        var explains = '';
        for(i in ret['explains']) {
            explains += (ret['explains'][i] + "<br />");
        }

        // pass the argument to the addWord() function

        String.format = function(src){
            if (arguments.length == 0) return null;
            var args = Array.prototype.slice.call(arguments, 1);
            return src.replace(/\{(\d+)\}/g, function(m, i){
                return args[i];
            });
        };

        // pass the argument to the addWord() function
        //search_description = explains;
        search_word = word;
        var tmp = '' +
        '<h2 id="title">' +
            '{0};' +
        '                <span id="phonetic">[ {1} ]</span>' +
        '                <a id="more" href="http://dict.youdao.com/search?keyfrom=selector&amp;q={2}" target="_blank" hidefocus="true"><span style="font-size:22px" class="glyphicon glyphicon-globe"> </span></a>' +
        '                <a id="add" href="javascript:void(0);" onclick="addWord(search_word);"> <span style="font-size:22px" class="glyphicon glyphicon-plus"></span> </a>' +
        '            </h2>' +
        '            <hr class="clear-hr">' +
        '            <div id="basic">' +
        '                {4}' +
        '            </div>' +
        '            <hr class="clear-hr">' +
        '            <div id="from">' +
        '               <p> 来自: {5} </p>' +
        '            </div>';
        return   String.format(tmp, word, phonetic, word, word, explains, from);
    }
    return '';
}

function printHello(){
    alert("hello world\n");
}

function addWord(name){
    var url = "../../IzArticles/addWord/" + name + ".json";
    console.log(url);
    $.ajax({
        url: url,
    }).done(function(data){
        if(data.status == 'OK'){
            alert("successfully add the word to db");
        }else{
            alert("need to login");
            document.location.href="../../IzUsers/login";          
        }
    });
}

function highlight(fromId, toId, highlight) {
    // id start from 1
    if (fromId < 1) {
        fromId = 1
    }
    
	for (var i = fromId; i <= toId; i++) {
		var ele = document.getElementById(i);
		if (ele == null) {
			break;
		}
		if (highlight) {
			ele.style.backgroundColor = "#ffc726"
		}
		else {
			ele.style.backgroundColor = "transparent"
		}
	}
}

function resizeText(multiplier) {
    var bodyEle = document.body;
    if (bodyEle.style.fontSize == "") {
        bodyEle.style.fontSize = "9pt"; // TODO: set to the same as css default size
    }
    
    var fontSize = parseFloat(bodyEle.style.fontSize) + (multiplier * 1) + "pt";
    
    // TODO: set Max min
    
    bodyEle.style.fontSize = fontSize;
}

function spanFrameById(id) {
    var ele = document.getElementById(id);
    if (ele) {
        return ele.offsetLeft + "," + ele.offsetTop + "," + ele.offsetWidth + "," + ele.offsetHeight;
    }
}

function spanIdFromPoint(x, y) {
    var ele = document.elementFromPoint(x, y)
    return "" + ele.id;
}

function addSpanListener() {
    var ele = document.getElementsByTagName('body')[0];
    var options = {
        preventDefault: true,
        tap_always:false,
        behavior: {
            userSelect: true
       }
    };
    var h = new Hammer(ele, {tap_always:false, behavior: { userSelect: true }});
    //single click or tap
    h.on("tap", function(e){
        _timeout = setTimeout(function(e){
            spanClick(e);             
            window.clearTimeout(_timeout);   // clear the timeout
        }, 400, e);
    });
    var hh = new Hammer(ele, options);
    //double click or tap for all except android
    if(platformName == 'desktop') {
        hh.on("doubletap", function(e){
            e.preventDefault();
            //clean thimeout;
            window.clearTimeout(_timeout);
            _timeout = null; 
            spanDblClick(e);
        });
    }
    //long tap for android and all
    hh.on("hold", function(e) {
        e.preventDefault();
        //clean thimeout;
        window.clearTimeout(_timeout);
        _timeout = null; 
        spanDblClick(e);
    });
}

function bodyDidLoad() {
    if(agent.indexOf('iphone') >= 0 || agent.indexOf('ipad') >= 0){
        platformName = 'ios';
    } else if(agent.indexOf('android') >= 0 || agent.indexOf('xiaomi') >= 0) {
        platformName = 'android';
    } else {// not exactly
        platformName = 'desktop';
    }

	addSpanListener();
    
	console.log("on load");
}

// window.onload=bodyDidLoad;
