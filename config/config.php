<?php

return [
    /**
     * Тестовый режим
     */
    'test_mode' => env('ROBOKASSA_TEST_MODE', TRUE),

    /**
     * Идентификатор магазина
     */
    'shop_id' => env('ROBOKASSA_SHOP_ID'),

    /**
     * Алгоритм расчёта хэша
     */
    'hash_algorithm' => env('ROBOKASSA_HASH_ALGORITHM', 'md5'),

    /**
     * Пароль #1
     */
    'payment_password' => env('ROBOKASSA_PAYMENT_PASSWORD', ''),

    /**
     * Пароль #2
     */
    'validation_password' => env('ROBOKASSA_VALIDATION_PASSWORD', ''),

    /**
     * ResultURL
     */
    'result_url' => env('ROBOKASSA_RESULT_URL', ''),

    /**
     * SuccessURL
     */
    'success_url' => env('ROBOKASSA_SUCCESS_URL', ''),

    /**
     * FailURL
     */
    'fail_url' => env('ROBOKASSA_FAIL_URL', ''),
];