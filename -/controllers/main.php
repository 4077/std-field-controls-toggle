<?php namespace std\fieldControls\toggle\controllers;

class Main extends \Controller
{
    private $model;

    private $field;

    public function __create()
    {
        $model = $this->model = $this->data['model'];
        $field = $this->field = $this->data['field'];

        $this->instance_(underscore_cell($model, $field));
    }

    public function reload()
    {
        $this->jquery('|')->replace($this->view());
    }

    public function view()
    {
        $v = $this->v('|');

        $model = $this->model;
        $field = $this->field;

        $value = $model->{$field};

        $v->assign([
                       'CONTENT' => $this->c('\std\ui button:view', [
                           'path'                        => '>xhr:toggle',
                           'data'                        => [
                               'cell' => xpack_cell($model, $field)
                           ],
                           'class'                       => 'button ' . ($value ? 'checked' : ''),
                           'eventTriggerClosestSelector' => '.cell',
                           'title'                       => $value ? 'Выключить' : 'Включить',
                           'content'                     => '<div class="icon"></div>'
                       ])
                   ]);

        $this->css(':\js\jquery\ui icons');

        $this->e(underscore_field($model, $field))->rebind(':reload');

        return $v;
    }
}
