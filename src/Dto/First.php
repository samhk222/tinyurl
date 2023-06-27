<?php

declare(strict_types=1);

namespace Samhk222\MatematicaFinanceira\Dto;


use Spatie\DataTransferObject\DataTransferObject;

class First extends DataTransferObject
{
    public readonly string $oi;
    public int $segundo;
}
