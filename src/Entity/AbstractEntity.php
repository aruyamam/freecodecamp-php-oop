<?php

namespace Entity;

abstract class AbstractEntity
{
   /**
    * @var null|int
    */
   protected $id;

   /**
    * @var null|DateTime
    */
   protected $dateCreated;


   /**
    * @var null|DateTime
    */
   protected $dateUpdated;

   /**
    * @return integer|null
    */
   public function getId(): ?int
   {
      return $this->id;
   }

   /**
    * @param integer|null $id
    * @return AbstractEntity
    */
   public function setId(?int $id): AbstractEntity
   {
      $this->id = $id;
      return $this;
   }

   /**
    * @return DateTime|null
    */
   public function getDateCreated(): ?DateTime
   {
      return $this->dateCreated;
   }

   public function setDateUpdated(?DateTime $dateUpdated): AbstractEntity
   {
      $this->dateUpdated = $dateUpdated;
      return $this;
   }
}
