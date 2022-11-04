<?php

namespace Compwright\OAuth2_Servicefusion;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;

class ResourceOwner implements ResourceOwnerInterface
{
    public const ACCESS_TOKEN_RESOURCE_OWNER_ID = 'id';

    protected array $response;

    public function __construct(array $response = [])
    {
        $this->response = $response;
    }

    public function getId(): ?int
    {
        return $this->response['id'] ?: null;
    }

    public function getEmail(): ?string
    {
        return $this->response['email'] ?: null;
    }

    public function getFirstName(): string
    {
        return $this->response['first_name'] ?: '';
    }

    public function getLastName(): string
    {
        return $this->response['last_name'] ?: '';
    }

    public function getFullName(): string
    {
        return trim($this->getFirstName() . ' ' . $this->getLastName());
    }

    public function toArray(): array
    {
        return $this->response;
    }
}
