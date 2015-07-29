<?php namespace Craft;

class CreditCard_CardService extends BaseApplicationComponent
{
    public function validateCard(CreditCard_CardModel $card)
    {
        $card->validate();
        return $card;
    }
}
