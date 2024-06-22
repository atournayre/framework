<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Types;

use Atournayre\Common\VO\Memory;
use Atournayre\Primitives\NumericTrait;

final class AttachmentMaxSize
{
    use NumericTrait;

    /**
     * @api
     */
    public function memory(): Memory
    {
        return Memory::fromBytes($this->value->intValue());
    }
}
