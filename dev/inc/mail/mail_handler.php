<?php 
require get_template_directory() . '/inc/mail/WP_mail_class.php';

$email = WP_Mail::init()
  ->to('joey@josephallendesign.com')
  ->subject('WP Mail is great')
//   ->attach(ABSPATH . 'wp-content/uploads/2018/6/image.png')
  ->template(get_template_directory() .'/inc/mail/mail_template.php', [
      'name' => 'Anthony Budd', 
      'location' => 'London',
      'skills' => [
          'PHP',
          'AWS',
          'DevOps'
      ] 
  ])
  ->send();