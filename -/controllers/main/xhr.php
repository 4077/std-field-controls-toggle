<?php namespace std\fieldControls\toggle\controllers\main;

class Xhr extends \Controller
{
    public $allow = self::XHR;

    public function reload()
    {
        if ($cell = $this->unxpackCell()) {
            $this->c('~:reload', [], 'cell');
        }
    }

    public function toggle()
    {
        if ($cell = $this->unxpackCell()) {
            $cell->value(!$cell->value());

            pusher()->trigger('std/cell/update', [
                'cell' => $cell->xpack()
            ]);
        }
    }
}
