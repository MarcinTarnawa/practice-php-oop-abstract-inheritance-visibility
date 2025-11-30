<?php

class Deliver extends Progress
{
    protected array $statusDefinitions = [
        '1' => "W przygotowaniu",
        '2' => "Gotowe do wysyłki",
        '3' => "W drodze do klienta",
        '4' => "Dostarczone"
        ];
}