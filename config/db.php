<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;port=5432;dbname=testproject',
    'username' => 'postgres',
    'password' => '12345',
    'charset' => 'utf8',
    'schemaMap' => [
        'pgsql'=> [
          'class'=>'yii\db\pgsql\Schema',
          'defaultSchema' => 'public' //specify your schema here
        ]
      ],

    // 'class' => 'yii\db\Connection',
    // 'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    // 'username' => 'root',
    // 'password' => '',
    // 'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
