<?php
return [
  /**
   * Control if the seeder should create a user per role while seeding the data.
   */
  'create_users' => true,
  /**
   * Control if all the laratrust tables should be truncated before running the seeder.
   */
  'truncate_tables' => true,
  'roles_structure' => [
    'admin' => [
      'posts' => 'c,r,u,d',
      'posts_categories' => 'c,r,u,d',
      'posts_comments' => 'r,d',
      'users' => 'c,r,u,d'
    ],
    'author' => [
      'posts' => 'c,r,u,d',
      'posts_comments' => 'c,r,u,d',
      'users' => 'r,u'
    ],
  ],
  'permissions_map' => [
    'c' => 'create',
    'r' => 'read',
    'u' => 'update',
    'd' => 'delete'
  ]
];
