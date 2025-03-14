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
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');
    header('Connection: keep-alive');
    header('X-Accel-Buffering: no'); // Disable buffering for Nginx

    ignore_user_abort(true); // Keep the connection alive even if the user disconnects
    set_time_limit(0); // Prevent PHP timeout
    if (ob_get_level() == 0) ob_start(); // Ensure output buffering is enabled   
    $startTime = time();
    $codes = [];

    for ($i = 0; $i < 150; $i++) { // Generate 150 random codes
        $codes[] = str_pad(random_int(0, 9999999999), 10, "0", STR_PAD_LEFT);
    }
    
    $index = 0;
    while (true) {
        if ((time() - $startTime) > 300 || $index >= count($codes)) { // Cloudflare allows up to 100 seconds, refresh before timeout
            break;
        }
        
        $code = $codes[$index++];
        echo "data: " . json_encode(["code" => $code]) . "\n\n";
        ob_end_flush();
        flush();
        sleep(2);
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
