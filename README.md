# yii2-region
Yii2 中国省市区三级联动

## 安装

添加到你的composer.json文件

```
"chenkby/yii2-region": "dev-master"
```

## 配置

1、在地区的Model中添加以下方法
```php
    public static function getRegion($parentId=0)
    {
        $result = static::find()->where(['parent_id'=>$parentId])->asArray()->all();
        return ArrayHelper::map($result, 'id', 'name');
    }
```

2、在controller中添加以下action
```php
    public function actions()
    {
        $actions=parent::actions();
        $actions['get-region']=[
            'class'=>\chenkby\region\RegionAction::className(),
            'model'=>\app\models\Region::className()
        ];
        return $actions;
    }
```
