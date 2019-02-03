<?php namespace std\fieldControls\toggle\controllers\main;

class Xhr extends \Controller
{
    public $allow = self::XHR;

    public function toggle()
    {
        if ($cell = $this->unxpackCell()) {
            $cell->value(!$cell->value());

            $this->e(underscore_field($cell->model, $cell->field))->trigger([
                                                                                'model' => $cell->model,
                                                                                'field' => $cell->field
                                                                            ]);
        }
    }
}
