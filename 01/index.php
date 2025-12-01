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
        header('Content-Type: text/plain; charset=utf-8');
        echo "# MD title\n";
    }

    public function body()
    {
        echo "## MD body\n";
    }
}

class HTMLformat extends TextFormat
{
    public function title()
    {
        header('Content-Type: text/html; charset=utf-8');
        echo "HTML title<BR>";
    }

    public function body()
    {
        echo "HTML body<BR>";
    }
}

$MDtext = new MDformat();
$MDtext->render();
// echo "<br>";
// $HTMLtext = new HTMLformat();
// $HTMLtext->render();