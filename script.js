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
	Load();
}

function onHashChange(){
	Load();
}

function Load(){
	req = connect(parser(window.location, 'hash'));
	document.getElementById('header').innerHTML = req[0];
	document.getElementById('main').innerHTML = req[1];
}

function connect(t){
	t = t.substring(1, t.length);
	html = ajax('connector.php?a='+t);
	html = JSON.parse(html);
	return html;
}