<?php

namespace Dcat\Admin\Form;

use Dcat\Admin\Actions\Action;
use Dcat\Admin\Form;

abstract class AbstractTool extends Action
{
    /**
     * @var Form
     */
    protected $parent;

    /**
     * @var string
     */
    protected $style = 'btn btn-sm btn-primary';

    /**
     * Whether the action should only allow in creation page.
     *
     * @var bool
     */
    public $allowOnlyCreating = false;

    /**
     * Whether the action should only allow in edit page.
     *
     * @var bool
     */
    public $allowOnlyEditing = false;

    /**
     * @param  Form  $form
     * @return void
     */
    public function setForm(Form $form)
    {
        $this->parent = $form;
    }

    /**
     * @return array|mixed|string|null
     */
    public function getKey()
    {
        if ($this->primaryKey) {
            return $this->primaryKey;
        }

        return $this->parent ? $this->parent->getKey() : null;
    }

    /**
     * @return string
     */
    public function render()
    {
        if ($this->allowOnlyEditing && ! $this->parent->isEditing()) {
            return '';
        }

        if ($this->allowOnlyCreating && ! $this->parent->isCreating()) {
            return '';
        }

        return parent::render(); // TODO: Change the autogenerated stub
    }

    /**
     * @return void
     */
    public function setupHtmlAttributes()
    {
        $this->addHtmlClass($this->style);

        parent::setupHtmlAttributes();
    }

    /**
     * @param  mixed  ...$params
     * @return $this
     */
    public static function allowOnlyCreating(...$params)
    {
        $tool = static::make(...$params);

        $tool->allowOnlyCreating = true;
        $tool->allowOnlyEditing = false;

        return $tool;
    }

    /**
     * @param  mixed  ...$params
     * @return $this
     */
    public static function allowOnlyEditing(...$params)
    {
        $tool = static::make(...$params);

        $tool->allowOnlyEditing = true;
        $tool->allowOnlyCreating = false;

        return $tool;
    }
}