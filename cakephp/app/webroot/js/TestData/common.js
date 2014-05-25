function spanClick() {
	var e = window.event
    var ele = e.target;
    if (ele.tagName == "SPAN") {
        console.log(e.target.id);
        var url = "click:" + e.target.id;
        document.location = url;
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
    ele.onclick = spanClick;
    ele.ontouchend = spanClick;
    console.log("asdf");
}

function bodyDidLoad() {
	addSpanListener();
	console.log("on load");
}

// window.onload=bodyDidLoad;

