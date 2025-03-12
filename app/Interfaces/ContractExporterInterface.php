<?php

namespace App\Interfaces;

interface ContractExporterInterface
{
    /**
     * @param array $contract
     * @return void
     */
    public function export(array $contract): void;
}