<?php


namespace App\Application\PowerBI\GetReportEmbedToken;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\GenericProvider;
use Tngnt\PBI\Client;

class GetReportEmbedTokenHandler extends HandlerBase
{

    /**
     * @param GetReportEmbedToken|CommandInterface $command
     * @return array
     * @throws IdentityProviderException
     */
    protected function work(CommandInterface $command)
    {
        $provider = $this->createGenericProvider();

        $accessToken = $provider->getAccessToken('password', [
            'username' => env('POWER_BI_AUTH_USER_NAME'),
            'password' => env('POWER_BI_AUTH_USER_PASSWORD'),
            'resource' => env('POWER_BI_RESOURCE_URL')
        ]);

        $client = new Client($accessToken->getToken());

        return $client->report->getReportEmbedToken($command->getReportId(), $command->getGroupId())->toArray();
    }

    /**
     * @return GenericProvider
     */
    private function createGenericProvider(): GenericProvider
    {
        return new GenericProvider([
            'clientId' => env('POWER_BI_CLIENT_ID'),
            'clientSecret' => env('POWER_BI_CLIENT_SECRET'),
            'urlAuthorize' => env('POWER_BI_URL_AUTHORIZE'),
            'urlAccessToken' => env('POWER_BI_URL_ACCESS_TOKEN'),
            'urlResourceOwnerDetails' => env('POWER_BI_URL_RESOURCE_OWNER_DETAILS'),
            'redirectURI' => env('POWER_BI_REDIRECT_URL'),
            'scopes' => env('POWER_BI_SCOPES'),
        ]);
    }

}
