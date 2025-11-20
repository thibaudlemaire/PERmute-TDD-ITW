<?php

use PHPUnit\Framework\TestCase;
 
class TransferTest extends TestCase
{
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testNoReminderIfOutgoing()
    {
        $transfer = new Transfer([], TransferDirection::OUTGOING);
        $this->assertNull($transfer->nextReminder());
    }

    public function testNoReminderIfTransferIsClosed()
    {
        $transfer = new Transfer([], TransferDirection::INCOMING);
        $transfer->setState(TransferState::CLOSED);
        $this->assertNull($transfer->nextReminder());
    }

    public function testNoReminderIfInCompanyIsPending()
    {
        $transfer = new Transfer([], TransferDirection::INCOMING);

        $transfer->setState(TransferState::DRAFT);
        $this->assertNull($transfer->nextReminder());
        
        $transfer->setState(TransferState::DEMAND_REJECTED);
        $this->assertNull($transfer->nextReminder());

        $transfer->setState(TransferState::VOUCHER_REVIEW);
        $this->assertNull($transfer->nextReminder());
    }

    public function testReminderAfter30Days()
    {
        $transfer = new Transfer([], TransferDirection::INCOMING);

        $transferDate = new DateTime("01/01/2024 10:00:00");
        $transferEvent = new TransferEvent($transferDate->format('Y-m-d H:i:s'), TransferEventType::EVT_PER_DEMAND_SENT);
        $transfer->addEvent($transferEvent);

        $this->assertTrue($transfer->nextReminder()->format('Y-m-d') == $transferDate->modify('+30 days')->format('Y-m-d'));
    }
}
