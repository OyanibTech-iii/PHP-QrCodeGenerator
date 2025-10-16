<?php
require_once 'vendor/autoload.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\SvgWriter;

// Set content type to JSON
header('Content-Type: application/json');

// Enable CORS if needed
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

try {
    // Check if request method is POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Only POST method is allowed');
    }

    // Get form data
    $text = $_POST['text'] ?? '';
    $size = (int)($_POST['size'] ?? 300);
    $format = $_POST['format'] ?? 'png';
    $foreground = $_POST['foreground'] ?? '#000000';
    $background = $_POST['background'] ?? '#ffffff';

    // Validate input
    if (empty($text)) {
        throw new Exception('Text or URL is required');
    }

    if ($size < 100 || $size > 1000) {
        throw new Exception('Size must be between 100 and 1000 pixels');
    }

    if (!in_array($format, ['svg'])) {
        throw new Exception('Invalid format. Only SVG format is supported (no GD extension required)');
    }

    // Validate colors (basic hex color validation)
    if (!preg_match('/^#[a-fA-F0-9]{6}$/', $foreground)) {
        $foreground = '#000000';
    }
    if (!preg_match('/^#[a-fA-F0-9]{6}$/', $background)) {
        $background = '#ffffff';
    }

    // Convert hex colors to RGB values for Color class
    $foregroundRgb = sscanf($foreground, "#%02x%02x%02x");
    $backgroundRgb = sscanf($background, "#%02x%02x%02x");
    
    $foregroundColor = new Color($foregroundRgb[0], $foregroundRgb[1], $foregroundRgb[2]);
    $backgroundColor = new Color($backgroundRgb[0], $backgroundRgb[1], $backgroundRgb[2]);

    // Create output directory if it doesn't exist
    $outputDir = 'generated_qr_codes';
    if (!is_dir($outputDir)) {
        mkdir($outputDir, 0755, true);
    }

    // Generate unique filename
    $filename = 'qr_' . uniqid() . '.' . $format;
    $filepath = $outputDir . '/' . $filename;

    // Use SVG writer (no GD extension required)
    $writer = new SvgWriter();

    // Build QR code using new Builder API
    $builder = new Builder(
        writer: $writer,
        writerOptions: [],
        validateResult: false,
        data: $text,
        encoding: new Encoding('UTF-8'),
        errorCorrectionLevel: ErrorCorrectionLevel::High,
        size: $size,
        margin: 10,
        roundBlockSizeMode: RoundBlockSizeMode::Margin,
        foregroundColor: $foregroundColor,
        backgroundColor: $backgroundColor
    );
    
    $result = $builder->build();

    // Save the QR code
    $result->saveToFile($filepath);

    // Return success response
    echo json_encode([
        'success' => true,
        'qr_code' => $filepath,
        'format' => $format,
        'size' => $size,
        'text' => $text
    ]);

} catch (Exception $e) {
    // Return error response
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>
