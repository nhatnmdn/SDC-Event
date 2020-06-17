<?php
if(!function_exists('upload_image'))
{
    function upload_image($file, $folder = '', array $extend = array())
    {
        $code = 1;

        //Lấy đường dẫn ảnh
        $baseFilename = public_path(). '/uploads/' .$_FILES[$file]['name'];

        //Thông tin file
        $info = new SplFileInfo($baseFilename);

        //Đuôi file
        $ext = strtolower($info->getExtension());

        //Kiểm tra định dạng file
        if(!$extend)
        {
            $extend = ['png','jpg','jpeg'];
        }

        if(!in_array($ext,$extend))
        {
            return $data['code'] = 0;
        }

        //Tên file mới
        $nameFile = trim(str_replace('.'.$ext,'',strtolower($info->getFilename())));
        $filename = date('Y-m-d__').$nameFile.'.'.$ext;

        //Thư mục gốc để upload
        $path = public_path().'/uploads/'.date('Y/m/d');
        if($folder)
        {
            $path = public_path().'/uploads/';
        }

        if(!\File::exists($path))
        {
            mkdir($path,0777,true);
        }

        //di chuyển file vào thư mục uploads
        move_uploaded_file($_FILES[$file]['tmp_name'], $path.$filename);

        $data = [

            'name'  => $filename,
            'code'  => $code,
            'path_img' => 'uploads/'.$filename
        ];

        return $data;
    }
}

if(!function_exists('pare_url_file'))
{
    function pare_url_file($image,$folder ='')
    {
        if(!$image)
        {
            return'/images/no-image.jpg';
        }

        $explode = explode('__', $image);

        if(isset($explode[0]))
        {
            $time = str_replace('_','/',$explode[0]);
            return '/uploads/'.date('Y/m/d').$image;
            // return '/uploads/'.$folder.'/' .date('Y/m/d', strtotime($time)).'/'.$image;
        }
    }

    if (! function_exists('array_get')) {
        /**
         * Get an item from an array using "dot" notation.
         *
         * @param  \ArrayAccess|array  $array
         * @param  string  $key
         * @param  mixed   $default
         * @return mixed
         */
        function array_get($array, $key, $default = null)
        {
            return Arr::get($array, $key, $default);
        }
    }
}
?>


