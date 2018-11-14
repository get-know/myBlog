/**
 * Created by Administrator on 2018/9/18.
 */

//banner轮播
!function(){
    let banner = document.querySelector('.m-banner'),
        aImg = document.querySelectorAll('.m-banner > a > img'),
        oImgBox = document.querySelector('.m-banner'),
        aSpan = document.querySelectorAll('.m-banner .change > span'),
        aTips = document.querySelectorAll('.m-banner .tips'),
        oPrev = document.querySelector('.left-btn'),
        oNext = document.querySelector('.right-btn');
    console.log(aTips);
    console.log(aImg);

    /**
     * 参数
     *      banner  可视盒子
     *      aImg    图片
     *      oImgBox 包裹图片的盒子
     *      aSpan   轮播点
     *

     */
    leftRightBanner(banner,aImg,oImgBox,aSpan,oPrev,oNext)
    function leftRightBanner(){
        let index = 0,
            now = 0,
            next = 0,
            t;
        // console.log(aImg,aSpan,oPrev,oNext);
        //初始化图片和轮播点
        aSpan[0].classList.add('hot');
        aImg[0].style.left = 0;

        aTips[now].style.bottom = '60px';
        //移入轮播点时的操作
        for(let i = 0;i<aImg.length;i++){
            aImg[i].index = i;
            aImg[i].onmouseover = function(){
                aImg[index].classList.remove('hot');
                aSpan[index].classList.remove('hot');

                index = this.index;
                // oImgBox.style.left =- index * aImg[0].offsetWidth + 'px';
                aImg[index].classList.add('hot');
                aSpan[index].classList.add('hot');
            }
        }
        //定时器
        t = setInterval(move,3000);
        //定时器函数与右边点击时执行的函数
        function move(){
            next++;
            if(next == aImg.length){
                next = 0;
            }

            aImg[now].style.left = 0;
            aImg[next].style.left = aImg[0].offsetWidth + 'px';
//                animate(aTips[now],{left:-aImg[0].offsetWidth});
            animate(aImg[now],{left:-aImg[0].offsetWidth},function(){
                for(let i=0;i<aImg.length;i++){
                    for(let j=0;j<aImg.length;j++){
                        aTips[j].style.bottom = '-60px';  //
                        aTips[j].style.opacity = 0;
                    }
                    aTips[now].style.bottom = '60px';
                    aTips[now].style.opacity = 1;
                    aSpan[i].classList.remove('hot');
                }
            });

            animate(aImg[next],{left:0},function(){
                aSpan[next].classList.add('hot');
            });


            now = next;
        }
        //左点击时执行的函数
        function moveLeft(){
            next--;
            if(next < 0){
                next = aImg.length-1;
            }

            aImg[now].style.left = 0;
            aImg[next].style.left = -aImg[0].offsetWidth + 'px';
            animate(aImg[now],{left:aImg[0].offsetWidth},function(){
                for(let i=0;i<aImg.length;i++){
                    for(let j=0;j<aImg.length;j++){
                        aTips[j].style.bottom = '-60px';
                        aTips[j].style.opacity = 0;
                    }
                    aTips[now].style.bottom = '60px';
                    aTips[now].style.opacity = 1;
                    aSpan[i].classList.remove('hot');
                }
            });
            animate(aImg[next],{left:0},function(){
                aSpan[next].classList.add('hot');
            });

            now = next;
        }
        //右点击
        oNext.onclick = function(){
            move();
        }
        //左点击
        oPrev.onclick = function(){
            moveLeft();
        }
        //移入 清除定时器
        banner.onmouseover = function(){
            clearInterval(t)
        }
        //移出 开启定时器
        banner.onmouseout = function(){
            t = setInterval(move,3000);
        }

    }

}()




//延迟加载
!function(){
    let aTitle = document.querySelectorAll('.m-news .tit'),
        aLi = document.querySelectorAll('.word > li'),
        aImg = document.querySelectorAll('.word > li >img'),
        oHeader = document.querySelector('.header'),
        aColor = document.querySelectorAll('.h-nav ul li a'),
        oSever = document.querySelector('.service'),
        oMap = document.querySelector('.map');
    console.log(aTitle,aLi,aImg);
    window.onscroll = function(e){
        let height = document.body.scrollTop || document.documentElement.scrollTop;
        // console.log(height);

        if(document.documentElement.scrollTop>0){
            oHeader.classList.add('home');
            aColor.forEach(function(val,index){
                val.classList.add('hot');
            })

            aColor[2].classList.add('hot');
        }else{
            oHeader.classList.remove('home');
            aColor.forEach(function(val,index){
                val.classList.remove('hot');
            })
        }



        aTitle.forEach(function(val){
            if(height+innerHeight/2 >= val.offsetTop-300){
                // console.log(val.offsetTop)
                val.style.top = 0;
            }
        });
        aLi.forEach(function(val){
            if(height+innerHeight/2 >= val.offsetTop-300){
                val.style.left = 0;
                val.style.opacity = 1;
                console.log('>')
            }
            aImg.forEach(function(vals){
                if(height+innerHeight/2 >= val.offsetTop-300){
                    let url = vals.getAttribute('imgsrc');
                    // console.log(url);
                    vals.setAttribute('src',url);
                }
            });
        });
        if(height+innerHeight/2 >= oSever.offsetTop-300){
            oSever.style.top = 0;
            oMap.style.top = 0
        }


        // function getTop(domObj){
        //     let obj = {
        //         left: 0,
        //         top: 0
        //     }
        //     while(domObj != document.body){
        //         obj.top += domObj.offsetTop;
        //         obj.left += domObj.offsetLeft;
        //         domObj = domObj.offsetParent;
        //     }
        //
        //     return obj;
        // }
    }

}()












