<?php 
if (!class_exists('CaptchaConfiguration')) { return; }

// BotDetect PHP Captcha configuration options

return [
  // Captcha configuration for example page
  'ExampleCaptcha' => [
    'UserInputID' => 'CaptchaCode',
    'ImageWidth' => 250,
    'ImageHeight' => 50,
    
  ],

  // Captcha configuration for login page
  'ContactCaptcha' => [
    'UserInputID' => 'CaptchaCode',
    'CodeLength' => CaptchaRandomization::GetRandomCodeLength(4, 6),
    'ImageStyle' => [
      ImageStyle::Radar,
      ImageStyle::Collage,
      ImageStyle::Fingerprints,
    ],
  ],

];