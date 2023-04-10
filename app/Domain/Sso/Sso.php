<?php


namespace App\Domain\Sso;


class Sso
{
    /**
     * @var string|null
     */
    protected $certificate;
    /**
     * @var string|null
     */
    protected $type;
    /**
     * @var string|null
     */
    protected $app_identity;
    /**
     * @var string|null
     */
    protected $app_destination;
    /**
     * @var string|null
     */
    protected $client;

    /**
     * @return string|null
     */
    public function getCertificate(): ?string
    {
        return $this->certificate;
    }

    /**
     * @param string|null $certificate
     */
    public function setCertificate(?string $certificate): void
    {
        $this->certificate = $certificate;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     */
    public function getAppIdentity(): ?string
    {
        return $this->app_identity;
    }

    /**
     * @param string|null $app_identity
     */
    public function setAppIdentity(?string $app_identity): void
    {
        $this->app_identity = $app_identity;
    }

    /**
     * @return string|null
     */
    public function getAppDestination(): ?string
    {
        return $this->app_destination;
    }

    /**
     * @param string|null $app_destination
     */
    public function setAppDestination(?string $app_destination): void
    {
        $this->app_destination = $app_destination;
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
