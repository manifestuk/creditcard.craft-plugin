<?php namespace Craft;

use CValidator;

class CreditCard_NumberValidator extends CValidator
{
    protected function validateAttribute($object, $attribute)
    {
        $number = $object->$attribute;

        if ($number && ! $this->validateLuhn($number)) {
            $message = Craft::t('Invalid credit card number.');
            $this->addError($object, $attribute, $message);
        }
    }

    protected function validateLuhn($number)
    {
        $check = '';

        foreach (array_reverse(str_split($number)) as $index => $digit) {
            $check .= $index % 2 ? $digit * 2 : $digit;
        }

        return array_sum(str_split($check)) % 10 === 0;
    }
}
