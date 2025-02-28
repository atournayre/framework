<?php

declare(strict_types=1);

namespace Atournayre\Common\Factory\Context;

use Atournayre\Common\VO\Context\Context;
use Atournayre\Contracts\Context\ContextInterface;
use Atournayre\Contracts\Security\SecurityInterface;
use Atournayre\Contracts\Security\UserInterface;
use Psr\Clock\ClockInterface;

final class ContextFactory
{
    private SecurityInterface $security;

    private ClockInterface $clock;

    public function __construct(
        SecurityInterface $security,
        ClockInterface $clock,
    ) {
        $this->clock = $clock;
        $this->security = $security;
    }

    /**
     * @api
     *
     * @throws \Exception
     */
    public function fromUser(UserInterface $user): ContextInterface
    {
        $dateTime = $this->clock->now();

        return $this->create($user, $dateTime);
    }

    /**
     * @api
     *
     * @throws \Exception
     */
    public function fromDateTime(\DateTimeInterface $dateTime): ContextInterface
    {
        $user = $this->security->getUser();

        return $this->create($user, $dateTime);
    }

    /**
     * @api
     *
     * @throws \Exception
     */
    public function create(UserInterface $user, \DateTimeInterface $dateTime): ContextInterface
    {
        return Context::create($user, $dateTime);
    }
}
