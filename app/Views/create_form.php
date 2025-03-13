<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Create/Edit - REMIT cloud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.9/dist/inputmask.min.js"></script>
    <style>
        .header-bg {
            background-color: #007bff;
            color: #ffffff;
            height: 60px;
            display: flex;
            align-items: center;
        }

        .main-bg {
            background-color: #ffffff;
            min-height: 80vh;
            padding: 20px 0;
        }

        .form-notice {
            color: #dc3545;
            font-size: 0.9em;
            margin-top: 5px;
        }

        .btn-ask {
            background-color: #007bff;
            color: #ffffff;
            margin-right: 10px;
        }

        .btn-save {
            background-color: #28a745;
            color: #ffffff;
        }
    </style>
</head>
<body>

<header class="header-bg">
    <div class="container d-flex justify-content-between align-items-center">
        <div>REMIT group</div>
        <a href="/" style="color: white; text-decoration: none;">File list</a>
    </div>
</header>

<nav class="container mt-2">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">File</li>
        <li class="breadcrumb-item active"><?= isset($contract) ? 'Edit' : 'Create' ?></li>
    </ol>
</nav>

<main class="main-bg">
    <div class="container">
        <?php if (session()->has('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session('errors') as $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-12">
                <form method="post"
                      action="<?= isset($contract) ? '/contracts/update/' . $contract['id'] : '/contracts/store' ?>">
                    <?= csrf_field() ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="reportingEntityID" class="form-label">reportingEntityID</label>
                                <input type="text" class="form-control" id="reportingEntityID" name="reportingEntityID"
                                       value="<?= isset($contract) ? $contract['reporting_entity_id'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="reportingEntityType" class="form-label">reportingEntityID type</label>
                                <select class="form-select" id="reportingEntityType" name="reportingEntityType"
                                        required>
                                    <option value="ace" <?= isset($contract) && $contract['reporting_entity_type'] === 'ace' ? 'selected' : '' ?>>
                                        ace
                                    </option>
                                    <option value="lei" <?= isset($contract) && $contract['reporting_entity_type'] === 'lei' ? 'selected' : '' ?>>
                                        lei
                                    </option>
                                    <option value="bic" <?= isset($contract) && $contract['reporting_entity_type'] === 'bic' ? 'selected' : '' ?>>
                                        bic
                                    </option>
                                    <option value="eic" <?= isset($contract) && $contract['reporting_entity_type'] === 'eic' ? 'selected' : '' ?>>
                                        eic
                                    </option>
                                    <option value="gln" <?= isset($contract) && $contract['reporting_entity_type'] === 'gln' ? 'selected' : '' ?>>
                                        gln
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="recordSeqNumber" class="form-label">recordSeqNumber</label>
                                <input type="number" class="form-control" id="recordSeqNumber" name="recordSeqNumber"
                                       value="<?= isset($contract) ? $contract['record_seq_number'] : '1' ?>">
                                <div class="form-notice">example: min 1</div>
                            </div>
                            <div class="mb-3">
                                <label for="idOfMarketParticipant" class="form-label">idOfMarketParticipant</label>
                                <input type="text" class="form-control" id="idOfMarketParticipant"
                                       name="idOfMarketParticipant"
                                       value="<?= isset($contract) ? $contract['id_of_market_participant'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="idOfMarketParticipantType" class="form-label">idOfMarketParticipant
                                    type</label>
                                <select class="form-select" id="idOfMarketParticipantType"
                                        name="idOfMarketParticipantType">
                                    <option value="ace" <?= isset($contract) && $contract['id_of_market_participant_type'] === 'ace' ? 'selected' : '' ?>>
                                        ace
                                    </option>
                                    <option value="lei" <?= isset($contract) && $contract['id_of_market_participant_type'] === 'lei' ? 'selected' : '' ?>>
                                        lei
                                    </option>
                                    <option value="bic" <?= isset($contract) && $contract['id_of_market_participant_type'] === 'bic' ? 'selected' : '' ?>>
                                        bic
                                    </option>
                                    <option value="eic" <?= isset($contract) && $contract['id_of_market_participant_type'] === 'eic' ? 'selected' : '' ?>>
                                        eic
                                    </option>
                                    <option value="gln" <?= isset($contract) && $contract['id_of_market_participant_type'] === 'gln' ? 'selected' : '' ?>>
                                        gln
                                    </option>
                                </select>
                                <div class="form-notice">example: ace, lei, bic, eic, gln</div>
                            </div>
                            <div class="mb-3">
                                <label for="otherMarketParticipant" class="form-label">otherMarketParticipant</label>
                                <input type="text" class="form-control" id="otherMarketParticipant"
                                       name="otherMarketParticipant"
                                       value="<?= isset($contract) ? $contract['other_market_participant'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="otherMarketParticipantType" class="form-label">otherMarketParticipant
                                    type</label>
                                <select class="form-select" id="otherMarketParticipantType"
                                        name="otherMarketParticipantType">
                                    <option value="ace" <?= isset($contract) && $contract['other_market_participant_type'] === 'ace' ? 'selected' : '' ?>>
                                        ace
                                    </option>
                                    <option value="lei" <?= isset($contract) && $contract['other_market_participant_type'] === 'lei' ? 'selected' : '' ?>>
                                        lei
                                    </option>
                                    <option value="bic" <?= isset($contract) && $contract['other_market_participant_type'] === 'bic' ? 'selected' : '' ?>>
                                        bic
                                    </option>
                                    <option value="eic" <?= isset($contract) && $contract['other_market_participant_type'] === 'eic' ? 'selected' : '' ?>>
                                        eic
                                    </option>
                                    <option value="gln" <?= isset($contract) && $contract['other_market_participant_type'] === 'gln' ? 'selected' : '' ?>>
                                        gln
                                    </option>
                                </select>
                                <div class="form-notice">example: ace, lei, bic, eic, gln</div>
                            </div>
                            <div class="mb-3">
                                <label for="tradingCapacity" class="form-label">tradingCapacity</label>
                                <input type="text" class="form-control" id="tradingCapacity" name="tradingCapacity"
                                       value="<?= isset($contract) ? $contract['trading_capacity'] : 'P' ?>">
                                <div class="form-notice">example: P or A</div>
                            </div>
                            <div class="mb-3">
                                <label for="buySellIndicator" class="form-label">buySellIndicator</label>
                                <input type="text" class="form-control" id="buySellIndicator" name="buySellIndicator"
                                       value="<?= isset($contract) ? $contract['buy_sell_indicator'] : 'S' ?>">
                                <div class="form-notice">example: B or S or C</div>
                            </div>
                            <div class="mb-3">
                                <label for="contractId" class="form-label">contractId</label>
                                <input type="text" class="form-control" id="contractId" name="contractId"
                                       value="<?= isset($contract) ? $contract['contract_id'] : 'AQN1qaRf20kwi0GbI3tJlkwqp2z0OlFqVEWUCHTEST001' ?>">
                                <div class="form-notice">example: AQN1qaRf20kwi0GbI3tJlkwqp2z0OlFqVEWUCHTEST001</div>
                            </div>
                            <div class="mb-3">
                                <label for="contractDate" class="form-label">contractDate</label>
                                <input type="text" class="form-control" id="contractDate" name="contractDate"
                                       value="<?= isset($contract) ? $contract['contract_date'] : '2021-11-29' ?>">
                                <div class="form-notice">example:2025-03-11</div>
                            </div>
                            <div class="mb-3">
                                <label for="contractType" class="form-label">contractType</label>
                                <input list="contractTypeOptions" class="form-control" id="contractType"
                                       name="contractType"
                                       value="<?= isset($contract) ? $contract['contract_type'] : '' ?>">
                                <datalist id="contractTypeOptions">
                                    <option value="SO">
                                    <option value="FW">
                                    <option value="FU">
                                    <option value="OP">
                                    <option value="OP_FW">
                                    <option value="OP_FU">
                                    <option value="OP_SW">
                                    <option value="SP">
                                    <option value="SW">
                                    <option value="OT">
                                </datalist>
                                <div class="form-notice">example: FW, OP_FW</div>
                            </div>
                            <div class="mb-3">
                                <label for="energyCommodity" class="form-label">energyCommodity</label>
                                <input type="text" class="form-control" id="energyCommodity" name="energyCommodity"
                                       value="<?= isset($contract) ? $contract['energy_commodity'] : 'EL' ?>">
                                <div class="form-notice">example: EL or NG</div>
                            </div>
                            <div class="mb-3">
                                <label for="priceFormula" class="form-label">priceFormula</label>
                                <input type="text" class="form-control" id="priceFormula" name="priceFormula"
                                       value="<?= isset($contract) ? $contract['price_formula'] : '0,51*DEBY+0,22*DEPY' ?>">
                                <div class="form-notice">example: 0,51*DEBY+0,22*DEPY</div>
                            </div>
                            <div class="mb-3">
                                <label for="estimatedNotionalAmountValue" class="form-label">estimatedNotionalAmount
                                    value</label>
                                <input type="text" class="form-control" id="estimatedNotionalAmountValue"
                                       name="estimatedNotionalAmountValue"
                                       value="<?= isset($contract) ? $contract['estimated_notional_amount_value'] : 0 ?>">
                                <div class="form-notice">example: 123.45</div>
                            </div>
                            <div class="mb-3">
                                <label for="estimatedNotionalAmountUnit" class="form-label">estimatedNotionalAmount unit</label>
                                <input type="text" class="form-control" id="estimatedNotionalAmountUnit" name="estimatedNotionalAmountUnit"
                                       value="<?= isset($contract) ? $contract['estimated_notional_amount_unit'] : 'MWh' ?>"
                                       list="estimatedNotionalAmountUnitOptions">
                                <datalist id="estimatedNotionalAmountUnitOptions">
                                    <option value="KWh">
                                    <option value="MWh">
                                    <option value="GWh">
                                    <option value="Therm">
                                    <option value="KTherm">
                                    <option value="MTherm">
                                    <option value="cm">
                                    <option value="mcm">
                                    <option value="Btu">
                                    <option value="MMBtu">
                                    <option value="MJ">
                                    <option value="MMJ">
                                    <option value="100MJ">
                                    <option value="GJ">
                                </datalist>
                                <div class="form-notice">example: MWh</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="volumeOptionalty" class="form-label">volumeOptionality</label>
                                <input type="text" class="form-control" id="volumeOptionalty" name="volumeOptionalty"
                                       list="volumeOptionaltyOptions"
                                       value="<?= isset($contract) ? $contract['volume_optionalty'] : 'V' ?>">
                                <datalist id="volumeOptionaltyOptions">
                                    <option value="V">V</option>
                                    <option value="F">F</option>
                                    <option value="M">M</option>
                                    <option value="C">C</option>
                                    <option value="O">O</option>
                                </datalist>
                                <div class="form-notice">Example: V (Available: V, F, M, C, O)</div>
                            </div>
                            <div class="mb-3">
                                <label for="typeOfIndexPrice" class="form-label">typeOfIndexPrice</label>
                                <input type="text" class="form-control" id="typeOfIndexPrice" name="typeOfIndexPrice"
                                       list="typeOfIndexPriceOptions"
                                       value="<?= isset($contract) ? $contract['type_of_index_price'] : 'I' ?>">
                                <datalist id="typeOfIndexPriceOptions">
                                    <option value="F">F</option>
                                    <option value="I">I</option>
                                    <option value="C">C</option>
                                    <option value="O">O</option>
                                </datalist>
                                <div class="form-notice">Example: I (Available: F, I, C, O)</div>
                            </div>
                            <div class="mb-3">
                                <label for="fixingIndex" class="form-label">fixingIndex</label>
                                <input type="text" class="form-control" id="fixingIndex" name="fixingIndex"
                                       value="<?= isset($contract) ? $contract['fixing_index'] : 'EEX DE Settlement' ?>">
                                <div class="form-notice">example: EEX DE Settlement</div>
                            </div>
                            <div class="mb-3">
                                <label for="fixingIndexType" class="form-label">fixingIndexType</label>
                                <input type="text"
                                       class="form-control"
                                       id="fixingIndexType"
                                       name="fixingIndexType"
                                       list="fixingIndexTypeOptions"
                                       value="<?= isset($contract) ? $contract['fixing_index_type'] : 'FU' ?>">
                                <datalist id="fixingIndexTypeOptions">
                                    <option value="SO">SO</option>
                                    <option value="FW">FW</option>
                                    <option value="FU">FU</option>
                                    <option value="OP">OP</option>
                                    <option value="OP_FW">OP_FW</option>
                                    <option value="OP_FU">OP_FU</option>
                                    <option value="OP_SW">OP_SW</option>
                                    <option value="SP">SP</option>
                                    <option value="SW">SW</option>
                                    <option value="OT">OT</option>
                                </datalist>
                                <div class="form-notice">Допустимые значения: SO, FW, FU, OP, OP_FW, OP_FU, OP_SW, SP,
                                    SW, OT
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="fixingIndexSource" class="form-label">fixingIndexSource</label>
                                <input type="text" class="form-control" id="fixingIndexSource" name="fixingIndexSource"
                                       value="<?= isset($contract) ? $contract['fixing_index_source'] : 'EEX' ?>">
                                <div class="form-notice">example: EEX</div>
                            </div>
                            <div class="mb-3">
                                <label for="firstFixingDate" class="form-label">firstFixingDate</label>
                                <input type="text" class="form-control" id="firstFixingDate" name="firstFixingDate"
                                       value="<?= isset($contract) ? $contract['first_fixing_date'] : '2021-11-29' ?>">
                                <div class="form-notice">example:2025-03-11</div>
                            </div>
                            <div class="mb-3">
                                <label for="lastFixingDate" class="form-label">lastFixingDate</label>
                                <input type="text" class="form-control" id="lastFixingDate" name="lastFixingDate"
                                       value="<?= isset($contract) ? $contract['last_fixing_date'] : '2022-12-15' ?>">
                                <div class="form-notice">example:2025-03-11</div>
                            </div>
                            <div class="mb-3">
                                <label for="fixingFrequency" class="form-label">fixingFrequency</label>
                                <input type="text"
                                       class="form-control"
                                       id="fixingFrequency"
                                       name="fixingFrequency"
                                       list="fixingFrequencyOptions"
                                       value="<?= isset($contract) ? htmlspecialchars($contract['fixing_frequency']) : '' ?>">
                                <datalist id="fixingFrequencyOptions">
                                    <option value="X">X</option>
                                    <option value="H">H</option>
                                    <option value="D">D</option>
                                    <option value="W">W</option>
                                    <option value="M">M</option>
                                    <option value="Q">Q</option>
                                    <option value="S">S</option>
                                    <option value="A">A</option>
                                    <option value="O">O</option>
                                </datalist>
                                <div class="form-notice">Допустимые значения: X, H, D, W, M, Q, S, A, O или пусто (поле
                                    необязательное)
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="settlementMethod" class="form-label">settlementMethod</label>
                                <input type="text"
                                       class="form-control"
                                       id="settlementMethod"
                                       name="settlementMethod"
                                       list="settlementMethodOptions"
                                       value="<?= isset($contract) ? $contract['settlement_method'] : 'P' ?>">
                                <datalist id="settlementMethodOptions">
                                    <option value="P">P</option>
                                    <option value="C">C</option>
                                    <option value="O">O</option>
                                </datalist>
                                <div class="form-notice">Допустимые значения: P, C, O</div>
                            </div>
                            <div class="mb-3">
                                <label for="deliveryPointOrZone" class="form-label">deliveryPointOrZone</label>
                                <input type="text" class="form-control" id="deliveryPointOrZone"
                                       name="deliveryPointOrZone"
                                       value="<?= isset($contract) ? htmlspecialchars($contract['delivery_point_or_zone']) : '' ?>">
                                <div class="form-notice">
                                    Пример: <code>10YDE10020030040</code> (2 цифры, затем любая буква из "XYZTWV", затем
                                    14 любых символов)
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="deliveryStartDate" class="form-label">deliveryStartDate</label>
                                <input type="text" class="form-control" id="deliveryStartDate" name="deliveryStartDate"
                                       value="<?= isset($contract) ? $contract['delivery_start_date'] : '2022-01-01' ?>">
                                <div class="form-notice">example:2025-03-11</div>
                            </div>
                            <div class="mb-3">
                                <label for="deliveryEndDate" class="form-label">deliveryEndDate</label>
                                <input type="text" class="form-control" id="deliveryEndDate" name="deliveryEndDate"
                                       value="<?= isset($contract) ? $contract['delivery_end_date'] : '2023-12-31' ?>">
                                <div class="form-notice">example: YYYY-MM-DD, например: 2023-12-31</div>
                            </div>
                            <div class="mb-3">
                                <label for="loadType" class="form-label">loadType</label>
                                <input type="text" class="form-control" id="loadType" name="loadType"
                                       list="loadTypeOptions"
                                       value="<?= isset($contract) ? htmlspecialchars($contract['load_type']) : 'SH' ?>">
                                <datalist id="loadTypeOptions">
                                    <option value="BL">
                                    <option value="PL">
                                    <option value="OP">
                                    <option value="BH">
                                    <option value="SH">
                                    <option value="GD">
                                    <option value="OT">
                                </datalist>
                                <div class="form-notice">example: BL, PL, OP, BH, SH, GD, OT</div>
                            </div>
                            <div class="mb-3">
                                <label for="actionType" class="form-label">actionType</label>
                                <input type="text" class="form-control" id="actionType" name="actionType" list="actionTypeOptions"
                                       value="<?= isset($contract) ? htmlspecialchars($contract['action_type']) : 'N' ?>">
                                <datalist id="actionTypeOptions">
                                    <option value="N">
                                    <option value="M">
                                    <option value="E">
                                    <option value="C">
                                </datalist>
                                <div class="form-notice">example: N, M, E, C</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button class="btn btn-ask" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Ask to edit">
                            <i class="bi bi-question-circle"></i> Ask to edit
                        </button>
                        <button type="submit" class="btn btn-save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof Inputmask === 'undefined') {
            console.error('Inputmask не загружен. Проверьте подключение библиотеки.');
            return;
        }

        const reportingEntityID = document.getElementById('reportingEntityID');
        const reportingEntityType = document.getElementById('reportingEntityType');
        const idOfMarketParticipant = document.getElementById('idOfMarketParticipant');
        const idOfMarketParticipantType = document.getElementById('idOfMarketParticipantType');
        const otherMarketParticipant = document.getElementById('otherMarketParticipant');
        const otherMarketParticipantType = document.getElementById('otherMarketParticipantType');

        let reportingMask, marketMask, otherMarketMask;

        function updateMask(input, select, maskVar) {
            const type = select.value;
            if (maskVar) maskVar.remove();

            switch (type) {
                case 'ace':
                    maskVar = Inputmask({regex: '[A-Za-z0-9_]{1,10}\\.[A-Z]{2}', placeholder: ''}).mask(input);
                    input.placeholder = 'example: B0001064H.DE';
                    break;
                case 'lei':
                    maskVar = Inputmask({regex: '[A-Za-z0-9_]{20}', placeholder: ''}).mask(input);
                    input.placeholder = 'example: ABCDE12345FGHIJ67890';
                    break;
                case 'bic':
                    maskVar = Inputmask({regex: '[A-Za-z0-9_]{11}', placeholder: ''}).mask(input);
                    input.placeholder = 'example: ABCD1234567';
                    break;
                case 'eic':
                    maskVar = Inputmask({regex: '[0-9]{2}[XYZTWV].{13}', placeholder: ''}).mask(input);
                    input.placeholder = 'example: 12X4567890123456 (2 digit + XYZTWV)';
                    break;
                case 'gln':
                    maskVar = Inputmask({regex: '[A-Za-z0-9_]{13}', placeholder: ''}).mask(input);
                    input.placeholder = 'example: ABC1234567890';
                    break;
            }
            return maskVar;
        }

        reportingMask = updateMask(reportingEntityID, reportingEntityType, reportingMask);
        marketMask = updateMask(idOfMarketParticipant, idOfMarketParticipantType, marketMask);
        otherMarketMask = updateMask(otherMarketParticipant, otherMarketParticipantType, otherMarketMask);

        reportingEntityType.addEventListener('change', () => {
            reportingMask = updateMask(reportingEntityID, reportingEntityType, reportingMask);
        });
        idOfMarketParticipantType.addEventListener('change', () => {
            marketMask = updateMask(idOfMarketParticipant, idOfMarketParticipantType, marketMask);
        });
        otherMarketParticipantType.addEventListener('change', () => {
            otherMarketMask = updateMask(otherMarketParticipant, otherMarketParticipantType, otherMarketMask);
        });

        document.querySelector('form').addEventListener('submit', function (e) {
            const fields = [
                {input: reportingEntityID, type: reportingEntityType, name: 'reportingEntityID'},
                {input: idOfMarketParticipant, type: idOfMarketParticipantType, name: 'idOfMarketParticipant'},
                {input: otherMarketParticipant, type: otherMarketParticipantType, name: 'otherMarketParticipant'}
            ];

            for (const field of fields) {
                const value = field.input.value;
                const type = field.type.value;
                let isValid = false;

                switch (type) {
                    case 'ace':
                        isValid = /^[A-Za-z0-9_]+\.[A-Z]{2}$/.test(value) && value.length === 12;
                        break;
                    case 'lei':
                        isValid = /^[A-Za-z0-9_]+$/.test(value) && value.length === 20;
                        break;
                    case 'bic':
                        isValid = /^[A-Za-z0-9_]+$/.test(value) && value.length === 11;
                        break;
                    case 'eic':
                        isValid = /^[0-9]{2}[XYZTWV].+$/.test(value) && value.length === 16;
                        break;
                    case 'gln':
                        isValid = /^[A-Za-z0-9_]+$/.test(value) && value.length === 13;
                        break;
                }

                if (!isValid) {
                    e.preventDefault();
                    alert(`Неверный формат для ${field.name} (${type}). Проверьте длину и символы.`);
                    return;
                }
            }
        });


        Inputmask({"mask": "A", "placeholder": ""}).mask("#tradingCapacity"); // P
        Inputmask({"mask": "A", "placeholder": ""}).mask("#buySellIndicator"); // S
        Inputmask({"regex": "^[A-Za-z0-9#:-]{1,100}$"}).mask("#contractId"); // AQN1qaRf20kwi0GbI3tJlkwqp2z0OlFqVEWUCHTEST001
        Inputmask({"mask": "9999-99-99"}).mask("#contractDate"); // 2021-11-29
        Inputmask({"mask": "AA", "placeholder": ""}).mask("#energyCommodity"); // EL
        Inputmask({"regex": "^[0-9\\.,\\*\\+\\-\\w]{0,1000}$"}).mask("#priceFormula"); // 0,51*DEBY+0,22*DEPY
        Inputmask({"regex": "^\\d{0,10}(\\.\\d{0,5})?$", "placeholder": ""}).mask("#estimatedNotionalAmountValue"); // Число или пусто
        Inputmask({"regex": "^[A-Za-z]{0,6}$", "placeholder": ""}).mask("#estimatedNotionalAmountUnit"); // MWh
        Inputmask({"mask": "A", "placeholder": ""}).mask("#volumeOptionalty"); // V
        Inputmask({"mask": "A", "placeholder": ""}).mask("#typeOfIndexPrice"); // I
        Inputmask({"regex": "^[A-Za-z0-9\\s]{0,150}$", "placeholder": ""}).mask("#fixingIndexSource"); // EEX
        Inputmask({"mask": "9999-99-99"}).mask("#firstFixingDate"); // 2021-11-29
        Inputmask({"mask": "9999-99-99"}).mask("#lastFixingDate"); // 2022-12-15
        Inputmask({"mask": "A", "placeholder": ""}).mask("#settlementMethod"); // P
        Inputmask({"mask": "9999-99-99"}).mask("#deliveryStartDate"); // 2022-01-01
        Inputmask({"mask": "9999-99-99"}).mask("#deliveryEndDate"); // 2023-12-31
        Inputmask({"mask": "AA", "placeholder": ""}).mask("#loadType"); // SH
        Inputmask({"mask": "A", "placeholder": ""}).mask("#actionType"); // N

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
</body>
</html>