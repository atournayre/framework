<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Types;

use Atournayre\Common\VO\Memory;
use Atournayre\Primitives\Traits\NumericTrait;

final class AttachmentMaxSize
{
    use NumericTrait;

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function memory(): Memory
    {
        return Memory::fromBytes($this->value->intValue());
    }
}
