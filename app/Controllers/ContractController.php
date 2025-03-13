<?php

namespace App\Controllers;

use App\Models\ContractModel;
use App\Services\XmlContractExporter;
use App\Validation\ContractValidationRules;
use CodeIgniter\Controller;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Validation\ValidationInterface;
use Config\Services;
use DOMException;
use ReflectionException;

class ContractController extends Controller
{
    protected ContractModel $contractModel;
    protected ValidationInterface $validation;

    public function __construct()
    {
        $this->contractModel = new ContractModel();
        $this->validation = Services::validation();
    }

    /**
     * @return string
     */
    public function index(): string
    {
        $data['contracts'] = $this->contractModel
            ->orderBy('created_at', 'DESC')
            ->findAll();
        return view('contract_list', $data);
    }

    /**
     * @return string
     */
    public function create(): string
    {
        return view('create_form');
    }

    /**
     * @throws ReflectionException
     */
    public function store(): RedirectResponse
    {
        $data = $this->getContractDataFromRequest();
        $validationRules = new ContractValidationRules();

        $this->validation->setRules($validationRules->getValidationRules());

        if (!$this->validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }

        if ($this->contractModel->insert($data)) {
            return redirect()->to('/')->with('success', 'Contract created successfully');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to create contract');
    }

    /**
     * @param int $id
     * @return string|RedirectResponse
     */
    public function edit(int $id): string|RedirectResponse
    {
        $contract = $this->contractModel->find($id);

        if (!$contract) {
            return redirect()->back()->with('error', 'Contract not found');
        }

        $data['contract'] = $contract;
        return view('create_form', $data);
    }

    /**
     * @param int $id
     * @return RedirectResponse
     * @throws ReflectionException
     */
    public function update(int $id): RedirectResponse
    {
        $data = $this->getContractDataFromRequest();

        $validationRules = new ContractValidationRules();

        $this->validation->setRules($validationRules->getValidationRules());

        if (!$this->validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }

        if ($this->contractModel->update($id, $data)) {
            return redirect()->to('/')->with('success', 'Contract updated successfully');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to update contract');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $contract = $this->contractModel->find($id);
        if ($contract) {
            $this->contractModel->delete($id);
            return redirect()->to('/')->with('success', 'Contract deleted successfully');
        }
        return redirect()->to('/')->with('error', 'Contract not found');
    }

    /**
     * @return array
     */
    private function getContractDataFromRequest(): array
    {
        return [
            'reporting_entity_id' => $this->request->getPost('reportingEntityID'),
            'reporting_entity_type' => $this->request->getPost('reportingEntityType'),
            'record_seq_number' => $this->request->getPost('recordSeqNumber'),
            'id_of_market_participant' => $this->request->getPost('idOfMarketParticipant'),
            'id_of_market_participant_type' => $this->request->getPost('idOfMarketParticipantType'),
            'other_market_participant' => $this->request->getPost('otherMarketParticipant'),
            'other_market_participant_type' => $this->request->getPost('otherMarketParticipantType'),
            'trading_capacity' => $this->request->getPost('tradingCapacity'),
            'buy_sell_indicator' => $this->request->getPost('buySellIndicator'),
            'contract_id' => $this->request->getPost('contractId'),
            'contract_date' => $this->request->getPost('contractDate'),
            'contract_type' => $this->request->getPost('contractType'),
            'energy_commodity' => $this->request->getPost('energyCommodity'),
            'price_formula' => $this->request->getPost('priceFormula'),
            'estimated_notional_amount_value' => $this->request->getPost('estimatedNotionalAmountValue'),
            'estimated_notional_amount_unit' => $this->request->getPost('estimatedNotionalAmountUnit'),
            'volume_optionalty' => $this->request->getPost('volumeOptionalty'),
            'type_of_index_price' => $this->request->getPost('typeOfIndexPrice'),
            'fixing_index' => $this->request->getPost('fixingIndex'),
            'fixing_index_type' => $this->request->getPost('fixingIndexType'),
            'fixing_index_source' => $this->request->getPost('fixingIndexSource'),
            'first_fixing_date' => $this->request->getPost('firstFixingDate'),
            'last_fixing_date' => $this->request->getPost('lastFixingDate'),
            'fixing_frequency' => $this->request->getPost('fixingFrequency'),
            'settlement_method' => $this->request->getPost('settlementMethod'),
            'delivery_point_or_zone' => $this->request->getPost('deliveryPointOrZone'),
            'delivery_start_date' => $this->request->getPost('deliveryStartDate'),
            'delivery_end_date' => $this->request->getPost('deliveryEndDate'),
            'load_type' => $this->request->getPost('loadType'),
            'action_type' => $this->request->getPost('actionType'),
        ];
    }

    /**
     * @param int $id
     * @return void
     * @throws DOMException
     */
    public function download(int $id): void
    {
        $contract = $this->contractModel->find($id);
        if ($contract) {
            $exporter = new XmlContractExporter();
            $exporter->export($contract);
        }

        throw PageNotFoundException::forPageNotFound();
    }
}