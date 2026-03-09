document.addEventListener("DOMContentLoaded", function(){

	var mainBanner = document.getElementById('main-banner');
	var bannerImage = document.getElementById('main-banner-image');
	var sectionGrid = document.getElementById('section-store-grid');

	var windowWidth = window.innerWidth;
	if(bannerImage != null && window.innerWidth > 1200){
		var bannerContent = document.getElementById('main-banner-col');

		var tweenBannerSet = new TimelineLite();
		var tweenContent = new TimelineLite();
		var tweenMove = new TimelineLite();

		tweenBannerSet.add(
			TweenLite.set(sectionGrid, {
				opacity: 0,
				y: 500,
			})
		  // TweenLite.to(bannerImage, 2, {
		  // 	scale: 1.3,
		  // 	x: -windowWidth * 0.2,
		  	  // x: -windowWidth * 0.25,
		     //  width: 224,
		     //  height: 433,
		     //  overflow: 'hidden',
		     //  boxShadow: "0px 4px 4px rgba(0, 0, 0, 0.25)",
		     //  background: "rgba(255, 255, 255, 0.01)",
		  // })
		);

		tweenContent.add(
		  TweenLite.to(bannerContent, .4, {
		  	opacity: 0,
		  	ease: Power1.easeInOut
		  })
		);

		tweenContent.add(
		  TweenLite.to(sectionGrid, 1, {css: {
		  	opacity: 1,
		  	y: 0,
		  }, delay: -.4})
		);

		// tweenMove.add(
		//   TweenLite.to(mainBanner, 1, {
		//   	yPercent: 30,
		//   })
		// );


		var controller = new ScrollMagic.Controller();

		var scene1 = new ScrollMagic.Scene({
		  triggerElement: '.main-banner',
		  duration: 200,
		  triggerHook: 0
		})
		.setTween(tweenContent)
		.setPin('.main-banner')
		.addTo(controller);

		// var scene2 = new ScrollMagic.Scene({
		//   triggerElement: '.main-banner',
		//   triggerHook: -.6
		// })
		// .setTween(tweenContent)
		// .addTo(controller);

		// var scene2_1 = new ScrollMagic.Scene({
		//   triggerElement: '.main-banner',
		//   duration: "100%",
		//   triggerHook: -1
		// })
		// .setTween(tweenMove)
		// .addTo(controller);

		var gridSet = document.querySelectorAll('.row-store-grid');

		if(gridSet != null){

			var tweenPanelSet = new TimelineLite();
			var tweenPanelLarge = new TimelineLite();
			var tweenPanelRed = new TimelineLite();
			var tweenPanelYellow = new TimelineLite();

			var tweenGridTitleSet = new TimelineLite();
			var tweenGridTitle = new TimelineLite();


			var panelLarge = document.querySelectorAll('.store-panel-large');
			var panelRed = document.querySelectorAll('.store-panel.panel-red');
			var panelYellow = document.querySelectorAll('.store-panel.panel-yellow');

			tweenGridTitleSet.set('.store-grid-title', {
		  	  y: 200,
		  	  opacity: 0
		  	})
		 	.set('.store-grid-text', {
		  	  y: 200,
		  	  opacity: 0
		  	});

			tweenGridTitle.to('.row-store-grid', .4, {
			  	  yPercent: -10
			  }).to('.store-grid-title', 1, {
			  	  y: 0,
			  	  opacity: 1
			  }).to('.store-grid-text', 1, {css: {
			  	  y: 0,
			  	  opacity: 1
			  }, delay: -.8});

			tweenPanelSet.set(panelLarge, {
			  	  y: 100,
			  	  opacity: 0
			  	})
				.set(panelRed, {
			  	  y: 300,
			  	  opacity: 0
			  	})
			  	.set(panelYellow, {
			  	  y: 100,
			  	  opacity: 0
			  	});

			tweenPanelLarge.to(panelLarge, 1, {
		  	  y: 0,
		  	  opacity: 1
		  	});

		  	tweenPanelRed.to(panelRed, 1, {
		  	  y: 0,
		  	  opacity: 1
		  	});

		  	tweenPanelYellow.to(panelYellow, .5, {
		  	  y: 0,
		  	  opacity: 1
		  	});

			var scene3 = new ScrollMagic.Scene({
			  triggerElement: gridSet,
			  triggerHook: .9
			})
			.setTween(tweenGridTitle)
			.addTo(controller);

			var scene4 = new ScrollMagic.Scene({
			  triggerElement: panelLarge,
			  triggerHook: 1
			})
			.setTween(tweenPanelLarge)
			.addTo(controller);

			var scene5 = new ScrollMagic.Scene({
			  triggerElement: panelRed,
			  triggerHook: 1
			})
			.setTween(tweenPanelRed)
			.addTo(controller);

			var scene6 = new ScrollMagic.Scene({
			  triggerElement: panelYellow,
			  triggerHook: 1.2
			})
			.setTween(tweenPanelYellow)
			.addTo(controller);
		}
			
	}

	var scrollPanel = document.getElementById('section-scroll-panels');

	if(scrollPanel != null){

	    var panelMockupRed = document.getElementById('red-mockup-panel');
	    var panelMockupOrange = document.getElementById('orange-mockup-panel');
	    var panelMockupGreen = document.getElementById('green-mockup-panel');

	    var scrollPanelMockup = document.getElementById('scroll-panel-mockup');

		var tweenPanelsScroll = new TimelineLite();
		var tweenPathScroll = new TimelineLite();

		tweenPanelsScroll.to(scrollPanel, 0, {css: {
			backgroundColor: '#ED7C16'
		}, delay: 1})
		.to(panelMockupRed, .1, {css: {
			width: '78%',
            left: '10%',
            top: '19%',
            zIndex: '1',
            opacity: '.9'
		}})
		.to(panelMockupOrange, .1, {css: {
			width: '89%',
            left: '5%',
            top: '11%',
            zIndex: '3',
            opacity: '1'
		}, delay: -.1})
		.to(panelMockupGreen, .1, {css: {
			width: '84%',
            left: '7%',
            top: '15%',
            zIndex: '2',
            opacity: '.9'
		}, delay: -.1})
		.to('.scroll-panel-mockup .round .path', .4, {css: {
			strokeDashoffset: 107
		}, delay: -.4})
		.to(scrollPanel, 1, {css: {
			backgroundColor: '#ED7C16'
		}})
		.to(scrollPanel, 0, {css: {
			backgroundColor: '#349433'
		}, delay: 1})
		.to(panelMockupOrange, .1, {css: {
			width: '78%',
            left: '10%',
            top: '19%',
            zIndex: '1',
            opacity: '.9'
		}})
		.to(panelMockupGreen, .1, {css: {
			width: '89%',
            left: '5%',
            top: '11%',
            zIndex: '3',
            opacity: '1'
		}, delay: -.1})
		.to(panelMockupRed, .1, {css: {
			width: '84%',
            left: '7%',
            top: '15%',
            zIndex: '2',
            opacity: '.9'
		}, delay: -.1})
		.to('.scroll-panel-mockup .padlock', .1, {css: {
			opacity: 0,
		}, delay: -.1})
		.to('.scroll-panel-mockup .lock', .1, {css: {
			opacity: 1,
		}, delay: -.1})
		.to('.scroll-panel-mockup .round .path', .4, {css: {
			strokeDashoffset: 0
		}, delay: -.4})
		.to(scrollPanel, 1, {css: {
			backgroundColor: '#349433'
		}});

		var controllerPanels = new ScrollMagic.Controller();

		var scenePanels = new ScrollMagic.Scene({
		  triggerElement: scrollPanel,
		  triggerHook: 0,
		  duration: "350%",
		})
		.setTween(tweenPanelsScroll)
		.setPin(scrollPanel)
		.addTo(controllerPanels);

	}

	var sectionCase = document.getElementById('section-case');
	if(sectionCase != null){
		var tweenCaseSet= new TimelineLite();
		var tweenCase = new TimelineLite();

		tweenCaseSet.set('.case-text-item', {
		  	  y: 200,
		  	  opacity: 0
		  	})
		 	.set('.case-image-item', {
		  	  opacity: 0
		  	})
		  	.set('.case-user-image',{
		  		x: 100,
		  		opacity: 0
		  	})
		  	.set('.case-user-col', {
				x: 100,
		  		opacity: 0
		  	})
		  	.set('.case-icon-text', {
		  		y: 100,
		  		opacity: 0
		  	})
		  	.set('.v-line, .v-line-sm', {
		  		opacity: 0,
		  		height: 0
		  	})
		  	.set('.g-line', {
		  		width: 0,
		  		opacity: 0
		  	})
		  	.set('.case-image-2 .case-user-abs', {
		  		x: -10,
		  		opacity: 0
		  	})
		  	.set('.case-image-2 .case-mockup-block .icon-block', {
		  		opacity: 0
		  	})
		  	.set('.case-image-3 .case-mockup-block', {
		  		x: 500
		  	})
		  	.set('.case-image-3 .case-info-lg', {
		  		y: 50,
		  		opacity: 0
		  	})
		  	.set('.case-image-3 .case-info-lg .g-line', {
		  		width: 0,
		  		opacity: 0
		  	});

	  var vLineHeight = 60;
	  var vLineHeightSm = 40;

	  if(window.innerWidth < 481){
	  	vLineHeight = 20;
	  	vLineHeightSm = 10;
	  }

	  tweenCase.to('.case-text-item.case-item-1', 1, {
	  	  y: 0,
	  	  opacity: 1
	  	})
	 	.to('.case-image-item.case-image-1', 1, {
	  	  opacity: 1
	  	})
	  	.to('.case-image-1 .case-user-image', .4, {
	  		x: 0,
	  		opacity: 1
	  	})
	  	.to('.case-image-1 .case-user-col', .4, {css: {
	  		x: 0,
	  		opacity: 1
	  	}, delay: -.1})
	  	.to('.case-image-1 .v-line', .4, {css: {
	  		height: vLineHeight,
	  		opacity: 1
	  	}, delay: -.1})
	  	.to('.case-image-1 .case-icon-text.first-item', .4, {css: {
	  		y: 0,
	  		opacity: 1
	  	}, delay: -.3})
	  	.to('.case-image-1 .case-icon-text.first-item+.v-line-sm', .4, {css: {
	  		height: vLineHeightSm,
	  		opacity: 1
	  	}, delay: -.1})
	  	.to('.case-image-1 .case-icon-text.second-item', .4, {css: {
	  		y: 0,
	  		opacity: 1
	  	}, delay: -.3})
	  	.to('.case-image-1 .case-icon-text.second-item+.v-line-sm', .4, {css: {
	  		height: vLineHeightSm,
	  		opacity: 1
	  	}, delay: -.1})
	  	.to('.case-image-1 .case-icon-text.third-item', .4, {css: {
	  		y: 0,
	  		opacity: 1
	  	}, delay: -.3})
	  	.to('.case-image-1 .case-icon-text:not(.down) .g-line', .4, {css: {
	  		width: 100,
	  		opacity: 1
	  	}, delay: -.3})
	  	.to('.case-image-1 .case-icon-text.down', .4, {css: {
	  		opacity: 1,
	  		y: 0
	  	}, delay: -.3})
	  	.to('.case-image-1 .case-icon-text.down .g-line', .4, {css: {
	  		width: 100,
	  		opacity: 1
	  	}, delay: -.1})
	  	.to('.case-image-1 .case-icon-text.down .secure', .4, {
	  		opacity: 0
	  	})
	  	.to('.case-image-1 .case-icon-text.down .unsecure', .4, {css: {
	  		opacity: 1,
	  		visibility: 'visible'
	  	}, delay: -.2})
	  	.to('.case-image-1 .case-icon-text.down .case-icon-img', .4, {css: {
	  		fill: '#E4524C'
	  	}, delay: -.4})
	  	.to('.case-image-1 .case-icon-text.down .g-line', .4, {css: {
	  		backgroundColor: '#E4524C'
	  	}, delay: -.4})
	  	.to('.case-text-item.case-item-1', .4, {css: {
	  		opacity: 0,
	  	}, delay: .4})
	  	.to('.case-image-1 .case-info', .4, {css: {
	  		opacity: 0,
	  	}, delay: -.4})
	  	.to('.case-image-1 .case-mockup-block', .4, {css: {
	  		opacity: 0,
	  	}, delay: -.4})
	  	.to('.case-text-item.case-item-2', .4, {css: {
	  		opacity: 1,
	  		visibility: 'visible',
	  		y: 0
	  	}, delay: .1})
	  	.to('.case-image-2 .case-mockup-block', .4, {css: {
	  		opacity: 1,
	  	}, delay: -.4})
	  	.to('.case-image-item.case-image-2', 1, {
	  	  opacity: 1
	  	})
	  	.to('.case-image-2 .case-user-image', .4, {
	  		x: 0,
	  		opacity: 1
	  	})
	  	.to('.case-image-2 .case-user-next', .2, {
	  		x: 0,
	  		opacity: 1
	  	})
	  	.to('.case-image-2 .case-user-next-second', .2, {
	  		x: 0,
	  		opacity: 1
	  	})
	  	.to('.case-image-2 .case-user-col', .4, {css: {
	  		x: 0,
	  		opacity: 1
	  	}, delay: -.1})
	  	.to('.case-image-2 .v-line', .4, {css: {
	  		height: vLineHeight,
	  		opacity: 1
	  	}, delay: -.1})
	  	.to('.case-image-2 .case-icon-text.first-item', .4, {css: {
	  		y: 0,
	  		opacity: 1
	  	}, delay: -.3})
	  	.to('.case-image-2 .case-icon-text.first-item+.v-line-sm', .4, {css: {
	  		height: vLineHeightSm,
	  		opacity: 1
	  	}, delay: -.1})
	  	.to('.case-image-2 .case-icon-text.second-item', .4, {css: {
	  		y: 0,
	  		opacity: 1
	  	}, delay: -.3})
	  	.to('.case-image-2 .case-icon-text.second-item+.v-line-sm', .4, {css: {
	  		height: vLineHeightSm,
	  		opacity: 1
	  	}, delay: -.1})
	  	.to('.case-image-2 .case-icon-text.third-item', .4, {css: {
	  		y: 0,
	  		opacity: 1
	  	}, delay: -.3})
	  	.to('.case-image-2 .case-icon-text:not(.down) .g-line', .4, {css: {
	  		width: 100,
	  		opacity: 1
	  	}, delay: -.3})
	  	.to('.case-image-2 .case-icon-text.down', .4, {css: {
	  		opacity: 1,
	  		y: 0
	  	}, delay: -.3})
	  	.to('.case-image-2 .case-icon-text.down .g-line', .4, {css: {
	  		width: 100,
	  		opacity: 1
	  	}, delay: -.1})
	  	.to('.case-image-2 .case-mockup-block .important', .4, {
	  		opacity: 1
	  	})
	  	.to('.case-image-2 .case-icon-text .g-line, .case-image-2 .v-line-sm, .case-image-2 .v-line', .4, {css: {
	  		backgroundColor: '#B00020' 
	  	}, delay: -.4})
	  	.to('.case-image-2 .case-icon-text .case-icon-img', .4, {css: {
	  		fill: '#B00020' 
	  	}, delay: -.4})
	  	.to('.case-image-2 .case-mockup-block .important', .4, {css: {
	  		opacity: 0
	  	}, delay: .4})
	  	.to('.case-image-2 .case-mockup-block .user', .4, {css: {
	  		opacity: 1
	  	}, delay: .4})
	  	.to('.case-image-2 .case-icon-text .g-line, .case-image-2 .v-line-sm, .case-image-2 .v-line', .4, {css: {
	  		backgroundColor: 'rgba(0,0,0,.12)' 
	  	}, delay: -.4})
	  	.to('.case-image-2 .case-icon-text .case-icon-img', .4, {css: {
	  		fill: 'rgba(0,0,0,.6)' 
	  	}, delay: -.4})
	  	.to('.case-image-2 .case-icon-text-hacker', .4, {css: {
	  		opacity: .6 
	  	}, delay: -.4})
	  	.to('.case-image-2 .case-icon-text-hacker .g-line', .4, {css: {
	  		opacity: 0 
	  	}, delay: -.4})

	  	.to('.case-text-item.case-item-2', .4, {css: {
	  		opacity: 0,
	  	}, delay: .4})
	  	.to('.case-image-2 .case-info', .4, {css: {
	  		opacity: 0,
	  	}, delay: -.4})
	  	.to('.case-image-2 .case-mockup-block', .4, {css: {
	  		opacity: 0,
	  	}, delay: -.4})
	  	.to('.case-text-item.case-item-3', .4, {css: {
	  		opacity: 1,
	  		visibility: 'visible',
	  		y: 0
	  	}, delay: .1})
	  	.to('.case-image-item.case-image-3', .4, {css: {
	  		opacity: 1,
	  		visibility: 'visible',
	  		y: 0
	  	}, delay: .4})
	  	.to('.case-image-3 .case-mockup-block', .4, {css: {
	  		opacity: 1,
	  		x: 0
	  	}, delay: -.4})
	  	.to('.case-image-3 .case-info-lg', .4, {css: {
	  		opacity: 1,
	  		y: 0
	  	}})
	  	.to('.case-image-3 .case-info-lg .g-line', .4, {css: {
	  		opacity: 1,
	  		width: 100
	  	}})
	  	.to('.case-image-3 .v-line', .4, {css: {
	  		height: vLineHeight,
	  		opacity: 1
	  	}, delay: -.1})
	  	.to('.case-image-3 .case-icon-text.first-item', .4, {css: {
	  		y: 0,
	  		opacity: 1
	  	}, delay: -.3})
	  	.to('.case-image-3 .case-icon-text.first-item+.v-line-sm', .4, {css: {
	  		height: vLineHeightSm,
	  		opacity: 1
	  	}, delay: -.1})
	  	.to('.case-image-3 .case-icon-text.second-item', .4, {css: {
	  		y: 0,
	  		opacity: 1
	  	}, delay: -.3})
	  	.to('.case-image-3 .case-icon-text.second-item+.v-line-sm', .4, {css: {
	  		height: vLineHeightSm,
	  		opacity: 1
	  	}, delay: -.1})
	  	.to('.case-image-3 .case-icon-text.third-item', .4, {css: {
	  		y: 0,
	  		opacity: 1
	  	}, delay: -.3})
	  	.to('.case-image-3 .case-icon-text:not(.down) .g-line', .4, {css: {
	  		width: 100,
	  		opacity: 1
	  	}, delay: -.3})
	  	.to('.case-image-3 .case-icon-text.down', .4, {css: {
	  		opacity: 1,
	  		y: 0
	  	}, delay: -.3})
	  	.to('.case-image-3 .case-icon-text.down .g-line', .4, {css: {
	  		width: 100,
	  		opacity: 1
	  	}, delay: -.1});



	  	var controllerCases = new ScrollMagic.Controller();

		var sceneCases = new ScrollMagic.Scene({
		  triggerElement: sectionCase,
		  triggerHook: .05,
		  duration: "800%",
		})
		.setTween(tweenCase)
		.setPin(sectionCase)
		.addTo(controllerCases);
	}

	var smartphonePage = document.getElementById('smartphone-page');
	if(smartphonePage != null){

		var mainTextSmartphonePage = document.querySelector('.smartphone-page .section-text-center');

		var mainSmartphoneTweenSet = new TimelineLite();
		var mainSmartphoneTween = new TimelineLite();

		mainSmartphoneTween.to('.smartphone-page .section-text-center', .4, {
			opacity: 0
		});

		var controllerSmartphone = new ScrollMagic.Controller();

		var sceneSmartphoneText = new ScrollMagic.Scene({
		  triggerElement: mainTextSmartphonePage,
		  triggerHook: .05,
		})
		.setTween(mainSmartphoneTween)
		.setPin(mainTextSmartphonePage)
		.addTo(controllerSmartphone);

		var sectionBigImage = document.getElementById('section-big-image');
		if(sectionBigImage != null){
			var listsTweenSet = new TimelineLite();	
			var listsTween = new TimelineLite();

			var doubleListItems = document.querySelectorAll('.double-list li');


			var listsTweenArray = new Array();

			var sceneSmartphoneList = new Array();

			for(var i = 0; i < doubleListItems.length; i++){
				listsTweenSet.set(doubleListItems[i], {
					opacity: 0,
					y: 50,
				})

				listsTweenArray[i] = new TimelineLite();

				listsTweenArray[i].to(doubleListItems[i], .3, {
					opacity: 1,
					y: 0
				});

				sceneSmartphoneList[i] = new ScrollMagic.Scene({
				  triggerElement: doubleListItems[i],
				  triggerHook: .7,
				})
				.setTween(listsTweenArray[i])
				.addTo(controllerSmartphone);
			}

			var mockupTween = new TimelineLite();

			var bigImage = document.querySelector('.section-big-image .bg-big-image');

			mockupTween.to(bigImage, 2, {
				y: -100,
			});

			var sceneSmartphone = new ScrollMagic.Scene({
			  triggerElement: bigImage,
			  triggerHook: 0,
			  duration: '100%'
			})
			.setTween(mockupTween)
			.addTo(controllerSmartphone);
		}

		var sectionScrollableMode = document.getElementById('section-scrollable-mode');
		if(sectionScrollableMode != null){
			var scrollableMockupImages = document.querySelectorAll('.scrollable-mockup .scrollable-inner img');
			var scrollableText = document.querySelectorAll('.scrollable-text-block .scrollable-text');

			var scrollableTweenSet = new TimelineLite();
			var scrollableTween = new TimelineLite();

			for(var i = 0; i < scrollableText.length; i++){
				if(i != 0){
					scrollableTweenSet.set(scrollableText[i], {
						yPercent: 120
					})
					.set(scrollableMockupImages[i], {
						yPercent: 120
					});
				}
			}

			scrollableTween.to(scrollableText[0], .3, {
				yPercent: 0
			}).to(scrollableText[0], 1, {
				yPercent: -120
			})
			.to(scrollableText[1], 1, {css: {
				yPercent: 0
			}, delay: -1})
			.to(scrollableMockupImages[1], 1, {css: {
				yPercent: 0
			}, delay: -1})
			.to(sectionScrollableMode, 0, {css: {
				backgroundColor: '#E4524C'
			}, delay: -.5})
			.to(scrollableText[1], 1, {
				yPercent: -120
			})
			.to(scrollableText[2], 1, {css: {
				yPercent: 0
			}, delay: -1})
			.to(scrollableMockupImages[2], 1, {css: {
				yPercent: 0
			}, delay: -1})
			.to(sectionScrollableMode, 0, {css: {
				backgroundColor: '#F4E23A'
			}, delay: -.5})
			.to(sectionScrollableMode, 1, {css: {
				backgroundColor: '#F4E23A'
			}});

			var sceneScrollable = new ScrollMagic.Scene({
			  triggerElement: sectionScrollableMode,
			  triggerHook: 0,
			  duration: "400%",
			})
			.setTween(scrollableTween)
			.setPin(sectionScrollableMode)
			.addTo(controllerSmartphone);
		}


		var sectionLargeImage = document.getElementById('section-large-img');
		if(sectionLargeImage != null){
			var sectionLargeImageItem = sectionLargeImage.querySelector('img');
			var largeImageTweenSet = new TimelineLite();
			var largeImageTween = new TimelineLite();

			var body = document.body;

			largeImageTweenSet.set(sectionLargeImageItem, {
				scaleX: 1.5, 
				scaleY: 1.5
			});

			largeImageTween.to(sectionLargeImageItem, 1,{
				scaleX: .8, 
				scaleY: .8
			});

			var sceneLargeImage = new ScrollMagic.Scene({
			  triggerElement: sectionLargeImage,
			  triggerHook: 0,
			  duration: "120%",
			})
			.setTween(largeImageTween)
			.setPin(sectionLargeImage)
			.addTo(controllerSmartphone);

		}
	}

	if(document.getElementById('divider') != null){
		var $draggable = $('.divider').draggabilly({
			axis: 'x',
		});

		$draggable.on( 'dragMove', function( event, pointer, moveVector ) {
			var value = pointer.x;
			$('.draggable-next-block').css({'transform' : 'translateX('+value+'px)'});
			$('.draggable-next-block-inner').css({'transform' : 'translateX(-'+value+'px)'});
		})
	}

	//Button next
	var next_buttons = document.getElementsByClassName("next-case-button");
	if (next_buttons.length) {
		Array.prototype.forEach.call(next_buttons, function(button) {
			button.addEventListener("click", function(e) {
				e.preventDefault();
				scroll_top = document.documentElement.scrollTop;
				let scroll_value = 3;
				let current_scroll = scroll_value;
				let scroll = setInterval(function() {
					if (current_scroll < 500) {
						scroll_top = scroll_top + scroll_value;
						current_scroll = current_scroll + scroll_value;
						document.documentElement.scrollTop = scroll_top;
					} else {
						clearInterval(scroll);
					}
				}, 1);

			});
		});
	}


});