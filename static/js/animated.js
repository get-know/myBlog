// $(function(){
    let flag = true;
    $('.sq_m_meun').on('click',function(){
       if(flag){
          $('.sq_meun_back').animate({'left':0})
           $('.sq_nav_1').eq(0).animate({'margin-left':0},700)
           $('.sq_nav_1').eq(1).animate({'margin-left':0},800)
           $('.sq_nav_1').eq(2).animate({'margin-left':0},900)
           $('.sq_nav_1').eq(3).animate({'margin-left':0},1000)
           $('.sq_nav_1').eq(4).animate({'margin-left':0},1100)
       }else{
           $('.sq_nav_1').eq(0).animate({'margin-left':'-150%'})
           $('.sq_nav_1').eq(1).animate({'margin-left':'-150%'})
           $('.sq_nav_1').eq(2).animate({'margin-left':'-150%'})
           $('.sq_nav_1').eq(3).animate({'margin-left':'-150%'})
           $('.sq_nav_1').eq(4).animate({'margin-left':'-150%'})
           $('.sq_meun_back').animate({'left':'-150%'})

       }
       flag = !flag;
       console.log(1)
    })

// })