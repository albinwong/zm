<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//���ö�Ӧ�������ռ�
use Gregwar\Captcha\CaptchaBuilder;
use Session;

class KitController extends Controller
{
    
    public function captcha($tmp)
    {
        //������֤��ͼƬ��Builder����������Ӧ����
        $builder = new CaptchaBuilder;
        //��������ͼƬ��߼�����
        $builder->build();
        //��ȡ��֤�������
        $phrase = $builder->getPhrase();

        //�����ݴ���session
        Session::flash('milkcaptcha', $phrase);
        //����ͼƬ
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }


    public function testPhrase($phrase)
    {
        return ($this->builder->niceize($phrase) == $this->builder->niceize($this->getPhrase()));
    }

     
}
