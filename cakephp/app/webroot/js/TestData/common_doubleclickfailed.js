var timer;
var lastSpanId;

function spanSingleClick(spanId) {
    timer = null;
    lastSpanId = null;
	console.log("click:" + spanId);
	var url = "click:" + spanId;
//    document.location = url;
}

function spanDoubleClick(spanId) {
	console.log("dblclick:" + spanId);
	var url = "dblclick:" + spanId;
//    document.location = url;
}

function spanClick() {
    var e = window.event;
    var spanId = e.target.id;
    
    if (timer) {
        console.log("clear timer");
        clearTimeout(timer);
        timer = null;
    }
    
    if (lastSpanId == spanId) {
        spanDoubleClick(spanId);
    }
    else {
        console.log("timer");
        lastSpanId = spanId;
        timer = setTimeout(function(){spanSingleClick(spanId)}, 250);
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


function addSpanListener() {
	for(var i = 1;;i++) {
		var ele = document.getElementById(i);
		if (ele == null) {
			console.log(i);
			break;
		}
		ele.onclick = spanClick;
	}
}

function bodyDidLoad() {
	addSpanListener();
	console.log("on load");
}

// window.onload=bodyDidLoad;

