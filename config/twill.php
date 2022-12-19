<?php

return [
    'admin_app_url' => env('ADMIN_APP_URL', env('APP_URL')),
    'admin_app_path' => env('ADMIN_APP_PATH', '/admin'),
    'locale' => 'ru',
    'available_user_locales' => [
        'en',
        'ru',
    ],
    'enabled' => [
        'users-management' => true,
        'media-library' => true,
        'file-library' => true,
        'block-editor' => true,
        'buckets' => true,
        'users-image' => false,
        'settings' => true,
        'dashboard' => true,
        'search' => true,
        'users-description' => true,
        'activitylog' => true,
        'users-2fa' => false,
        'users-oauth' => false,
    ],
    'media_library' => [
        'disk' => 'public',
        'endpoint_type' => env('MEDIA_LIBRARY_ENDPOINT_TYPE', 'local'),
        'cascade_delete' => env('MEDIA_LIBRARY_CASCADE_DELETE', false),
        'local_path' => env('MEDIA_LIBRARY_LOCAL_PATH', 'uploads/frontend/media'),
        'image_service' => env('MEDIA_LIBRARY_IMAGE_SERVICE', 'A17\Twill\Services\MediaLibrary\Local'),
        'acl' => env('MEDIA_LIBRARY_ACL', 'private'),
        'filesize_limit' => env('MEDIA_LIBRARY_FILESIZE_LIMIT', 50),
        'allowed_extensions' => ['jpg', 'png', 'jpeg'],
    ],
];
