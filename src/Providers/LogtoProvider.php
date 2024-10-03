<?php

namespace GBCLStudio\OAuthLogto\Providers;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Token\AccessToken;
use Psr\Http\Message\ResponseInterface;

class LogtoProvider extends AbstractProvider
{
    protected $oauthDomain;
    
    public function getOauthDomain()
    {
        return $this->oauthDomain;
    }

    public function getBaseAuthorizationUrl()
    {
        return sprintf('https://%s/oidc/auth', $this->oauthDomain);
    }

    public function getBaseAccessTokenUrl(array $params)
    {
        return sprintf('https://%s/oidc/token', $this->oauthDomain);
    }

    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        return sprintf('https://%s/oidc/me', $this->oauthDomain);
    }

    protected function getDefaultScopes()
    {
        return ['openid profile email'];
    }

    protected function checkResponse(ResponseInterface $response, $data)
    {
        if (isset($data['error'])) {
            throw new IdentityProviderException(
                (isset($data['error']['message']) ? $data['error']['message'] : $response->getReasonPhrase()),
                $response->getStatusCode(),
                $response
            );
        }
    }

    protected function createResourceOwner(array $response, AccessToken $token)
    {
        return new LogtoResourceOwner($response);
    }

    protected function prepareAccessTokenResponse(array $result)
    {
        $result = parent::prepareAccessTokenResponse($result);
        return [
            'access_token' => $result['access_token'],
            'id_token'     => $result['id_token'],
            'token_type'   => $result['token_type'],
            'expires_in'   => $result['expires_in'],
        ];
    }

    protected function getAuthorizationHeaders($token = null)
    {
        return ['Authorization' => 'Bearer ' . $token];
    }
}
