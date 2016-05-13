function Load(){
	document.title = 'Завантаження';
	if(!window.location.hash){
		window.location.hash='#profile';
	}
	loader.start();
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
	key = encodeURIComponent(localStorage.getItem("token")) || null;
	if (t.match(/\?/)) {
		t += '&y='+key+'&z='+rand(1000000, 9999999);
	} else {
		t += '?y='+key+'&z='+rand(1000000, 9999999);
	}
	var xhr = new XMLHttpRequest();
	xhr.open('POST', t, 1);
	xhr.send(p?p:null);
	xhr.onreadystatechange = f;
}

function submitForm(event){
	loader.start();
	var params = getFormResults(event.target);
	connect('a='+t, defaultLoader, params);
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
	loader.end();
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
			cl = JSON.parse(cl).main;
			if(window.location.hash.indexOf('#login')!=0 && cl==0){
				window.location.hash = '#login?_='+window.location.hash;
			}else if(cl==1 && window.location.hash.indexOf('#login')==0){
				window.location.hash = $_GET('_');
			}
		}
	});
}, 5000);

loader = {
	start: function(){
		document.getElementById('main').style.opacity = 0;
		document.getElementById('main').style.marginTop = "50vh";
		document.getElementById('header').style.height = "50vh";
		document.body.style.overflow = 'hidden';
				(function(){
					if(getScrollTop()>300){
						setScrollTop(300);
					}
					var sct = setInterval(function(){if(!getScrollTop())clearInterval(sct);setScrollTop(getScrollTop()-5)}, 1);
		})()
		document.getElementsByClassName('header')[0].style.marginTop = "50px";
		document.getElementById('loader').className='';
	},
	end: function(){
		document.getElementById('main').style.opacity = 1;
		document.getElementById('main').style.marginTop = "";
		document.getElementById('header').style.height = "";
		document.body.style.overflow = '';
		document.getElementsByClassName('header')[0].style.marginTop = "";
		setTimeout(function(){
			document.getElementById('loader').className='hidden';
		}, 500);}
};

(function() {
	document.addEventListener('submit', function(event) {
		if(event.target.tagName.toLowerCase()=='form'){
			event.preventDefault();
			submitForm(event);
		}
	}, false);
})();

function loadStudents(e){
	connect("a=ajax&in=getStudentsByClass-"+e.value, function(e){
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
		students = JSON.parse(JSON.parse(html).main);
		loadData(html);
		studentsHTML = '';
		for(a in students){
			studentsHTML += '<option value="'+students[a]['Login']+'">'+students[a]['SecondName']+' '+students[a]['Name']+'</option>'
		}
		document.getElementsByName('student')[0].innerHTML = studentsHTML;
	}
});
}