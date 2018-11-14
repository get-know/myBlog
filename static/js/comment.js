
$(function(){
    let submit = $('.submit');
    let pagenum = 0;
    let more = $('div.more');
    let list = []; //最终渲染的数组
    let flag = true;
    $('.icon-jiazai').css({'display':'none','animationPlayState':'paused'})

    more.on('click',function(){
        if(!flag){
            return;
        }
        flag = false;
        $('.icon-jiazai').css({'display':'inline-block','animationPlayState':'running'})
        pagenum++;
        setTimeout(function(){
            $.ajax({
                url:'querycomment.php',
                data:{pagenum:pagenum},
                dataType:'json',
                success:function(res){
                    if(res.length){
                        flag = true;
                        $('.icon-jiazai').css({'display':'none','animationPlayState':'paused'})
                        showComment(res);
                    }else{
                        alert('没有更多数据了');
                        $('.icon-jiazai').css({'display':'none','animationPlayState':'paused'})
                    }
                }
            })
        },100)

    })
    more.triggerHandler('click');
     //显示更多留言
     function showComment(data){
         let str='';
        //三种合并数组的方法
         list = list.concat(data);
         // list.push(...data);
         // Array.prototype.push.apply(list,data);
         // Array.prototype.push.call(list,...data);
         list.forEach(ele=>{
             str+=` 
                <li>
                    <div class="w-left">
                        <i class="iconfont icon-yonghu"></i>							
                    </div>
                    <div class="w-right">
                        <p class="name">${ele.name}</p>
                        <div class="w-time">
                            <span class="year">${ele.times}</span>
                        </div>
                    </div>
                    <p class="desc">${ele.content}</p>
                </li>
                `;
         })
         // $(str).prependTo('.word');
         $('.word').html(str);
     }

    //提交
    submit.on('click',function(){
        let data = $('#myform').serialize();
        let arr = $('#myform').serializeArray();
            $.ajax({
            url:'comment.php',
            data:data,
            success:function(res){
                console.log(res);
                if(res=='success'){
                    insertData(arr);
                }else{
                    alert('留言失败');
                }
            }
        })

        function insertData(arr){
            $('#myform')[0].reset();
            let str=`
                    <div class="w-left">
                        <i class="iconfont icon-yonghu"></i>							
                    </div>
                    <div class="w-right">
                        <p class="name">${arr[0].value}</p>
                        <!--<div class="w-time">2018-01-04 16:18:53</div>-->
                        <div class="w-time">
                            <span class="year">${getTime()}</span>
                        </div>
                    </div>
                    <p class="desc">${arr[2].value}</p>
                    `;

            $('<li>').html(str).prependTo('.word');
        }

        function getTime(){
            let date = new Date();
            let year = date.getFullYear(),
                month = date.getMonth()+1,
                day = date.getDate(),
                hours = date.getHours(),
                min = date.getMinutes(),
                sec = date.getSeconds();
            month = month < 10 ? '0'+month : month;
            day = day < 10 ? '0'+day : day;
            hours = hours < 10 ? '0'+hours : hours;
            min = min < 10 ? '0'+min : min;
            sec = sec < 10 ? '0'+sec : sec;
            return year +'-'+month+'-'+day+' '+hours+':'+min+':'+sec;
        }
    })
})