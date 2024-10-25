<?php

namespace NumberPrinterSystem;

trait PrintUtility {
    public function printMessage($message) {
        echo $message . PHP_EOL;
    }
}

abstract class NumberPrinter {
    protected $n;

    public function __construct($n) {
        $this->n = $n;
    }

    abstract public function printNumbers();
}

class CustomNumberPrinter extends NumberPrinter {
    use PrintUtility;

    private $year;

    public function __construct($n, $year) {
        parent::__construct($n);
        $this->year = $year;
    }

    public function printNumbers() {
        for ($i = 1; $i <= $this->n; $i++) {
            if ($i % 4 == 0 && $i % 6 == 0) {
                $this->printMessage("Pemrograman Website " . $this->year);
            } elseif ($i % 5 == 0) {
                $this->printMessage($this->year);
            } elseif ($i % 4 == 0) {
                $this->printMessage("Pemrograman");
            } elseif ($i % 6 == 0) {
                $this->printMessage("Website");
            } else {
                $this->printMessage($i);
            }
        }
    }

    public function __toString() {
        return "CustomNumberPrinter: Print numbers from 1 to " . $this->n . " for the year " . $this->year;
    }

    public static function getPositiveInteger($prompt) {
        do {
            $input = (int) readline($prompt);
            if ($input <= 0) {
                echo "Harap masukkan bilangan bulat positif.\n";
            }
        } while ($input <= 0);

        return $input;
    }
}

namespace Main;
use NumberPrinterSystem\CustomNumberPrinter;

$n = CustomNumberPrinter::getPositiveInteger("Masukkan bilangan bulat positif n: ");
$year = CustomNumberPrinter::getPositiveInteger("Masukkan tahun: ");

$printer = new CustomNumberPrinter($n, $year);
echo $printer . "\n\n"; 
$printer->printNumbers();

?>
