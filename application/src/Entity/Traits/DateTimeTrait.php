<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait DateTrait
 */
trait DateTimeTrait
{
    /**
     * Create date
     *
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="created_at")
     */
    private $createdAt;
    /**
     * Update date
     *
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="updated_at")
     */
    private $updatedAt;
    /**
     * Get create date
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    /**
     * Set create date
     *
     * @param \DateTime $createdAt
     *
     * @return $this
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * Get update date
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    /**
     * Set update date
     *
     * @param \DateTime $updatedAt
     *
     * @return $this
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
    /**
     * Set updatedAt and createdAt to current if value not specified time on prePersist event
     *
     * @ORM\PrePersist
     */
    public function preCreateChangeDate()
    {
        $this->createdAt = $this->createdAt ?: new \DateTime();
        $this->updatedAt = $this->updatedAt ?: new \DateTime();
    }
    /**
     * Set updatedAt to current time on preUpdate event
     *
     * @ORM\PreUpdate
     */
    public function preUpdateChangeDate()
    {
        $this->updatedAt = new \DateTime();
    }
}
