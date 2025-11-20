<?php

class Transfer
{
    private TransferDirection $direction;
    private TransferState $state;
    /** @var array<TransferEvent> */
    private $events = [];

    public function __construct($direction)
    {
        $this->direction = $direction;
        $this->state = TransferState::DRAFT;
        $this->events = [];
    }
    
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