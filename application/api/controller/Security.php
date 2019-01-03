<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/12/4
 * Time: 3:08 PM
 */

namespace app\api\controller;


use app\api\model\Eposit;

class Security extends Base
{
    /*
   * 提交一、农民工工资保障金缴存情况
   */
    public function PostEpositDataadd()
    {
        $data = input('param.');
        $res = Eposit::PostDataByAll($data);
        return json(msg(200, $res, '获取成功'));
    }

    /*
     * 获取一、农民工工资保障金缴存情况
     */
    public function GetEpositByData()
    {
        $data = input('param.');
        $res = Eposit::GetByList($data);
        return json(msg(200, $res, '获取成功'));
    }

    /*
    * 修改 一、农民工工资保障金缴存情况信息
    */
    public function PosEpositByUpdate()
    {
        $data = input('param.');
        $res = Eposit::where('id', $data['id'])->data($data)->update();
        return json(msg(200, $res, '更新成功'));
    }


    /*
     * 修改 一、农民工工资保障金缴存情况状态
     */
    public function GetEpositByStatus()
    {
        $data = input('param.');
        $res = Eposit::where('id', $data['id'])->data(['status' => $data['status']])->update();
        return json(msg(200, $res, '提交成功'));
    }

    /*
    * 删除 一、农民工工资保障金缴存情况
    */
    public function GetEpositByDelete()
    {
        $data = input('param.');
        $res = Eposit::where('id', $data['id'])->delete();
        return json(msg(200, $res, '提交成功'));
    }

    /*
     * 获取单挑数据信息
     */
    public function GetEpositByFind()
    {
        $data = input('param.');
        $res = Eposit::where('id', $data['id'])->find();
        return json(msg(200, $res, '获取成功'));
    }

}