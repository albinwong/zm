<?php
    /*验证码*/
    //1.创建画布
    session_start();
      $width = 120;
      $height = 40;
      $hImg = imagecreatetruecolor($width,$height);
      
    //2.画画
        //0).背景
            imagefill($hImg,0,0,randColor());
        //1).画干扰点
            for($i=0;$i<=200;$i++){
                imagesetpixel($hImg,rand(0,$width),rand(0,$height),randColor(2));
            }
        //2).画干扰线
            for($i=0;$i<=8;$i++){
                imageline($hImg,rand(0,$width),rand(0,$height),rand(0,$width),rand(0,$height),randColor(2));
            }
        
        //3).画内容
           $str = "3456789abcdefghjkmnpqrstuvwxyABCDEFGHJKMNPQRSTUVWXY";
           
           $code = substr(str_shuffle($str),0,4);
           $_SESSION('code') = $code;
           // session(['code' => $code]);
           for($i=0;$i<4;$i++){
                imagettftext($hImg,20,rand(-18,18),10+$i*30,rand(20,40),randColor(2),'./arialbd.ttf',$code[$i]);
           }
    //3.输出
       header('Content-type:image/jpeg;');
       imagejpeg($hImg);
    
    //4.释放
       imagedestroy($hImg);
        
      
      
    /*
        生成随机颜色
        参数: $flag  = 1 浅色
              $flag != 1 深色   
    */
    function randColor($flag=1)
    {
        global $hImg;
        if($flag==1){
            return imagecolorallocate($hImg,rand(128,255),rand(128,255),rand(128,255)); //浅色
        }
            
        return imagecolorallocate($hImg,rand(0,127),rand(0,127),rand(0,127));  //深色
        
    }
