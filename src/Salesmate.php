<?php

namespace instantjay\salesmatephp;

use GuzzleHttp\Psr7\Request;
use instantjay\salesmatephp\Entity\Deal;
use instantjay\salesmatephp\Entity\User;
use instantjay\salesmatephp\Exception\EmptyResultException;

/**
 * Class Salesmate
 * @package instantjay\salesmatephp
 */
class Salesmate
{
    const PIPELINE_EDITABLE_FIELD_ID = 69;

    private $connection;

    /**
     * Salesmate constructor.
     * @param $salesmateConnection SalesmateConnection
     */
    public function __construct($salesmateConnection)
    {
        $this->connection = $salesmateConnection;
    }

    /**
     * @return User[]
     * @throws EmptyResultException
     */
    public function getActiveUsers() : array
    {
        $client = $this->connection->getHttpClient();

        $request = new Request('GET', $this->connection->getUrl()."/users/active");

        $response = $client->send($request);

        $salesmateResponse = new SalesmateResponse($response);

        if (!$salesmateResponse->isSuccessful()) {
            throw new EmptyResultException('No users found.');
        }

        $users = [];

        foreach ($salesmateResponse->getData() as $i => $data) {
            $users[] = new User($data);
        }

        return $users;
    }

    /**
     * @param int $dealId
     * @return Deal
     * @throws EmptyResultException
     */
    public function getDeal($dealId) : Deal
    {
        $client = $this->connection->getHttpClient();

        $request = new Request('GET', $this->connection->getUrl().'/deals/'.$dealId);

        $response = $client->send($request);

        $salesmateResponse = new SalesmateResponse($response);

        if (!$salesmateResponse->isSuccessful()) {
            throw new EmptyResultException();
        }

        return new Deal($salesmateResponse->getData());
    }

    /**
     * @return array
     * @throws EmptyResultException
     */
    private function getEditableFields() : array
    {
        $client = $this->connection->getHttpClient();

        $request = new Request('GET', $this->connection->getUrl().'/deals/getEditableFields');

        $response = $client->send($request);

        $salesmateResponse = new SalesmateResponse($response);

        if (!$salesmateResponse->isSuccessful()) {
            throw new EmptyResultException();
        }

        return $salesmateResponse->getData();
    }

    /**
     * @param $editableFieldId
     * @return mixed|null
     * @throws EmptyResultException
     */
    private function getEditableFieldById($editableFieldId)
    {
        $editableFields = $this->getEditableFields();

        foreach ($editableFields as $editableField) {
            if ($editableField['id'] == $editableFieldId) {
                return $editableField;
            }
        }

        return null;
    }

    /**
     * @return array
     * @throws EmptyResultException
     */
    public function getPipelineNames() : array
    {
        $editableField = $this->getEditableFieldById(self::PIPELINE_EDITABLE_FIELD_ID);
        $fieldOptions = json_decode($editableField['fieldOptions'], true);

        $pipelines = [];

        foreach ($fieldOptions['values'] as $value) {
            $pipelines[] = $value;
        }

        return $pipelines;
    }

    /**
     * @param $pipelineName
     * @return array
     * @throws EmptyResultException
     */
    public function getStageNames($pipelineName) : array
    {
        $editableField = $this->getEditableFieldById(self::PIPELINE_EDITABLE_FIELD_ID);
        $fieldOptions = json_decode($editableField['fieldOptions'], true);

        $stages = [];

        foreach ($fieldOptions['mappedDependency'][0]['rules'][$pipelineName] as $value) {
            $stages[] = $value;
        }

        return $stages;
    }
}
