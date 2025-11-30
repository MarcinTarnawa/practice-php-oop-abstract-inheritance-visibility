<?php

interface IElement
{
    public function render();
}

class PElement implements IElement
{
    protected string $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function render(): string
    {
        return "<p> $this->text </p>";
    }
}

class AElement implements IElement
{
    protected string $text;

     public function __construct($text)
    {
        $this->text = $text;
    }

    public function render(): string
    {
        return "<a href='$this->text'>$this->text</a>";
    }
}

class DivElement implements IElement
{
    protected string $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function render(): string
    {
        return "<div> $this->text </div>";
    }
}

class Page {
    /**
    * @param HTMLElement[] $elements
    */
    public function render(array $elements): void {
        foreach ($elements as $element) {
           echo $element->render();
       }
    }
}

$div = new DivElement('Jakaś treść');
$p = new PElement('Jakiś tekst');
$a = new AElement('Jakiś link');

$elements = [
    $div,
    $p,
    $a,
];

$page = new Page();
$page->render($elements);
?>
<br><br>
<a href="/">Refresh</a>