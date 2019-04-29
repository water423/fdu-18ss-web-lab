
window.onload=function(){
    //获得大图片figcaption元素
    let figcation = document.getElementById("featured").getElementsByTagName("figcaption")[0] ;
    //获得大图片img元素
    let pictures = document.getElementById("featured").getElementsByTagName("img")[0] ;
    //获得五个小图片元素组成的数组
    let pics = document.getElementById("thumbnails").children;
    //将五个图片的地址写入数组储存（与小图片的地址并不相同）
    let srcs = ["images/medium/5855774224.jpg","images/medium/5856697109.jpg","images/medium/6119130918.jpg","images/medium/8711645510.jpg","images/medium/9504449928.jpg"];
    //设置背景色的透明度默认值为0
    let opacity = 0;
    //声明淡入淡出定时器（间歇调用）
    let timer1;
    let timer2;

    //创建五个小图片的标题名组成的数组
    let titles = new Array(pics.length);
    //对应小图片数组中的img元素的title属性
    for(var i = 0 ;i<pics.length;i++){
        titles[i] = pics[i].getAttribute("title");
    }

    //对于每一个小图片均有：
    //onclick方法：当小图片被点击时
    //             大图片img元素的src属性与大图片地址数组中的相应地址进行对应
    //             大图片img元素的title属性与大图片标题名数组中的相应名称进行对应
    //onmouseover方法：当鼠标移动至小图片时
    //                 大图片的标题的内容与标题数组的相应内容进行对应 并进行透明度的初始设置

    //img1
    pics[0].onclick=function(){
        pictures.setAttribute("src",srcs[0]);
        pictures.setAttribute("title",titles[0]);
    };
    pics[0].onmouseover=function(){
        figcation.style.opacity="0";
        figcation.innerHTML = titles[0];

    };
    //img2
    pics[1].onclick=function(){
        pictures.setAttribute("src",srcs[1]);
        pictures.setAttribute("title",titles[1]);
    };
    pics[1].onmouseover=function(){
        figcation.style.opacity="0";
        figcation.innerHTML = titles[1];


    };
    //img3
    pics[2].onclick=function(){
        pictures.setAttribute("src",srcs[2]);
        pictures.setAttribute("title",titles[2]);
    };
    pics[2].onmouseover=function(){
        figcation.style.opacity=0;
        figcation.innerHTML = titles[2];
    };
    //img4
    pics[3].onclick=function(){
        pictures.setAttribute("src",srcs[3]);
        pictures.setAttribute("title",titles[3]);
    };
    pics[3].onmouseover=function(){
        figcation.style.opacity=0;
        figcation.innerHTML = titles[3];
    };
    //img5
    pics[4].onclick=function(){
        pictures.setAttribute("src",srcs[4]);
        pictures.setAttribute("title",titles[4]);
    };
    pics[4].onmouseover=function(){
        figcation.style.opacity=0;
        figcation.innerHTML = titles[4];
    };

    //对于大图片：
    //实现figcation的透明度动画 onmouseover onmouseout时间实现淡入淡出
    function TimeOut1(){
        if(opacity<0.8){
            opacity +=0.01;
        }else{
            //当透明度大于0.8时 清除间歇调用定时器
            clearInterval(timer1);
        }
        figcation.style.opacity = parseFloat(opacity).value.toString() ;
    }
    //12.5 = 1000 / (0.8/0.01)
    pictures.onmouseover=function(){
        timer1 = setInterval(TimeOut1,12.5)
    };

    function TimeOut2(){
        if(opacity>0){
            opacity -=0.01;
        }else{
            clearInterval(timer2)
        }
        figcation.style.opacity = parseFloat(opacity).value.toString();
    }
    //12.5 = 1000 / (0.8/0.01)
    pictures.onmouseout=function(){
        timer2 = setInterval(TimeOut2,12.5)
    }
};