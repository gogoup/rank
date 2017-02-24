/**
 * Created by Administrator on 2017/2/21.
 */
document.getElementById('joinlink').onclick=function()
{
    var url=document.getElementById('joinlinkurl').value;
    var html="<div class='tab-pane active'>";
    html +="<form action='"+url+"' method='post' enctype='multipart/form-data'>";
    html +="<input type='file' name='linktab'>";
    html +="<input type='submit' value='导入'>";
    html +="<\/form>"

    document.getElementById('link_contont').innerHTML=html;

}
document.getElementById('joinkeyword').onclick=function()
{
    var url=document.getElementById('joinkeywordurl').value;
    var html="<div class='tab-pane active'>";
    html +="<form action='"+url+"' method='post' enctype='multipart/form-data'>";
    html +="<input type='file' name='keywordtab'>";
    html +="<input type='submit' value='导入'>";
    html +="<\/form>"

    document.getElementById('keyword_contont').innerHTML=html;

}