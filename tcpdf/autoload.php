<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'datamatrix' => '/include/barcodes/datamatrix.php',
                'pdf417' => '/include/barcodes/pdf417.php',
                'qrcode' => '/include/barcodes/qrcode.php',
                'tcpdf' => '/tcpdf.php',
                'tcpdf2dbarcode' => '/tcpdf_barcodes_2d.php',
                'tcpdf_colors' => '/include/tcpdf_colors.php',
                'tcpdf_filters' => '/include/tcpdf_filters.php',
                'tcpdf_font_data' => '/include/tcpdf_font_data.php',
                'tcpdf_fonts' => '/include/tcpdf_fonts.php',
                'tcpdf_images' => '/include/tcpdf_images.php',
                'tcpdf_import' => '/tcpdf_import.php',
                'tcpdf_parser' => '/tcpdf_parser.php',
                'tcpdf_static' => '/include/tcpdf_static.php',
                'tcpdfbarcode' => '/tcpdf_barcodes_1d.php'
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    },
    true,
    false
);
// @codeCoverageIgnoreEnd
