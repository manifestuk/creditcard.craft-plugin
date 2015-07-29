<?php namespace Craft;

class CreditCard_CardController extends BaseController
{
    public function actionValidate()
    {
        $this->requirePostRequest();
        craft()->userSession->requireAdmin();

        $card = CreditCard_CardModel::populateModel($this->getCardPostData());
        $card = craft()->creditCard_card->validateCard($card);

        if ($card->hasErrors()) {
            $message = Craft::t('Please correct the highlighted errors.');
            craft()->userSession->setError($message);
            craft()->urlManager->setRouteVariables(['card' => $card]);
        } else {
            $message = Craft::t('The credit card passed validation.');
            craft()->userSession->setNotice($message);
        }
    }

    protected function getCardPostData()
    {
        $cardData = [];
        $fields = ['name', 'number', 'type', 'expiryMonth', 'expiryYear', 'cvv'];

        foreach ($fields as $field) {
            $cardData[$field] = craft()->request->getPost($field);
        }

        return $cardData;
    }
}
