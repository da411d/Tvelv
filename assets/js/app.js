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
	t = window.location.hash.replace('?','&');
	t = t.substring(1, t.length);
	connect('a='+t, defaultLoader);
}
function defaultLoader(e){
	xhr = e.target;
	if (xhr.readyState != 4) return;
	if (xhr.status != 200) {
		console.log(xhr.status + ': ' + xhr.statusText);
	} else {
		html = xhr.responseText;
		html = trim(explode('dG2Sp6rW', html)[0], explode('dG2Sp6rW', html)[1]);
		html = html.replace('vI24mDj3', '=');
		html = html.replace('vI24mDj3', '=');

		html = YmFzZTY0.decode(html);
		html = explode('=====', html)[1];
		html = JSON.parse(html);
		loadData(html);
	}
}

function connect(t, f, p){
	t = 'connector.php?'+t;
	if (t.match(/\?/)) {
		t += '&z='+rand(1000000, 9999999);
	} else {
		t += '?z='+rand(1000000, 9999999);
	}
	var xhr = new XMLHttpRequest();
	xhr.open(p?'POST':'GET', t, 1);
	xhr.send(p?p:null);
	console.log(p?'POST':'GET', t, p?p:null);
	xhr.onreadystatechange = f;
}

function submitForm(event){
	var params = getFormResults(event.target);
	connect(t, defaultLoader, params);
}

function loadData(data){
	if(data['header']){
		document.getElementById('title').innerHTML = data['header'];
		document.title = data['header'];
	}
	if(data['main']){
		document.getElementById('main').innerHTML = data['main'];
	}
	if(data['eval']){
		eval(data['eval']);
	}
}

var I = setInterval(function(){
	connect('a=ajax&in=checkLogined', function(e){
		xhr = e.target;
		if (xhr.readyState != 4) return;
		if (xhr.status != 200) {
			console.log(xhr.status + ': ' + xhr.statusText);
		} else {
			cl = xhr.responseText;
			cl = trim(explode('dG2Sp6rW', cl)[0], explode('dG2Sp6rW', cl)[1]);
			cl = cl.replace('vI24mDj3', '=');
			cl = cl.replace('vI24mDj3', '=');

			cl = YmFzZTY0.decode(cl);
			cl = explode('=====', cl)[1];
			cl = JSON.parse(cl);
			if(window.location.hash.indexOf('#login')!=0 && cl==0){
				window.location.hash = '#login?_='+window.location.pathname;
			}else if(cl==1 && window.location.hash.indexOf('#login')==0){
				window.location.hash = $_GET('_');
			}
		}
	});
}, 5000);

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