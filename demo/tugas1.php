<?php

namespace TicketSystem;

trait DateUtilities {
    public function getFormattedDate($date) {
        return date("d-m-Y", strtotime($date));
    }
}

abstract class Ticket {
    protected $id;
    protected $price;

    public function __construct($id, $price) {
        $this->id = $id;
        $this->price = $price;
    }

    abstract public function calculateTotalPrice();

    public function __toString() {
        return "Ticket ID: $this->id, Price: $this->price";
    }
}

class GeneralTicket extends Ticket {
    use DateUtilities;

    private $discount;

    public function __construct($id, $price, $discount) {
        parent::__construct($id, $price);
        $this->discount = $discount;
    }

    public function calculateTotalPrice() {
        return $this->price - ($this->price * $this->discount / 100);
    }

    public function getDiscount() {
        return $this->discount;
    }
}

class VipTicket extends Ticket {
    use DateUtilities;

    private $additionalFee;

    public function __construct($id, $price, $additionalFee) {
        parent::__construct($id, $price);
        $this->additionalFee = $additionalFee;
    }

    public function calculateTotalPrice() {
        return $this->price + $this->additionalFee;
    }

    public function getAdditionalFee() {
        return $this->additionalFee;
    }
}

namespace Main;
use TicketSystem\GeneralTicket;
use TicketSystem\VipTicket;

$generalTicket = new GeneralTicket("GT123", 100, 10);
echo "General Ticket Details: " . $generalTicket . "\n";
echo "Total Price (after discount): " . $generalTicket->calculateTotalPrice() . "\n\n";

$vipTicket = new VipTicket("VT456", 150, 20);
echo "VIP Ticket Details: " . $vipTicket . "\n";
echo "Total Price (with additional fee): " . $vipTicket->calculateTotalPrice() . "\n";

?>
