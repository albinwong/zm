$(function(){
	$('#userLogin').click(function(){
	  $('.modal').modal();
	}); 
	function re_captcha() {
		$url = "{{ URL('kit/captcha') }}";
		    $url = $url + "/" + Math.random();
		    document.getElementById('codeImg').src=$url;
		}
});  