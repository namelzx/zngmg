<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');


Route::group('api/admin/', function () {
    Route::post('/dyword', 'api/admin/dyword');
    /*
     * 登陆模块
     */
    Route::post('/login', 'api/login/login');
    Route::post('/GetProjectByList', 'api/admin/GetProjectByList');//获取所有的项目
    /*
     * 账户管理模块
     */
    Route::get('/admin', 'api/admin/GetAdminByList'); /* 获取账户列表*/
    Route::get('/user', 'api/admin/GetUserByFind'); /* 获取用户信息*/
    Route::post('/logout', 'api/login/logout'); /* 退出登陆*/
    Route::post('/admin/DataStatus', 'api/admin/DataStatus'); /* 修改用户状态*/
    Route::get('/admind/DataDelete', 'api/admin/DataDelete'); /*  删除用户*/
    Route::post('/admin/PostDataadd', 'api/admin/PostDataadd'); /* 添加数据*/
    Route::post('/admin/PostDataedit', 'api/admin/PostDataEdit'); /*  修改用户信息*/
    /*
     * 实名制模块
     */
    Route::post('/realname/general/PostDataadd', 'api/realname/General'); /* 添加数据*/
    Route::get('/realname/general/GetGeneralByData', 'api/realname/GetGeneralByData'); /* 获取数据列表*/
    Route::post('/realname/general/GetGeneralByStatus', 'api/realname/GetGeneralByStatus'); /* 修改状态状态*/
    Route::post('/realname/general/PostGeneralByUpdate', 'api/realname/PostGeneralByUpdate'); /* 修改状态状态*/
    Route::post('/realname/Chargeinfo/GetGeneralByDelete', 'api/realname/GetGeneralByDelete'); /* 删除数据*/

    /*
     * 获取劳资专管员
     */

    Route::get('/realname/Chargeinfo/GetChargeinfoByList', 'api/realname/GetChargeinfoByList'); /* 获取数据列表*/
    Route::post('/realname/Chargeinfo/PostDataadd', 'api/realname/PostChargeinfoByData'); /* 添加数据*/
    Route::post('/realname/Chargeinfo/GetGeneralByStatus', 'api/realname/GetChargeinfoByStatus'); /* 修改状态状态*/
    Route::get('/realname/Chargeinfo/GetChargeinfoByFind', 'api/realname/GetChargeinfoByFind'); /* 获取单条数据*/
    Route::post('/realname/Chargeinfo/PostChargeinfoByUpdate', 'api/realname/PostChargeinfoByUpdate'); /* 添加数据*/
    Route::post('/realname/Chargeinfo/GetGeneralByDelete', 'api/realname/GetChargeinfoByDelete'); /* 删除数据*/
    /*
     *
     */

    /*
    *附件4:劳资专管员工资发放情况材料(表)
    */

    Route::get('/realname/charge/GetChargeByList', 'api/realname/GetChargeByList'); /* 获取数据列表*/
    Route::post('/realname/charge/PostChargeByData', 'api/realname/PostChargeByData'); /* 添加数据*/
    Route::post('/realname/charge/GetChargeByStatus', 'api/realname/GetChargeByStatus'); /* 修改状态状态*/
    Route::get('/realname/charge/GetChargeByFind', 'api/realname/GetChargeByFind'); /* 获取单条数据*/
    Route::post('/realname/charge/PostChargeByUpdate', 'api/realname/PostChargeByUpdate'); /* 修改信息数据*/
    Route::post('/realname/charge/GetChargeByDelete', 'api/realname/GetChargeByDelete'); /* 删除数据*/


    /*
     *花名册
     */
    Route::get('/realname/roster/GetRosterByList', 'api/realname/GetRosterByList'); /* 获取数据列表*/
    Route::post('/realname/roster/PostRosterByData', 'api/realname/PostRosterByData'); /* 添加数据*/
    Route::post('/realname/roster/PostRosterByAll', 'api/realname/PostRosterByAll'); /* 添加批量数据*/
    Route::post('/realname/roster/GetRosterByStatus', 'api/realname/GetRosterByStatus'); /* 修改状态状态*/
    Route::get('/realname/roster/GetRosterByFind', 'api/realname/GetRosterByFind'); /* 获取单条数据*/
    Route::post('/realname/roster/PostRosterByUpdate', 'api/realname/PostRosterByUpdate'); /* 修改信息数据*/
    Route::post('/realname/roster/GetRosterByDelete', 'api/realname/GetRosterByDelete'); /* 删除数据*/

    /**
     * 务工人员工资发放表
     */
    Route::get('/realname/Wages/GetWagesByList', 'api/realname/GetWagesByList'); /* 获取数据列表*/
    Route::post('/realname/Wages/PostWagesByData', 'api/realname/PostWagesByData'); /* 添加数据*/
    Route::post('/realname/Wages/PostWagesByAll', 'api/realname/PostWagesByAll'); /* 添加批量数据*/
    Route::post('/realname/Wages/GetWagesByStatus', 'api/realname/GetWagesByStatus'); /* 修改状态状态*/
    Route::get('/realname/Wages/GetWagesByFind', 'api/realname/GetWagesByFind'); /* 获取单条数据*/
    Route::post('/realname/Wages/PostWagesByUpdate', 'api/realname/PostWagesByUpdate'); /* 修改信息数据*/
    Route::post('/realname/Wages/GetWagesByDelete', 'api/realname/GetWagesByDelete'); /* 删除数据*/

    /*
     * 图片上传
     *
     */
    Route::post('/realname/Images/PostImagesByData', 'api/Images/PostImagesByData'); /* 添加数据*/
    Route::post('/realname/Images/GetImagesByFind', 'api/Images/GetImagesByFind'); /* 获取数据*/
    Route::post('/realname/Images/GetImagesByStatus', 'api/Images/GetImagesByStatus'); /* 更新状态*/

    /**保障金制度*/
    /*
     * 农民工工资保障金
     */
    Route::get('/security/eposit/GetEpositByList', 'api/security/GetEpositByData'); /* 获取数据列表*/
    Route::post('/security/eposit/PostEpositDataadd', 'api/security/PostEpositDataadd'); /* 添加数据*/
    Route::post('/security/eposit/GetEpositByStatus', 'api/security/GetEpositByStatus'); /* 修改状态状态*/
    Route::get('/security/eposit/GetEpositByFind', 'api/security/GetEpositByFind'); /* 获取单条数据*/
    Route::post('/security/eposit/PostEpositByUpdate', 'api/security/PosEpositByUpdate'); /* 修改数据*/
    Route::post('/security/eposit/GetEpositByDelete', 'api/security/GetEpositByDelete'); /* 删除数据*/
});
return [

];
