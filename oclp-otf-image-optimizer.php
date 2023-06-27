<?php
/**
 * Plugin Name: OCLP OTF Image Optimizer
 * Plugin URI: https://www.kurajin.com
 * Description: Plugin untuk merubah semua gambar di Landing Page WordPress menjadi format WebP dengan memanfaatkan layanan external CDN.  Fungsi utama: convert JPG/PNG ke WebP, Mengurangi beban server hosting untuk convert, CDN, Caching Gambar, membantu memperbaiki OCLP.  Plugin tidak berfungsi di localhost
 * Version: 1.0
 * Author: Akhyar
 * Author URI: https://www.kurajin.com/
 * Text Domain: oclp-otf
 */

 function krj_iwp_content_img( $filtered_image, $context, $attachment_id ) {
	
    // 	preg_match('/width="(\d+)/',$filtered_image, $intr_width);
        
        $find_pattern = array(
            '/src=["|\'](https:\/\/|http:\/\/)(.*)(?<!\.wp\.com)(\/.*?)["|\']/',
            '/srcset=["|\'](https:\/\/|http:\/\/)(.*)(?<!\.wp\.com)(\/.*?)["|\']/'
        );
            
        $replace_pattern = array(
            'src="//i0.wp.com/${2}${3}"',
            'srcset="//i0.wp.com/${2}${3}"'
        );
        
        return preg_replace($find_pattern, $replace_pattern, $filtered_image);
    
    }
    add_filter( 'wp_content_img_tag', 'krj_iwp_content_img', 10, 3 );