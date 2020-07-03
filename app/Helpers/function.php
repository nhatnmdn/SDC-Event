<?php
if (!function_exists('upload_image'))// trả về giá trị TRUE nếu hàm đã tồn tại và ngược lại FALSE nếu chưa tồn tại. -> neu ham ko ton tai moi thuc hien upload_image
{

    function upload_image($file, $folder = '', array $extend = array())
    {
        $code = 1;
        // lay duong dan anh
        $baseFilename = public_path() . '/uploads/' . $_FILES[$file]['name'];

        // thong tin file
        $info = new SplFileInfo($baseFilename);
        // SplFileInfo la class cap cap thong tin cua file nhu ten, duoi mo rong ...

        // duoi file
        $ext = strtolower($info->getExtension());

        // kiem tra dinh dang file
        if (!$extend) {
            $extend = ['png', 'jpg', 'jpeg'];
        }

        if (!in_array($ext, $extend)) {
            return $data['code'] = 0;
        }

        // Tên file mới
        $nameFile = trim(str_replace('.' . $ext, '', strtolower($info->getFilename())));
        $filename = date('Y-m-d__') . str_slug($nameFile) . '.' . $ext;

        // thu muc goc de upload
        $path = public_path() . '/uploads/';

        if ($folder) {
            $path = public_path() . '/uploads/';
        }

        if (!\File::exists($path)) {
            mkdir($path, 0777, true);
        }

        move_uploaded_file($_FILES[$file]['tmp_name'], $path . $filename);

        $data = [
            'name'     => $filename,
            'code'     => $code,
            'path_img' => 'uploads/' . $filename,
        ];
        return $data;

    }
}
if (!function_exists('pare_url_file')) {
    function pare_url_file($image, $folder = '')
    {
        if (!$image) {
            return '/images/no-image.jpg';
        }

        $explode = explode('__', $image);
        if (isset($explode[0])) {
            $time = str_replace('_', '/', $explode[0]);
            return '/uploads/'. $image;
        }
    }
}

if (!function_exists('str_slug')) {

    function str_slug($title, $separator = '-')
    {
        return Str::slug($title, $separator);
    }
}
?>
