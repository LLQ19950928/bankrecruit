<html>
   <head>
       <link rel="stylesheet" href="/css/layouts/resume.css">
       <link rel="stylesheet" href="/layer/mobile/need/layer.css">
       <script src="/layer/layer.js"></script>
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
                   <input type="text" name="start_date" value=""
                          id="startDate"  onClick="WdatePicker()">
               </td>
               <td width="115">结束日期</td>
               <td>
                   <input type="text" name="end_date"
                          value="" id="endDate" onClick="WdatePicker()">
               </td>
           </tr>
           <tr>
               <td width="115">学历</td>
               <td>
                   <select name="education">
                       <option selected="selected">-------请选择------</option>
                       <option value="1">大专</option>
                       <option value="2">本科</option>
                       <option value="3">硕士研究生</option>
                       <option value="4">博士研究生</option>
                       <option value="5">无</option>
                   </select>
               </td>
               <td width="115">学位</td>
               <td>
                   <select name="degree">
                       <option selected="selected">-------请选择------</option>
                       <option value="1">学士</option>
                       <option value="2">硕士</option>
                       <option value="3">博士</option>
                       <option value="4">无</option>
                   </select>
               </td>
           </tr>
           <tr>
               <td width="115">学校</td>
               <td>
                   <input type="text" name="school_name" value=''>
               </td>
               <td width="115">学习形式</td>
               <td>
                   <select name="study_style">
                       <option selected="selected">-------请选择------</option>
                       <option value="1">全日制</option>
                       <option value="2">非全日制</option>
                   </select>
               </td>
           </tr>
           <tr>
               <td>专业名称</td>
               <td>
                   <input type="text" name="major" value="">
               </td>
           </tr>
           <tr>
               <td width="115">专业排名</td>
               <td>
                   <select name="rank">
                       <option selected="selected">-------请选择------</option>
                       <option value="1">前10%</option>
                       <option value="2">前20%</option>
                       <option value="3">前30%</option>
                       <option value="4">前50%</option>
                       <option value="4">其它</option>
                   </select>
               </td>
           </tr>
           <tr>
               <td>
                   <input type="submit" value="提交">
               </td>
           </tr>
       </table>
     </form>
  </body>
</html>


