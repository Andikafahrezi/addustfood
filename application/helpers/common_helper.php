<?php

    function resizeImage($source_path, $new_path, $width, $height) {

        $CI =& get_instance();

        $config['image_library'] = 'gd2';
        $config['source_image'] = $source_path;
        $config['new_image'] = $new_path;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']         = $width;
        $config['height']       = $height;
        $config['thumb_marker']      = '';
        $CI->load->library('image_lib', $config);
        $CI->image_lib->resize();
        $CI->image_lib->clear();
    }

?>