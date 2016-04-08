<?php
namespace chenkby\region;
use yii\base\Action;
use Yii;
use yii\base\InvalidParamException;
use yii\helpers\Html;

class RegionAction extends Action
{
    /**
     * @var \yii\db\ActiveRecord Region Model
     */
    public $model=null;

    public function init()
    {
        parent::init();
        if(!$this->model)throw new InvalidParamException('model不能为null');
    }

    public function run()
    {
        $parent_id=Yii::$app->request->get('parent_id');
        $modelClass=$this->model;
        if($parent_id>0){
            return Html::renderSelectOptions('district',$modelClass::getRegion($parent_id));
        }else{
            return [];
        }
    }
}