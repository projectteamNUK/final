$(function(){
	// 幫 #menu li 加上 hover 事件
	$('#menu li').hover(function(){
		// 先找到 li 中的子選單
		var _this = $(this),
			_subnav = _this.children('ul');
 
		// 變更目前母選項的背景顏色
		// 同時淡入子選單(如果有的話)
		_this.css('backgroundColor', 'rgba(0,0,0,.5)');
		_subnav.stop(true, true).fadeIn(400);
	} , function(){
		// 變更目前母選項的背景顏色
		// 同時淡出子選單(如果有的話)
		// 也可以把整句拆成上面的寫法
		$(this).css('backgroundColor', '').children('ul').stop(true, true).fadeOut(400);
	});
 
	// 取消超連結的虛線框
	$('a').focus(function(){
		this.blur();
	});
});


// $(function(){
// 	// 先取得 #mostnew
// 	var $block = $('#mostnew');
 
// 	// 幫 #mostnew .title ul li 加上 hover() 事件
// 	$('#mostnew .title ul li').hover(function(){
// 		// 當滑鼠移上時加上 .over 樣式
// 		$(this).addClass('over').siblings().removeClass('over');
// 	}, function(){
// 		// 當滑鼠移出時移除 .over 樣式
// 		$(this).removeClass('over');
// 	}).click(function(){
// 		// 當滑鼠點擊時, 顯示相對應的 div.info
// 		// 並加上 .on 樣式
// 		var $this = $(this);
// 		$this.add($('.bd div.info', $block).eq($this.index())).addClass('on').siblings('.on').removeClass('on');
// 	});
// });

$(function(){
	// 先取得 #mostnew , 必要參數及輪播間隔
	var $block = $('#mostnew'),
		timrt, speed = 3000;
 
	// 幫 #mostnew .title ul li 加上 hover() 事件
	var $li = $('.title ul li', $block).hover(function(){
		// 當滑鼠移上時加上 .over 樣式
		$(this).addClass('over').siblings().removeClass('over');
	}, function(){
		// 當滑鼠移出時移除 .over 樣式
		$(this).removeClass('over');
	}).click(function(){
		// 當滑鼠點擊時, 顯示相對應的 div.info
		// 並加上 .on 樣式
		var $this = $(this);
		$this.add($('.bd div.info', $block).eq($this.index())).addClass('on').siblings('.on').removeClass('on');
	});
 
	// 幫 $block 加上 hover() 事件
	$block.hover(function(){
		// 當滑鼠移上時停止計時器
		clearTimeout(timer);
	}, function(){
		// 當滑鼠移出時啟動計時器
		timer = setTimeout(move, speed);
	});
 
	// 控制輪播
	function move(){
		var _index = $('.title ul li.on', $block).index();
			_index = (_index + 1) % $li.length;
		$li.eq(_index).click();
 
		timer = setTimeout(move, speed);
	}
 
	// 啟動計時器
	timer = setTimeout(move, speed);
});
$(function(){
		// 預設標題區塊 .abgne_tip_gallery_block .caption 的 top
		var _titleHeight = 55;
		$('.most_recommend').each(function(){
			// 先取得區塊的高及標題區塊等資料
			var $this = $(this), 
				_height = $this.height(), 
				$caption = $('.caption', $this),
				_captionHeight = $caption.outerHeight(true),
				_speed = 200;
			
			// 當滑鼠移動到區塊上時
			$this.hover(function(){
				// 讓 $caption 往上移動
				$caption.stop().animate({
					top: _height - _captionHeight
				}, _speed);
			}, function(){
				// 讓 $caption 移回原位
				$caption.stop().animate({
					top: _height - _titleHeight
				}, _speed);
			});
		});
	});




$(function(){
		// 預設標題區塊 .abgne_tip_gallery_block .caption 的 top
		var _titleHeight = 55;
		$('.recommend2').each(function(){
			// 先取得區塊的高及標題區塊等資料
			var $this = $(this), 
				_height = $this.height(), 
				$caption1 = $('.caption1', $this),
				_captionHeight = $caption1.outerHeight(true),
				_speed = 200;
			
			// 當滑鼠移動到區塊上時
			$this.hover(function(){
				// 讓 $caption 往上移動
				$caption1.stop().animate({
					top: _height - _captionHeight
				}, _speed);
			}, function(){
				// 讓 $caption 移回原位
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
  e.stopPropagation(); //不要點到父元素
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
  e.stopPropagation(); //不要點到父元素
})