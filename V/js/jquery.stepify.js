(function ($){

	//console.log('Init stepify');

	$.fn.stepify = function(options){

		//Options
		var defaultOptions = {
			distribution : [this.length/2, this.length-this.length/2],
			 //By default, divide the elements into two parts.
			stepContainerClass : 'stepify-container',
			nextBtn : {
				text : '下一步 &gt;',
				cssClass : 'next-step'
			},
			prevBtn : {
				text : '&lt; 上一步',
				cssClass : 'prev-step'
			},
			submitBtn : {
				text:'送出',
				id:'send',
				cssclass:'btn-submit'

			},
			SeetaskBtn : {
				text:'確認資料',
				id:'see',
				cssclass:'btn-see'

			},
			cancelBtn : {
				text:'修改',
				id:'cancel',
				cssclass:'btn-see'

			},
			navBtnContainerClass : 'nav-btn-container',
			mainContainerClass : 'stepify-elem-container',
			btnAlign:'center',
			prevHooks : {},
			nextHooks : {},
		}

		function bindHooks(){

			var prevHooks = opt.prevHooks,
			nextHooks = opt.nextHooks,
			$steps = $('.'+opt.stepContainerClass);

			if(!_.isEmpty(prevHooks)){
				$.each(prevHooks, function(stepId, hookFunctions){
					$steps.eq(stepId).data('hooks-prev',hookFunctions);
				});
			}

			if(!_.isEmpty(nextHooks)){
				$.each(nextHooks, function(stepId, hookFunctions){
					$steps.eq(stepId).data('hooks-next',hookFunctions);
				});

			}

		}


		function bindHandlers(){

			$('.'+opt.nextBtn.cssClass).on('click',function(event){
				var $this = $(this),
				$target = $(event.target);

				var $sequenceStep = $this.parents('.'+opt.stepContainerClass),
				hooks = $sequenceStep.data('hooks-next'),
				proceed = true;

				if(hooks){
					$.each(hooks, function(index, hookFunction){
						proceed = hookFunction($sequenceStep);
						return proceed;
					});
				}

				if(proceed){
					$sequenceStep.animate({'opacity':0},500,function(){
						$sequenceStep.addClass('hidden')
							.css({'opacity':1})
							.next().removeClass('hidden');
					});
				}


			});

			$('.'+opt.prevBtn.cssClass).on('click',function(event){
				var $this = $(this),
				$target = $(event.target);

				var $sequenceStep = $this.parents('.'+opt.stepContainerClass),
				hooks = $sequenceStep.data('hooks-prev'),
				proceed = true;

				if(hooks){
					$.each(hooks, function(index, hookFunction){

						proceed = hookFunction($sequenceStep);
						return proceed;

					});
				}

				if(proceed){
					$sequenceStep.animate({'opacity':0},500,function(){
						$sequenceStep.addClass('hidden')
							.css({'opacity':1})
							.prev().removeClass('hidden');
					});
				}


			});
		}


		var opt = $.extend(defaultOptions, options);

		var stepContainerStr = '<div class="'+opt.stepContainerClass+'"></div>',
		btnContainerStr = '<div class="'+opt.navBtnContainerClass+'"></div>';

		var prevBtnStr = '<div class="btn '+opt.prevBtn.cssClass+'">'+opt.prevBtn.text+'</div>',
		nextBtnStr = '<div class="btn '+opt.nextBtn.cssClass+'">'+opt.nextBtn.text+'</div>',
		seeBtnStr = '<div id="sendseetask" class="btn btn-seetask '+opt.SeetaskBtn.cssClass+'">'+opt.SeetaskBtn.text+'</div>',
		submitBtnStr = '<input type="submit" id="sendnewtask" class="btn btn-info '+opt.submitBtn.cssClass+'" value="'+opt.submitBtn.text+'" ></input>',
		cancelBtnStr = '<div id="canceltask" class="btn btn-seetask '+opt.cancelBtn.cssClass+'">'+opt.cancelBtn.text+'</div>',

		divStr = '<div></div>';

		var stepContainers = 0,
		currentElement = 0,
		$originalSet = this,
		$parent = $originalSet.parent();


		$.each(opt.distribution, function(index, numberOfElements){

			var $btnContainer = $(btnContainerStr),
			$stepContainer = $(stepContainerStr),
			$div = $(divStr);

			$div.addClass(opt.mainContainerClass);
			$btnContainer.append(prevBtnStr + nextBtnStr);

			for(var i=0;i<numberOfElements;i++){
				$div.append($originalSet[currentElement]);
				currentElement++;
			}

			$stepContainer.append($div);
			$stepContainer.append($btnContainer);

			//console.log(index);

			if(index===0){
				$stepContainer.children().find('.'+opt.prevBtn.cssClass).remove();

			}else{
				if(index===opt.distribution.length-1){

					//This is the last step in the process
					$stepContainer.children().find('.'+opt.nextBtn.cssClass).remove();
					$stepContainer.children('.nav-btn-container').append(seeBtnStr);
					$stepContainer.children('.nav-btn-container').append(cancelBtnStr);
					$stepContainer.children('.nav-btn-container').append(submitBtnStr);

				}
			}

			//Set the id of the stepContainer
			$stepContainer.attr('id','step-'+stepContainers);
			stepContainers = stepContainers+1;

			$parent.append($stepContainer);

		});

		$('.'+opt.stepContainerClass).addClass('hidden').eq(0).removeClass('hidden');

		$('.nav-btn-container','.'+opt.stepContainerClass).addClass('stepify-ba-'+opt.btnAlign);

		bindHandlers();
		bindHooks();


	}


})(jQuery);