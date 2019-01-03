<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/12/1
 * Time: 11:49 AM
 */

namespace app\api\model;

class Admin extends BaseModel
{
    public static function GetByList($data)
    {
        $res = self::paginate($data['limit'], false, ['query' => $data['page']]);
        return $res;
    }

    public static function PostByData($data)
    {
        $res = self::insert($data);
        return $res;
    }
}