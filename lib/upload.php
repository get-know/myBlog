<?php

class Upload{
    private $url;
    private $size;
    private $type;
    function __construct()
    {
        $this->url = '';
        $this->size = 1024;
        $this->type = ['image/png','image/jpg','image/jpeg','image/gif'];
        $this->errorarr = [
            0=>'文件上传成功',
            1=>'超出php设定大小',
            2=>'超出html规定大小',
            3=>'部分上传',
            4=>'没有文件',
            6=>'找不到临时文件夹',
            7=>'文件写入失败',
            8=>'文件超过10k',
            9=>'文件类型错误',
        ];
    }
    function upload($file){
        /*
         * array: name size type tmp_name error
         * 1. 判断是否为上传文件
         *      is_upload_file()
         * 2. 目录 uploadimg/日期/文件
         *      file_exists() 能判断文件和目录
         *      is_dir  只能判断目录
         *      mkdir()
         *      date()
         *      time()
         *      explode()[1]
         *    判断目录是否存在
         *    设置文件名称 时间戳.后缀名
         * 3. 移动 tmp_name-->目录
         *      move_upload_file()
         *    返回路径
         *  */
        //大于0上传失败
        if($file['error'] > 0){
            $code = $file['error'];
            return ['code'=>$code,'msg'=>$this->errorarr[$code]];
        }
        //超过规定大小返回1
        if(!$this->isSize($file['size'])){
            return ['code'=>8,'msg'=>$this->errorarr[8]];
        }
        //类型不是图片返回2
        if(!$this->isType($file['type'])){
            return ['code'=>9,'msg'=>$this->errorarr[9]];
        }


        //是否为上传文件
        if(is_uploaded_file($file['tmp_name'])){
            //判断是否存在文件夹
            if(!is_dir('../uploadimg')){
                //创建文件夹
                mkdir('../uploadimg');
            }
            $date = date('y-m-d');
            if(!file_exists('../uploadimg/'.$date)){
                mkdir('../uploadimg/'.$date);
            }
            $ext = explode('.',$file['name'])[1];
//            $ext = count($file['name']);

            $filename = time().'.'.$ext;
            move_uploaded_file($file['tmp_name'],'../uploadimg/'.$date.'/'.$filename);
            return ['code'=>10,'msg'=>'/cloth/uploadimg/'.$date.'/'.$filename];

        }


    }


    function isSize($size){
        return $size / 1024 > $this->size ? false :true;
    }

    function isType($type){
        for($i=0;$i<count($this->type);$i++){
            if($this->type[$i] == $type){
                return true;
            }
        }
        return false;
    }

}