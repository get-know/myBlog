/**
 * Created by Administrator on 2018/9/17.
 */


!function(){
    $('textarea').on('input',function(){
        let val = $('textarea').val();
        // console.log(val.length);

        $('.info > span').html(val.length);
        $('.submit').on('click',function(){
            //显示留言实时时间
            let date = new Date();
            let year = date.getFullYear(),
                month = date.getMonth()+1,
                day = date.getDay(),
                hours = date.getHours(),
                min = date.getMinutes(),
                sec = date.getSeconds();
            month = month < 10 ? '0'+month : month;
            day = day < 10 ? '0'+day : day;
            hours = hours < 10 ? '0'+hours : hours;
            min = min < 10 ? '0'+min : min;
            sec = sec < 10 ? '0'+sec : sec;
            //获取表单值进行提交
            let name = $('.username').val();
            let txt = $('textarea').val();
            if(name !== '' && txt !== ''){
                $('.word').append(
                    `<li>
                    <div class="w-left">
                    <i class="iconfont icon-yonghu"></i>
                    </div>
                    <div class="w-right">
                    <p class="name">${name}</p>
                    <div class="w-time">
                        <span class="year">${year}</span>-<span class="month">${month}</span>-<span class="day">${day}</span>-<span class="time">${hours}</span>:<span class="min">${min}</span>:<span class="second">${sec}</span>
                    </div>
                </div>
                <p class="desc">${txt}</p>   
                 <p class="del">删除</p>
                </li>`
                );
                $('.username').val('');
                $('textarea').val('');
            }
        });
    })
    //点击删除li
    $('.word').on('click','.del',function(){
        // console.log($(this));
		let flag = confirm('确定删除吗？');
		if(flag){
			$(this).parent('li').remove();
		}
        
    });
}()

//留言功能
// !function(){
//     let oName = document.querySelector('.username'),
//         oPhone = document.querySelector('.phone'),
//         oTxt = document.querySelector('.sidebar > textarea'),
//         oSubmit = document.querySelector('.submit'),
//         oUl = document.querySelector('.word'),
//         oNum = document.querySelector('.info > span');
//
//     oTxt.oninput = function(){
//         oNum.innerHTML = oTxt.value.length;
//     }
//     oSubmit.addEventListener('click',function(){
//         let name = oName.value,
//             txt = oTxt.value;
//
//         if(name === ''){
//             oName.focus();
//             return;
//         }else if(txt === ''){
//             oTxt.focus();
//             return;
//         }
//         oUl.innerHTML +=
//             `<li>
//             <div class="w-left">
//             <i class="iconfont icon-yonghu"></i>
//             </div>
//             <div class="w-right">
//             <p class="name">${name}</p>
//             <div class="w-time">2018-09-19 16:18:20</div>
//         </div>
//         <p class="desc">${txt}</p>
//
//         </li>`;
//         oName.value = '';
//         oTxt.value = '';
//     },false)
// }()
