<?php


namespace app\core;



trait Helper
{

    public function redirect($path)
    {
        //session_write_close();
        header('location: ' . $path);
        exit;
    }


    public function hash_undecrypted_data($data)
    {
        return password_hash($data, PASSWORD_DEFAULT);

    }

    public function verify_hashed_undecrypted_data($data, $hashedData)
    {
        return password_verify($data, $hashedData);
    }

    /*
    protected function hash_decrypted_data($data)
    {
        $first_key = base64_decode(FIRSTKEY);
        $second_key = base64_decode(SECONDKEY);

        $method = 'aes-256-cbc';
        $iv_length = openssl_cipher_iv_length($method);
        $iv = openssl_random_pseudo_bytes($iv_length);

        $first_hashed = openssl_encrypt($data, $method, $first_key, OPENSSL_RAW_DATA, $iv);
        $second_hashed = hash_hmac('sha3-512', $first_hashed, $second_key, true);

        return base64_encode($iv . $second_hashed . $first_hashed);
    }
    */

    /*
    protected function dehash_data($hashed)
    {
        $first_key = base64_decode(FIRSTKEY);
        $second_key = base64_decode(SECONDKEY);
        $mixed = base64_decode($hashed);

        $method = 'aes-256-cbc';
        $iv_length = openssl_cipher_iv_length($method);
        $iv = substr($mixed, 0, $iv_length);
        $second_hashed = substr($mixed, $iv_length, 64);
        $first_hashed = substr($mixed, $iv_length + 64);

        return openssl_decrypt($first_hashed, $method, $first_key, OPENSSL_RAW_DATA, $iv);
    }
    */

    public function checkRequiredInputs(array $inputs)
    {
        $errors = array();
        foreach ($inputs as $key => $val) {
            if ($val === '')
                $errors[$key] = $key . " can't be empty";
        }
        return $errors;
    }

    public function UploadFile($dir, $id)
    {
        $returned['errors'] = array();
        $returned['uploaded'] = array();
        $directory = PUBLIC_PATH . DS . 'Uploads' . DS . $dir;
        foreach ($_FILES["pictures"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {

                $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
                $name = basename($_FILES["pictures"]["name"][$key]);
                $elements = explode('.', $name);
                $ext = $elements[count($elements) - 1];

                $legalExt = array('jpg', 'jpge', 'png', 'gif');

                if (!in_array($ext, $legalExt)) {
                    $returned['errors'][] = "$name : this type of files is not allowed";
                    continue;
                }


                if ($_FILES["pictures"]["size"][$key] > 1000000) {
                    $returned['errors'][] = "$name : this file depass the maximum size allowed";
                    continue;
                }

                $name = uniqid($id) . $name;

                if (move_uploaded_file($tmp_name, $directory . DS . $name)) {
                    $returned['uploaded'][] = $name;
                }

            }
        }

        return $returned;
    }


}