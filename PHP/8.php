<?php
class Car
{
    private $brand;
    private $model;
    private $year;
    private $owner = null;

    public function __construct($brand, $model, $year)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function isOldtimer()
    {
        $currentYear = date("Y");
        if ($currentYear - $this->year >= 40) {
            return "Dit is een oldtimer, je hoeft geen wegenbelasting te betalen.";
        } else {
            return "Dit is GEEN oldtimer.";
        }
    }
}
$car1 = new Car("Merk", "Model", 1963);
$car2 = new Car("Merk", "Model", 1999);
$car3 = new Car("Merk", "Model", 2002);

$car1->setOwner("Eigenaar 1");
$car2->setOwner("Eigenaar 2");
$car3->setOwner("Eigenaar 3");

echo "Car 1: " . $car1->getBrand() . " " . $car1->getModel() . " (" . $car1->getYear() . ")" . "<br>";
echo "Eigenaar: " . $car1->getOwner() . "<br>";
echo $car1->isOldtimer() . "<br><br>";

echo "Car 2: " . $car2->getBrand() . " " . $car2->getModel() . " (" . $car2->getYear() . ")" . "<br>";
echo "Eigenaar: " . $car2->getOwner() . "<br>";
echo $car2->isOldtimer() . "<br><br>";

echo "Car 3: " . $car3->getBrand() . " " . $car3->getModel() . " (" . $car3->getYear() . ")" . "<br>";
echo "Eigenaar: " . $car3->getOwner() . "<br>";
echo $car3->isOldtimer() . "<br><br>";
