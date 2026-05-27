<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Session;

interface FlashBagInterface
{
    /** @api */
    public const SUCCESS = 'success';

    /** @api */
    public const WARNING = 'warning';

    /** @api */
    public const ERROR = 'danger';

    /** @api */
    public const INFO = 'info';

    /**
     * @param string|array<string> $message
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function success($message): void;

    /**
     * @param string|array<string> $message
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function warning($message): void;

    /**
     * @param string|array<string> $message
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function error($message): void;

    /**
     * @param string|array<string> $message
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function info($message): void;

    /**
     * Use with caution, this method is used to display error messages from exceptions.
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function fromException(\Exception $exception): void;
}
