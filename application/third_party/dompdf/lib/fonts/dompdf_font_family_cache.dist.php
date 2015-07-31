<?php

return  [
  'sans-serif' =>  [
    'normal'      => DOMPDF_FONT_DIR.'Helvetica',
    'bold'        => DOMPDF_FONT_DIR.'Helvetica-Bold',
    'italic'      => DOMPDF_FONT_DIR.'Helvetica-Oblique',
    'bold_italic' => DOMPDF_FONT_DIR.'Helvetica-BoldOblique',
  ],
  'times' =>  [
    'normal'      => DOMPDF_FONT_DIR.'Times-Roman',
    'bold'        => DOMPDF_FONT_DIR.'Times-Bold',
    'italic'      => DOMPDF_FONT_DIR.'Times-Italic',
    'bold_italic' => DOMPDF_FONT_DIR.'Times-BoldItalic',
  ],
  'times-roman' =>  [
    'normal'      => DOMPDF_FONT_DIR.'Times-Roman',
    'bold'        => DOMPDF_FONT_DIR.'Times-Bold',
    'italic'      => DOMPDF_FONT_DIR.'Times-Italic',
    'bold_italic' => DOMPDF_FONT_DIR.'Times-BoldItalic',
  ],
  'courier' =>  [
    'normal'      => DOMPDF_FONT_DIR.'Courier',
    'bold'        => DOMPDF_FONT_DIR.'Courier-Bold',
    'italic'      => DOMPDF_FONT_DIR.'Courier-Oblique',
    'bold_italic' => DOMPDF_FONT_DIR.'Courier-BoldOblique',
  ],
  'helvetica' =>  [
    'normal'      => DOMPDF_FONT_DIR.'Helvetica',
    'bold'        => DOMPDF_FONT_DIR.'Helvetica-Bold',
    'italic'      => DOMPDF_FONT_DIR.'Helvetica-Oblique',
    'bold_italic' => DOMPDF_FONT_DIR.'Helvetica-BoldOblique',
  ],
  'zapfdingbats' =>  [
    'normal'      => DOMPDF_FONT_DIR.'ZapfDingbats',
    'bold'        => DOMPDF_FONT_DIR.'ZapfDingbats',
    'italic'      => DOMPDF_FONT_DIR.'ZapfDingbats',
    'bold_italic' => DOMPDF_FONT_DIR.'ZapfDingbats',
  ],
  'symbol' =>  [
    'normal'      => DOMPDF_FONT_DIR.'Symbol',
    'bold'        => DOMPDF_FONT_DIR.'Symbol',
    'italic'      => DOMPDF_FONT_DIR.'Symbol',
    'bold_italic' => DOMPDF_FONT_DIR.'Symbol',
  ],
  'serif' =>  [
    'normal'      => DOMPDF_FONT_DIR.'Times-Roman',
    'bold'        => DOMPDF_FONT_DIR.'Times-Bold',
    'italic'      => DOMPDF_FONT_DIR.'Times-Italic',
    'bold_italic' => DOMPDF_FONT_DIR.'Times-BoldItalic',
  ],
  'monospace' =>  [
    'normal'      => DOMPDF_FONT_DIR.'Courier',
    'bold'        => DOMPDF_FONT_DIR.'Courier-Bold',
    'italic'      => DOMPDF_FONT_DIR.'Courier-Oblique',
    'bold_italic' => DOMPDF_FONT_DIR.'Courier-BoldOblique',
  ],
  'fixed' =>  [
    'normal'      => DOMPDF_FONT_DIR.'Courier',
    'bold'        => DOMPDF_FONT_DIR.'Courier-Bold',
    'italic'      => DOMPDF_FONT_DIR.'Courier-Oblique',
    'bold_italic' => DOMPDF_FONT_DIR.'Courier-BoldOblique',
  ],
]

/* The proper way for web browser environment independent font handling in html/css is,
 * to defining a font search path ending in serif, sans-serif, or monospace, e.g.:
 * <style>body {font-family: Verdana,Arial,Helvetica,sans-serif;}</style>
 *
 * For more satisfying results on html files without proper font search path,
 * popular fonts which are candidates for further font aliases similar to
 * 'sans-serif' and 'helvetica' above might be:
 *
 * See
 * http://www.codestyle.org/css/font-family/index.shtml
 * http://mondaybynoon.com/2007/04/02/linux-font-equivalents-to-popular-web-typefaces/
 * C:\Windows\Fonts
 *
 * Times:
 * serif, times, times-roman, times, times new roman, georgia, garamond, ms reference serif,
 * palatino, palatino linotype, dejavu serif, freeserif, liberation serif, luxi serif, 
 * century schoolbook, new century schoolbook
 *
 * Helvetica:
 * sans-serif, helvetica, helvetica, microsoft sans serif, verdana, arial, tahoma, 
 * trebuchet ms, lucida sans, ms reference sans serif, lucida grande, freesans, 
 * liberation sans, dejavu sans, luxi sans, lucida
 *
 * Courier:
 * monospace, fixed, courier, courier new, lucida console, lucida sans typewriter, freeMono, 
 * fixed, terminal, dejavu sans mono, liberation mono, luxi mono
 */;
