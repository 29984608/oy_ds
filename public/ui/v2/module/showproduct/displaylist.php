<?php
if(count($displaylist)>1) $paddingb=' slick-dotted';
$imgurlchoose=$lang_product_pagetype==1 || $metresclass->useragent('mobile');
$pro_imgurl=$imgurlchoose?"{$thumb_src}dir={$product[imgurl]}&x={$met_productdetail_x}&y={$met_productdetail_y}":$product[imgurl];
$product[size_default]="{$met_productdetail_x}x{$met_productdetail_y}";
if(!$product[imgsize]) $product[imgsize]=$product[size_default];
echo <<<EOT
-->
<div class='met-showproduct-list ui-default fngallery{$paddingb} cover text-xs-center' id='met-imgs-slick'><!--fngallery：启用lightGallery插件的类名-->
<!--
EOT;
if($displaylist){
    foreach($displaylist as $key=>$val){
        if(!$val[size]) $val[size]=$product[size_default];
        $val_imgurl=$imgurlchoose?"{$thumb_src}dir={$val[imgurl]}&x={$met_productdetail_x}&y={$met_productdetail_y}":$val[imgurl];
        $src=$key?'data-lazy':'src';
echo <<<EOT
-->
    <div class='slick-slide'>
    	<a href='{$val[imgurl]}' data-size='{$val[size]}' data-med='{$val[imgurl]}' data-med-size='{$val[size]}' class='lg-item-box' data-src='{$val[imgurl]}' data-exthumbimage='{$thumb_src}dir={$val[imgurl]}&x=60&y=60' data-sub-html='{$val[title]}'><!--类名lg-item-box之前为initPhotoSwipeFromDOM插件所用参数；之后为lightGallery插件所用参数，lg-item-box：lightGallery插件对应的类名-->
            <img {$src}='{$val_imgurl}' data-src='{$val_imgurl}' class='img-fluid' alt='{$val[title]}' />
        </a>
    </div>
<!--
EOT;
    }
}
echo <<<EOT
-->
</div>
<!--
EOT;
?>