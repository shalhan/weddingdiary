<?php

namespace App\Http\Repositories;

use App\Template;

class TemplateRepository extends Repository
{
    private $template;

    public function __construct(Template $template) {
        $this->template = $template;
    }

    /**
     * @param Int $id
     * @param Array data
     */
    public function getAll() {
        $templates = $this->template->get();
        return $this->getResponse($templates);        
    }

    /**
     * @param Int $id
     */

    public function dropById($id) {
        $this->template
            ->find($id)
            ->delete();
    }

    /**
     * @return Template
     */
    public function getTemplate() {
        return $this->template;
    }
}
