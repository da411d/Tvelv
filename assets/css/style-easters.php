.glitch:before {
	content: attr(data-text);
	position: absolute;
	left: -1px;
	text-shadow: 1px 0 orange;
	top: 0;
	color: inherit;
	overflow: hidden;
	clip: rect(0, 900px, 0, 0);
	animation: noise-anim-2 3s infinite linear alternate-reverse;
}
.glitch:after {
	content: attr(data-text);
	position: absolute;
	left: 1px;
	text-shadow: -1px 0 red;
	top: 0;
	color: inherit;
	overflow: hidden;
	clip: rect(0, 900px, 0, 0);
	animation: noise-anim 2s infinite linear alternate-reverse;
}

@keyframes noise-anim {
	0% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	5% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	10% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	15% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	20% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	25% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	30% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	35% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	40% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	45% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	50% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	55% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	60% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	65% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	70% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	75% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	80% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	85% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	90% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	95% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	100% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
}


@keyframes noise-anim-2 {
	0% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	5% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	10% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	15% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	20% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	25% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	30% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	35% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	40% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	45% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	50% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	55% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	60% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	65% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	70% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	75% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	80% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	85% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	90% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	95% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
	100% {
		clip: rect(<?=rand(0,100);?>px, 9999px, <?=rand(0,100);?>px, 0);
	}
}