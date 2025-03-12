<?php

namespace App\Models;

use CodeIgniter\Model;

class ContractModel extends Model
{
    protected $table = 'contracts';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'record_seq_number', 'reporting_entity_ace', 'market_participant_ace', 'other_market_participant_ace',
        'trading_capacity', 'buy_sell_indicator', 'contract_id', 'contract_date', 'contract_type',
        'energy_commodity', 'price_formula', 'estimated_notional_amount', 'notional_currency',
        'total_notional_quantity', 'quantity_unit', 'volume_optionality', 'type_of_index_price',
        'fixing_index', 'fixing_index_type', 'fixing_index_source', 'first_fixing_date', 'last_fixing_date',
        'fixing_frequency', 'settlement_method', 'delivery_point_or_zone', 'delivery_start_date',
        'delivery_end_date', 'load_type', 'action_type',
        'reporting_entity_id', 'reporting_entity_type', 'id_of_market_participant', 'id_of_market_participant_type',
        'other_market_participant', 'other_market_participant_type', 'estimated_notional_amount_value',
        'estimated_notional_amount_unit', 'volume_optionalty', 'type_of_index_price', 'fixing_index',
        'fixing_index_type', 'fixing_index_source', 'first_fixing_date', 'last_fixing_date', 'fixing_frequency',
        'settlement_method', 'delivery_point_or_zone', 'delivery_start_date', 'delivery_end_date', 'load_type',
        'action_type'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}