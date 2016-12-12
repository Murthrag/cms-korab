    
$('ul.nav li.dropdown').hover(function() {
    
    if($(document).width() > 978)
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(300);  
    else
    {
        $('.dropdownOSKOLE').css({display: 'block'});
        $('.oSkoleMenu').addClass("open");
    }
}, function() {
    if($(document).width() > 978)
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(300);
    else        
        {
            $('.dropdownOSKOLE').css({display: 'none'});
            $('.oSkoleMenu').removeClass("open");
        }

});	

if(username == "Prihlásiť")
{
	$(".prihlasitHover").mouseover(function(){	
		 $(".prihlasitIframe").addClass("mouseIn");
	});       
	$(".prihlasitHover").mouseleave(function(){	
		 $(".prihlasitIframe").removeClass("mouseIn");
	});  
	$(".prihlasitIframe").mouseover(function(){	
		 $(".prihlasitIframe").addClass("mouseIn");
	});       
	$(".prihlasitIframe").mouseleave(function(){	
		 $(".prihlasitIframe").removeClass("mouseIn");
	}); 
}else{
	
}
					  
function resizeEvent(){
    if($(document).width() > 768)
    {
        $('#myNavbar').css({'overflow': 'visible'});   
        
        var login = $(".prihlasitHover")[0];
        var position = login.getBoundingClientRect();
        var middleElement = (position.right - position.left) /2 + position.left;
        var name = location.href.split("/").slice(-1)[0]; 
        var offset = (name.substr(0, name.indexOf(".")).localeCompare("index") === 0 ? 79 : 182 );
        if(($(document).width() - middleElement) >= 150 )
        {			
            $(".prihlasitIframe").css({'top' : offset + 'px',
                                       'left': (middleElement -150 ) + 'px'})
        }else{
            $(".prihlasitIframe").css({'top' : offset + 'px',
                                       'left': (position.right - 300) + 'px'})            
        }
    }
    else
    {
        $('#myNavbar').css({'overflow': 'hidden'});
        var name = location.href.split("/").slice(-1)[0]; 
        var offset = (name.substr(0, name.indexOf(".")).localeCompare("index") === 0 ? 60 : 135 );
        $(".prihlasitIframe").css({'top': offset + 'px', 'right': '5px'});
    }
}

function ReloadParent () {
	window.parent.location.reload();
}

$(document).ready(function() {
    setTimeout(resizeEvent(), 1000);
});