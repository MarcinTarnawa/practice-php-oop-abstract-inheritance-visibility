<?php

abstract class Progress
{
    protected array $statusDefinitions = [];
    protected int $currentStatusKey;

    public function __construct(array $order)
    {
        $this->currentStatusKey = 1;
    }

    public function getStatus(): ?string
    {
        return $this->getStatusByKey((string)$this->currentStatusKey);
    }

    public function getStatusByKey(string $key): ?string
    {
        if (isset($this->statusDefinitions[$key])) {
            return $this->statusDefinitions[$key];
        }
        return null;
    }

    public function changeStatus(): ?string
    {
        $nextKey = $this->currentStatusKey + 1;

        if (isset($this->statusDefinitions[(string)$nextKey])) {

            $this->currentStatusKey = $nextKey; 

            return $this->getStatus();
        }
        return null;
    }
    
    public function getAllStatusDefinitions(): array
    {
        return $this->statusDefinitions;
    }
}