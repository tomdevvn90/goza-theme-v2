<?php

function goza_generate_styles_theme()
{

    global $wp_filesystem;

    if (empty($wp_filesystem)) {
        require_once ABSPATH . '/wp-admin/includes/file.php';
        WP_Filesystem();
    }

    /*Generate custom css*/
    $general_css = '';
    $general_css .= goza_theme_options_styles();

    /*Create dir or update*/
    $upload_dir = wp_upload_dir();

    if (!$wp_filesystem->is_dir($upload_dir['basedir'] . '/styles_uploads')) {
        wp_mkdir_p($upload_dir['basedir'] . '/styles_uploads');
    }

    $general_style_file = $upload_dir['basedir'] . '/styles_uploads/variable-css.css';

    /*Update V*/
    $current_v = get_option('general_styles_version', 1) + 1;
    update_option('general_styles_version', $current_v);

    $wp_filesystem->put_contents($general_style_file, $general_css, FS_CHMOD_FILE);
}

function render_custom_css($var_styles)
{
    $custom_css = ":root {";
    foreach ($var_styles as $key => $value) {
        if (isset($value) && !empty($value)) {
            $custom_css .= $key . " : " . $value . ";";
        }
    }
    $custom_css .= "}";
    return $custom_css;
}


function goza_theme_options_styles()
{
    $custom_css = '';

    //typo body
    $typography_body = __get_field('typography_body', 'option');
    $body_font_family = isset($typography_body['body_font_family']) ? '"' . $typography_body['body_font_family'] . '", sans-serif' : '"Poppins", sans-serif';
    $body_font_weight = isset($typography_body['body_font_weight']) ? $typography_body['body_font_weight'] : '400';
    $body_font_size = isset($typography_body['body_font_size']) ? $typography_body['body_font_size'] : '16px';
    $body_line_height = isset($typography_body['body_line_height']) ? $typography_body['body_line_height'] : '1.625';
    $body_letter_spacing = isset($typography_body['body_letter_spacing']) ? $typography_body['body_letter_spacing'] : 'normal';
    $body_color = isset($typography_body['body_color']) ? $typography_body['body_color'] : '#666';

    //type heading
    $typography_heading = __get_field('typography_heading', 'option');
    $heading_font_family = isset($typography_heading['heading_font_family']) ? '"' . $typography_heading['heading_font_family'] . '", sans-serif' : '"Poppins", sans-serif';
    $heading_font_weight = isset($typography_heading['heading_font_weight']) ? $typography_heading['heading_font_weight'] : '700';
    $heading_font_style = isset($typography_heading['heading_font_style']) ? $typography_heading['heading_font_style'] : 'normal';
    $heading_letter_spacing = isset($typography_heading['heading_letter_spacing']) ? $typography_heading['heading_letter_spacing'] : '1.1';
    $heading_color = isset($typography_heading['heading_color']) ? $typography_heading['heading_color'] : '#333';

    $h1_font_style = __get_field('h1_font_style', 'option');
    $h1_font_size = isset($h1_font_style['font_size']) ? $h1_font_style['font_size'] : '55px';
    $h1_line_height = isset($h1_font_style['line_height']) ? $h1_font_style['line_height'] : '1.18';

    $h2_font_style = __get_field('h2_font_style', 'option');
    $h2_font_size = isset($h2_font_style['font_size']) ? $h2_font_style['font_size'] : '40px';
    $h2_line_height = isset($h2_font_style['line_height']) ? $h2_font_style['line_height'] : '1.4';

    $h3_font_style = __get_field('h3_font_style', 'option');
    $h3_font_size = isset($h3_font_style['font_size']) ? $h3_font_style['font_size'] : '36px';
    $h3_line_height = isset($h3_font_style['line_height']) ? $h3_font_style['line_height'] : '1.3';

    $h4_font_style = __get_field('h4_font_style', 'option');
    $h4_font_size = isset($h4_font_style['font_size']) ? $h4_font_style['font_size'] : '28px';
    $h4_line_height = isset($h4_font_style['line_height']) ? $h4_font_style['line_height'] : '1.23';

    $h5_font_style = __get_field('h5_font_style', 'option');
    $h5_font_size = isset($h5_font_style['font_size']) ? $h5_font_style['font_size'] : '24px';
    $h5_line_height = isset($h5_font_style['line_height']) ? $h5_font_style['line_height'] : '1.2';

    $h6_font_style = __get_field('h6_font_style', 'option');
    $h6_font_size = isset($h6_font_style['font_size']) ? $h6_font_style['font_size'] : '20px';
    $h6_line_height = isset($h6_font_style['line_height']) ? $h6_font_style['line_height'] : '1.2';

    //var color
    $link_op = __get_field('goza_link_color_op', 'option');
    $link_color = isset($link_op['link_color']) ? $link_op['link_color'] : '#d41b65';
    $link_hover_color = isset($link_op['link_hover_color']) ? $link_op['link_hover_color'] : '#dd548b';

    //preloader
    $enable_preloader = __get_field('goza_enable_preloader', 'option');
    if ($enable_preloader) {
        $preloader_color  = __get_field('goza_preloader_color', 'option');
    }

    //header color
    $header_color_op = __get_field('goza_header_color_op', 'option');
    $header_bg_color = isset($header_color_op['goza_header_bg_color']) ? $header_color_op['goza_header_bg_color'] : '#FFF';
    $header_txt_color = isset($header_color_op['goza_header_txt_color']) ? $header_color_op['goza_header_txt_color'] : 'rgb(40,40,40)';
    $header_bg_menu_color = isset($header_color_op['goza_bg_menu']) ? $header_color_op['goza_bg_menu'] : '#213e8c';

    //footer color
    $footer_color_op = __get_field('goza_ft_color_op', 'option');
    $footer_heading_color = isset($footer_color_op['goza_ft_heading_color']) ? $footer_color_op['goza_ft_heading_color'] : '#FFF';
    $footer_text_color = isset($footer_color_op['goza_ft_txt_color']) ? $footer_color_op['goza_ft_txt_color'] : 'rgb(196,196,196)';
    $footer_bg_color = isset($footer_color_op['goza_ft_bg_color']) ? $footer_color_op['goza_ft_bg_color'] : 'rgb(10,10,10)';
    $socket_bg_color = isset($footer_color_op['goza_socket_bg_color']) ? $footer_color_op['goza_socket_bg_color'] : 'rgb(48,54,204)';
    $socket_txt_color = isset($footer_color_op['goza_socket_txt_color']) ? $footer_color_op['goza_socket_txt_color'] : '#FFF';

    //topbar color
    $topbar_color_op = __get_field('goza_topbar_color_op', 'option');
    $topbar_bg_color = isset($topbar_color_op['goza_topbar_bg_color']) ? $topbar_color_op['goza_topbar_bg_color'] : '#FFF';
    $topbar_text_color = isset($topbar_color_op['goza_topbar_text_color']) ? $topbar_color_op['goza_topbar_text_color'] : '#d41b65';
    $goza_topbar_icon_color = isset($topbar_color_op['goza_topbar_icon_color']) ? $topbar_color_op['goza_topbar_icon_color'] : '#FFF';

    $var_styles = [
        "--body-family" => $body_font_family,
        "--body-font-weight" => $body_font_weight,
        "--body-font-size" => $body_font_size,
        "--body-line-height" => $body_line_height,
        "--body-letter-spacing" => $body_letter_spacing,
        "--body-color" => $body_color,
        "--heading-family" => $heading_font_family,
        "--heading-font-weight" => $heading_font_weight,
        "--heading-font-style" => $heading_font_style,
        "--heading-letter-spacing" => $heading_letter_spacing,
        "--heading-color" => $heading_color,
        "--h1-font-size" => $h1_font_size,
        "--h1-line-height" => $h1_line_height,
        "--h2-font-size" => $h2_font_size,
        "--h2-line-height" => $h2_line_height,
        "--h3-font-size" => $h3_font_size,
        "--h3-line-height" => $h3_line_height,
        "--h4-font-size" => $h4_font_size,
        "--h4-line-height" => $h4_line_height,
        "--h5-font-size" => $h5_font_size,
        "--h5-line-height" => $h5_line_height,
        "--h6-font-size" => $h6_font_size,
        "--h6-line-height" => $h6_line_height,
        "--link-color" => $link_color,
        "--link-color-hover" => $link_hover_color,
        "--preloader-color" => $preloader_color,
        "--header-bg-color" => $header_bg_color,
        "--header-text-color" => $header_txt_color,
        "--header-bg-menu-color" => $header_bg_menu_color,
        "--footer-heading-color" => $footer_heading_color,
        "--footer-text-color" => $footer_text_color,
        "--footer-bg-color" => $footer_bg_color,
        "--socket-text-color" => $socket_txt_color,
        "--socket-bg-color" => $socket_bg_color,
        "--topbar-text-color" => $topbar_text_color,
        "--topbar-bg-color" => $topbar_bg_color,
        "--topbar-icon-color" => $goza_topbar_icon_color,
    ];

    $custom_css .= render_custom_css($var_styles);

    return $custom_css;
}
