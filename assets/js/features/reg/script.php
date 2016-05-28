formFields = {
	common: [{
		tagName: 'input',
		type: 'text',
		name: 'login',
		before: 'Логін'
	},{
		tagName: 'input',
		type: 'text',
		name: 'password',
		before: 'Пароль'
	}, {
		tagName: 'input',
		type: 'text',
		name: 'name',
		before: 'Ім\'я'
	}, {
		tagName: 'input',
		type: 'text',
		name: 'secondname',
		before: 'Прізвище'
	}],

	teacher: [{
		tagName: 'input',
		type: 'text',
		name: 'class',
		before: 'Клас'
	}, {
		tagName: 'input',
		type: 'text',
		id: 'subjectPermissionVisible',
		disabled: 'disabled',
		before: 'Право доступа'
	}<?php 
	$allsbj = marks::getAllSubjects();
	foreach ($allsbj as $a){
		echo ", {
			tagName: 'input',
			type: 'checkbox',
			class: 'subjectPermission',
			value: '{$a['SubjectName']}',
			after: '{$a['SubjectCaption']}'
		}";
	}
?>
	,{
		tagName: 'input',
		type: 'hidden',
		name: 'subjectPermission',
		id: 'subjectPermission'
	}],
	student: [{
		tagName: 'input',
		type: 'text',
		name: 'class',
		before: 'Клас'
	}]
};

function genFormElement(data) {
	gf = document.createElement("p");

	el = document.createElement(data.tagName);
	for(a in data){
		el.setAttribute(a, data[a]);
	}
	el.id = el.id?el.id:Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 8);
	if(data.before){
		be = document.createElement('label');
		be.setAttribute('for', el.id);
		be.appendChild(document.createTextNode(data.before));
		gf.appendChild(be);
	}
	gf.appendChild(el);
	if(data.after){
		af = document.createElement('label');
		af .setAttribute('for', el.id);
		af.appendChild(document.createTextNode(data.after));
		gf.appendChild(af);
	}
	return gf.outerHTML;
}

document.addEventListener("change", function(a){
	e = a.target;
	if(e.className=='subjectPermission'){
		els=document.getElementsByClassName("subjectPermission");
		arr = [];
		for(i=0;i<els.length;i++){
			els[i].checked && arr.push(els[i].value);
		}
		document.getElementById("subjectPermission").value = JSON.stringify(arr);
		document.getElementById("subjectPermissionVisible").value = arr.join(", ");
	}
});

function onChange(e) {
	if(e.name=='permission'){
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