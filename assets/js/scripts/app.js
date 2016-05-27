function popupCenter(url, title, w, h) {
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

    width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var left = ((width / 2) - (w / 2)) + dualScreenLeft;
    var top = ((height / 2) - (h / 2)) + dualScreenTop;
    var newWindow = window.open(url, title, 'scrollbars=yes,status=yes,resizable=no,modal=yes,titlebar=no,width=' + w + ',height=' + h + ',top=' + top + ',left=' + left);
    if (window.focus) {
        newWindow.focus();
    }
}

function onLoad(){};

function CClick(e, event) {
	switch (event.which) {
		case 1:
				console.log('Left Mouse button pressed.');
				e.getElementsByClassName('link')[0].click();
			break;
		case 2:
				console.log('Middle Mouse button pressed.');
				w = window.open(e.getElementsByClassName('link')[0].href);
				w.blur();
				setTimeout(w.focus, 0);
			break;
		case 3:
				console.log('Right Mouse button pressed.');
				PopupCenter('https://vk.com/share.php?url=' + encodeURIComponent(e.getElementsByClassName('link')[0].href), 'Share', 626, 436);
			break;
		default:
				console.error('You have a strange Mouse!');
	}
	return false;
};

function download(filename, text) {
	var element = document.createElement('a');
	element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
	element.setAttribute('download', filename);

	element.style.display = 'none';
	document.body.appendChild(element);

	element.click();

	document.body.removeChild(element);
}



function setOrPush(target, val) {
	var result = val;
	if (target) {
		result = [target];
		result.push(val);
	}
	return result;
}
function getFormResults(formElement) {
	var formElements = formElement.elements;
	var formParams = new FormData();
	var i = 0;
	var elem = null;
	for (i = 0; i < formElements.length; i += 1) {
		var elem = formElements[i];
		switch (elem.type) {
			case 'submit':
				break;
			case 'radio':
				if (elem.checked) {
					formParams.append(elem.name, elem.value);
				}
				break;
			case 'checkbox':
				if (elem.checked) {
					formParams.append(elem.name, setOrPush(formParams[elem.name], elem.value));
				}
				break;
			default:
				formParams.append(elem.name, elem.value);
		}
	}
	return formParams;
}

function DoubleScroll(element) {
	var scrollbar = document.createElement('div');
	scrollbar.appendChild(document.createElement('div'));
	scrollbar.style.overflow = 'auto';
	scrollbar.style.overflowY = 'hidden';
	scrollbar.style.width = '100%';
	scrollbar.firstChild.style.width = element.scrollWidth + 'px';
	scrollbar.firstChild.style.height = '0px';
	scrollbar.firstChild.appendChild(document.createTextNode('\xA0'));
	scrollbar.className = 'doublescrollbarhelper';
	scrollbar.id = 'doublescrollbarhelper';

	var scrollbar2 = document.createElement('div');
	scrollbar2.appendChild(document.createElement('div'));
	scrollbar2.style.overflow = 'auto';
	scrollbar2.style.overflowY = 'hidden';
	scrollbar2.firstChild.style.width = element.scrollWidth + 'px';
	scrollbar2.firstChild.style.height = '0px';
	scrollbar2.firstChild.appendChild(document.createTextNode('\xA0'));
	scrollbar2.className = 'doublescrollbarhelper fixed';
	scrollbar2.style.display = 'none';
	scrollbar2.className = 'doublescrollbarhelper scrollbarfx fixed';
	scrollbar2.id = 'scrollbarfx';

	scroll = function() {
		if (scrollbar.getBoundingClientRect().top < 1 && element.getBoundingClientRect().bottom > 18) {
			scrollbar2.style.display = "";
		} else {
			scrollbar2.style.display = "none";
		}
		scrollbar.scrollLeft = element.scrollLeft;
		scrollbar2.scrollLeft = element.scrollLeft;
		scrollbar.firstChild.style.width = element.scrollWidth + 'px';
		scrollbar2.firstChild.style.width = element.scrollWidth + 'px';
	}
	document.addEventListener("scroll", scroll);

	scrollbar.onscroll = function() {
		element.scrollLeft = scrollbar.scrollLeft;
		scrollbar2.scrollLeft = element.scrollLeft;
		scrollbar.firstChild.style.width = element.scrollWidth + 'px';
		scrollbar2.firstChild.style.width = element.scrollWidth + 'px';
	};
	scrollbar2.onscroll = function() {
		element.scrollLeft = scrollbar2.scrollLeft;
		scrollbar.scrollLeft = element.scrollLeft;
		scrollbar.firstChild.style.width = element.scrollWidth + 'px';
		scrollbar2.firstChild.style.width = element.scrollWidth + 'px';
	};
	element.onscroll = function() {
		scrollbar.scrollLeft = element.scrollLeft;
		scrollbar2.scrollLeft = element.scrollLeft;
		scrollbar.firstChild.style.width = element.scrollWidth + 'px';
		scrollbar2.firstChild.style.width = element.scrollWidth + 'px';
	};
	clearscrollbar = function() {
		element.scrollLeft = scrollbar.scrollLeft;
		element.scrollLeft = scrollbar2.scrollLeft;
		scrollbar.firstChild.style.width = element.scrollWidth + 'px';
		scrollbar2.firstChild.style.width = element.scrollWidth + 'px';
	}
	setTimeout(clearscrollbar, 10);
	setTimeout(clearscrollbar, 25);
	setTimeout(clearscrollbar, 100);
	setTimeout(clearscrollbar, 200);

	element.parentNode.insertBefore(scrollbar, element);
	element.parentNode.insertBefore(scrollbar2, element);
}

function onChange(e){
	params = {};
	params.date = document.getElementsByName('date')[0].value;
	params.subject = document.getElementsByName('subject')[0].value;
	params.class = document.getElementsByName('class')[0].value;
	params.student = document.getElementsByName('student')[0].value;
	params.teacher = document.getElementsByName('teacher')[0].value;
	params.mark = document.getElementsByName('mark')[0].value;

	str = "";
	for(a in params){
		if(params[a] && params[a]!="false" && a)str += a+"="+params[a]+"&";
	}
	if(str[str.length-1]=="&")str=str.substr(0, str.length-1);
	if(str.length>1)str="?"+str;
	window.location.hash = (window.location.hash+'?').substring(0, (window.location.hash+'?').indexOf('?'))+str;
}
function clearMe(e){
	document.getElementsByName(e.getAttribute("data-id"))[0].value = "";
	onChange(document.getElementsByName(e.id)[0]);
}
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
		}
		html = xhr.responseText;
		students = JSON.parse(JSON.parse(html).main);
		loadData(html);
		studentsHTML = '';
		for(a in students){
			studentsHTML += '<option value="'+students[a]['Login']+'">'+students[a]['SecondName']+' '+students[a]['Name']+'</option>'
		}
		document.getElementsByName('student')[0].innerHTML = studentsHTML;
	});
}