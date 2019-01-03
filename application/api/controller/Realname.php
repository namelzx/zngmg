<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/12/2
 * Time: 11:19 PM
 */

namespace app\api\controller;


use app\api\model\Charge;
use app\api\model\Chargeinfo;
use app\api\model\General;
use app\api\model\Roster;
use app\api\model\Wages;

class Realname extends Base
{
    /*
     * 提交总承包、专业分包、劳务分包专户信息表
     */
    public function General()
    {
        $data = input('param.');
        $res = General::PostDataByAll($data);
        return json(msg(200, $res, '获取成功'));
    }

    /*
     * 获取提交总承包、专业分包、劳务分包专户信息表数据
     */
    public function GetGeneralByData()
    {
        $data = input('param.');
        $res = General::GetByList($data);
        return json(msg(200, $res, '获取成功'));
    }

    /*
    * 修改信息
    */
    public function PostGeneralByUpdate()
    {
        $data = input('param.');
        $res = General::where('id', $data['id'])->data($data)->update();
        return json(msg(200, $res, '更新成功'));
    }


    /*
     * 获取提交总承包、专业分包、劳务分包专户信息表数据
     */
    public function GetGeneralByStatus()
    {
        $data = input('param.');
        $res = General::where('id', $data['id'])->data(['status' => $data['status']])->update();
        return json(msg(200, $res, '提交成功'));
    }

    /*
    * 获取提交总承包、专业分包、劳务分包专户信息表数据
    */
    public function GetGeneralByDelete()
    {
        $data = input('param.');
        $res = General::where('id', $data['id'])->delete();
        return json(msg(200, $res, '提交成功'));
    }

    /** 劳资专管员*/
    /*
     * 获取劳资专管员信息表
     */
    public function GetChargeinfoByList()
    {
        $data = input('param.');
        $res = Chargeinfo::GetByList($data);
        return json(msg(200, $res, '获取成功'));
    }

    /*
     * 提交劳资专管员信息表数据
     */
    public function PostChargeinfoByData()
    {
        $data = input('param.');

        $res = Chargeinfo::PostDataByAll($data);
        return json(msg(200, $res, '获取成功'));
    }

    /*
     * 获取劳资专管员信息
     */
    public function GetChargeinfoByFind()
    {
        $data = input('param.');
        $res = Chargeinfo::where('id', $data['id'])->find();
        return json(msg(200, $res, '获取成功'));
    }

    /*
      * 获取提交总承包、专业分包、劳务分包专户信息表数据
      */
    public function GetChargeinfoByStatus()
    {
        $data = input('param.');
        $res = Chargeinfo::where('id', $data['id'])->data(['status' => $data['status']])->update();
        return json(msg(200, $res, '更新状态成功'));
    }

    /*
     * 修改信息
     */
    public function PostChargeinfoByUpdate()
    {
        $data = input('param.');
        $res = Chargeinfo::where('id', $data['id'])->data($data)->update();
        return json(msg(200, $res, '更新成功'));
    }

    /*
     * 删除信息
     */
    public function GetChargeinfoByDelete()
    {
        $data = input('param.');
        $res = Chargeinfo::where('id', $data['id'])->delete();
        return json(msg(200, $res, '删除成功'));
    }

    /** 附件4:劳资专管员工资发放情况材料(表)*/


    /*
   * 获取劳资专管员信息表
   */
    public function GetChargeByList()
    {
        $data = input('param.');
        $res = Charge::GetByList($data);
        return json(msg(200, $res, '获取成功'));
    }

    /*
     * 提交劳资专管员信息表数据
     */
    public function PostChargeByData()
    {
        $data = input('param.');

        $res = Charge::PostDataByAll($data);
        return json(msg(200, $res, '获取成功'));
    }

    /*
     * 获取劳资专管员信息
     */
    public function GetChargeByFind()
    {
        $data = input('param.');
        $res = Charge::where('id', $data['id'])->find();
        return json(msg(200, $res, '获取成功'));
    }

    /*
      * 获取提交总承包、专业分包、劳务分包专户信息表数据
      */
    public function GetChargeByStatus()
    {
        $data = input('param.');
        $res = Charge::where('id', $data['id'])->data(['status' => $data['status']])->update();
        return json(msg(200, $res, '更新状态成功'));
    }

    /*
     * 修改信息
     */
    public function PostChargeByUpdate()
    {
        $data = input('param.');
        $res = Charge::where('id', $data['id'])->data($data)->update();
        return json(msg(200, $res, '更新成功'));
    }

    /*
     * 删除信息
     */
    public function GetChargeByDelete()
    {
        $data = input('param.');
        $res = Charge::where('id', $data['id'])->delete();
        return json(msg(200, $res, '删除成功'));
    }


    /** 花名册*/
    /*
   * 获取提交花名册信息表
   */
    public function GetRosterByList()
    {
        $data = input('param.');
        $res = Roster::GetByList($data);
        return json(msg(200, $res, '获取成功'));
    }

    /*
     * 提交花名册
     */
    public function PostRosterByData()
    {
        $data = input('param.');
        $res = Roster::PostDataByinsert($data);
        return json(msg(200, $res, '提交成功'));
    }
    /*
     * 批量提交
     */
    public function PostRosterByAll()
    {
        $data = input('param.');
        $ret=[];
        foreach ($data['data'] as $v=>$item){
            $ret[$v]['project']=$data['project'];
            $ret[$v]['admin_id']=$data['admin_id'];
            $ret[$v]['name']=$item['序号'];
            $ret[$v]['number']=$item['用户名'];

            $ret[$v]['sex']=$item['性别'];
            $ret[$v]['cardid']=$item['身份证号码'];
            $ret[$v]['account']=$item['户口所在地'];
            $ret[$v]['enter_time']=$item['进场时间'];
            $ret[$v]['retreat_time']=$item['退场时间'];
            $ret[$v]['setcolumn']=$item['合同编号'];
            $ret[$v]['payrate']=$item['工资标准'];
            $ret[$v]['cardno']=$item['银行卡号'];
            $ret[$v]['mobile']=$item['手机号码'];
            $ret[$v]['note']=$item['备注'];
        }
       Roster::PostDataByAll($ret);
        return json(msg(200, $ret, '追加成功'));
    }

    /*
     * 获取花名册
     */
    public function GetRosterByFind()
    {
        $data = input('param.');
        $res = Roster::where('id', $data['id'])->find();
        return json(msg(200, $res, '获取成功'));
    }

    /*
      * 修改花名册状态
      */
    public function GetRosterByStatus()
    {
        $data = input('param.');
        $res = Roster::where('id', $data['id'])->data(['status' => $data['status']])->update();
        return json(msg(200, $res, '更新状态成功'));
    }
    /*
     * 修改花名册信息
     */
    public function PostRosterByUpdate()
    {
        $data = input('param.');
        $res = Roster::where('id', $data['id'])->data($data)->update();
        return json(msg(200, $res, '更新成功'));
    }

    /*
     * 删除花名册信息
     */
    public function GetRosterByDelete()
    {
        $data = input('param.');
        $res = Roster::where('id', $data['id'])->delete();
        return json(msg(200, $res, '删除成功'));
    }
    /** 务工人员工资发放表(表)*/

    /*
 * 获取提交花名册信息表
 */
    public function GetWagesByList()
    {
        $data = input('param.');
        $res = Wages::GetByList($data);
        return json(msg(200, $res, '获取成功'));
    }

    /*
     * 提交务工人员工资发放表
     */
    public function PostWagesByData()
    {
        $data = input('param.');
        $res = Wages::PostDataByinsert($data);
        return json(msg(200, $res, '提交成功'));
    }
    /*
     * 批量提交务工人员工资发放表
     */
    public function PostWagesByAll()
    {
        $data = input('param.');
        $ret=[];
        foreach ($data['data'] as $v=>$item){
            $ret[$v]['project']=$data['project'];
            $ret[$v]['admin_id']=$data['admin_id'];
            $ret[$v]['name']=$item['序号'];
            $ret[$v]['number']=$item['用户名'];

            $ret[$v]['sex']=$item['性别'];
            $ret[$v]['cardid']=$item['身份证号码'];
            $ret[$v]['account']=$item['户口所在地'];
            $ret[$v]['enter_time']=$item['进场时间'];
            $ret[$v]['retreat_time']=$item['退场时间'];
            $ret[$v]['setcolumn']=$item['合同编号'];
            $ret[$v]['payrate']=$item['工资标准'];
            $ret[$v]['cardno']=$item['银行卡号'];
            $ret[$v]['mobile']=$item['手机号码'];
            $ret[$v]['note']=$item['备注'];
        }
        Wages::PostDataByAll($ret);
        return json(msg(200, $ret, '追加成功'));
    }

    /*
     * 获取务工人员工资发放表
     */
    public function GetWagesByFind()
    {
        $data = input('param.');
        $res = Wages::where('id', $data['id'])->find();
        return json(msg(200, $res, '获取成功'));
    }

    /*
      * 修改务工人员工资发放表状态
      */
    public function GetWagesByStatus()
    {
        $data = input('param.');
        $res = Wages::where('id', $data['id'])->data(['status' => $data['status']])->update();
        return json(msg(200, $res, '更新状态成功'));
    }
    /*
     * 修改务工人员工资发放表信息
     */
    public function PostWagesByUpdate()
    {
        $data = input('param.');
        $res = Wages::where('id', $data['id'])->data($data)->update();
        return json(msg(200, $res, '更新成功'));
    }

    /*
     * 删除务工人员工资发放表信息
     */
    public function GetWagesByDelete()
    {
        $data = input('param.');
        $res = Wages::where('id', $data['id'])->delete();
        return json(msg(200, $res, '删除成功'));
    }
}