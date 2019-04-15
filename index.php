<?php

$file = 'temp.png';
$time = 300; //seconds 
if (!file_exists($file)) {
    echo 'file does not exist';
} else {
    if (time() - filemtime($file) <= $time) {
        //atualizado
//        echo 'file last changed under 5 mins ago';
    } else {
        //desatualizado
//        echo 'file last changed more thanC 5 mins ago';


        $url = 'https://iframe-memoria.rnp.br/ceo/trafego/panorama.php?img=rnp.png';

        $im = imagecreatefrompng($url);
        $cropped = imagecrop($im, array(
            'x' => 678,
            'y' => 0,
            'width' => 200,
            'height' => 250
                ))
        ;
        if ($cropped == false) {
            echo 'error';
        } else {
            imagepng($cropped, $file);
            imagedestroy($cropped);
        }
    }
}


unset($im);
$image = imagecreatefrompng($file);

?>
<img src="<?php echo $file;?>">
<br>
Fibra RR > VEN: <?php 

if(imagecolorat($image, 137, 133) ==0 && imagecolorat($image, 155, 110)==0){
    $status = 'Rompida Totalmente!';
    $style = "color: white;background-color: red;";
}else{
   if(imagecolorat($image, 137, 133) ==0 xor imagecolorat($image, 155, 110)==0 ){
    $status = 'Parcialmente Rompida !';   
    $style = "color: white;background-color: red;";
   } else {
        $status = 'Funcionando Normalmente!';   
        $style = "color: white;background-color: green;";
   }
}  

?>
<b style="  <?php echo $style;?>    ">
    <?php echo $status;?>    
</b>
<br>
Fibra RR > AM: <?php 

if(imagecolorat($image, 93, 175) ==0 && imagecolorat($image, 67, 198)==0){
    $status = 'Rompida Totalmente!';
    $style = "color: white;background-color: red;";
}else{
   if(imagecolorat($image, 93, 175) ==0 xor imagecolorat($image, 67, 198)==0 ){
    $status = 'Parcialmente Rompida !';   
    $style = "color: white;background-color: red;";
   } else {
        $status = 'Funcionando Normalmente!';   
        $style = "color: white;background-color: green;";
   }
}  

?>
<b style="  <?php echo $style;?>    ">
    <?php echo $status;?>    
</b>
<br>

