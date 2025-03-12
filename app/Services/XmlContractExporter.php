<?php

namespace App\Services;

use App\Interfaces\ContractExporterInterface;
use DOMDocument;
use DOMException;
use JetBrains\PhpStorm\NoReturn;

class XmlContractExporter implements ContractExporterInterface
{
    /**
     * @param array $contract
     * @return void
     * @throws DOMException
     */
    #[NoReturn] public function export(array $contract): void
    {
        $doc = new DOMDocument('1.0', 'UTF-8');
        $doc->formatOutput = true;
        $doc->xmlStandalone = true;

        $root = $doc->createElementNS(
            'http://www.acer.europa.eu/REMIT/REMITTable2_V1.xsd',
            'REMITTable2'
        );
        $doc->appendChild($root);

        $reportingEntityID = $doc->createElement('reportingEntityID');
        $ace = $doc->createElement('ace', $contract['reporting_entity_id']);
        $reportingEntityID->appendChild($ace);
        $root->appendChild($reportingEntityID);

        $tradeList = $doc->createElement('TradeList');
        $root->appendChild($tradeList);

        $report = $doc->createElement('nonStandardContractReport');
        $tradeList->appendChild($report);

        $this->addSimpleElement($doc, $report, 'RecordSeqNumber', $contract['record_seq_number']);

        $idOfMP = $doc->createElement('idOfMarketParticipant');
        $idOfMP->appendChild($doc->createElement('ace', $contract['id_of_market_participant']));
        $report->appendChild($idOfMP);

        $otherMP = $doc->createElement('otherMarketParticipant');
        $otherMP->appendChild($doc->createElement('ace', $contract['other_market_participant']));
        $report->appendChild($otherMP);

        $this->addSimpleElement($doc, $report, 'tradingCapacity', $contract['trading_capacity']);
        $this->addSimpleElement($doc, $report, 'buySellIndicator', $contract['buy_sell_indicator']);
        $this->addSimpleElement($doc, $report, 'contractId', $contract['contract_id']);
        $this->addSimpleElement($doc, $report, 'contractDate', $contract['contract_date']);
        $this->addSimpleElement($doc, $report, 'contractType', $contract['contract_type']);
        $this->addSimpleElement($doc, $report, 'energyCommodity', $contract['energy_commodity']);

        $priceOrFormula = $doc->createElement('priceOrPriceFormula');
        $priceOrFormula->appendChild(
            $doc->createElement('priceFormula', $contract['price_formula'])
        );
        $report->appendChild($priceOrFormula);

        $notionalAmount = $doc->createElement('estimatedNotionalAmount');
        $notionalAmount->appendChild($doc->createElement('value', $contract['estimated_notional_amount_value']));
        $notionalAmount->appendChild($doc->createElement('currency', 'EUR'));
        $report->appendChild($notionalAmount);

        $quantity = $doc->createElement('totalNotionalContractQuantity');
        $quantity->appendChild($doc->createElement('value', '0')); // As per standard
        $quantity->appendChild($doc->createElement('unit', $contract['estimated_notional_amount_unit']));
        $report->appendChild($quantity);

        $this->addSimpleElement($doc, $report, 'volumeOptionality', $contract['volume_optionalty']);
        $this->addSimpleElement($doc, $report, 'typeOfIndexPrice', $contract['type_of_index_price']);

        $fixingDetails = $doc->createElement('fixingIndexDetails');
        $this->addSimpleElement($doc, $fixingDetails, 'fixingIndex', $contract['fixing_index']);
        $this->addSimpleElement($doc, $fixingDetails, 'fixingIndexType', $contract['fixing_index_type']);
        $this->addSimpleElement($doc, $fixingDetails, 'fixingIndexSource', $contract['fixing_index_source']);
        $this->addSimpleElement($doc, $fixingDetails, 'firstFixingDate', $contract['first_fixing_date']);
        $this->addSimpleElement($doc, $fixingDetails, 'lastFixingDate', $contract['last_fixing_date']);
        $this->addSimpleElement($doc, $fixingDetails, 'fixingFrequency', $contract['fixing_frequency'] === 'X' ? 'O' : $contract['fixing_frequency']);
        $report->appendChild($fixingDetails);

        $this->addSimpleElement($doc, $report, 'settlementMethod', $contract['settlement_method']);
        $this->addSimpleElement($doc, $report, 'deliveryPointOrZone', $contract['delivery_point_or_zone']);
        $this->addSimpleElement($doc, $report, 'deliveryStartDate', $contract['delivery_start_date']);
        $this->addSimpleElement($doc, $report, 'deliveryEndDate', $contract['delivery_end_date']);
        $this->addSimpleElement($doc, $report, 'loadType', $contract['load_type']);
        $this->addSimpleElement($doc, $report, 'actionType', $contract['action_type']);

        if (ob_get_length()) {
            ob_end_clean();
        }

        $date = date('Ymd', strtotime($contract['contract_date'])); // Преобразуем дату в формат YYYYMMDD
        $filename = "{$date}_REMITTable2_V1_{$contract['id']}.xml";

        header('Content-Type: application/xml; charset=UTF-8');
        header("Content-Disposition: attachment; filename=\"{$filename}\"");
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        echo $doc->saveXML();
        exit;
    }

    /**
     * @throws DOMException
     */
    private function addSimpleElement(DOMDocument $doc, $parent, string $name, ?string $value): void
    {
        if ($value !== null) {
            $parent->appendChild($doc->createElement($name, $value));
        }
    }
}