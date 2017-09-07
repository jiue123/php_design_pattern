<?php

interface OutputInterface
{
    public function load();
}

class SerializedArrayOutput implements OutputInterface
{
    public function load($param = array())
    {
        return serialize($param);
    }
}

class JsonStringOutput implements OutputInterface
{
    public function load($param = array())
    {
        return json_encode($param);
    }
}

class ArrayOutput implements OutputInterface
{
    public function load($param = array())
    {
        return $param;
    }
}




class SomeClient
{
    private $output;

    public function setOutput(OutputInterface $outputType)
    {
        $this->output = $outputType;
    }

    public function loadOutput()
    {
        return $this->output->load();
    }
}


$client = new SomeClient();
$arrData = array(
    "le",
    "thanh",
    "phat",
);

// Want an array?
$client->setOutput(new ArrayOutput());
$data = $client->loadOutput($arrData);

// Want some JSON?
$client->setOutput(new JsonStringOutput());
$data = $client->loadOutput($arrData);