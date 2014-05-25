
isMove = false;

var action;
var isiOS = false;
var agent = navigator.userAgent.toLowerCase();


function touchend(event){
    var now = new Date().getTime();
    var lastTouch = $(this).data('lastTouch') || now + 1 /** the first time this will make delta a negative number */;
    var delta = now - lastTouch;
    clearTimeout(action);
    if(delta < 400 && delta > 0){
        event.preventDefault();
        // the second touchend event happened within half a second. Here is where we invoke the double tap code
        spanDblClick(event);      
    }else{
        $(this).data('lastTouch', now);
        action = setTimeout(function(e){
            // If this runs you can invoke your 'click/touchend' code
            spanCheckIfClick(event);             
            clearTimeout(action);   // clear the timeout
        }, 400, [event]);
    }
    $(this).data('lastTouch', now);
}

function spanCheckIfClick(e) {
    if(isMove == false) {
        spanClick(e);    
    }
    //alert("touch");
}

function touchBegin(e) {
    isMove = false;    
}

function touchMove(e) {
    isMove = true;    
}

function spanClick(e) {
	var e = e || window.event ;
    var ele = e.target;
    if (ele.tagName == "SPAN") {
        //console.log(e.target.id + " | " +times_indexed_by_id[e.target.id]);
        var time = times_indexed_by_id[e.target.id];
        //$('jquery_jplayer_1').jPlayer( "playHeadTime", time);
        window.myCirclePlayer.myTimeupdate(time);
        //var url = "click:" + e.target.id;
        //document.location = url;
    }
}

function spanDblClick(e) {
	var e = e || window.event ;
    var ele = e.target;
    if (ele.tagName == "SPAN") {
        //console.log(e.target.id + " | " +times_indexed_by_id[e.target.id]);
        var time = times_indexed_by_id[e.target.id];
        console.log("dblClick time " + time + "id " + e.target.id);
        //$('jquery_jplayer_1').jPlayer( "playHeadTime", time);
        //window.myCirclePlayer.myTimeupdate(time);
        //var url = "click:" + e.target.id;
        //document.location = url;
    }
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
	/*for(var i = 1;;i++) {
		var ele = document.getElementById(i);
		if (ele == null) {
			console.log(i);
			break;
		}
		ele.onclick = spanClick;
	}*/
    var ele = document.getElementsByTagName('body')[0];
    //ele.onclick = spanClick;
    //ele.ontouchend = spanClick;
    //ele.ondblclick = spanClick;
    //ele.onclick = spanClick;
    //ele.ondblclick = spanDblClick;
    //ele.onclick = touchend;
    //ele.ondblclick = ;
    if (isiOS) {
        // implement double-tap
           
    } else {
        // implement double click
          
    }
    //ele.ontouchend = touchend;
    //ele.ontouchstart = touchBegin;
    //ele.ontouchmove = touchMove;
    //ele.onclick = touchend;
    //ele.onclick = touchend;
    ele.addEventListener("click", touchend, false);
    ele.addEventListener("touchend", touchend, false);
    ele.addEventListener("touchstart", touchBegin, false);
    ele.addEventListener("touchmove", touchMove, false);
    ele.addEventListener("mousedown", touchBegin, false);
    ele.addEventListener("mousemove", touchMove, false);
    ele.addEventListener("mouseup", touchend, false);

    //ele.addEventListener("touchend", touchend, false);
    //ele.ontouchstart = touchBegin;
    //ele.ontouchmove = touchMove;
    //console.log("asdf");
}

function bodyDidLoad() {
	addSpanListener();
    if(agent.indexOf('iphone') >= 0 || agent.indexOf('ipad') >= 0){
           isiOS = true;
    }
	console.log("on load");
}

// window.onload=bodyDidLoad;

