<?php

class Transfer
{
    /** @var array<TransferEvent> */
    private $events = [];
    private TransferDirection $direction;
    private TransferState $state;

    public function __construct($events, $direction)
    {
        $this->events = $events;
        $this->direction = $direction;
        $this->state = TransferState::DRAFT;
    }

    // TODO : implement nextReminder calculation
    public function nextReminder()
    {
        if ($this->direction == TransferDirection::OUTGOING) {
            return null;
        }

        if ($this->state == TransferState::CLOSED) {
            return null;
        }

        if (in_array($this->state, TransferState::inCompanyPending) ) {
            return null;
        }

        

        return new Datetime();
    }

    public function addEvent(TransferEvent $ev)
    {
        $events[] = $ev;
    }

    public function setState(TransferState $state)
    {
        $this->state = $state;
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

    public const inCompanyPending = [self::DRAFT, self::DEMAND_REJECTED, self::VOUCHER_REVIEW];
    public const outCompanyPending = [self::DEMAND_REVIEW, self::DEMAND_ACCEPTED];
}