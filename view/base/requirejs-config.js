let config = {
    'config': {
        'mixins': {
            'Magento_Checkout/js/view/shipping': {
                'Test_Task4/js/view/shipping-payment-mixin': true
            },
            'Magento_Checkout/js/view/payment': {
                'Test_Task4/js/view/shipping-payment-mixin': true
            },
            'Magento_Checkout/js/view/shipping': {
                'Test_Task4/js/view/shipping': true
            }
        }
    }
}
