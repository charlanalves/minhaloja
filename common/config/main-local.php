<?php
return [
    'homeUrl'=> ['caderno-edicoes'],
    'name' => 'IMPRENSA OFICIAL',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=minhaloja',
            'username' => 'root',
            'password' => '&jAQuqYNp5WBn49tc71K',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];
