<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/12/2
 * Time: 11:16 PM
 */

namespace app\api\model;


class General extends BaseModel
{
    public static function PostDataByAll($data)
    {
        $res = self::insert($data);
        return $res;
    }

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