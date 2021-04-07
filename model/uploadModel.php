<?php
include_once 'P2SQL.php';

class uploadModel
{

    private static $_instance;

    public static function getInstance()
    {
        if (! self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function uploadImage($path, $idInput){
        //Thư mục bạn sẽ lưu file upload
        $target_dir    = $path;
        //Vị trí file lưu tạm trong server
        $target_file   = $target_dir . basename($_FILES[$idInput]["name"]);
        $allowUpload   = true;
        //Lấy phần mở rộng của file
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        if(empty($imageFileType)) return false;
        $maxfilesize   = 800000; //(bytes)
        ////Những loại file được phép upload
        $allowtypes    = array('jpg', 'png', 'jpeg');
        
        

            //Kiểm tra xem có phải là ảnh
            $check = getimagesize($_FILES[$idInput]["tmp_name"]);
            if($check !== false) {
                $allowUpload = true;
            } else {
                echo "<script>alert('Không phải file ảnh')</script>";
                $allowUpload = false;
                return false;
            }

        
        // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
//         if (file_exists($target_file)) {
//             echo "<script>alert('File ảnh này đã tồn tại hoặc trùng tên')</script>";
//             $allowUpload = false;
//             return false;
//         }
        // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
        if ($_FILES[$idInput]["size"] > $maxfilesize)
        {
            echo "<script>alert('Kích thước vượt quá 800kb')</script>";
            $allowUpload = false;
            return  false;
        }
        
        
        // Kiểm tra kiểu file
        if (!in_array($imageFileType,$allowtypes ))
        {
            echo "<script>alert('Chỉ được upload các định dạng JPG, PNG, JPEG')</script>";
            $allowUpload = false;
            return false;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($allowUpload) {
            if (move_uploaded_file($_FILES[$idInput]["tmp_name"], $target_file))
            {
//                         echo "File ". basename( $_FILES[$idInput]["name"]).
//                         " Đã upload thành công";
                return $target_file;
            }
            else
            {
                echo "<script>alert('Có lỗi xảy ra khi upload ảnh')</script>";
                return  false;
            }
        }
    }



}

?>