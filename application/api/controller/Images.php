<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/12/4
 * Time: 10:35 AM
 */

namespace app\api\controller;


class Images extends Base
{
    public function GetImagesByFind()
    {
        $data = input('param.');

        $res = db('images');
        if ($data['roles'][0] == 'admin') {
            $res = $res->where('status', 1);
            $res = $res->where('project', $data['project']);
        } else {
            $res = $res->where('project', $data['project']);
        }
        $res = $res->where('type', $data['type'])->find();
        return json(msg(200, $res, '获取成功'));
    }

    public function PostImagesByData()
    {
        $data = input('param.');
        $check = db('images')->where('type', $data['type'])->where('project',$data['project'])->count();
//        dump($check);
        if ($check > 0) {
            $res = db('images')->where('type', $data['type'])->where('project',$data['project'])->data($data)->update();
            return json(msg(200, $res, '更新成功'));
        } else {
            $res = db('images')->insert($data);
            return json(msg(200, $res, '添加成功'));
        }
    }

    public function GetImagesByStatus()
    {
        $data = input('param.');
        $check = db('images')->where('type', $data['type'])->where('project',$data['project'])->data($data)->update();
        return json(msg(200, $check, '更新成功'));
    }

}