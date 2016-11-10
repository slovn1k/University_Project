window.addEvent('domready',function() {
			/* smooth */
			new SmoothScroll({duration:500});
			
			/* link management */
			$('gototop').set('opacity','0').setStyle('display','block');
			
			/* scrollspy instance */
			var ss = new ScrollSpy({
				min: 200,
				onEnter: function(position,enters) {
					//if(console) { console.log('Entered [' + enters + '] at: ' + position.x + ' / ' + position.y); }
					$('gototop').fade('in');
				},
				onLeave: function(position,leaves) {
					//if(console) { console.log('Left [' + leaves + '] at: ' + position.x + ' / ' + position.y); }
					$('gototop').fade('out');
				},
				onTick: function(position,state,enters,leaves) {
					//if(console) { console.log('Tick  [' + enters + ', ' + leaves + '] at: ' + position.x + ' / ' + position.y); }
				},
				container: window
			});
		});
