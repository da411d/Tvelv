function rand(mi, ma){return Math.floor(Math.random() * (ma - mi + 1) + mi);}
function getScroll(){
    var x = 0, y = 0;
    if( typeof( window.pageYOffset ) == 'number' ) {
        y = window.pageYOffset;
        x = window.pageXOffset;
    } else if( document.body && ( document.body.scrollLeft || document.body.scrollTop ) ) {
        y = document.body.scrollTop;
        x = document.body.scrollLeft;
    } else if( document.documentElement && 
    ( document.documentElement.scrollLeft || document.documentElement.scrollTop ) ) {
        y = document.documentElement.scrollTop;
        x = document.documentElement.scrollLeft;
    }
    var obj = new Object();
    obj.x = x;
    obj.y = y;
    return obj;
};
function getScrollTop(){return  getScroll().y};
function getScrollLeft(){return  getScroll().x};
function setScrollTop(o){window.scrollTo(0,o)};
function getWindowHeight(){return window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight||0}
function getWindowWidth(){return window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth||0}

function getDocHeight(){return Math.max(document.body.scrollHeight||0,document.documentElement.scrollHeight||0,document.body.offsetHeight||0,document.documentElement.offsetHeight||0,document.body.clientHeight||0,document.documentElement.clientHeight||0)};

function getScrollPercentage(){return(getScrollTop()+getWindowHeight())/getDocHeight()*100};

/*MobileDetect*/
!function(a){var b=/iPhone/i,c=/iPod/i,d=/iPad/i,e=/(?=.*\bAndroid\b)(?=.*\bMobile\b)/i,f=/Android/i,g=/(?=.*\bAndroid\b)(?=.*\bSD4930UR\b)/i,h=/(?=.*\bAndroid\b)(?=.*\b(?:KFOT|KFTT|KFJWI|KFJWA|KFSOWI|KFTHWI|KFTHWA|KFAPWI|KFAPWA|KFARWI|KFASWI|KFSAWI|KFSAWA)\b)/i,i=/IEMobile/i,j=/(?=.*\bWindows\b)(?=.*\bARM\b)/i,k=/BlackBerry/i,l=/BB10/i,m=/Opera Mini/i,n=/(CriOS|Chrome)(?=.*\bMobile\b)/i,o=/(?=.*\bFirefox\b)(?=.*\bMobile\b)/i,p=new RegExp("(?:Nexus 7|BNTV250|Kindle Fire|Silk|GT-P1000)","i"),q=function(a,b){return a.test(b)},r=function(a){var r=a||navigator.userAgent,s=r.split("[FBAN");return"undefined"!=typeof s[1]&&(r=s[0]),this.apple={phone:q(b,r),ipod:q(c,r),tablet:!q(b,r)&&q(d,r),device:q(b,r)||q(c,r)||q(d,r)},this.amazon={phone:q(g,r),tablet:!q(g,r)&&q(h,r),device:q(g,r)||q(h,r)},this.android={phone:q(g,r)||q(e,r),tablet:!q(g,r)&&!q(e,r)&&(q(h,r)||q(f,r)),device:q(g,r)||q(h,r)||q(e,r)||q(f,r)},this.windows={phone:q(i,r),tablet:q(j,r),device:q(i,r)||q(j,r)},this.other={blackberry:q(k,r),blackberry10:q(l,r),opera:q(m,r),firefox:q(o,r),chrome:q(n,r),device:q(k,r)||q(l,r)||q(m,r)||q(o,r)||q(n,r)},this.seven_inch=q(p,r),this.any=this.apple.device||this.android.device||this.windows.device||this.other.device||this.seven_inch,this.phone=this.apple.phone||this.android.phone||this.windows.phone,this.tablet=this.apple.tablet||this.android.tablet||this.windows.tablet,"undefined"==typeof window?this:void 0},s=function(){var a=new r;return a.Class=r,a};"undefined"!=typeof module&&module.exports&&"undefined"==typeof window?module.exports=r:"undefined"!=typeof module&&module.exports&&"undefined"!=typeof window?module.exports=s():"function"==typeof define&&define.amd?define("isMobile",[],a.isMobile=s()):a.isMobile=s()}(this);

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

function connect(t){
	u = '/modules/ajax.php?'+t;
	if (u.match(/\?/)) {
		u += '&z='+rand(1000000, 9999999);
	} else {
		u += '?z='+rand(1000000, 9999999);
	}
	html = ajax(u);
	return html;
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

var I = setInterval(function(){if(connect('checkLogined')==0 && window.location.pathname!='/login'){window.location = '/login?_='+window.location.pathname}else if(connect('checkLogined')==1 && window.location.pathname=='/login'){window.location = $_GET('_')}}, 5000)