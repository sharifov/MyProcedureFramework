$(function(){

$lang=$('body').attr('lang');
alertDel=[];
alertImg=[];


alertDel['az']="Siz Həqiqətəndə bu yazını üç(3) dildə silmək istəyirsiz?";
alertDel['ru']="Вы хотите удалить запись на трех(3) языках?";
alertDel['fr']="Vous voulez supprimer l'enregistrement en trois(3) langues?";
alertDel['en']="Do you want delete the record in three(3) languages?";

alertImg['az']="şəkil formatı düzgün deyil! .JPG və ya .JPEG Olmalıdır";
alertImg['ru']="Формат рисунка неправильный! Должен быть .JPG или .JPEG";
alertImg['fr']="Le format de la figure n'est pas correct! Doit être .JPG ou .JPEG";
alertImg['en']="The format of the figure is not correct! Must be .JPG or .JPEG";


$('.table li span:last-of-type a').click(function(){
	us=confirm(alertDel[$lang]);
	if(!us){
		return false;
	}
});

$('.jAddSlider input[type=file]').change(function(){
	file=$(this).val();
	ext=file.slice(-3,file.length).toLowerCase();
	if(ext!='peg' && ext!='jpg'){
		alert(alertImg[$lang]);
		$(this).val('');
		return false;
	}
});

tm=300;

$('.jAddSlider input[type=text],.jAddSlider textarea').hide();
$('.jAddSlider label + textarea,.jAddSlider label + input,.jAddSlider > iframe:first').show();

$('.jAddSlider input + img').click(function(){
	tab=$(this).attr('tabindex');
	
	if($(this).attr('media')!=undefined){
		return false;
	}
	$('.jAddSlider input[tabindex='+tab+'] + img').removeAttr('media');
	$(this).attr('media','yes');
	
	
	$('.jAddSlider input[tabindex='+tab+'] + img').width(25);
	$(this).width(30);
	$('.jAddSlider input[tabindex='+tab+']').slideUp(tm);
	
	$(this).prev().slideDown(tm);
});

$('.jAddSlider img[tabindex=iframe]').click(function(){
	
	$('.jAddSlider img[tabindex=iframe] ').width(25);
	$(this).width(30);
	$('.jAddSlider > iframe').hide();
	
	$(this).prev().show();
});

$('.jAddSlider textarea + img').click(function(){
	if($(this).attr('media')!=undefined){
		return false;
	}
	$('.jAddSlider textarea + img').removeAttr('media');
	$(this).attr('media','yes');
	
	$('.jAddSlider textarea + img').width(25);
	$(this).width(30);
	$('.jAddSlider textarea').slideUp(tm);
	$(this).prev().slideDown(tm);
});


//SELECTABLE//
	$('select[tabindex]').each(function(){
		$('option[value='+$(this).attr('tabindex')+']',this).attr('selected','selected');
		$(this).removeAttr('tabindex');
	});
//SELECTABLE//
$('select[name=title]:last').change(function(){
	location.search='?options=slider&title='+$(this).val()+'&prnt='+$('select[name=prnt]:last').val();
});
$('select[name=prnt]:last').change(function(){
	location.search='?options=slider&prnt='+$(this).val()+'&title='+$('select[name=title]:last').val();
});
$('select[name=parent]:last').change(function(){
	location.search='?options=gallery&parent='+$(this).val();
});

//SORTABLE//
if($('.table').attr('tabindex')!='not'){
	countF=$('.table li').size();
	$(".table").sortable({"stop":function(e,ui){
		jtable=$(this).attr('tabindex');
		order='';
		for($f=0; $f<countF; $f++){
			uid=$('.table li:eq('+$f+')').val();
			order+=uid+':'+($f+1)+',';
		}
		$.post('/sorting.php',{sorting:order,table:jtable});
	}});
}
//SORTABLE//


});//END