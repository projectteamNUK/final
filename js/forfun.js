$(function(){
	$('#menu li').hover(function(){
		var _this = $(this),
			_subnav = _this.children('ul');
		_this.css('backgroundColor', 'rgba(0,0,0,.5)');
		_subnav.stop(true, true).fadeIn();
	} , function(){
		$(this).css('backgroundColor', '').children('ul').stop(true, true).fadeOut(400);
	});
	$('a').focus(function(){
		this.blur();
	});
});


// $(function(){
// 	var $block = $('#mostnew');
// 	$('#mostnew .title ul li').hover(function(){
// 		$(this).addClass('over').siblings().removeClass('over');
// 	}, function(){
// 		$(this).removeClass('over');
// 	}).click(function(){
// 		var $this = $(this);
// 		$this.add($('.bd div.info', $block).eq($this.index())).addClass('on').siblings('.on').removeClass('on');
// 	});
// });

$(function(){
	var $block = $('#mostnew'),
		timrt, speed = 3000;
	var $li = $('.title ul li', $block).hover(function(){
		$(this).addClass('over').siblings().removeClass('over');
	}, function(){
		$(this).removeClass('over');
	}).click(function(){
		var $this = $(this);
		$this.add($('.bd div.info', $block).eq($this.index())).addClass('on').siblings('.on').removeClass('on');
	});
	$block.hover(function(){
		clearTimeout(timer);
	}, function(){
		timer = setTimeout(move, speed);
	});
	function move(){
		var _index = $('.title ul li.on', $block).index();
			_index = (_index + 1) % $li.length;
		$li.eq(_index).click();
 
		timer = setTimeout(move, speed);
	}
	timer = setTimeout(move, speed);
});
$(function(){
		var _titleHeight = 80;
		$('.most_recommend').each(function(){
			var $this = $(this), 
				_height = $this.height(), 
				$caption = $('.caption', $this),
				_captionHeight = $caption.outerHeight(true),
				_speed = 200;
			$this.hover(function(){
				$caption.stop().animate({
					top: _height - _captionHeight
				}, _speed);
			}, function(){
				$caption.stop().animate({
					top: _height - _titleHeight
				}, _speed);
			});
		});
	});

$(function(){
		var _titleHeight = 55;
		$('.recommend2').each(function(){
			var $this = $(this), 
				_height = $this.height(), 
				$caption1 = $('.caption1', $this),
				_captionHeight = $caption1.outerHeight(true),
				_speed = 200;
			
			$this.hover(function(){
				$caption1.stop().animate({
					top: _height - _captionHeight
				}, _speed);
			}, function(){
				$caption1.stop().animate({
					top: _height - _titleHeight
				}, _speed);
			});
		});
	});

$('#login').click(function(){
  $('.login-background').fadeIn(300);
  $('.login-wrapper').hide();
  setTimeout(function(){
      $('.login-wrapper').slideDown(300);
  }, 500)

})

 $('.login-background').click(function(){
    $('.login-background').fadeOut();
 })

$('.login-wrapper').click(function(e){
  e.stopPropagation(); 
})

$('#l').click(function(){
  $('.login1').fadeIn(300);
  $('.login-wrapper1').hide();
  setTimeout(function(){
      $('.login-wrapper1').slideDown(300);
  }, 500)

})

 $('.login1').click(function(){
    $('.login1').fadeOut();
 })

$('.login-wrapper1').click(function(e){
  e.stopPropagation(); 
})


$('#contact').click(function(){
  $('.login2').fadeIn(300);
  $('.login-wrapper2').hide();
  setTimeout(function(){
      $('.login-wrapper2').slideDown(300);
  }, 500)

})

 $('.login2').click(function(){
    $('.login2').fadeOut();
 })

$('.login-wrapper2').click(function(e){
  e.stopPropagation(); 
})

$('.wrap').hide();

$( '.click' ).click(function() {
  
  $('.wrap').slideToggle(1000);
  
});


