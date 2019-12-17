<?php

namespace Test\Task4\Block;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Comment extends Template
{

   protected $coreRegistry = null;

   public function __construct(
       Context $context,
       Registry $registry,
       array $data = []
   ) {
       $this->coreRegistry = $registry;
       parent::__construct($context, $data);
   }

   public function getOrder()
   {
       return $this->coreRegistry->registry('current_order');
   }

   public function getComments(){
       return $this->getOrder()->getComments();
   }

}