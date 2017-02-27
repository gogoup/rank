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


// 点击修改按钮变成文本框
function linkupdate(link_id)
{
    var l_link=document.getElementById('ltr_'+link_id).textContent;
    document.getElementById('ltr_'+link_id).innerHTML="<input id='linked' type='hidden'value='"+l_link+"'><input type='text'id='ipt_" +link_id+"'value='"+l_link+"' onblur='linkupdated("+link_id+")'>";
  
}

// 失去焦点后自动修改数据
function linkupdated(link_id)
{

    var url=document.getElementById('updateurl').value;
    var linked=document.getElementById('linked').value;
    var html;
    var x=confirm("确认修改吗？");
    if(x==true)
    {
        var htmll=document.getElementById('ipt_'+link_id).value;

        $.post(url,{l_id:link_id,link:htmll},function(msg){
            if(msg){
                  html=htmll;  //有值
            }else{
                  html=linked;   //有值
            }
            document.getElementById('ltr_'+link_id).innerHTML=html;
        })
    }else{
         html=linked;
        document.getElementById('ltr_'+link_id).innerHTML=html;
    }

}

//====================================== 关 键 词 部 分=======================================================
// 点击修改按钮变成文本框
function linkupdate(link_id)
{
    var l_link=document.getElementById('ltr_'+link_id).textContent;
    document.getElementById('ltr_'+link_id).innerHTML="<input id='linked' type='hidden'value='"+l_link+"'><input type='text'id='ipt_" +link_id+"'value='"+l_link+"' onblur='linkupdated("+link_id+")'>";
  
}

// 失去焦点后自动修改数据
function linkupdated(link_id)
{

    var url=document.getElementById('updateurl').value;
    var linked=document.getElementById('linked').value;
    var html;
    var x=confirm("确认修改吗？");
    if(x==true)
    {
        var htmll=document.getElementById('ipt_'+link_id).value;

        $.post(url,{l_id:link_id,link:htmll},function(msg){
            if(msg){
                  html=htmll;  //有值
            }else{
                  html=linked;   //有值
            }
            document.getElementById('ltr_'+link_id).innerHTML=html;
        })
    }else{
         html=linked;
        document.getElementById('ltr_'+link_id).innerHTML=html;
    }

}



//====================================== 链 接 删 除 部 分 =======================================================
function linkdel(l_id)
{ 
    var lurl=document.getElementById('delurl').value;
    // alert(url);
    // alert(l_id);exit();

    var x=confirm("确认删除吗？");
    if(x==true)
    {
        $.post(lurl,{l_id:l_id},function(msg){
            if(msg){
                window.location.reload(true);
            }else{
                html=link;
            }
        })
    }else{
        html=keyed;
        document.getElementById('ltr_'+l_id).innerHTML=html;
    }
  
}

//====================================== 关 键 字 删 除 部 分 =======================================================
function keydel(k_id)
{ 
    var kurl=document.getElementById('kdelurl').value;
    // alert(url);
    // alert(l_id);exit();

    var x=confirm("确认删除吗？");
    if(x==true)
    {
        $.post(kurl,{k_id:k_id},function(msg){
            if(msg){
                window.location.reload(true);
            }else{
                html=keyword;
            }
        })
    }else{
        html=keyed;
        document.getElementById('ltr_'+k_id).innerHTML=html;
    }
  
}