<?php

namespace Test\Task4\Plugin;
use Magento\Quote\Model\QuoteRepository;


class QuoteSave
{

    /**
     * @var QuoteRepository
     */
    private $quoteRepository;

    /**
     * QuoteSave constructor.
     * @param QuoteRepository $quoteRepository
     */
    public function __construct(
        QuoteRepository $quoteRepository
    ) {
        $this->quoteRepository = $quoteRepository;
    }


    /**
     * @param \Magento\Checkout\Api\ShippingInformationManagementInterface $subject
     * @param $cartId
     * @param \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
     */
    public function beforeSaveAddressInformation(
        \Magento\Checkout\Model\ShippingInformationManagement $subject,
        $cartId,
        \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
    ) {

        $extAttr = $addressInformation->getShippingAddress()->getExtensionAttributes();
        $comments = $extAttr->getComments();
        $quote = $this->quoteRepository->getActive($cartId);
        $quote->setComments($comments)->save();
    }

}
