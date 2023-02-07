<?php

use PeterLS\LaravelRobokassa\Robokassa;
use Lexty\Robokassa\Payment;
use PHPUnit\Framework\TestCase;

class RobokassaTest extends TestCase {
    public function testCanBeCreatedFromValidEmailAddress(): void {
        $robokassa = new Robokassa;

        $robokassa->getPayment()->setId(1)->setCulture(Payment::CULTURE_RU)->setSum(105)
            ->setDescription('Payment for some goods');

        echo $robokassa->getPayment()->getPaymentUrl();
    }
}
