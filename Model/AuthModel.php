<?php 

    class AuthModel{
        
        /** Function prosesAuthadmin untuk cek data admin dari database admin
         *  @param $npm untuk data npm
         *  @param $password untuk data password 
         */
        public function prosesAuthAdmin($email,$password)
        {
            $sql = "SELECT * from user where user_email = '$email' AND user_password='$password' AND role_id ='A'";
            $query = koneksi()->query($sql);
            return $query->fetch_assoc();
        }

        /** Function prosesAuthPraktikan untuk cek data praktikan dari database praktikan
         *  @param $npm untuk data npm
         *  @param $password untuk data password 
         */
        public function prosesAuthPelanggan($email,$password)
        {
            $sql = "SELECT * from user where user_email = '$email' AND user_password='$password' and role_id ='B'";
            $query = koneksi()->query($sql);
            return $query->fetch_assoc();
        }

        /**
         * function prosesStorePraktikan berfungsi menambah data ke database
         * @param String $nama berisi data nama
         * @param String $npm berisi data npm
         * @param String $no_hp berisi data no_hp
         * @param String $password berisi data password
         */
        public function prosesStorePelanggan($nama, $alamat, $email, $password, $no_telp)
        {
            $sql = "INSERT into user(role_id,user_nama,user_alamat,user_email,user_password,user_notelp) 
            VALUE('B','$nama', '$alamat', '$email', '$password','$no_telp')";
            return koneksi()->query($sql);
        }
    }