<?php

interface UserInterface
{
    public function setName($name);
    public function getName();
}

class User
{
    private $name;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

interface CustomerInterface
{
    public function setFirstName($fname);
    public function getFirstName();
    public function setLastName($lname);
    public function getLastName();
}

class Customer implements CustomerInterface
{
    private $firstName;
    private $lastName;

    public function setFirstName($fname)
    {
        $this->firstName = $fname;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($lname)
    {
        $this->lastName = $lname;
    }

    public function getLastName()
    {
        return $this->lastName;
    }
}

interface Adapter
{
    public function convertFirstName();
    public function convertLastName();
}

class UserToCustomerAdapter implements Adapter
{
    protected $user;
    protected $customer;

    protected $firstName;
    protected $lastName;
    public function __construct(User $user, Customer $customer)
    {
        $this->user = $user;
        $fullname = $this->user->getName();

        $pieces = explode(" ", $fullname);
        $this->firstName = $pieces[0];
        $this->lastName = $pieces[1] . " " . $pieces[2];

        $this->customer = $customer;
    }

    public function convertFirstName()
    {
        // TODO: Implement convert() method.
        $this->customer->setFirstName($this->firstName);

        return $this->customer->getFirstName();
    }

    public function convertLastName()
    {
        // TODO: Implement convertLastName() method.
        $this->customer->setLastName($this->lastName);

        return $this->customer->getLastName();
    }
}

$user = new User();
$customer = new Customer();
$user->setName("Lê Thành Phát");
$adapter = new UserToCustomerAdapter($user, $customer);

$firstName = $adapter->convertFirstName();
$lastName = $adapter->convertLastName();

echo $firstName . " " . $lastName;