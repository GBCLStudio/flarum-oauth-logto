<?php
namespace GBCLStudio\OAuthLogto\Providers;

use Illuminate\Support\Arr;
use League\OAuth2\Client\Provider\ResourceOwnerInterface;

class LogtoResourceOwner implements ResourceOwnerInterface
{
    protected $response;

    public function __construct(array $response)
    {
        $this->response = $response;
    }

    public function toArray()
    {
        return $this->response;
    }

    public function getId(): ?string
    {
        return Arr::get($this->response, 'sub');
    }

    public function getName(): ?string
    {
        return Arr::get($this->response, 'name');
    }

    public function getEmail(): ?string
    {
        return Arr::get($this->response, 'email');
    }

    public function getImage(): ?string
    {
        return Arr::get($this->response, 'picture');
    }
}
