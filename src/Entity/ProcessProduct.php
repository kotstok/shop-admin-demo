<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProcessProductRepository;
use App\Traits\TimeStampableTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProcessProductRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class ProcessProduct
{
    use TimeStampableTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private string $current_price = '0.00';

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private string $updated_price = '0.00';

    /**
     * @ORM\Column(type="smallint")
     */
    private int $status = 0;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $reason;

    /**
     * @ORM\ManyToOne(targetEntity=Products::class, inversedBy="processProducts")
     */
    private ?Products $product_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrentPrice(): ?string
    {
        return $this->current_price;
    }

    public function setCurrentPrice(string $current_price): self
    {
        $this->current_price = $current_price;

        return $this;
    }

    public function getUpdatedPrice(): ?string
    {
        return $this->updated_price;
    }

    public function setUpdatedPrice(string $updated_price): self
    {
        $this->updated_price = $updated_price;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }

    public function getProductId(): ?Products
    {
        return $this->product_id;
    }

    public function setProductId(?Products $product_id): self
    {
        $this->product_id = $product_id;

        return $this;
    }
}
