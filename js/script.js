function rand(mi, ma){return Math.floor(Math.random() * (ma - mi + 1) + mi);}
function trim(e,r){r=r?r.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g,"$1"):" s ";var n=new RegExp("^["+r+"]+|["+r+"]+$","g");return e.replace(n,"")}
function explode(t,e){var n={0:""};return 2!=arguments.length||"undefined"==typeof arguments[0]||"undefined"==typeof arguments[1]?null:""===t||t===!1||null===t?!1:"function"==typeof t||"object"==typeof t||"function"==typeof e||"object"==typeof e?n:(t===!0&&(t="1"),e.toString().split(t.toString()))}
function ajax(t){
	var xhr = new XMLHttpRequest();
	xhr.open('GET', t, 0);
	xhr.send();
	if (xhr.status != 200) {
		console.error( xhr.status + ': ' + xhr.statusText );
	} else {
		return( xhr.responseText );
	}
}

function parser(loc, param){
	var parser = document.createElement('a');
	parser.href = loc;
	
	parser.protocol; // => "http:"
	parser.hostname; // => "example.com123"
	parser.port;     // => "3000"
	parser.pathname; // => "/pathname/"
	parser.search;   // => "?search=test"
	parser.hash;     // => "#hash"
	parser.host;     // => "example.com:3000"

	return parser[param];
}

function onLoad(){
	if(!window.location.hash){
	window.location.hash='#profile';
	}
	Load();
}

function onHashChange(){
	Load();
}

function Load(){
	t = parser(window.location, 'hash');
	t = t.substring(1, t.length);
	req = connect('a='+t);
	document.getElementById('header').innerHTML = req[0];
	document.getElementById('main').innerHTML = req[1];
	if(req[2]){eval(req[2]);}
}

function eLoad(t){
	req = connect(t);
	document.getElementById('header').innerHTML = req[0];
	document.getElementById('main').innerHTML = req[1];
	if(req[2]){eval(req[2]);}
}

function connect(t){
	u = 'connector.php?'+t;
	if (u.match(/\?/)) {
		u += '&z='+rand(1000000, 9999999);
	} else {
		u += '?z='+rand(1000000, 9999999);
	}
	html = ajax(u);
	html = trim(explode('dG2Sp6rW', html)[0], explode('dG2Sp6rW', html)[1]);
	html = html.replace('vI24mDj3', '=');
	html = html.replace('vI24mDj3', '=');

	html = Base64.decode(html);
	html = explode('=====', html)[1];
	html = JSON.parse(html);
	return html;
}