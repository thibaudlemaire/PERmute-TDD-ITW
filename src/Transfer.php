<?php

class Transfer
{
    /** @var array<TransferEvent> */
    private $events = [];
    private TransferDirection $direction;

    public function __construct($events, $direction)
    {
        $this->events = $events;
        $this->direction = $direction;
    }

    // TODO : implement nextReminder calculation
    
}

enum TransferDirection: string
{
    case INCOMING = 'INCOMING';
    case OUTGOING = 'OUTGOING';
}

enum TransferState: string
{
    case DRAFT = 'DRAFT';
    case DEMAND_REVIEW = 'DEMAND_REVIEW';
    case DEMAND_REJECTED = 'DEMAND_REJECTED';
    case DEMAND_ACCEPTED = 'DEMAND_ACCEPTED';
    case VOUCHER_REVIEW = 'VOUCHER_REVIEW';
    case CLOSED = 'CLOSED';
}