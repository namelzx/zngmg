<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/12/4
 * Time: 10:34 AM
 */

namespace app\api\model;


class Images extends BaseModel
{

    public static function PostDataByinsert($data)
    {
        $res = self::insert($data);
        return $res;
    }
    public static function PostDataByAll($data)
    {
        $res = self::insertAll($data);
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