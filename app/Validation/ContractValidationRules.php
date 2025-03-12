<?php

namespace App\Validation;

class ContractValidationRules
{
    /**
     * @return array
     */
    public static function getValidationRules(): array
    {
        return [
            'reportingEntityID' => [
                'label' => 'reportingEntityID',
                'rules' => 'required|regex_match[/^[A-Z][0-9]{7}[A-Z]\.[A-Z]{2}$/]',
                'errors' => [
                    'required' => 'Поле reportingEntityID обязательно.',
                    'regex_match' => 'Формат reportingEntityID должен быть как B0001064H.DE',
                ]
            ],
            'reportingEntityType' => [
                'label' => 'reportingEntityType',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Поле reportingEntityType обязательно.',
                ]
            ],
            'recordSeqNumber' => [
                'label' => 'recordSeqNumber',
                'rules' => 'required|integer|greater_than_equal_to[1]',
                'errors' => [
                    'required' => 'Поле recordSeqNumber обязательно.',
                    'integer' => 'recordSeqNumber должен быть целым числом.',
                    'greater_than_equal_to' => 'recordSeqNumber должен быть больше или равен 1.'
                ]
            ],
            'idOfMarketParticipant' => [
                'label' => 'idOfMarketParticipant',
                'rules' => 'required|regex_match[/^[A-Z][0-9]{8}\.[A-Z]{2}$/]',
                'errors' => [
                    'required' => 'Поле idOfMarketParticipant обязательно.',
                    'regex_match' => 'Формат idOfMarketParticipant должен быть как A00023777.DE.',
                ]
            ],
            'idOfMarketParticipantType' => [
                'label' => 'idOfMarketParticipantType',
                'rules' => 'required|in_list[ace,lei,bic,eic,gln]',
                'errors' => [
                    'required' => 'Поле idOfMarketParticipantType обязательно.',
                    'in_list' => 'Тип idOfMarketParticipantType должен быть одним из: ace, lei, bic, eic, gln.'
                ]
            ],
            'otherMarketParticipant' => [
                'label' => 'otherMarketParticipant',
                'rules' => 'required|regex_match[/^[A-Z][0-9]{8}\.[A-Z]{2}$/]',
                'errors' => [
                    'required' => 'Поле otherMarketParticipant обязательно.',
                    'regex_match' => 'Формат otherMarketParticipant должен быть как A00113777.DE.',
                ]
            ],
            'otherMarketParticipantType' => [
                'label' => 'otherMarketParticipantType',
                'rules' => 'required|in_list[ace,lei,bic,eic,gln]',
                'errors' => [
                    'required' => 'Поле otherMarketParticipantType обязательно.',
                    'in_list' => 'Тип otherMarketParticipantType должен быть одним из: ace, lei, bic, eic, gln.'
                ]
            ],
            'tradingCapacity' => [
                'label' => 'tradingCapacity',
                'rules' => 'required|exact_length[1]|regex_match[/^[A-Z]$/]',
                'errors' => [
                    'required' => 'Поле tradingCapacity обязательно.',
                    'exact_length' => 'tradingCapacity должен быть длиной 1 символ.',
                    'regex_match' => 'tradingCapacity должен быть одной заглавной буквой.'
                ]
            ],
            'buySellIndicator' => [
                'label' => 'buySellIndicator',
                'rules' => 'required|exact_length[1]|regex_match[/^[A-Z]$/]',
                'errors' => [
                    'required' => 'Поле buySellIndicator обязательно.',
                    'exact_length' => 'buySellIndicator должен быть длиной 1 символ.',
                    'regex_match' => 'buySellIndicator должен быть одной заглавной буквой.'
                ]
            ],
            'contractId' => [
                'label' => 'contractId',
                'rules' => 'required|max_length[100]|regex_match[/^[A-Za-z0-9#:-]+$/]',
                'errors' => [
                    'required' => 'Поле contractId обязательно.',
                    'max_length' => 'contractId не должен превышать 100 символов.',
                    'regex_match' => 'contractId может содержать только буквы, цифры, #, : и -.'
                ]
            ],
            'contractDate' => [
                'label' => 'contractDate',
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Поле contractDate обязательно.',
                    'valid_date' => 'contractDate должен быть в формате YYYY-MM-DD (например, 2021-11-29).'
                ]
            ],
            'contractType' => [
                'label' => 'contractType',
                'rules' => 'required|exact_length[2]|regex_match[/^[A-Z]{2}$/]',
                'errors' => [
                    'required' => 'Поле contractType обязательно.',
                    'exact_length' => 'contractType должен быть длиной 2 символа.',
                    'regex_match' => 'contractType должен быть двумя заглавными буквами.'
                ]
            ],
            'energyCommodity' => [
                'label' => 'energyCommodity',
                'rules' => 'required|exact_length[2]|regex_match[/^[A-Z]{2}$/]',
                'errors' => [
                    'required' => 'Поле energyCommodity обязательно.',
                    'exact_length' => 'energyCommodity должен быть длиной 2 символа.',
                    'regex_match' => 'energyCommodity должен быть двумя заглавными буквами.'
                ]
            ],
            'priceFormula' => [
                'label' => 'priceFormula',
                'rules' => 'required|max_length[1000]|regex_match[/^[0-9\.,*+-_\w]*$/]',
                'errors' => [
                    'required' => 'Поле priceFormula обязательно.',
                    'max_length' => 'priceFormula не должен превышать 1000 символов.',
                    'regex_match' => 'priceFormula может содержать только цифры, запятые, точки, *, +, - и буквы/цифры.'
                ]
            ],
            'estimatedNotionalAmountValue' => [
                'label' => 'estimatedNotionalAmountValue',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Поле estimatedNotionalAmountValue обязательно.',
                    'numeric' => 'estimatedNotionalAmountValue должен быть числом.'
                ]
            ],
            'estimatedNotionalAmountUnit' => [
                'label' => 'estimatedNotionalAmountUnit',
                'rules' => 'required|in_list[KWh,MWh,GWh,Therm,KTherm,MTherm,cm,mcm,Btu,MMBtu,MJ,MMJ,100MJ,GJ]',
                'errors' => [
                    'required' => 'Поле estimatedNotionalAmountUnit обязательно.',
                    'in_list' => 'estimatedNotionalAmountUnit должен быть одним из: KWh, MWh, GWh, Therm, KTherm, MTherm, cm, mcm, Btu, MMBtu, MJ, MMJ, 100MJ, GJ.'
                ]
            ],
            'volumeOptionalty' => [
                'label' => 'volumeOptionalty',
                'rules' => 'required|exact_length[1]|regex_match[/^[A-Z]$/]',
                'errors' => [
                    'required' => 'Поле volumeOptionalty обязательно.',
                    'exact_length' => 'volumeOptionalty должен быть длиной 1 символ.',
                    'regex_match' => 'volumeOptionalty должен быть одной заглавной буквой.'
                ]
            ],
            'typeOfIndexPrice' => [
                'label' => 'typeOfIndexPrice',
                'rules' => 'required|exact_length[1]|regex_match[/^[A-Z]$/]',
                'errors' => [
                    'required' => 'Поле typeOfIndexPrice обязательно.',
                    'exact_length' => 'typeOfIndexPrice должен быть длиной 1 символ.',
                    'regex_match' => 'typeOfIndexPrice должен быть одной заглавной буквой.'
                ]
            ],
            'fixingIndex' => [
                'label' => 'fixingIndex',
                'rules' => 'required|max_length[150]|regex_match[/^[A-Za-z0-9\s]+$/]',
                'errors' => [
                    'required' => 'Поле fixingIndex обязательно.',
                    'max_length' => 'fixingIndex не должен превышать 150 символов.',
                    'regex_match' => 'fixingIndex может содержать только буквы, цифры и пробелы.'
                ]
            ],
            'fixingIndexType' => [
                'label' => 'fixingIndexType',
                'rules' => 'required|exact_length[2]|regex_match[/^[A-Z]{2}$/]',
                'errors' => [
                    'required' => 'Поле fixingIndexType обязательно.',
                    'exact_length' => 'fixingIndexType должен быть длиной 2 символа.',
                    'regex_match' => 'fixingIndexType должен быть двумя заглавными буквами.'
                ]
            ],
            'fixingIndexSource' => [
                'label' => 'fixingIndexSource',
                'rules' => 'required|max_length[150]|regex_match[/^[A-Za-z0-9\s]*$/]',
                'errors' => [
                    'required' => 'Поле fixingIndexSource обязательно.',
                    'max_length' => 'fixingIndexSource не должен превышать 150 символов.',
                    'regex_match' => 'fixingIndexSource может содержать только буквы, цифры и пробелы.'
                ]
            ],
            'firstFixingDate' => [
                'label' => 'firstFixingDate',
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Поле firstFixingDate обязательно.',
                    'valid_date' => 'firstFixingDate должен быть в формате YYYY-MM-DD (например, 2021-11-29).'
                ]
            ],
            'lastFixingDate' => [
                'label' => 'lastFixingDate',
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Поле lastFixingDate обязательно.',
                    'valid_date' => 'lastFixingDate должен быть в формате YYYY-MM-DD (например, 2022-12-15).'
                ]
            ],
            'fixingFrequency' => [
                'label' => 'fixingFrequency',
                'rules' => 'required|in_list[X,H,D,W,M,Q,S,A,O]',
                'errors' => [
                    'required' => 'Поле fixingFrequency обязательно.',
                    'in_list' => 'fixingFrequency должен быть одним из: X, H, D, W, M, Q, S, A, O.'
                ]
            ],
            'settlementMethod' => [
                'label' => 'settlementMethod',
                'rules' => 'required|exact_length[1]|regex_match[/^[A-Z]$/]',
                'errors' => [
                    'required' => 'Поле settlementMethod обязательно.',
                    'exact_length' => 'settlementMethod должен быть длиной 1 символ.',
                    'regex_match' => 'settlementMethod должен быть одной заглавной буквой.'
                ]
            ],
            'deliveryPointOrZone' => [
                'label' => 'deliveryPointOrZone',
                'rules' => 'required|exact_length[16]|regex_match[/^[0-9]{2}Y[A-Z]{2}-[A-Z]{2}-------[0-9]$/]',
                'errors' => [
                    'required' => 'Поле deliveryPointOrZone обязательно.',
                    'exact_length' => 'deliveryPointOrZone должен быть длиной 16 символов.',
                    'regex_match' => 'deliveryPointOrZone должен быть в формате как 10YDE-VE-------2.'
                ]
            ],
            'deliveryStartDate' => [
                'label' => 'deliveryStartDate',
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Поле deliveryStartDate обязательно.',
                    'valid_date' => 'deliveryStartDate должен быть в формате YYYY-MM-DD (например, 2022-01-01).'
                ]
            ],
            'deliveryEndDate' => [
                'label' => 'deliveryEndDate',
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Поле deliveryEndDate обязательно.',
                    'valid_date' => 'deliveryEndDate должен быть в формате YYYY-MM-DD (например, 2023-12-31).'
                ]
            ],
            'loadType' => [
                'label' => 'loadType',
                'rules' => 'required|exact_length[2]|regex_match[/^[A-Z]{2}$/]',
                'errors' => [
                    'required' => 'Поле loadType обязательно.',
                    'exact_length' => 'loadType должен быть длиной 2 символа.',
                    'regex_match' => 'loadType должен быть двумя заглавными буквами.'
                ]
            ],
            'actionType' => [
                'label' => 'actionType',
                'rules' => 'required|exact_length[1]|regex_match[/^[A-Z]$/]',
                'errors' => [
                    'required' => 'Поле actionType обязательно.',
                    'exact_length' => 'actionType должен быть длиной 1 символ.',
                    'regex_match' => 'actionType должен быть одной заглавной буквой.'
                ]
            ],
        ];
    }
}