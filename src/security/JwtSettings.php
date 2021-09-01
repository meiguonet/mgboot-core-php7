<?php

namespace mgboot\core\security;

use mgboot\util\StringUtils;

final class JwtSettings
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $issuer = '';

    /**
     * @var string
     */
    private $publicKeyPemFile = '';

    /**
     * @var string
     */
    private $privateKeyPemFile = '';

    /**
     * @var int
     */
    private $ttl = 0;

    /**
     * @var int
     */
    private $refreshTokenTtl = 0;

    private function __construct(string $key)
    {
        $this->key = $key;
    }

    private function __clone()
    {
    }

    public static function create(string $key): JwtSettings
    {
        return new self($key);
    }

    public function withIssuer(string $issuer): JwtSettings
    {
        $this->issuer = $issuer;
        return $this;
    }

    public function withPublicKeyPemFile(string $filepath): JwtSettings
    {
        if (!empty($filepath) && is_file($filepath)) {
            $this->publicKeyPemFile = $filepath;
        }

        return $this;
    }

    public function withPrivateKeyPemFile(string $filepath): JwtSettings
    {
        if (!empty($filepath) && is_file($filepath)) {
            $this->privateKeyPemFile = $filepath;
        }

        return $this;
    }

    /**
     * @param int|string $ttl
     * @return JwtSettings
     */
    public function withTtl($ttl): JwtSettings
    {
        if (is_int($ttl) && $ttl > 0) {
            $this->ttl = $ttl;
        } else if (is_string($ttl) || $ttl !== '') {
            $this->ttl = StringUtils::toDuration($ttl);
        }

        return $this;
    }

    /**
     * @param int|string $ttl
     * @return JwtSettings
     */
    public function withRefreshTokenTtl($ttl): JwtSettings
    {
        if (is_int($ttl) && $ttl > 0) {
            $this->refreshTokenTtl = $ttl;
        } else if (is_string($ttl) || $ttl !== '') {
            $this->refreshTokenTtl = StringUtils::toDuration($ttl);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getIssuer(): string
    {
        return $this->issuer;
    }

    /**
     * @return string
     */
    public function getPublicKeyPemFile(): string
    {
        return $this->publicKeyPemFile;
    }

    /**
     * @return string
     */
    public function getPrivateKeyPemFile(): string
    {
        return $this->privateKeyPemFile;
    }

    /**
     * @return int
     */
    public function getTtl(): int
    {
        return $this->ttl;
    }

    /**
     * @return int
     */
    public function getRefreshTokenTtl(): int
    {
        return $this->refreshTokenTtl;
    }
}
