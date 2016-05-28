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