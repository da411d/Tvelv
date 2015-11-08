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
}

function eLoad(t){
	req = connect(t);
	document.getElementById('header').innerHTML = req[0];
	document.getElementById('main').innerHTML = req[1];
}

function rand(mi, ma){return Math.floor(Math.random() * (ma - mi + 1) + mi);}

function connect(t){
	u = 'connector.php?'+t;
	if (u.match(/\?/)) {
		u += '&z='+rand(1000000, 9999999);
	} else {
		u += '?z='+rand(1000000, 9999999);
	}
	html = ajax(u);
	html = JSON.parse(html);
	return html;
}












function createTable(t) {
	var table = document.createElement('table')
	obj = JSON.parse(t);
	obj = obj.table;
	for(i=0;i<obj.length;++i){
		table.innerHTML += "<tr><td>" +obj[i].Date + "<td>" + obj[i].Time + "<td>" + obj[i].Class + "<td>" + obj[i].Student + "<td>" + obj[i].Teacher + "<td>" + obj[i].Mark + "<td>" + obj[i].Info + "</tr>";
	}
	return table;
}