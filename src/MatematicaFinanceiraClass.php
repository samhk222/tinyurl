<?php

declare(strict_types=1);

namespace Samhk222\MatematicaFinanceira;

use Samhk222\MatematicaFinanceira\Dto\First;

class MatematicaFinanceiraClass
{
    public function __construct()
    {
        $a = new First(oi: "Samuca", segundo: 2);

        dd('asadasdasddsd', $a);
    }
}
