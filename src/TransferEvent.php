use DateTime;

<?php

class TransferEvent
{
    private DateTime $date;
    private TransferEventType $type;

    public function __construct(string $dateString, TransferEventType $type)
    {
        $this->date = new DateTime($dateString);
        $this->type = $type;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getType(): TransferEventType
    {
        return $this->type;
    }
}

enum TransferEventType: string
{
    case EVT_PER_DEMAND_SENT = 'EVT_PER_DEMAND_SENT';
    case EVT_PER_DEMAND_REJECTED = 'EVT_PER_DEMAND_REJECTED';
    case EVT_PER_DEMAND_ACCEPTED = 'EVT_PER_DEMAND_ACCEPTED';
    case EVT_PER_VOUCHER_SENT = 'EVT_PER_VOUCHER_SENT';
    case EVT_PER_VOUCHER_REJECTED = 'EVT_PER_VOUCHER_REJECTED';
    case EVT_PER_VOUCHER_ACCEPTED = 'EVT_PER_VOUCHER_ACCEPTED';
    case EVT_PER_REMINDER_SENT = 'EVT_PER_REMINDER_SENT';
}