<?php

declare(strict_types=1);

namespace Atournayre\Tests\Fixtures;

use Atournayre\Tests\Fixtures\Exception\InvalidEmailException;
use Random\RandomException;

/**
 * Class User.
 *
 * Simple user domain class for demonstration purposes.
 */
final class User
{
    /**
     * @var string The user's ID
     */
    private string $id;

    /**
     * @var string The user's email
     */
    private string $email;

    /**
     * @var string The user's name
     */
    private string $name;

    /**
     * User constructor.
     */
    public function __construct(string $id, string $email, string $name)
    {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * Gets the user's ID.
     *
     * @api
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Gets the user's email.
     *
     * @api
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Gets the user's name.
     *
     * @api
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Creates a new user with the given email and name.
     *
     * @throws InvalidEmailException If the email is invalid
     * @throws RandomException
     */
    public static function create(string $email, string $name): self
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw InvalidEmailException::new('Invalid email address');
        }

        return new self(random_bytes(16), $email, $name);
    }
}
