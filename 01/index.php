<?php

abstract class TextFormat
{
    abstract public function title();
    abstract public function body();

    public function render()
    {
        return $this->title() . $this->body();
    }
}

class MDformat extends TextFormat
{
    public function title()
    {
        echo "MD title<BR>";
    }

    public function body()
    {
        echo "MD body<BR>";
    }
}

class HTMLformat extends TextFormat
{
    public function title()
    {
        echo "HTML title<BR>";
    }

    public function body()
    {
        echo "HTML body<BR>";
    }
}

$MDtext = new MDformat();
$MDtext->render();
echo "<br>";
$HTMLtext = new HTMLformat();
$HTMLtext->render();