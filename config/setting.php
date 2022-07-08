<?php
return [


  /*
  |--------------------------------------------------------------------------
  | Limit Paginate Each Page
  |--------------------------------------------------------------------------
  */
    'LimitPaginate' => env('LIMIT_PAGINATE', 20),

  /*
  |--------------------------------------------------------------------------
  | Image
  |--------------------------------------------------------------------------
  | Size Validation 2048KB For each image
  | Allow Extensions For Image [JPEG,PNG,JPG,GIF,SVG,ETC]
  |
  */
    'image' => [
        'size'  =>   '2048',
        'allow_extensions'  => 'jpeg,png,jpg,gif,svg',
    ],

  /*
  |--------------------------------------------------------------------------
  | Video
  |--------------------------------------------------------------------------
  | Size Validation 10MB For each Video
  | Allow Extensions For Video [AVI,MPEG,ETC]
  |
  */
    'video' => [
        'size' => '2048',
        'allow_extensions' => 'video/avi,video/mpeg,video/quicktime',
    ],


 /*
 |--------------------------------------------------------------------------
 | Document
 |--------------------------------------------------------------------------
 | Size Validation 10MB For each Document
 | Allow Extensions For Document [PDF,DOCX,ETC]
 |
 */

    'document'  => [
        'size'  => '10240',
        'allow_extensions'  => 'pdf,docx',
    ],

];

