@extends('layout.home')
@section('title','友情链接【追梦在线订餐网】')
@section('content')
<style type="text/css">
#bd {
  background-color: #ffffff;
  border: 1px solid #cccccc;
  border-radius: 5px;
  box-shadow: 0 0 10px #e6e6e6;
  list-style: outside none none;
  margin: 0 auto;
  padding: 10px;
  width: 930px;
}
p {
  line-height: 1.9;
}
.test{
  width:150px;
  padding-top:20px;
  /*border:1px solid #ddd;*/
  float:left;
  margin-left:20px;
  margin-top:20px;
}

</style>
<div id="bd">
<!-- 图片链接start -->
<table class="goodlink">
  <tbody>
    <tr>
      <td style=" font-size:14px;" height="40"><strong>图片链接：</strong></td>
    </tr>
    <tr>
      <td><table width="885" cellspacing="0" cellpadding="0" border="0">
     <tbody>
      <tr class="test">
      
      @foreach($res as $k=>$v)
        @if(!empty($res[$k]->logo))
        <div class="picpic test" align="center"><a href="{{$v->url}}" target="_blank" title="{{$v->content}}" style="display:block"><img src="{{$v->logo}}" border="0"><br>
        <span style="line-height:30px;">{{$v->linkname}}</span></a></div>
        @endif
      @endforeach
      </tr>
      
     </tbody>
</table>
</td>
    </tr>
</tbody>
</table>
<!-- 图片链接end -->
<hr>
<!-- 文字链接start -->
<table class="goodlink">
  <tbody>
    <tr>
    <td colspan="2" style="font-size:14px;" height="30"><strong>文字链接：</strong></td>
    </tr>
    <tr>
      <td style="line-height:25px;">
      @foreach($res as $k=>$v)
        <a title="{{$v->content}}" target="_blank" href="{{$v->url}}">{{$v->linkname}}</a> ┆
        @endforeach
      </td>
  </tr>
  </tbody>
</table>
<!-- 文字链接end -->
    <hr>
<!-- 申请链接 start-->
<style type="text/css">
.test1{
  padding-left:12px;
  font-size:14px;
}
.test2{
  line-height: 24px;
  padding-left: 12px;
}
</style>
<table class="goodlink2">
 <tbody>
   <tr>
   <td class="test1"><strong>申请步骤：</strong></td>
   </tr>
   <tr>
   <td class="test1" valign="top" style="line-height: 30px; padding-left: 12px;font-size:16px;">1.请先在贵网站做好追梦订餐网的友情链接，链接代码如下：</td>
   </tr>
   <tr>
   <td>
   <!-- test` -->
     <table width="925" cellspacing="0" cellpadding="0" border="0">
      <tbody>
      <tr>
        <td style="line-height: 24px;" class="test1" width="50%"><strong>文字链接</strong></td>
        <td style="line-height: 24px;" class="test1" width="50%"><strong>图片链接</strong></td>
      </tr>
      <tr>
        <td class="test2">显示：<a href="http://www.zm.com" target="_blank" title="追梦订餐网">追梦订餐网</a></td>
        <td>
          <table width="300">
            <tbody>
              <tr>
                <td style="width:60px;" class="test2">显示：</td>
                <td width="252"><a href="http://www.zm.com" target="_blank"><img src="/homes/images/logo.png" alt="追梦订餐网" onclick="return false;" title="追梦订餐网" width="50%" border="0"></a></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td class="test2">代码：
          <form id="form1" name="form1" method="post" action="">
              <label>
              <textarea name="textarea" cols="40" rows="5">&lt;a href="http://www.zm.com" target="_blank" title="追梦订餐网"&gt;追梦订餐网&lt;/a&gt;</textarea>
            </label>
            </form>
        </td>
        <td class="test2">代码：
          <form id="form1" name="form1" method="post" action="">
            <label>
            <textarea style="overflow-x:visible;overflow-y:visible;" rows="5" cols="40">&lt;a href="http://www.zm.com" target="_blank"&gt;&lt;img src="http://www.zm.com/homes/images/logo_bg.jpg" alt="追梦订餐网" title="追梦订餐网" border="0" /&gt;&lt;/a&gt;</textarea>
            </label>
            </form>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="line-height: 30px; padding: 12px 0 0 12px;">2.添加完成后，请发送邮件到<a href="mailto:albinwong@163.com">albinwong@163.com</a>邮件，或联系QQ：365354990，并请说明您的网站名称、网站地址、网站类型、交换链接页面URL等，我们会尽快给您回复。<br></td>
      </tr>
      <tr>
        <td colspan="2" style="line-height: 30px; padding-left: 12px;">3.已经开通我站友情链接且内容健康，符合本站友情链接要求的网站，经追梦订餐网管理员审核后，可以显示在此友情链接页面。</td>
      </tr>
      </tbody>
    </table>
   <!-- test` -->
   </td>
  </tr>
 </tbody>
</table>
<!-- 申请链接 end-->
  </div>
@endsection
