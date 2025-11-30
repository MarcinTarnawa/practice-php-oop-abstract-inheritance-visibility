<?php

class Prepare extends Progress
{
    protected array $statusDefinitions = [
        '1' => "Przyjęte zamówienie",
        '2' => "W trakcie przygotowania",
        '3' => "Gotowe"
    ];
}