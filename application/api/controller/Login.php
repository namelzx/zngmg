<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/12/1
 * Time: 11:47 AM
 */

namespace app\api\controller;


use app\api\model\Admin;


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId, Access-Token, X-Token");

class Login extends Base
{
    public function login()
    {
        $data = input('param.');
        if (!empty($data)) {
            $userModel = new Admin();
            $hasUser = $userModel->where(['username' => $data['username']])->find();
            if (empty($hasUser)) {
                return json(logomsg(204, '', '', '管理员不存在'));
            }
            if ($data['password'] != $hasUser['password']) {
                return json(logomsg(204, '账号密码错误', '账号密码错误', $data['password']));
            }
            return json(logomsg(200, $hasUser['roles'], url('index/index'), '登录成功'));
        } else {
            return json(logomsg(500, '', '', '登录失败'));
        }
    }
    /*
   * 退出登陆
   */
    public function logout()
    {
        return json('success');
    }


}