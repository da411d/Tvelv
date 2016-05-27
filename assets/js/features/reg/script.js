formFields = {
	common: [{
		tagName: 'input',
		type: 'text',
		name: 'login',
		caption: 'Логін'
	},{
		tagName: 'input',
		type: 'text',
		name: 'password',
		caption: 'Пароль'
	}, {
		tagName: 'input',
		type: 'text',
		name: 'name',
		caption: 'Ім\'я'
	}, {
		tagName: 'input',
		type: 'text',
		name: 'secondname',
		caption: 'Прізвище'
	}],

	teacher: [{
		tagName: 'input',
		type: 'text',
		name: 'class',
		caption: 'Клас'
	}, {
		tagName: 'input',
		type: 'text',
		name: 'subjectPermission',
		caption: 'Право доступа'
	}],
	student: [{
		tagName: 'input',
		type: 'text',
		name: 'class',
		caption: 'Клас'
	}]
};

function genFormElement(data) {
	gf = document.createElement("p");

	el = document.createElement(data.tagName);
	el.setAttribute('type', data.type);
	el.setAttribute('name', data.name);
	if (data.caption) {
		la = document.createElement('label');
		la.appendChild(document.createTextNode(data.caption));
		la.appendChild(el);
		gf.appendChild(la);
	} else {
		gf.appendChild(el);
	}
	return gf.outerHTML;
}

function onChange(e) {
	if(e.name=='acctype'){
		formHTML = "";
		data = formFields['common'];
		for(i=0;i<data.length;i++){
			formHTML += genFormElement(data[i]);
		}
		data = formFields[e.value];
		for(i=0;i<data.length;i++){
			formHTML += genFormElement(data[i]);
		}
		document.getElementById('formContainer').innerHTML = formHTML;
	}
}