<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/12/1
 * Time: 12:11 PM
 */

namespace app\api\controller;
header("Content-Type: text/html;charset=utf-8");


use app\index\controller\Word;
use think\Controller;


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId, Access-Token, X-Token");

class Base extends Controller
{
    public function GetProjectByList()
    {
        $res = db('admin')->field('project')->
            group('project')->
        where('roles','neq','admin')->select();
        return json(msg(200, $res, '获取项目列表成功'));
    }
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move('./uploads','');
        if($info){
            // 成功上传后 获取上传信息
            // 输出 jpg
            $fileName = 'uploads/' . $info->getSaveName();
            return json(msg(200, $fileName, '1',$info->getFilename()));
        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }
//    public function word(){
//        $html='<div data-v-d34ed9d6="" class="title"><h2 data-v-d34ed9d6="">农民工劳动合同书（范本）</h2></div> <div data-v-d34ed9d6="" class="content"><div data-v-d34ed9d6="" class="contractMsg"><div data-v-d34ed9d6="" class="clear"><p data-v-d34ed9d6="" class="left firstParty"><span data-v-d34ed9d6="">甲方：</span> <span data-v-d34ed9d6="" class="boderLine">祥子</span></p> <p data-v-d34ed9d6="" class="right qualifications"><span data-v-d34ed9d6="">资质等级：</span> <span data-v-d34ed9d6="" class="boderLine">三等级</span></p></div> <div data-v-d34ed9d6="" class="addressBox"><p data-v-d34ed9d6=""><span data-v-d34ed9d6="">地址：</span> <span data-v-d34ed9d6="" class="boderLine">热的地方</span></p></div> <div data-v-d34ed9d6="" class="clear sameclear"><p data-v-d34ed9d6="" class="left"><span data-v-d34ed9d6="">法定代表人：</span> <span data-v-d34ed9d6="" class="boderLine">啦啦啦啦啦</span></p> <p data-v-d34ed9d6="" class="right"><span data-v-d34ed9d6="">联系电话：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p></div> <div data-v-d34ed9d6="" class="clear sameclear"><p data-v-d34ed9d6="" class="left"><span data-v-d34ed9d6="">项目负责人：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p> <p data-v-d34ed9d6="" class="right"><span data-v-d34ed9d6="">联系电话：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p></div> <div data-v-d34ed9d6="" class="clear partyB"><p data-v-d34ed9d6="" class="left   "><span data-v-d34ed9d6="">乙方：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p> <p data-v-d34ed9d6="" class="left "><span data-v-d34ed9d6="">身份证号码：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p> <p data-v-d34ed9d6="" class="right "><span data-v-d34ed9d6="">联系电话：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p></div> <div data-v-d34ed9d6="" class="clear"><p data-v-d34ed9d6="" class="left firstParty"><span data-v-d34ed9d6="">家庭住址：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p> <p data-v-d34ed9d6="" class="right qualifications"><span data-v-d34ed9d6="">家庭电话：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p></div></div> <div data-v-d34ed9d6="" class="agreementMsg"><div data-v-d34ed9d6="" class="agreementTitle"><p data-v-d34ed9d6="">根据《中华人民共和国劳动法》、《中华人民共和国劳动合同法》、《劳动合同法实施条例》等有关法律法规规定，经甲、乙双方平等协商一致，自愿订立本劳动合同，共同遵守本合同所列条款。</p></div> <div data-v-d34ed9d6="" class="agrecontent"><div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">一、劳动合同期限</h2> <p data-v-d34ed9d6="" class="samep">（一）本合同是以完成一定工作任务为期限的劳动合同。甲、乙双方约定以完成 <span data-v-d34ed9d6=""></span>工程项目      等工作任务的完成为本合同期限。合同时间自20   年   月   日起至完成该工程任务止，具体时间以《工程施工任务单》为准。</p> <p data-v-d34ed9d6="" class="samep">（二）乙方完成本条第一款工作任务后，经甲、乙双方协商一致同意后乙方转入甲方其他工程项目，本合同即终止。转入其它项目需重新签订劳动合同。具体时间以新签订劳动合同及《工程施工任务单》为准。如施工过程中需跨项目工程临时抢工调动，时间在两月内，可按上一项目签订的劳动合同履行。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">二、工作地点和工作内容</h2> <p data-v-d34ed9d6="">（一）乙方同意甲方安排的工作地点在广西壮族自治区  市 县(市、城区)及甲方承建的建设工程区域范围内，乙方同意按照本合同第一条第二款约定进行调整。</p> <p data-v-d34ed9d6="">（二）乙方同意根据甲方工作需要，担任         岗位（工种）工作。</p> <p data-v-d34ed9d6="">（三）乙方应当按照甲方《工程施工任务单》要求及所规定的标准，按时保质保量地完成工作任务。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">三、工作时间和休息休假</h2> <p data-v-d34ed9d6="">（一）甲方根据工程建设领域施工的特点且经乙方同意，甲、乙双方按照《关于企业实行不定时工作制和综合计算工时工作制的审批办法》（劳部发〔1994〕503号）有关规定，乙方的工作时间执行综合计算工时工作制。</p> <p data-v-d34ed9d6="">（二）甲、乙双方均同意采取集中工作、集中休息、轮休调换等休息休假方式，旨在确保乙方的身体健康和生产工作任务的完成。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">四、劳动报酬</h2> <p data-v-d34ed9d6="">（一）甲方根据《工资支付暂行规定》（劳部发〔1994〕489号）第八条“对完成一次性临时劳动或某项工作的劳动者，用人单位应按有关协议或合同规定在其完成劳动任务后即支付工资。”的规定，甲方经与乙方协商并经乙方同意后，每月   日前支付上月工资。乙方的工资按照以下标准发放：试用期间的工资为      ，试用期结束后，工资为（请在①～⑥选择计算方式）：①     元/月；②   元/天；③   元/m2；④   元/m3；⑤计件   元/个；⑥计时   元/小时。方式发放，其工资构成为基本工资+剩余计件计量工资，即按月支付乙方基本工资       元(不能低于当地最低工资标准)。工作任务在3个月以内的，剩余计件计量工资在乙方完成所做的本工程施工任务后一次性全额给付；工作任务在3个月以上的，剩余计件计量工资以每3个月完成的工作任务为结算节点，结算后一次性支付，直至乙方完成所做的本工程施工任务后一次性全额给付；施工工期跨年度的于次年春节前10日一次性支付应得劳动报酬未发放部分。</p> <p data-v-d34ed9d6="">（二）乙方须按照甲方要求进行实名制登记，并严格遵循实名制考勤制度进出工地，考勤数据将作为工资发放的基础数据依据。</p> <p data-v-d34ed9d6="">（三）工资个税说明</p> <p data-v-d34ed9d6="">上述工资标准已包含个人所得税部分，由       负责缴税；</p> <p data-v-d34ed9d6="">上述工资标准尚未包含个人所得税，由         负责缴税。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">五、社会保险</h2> <p data-v-d34ed9d6="">（一）甲方按照《中华人民共和国社会保险法》等国家和地方有关政策规定为乙方办理社会保险，缴纳社会保险费，乙方依法应缴部分由甲方负责代扣代缴。</p> <p data-v-d34ed9d6="">1.根据劳动者请事假，用人单位可以不支付工资的规定。因乙方请事假期间，未履行劳动义务，甲、乙双方约定请事假期间社会保险费(包括单位缴纳部分)全部由乙方承担。</p> <p data-v-d34ed9d6="">2.甲方按照《自治区人力资源和社会保障厅住房和城乡建设厅关于做好建筑施工企业农民工参加工伤保险有关工作的通知》(桂人社发〔2010〕70号)等有关政策规定为乙方办理工伤保险。</p> <p data-v-d34ed9d6="">（二）在施工过程中乙方若发生工伤事故，甲方积极予以救治。因工负伤的医疗及相关待遇按国家及当地有关规定执行。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">六、劳动保护、劳动条件和职业危害保护</h2> <p data-v-d34ed9d6="">（一）甲方根据生产岗位的需要，按照国家有关劳动安全、卫生的规定为乙方配备必要的安全防护设施，发放必须的劳动保护用品。</p> <p data-v-d34ed9d6="">（二）甲方根据国家有关法律、法规，建立安全生产管理制度；乙方应主动接受甲方上岗前安全教育培训，考试不合格者不得上岗，严格遵守甲方的劳动安全卫生制度，严禁违章作业，确保安全生产。</p> <p data-v-d34ed9d6="">（三）甲方对可能产生职业危害的岗位，应当如实告知乙方，并对乙方进行劳动安全卫生教育和岗前体检，乙方应主动参加教育和体检，防止劳动过程中的事故，减少职业危害。</p> <p data-v-d34ed9d6="">（四）甲方为乙方提供集体食宿，乙方必须遵守甲方住宿管理规定，因个人原因离开必须办理书面请销假手续，若擅自离开居住地发生的交通及其他事故，责任及损失均由乙方自行承担。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">七、劳动合同的变更、解除和终止</h2> <p data-v-d34ed9d6="">（一）乙方在完成工作任务过程中，应严格遵守国家的法律法规和甲方的各项管理规章制度、遵守劳动纪律及各项操作规程及职业道德，否则甲方有权按照有关规定解除与乙方的劳动合同。</p> <p data-v-d34ed9d6="">（二）乙方有下列情形之一的，甲方可以解除本合同：</p> <p data-v-d34ed9d6="">1.有打架斗殴、偷窃、赌博等严重违反用人单位规章制度的、有违法、违纪行为的；</p> <p data-v-d34ed9d6="">2.严重失职，营私舞弊，对甲方造成重大损害的；</p> <p data-v-d34ed9d6="">3.严重违反甲方施工现场安全管理规定和甲方劳动纪律等规章制度的；</p> <p data-v-d34ed9d6="">4.身体不能适应施工生产工作要求，或经调岗后，仍不能适应、胜任生产工作要求的；</p> <p data-v-d34ed9d6="">5.被依法追究刑事责任的。</p> <p data-v-d34ed9d6="">（三）变更、解除、终止本合同，应在规定的时限前以书面形式通知对方，不得擅自变更、解除、终止本合同。</p> <p data-v-d34ed9d6="">（四）解除或终止劳务合同，双方办理有关手续及工作交接。若乙方不办理请假手续离开工作岗位，无故旷工15天以上者将视为乙方自动解除劳动合同。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">八、违约责任</h2> <p data-v-d34ed9d6="">（一）乙方承诺保守在完成工作任务过程知悉的甲方的商业机密，因乙方的原因，造成有关商业机密泄露的，乙方应对甲方承担赔偿责任。</p> <p data-v-d34ed9d6="">（二）乙方应保证其身体健康状况能适应工作岗位的要求，提供的学历证书或工作技能证书、健康体检报告内容真实、有效。乙方提供虚假的健康证明、学历证书或工作技能证书的，甲方可以依法解除合同，造成甲方经济损失的，乙方应给予赔偿。</p> <p data-v-d34ed9d6="">（三）因乙方违反甲方规章制度、严重失职、营私舞弊造成甲方经济损失，乙方将承担责任及损失。</p> <p data-v-d34ed9d6="">（四）因甲方原因造成乙方停工、误工或工程任务无法满足乙方的，甲方承担乙方相应的损失补偿。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">九、劳务争议处理及其他</h2> <p data-v-d34ed9d6="">（一）双方因履行本合同发生争议，可以向甲方劳动争议调解委员会申请调解；调解不成的，可以向公司住所地或劳动用工地劳动仲裁委员会申请仲裁；</p> <p data-v-d34ed9d6="">（二）乙方离开工作岗位须书面履行请假手续。</p> <p data-v-d34ed9d6="">乙方未事先提交书面请假手续而离岗超过十五天的，则视为乙方提出解除劳动合同；乙方应在离岗后二十日内到甲方公司驻地领取解除合同通知书，逾期视为已送达乙方。</p> <p data-v-d34ed9d6="">（三）乙方所提供的姓名、实际住址、住宅电话、身份证等个人信息必须真实有效，劳动合同期内，乙方户籍所在地址、现居住地址、联系方式等发生变化，应当及时告知甲方，以便于联络。由于本人所填信息不准确或发生变更未书面告知甲方而造成甲方工作障碍的，由乙方承担相应的责任。</p> <p data-v-d34ed9d6="">（四）本合同未尽事宜或与国家及施工所在地有关规定相悖的，按有关规定执行。</p> <p data-v-d34ed9d6="">（五）甲乙双方在劳务合同文本上签字或盖章后生效，本合同一式两份，甲乙双方各执一份。</p></div></div></div> <div data-v-d34ed9d6="" class="bottomSignature clear"><div data-v-d34ed9d6="" class="left"><p data-v-d34ed9d6="">甲方（盖章）：</p> <p data-v-d34ed9d6="">20  年  月  日   </p></div> <div data-v-d34ed9d6="" class="right"><p data-v-d34ed9d6="">乙方（签名）：</p> <p data-v-d34ed9d6=""> 20  年  月  日</p></div></div></div>';
//        $word = new Word();
//        $word->start();
//        $wordname = "./uploads/ka.doc";
//        echo $html;
//        $word->save($wordname);
//        ob_flush();
//        flush();
//    }
//    public function dyword(){
//        $html='<div data-v-d34ed9d6="" class="title"><h2 data-v-d34ed9d6="">农民工劳动合同书（范本）</h2></div> <div data-v-d34ed9d6="" class="content"><div data-v-d34ed9d6="" class="contractMsg"><div data-v-d34ed9d6="" class="clear"><p data-v-d34ed9d6="" class="left firstParty"><span data-v-d34ed9d6="">甲方：</span> <span data-v-d34ed9d6="" class="boderLine">祥子</span></p> <p data-v-d34ed9d6="" class="right qualifications"><span data-v-d34ed9d6="">资质等级：</span> <span data-v-d34ed9d6="" class="boderLine">三等级</span></p></div> <div data-v-d34ed9d6="" class="addressBox"><p data-v-d34ed9d6=""><span data-v-d34ed9d6="">地址：</span> <span data-v-d34ed9d6="" class="boderLine">热的地方</span></p></div> <div data-v-d34ed9d6="" class="clear sameclear"><p data-v-d34ed9d6="" class="left"><span data-v-d34ed9d6="">法定代表人：</span> <span data-v-d34ed9d6="" class="boderLine">啦啦啦啦啦</span></p> <p data-v-d34ed9d6="" class="right"><span data-v-d34ed9d6="">联系电话：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p></div> <div data-v-d34ed9d6="" class="clear sameclear"><p data-v-d34ed9d6="" class="left"><span data-v-d34ed9d6="">项目负责人：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p> <p data-v-d34ed9d6="" class="right"><span data-v-d34ed9d6="">联系电话：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p></div> <div data-v-d34ed9d6="" class="clear partyB"><p data-v-d34ed9d6="" class="left   "><span data-v-d34ed9d6="">乙方：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p> <p data-v-d34ed9d6="" class="left "><span data-v-d34ed9d6="">身份证号码：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p> <p data-v-d34ed9d6="" class="right "><span data-v-d34ed9d6="">联系电话：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p></div> <div data-v-d34ed9d6="" class="clear"><p data-v-d34ed9d6="" class="left firstParty"><span data-v-d34ed9d6="">家庭住址：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p> <p data-v-d34ed9d6="" class="right qualifications"><span data-v-d34ed9d6="">家庭电话：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p></div></div> <div data-v-d34ed9d6="" class="agreementMsg"><div data-v-d34ed9d6="" class="agreementTitle"><p data-v-d34ed9d6="">根据《中华人民共和国劳动法》、《中华人民共和国劳动合同法》、《劳动合同法实施条例》等有关法律法规规定，经甲、乙双方平等协商一致，自愿订立本劳动合同，共同遵守本合同所列条款。</p></div> <div data-v-d34ed9d6="" class="agrecontent"><div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">一、劳动合同期限</h2> <p data-v-d34ed9d6="" class="samep">（一）本合同是以完成一定工作任务为期限的劳动合同。甲、乙双方约定以完成 <span data-v-d34ed9d6=""></span>工程项目      等工作任务的完成为本合同期限。合同时间自20   年   月   日起至完成该工程任务止，具体时间以《工程施工任务单》为准。</p> <p data-v-d34ed9d6="" class="samep">（二）乙方完成本条第一款工作任务后，经甲、乙双方协商一致同意后乙方转入甲方其他工程项目，本合同即终止。转入其它项目需重新签订劳动合同。具体时间以新签订劳动合同及《工程施工任务单》为准。如施工过程中需跨项目工程临时抢工调动，时间在两月内，可按上一项目签订的劳动合同履行。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">二、工作地点和工作内容</h2> <p data-v-d34ed9d6="">（一）乙方同意甲方安排的工作地点在广西壮族自治区  市 县(市、城区)及甲方承建的建设工程区域范围内，乙方同意按照本合同第一条第二款约定进行调整。</p> <p data-v-d34ed9d6="">（二）乙方同意根据甲方工作需要，担任         岗位（工种）工作。</p> <p data-v-d34ed9d6="">（三）乙方应当按照甲方《工程施工任务单》要求及所规定的标准，按时保质保量地完成工作任务。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">三、工作时间和休息休假</h2> <p data-v-d34ed9d6="">（一）甲方根据工程建设领域施工的特点且经乙方同意，甲、乙双方按照《关于企业实行不定时工作制和综合计算工时工作制的审批办法》（劳部发〔1994〕503号）有关规定，乙方的工作时间执行综合计算工时工作制。</p> <p data-v-d34ed9d6="">（二）甲、乙双方均同意采取集中工作、集中休息、轮休调换等休息休假方式，旨在确保乙方的身体健康和生产工作任务的完成。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">四、劳动报酬</h2> <p data-v-d34ed9d6="">（一）甲方根据《工资支付暂行规定》（劳部发〔1994〕489号）第八条“对完成一次性临时劳动或某项工作的劳动者，用人单位应按有关协议或合同规定在其完成劳动任务后即支付工资。”的规定，甲方经与乙方协商并经乙方同意后，每月   日前支付上月工资。乙方的工资按照以下标准发放：试用期间的工资为      ，试用期结束后，工资为（请在①～⑥选择计算方式）：①     元/月；②   元/天；③   元/m2；④   元/m3；⑤计件   元/个；⑥计时   元/小时。方式发放，其工资构成为基本工资+剩余计件计量工资，即按月支付乙方基本工资       元(不能低于当地最低工资标准)。工作任务在3个月以内的，剩余计件计量工资在乙方完成所做的本工程施工任务后一次性全额给付；工作任务在3个月以上的，剩余计件计量工资以每3个月完成的工作任务为结算节点，结算后一次性支付，直至乙方完成所做的本工程施工任务后一次性全额给付；施工工期跨年度的于次年春节前10日一次性支付应得劳动报酬未发放部分。</p> <p data-v-d34ed9d6="">（二）乙方须按照甲方要求进行实名制登记，并严格遵循实名制考勤制度进出工地，考勤数据将作为工资发放的基础数据依据。</p> <p data-v-d34ed9d6="">（三）工资个税说明</p> <p data-v-d34ed9d6="">上述工资标准已包含个人所得税部分，由       负责缴税；</p> <p data-v-d34ed9d6="">上述工资标准尚未包含个人所得税，由         负责缴税。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">五、社会保险</h2> <p data-v-d34ed9d6="">（一）甲方按照《中华人民共和国社会保险法》等国家和地方有关政策规定为乙方办理社会保险，缴纳社会保险费，乙方依法应缴部分由甲方负责代扣代缴。</p> <p data-v-d34ed9d6="">1.根据劳动者请事假，用人单位可以不支付工资的规定。因乙方请事假期间，未履行劳动义务，甲、乙双方约定请事假期间社会保险费(包括单位缴纳部分)全部由乙方承担。</p> <p data-v-d34ed9d6="">2.甲方按照《自治区人力资源和社会保障厅住房和城乡建设厅关于做好建筑施工企业农民工参加工伤保险有关工作的通知》(桂人社发〔2010〕70号)等有关政策规定为乙方办理工伤保险。</p> <p data-v-d34ed9d6="">（二）在施工过程中乙方若发生工伤事故，甲方积极予以救治。因工负伤的医疗及相关待遇按国家及当地有关规定执行。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">六、劳动保护、劳动条件和职业危害保护</h2> <p data-v-d34ed9d6="">（一）甲方根据生产岗位的需要，按照国家有关劳动安全、卫生的规定为乙方配备必要的安全防护设施，发放必须的劳动保护用品。</p> <p data-v-d34ed9d6="">（二）甲方根据国家有关法律、法规，建立安全生产管理制度；乙方应主动接受甲方上岗前安全教育培训，考试不合格者不得上岗，严格遵守甲方的劳动安全卫生制度，严禁违章作业，确保安全生产。</p> <p data-v-d34ed9d6="">（三）甲方对可能产生职业危害的岗位，应当如实告知乙方，并对乙方进行劳动安全卫生教育和岗前体检，乙方应主动参加教育和体检，防止劳动过程中的事故，减少职业危害。</p> <p data-v-d34ed9d6="">（四）甲方为乙方提供集体食宿，乙方必须遵守甲方住宿管理规定，因个人原因离开必须办理书面请销假手续，若擅自离开居住地发生的交通及其他事故，责任及损失均由乙方自行承担。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">七、劳动合同的变更、解除和终止</h2> <p data-v-d34ed9d6="">（一）乙方在完成工作任务过程中，应严格遵守国家的法律法规和甲方的各项管理规章制度、遵守劳动纪律及各项操作规程及职业道德，否则甲方有权按照有关规定解除与乙方的劳动合同。</p> <p data-v-d34ed9d6="">（二）乙方有下列情形之一的，甲方可以解除本合同：</p> <p data-v-d34ed9d6="">1.有打架斗殴、偷窃、赌博等严重违反用人单位规章制度的、有违法、违纪行为的；</p> <p data-v-d34ed9d6="">2.严重失职，营私舞弊，对甲方造成重大损害的；</p> <p data-v-d34ed9d6="">3.严重违反甲方施工现场安全管理规定和甲方劳动纪律等规章制度的；</p> <p data-v-d34ed9d6="">4.身体不能适应施工生产工作要求，或经调岗后，仍不能适应、胜任生产工作要求的；</p> <p data-v-d34ed9d6="">5.被依法追究刑事责任的。</p> <p data-v-d34ed9d6="">（三）变更、解除、终止本合同，应在规定的时限前以书面形式通知对方，不得擅自变更、解除、终止本合同。</p> <p data-v-d34ed9d6="">（四）解除或终止劳务合同，双方办理有关手续及工作交接。若乙方不办理请假手续离开工作岗位，无故旷工15天以上者将视为乙方自动解除劳动合同。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">八、违约责任</h2> <p data-v-d34ed9d6="">（一）乙方承诺保守在完成工作任务过程知悉的甲方的商业机密，因乙方的原因，造成有关商业机密泄露的，乙方应对甲方承担赔偿责任。</p> <p data-v-d34ed9d6="">（二）乙方应保证其身体健康状况能适应工作岗位的要求，提供的学历证书或工作技能证书、健康体检报告内容真实、有效。乙方提供虚假的健康证明、学历证书或工作技能证书的，甲方可以依法解除合同，造成甲方经济损失的，乙方应给予赔偿。</p> <p data-v-d34ed9d6="">（三）因乙方违反甲方规章制度、严重失职、营私舞弊造成甲方经济损失，乙方将承担责任及损失。</p> <p data-v-d34ed9d6="">（四）因甲方原因造成乙方停工、误工或工程任务无法满足乙方的，甲方承担乙方相应的损失补偿。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">九、劳务争议处理及其他</h2> <p data-v-d34ed9d6="">（一）双方因履行本合同发生争议，可以向甲方劳动争议调解委员会申请调解；调解不成的，可以向公司住所地或劳动用工地劳动仲裁委员会申请仲裁；</p> <p data-v-d34ed9d6="">（二）乙方离开工作岗位须书面履行请假手续。</p> <p data-v-d34ed9d6="">乙方未事先提交书面请假手续而离岗超过十五天的，则视为乙方提出解除劳动合同；乙方应在离岗后二十日内到甲方公司驻地领取解除合同通知书，逾期视为已送达乙方。</p> <p data-v-d34ed9d6="">（三）乙方所提供的姓名、实际住址、住宅电话、身份证等个人信息必须真实有效，劳动合同期内，乙方户籍所在地址、现居住地址、联系方式等发生变化，应当及时告知甲方，以便于联络。由于本人所填信息不准确或发生变更未书面告知甲方而造成甲方工作障碍的，由乙方承担相应的责任。</p> <p data-v-d34ed9d6="">（四）本合同未尽事宜或与国家及施工所在地有关规定相悖的，按有关规定执行。</p> <p data-v-d34ed9d6="">（五）甲乙双方在劳务合同文本上签字或盖章后生效，本合同一式两份，甲乙双方各执一份。</p></div></div></div> <div data-v-d34ed9d6="" class="bottomSignature clear"><div data-v-d34ed9d6="" class="left"><p data-v-d34ed9d6="">甲方（盖章）：</p> <p data-v-d34ed9d6="">20  年  月  日   </p></div> <div data-v-d34ed9d6="" class="right"><p data-v-d34ed9d6="">乙方（签名）：</p> <p data-v-d34ed9d6=""> 20  年  月  日</p></div></div></div>';
//        $word = new Word();
//        $word->start();
//        $wordname = "文件名.doc";
//        $wordname = iconv('UTF-8', 'GBK', $wordname);//防止乱码
//        $html = iconv('UTF-8', 'GBK', $html); //防止乱码
//        echo $html;
//        $file_path = './uploads/' . '文件名';
//
//        $word->save('./uploads/' . $wordname); //可以自定义保存路径
//        chmod($file_path, 7777);
//        ob_flush();//每次执行前刷新缓存
//        flush();
//    }

    function start(){
        ob_start();
        echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns="http://www.w3.org/TR/REC-html40">';
    }
    function save($path)
    {
        echo "</html>";
        $data = ob_get_contents();
    }
    function wirtefile($fn,$data){
        $fp=fopen($fn,$data);
        fwrite($fp,$data);
    }
    public function dyword(){

        $data=input('param.');
        $d=123;
        $html='<div data-v-d34ed9d6="" class="title">
        <h2 data-v-d34ed9d6="">农民工劳动合同书（范本）</h2>
        </div> 
        <div data-v-d34ed9d6="" class="content">
        <div data-v-d34ed9d6="" class="contractMsg"><div data-v-d34ed9d6="" class="clear"><p data-v-d34ed9d6="" class="left firstParty"><span data-v-d34ed9d6="">甲方：</span> <span data-v-d34ed9d6="" class="boderLine">'.$d.'</span></p> <p data-v-d34ed9d6="" class="right qualifications"><span data-v-d34ed9d6="">资质等级：</span> <span data-v-d34ed9d6="" class="boderLine">三等级</span></p></div> <div data-v-d34ed9d6="" class="addressBox"><p data-v-d34ed9d6=""><span data-v-d34ed9d6="">地址：</span> <span data-v-d34ed9d6="" class="boderLine">热的地方</span></p></div> <div data-v-d34ed9d6="" class="clear sameclear"><p data-v-d34ed9d6="" class="left"><span data-v-d34ed9d6="">法定代表人：</span> <span data-v-d34ed9d6="" class="boderLine">啦啦啦啦啦</span></p> <p data-v-d34ed9d6="" class="right"><span data-v-d34ed9d6="">联系电话：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p></div> <div data-v-d34ed9d6="" class="clear sameclear"><p data-v-d34ed9d6="" class="left"><span data-v-d34ed9d6="">项目负责人：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p> <p data-v-d34ed9d6="" class="right"><span data-v-d34ed9d6="">联系电话：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p></div> <div data-v-d34ed9d6="" class="clear partyB"><p data-v-d34ed9d6="" class="left   "><span data-v-d34ed9d6="">乙方：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p> <p data-v-d34ed9d6="" class="left "><span data-v-d34ed9d6="">身份证号码：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p> <p data-v-d34ed9d6="" class="right "><span data-v-d34ed9d6="">联系电话：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p></div> <div data-v-d34ed9d6="" class="clear"><p data-v-d34ed9d6="" class="left firstParty"><span data-v-d34ed9d6="">家庭住址：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p> <p data-v-d34ed9d6="" class="right qualifications"><span data-v-d34ed9d6="">家庭电话：</span> <span data-v-d34ed9d6="" class="boderLine"></span></p></div></div> <div data-v-d34ed9d6="" class="agreementMsg"><div data-v-d34ed9d6="" class="agreementTitle"><p data-v-d34ed9d6="">根据《中华人民共和国劳动法》、《中华人民共和国劳动合同法》、《劳动合同法实施条例》等有关法律法规规定，经甲、乙双方平等协商一致，自愿订立本劳动合同，共同遵守本合同所列条款。</p></div> <div data-v-d34ed9d6="" class="agrecontent"><div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">一、劳动合同期限</h2> <p data-v-d34ed9d6="" class="samep">（一）本合同是以完成一定工作任务为期限的劳动合同。甲、乙双方约定以完成 <span data-v-d34ed9d6=""></span>工程项目      等工作任务的完成为本合同期限。合同时间自20   年   月   日起至完成该工程任务止，具体时间以《工程施工任务单》为准。</p> <p data-v-d34ed9d6="" class="samep">（二）乙方完成本条第一款工作任务后，经甲、乙双方协商一致同意后乙方转入甲方其他工程项目，本合同即终止。转入其它项目需重新签订劳动合同。具体时间以新签订劳动合同及《工程施工任务单》为准。如施工过程中需跨项目工程临时抢工调动，时间在两月内，可按上一项目签订的劳动合同履行。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">二、工作地点和工作内容</h2> <p data-v-d34ed9d6="">（一）乙方同意甲方安排的工作地点在广西壮族自治区  市 县(市、城区)及甲方承建的建设工程区域范围内，乙方同意按照本合同第一条第二款约定进行调整。</p> <p data-v-d34ed9d6="">（二）乙方同意根据甲方工作需要，担任         岗位（工种）工作。</p> <p data-v-d34ed9d6="">（三）乙方应当按照甲方《工程施工任务单》要求及所规定的标准，按时保质保量地完成工作任务。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">三、工作时间和休息休假</h2> <p data-v-d34ed9d6="">（一）甲方根据工程建设领域施工的特点且经乙方同意，甲、乙双方按照《关于企业实行不定时工作制和综合计算工时工作制的审批办法》（劳部发〔1994〕503号）有关规定，乙方的工作时间执行综合计算工时工作制。</p> <p data-v-d34ed9d6="">（二）甲、乙双方均同意采取集中工作、集中休息、轮休调换等休息休假方式，旨在确保乙方的身体健康和生产工作任务的完成。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">四、劳动报酬</h2> <p data-v-d34ed9d6="">（一）甲方根据《工资支付暂行规定》（劳部发〔1994〕489号）第八条“对完成一次性临时劳动或某项工作的劳动者，用人单位应按有关协议或合同规定在其完成劳动任务后即支付工资。”的规定，甲方经与乙方协商并经乙方同意后，每月   日前支付上月工资。乙方的工资按照以下标准发放：试用期间的工资为      ，试用期结束后，工资为（请在①～⑥选择计算方式）：①     元/月；②   元/天；③   元/m2；④   元/m3；⑤计件   元/个；⑥计时   元/小时。方式发放，其工资构成为基本工资+剩余计件计量工资，即按月支付乙方基本工资       元(不能低于当地最低工资标准)。工作任务在3个月以内的，剩余计件计量工资在乙方完成所做的本工程施工任务后一次性全额给付；工作任务在3个月以上的，剩余计件计量工资以每3个月完成的工作任务为结算节点，结算后一次性支付，直至乙方完成所做的本工程施工任务后一次性全额给付；施工工期跨年度的于次年春节前10日一次性支付应得劳动报酬未发放部分。</p> <p data-v-d34ed9d6="">（二）乙方须按照甲方要求进行实名制登记，并严格遵循实名制考勤制度进出工地，考勤数据将作为工资发放的基础数据依据。</p> <p data-v-d34ed9d6="">（三）工资个税说明</p> <p data-v-d34ed9d6="">上述工资标准已包含个人所得税部分，由       负责缴税；</p> <p data-v-d34ed9d6="">上述工资标准尚未包含个人所得税，由         负责缴税。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">五、社会保险</h2> <p data-v-d34ed9d6="">（一）甲方按照《中华人民共和国社会保险法》等国家和地方有关政策规定为乙方办理社会保险，缴纳社会保险费，乙方依法应缴部分由甲方负责代扣代缴。</p> <p data-v-d34ed9d6="">1.根据劳动者请事假，用人单位可以不支付工资的规定。因乙方请事假期间，未履行劳动义务，甲、乙双方约定请事假期间社会保险费(包括单位缴纳部分)全部由乙方承担。</p> <p data-v-d34ed9d6="">2.甲方按照《自治区人力资源和社会保障厅住房和城乡建设厅关于做好建筑施工企业农民工参加工伤保险有关工作的通知》(桂人社发〔2010〕70号)等有关政策规定为乙方办理工伤保险。</p> <p data-v-d34ed9d6="">（二）在施工过程中乙方若发生工伤事故，甲方积极予以救治。因工负伤的医疗及相关待遇按国家及当地有关规定执行。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">六、劳动保护、劳动条件和职业危害保护</h2> <p data-v-d34ed9d6="">（一）甲方根据生产岗位的需要，按照国家有关劳动安全、卫生的规定为乙方配备必要的安全防护设施，发放必须的劳动保护用品。</p> <p data-v-d34ed9d6="">（二）甲方根据国家有关法律、法规，建立安全生产管理制度；乙方应主动接受甲方上岗前安全教育培训，考试不合格者不得上岗，严格遵守甲方的劳动安全卫生制度，严禁违章作业，确保安全生产。</p> <p data-v-d34ed9d6="">（三）甲方对可能产生职业危害的岗位，应当如实告知乙方，并对乙方进行劳动安全卫生教育和岗前体检，乙方应主动参加教育和体检，防止劳动过程中的事故，减少职业危害。</p> <p data-v-d34ed9d6="">（四）甲方为乙方提供集体食宿，乙方必须遵守甲方住宿管理规定，因个人原因离开必须办理书面请销假手续，若擅自离开居住地发生的交通及其他事故，责任及损失均由乙方自行承担。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">七、劳动合同的变更、解除和终止</h2> <p data-v-d34ed9d6="">（一）乙方在完成工作任务过程中，应严格遵守国家的法律法规和甲方的各项管理规章制度、遵守劳动纪律及各项操作规程及职业道德，否则甲方有权按照有关规定解除与乙方的劳动合同。</p> <p data-v-d34ed9d6="">（二）乙方有下列情形之一的，甲方可以解除本合同：</p> <p data-v-d34ed9d6="">1.有打架斗殴、偷窃、赌博等严重违反用人单位规章制度的、有违法、违纪行为的；</p> <p data-v-d34ed9d6="">2.严重失职，营私舞弊，对甲方造成重大损害的；</p> <p data-v-d34ed9d6="">3.严重违反甲方施工现场安全管理规定和甲方劳动纪律等规章制度的；</p> <p data-v-d34ed9d6="">4.身体不能适应施工生产工作要求，或经调岗后，仍不能适应、胜任生产工作要求的；</p> <p data-v-d34ed9d6="">5.被依法追究刑事责任的。</p> <p data-v-d34ed9d6="">（三）变更、解除、终止本合同，应在规定的时限前以书面形式通知对方，不得擅自变更、解除、终止本合同。</p> <p data-v-d34ed9d6="">（四）解除或终止劳务合同，双方办理有关手续及工作交接。若乙方不办理请假手续离开工作岗位，无故旷工15天以上者将视为乙方自动解除劳动合同。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">八、违约责任</h2> <p data-v-d34ed9d6="">（一）乙方承诺保守在完成工作任务过程知悉的甲方的商业机密，因乙方的原因，造成有关商业机密泄露的，乙方应对甲方承担赔偿责任。</p> <p data-v-d34ed9d6="">（二）乙方应保证其身体健康状况能适应工作岗位的要求，提供的学历证书或工作技能证书、健康体检报告内容真实、有效。乙方提供虚假的健康证明、学历证书或工作技能证书的，甲方可以依法解除合同，造成甲方经济损失的，乙方应给予赔偿。</p> <p data-v-d34ed9d6="">（三）因乙方违反甲方规章制度、严重失职、营私舞弊造成甲方经济损失，乙方将承担责任及损失。</p> <p data-v-d34ed9d6="">（四）因甲方原因造成乙方停工、误工或工程任务无法满足乙方的，甲方承担乙方相应的损失补偿。</p></div> <div data-v-d34ed9d6=""><h2 data-v-d34ed9d6="">九、劳务争议处理及其他</h2> <p data-v-d34ed9d6="">（一）双方因履行本合同发生争议，可以向甲方劳动争议调解委员会申请调解；调解不成的，可以向公司住所地或劳动用工地劳动仲裁委员会申请仲裁；</p> <p data-v-d34ed9d6="">（二）乙方离开工作岗位须书面履行请假手续。</p> <p data-v-d34ed9d6="">乙方未事先提交书面请假手续而离岗超过十五天的，则视为乙方提出解除劳动合同；乙方应在离岗后二十日内到甲方公司驻地领取解除合同通知书，逾期视为已送达乙方。</p> <p data-v-d34ed9d6="">（三）乙方所提供的姓名、实际住址、住宅电话、身份证等个人信息必须真实有效，劳动合同期内，乙方户籍所在地址、现居住地址、联系方式等发生变化，应当及时告知甲方，以便于联络。由于本人所填信息不准确或发生变更未书面告知甲方而造成甲方工作障碍的，由乙方承担相应的责任。</p> <p data-v-d34ed9d6="">（四）本合同未尽事宜或与国家及施工所在地有关规定相悖的，按有关规定执行。</p> <p data-v-d34ed9d6="">（五）甲乙双方在劳务合同文本上签字或盖章后生效，本合同一式两份，甲乙双方各执一份。</p></div></div></div> <div data-v-d34ed9d6="" class="bottomSignature clear"><div data-v-d34ed9d6="" class="left"><p data-v-d34ed9d6="">甲方（盖章）：</p> <p data-v-d34ed9d6="">20  年  月  日   </p></div> <div data-v-d34ed9d6="" class="right"><p data-v-d34ed9d6="">乙方（签名）：</p> <p data-v-d34ed9d6=""> 20  年  月  日</p></div></div></div>';
        $this->start();
        $wordname=rand().'.doc';
        echo $html;
        $this->save($wordname);
        header('Content-type:application/word');
        header('Content-Disposition: attachment; filename='.$wordname.'');
        ob_flush();//每次执行前刷新缓存
        flush();


    }



}