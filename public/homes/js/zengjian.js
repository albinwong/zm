$(document).ready(function () {
							 $('#horizontalTab').easyResponsiveTabs({
									type: 'default', //Types: default, vertical, accordion           
									width: 'auto', //auto or any width like 600px
									fit: true,   // 100% fit in a container
									closed: 'accordion', // Start closed if in accordion view
									activate: function(event) { // Callback function if tab is switched
									var $tab = $(this);
									var $info = $('#tabInfo');
									var $name = $('span', $info);
										$name.text($tab.text());
										$info.show();
									}
								});
													
							 $('#verticalTab').easyResponsiveTabs({
									type: 'vertical',
									width: 'auto',
									fit: true
								 });
						 });
						
						//数量的增减
						var btn1 = document.getElementById('btn1');
						var btn2 = document.getElementById('btn2');
						var count = document.getElementById('cou');
						//数量减
						btn1.onclick = function(){
							var jian = count.value;
							if(jian<=1){
								return false;
							}
							count.value = (--jian);
						}
						//数量加
						btn2.onclick = function(){
							var jian = count.value;
							count.value = (++jian);
						}
						$('.flavor').click(function(){
							//给所有同辈元素设置背景色
							$(this).siblings().css('background','whrite');
							//给自己设置背景色
							$(this).css('background','#ddd');
							//获取当前点击的li里的内容
							var v = $(this).html();
							//给隐藏域name="kouwei"的val赋值
							$('input[name="kouwei"]').val(v);
						});
						//
						$("#myTabs a").click(function (e) {
							  e.preventDefault()
							  $(this).tab('show') 
							})
								$('#myTabs a[href="#profile"]').tab('show');
								$('#myTabs a:first').tab('show');
								$('#myTabs a:last').tab('show');
								$('#myTabs li:eq(2) a').tab('show');