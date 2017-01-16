<link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
<script type="text/javascript" src="/homes/bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/homes/bootstrap/js/holder.js"></script>
<link rel="stylesheet" type="text/css" href="/homes/css/easyui.css">
<link rel="stylesheet" type="text/css" href="/homes/css/icon.css">
<script type="text/javascript" src="homes/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="homes/js/jquery.easyui.min.js"></script>
<script language="JavaScript">
  $(document).ready(function clock(){
    var time = new Date();
    var hour = time.getHours();
    var minutes = time.getUTCMinutes();
    var second = time.getSeconds();
    var secondtime = second * 6;
    var minutestime = minutes * 6;
    var hourtime = hour * 30 + minutes/2;
      $(".second").css("-moz-transform","rotate(" + secondtime + "deg)");
      $(".minutes").css("-moz-transform","rotate(" + minutestime + "deg)");
      $(".hour").css("-moz-transform","rotate(" + hourtime + "deg)");
      $(".second").css("-ms-transform","rotate(" + secondtime + "deg)");
      $(".minutes").css("-ms-transform","rotate(" + minutestime + "deg)");
      $(".hour").css("-ms-transform","rotate(" + hourtime + "deg)");
      $(".second").css("-webkit-transform","rotate(" + secondtime + "deg)");
      $(".minutes").css("-webkit-transform","rotate(" + minutestime + "deg)");
      $(".hour").css("-webkit-transform","rotate(" + hourtime + "deg)");
      $(".second").css("-o-transform","rotate(" + secondtime + "deg)");
      $(".minutes").css("-o-transform","rotate(" + minutestime + "deg)");
      $(".hour").css("-o-transform","rotate(" + hourtime + "deg)");
    if(second%2 == 0){
      $(".top1").show();
      $(".top").hide();
    }else{
      $(".top1").hide();
      $(".top").show();
    }
    setTimeout(clock,1000)
  }); 
</script> 
<style type="text/css">
  .c5 {
      background-color: rgba(0, 0, 0, 0.8);
      bottom: 0;
      left: 0;
      position: fixed;
      right: 0;
      top: 0;
      z-index: 20;
  }
  .icon_clock{
    background-image: url("/homes/images/clock-icon.png");
    width: 700px;
    height:700px;
    margin: 0 auto;
    padding-top:50px; 
    background-repeat: no-repeat;
    left: 25%;
    position: fixed;
    top: 5%; 
    z-index: 22;
  }
  .hour{
    background-image: url("/homes/images/shi.png");
    width: 37px;
    height: 290px;
    background-repeat: no-repeat;
    margin-left:326px;;
    margin-top: 145px;
    display: block;
    position: absolute;
    z-index: 11;
    -moz-transform:rotate(45deg);
  }
  .second{
    background-image: url("homes/images/miao.png");
    width: 37px;
    height: 330px;
    background-repeat: no-repeat;
    margin-left:326px;
    margin-top: 125px;
    display: block;
    position: absolute;
    z-index: 13;
    -moz-transform:rotate(900deg);
  }
  .minutes{
    background-image: url("homes/images/fen.png");
    width: 37px;
    height: 290px;
    background-repeat: no-repeat;
    margin-left:326px;
    margin-top: 145px;
    display: block;
    position: absolute;
    z-index: 12;  
    -moz-transform:rotate(60deg);
  }
  .top{
    position: absolute;
    z-index: 1;
    background-color: rgba(255, 0, 0, 0);
    background-image: url("image/12.png");
    background-repeat: no-repeat;
    width: 50px;
    height: 50px;
    margin-left: 321px;
    margin-top: 123px;
  }
  .top1{
    position: absolute;
    z-index: 2;
    background-color: rgba(255, 0, 0, 0);
    background-image: url("image/12.png");
    background-repeat: no-repeat;
    width: 50px;
    height: 50px;
    margin-left: 315px;
    margin-top: 110px;
    background-size: 120% 120%;
    display: none;
  }
</style>
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">点击查看时间</button> 
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="icon_clock">
    <div class="hour"></div>
    <div class="second" id="second"></div>
    <div class="minutes"></div>
    <div class="top"></div>
    <div class="top1"></div>
    <div class="top1"></div>
  </div>
</div>
