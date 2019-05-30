<?php

namespace App\Http\Services;

use App\Http\Repositories\TemplateRepository;
use Config;

class TemplateService extends Service
{
    private $templateRepo;

    public function __construct(TemplateRepository $mr) {
        $this->templateRepo = $mr;
    }

    /**
     * @param Int $id
     * @param Array data
     */
    public function getAll() {
        try {
            $templates = $this->templateRepo->getAll();
            return $this->getResponse(200, 'Get all templates success', $templates);
        }
        catch(ServiceException $e) {
            return $e;
        }
    }
}
