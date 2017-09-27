<?php

//Lớp asbtract cũng gần giống như interface, ngoại trừ nó có thể chứa phương thức và thuộc tính thông thường.

//Các phương thức asbtract trong lớp asbtract chúng cũng rỗng giống như phương thức trong interface,
// vậy nên khi một lớp kế thừa từ lớp asbtract thì bắt buộc phải định nghĩa lại (Overwrite - tính đa hình) các phương thức abstract đã khai báo ở lớp abstract.

//Lớp Abstract sẽ định nghĩa các hàm (phương thức) mà từ đó các lớp con sẽ kế thừa nó và Overwrite lại (tính đa hình)
abstract class aa {
    // Lớp Abstract có thể có thuộc tính nhưng thuộc tính không được khai báo là abstract
    private $a = 1;
    protected $b = 2;
    public $c = 3;

    // Các phương thức của lớp abstract đều phải được khai báo là abstract và phải ở mức protected và public, không được ở mức private
    abstract public function aaa(); // Phương thức asbtract
    abstract protected function bbb(); // Phương thức asbtract


    public function ccc() {
        echo "function ccc()";
    }

    public function ddd() {
        echo $this->a;
    }
}

//$a = new aa(); Sai vì không thể tạo một biến đối tượng mới của lớp Abstract

class bb extends aa {
    public function aaa() {
        echo $this->b;
    }

    public function bbb() {
        echo $this->c;
    }

    public function eee() {
        $this->ddd();
    }
}

$a = new bb();
$a->aaa();
echo "</br>";
$a->bbb();
echo "</br>";
$a->ccc();
echo "</br>";
$a->ddd();
echo "</br>";
$a->eee();