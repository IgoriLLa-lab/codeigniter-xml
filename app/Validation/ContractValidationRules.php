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
                'rules' => 'required|validateEntityId[reportingEntityType]',
                'errors' => [
                    'required' => 'Поле reportingEntityID обязательно.',
                    'validateEntityId' => 'Некорректный формат reportingEntityID для выбранного типа.',
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
                'rules' => 'required|validateEntityId[idOfMarketParticipantType]',
                'errors' => [
                    'required' => 'Поле idOfMarketParticipant обязательно.',
                    'validateEntityId' => 'Неверный формат idOfMarketParticipant для выбранного типа {param}.'
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
                'rules' => 'required|validateEntityId[otherMarketParticipantType]',
                'errors' => [
                    'required' => 'Поле otherMarketParticipant обязательно.',
                    'validateEntityId' => 'Неверный формат otherMarketParticipant для выбранного типа {param}.'
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
                'rules' => 'required|in_list[P,A]',
                'errors' => [
                    'required' => 'Поле tradingCapacity обязательно.',
                    'in_list' => 'tradingCapacity может быть только значением "P" или "A".',
                ]
            ],
            'buySellIndicator' => [
                'label' => 'buySellIndicator',
                'rules' => 'required|in_list[B,S,C]',
                'errors' => [
                    'required' => 'Поле buySellIndicator обязательно.',
                    'in_list' => 'buySellIndicator может быть только значением "B", "S" или "C".',

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
                'rules' => 'required|in_list[SO,FW,FU,OP,OP_FW,OP_FU,OP_SW,SP,SW,OT]',
                'errors' => [
                    'required' => 'Поле contractType обязательно.',
                    'in_list' => 'contractType может быть только одним из допустимых значений: SO, FW, FU, OP, OP_FW, OP_FU, OP_SW, SP, SW, OT.',
                ]
            ],
            'energyCommodity' => [
                'label' => 'energyCommodity',
                'rules' => 'required|in_list[EL,NG]',
                'errors' => [
                    'required' => 'Поле energyCommodity обязательно.',
                    'in_list' => 'energyCommodity может быть только одним из допустимых значений: EL, NG.',
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
                'rules' => 'required|in_list[V,F,M,C,O]',
                'errors' => [
                    'required' => 'Поле volumeOptionalty обязательно.',
                    'in' => 'Поле volumeOptionalty должно содержать одно из следующих значений: V, F, M, C, O.'
                ]
            ],
            'typeOfIndexPrice' => [
                'label' => 'typeOfIndexPrice',
                'rules' => 'required|in_list[F,I,C,O]',
                'errors' => [
                    'required' => 'Поле typeOfIndexPrice обязательно.',
                    'in' => 'typeOfIndexPrice должно быть одним из следующих значений: F, I, C, O.'
                ]
            ],
            'fixingIndex' => [
                'label' => 'fixingIndex',
                'rules' => 'required|max_length[150]|regex_match[/^[A-Za-z0-9_ \-]+$/]',
                'errors' => [
                    'required' => 'Поле fixingIndex обязательно.',
                    'max_length' => 'fixingIndex не должен превышать 150 символов.',
                    'regex_match' => 'fixingIndex может содержать только латинские буквы, цифры, пробел, подчёркивание и дефис.'
                ]
            ],
            'fixingIndexType' => [
                'label' => 'fixingIndexType',
                'rules' => 'required|in_list[SO,FW,FU,OP,OP_FW,OP_FU,OP_SW,SP,SW,OT]',
                'errors' => [
                    'required' => 'Поле fixingIndexType обязательно.',
                    'in_list' => 'fixingIndexType должен быть одним из: SO, FW, FU, OP, OP_FW, OP_FU, OP_SW, SP, SW, OT.'
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
                'rules' => 'required|in_list[P,C,O]',
                'errors' => [
                    'required' => 'Поле settlementMethod обязательно.',
                    'in_list' => 'settlementMethod должен быть одним из следующих значений: P, C, O.'
                ]
            ],
            'deliveryPointOrZone' => [
                'label' => 'deliveryPointOrZone',
                'rules' => 'required|exact_length[16]|regex_match[/^[0-9]{2}[XYZTWV][A-Z0-9]{13}$/]',
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
                'rules' => 'required|exact_length[2]|in_list[BL,PL,OP,BH,SH,GD,OT]',
                'errors' => [
                    'required' => 'Поле loadType обязательно.',
                    'exact_length' => 'loadType должен быть длиной 2 символа.',
                    'in_list' => 'loadType должен быть одним из следующих значений: BL, PL, OP, BH, SH, GD, OT.'
                ]
            ],
            'actionType' => [
                'label' => 'actionType',
                'rules' => 'required|in_list[N,M,E,C]|exact_length[1]',
                'errors' => [
                    'required' => 'Поле actionType обязательно.',
                    'in' => 'actionType должен быть одним из: N, M, E, C.',
                    'exact_length' => 'actionType должен быть длиной 1 символ.',
                ]
            ],
        ];
    }

    /**
     * Кастомная функция валидации для полей с типами (ace, lei, bic, eic, gln)
     *
     * @param string $str Значение поля (например, reportingEntityID)
     * @param string|null $fields $fields Имя поля с типом (например, reportingEntityType)
     * @param array $data Все данные формы
     * @return bool
     */
    public function validateEntityId(string $str, ?string $fields, array $data): bool
    {
        if (!isset($data[$fields])) {
            return false;
        }

        $type = $data[$fields];

        return match ($type) {
            'ace' => strlen($str) === 12 && preg_match('/^[A-Za-z0-9_]+\.[A-Z]{2}$/', $str),
            'lei' => strlen($str) === 20 && preg_match('/^[A-Za-z0-9_]+$/', $str),
            'bic' => strlen($str) === 11 && preg_match('/^[A-Za-z0-9_]+$/', $str),
            'eic' => strlen($str) === 16 && preg_match('/^[0-9]{2}[XYZTWV].+$/', $str),
            'gln' => strlen($str) === 13 && preg_match('/^[A-Za-z0-9_]+$/', $str),
            default => false,
        };
    }
}