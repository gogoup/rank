function reback()
{
    history.go(-1)
}
//连接模糊查询
document.getElementById('checklink').onclick=function(){
    var url=document.getElementById('linkurl').value;
    var condition1=document.getElementById('condition1').value;
    location.href=url+"?condition1="+condition1;
};
//关键字模糊查询
document.getElementById('checkkey').onclick=function(){
    var url=document.getElementById('keyurl').value;
    var condition2=document.getElementById('condition2').value;
    var xmlhttp;
    if (window.XMLHttpRequest)
    {
        //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            var date=xmlhttp.responseText;
            var date2=eval(date);
            console.log(date2);
            var html="<tr>";
            for(var i=0; i<date2.length; i++)
            {
                     html= html + "<td>"+date2[i].k_id+"</td>";
                     html +="<td>"+date2[i].keyword+"</td>"
                     html +="<td class='action-td' style='width: 16rem;'>";
                     html +="<a href=\"{:U('Rank/keyword',array('k_id'=>"+date2[i].k_id+"))}\" class=\"btn btn-small btn-warning\" target=\"_blank\">排名</a>";
                     html +="<a href=\"javascript:;\" class=\"btn btn-small\" id='keyupdate'>修改</a>";
                     html +="<a href=\"javascript:;\" class=\"btn btn-small\" id='keydel'>删除</a>";
            }
            document.getElementById('keybody').innerHTML=html;

        }
    }
    xmlhttp.open("GET",url+"?condition2="+condition2,true);
    xmlhttp.send();
};
