<?php

namespace PeterLS\LaravelRobokassa;

class Facade extends \Illuminate\Support\Facades\Facade {
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor(): string {
        return 'robokassa';
    }
}
