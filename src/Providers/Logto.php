<?php
namespace GBCLStudio\OAuthLogto\Providers;

use Flarum\Forum\Auth\Registration;
use FoF\OAuth\Provider;
use League\OAuth2\Client\Provider\AbstractProvider;

class Logto extends Provider
{
    /**
     * @var LogtoProvider
     */
    protected $provider;

    public function name(): string
    {
        return 'logto';
    }

    public function link(): string
    {
        return 'https://docs.logto.io/docs/references/applications/';
    }

    public function fields(): array
    {
        return [
            'client_id'     => 'required',
            'client_secret' => 'required',
            'logto_domain'  => 'required'
        ];
    }

    public function provider(string $redirectUri): AbstractProvider
    {
        return $this->provider = new LogtoProvider([
            'clientId'     => $this->getSetting('client_id'),
            'clientSecret' => $this->getSetting('client_secret'),
            'redirectUri'  => $redirectUri,
            'oauthDomain'  => urlencode($this->getSetting('logto_domain'))
        ]);
    }

    public function options(): array
    {
        return ['scope' => ['openid email profile']];
    }

    public function suggestions(Registration $registration, $user, string $token)
    {
        $this->verifyEmail($email = $user->getEmail());

        $registration
            ->provideTrustedEmail($email)
            ->suggestUsername(str_replace(' ', '', trim($user->getName())))
            ->setPayload($user->toArray());
    }
}
