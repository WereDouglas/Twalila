<?php

namespace App\Controller\Component;

use AfricasTalking\SDK\AfricasTalking;
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;

/**
 * Messaging component
 */
class MessagingComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function save ($contact, $content)
    {

        $messagesTable = TableRegistry::getTableLocator()->get('Messages');
        $message = $messagesTable->newEntity();

        $message->content = $content;
        $message->contact = $contact;
        $message->subject = 'SMS ';
        $message->type = 'SMS';
        $message->source = 'WILKEN';
        $message->sent = 'no';
        if ($messagesTable->save($message)) {
            // The $article entity contains the id now
            return true;
        }
        return false;

    }

    /**
     * @param $contact
     * @param $content
     * @param null $subject
     * @return bool
     */
    public function sms ($contact = null, $content = null, $subject = null)
    {
        $sent = false;
        $username = 'vugaco'; // use 'sandbox' for development in the test environment
        $apiKey = '253cc9e804715064b8ad0323d36e945e0513fa0bec58d0bb753efd02a2272f94'; // use your sandbox app API key for development in the test environment
        $AT = new AfricasTalking($username, $apiKey);
        $sms = $AT->sms();

        $messagesTable = TableRegistry::getTableLocator()->get('Messages');
        $message = $messagesTable->newEmptyEntity();
        $message->content = $content;
        $message->contact = $contact;
        $message->subject = $subject;
        $message->type = 'sms';
        $message->sent = 'no';

        $result = $sms->send([
            'to' => $contact,
            'message' => $content
        ]);

        if ($result['status'] == "success") {
            $data = $result['data'];
            $messageData = $data->SMSMessageData;
            $messageReply = $messageData->Message;
            $recipients = $messageData->Recipients;
            $message->messageid = $recipients[0]->messageId;
            $message->statuscode = $recipients[0]->statusCode;
            $message->cost = $recipients[0]->cost;
            $message->sent = 'yes';
            $sent = true;
        } else {
            $message->sent = 'no';
        }
        $messagesTable->Save($message);

        return $sent;
    }
}
