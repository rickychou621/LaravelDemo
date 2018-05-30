<?php
namespace App\Repositories\Ricky;

use App\Model\Ricky\Message;

class MessageRepository
{
    protected $oMessage;

    public function __construct(Message $oMessage)
    {
        $this->oMessage = $oMessage;
    }

    public function getMessageData()
    {
        return $this->oMessage
            ->orderBy('created_at', 'desc')
            ->get()->toArray();
    }

    public function addMessageData($_aAddData)
    {
        return $this->oMessage->insertGetId($_aAddData);
    }

    public function delMessageData($_iID)
    {
        $this->oMessage->where('id', $_iID)->delete();
    }
}

