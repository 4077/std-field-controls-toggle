<?php namespace std\fieldControls\toggle\controllers;

class Main extends \Controller
{
    /**
     * @var \ewma\Data\Cell
     */
    private $cell;

    public function __create()
    {
        $this->cell = $this->unpackCell();

        $this->instance_($this->cell->xpack());
    }

    public function reload()
    {
        $this->jquery('|')->replace($this->view());
    }

    public function view()
    {
        $v = $this->v('|');

        $value = $this->cell->value();

        $v->assign([
                       'CONTENT' => $this->c('\std\ui button:view', [
                           'path'                        => '>xhr:toggle',
                           'data'                        => [
                               'cell' => $this->cell->xpack()
                           ],
                           'class'                       => 'button ' . ($value ? 'checked' : ''),
                           'eventTriggerClosestSelector' => '.cell',
                           'title'                       => $value ? 'Выключить' : 'Включить',
                           'content'                     => '<div class="icon"></div>'
                       ])
                   ]);

        $this->css(':\js\jquery\ui icons');

        if (!$this->app->html->containerAdded($this->_nodeId())) {
            $this->app->html->addContainer($this->_nodeId(), $this->c('eventsDispatcher:view'));
        }

        return $v;
    }
}
