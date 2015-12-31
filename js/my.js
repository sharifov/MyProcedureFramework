var tmr=parseInt(document.getElementsByTagName("head")[0].getAttribute("dir"))*1000;
var _o_={
			items:1,
			scroll : {
				items : 1,
				easing:'swing',
				duration:2000,
				fx:'uncover'
			},
			direction :"down",
			circular: true,
			infinite: true,
			pagination:{container:'#slider .nav',duration:0,anchorBuilder:function(nr){return '<a href="#'+nr+'"><span></span></a>';}},
			auto    : {play:false,timeoutDuration:4000},
			prev    : {
				button  : "#slider > a:first",
				key     : "right"
			},
			next    : {
				button  : "#slider >a:last",
				key     : "left"
			}
		};
var _o_3={
			items:1,
			scroll : {
				items : 1,
				easing:'swing',
				duration:2000,
				fx:'uncover'
			},
			direction :"left",
			circular: true,
			infinite: true,
			pagination:{container:'#slider .nav',duration:0,anchorBuilder:function(nr){return '<a href="#'+nr+'"><span></span></a>';}},
			auto    : {play:false,timeoutDuration:4000},
			prev    : {
				button  : ".back+ a + a",
				key     : "right"
			},
			next    : {
				button  : ".back + a",
				key     : "left"
			}
		};
		
var _o1_={
	width:200,
	background:'#008bd3',
	background:'#1173A6',
	top:39
};

var _o_4={
	beforeShow:function(){
		$('.fancybox-inner ins').append('<iframe  width="1002" height="752" src="//www.youtube.com/embed/'+$('.fancybox-inner ins').attr('accesskey')+'?autoplay=1" frameborder="0" allowfullscreen></iframe>');
	},
	beforeClose:function(){
		$('.fancybox-inner ins iframe').remove();
	}
}
		
var _o2_={showOn: "button",buttonImage: "img/calendar.png",buttonImageOnly: true};

function _rT(){
	if($('.slider_photo').attr('class')){
		$('.slider_photo span').click(function(){
			$.fancybox.open($('ins',this),_o_4);
		});
	}
	$('#flashBg object,#flashBg').height($(document).height()-71);
	if($('#wrapper').height()==0){
		$('#wrapper').height(488);
	}
}

function picker(){
	$('input.hasDatepicker').each(function(){
		lt=$(this).position().left;
		tp=$(this).position().top;
		$(this).next().css({'left':lt+115,'top':tp+4});
	})
}	
function __d(){
	if($(this).height()==14){
		t=($('.jlang a').length*14)+8;
		$('.jlang').animate({'height':t},{queue:false,duration:300,complete:function(){$(this).css('border','1px solid #007CDD')}});
	}else{
		__d1();
	}
}
function __d1(){
	$('.jlang').animate({'height':14,'border':'1px solid transparent'},{queue:false,duration:300,complete:function(){$(this).css('border','1px solid transparent')}});
}
function __e(e){
	elm=$(e.target).attr('class');
	if(elm=='jlang'){
		__d1();
		return false;
	}else{
		__d1();
	}
}
function __f(){
	if($(this).attr('tabindex')=='open'){
		$(this).next().slideUp(300);
		$(this).removeAttr('tabindex');
	}else{
		$(this).next().slideDown(300);
		$(this).next().css('left',$(this).parent().position().left-15);
		$(this).attr('tabindex','open');
	}
}
function combobox(){
	$('#slider .booking select').each(function(){
		var title = $(this).attr('title');
		lt=$(this).position().left;
		tp=$(this).position().top;
		if( $('option:selected', this).val() != ''  ) title = $('option:selected',this).text();
		$(this)
			.css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
			.after('<ins style="left:'+lt+'px;top:'+tp+'px">' + title + '</ins>')
			.change(function(){
				val = $('option:selected',this).text();
				$(this).next().text(val);
			})
	});
}
function autoNav(e){
	_l=$(e).children().length;
	_ht='<span class="nav">';
	for(i=0;i<_l;i++){
		_ht+='<a href="#"></a>';
	}
	_ht+='</span>';
	$(e).after(_ht);
}
function preload(){
	//$('#slider').height(_w_*602/1920);
	//combobox();
	//autoNav('.slider_move');
	//$('#slider li').width(parseFloat($(window).width()));
	
	$('.jlang .active').prependTo('.jlang');
	$('#menu > ul > li:last > a').css('background-image','none');
	
	//$('.booking input').datepicker(_o2_);
	//picker();
	if($('.jcontent > ul').length){
		$('.jcontent').height($('.jcontent li ul').outerHeight()+50);
	}
}
$(function(){
	preload();
	
//CLOUD//
	var avg=Math.ceil(parseInt($('.cloud').width())/parseInt($('.rt span').width()));
	bc='';
	for(i=0;i<avg;i++){
		   bc=bc==''?'_1':'';
		$('.rt').append('<span class="'+bc+'"></span>');
		
	}
	$('.cloud').show();
	
	$('.rt').carouFredSel({
		align: false,
		items:avg,
		scroll: {
			items: 1,
			duration: 40000,
			timeoutDuration: 0,
			easing: 'linear'
		}
	});
//CLOUD//
	
	
	
	//$(window).resize(_f_);
	
//CSS RULES//
	if($('.page_move').attr('class')){
		toMiddle('.page_move span');
	}
//CSS RULES//
	$('.jlang').click(__d);
	$(document).mouseup(__e);
	$('.jcontent > ul > li > a').click(__f);
	
	
	if($('#menu > ul').length){
		$('#menu > ul').jafarMenu(_o1_);
	}
	if($('.slider_move').attr('class')){
		
		$('#wrapper .hid').each(function(){
			$(this).appendTo('.slider_move:eq('+(parseInt($(this).attr('accesskey'))-1)+')');
		});
		
		//_sH=$(window).height()-$('#menu').outerHeight()-$('#header').outerHeight()-$('#footer').outerHeight()-7;//3px + 2px +2px
		//$('#wrapper .slider_move img').height(_sH);
		$(".slider_move .hid").removeClass('hid').parent().show().carouFredSel(_o_);
		a=0;
		itn=setInterval(function(){
			if(a>1){a=0;}
			else if(a==1){a=2;}
			//$('#wrapper .caroufredsel_wrapper:eq('+a+') > div').clearQueue().trigger('next');
			$('#wrapper .caroufredsel_wrapper:eq('+a+') > div,#wrapper .caroufredsel_wrapper:eq('+(a+1)+') > div').trigger('slideTo','next');
			a++;
		},tmr);
	}
	
	if($('.slider_photo').attr('class')){
		$('.slider_photo img:odd').css('border-right',0);
		$('.slider_photo').show().carouFredSel(_o_3);
		$('.slider_photo span a').fancybox(_o_4);
	}
	$('#wrapper .caroufredsel_wrapper:even').css('border-right','2px solid #fff');
	
	if($('.photo').attr('class')){	
		$('.photo > a').fancybox();
	}
	if($('[rel="photo"]').attr('rel')){	
		$('[rel="photo"]').fancybox();
	}
	if($('#cnt').attr('id')){	
		$('.jcontent h3.title + span + a').fancybox({width:1002,autoSize: false});
	}
	if($('.search').attr('class')){
		input('#slider form input');
	}
	_rT();
	$(window,document).resize(_rT);
});