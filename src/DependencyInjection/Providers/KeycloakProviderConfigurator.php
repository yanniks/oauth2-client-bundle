<?php

/*
 * OAuth2 Client Bundle
 * Copyright (c) KnpUniversity <http://knpuniversity.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KnpU\OAuth2ClientBundle\DependencyInjection\Providers;

use Symfony\Component\Config\Definition\Builder\NodeBuilder;

class KeycloakProviderConfigurator implements ProviderConfiguratorInterface
{
    public function buildConfiguration(NodeBuilder $node)
    {
        $node
            ->scalarNode('server_url')
            ->defaultNull()
            ->end()
            ->scalarNode('realm')
            ->defaultNull()
            ->end();
    }

    public function getProviderClass(array $config)
    {
        return 'Stevenmaguire\OAuth2\Client\Provider\Keycloak';
    }

    public function getProviderOptions(array $config)
    {
        return [
            'authServerUrl' => $config['server_url'],
            'realm' => $config['realm'],
            'clientId' => $config['client_id'],
            'clientSecret' => $config['client_secret'],
        ];
    }

    public function getPackagistName()
    {
        return 'stevenmaguire/oauth2-keycloak';
    }

    public function getLibraryHomepage()
    {
        return 'https://github.com/stevenmaguire/oauth2-keycloak';
    }

    public function getProviderDisplayName()
    {
        return 'Keycloak';
    }

    public function getClientClass(array $config)
    {
        return 'KnpU\OAuth2ClientBundle\Client\Provider\KeycloakClient';
    }
}
