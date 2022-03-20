<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

use ExpressionEngine\Service\Addon\Installer;

class Example_fieldtype_upd extends Installer
{
    public $has_cp_backend = 'n';
    public $has_publish_fields = 'n';

    public function install()
    {
        parent::install();

        $this->_dbScripts();

        return true;
    }

    public function update($current = '')
    {
        // Runs migrations
        parent::update($current);

        return true;
    }

    public function uninstall()
    {
        parent::uninstall();

        ee()->load->dbforge();

        $table_name = 'example_ft_examples';
        ee()->dbforge->drop_table($table_name);

        return true;
    }

    private function _dbScripts()
    {
        ee()->load->dbforge();

        $table_name = 'example_ft_examples';
        if ( ! ee()->db->table_exists($table_name)) {
            ee()->dbforge->add_field([
                'example_id'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'entry_id'      => ['type' => 'int', 'constraint' => 11],
                'field_id'      => ['type' => 'int', 'constraint' => 11],
                'value'         => ['type' => 'varchar', 'constraint' => 255],
            ]);

            ee()->dbforge->add_key('example_id', true);
            ee()->dbforge->create_table($table_name);
        }
    }
}