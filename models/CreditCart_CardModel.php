<?php namespace Craft;

class CreditCart_CardModel extends BaseModel
{
    protected function defineAttributes()
    {
        $currentYear = date('y');

        return [
            'name' => [
                'type'     => AttributeType::String,
                'required' => true,
            ],
            'number' => [
                'type'     => AttributeType::Number,
                'required' => true,
            ],
            'type' => [
                'type'     => AttributeType::Enum,
                'required' => true,
                'values'   => ['amex', 'mastercard', 'visa'],
            ],
            'expiryMonth' => [
                'type'     => AttributeType::Number,
                'required' => true,
                'min'      => 1,
                'max'      => 12,
            ],
            'expiryYear' => [
                'type'     => AttributeType::Number,
                'required' => true,
                'min'      => $currentYear,
            ],
            'cvv' => [
                'type'     => AttributeType::String,
                'required' => true,
                'pattern'  => '/^[0-9]{2,3}$/',
            ],
        ];
    }

    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['number', 'Craft\CreditCard_NumberValidator'];

        return $rules;
    }
}
