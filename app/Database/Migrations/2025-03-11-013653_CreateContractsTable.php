<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateContsctsTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'reporting_entity_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
            'reporting_entity_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 3,
                'null'       => false,
            ],
            'record_seq_number' => [
                'type'       => 'INT',
                'null'       => false,
            ],
            'id_of_market_participant' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
            'id_of_market_participant_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 3,
                'null'       => false,
            ],
            'other_market_participant' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
            'other_market_participant_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 3,
                'null'       => false,
            ],
            'trading_capacity' => [
                'type'       => 'CHAR',
                'constraint' => 1,
                'null'       => false,
            ],
            'buy_sell_indicator' => [
                'type'       => 'CHAR',
                'constraint' => 1,
                'null'       => false,
            ],
            'contract_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'contract_date' => [
                'type'       => 'DATE',
                'null'       => false,
            ],
            'contract_type' => [
                'type'       => 'CHAR',
                'constraint' => 2,
                'null'       => false,
            ],
            'energy_commodity' => [
                'type'       => 'CHAR',
                'constraint' => 2,
                'null'       => false,
            ],
            'price_formula' => [
                'type'       => 'VARCHAR',
                'constraint' => 1000,
                'null'       => true,
            ],
            'estimated_notional_amount_value' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,5',
                'null'       => true,
            ],
            'estimated_notional_amount_unit' => [
                'type'       => 'VARCHAR',
                'constraint' => 6,
                'null'       => true,
            ],
            'volume_optionalty' => [
                'type'       => 'CHAR',
                'constraint' => 1,
                'null'       => true,
            ],
            'type_of_index_price' => [
                'type'       => 'CHAR',
                'constraint' => 1,
                'null'       => true,
            ],
            'fixing_index' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'null'       => false,
            ],
            'fixing_index_type' => [
                'type'       => 'CHAR',
                'constraint' => 2,
                'null'       => true,
            ],
            'fixing_index_source' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'null'       => true,
            ],
            'first_fixing_date' => [
                'type'       => 'DATE',
                'null'       => true,
            ],
            'last_fixing_date' => [
                'type'       => 'DATE',
                'null'       => true,
            ],
            'fixing_frequency' => [
                'type'       => 'CHAR',
                'constraint' => 1,
                'null'       => true,
            ],
            'settlement_method' => [
                'type'       => 'CHAR',
                'constraint' => 1,
                'null'       => false,
            ],
            'delivery_point_or_zone' => [
                'type'       => 'CHAR',
                'constraint' => 16,
                'null'       => false,
            ],
            'delivery_start_date' => [
                'type'       => 'DATE',
                'null'       => false,
            ],
            'delivery_end_date' => [
                'type'       => 'DATE',
                'null'       => false,
            ],
            'load_type' => [
                'type'       => 'CHAR',
                'constraint' => 2,
                'null'       => true,
            ],
            'action_type' => [
                'type'       => 'CHAR',
                'constraint' => 1,
                'null'       => false,
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => false,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => false,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('contract_id');

        $this->forge->createTable('contracts');
    }

    public function down(): void
    {
        $this->forge->dropTable('contracts', true);
    }
}
