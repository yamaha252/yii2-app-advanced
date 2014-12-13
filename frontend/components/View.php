<?php

namespace frontend\components;

use Yii;

class View extends \yii\web\View
{

    /**
     * @var array Themes list
     */
    public $themes;

    /**
     * @var string Default theme name
     */
    public $defaultTheme;

    public function init()
    {
        parent::init();

        if ($this->defaultTheme) {
            $this->changeTheme($this->defaultTheme);
        }
    }

    /**
     * Change current theme
     * @param $value
     * @throws \Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function changeTheme($value)
    {
        if (!isset($this->themes[$value])) {
            throw new \Exception('Undefined theme');
        }

        $theme = $this->themes[$value];
        if (is_array($theme)) {
            if (!isset($theme['class'])) {
                $theme['class'] = 'yii\base\Theme';
            }
            $this->theme = Yii::createObject($theme);
        } elseif (is_string($value)) {
            $this->theme = Yii::createObject($theme);
        }
    }
}
