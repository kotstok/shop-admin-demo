<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProductsRepository;
use App\Traits\TimeStampableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Products
{
    use TimeStampableTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $sku;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $url;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private ?string $min_price;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Company $company;

    /**
     * @ORM\OneToMany(targetEntity=ProcessProduct::class, mappedBy="product_id")
     */
    private Collection $processProducts;

    public function __construct()
    {
        $this->processProducts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): self
    {
        $this->sku = $sku;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getMinPrice(): ?string
    {
        return $this->min_price;
    }

    public function setMinPrice(?string $min_price): self
    {
        $this->min_price = $min_price;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return Collection|ProcessProduct[]
     */
    public function getProcessProducts(): Collection
    {
        return $this->processProducts;
    }

    public function addProcessProduct(ProcessProduct $processProduct): self
    {
        if (!$this->processProducts->contains($processProduct)) {
            $this->processProducts[] = $processProduct;
            $processProduct->setProductId($this);
        }

        return $this;
    }

    public function removeProcessProduct(ProcessProduct $processProduct): self
    {
        if ($this->processProducts->removeElement($processProduct)) {
            // set the owning side to null (unless already changed)
            if ($processProduct->getProductId() === $this) {
                $processProduct->setProductId(null);
            }
        }

        return $this;
    }
}
