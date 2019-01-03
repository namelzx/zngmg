<?php

namespace app\index\controller;

use think\Controller;

header("Content-Type:text/html; charset=utf-8");
//@header('Content-type:application/word');
class Index extends Controller
{
    public function index()
    {

//        $html = $car;

        $word = new Word();
        $word->start();
        $wordname = rand().'.doc';
        $wordname = iconv('UTF-8', 'GBK', $wordname);//防止乱码
        $html = iconv('UTF-8', 'GBK', $html); //防止乱码
//        header('Content-Disposition: attachment; filename='.$wordname.'');

        echo $html;
        $word->save('./uploads/' . $wordname); //可以自定义保存路径
        $file_path='./uploads/' . $wordname;
        chmod($file_path,7777);
//        if(is_writable($file_path))
        {
            echo'“'.$file_path.'”'.'不可写！';
        }
        if(is_readable($file_path))
        {
            echo'“'.$file_path.'”'.'不可读！';
        }
        echo'“'.$file_path.'”'.'写入失败！';
        if(!file_exists($file_path))
        {
            echo'文件地址'.$file_path.'不存在，没有写成！';
        }

        ob_flush();//每次执行前刷新缓存
        flush();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }


}
