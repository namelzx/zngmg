<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/12/3
 * Time: 3:10 PM
 */

namespace app\api\model;


class Chargeinfo extends BaseModel
{
    public static function PostDataByAll($data)
    {
        $res = self::insert($data);
        return $res;
    }

    /**
     * 参加
     */

    public static function GetByList($data)
    {
        if ($data['roles'][0] == 'admin') {
            $res = self::where('status', 1);
            $res = $res->where('project', $data['project']);
        } else {
            $res = self::where('project', $data['project']);
        }
        $res = $res->paginate($data['limit'], false, ['query' => $data['page']]);
        return $res;
    }
}