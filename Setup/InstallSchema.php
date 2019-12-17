<?php

namespace Test\Task4\Setup;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface{
    public function install(SchemaSetupInterface $setup,ModuleContextInterface $context){
        $setup->startSetup();
        $conn = $setup->getConnection();
        $tableQuote = $setup->getTable('quote');
        $tableOrder = $setup->getTable('sales_order');
        if($conn->isTableExists($tableQuote) == true){
            $columns = [
                'comments' => [
                    'type' => Table::TYPE_TEXT,
                    'nullable' => false,
                    'comment' => 'Comments',
                ],
            ];
            foreach ($columns as $name => $definition) {
                $conn->addColumn($tableQuote, $name, $definition);
            }
        }
        if($conn->isTableExists($tableOrder) == true){
            $columns = [
                'comments' => [
                    'type' => Table::TYPE_TEXT,
                    'nullable' => false,
                    'comment' => 'Comments',
                ],
            ];
            foreach ($columns as $name => $definition) {
                $conn->addColumn($tableOrder, $name, $definition);
            }
        }
        $setup->endSetup();
    }
}
?>