<?php
$useragent=$_SERVER['HTTP_USER_AGENT'];

if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){exit(3);}

?><style>
*{font-family: sans-serif; letter-spacing: 1px;color:white;font-size:110%;margin:0px;padding:0px;}

.wn::before{content:'Що нового?';font-size:120%;display:block;padding-bottom:4px;}
.wn{
background: #047DFC;
padding:8px;
overflow: auto;
}
.wn date{
  margin-left: 150;
float:right;
font-style:italic;}
.wn new{
border-radius: 0px;
border: 1px #004184 solid;
display:block;
padding: 4px;
margin-top:8px;}
</style>

<div class="wn">
<new>
<date>27 чер. 2015</date>
Оновлено <a href="http://blastorq.pp.ua/production/ww/captcha/ukrcaptcha" target="_blank">UkrCaptcha</a>.</new>

<new>
<date>16 чер. 2015</date>
Запущено <a href="http://blastorq.pp.ua/production/be/pwdis" target="_blank">PasswordDisplayer</a> і <a href="http://blastorq.pp.ua/production/be/vkblur" target="_blank">VkBlur</a></new>

<new>
<date>27 тра. 2015</date>
Готова гра-головоломка <a href="http://app.blastorq.pp.ua/UAGAME/" target="_blank">UaGame</a></new>

<new>
<date>9 тра. 2015</date>
Нарешті, після довгої паузи запущено <a href="http://blastorq.pp.ua/production/ww/captcha/colorcaptcha" target="_blank">ColorCaptcha</a></new>

<new>
<date>2 тра. 2015</date>
Запущено <a href="http://blastorq.pp.ua/production/ww/captcha/strangecaptcha" target="_blank">StrangeCaptcha</a></new>
<new>
<date>1 тра. 2015</date>
Лого перероблено з GIF на SVG
(<a href="http://blastorq.pp.ua/site/logo.svg" target="_blank">logo.svg</a>)</new>
<new>
<date>29 кві. 2015</date>
Перероблено <a href="http://blastorq.pp.ua/production/be/fsbm" target="_blank">SF&nbsp;BookmarkLink</a>, тепер прокручується плавно)</new>
<new>
<date>27 кві. 2015</date>
Додано "Що&nbsp;нового" на сайт.</new>
<new>
<date>26 кві. 2015</date>
Перероблено механізм перевірки капчі.
</new>
<new>
<date>16 бер. 2015</date>
Створено GifCaptcha
</new>
<new>
<date>07 бер. 2015</date>
Створено NataliaCaptcha
</new>
<new>
<date>17 груд. 2014</date>
Створено VictoriaCaptcha
</new>
<new>
<date>26 вер. 2014</date>
Зареєстровано сайт на цьому хостингу.
</new>
<new>
<date>00.00.0000</date>
Нічо нового
</new>
</div>