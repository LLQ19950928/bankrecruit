<html>
   <head>
       <link rel="stylesheet" href="/css/layouts/resume.css">
       <link rel="stylesheet" href="/layer/mobile/need/layer.css">
       <link rel="stylesheet" href="/css/frontend/resume/updateinfo.css">
       <script src="/layer/layer.js"></script>
       <script src="/js/jquery-3.2.1.min.js"></script>
       <script src="/js/frontend/resume/update.js"></script>
       <script src="/My97DatePicker/WdatePicker.js"></script>
   </head>
   <body>
     <form method="post" id="resumeForm">
       <table width="700" border="0" align="center" cellpadding="0"
              cellspacing="0" id="info" style="border-collapse:separate; border-spacing: 0px 20px;">
           <tr>
               <td width="115">起始日期</td>
               <td>
                   <input type="text" name="start_date" value="{{ $data['start_date'] }}"
                          id="startDate"  onClick="WdatePicker()">
               </td>
               <td width="115">结束日期</td>
               <td>
                   <input type="text" name="end_date"
                          value="{{ $data['end_date'] }}" id="endDate" onClick="WdatePicker()">
               </td>
           </tr>
           <tr>
               <td width="115">学历</td>
               <td>
                   <select name="education">
                       <option selected="selected">-------请选择------</option>
                       <option value="1" @if($data['education'] == 1)
                           selected="selected" @endif>大专</option>
                       <option value="2" @if($data['education'] == 2)
                       selected="selected" @endif>本科</option>
                       <option value="3" @if($data['education'] == 3)
                       selected="selected" @endif>硕士研究生</option>
                       <option value="4" @if($data['education'] == 4)
                       selected="selected" @endif>博士研究生</option>
                       <option value="5" @if($data['education'] == 5)
                       selected="selected" @endif>无</option>
                   </select>
               </td>
               <td width="115">学位</td>
               <td>
                   <select name="degree">
                       <option selected="selected">-------请选择------</option>
                       <option value="1" @if($data['degree'] == 1)
                            selected="selected" @endif>学士</option>
                       <option value="2" @if($data['degree'] == 2)
                       selected="selected" @endif>硕士</option>
                       <option value="3" @if($data['degree'] == 3)
                       selected="selected" @endif>博士</option>
                       <option value="4" @if($data['degree'] == 4)
                       selected="selected" @endif>无</option>
                   </select>
               </td>
           </tr>
           <tr>
               <td width="115">学校</td>
               <td>
                   <input type="text" name="school_name" value='{{ $data['school_name'] }}'>
               </td>
               <td width="115">学习形式</td>
               <td>
                   <select name="study_style">
                       <option selected="selected">-------请选择------</option>
                       <option value="1" @if($data['study_style'] == 1)
                       selected="selected" @endif>全日制</option>
                       <option value="2" @if($data['study_style'] == 2)
                       selected="selected" @endif>非全日制</option>
                   </select>
               </td>
           </tr>
           <tr>
               <td>专业名称</td>
               <td>
                   <input type="text" name="major" value="{{ $data['major'] }}">
               </td>
           </tr>
           <tr>
               <td width="115">专业排名</td>
               <td>
                   <select name="rank">
                       <option selected="selected">-------请选择------</option>
                       <option value="1" @if($data['rank'] == 1)
                       selected="selected" @endif>前10%</option>
                       <option value="2" @if($data['rank'] == 2)
                       selected="selected" @endif>前20%</option>
                       <option value="3" @if($data['rank'] == 3)
                       selected="selected" @endif>前30%</option>
                       <option value="4" @if($data['rank'] == 4)
                       selected="selected" @endif>前50%</option>
                       <option value="5" @if($data['rank'] == 5)
                       selected="selected" @endif>其它</option>
                   </select>
               </td>
           </tr>
           <tr>
               <td>
                   <input type="hidden" value="{{ $data['id'] }}" name="id">
                   <button class="input_submit" id="myButton">提交</button>
               </td>
           </tr>
       </table>
     </form>
  </body>
</html>


