function commonLoad(){
	document.title = 'Завантаження';
	Load();
	
}

function onLoad(){
	if(!window.location.hash){
		window.location.hash='#profile';
	}
	commonLoad();
}

function onHashChange(){
	commonLoad();
}

function Load(){
	t = parser(window.location, 'hash').replace('?','&');
	t = t.substring(1, t.length);
	req = connect('a='+t);
	if(req['header']){
		document.getElementById('title').innerHTML = req['header'];
		document.title = req['header'];
	}
	if(req['main']){
		document.getElementById('main').innerHTML = req['main'];
	}
	if(req['eval']){
		eval(req['eval']);
	}
}

function eLoad(t){
	req = connect(t);
	if(req['header']){
		document.getElementById('header').innerHTML = req['header'];
		document.title = req['header'];
	}
	if(req['main']){
		document.getElementById('main').innerHTML = req['main'];
	}
	if(req['eval']){
		eval(req['eval']);
	}
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

	html = YmFzZTY0.decode(html);
	html = explode('=====', html)[1];
	html = JSON.parse(html);
	return html;
}

function parser(loc, param){
	var parser = document.createElement('a');
	parser.href = loc;
	/*
	parser.protocol; // => "http:"
	parser.hostname; // => "example.com123"
	parser.port;     // => "3000"
	parser.pathname; // => "/pathname/"
	parser.search;   // => "?search=test"
	parser.hash;     // => "#hash"
	parser.host;     // => "example.com:3000"
	*/
	return parser[param];
}

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


function ajaxPost(t, data){
	var xhr = new XMLHttpRequest();
	xhr.open('POST', t, 0);
	xhr.send(data);
	if (xhr.status != 200) {
		console.error( xhr.status + ': ' + xhr.statusText );
	} else {
		return xhr.responseText;
	}
}

function submitForm(event){
	var params = getFormResults(event.target);
	t = parser(window.location, 'hash').replace('?','&');
	t = t.substring(1, t.length);
	t = 'connector.php?a='+t;
	if (t.match(/\?/)) {
		t += '&z='+rand(1000000, 9999999);
	}else{
		t += '?z='+rand(1000000, 9999999);
	}
	ajaxPost(t, params);

	html = trim(explode('dG2Sp6rW', html)[0], explode('dG2Sp6rW', html)[1]);
	html = html.replace('vI24mDj3', '=');
	html = html.replace('vI24mDj3', '=');

	html = YmFzZTY0.decode(html);
	html = explode('=====', html)[1];
	html = JSON.parse(html);
	return html;
	req = connect('a='+t);
	if(req['header']){
		document.getElementById('title').innerHTML = req['header'];
		document.title = req['header'];
	}
	if(req['main']){
		document.getElementById('main').innerHTML = req['main'];
	}
	if(req['eval']){
		eval(req['eval']);
	}
}

var I = setInterval(function(){cl=connect('a=ajax&in=checkLogined').main;if(window.location.hash.indexOf('#login')!=0 && cl==0){window.location.hash = '#login?_='+window.location.pathname}else if(cl==1 && window.location.hash.indexOf('#login')==0){window.location.hash = $_GET('_')}}, 5000);

(function() {
	document.addEventListener('submit', function(event) {
		if(event.target.tagName.toLowerCase()=='form'){
			event.preventDefault();
			submitForm(event);
		}
	}, false);
})();

function loadStudents(e){
	students = JSON.parse(connect("a=ajax&in=getStudentsByClass-"+e.value).main);
	studentsHTML = '';
	for(a in students){
		studentsHTML += '<option value="'+students[a]['Login']+'">'+students[a]['SecondName']+' '+students[a]['Name']+'</option>'
	}
	document.getElementsByName('student')[0].innerHTML = studentsHTML;
}