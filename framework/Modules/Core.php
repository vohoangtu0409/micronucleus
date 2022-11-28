<?php

namespace Module;

use Illuminate\Support\Facades\Config;

class Core
{
    protected $coreConfigExceptions = [];

    public function getConfig($field, $channel = null, $locale = null)
    {
        static $loadedConfigs = [];

        if (array_key_exists($field, $loadedConfigs) && ! in_array($field, $this->coreConfigExceptions)) {
            $coreConfigValue = $loadedConfigs[$field];
        } else {

            if (null === $locale) {
                $locale = request()->get('locale') ?: app()->getLocale();
            }

            $loadedConfigs[$field] = $coreConfigValue = $this->getCoreConfigValue($field, $channel, $locale);
        }

        if (! $coreConfigValue) {
            $fields = explode(".", $field);

            array_shift($fields);

            $field = implode(".", $fields);

            return Config::get($field);
        }
        return $coreConfigValue->value;
    }

    public function getConfigField($fieldName)
    {
        foreach (config('core') as $coreData) {
            if (isset($coreData['fields'])) {
                foreach ($coreData['fields'] as $field) {
                    $name = $coreData['key'] . '.' . $field['name'];

                    if ($name == $fieldName) {
                        return $field;
                    }
                }
            }
        }
    }

    protected function getCoreConfigValue($field, $channel, $locale)
    {
        $fields = $this->getConfigField($field);

        if (isset($fields['channel_based']) && $fields['channel_based']) {
            if (isset($fields['locale_based']) && $fields['locale_based']) {
                $coreConfigValue = $this->coreConfigRepository->findOneWhere([
                                                                                 'code'         => $field,
                                                                                 'channel_code' => $channel,
                                                                                 'locale_code'  => $locale,
                                                                             ]);
            } else {
                $coreConfigValue = $this->coreConfigRepository->findOneWhere([
                                                                                 'code'         => $field,
                                                                                 'channel_code' => $channel,
                                                                             ]);
            }
        } else {
            if (isset($fields['locale_based']) && $fields['locale_based']) {
                $coreConfigValue = $this->coreConfigRepository->findOneWhere([
                                                                                 'code'        => $field,
                                                                                 'locale_code' => $locale,
                                                                             ]);
            } else {
                $coreConfigValue = $this->coreConfigRepository->findOneWhere([
                                                                                 'code' => $field,
                                                                             ]);
            }
        }

        return $coreConfigValue;
    }


}
