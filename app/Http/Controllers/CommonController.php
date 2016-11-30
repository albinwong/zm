
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class CommonController extends Controller
{
    //显示登录页面
   public function login()
   {
        return view('admin.login');
   }
   
   public function dologin(Request $request)
   {
        //读取用户名信息
        $res = DB::table('users')->where('username',$request->input('username'))->first();
          if(!$res){
            return back()->with('alert','用户名或密码不正确');
          }else{
              //检测密码
              if(Hash::check($request->input('password'),$res->password)){
                      session(['uid' => $res->id,'uname'=>$res->username,'auth'=>$res->auth]);
                      if(session('request')){
                        return redirect(session('redirect'));
                      }
                      return redirect('/admin');
              }else{
                  return back()->with('alert','用户名或密码不正确');
              }
          }
   }

   /**
    * 退出登录
    */
   public function logout()
   {
      session()->flush();
      return back();
   }


    /***********************后台************************************/

  /**
   * 评论管理
   */
  public function getIndex(Request $request)
  {
    //读取数据
    $comment = DB::table('comment')->orderBy('id','asc')->where(function($query) use ($request){
    //获取关键字的内容
    $k=$request->input('keyword');
    if(!empty($k)){
      $query->where('content','like','%'.$k.'%');
    }
    })->paginate($request->input('num', 10));
    //分配变量  解析模板
    return view('admin.comment.index',['comment'=>$comment,'request'=>$request]);
  }

  /**
   * 删除评论
   */
  public function getDelete(Request $request)
  {
    $id = $request->input('id');
    //执行删除
        $res = DB::table('comment')->where('id', $id) -> delete();
        if($res) {
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
  }

 
 /**
  * 前台商品评价
  */
    public function review(Request $request)
    {
        $id = $request->input('goods_id');
         return view('home.review.add',['id'=>$id]);
    }
    
    public function postReview(Request $request)
    {
        // $data = $request->all();
        //   dd($data);

          //获取数据
        $data = $request->except('_token');
        //dd($data);
         //处理图片
        //待拼接的数据
        $d=[];
        $tmp = [];
        if($request->hasFile('pics'))
        {   
            // $res = self::getReviewInfo();
            //获取所有的文件对象
            $files=$request->file('pics');
            foreach($files as $k=>$v){
                $fileName=time().rand(100000,999999);
                $suffix=$v->getClientOriginalExtension();
                //拼接文件名
                $fileName=$fileName.'.'.$suffix;
                //目录
                $dir='./Uploads/'.date('Ymd').'/';
                $v->move($dir,$fileName);
                //拼接ok的图片路径(绝对路径)
                $tmp['pics']=trim($dir.$fileName,'.');
            }
           
        }
         // $tmp['goods_id']=$gid;
            if(!empty(session('user_id'))){
                $tmp['user_id'] = session('user_id');
            }
            $time = time();
            // $tmp['star'] = $data['star'];
            $tmp['content'] = $data['content'];
            $tmp['regtime'] = $time;
            if(!empty($data['goods_id'])){
                $tmp['goods_id'] = $data['goods_id'];
            }
            $d[]=$tmp;
            // dd($tmp);
           $res = DB::table('comment')->insert($d);
            //检测
            if($res){
              //跳转
              return redirect('/')->with('info','插入成功');  
            }else{
              //回跳
              return back()->with('info','插入失败!!!!!!!!!!!!!!!!');
            }
    }

  
}