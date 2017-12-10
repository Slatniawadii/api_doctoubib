<?php

namespace AppBundle\Service;

use AppBundle\Entity\Office;
use Elastica\Document;
use FOS\ElasticaBundle\Transformer\ModelToElasticaTransformerInterface;

class ElasticaTransformer implements ModelToElasticaTransformerInterface
{

    /**
     * @param object $office
     * @param array $fields
     * @return Document
     */
    public function transform($office, array $fields)
    {
        return new Document($office->getId(), $this->getData($office));
    }

    /**
     * @param Office $office
     * @return array
     */
    private function getData(Office $office)
    {
        $data = [];
        $data['id'] = $office->getId();
        $data['type'] = $office->getType();
        $data['name'] = $office->getName();
        $data['slug'] = $office->getSlug();
        $data['openingHours'] = $office->getOpeningHours();
        $data['address'] = $office->getAddress();
        $data['zipCode'] = $office->getZipcode();
        $data['handicapAccess'] = $office->getHandicapAccess();
        $data['floor'] = $office->getFloor();
        $data['intercom'] = $office->getIntercom();
        $data['digiCode'] = $office->getDigicode();
        $data['longitude'] = $office->getLongitude();
        $data['latitude'] = $office->getLatitude();
        $data['doctors'] = $this->getDoctors($office->getDoctors());
        $data['languages'] = $this->getLanguages($data['doctors']);
        if (!empty($office->getCity())) {
            $data['city']['id'] = $office->getCity()->getId();
            $data['city']['slug'] = $office->getCity()->getSlug();
            $data['city']['name'] = $office->getCity()->getName();
            $data['cityName'] = $office->getCity()->getName();
        } else {
            $data['city'] = [];
            $data['cityName'] = 'test';
        }

        if (!empty($office->getRegion())) {
            $data['region']['id'] = $office->getRegion()->getId();
            $data['region']['slug'] = $office->getRegion()->getSlug();
            $data['region']['name'] = $office->getRegion()->getName();
        } else {
            $data['region'] = [];
        }

        return $data;
    }

    /**
     * @param $doctors
     * @return array
     */
    private function getDoctors($doctors)
    {
        $data = [];

        foreach ($doctors as $key => $doctor) {
            $data[$key]['id'] = $doctor->getId();
            $data[$key]['firstname'] = $doctor->getFirstname();
            $data[$key]['lastname'] = $doctor->getLastname();
            $data[$key]['slug'] = $doctor->getSlug();
            $data[$key]['languages'] = [];
            $data[$key]['specialities'] = [];
            $data[$key]['civility'] = $doctor->getCivility();
            if (!empty($doctor->getSpecialities())) {
                foreach ($doctor->getSpecialities() as $skey => $speciality) {
                    $data[$key]['specialities'][$skey]['id'] = $speciality->getId();
                    $data[$key]['specialities'][$skey]['name'] = $speciality->getName();
                    $data[$key]['specialities'][$skey]['slug'] = $speciality->getSlug();
                }
            }

            if (!empty($doctor->getLanguages())) {
                foreach ($doctor->getLanguages() as $lkey => $language) {
                    $data[$key]['languages'][$lkey] = $language->getName();
                }
            }
        }

        return $data;
    }

    private function getLanguages($doctors)
    {
        $languages = [];

        foreach ($doctors as $doctor) {
            if (empty($doctor['languages'])) {
                $doctor['languages'] = ['français'];
            }
            $languages = array_merge($languages, $doctor['languages']);
        }

        return $languages;
    }
}