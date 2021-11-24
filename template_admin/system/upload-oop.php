<?php

include_once 'func_web.php';

class ClassUpload extends fitur {

    public function upFoto($tabel,$nama,$size,$asal,$format,$id) {
        $width_size = 130;
        if ($format=="jpg" OR $format=="jpeg") {
            move_uploaded_file($asal, "../../images/db/$tabel/".$nama);
            $asli    ="../../images/db/$tabel/".$nama;
            $nama_baru    =$nama.$nama;
            $gambar_asli    = imagecreatefromjpeg ($asli);
            $lebar_asli      = imageSX($gambar_asli);
            $tinggi_asli     = imageSY($gambar_asli);
            $pembagi         = $lebar_asli / $width_size;
            $lebar_baru     = $lebar_asli/$pembagi;
            $tinggi_baru     = $tinggi_asli/$pembagi;
  
            $img = imagecreatetruecolor($lebar_baru, $tinggi_baru);
            imagecopyresampled($img, $gambar_asli, 0, 0, 0, 0, $lebar_baru, $tinggi_baru, $lebar_asli, $tinggi_asli);
            imagejpeg($img, $asli . $nama);
            imagedestroy($gambar_asli);
            imagedestroy($img);
            
            
            $insert = $this->update($tabel,['img'=>$nama,'img_resize'=>$nama_baru],$id);
            if($insert){
                return true;
            }
            else {
                // echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
                return false;
            }
        }
        
        else if ($format=="png") {
            move_uploaded_file($asal, "../../images/db/$tabel/".$nama);
            $asli    ="../../images/db/$tabel/".$nama;
            $nama_baru    =$nama.$nama;
            $gambar_asli      = imagecreatefrompng ($asli);
            $lebar_asli     = imageSX($gambar_asli);
            $tinggi_asli     = imageSY($gambar_asli);
            $pembagi         = $lebar_asli / $width_size;
            $lebar_baru     = $lebar_asli/$pembagi ;
            $tinggi_baru     = $tinggi_asli/$pembagi ;
  
            $img = imagecreatetruecolor($lebar_baru, $tinggi_baru);
            imagecopyresampled($img, $gambar_asli, 0, 0, 0, 0, $lebar_baru, $tinggi_baru, $lebar_asli, $tinggi_asli);
            imagejpeg($img, $asli . $nama);
            imagedestroy($gambar_asli);
            imagedestroy($img);
            
            $insert = $this->update($tabel,['img'=>$nama,'img_resize'=>$nama_baru],$id);
            if($insert){
                return true;
            }
            else {
                // echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
                return false;
            }
        }

        else{
            ?>
                   <script language="JavaScript">
                       alert('Oops! Upload and resize image gagal ...');
                    //    document.location='./';
                   </script>
           <?php
        }

    }

}
?>