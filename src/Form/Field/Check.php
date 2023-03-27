<?php

namespace Dcat\Admin\Form\Field;

use Dcat\Admin\Form\Field;
use Dcat\Admin\Form\Field\CanCascadeFields;
use Dcat\Admin\Form\Field\CanLoadFields;
use Dcat\Admin\Form\Field\Sizeable;

class Check extends Field
{
    use CanCascadeFields;
    use CanLoadFields;
    use Sizeable;

    protected $cascadeEvent = 'change';

    /**
     * @param  mixed  $value
     * @return int
     */
    protected function prepareInputValue($value)
    {
        return $value ? 1 : 0;
    }

    public function render()
    {
        $this->addCascadeScript();

        $this->attribute('name', $this->getElementName());
        $this->attribute('value', 1);
        $this->attribute('type', 'checkbox');
        #$this->attribute('data-plugin', $this->getFormElementId() . 'switchery');

        return parent::render();
    }
}
