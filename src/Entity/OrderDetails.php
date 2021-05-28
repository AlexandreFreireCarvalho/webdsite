<?php

namespace App\Entity;

use App\Repository\OrderDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderDetailsRepository::class)
 */
class OrderDetails
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Order::class, inversedBy="orderDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $orders;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $productName;

    /**
     * @ORM\Column(type="float")
     */
    private $productPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="float")
     */
    private $subTotalHt;

    /**
     * @ORM\Column(type="float")
     */
    private $taxe;

    /**
     * @ORM\Column(type="float")
     */
    private $subTotalTtc;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrders(): ?Order
    {
        return $this->orders;
    }

    public function setOrders(?Order $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): self
    {
        $this->productName = $productName;

        return $this;
    }

    public function getProductPrice(): ?float
    {
        return $this->productPrice;
    }

    public function setProductPrice(float $productPrice): self
    {
        $this->productPrice = $productPrice;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getSubTotalHt(): ?float
    {
        return $this->subTotalHt;
    }

    public function setSubTotalHt(float $subTotalHt): self
    {
        $this->subTotalHt = $subTotalHt;

        return $this;
    }

    public function getTaxe(): ?float
    {
        return $this->taxe;
    }

    public function setTaxe(float $taxe): self
    {
        $this->taxe = $taxe;

        return $this;
    }

    public function getSubTotalTtc(): ?float
    {
        return $this->subTotalTtc;
    }

    public function setSubTotalTtc(float $subTotalTtc): self
    {
        $this->subTotalTtc = $subTotalTtc;

        return $this;
    }
}
