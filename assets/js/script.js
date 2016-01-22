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

function onLoad(){
	
};

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
function share(e) {
	switch (e.classList[0]) {
		case 'vk':
			popupCenter('https://vk.com/share.php?url=' + window.location, '', 600, 400);
			break;
		case 'fb':
			popupCenter('https://www.facebook.com/sharer/sharer.php?u=' + window.location, '', 600, 400);
			break;
		case 'tw':
			popupCenter('https://twitter.com/intent/tweet?url=' + window.location, '', 600, 400);
			break;
		case 'ok':
			popupCenter('https://connect.ok.ru/dk?cmd=WidgetSharePreview&st.cmd=WidgetSharePreview&st.shareUrl=' + window.location, '', 600, 400);
			break;
		case 'gp':
			popupCenter('https://plus.google.com/share?url=' + window.location, '', 600, 400);
			break;
	}
}