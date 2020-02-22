<?php

function fix_image_ratio($int_witdh, $str_image_url)
{
   $imageFile = $str_image_url;

   /* Set the width fixed at 200px; */
   $width = $int_witdh;

   /* Get the image info */
   $info = getimagesize($imageFile);

   /* Calculate aspect ratio by dividing height by width */
   $aspectRatio = $info[1] / $info[0];

   /* Keep the width fix at 100px, 
   but change the height according to the aspect ratio */
   $newHeight = (int) ($aspectRatio * $width) . "px";

   /* Use the 'newHeight' in the CSS height property below. */
   $width .= "px";

   return $newHeight;
}
