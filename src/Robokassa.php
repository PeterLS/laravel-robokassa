<?php

namespace PeterLS\LaravelRobokassa;

use Lexty\Robokassa\Auth;
use Lexty\Robokassa\Payment;

class Robokassa {
    protected bool $testMode;
    protected string $shopId;
    protected string $hashAlgo;
    protected string $paymentPassword;
    protected string $validationPassword;
    protected string $resultUrl;
    protected string $successUrl;
    protected string $failUrl;

    protected Auth $auth;
    protected Payment $payment;

    public function __construct(array $config) {
        if (empty($config)) {
            throw new \RuntimeException('Config is not defined');
        }

        $this->testMode = (bool)$config['test_mode'];
        $this->shopId = (string)$config['shop_id'];
        $this->hashAlgo = (string)$config['hash_algorithm'];
        $this->paymentPassword = (string)$config['payment_password'];
        $this->validationPassword = (string)$config['validation_password'];
        $this->resultUrl = (string)$config['result_url'];
        $this->successUrl = (string)$config['success_url'];
        $this->failUrl = (string)$config['fail_url'];

        $this->auth = new Auth($this->shopId, $this->paymentPassword, $this->validationPassword, $this->testMode);
        $this->auth->setHashAlgo($this->hashAlgo);

        $this->payment = new Payment($this->auth);
    }

    /**
     * @return Payment
     */
    public function getPayment(): Payment {
        return $this->payment;
    }

    /**
     * @return Auth
     */
    public function getAuth(): Auth {
        return $this->auth;
    }

}
