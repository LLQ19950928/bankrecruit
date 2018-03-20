<html>
    <head>
        <link rel="stylesheet" href="/css/frontend/resume/previewresume.css">
    </head>
    <body>
        <div class="myRight">
             <div class="previewTit1 w2">
                 <span class="previewSpan1">简历预览：</span>
             </div>
             <div class="previewTit2">
                 个人简历
             </div>
             <div class="resumeCon2 w2">
                 <div class="resumeTit1 w2" style="cursor: auto">
                     1.基本信息
                 </div>
                 @if($data['userInfo'])
                     <table class="resumeTab w2" border="0" cellpadding="0" cellspacing="0">
                         <tbody>
                         <tr>
                             <td width="28%" class="ri_name">姓名：{{ $data['userInfo']['name'] }}</td>
                             <td width="28%" class="ri_sex">性别：{{ $data['userInfo']['gender'] }}</td>
                             <td width="28%" class="ri_stature">身高：{{ $data['userInfo']['height'] }}</td>
                         </tr>
                         <tr>
                             <td class="ri_nation">民族：{{ $data['userInfo']['nation'] }}</td>
                             <td class="ri_politicalstatus">政治面貌：{{ $data['userInfo']['political_status'] }}</td>
                             <td class="ri_excellence">婚姻状况：{{ $data['userInfo']['marry'] }}</td>
                         </tr>
                         <tr>
                             <td class="j_mobile">联系电话：{{ $data['userInfo']['phone_number'] }}</td>
                             <td class="j_email">电子邮件：{{ $data['userInfo']['email'] }}</td>
                         </tr>
                         <tr>
                             <td class="j_mobile">身份证号：{{ $data['userInfo']['id_number'] }}</td>
                         </tr>
                         <tr>
                             <td colspan="3" class="ri_addresss">
                                 联系地址：{{ $data['userInfo']['current_address'] }}
                             </td>
                         </tr>
                         <tr>
                             <td class="ri_nativeplace">家庭地址：{{ $data['userInfo']['family_at'] }}</td>
                         </tr>
                         <tr>
                             <td class="ri_wherestudent">健康状况：{{ $data['userInfo']['healthy_status'] }}</td>
                             <td class="ri_ismarry">出生时间：{{ $data['userInfo']['broth_at'] }}</td>
                             <td class="ri_issuercount">毕业时间：{{ $data['userInfo']['graduate_at'] }}</td>
                         </tr>
                         </tbody>
                     </table>
                 @endif
             </div>
             <div class="resumeCon3 w2" style="cursor: auto">
                 <div class="resumeTit1  w2">2.教育经历</div>
                 @foreach($data['education'] as $edu)
                     <table class="resumeTab  w2" border="0" cellspacing="0" cellpadding="0">
                         <tbody>
                         <tr>
                             <td width="28%" class="re_school">学校: {{ $edu['school_name'] }}</td>
                             <td width="28%" class="re_startdate">开始时间：{{ $edu['start_date'] }}</td>
                             <td width="44%" class="re_enddate">结束时间：{{ $edu['end_date'] }}</td>
                         </tr>
                         <tr>
                             <td class="re_specialname">专业名称：{{ $edu['major'] }}</td>
                             <td class="re_department">专业成绩排名：
                                 @if($edu['rank'] == 1)
                                        前10%
                                 @elseif($edu['rank'] == 2)
                                        前20%
                                 @elseif($edu['rank'] == 3)
                                        前30%
                                 @elseif($edu['rank'] == 4)
                                        前50%
                                 @elseif($edu['rank'] == 5)
                                        其它
                                 @endif
                             </td>
                         </tr>
                         <tr>
                             <td class="re_degree">学位：
                                 @if($edu['degree'] == 1)
                                     学士
                                 @elseif($edu['degree'] == 2)
                                     硕士
                                 @elseif($edu['degree'] == 3)
                                     博士
                                 @elseif($edu['degree'] == 4)
                                     无
                                 @endif
                             </td>
                             <td class="re_education">学历：
                                 @if($edu['education'] == 1)
                                     大专
                                 @elseif($edu['education'] == 2)
                                     本科
                                 @elseif($edu['education'] == 3)
                                     硕士研究生
                                 @elseif($edu['education'] == 4)
                                     博士研究生
                                 @elseif($edu['education'] == 5)
                                     无
                                 @endif
                             </td>
                         </tr>
                         <tr>
                             <td class="re_schoollength">学习形式：
                                @if($edu['study_style'] == 1)
                                    全日制
                                @elseif($edu['study_style'] == 2)
                                    非全日制
                                @endif
                             </td>
                         </tr>
                         </tbody>
                     </table>
                     <div class="previewLine"></div>
                 @endforeach
             </div>
             <div class="resumeCon2 w2">
                 <div class="resumeTit1  w2" style="cursor:auto;">
                     3.<lable id="perworkTitle">实践或实习</lable>
                 </div>
                 @foreach($data['work'] as $w)
                     <table class="resumeTab  w2" border="0" cellspacing="0" cellpadding="0">
                         <tbody>
                         <tr>
                             <td class="rwe_company" width="28%">公司名称：{{ $w['work_place'] }}</td>
                             <td class="rwe_department" width="28%">部门名称：{{ $w['department'] }}</td>
                             <td class="rwe_postion" width="44%">职位名称：{{ $w['job_name'] }}</td>
                         </tr>
                         <tr>
                             <td class="rwe_startdate">开始时间：{{ $w['start_date'] }}</td>
                             <td class="rwe_enddate">结束时间：{{ $w['end_date'] }}</td>
                             <td class="rwe_postiontype">职位类别：
                                 @if($w['work_status'] == 1)
                                     正式员工
                                 @elseif($w['work_status'] == 2)
                                     实习生
                                 @elseif($w['work_status'] == 3)
                                     兼职人员
                                 @endif
                             </td>
                         </tr>
                         <tr class="rwe_otherinfo">
                             <td colspan="4">
                                 <div class="previewList"></div>工作业绩
                             </td>
                         </tr>
                         <tr class="rwe_otherinfo">
                             <td colspan="4">
                                 {{ $w['achievement'] }}
                             </td>
                         </tr>
                         </tbody>
                     </table>
                     <div class="previewLine"></div>
                 @endforeach
             </div>
            <div class="resumeCon3  w2">
                <div class="resumeTit1  w2" style="cursor:auto;">4.家庭信息</div>
                @foreach($data['family'] as $f)
                    <table class="resumeTab  w2" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                        <tr>
                            <td width="20%" class="f_name">家属姓名：{{ $f['name'] }}</td>
                            <td width="20%" class="f_relation">关系：
                                @if($f['call'] == 1)
                                    父亲
                                @elseif($f['call'] == 2)
                                    母亲
                                @elseif($f['call'] == 3)
                                    兄弟姐妹
                                @endif
                            </td>
                            <td width="28%" class="f_workplace">单位：{{ $f['company'] }}</td>
                            <td width="20%" class="f_incumbency">担任职务：{{ $f['job'] }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="previewLine"></div>
                @endforeach
            </div>
            <div class="resumeCon3 w2">
                <div class="resumeTit1 w2" style="cursor:auto;">5.获奖情况</div>
                @foreach($data['bonus'] as $bonus)
                    <table class="resumeTab w2" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                        <tr>
                            <td class="e_date">获奖时间：{{ $bonus['bonus_date'] }}</td>
                            <td class="e_name">奖项名称：{{ $bonus['bonus_name'] }}</td>
                            <td class="e_type">奖项类别：{{ $bonus['bonus_type'] }}</td>
                            <td class="e_other">奖励单位：{{ $bonus['bonus_company'] }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="previewLine"></div>
                @endforeach
            </div>
            <div class="resumeCon3 w2">
                <div class="resumeTit1 w2" style="cursor:auto;">5.证书情况</div>
                @foreach($data['userForeign'] as $foreign)
                    <table class="resumeTab w2" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                        <tr>
                            <td class="e_date">获证时间：{{ $foreign['date'] }}</td>
                            <td class="e_name">证书类别：{{ $foreign['foreign_type'] }}</td>
                            <td class="e_type">证书名称：{{ $foreign['level_name'] }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="previewLine"></div>
                @endforeach
                @foreach($data['userCertificate'] as $certificate)
                    <table class="resumeTab w2" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                        <tr>
                            <td class="e_date">获证时间：{{ $certificate['date'] }}</td>
                            <td class="e_name">证书类别：{{ $certificate['type_name'] }}</td>
                            <td class="e_type">证书名称：{{ $certificate['certificate_name'] }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="previewLine"></div>
                @endforeach
            </div>
        </div>
    </body>
</html>