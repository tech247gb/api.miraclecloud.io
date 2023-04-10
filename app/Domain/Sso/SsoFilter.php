<?php


namespace App\Domain\Sso;


class SsoFilter
{
    /**
     * @var string
     */
    private $certificate;
    /**
     * @var string|null
     */
    private $client;

    /**
     * @return string
     */
    public function getCertificate(): string
    {
        return $this->certificate;
    }

    /**
     * @param string $certificate
     */
    public function setCertificate(string $certificate): void
    {
        $this->certificate = $certificate;
    }

    /**
     * @return string|null
     */
    public function getClient(): ?string
    {
        return $this->client;
    }

    /**
     * @param string|null $client
     */
    public function setClient(?string $client): void
    {
        $this->client = $client;
    }


}
