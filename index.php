<?php
/**
 * Plugin Name: QR Code Stream
 * Description: Displays a 10-digit code and QR code that updates every 2 seconds using SSE.
 * Version: 1.0
 * Author: John Doe
 */

if (!defined('ABSPATH')) {
    exit;
}

// Register AJAX endpoint for SSE
define('QR_CODE_SSE_URL', plugin_dir_url(__FILE__));

function qr_code_stream_sse() {
    header("X-Accel-Buffering: no");
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');
    header('Connection: keep-alive');
    
    while (true) {
        $code = str_pad(random_int(0, 9999999999), 10, "0", STR_PAD_LEFT);
        echo "data: " . json_encode(["code" => $code]) . "\n\n";
        ob_flush();
        flush();
        usleep(2000000); // Add a delay of 2 seconds
    }
    exit;
}
add_action('wp_ajax_nopriv_qr_code_sse', 'qr_code_stream_sse');
add_action('wp_ajax_qr_code_sse', 'qr_code_stream_sse');

// Enqueue scripts
function qr_code_stream_enqueue_scripts() {
    wp_enqueue_script('qr-code-generator', 'https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js', [], null, true);
    wp_enqueue_script('qr-code-stream', QR_CODE_SSE_URL . 'qr-code-stream.js', ['jquery'], '1.0', true);
    wp_localize_script('qr-code-stream', 'qrCodeStream', [
        'sseUrl' => admin_url('admin-ajax.php?action=qr_code_sse')
    ]);
}
add_action('wp_enqueue_scripts', 'qr_code_stream_enqueue_scripts');

// Shortcode output
function qr_code_stream_shortcode() {
    return '
        <div id="qr-code-container">
            <h2>Code: <span id="qr-code-text">Loading...</span></h2>
            <div id="qr-code"></div>
        </div>';
}
add_shortcode('qr_code_stream', 'qr_code_stream_shortcode');
