<?php 

class Flasher {
    public static function setFlash($pesan, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'tipe'  => $tipe
        ];
    }

    public static function errorLogin(){
        $_SESSION['errorLogin'] = true;
    }
}