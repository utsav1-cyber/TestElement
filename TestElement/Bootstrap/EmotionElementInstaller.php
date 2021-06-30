<?php

namespace TestElement\Bootstrap;

use Shopware\Components\Emotion\ComponentInstaller;

class EmotionElementInstaller
{
    /**
     * @var ComponentInstaller
     */
    private $emotionComponentInstaller;

    /**
     * @var string
     */
    private $pluginName;

    /**
     * @param string $pluginName
     * @param ComponentInstaller $emotionComponentInstaller
     */
    public function __construct($pluginName, ComponentInstaller $emotionComponentInstaller)
    {
        $this->emotionComponentInstaller = $emotionComponentInstaller;
        $this->pluginName = $pluginName;
    }

    public function install()
    {
        $testElement = $this->emotionComponentInstaller->createOrUpdate(
            $this->pluginName,
            'TestElement',
            [
                'name' => 'Test Element',
                'xtype' => 'emotion-components-test',
                'template' => 'emotion_test',
                'cls' => 'emotion-test-element'
            ]
        );

        $testElement->createMediaField([
            'name' => 'preview_image',
            'fieldLabel' => 'Banner Image',
            'valueField' => 'virtualPath'
        ]);

        $testElement->createTextField([
            'name' => 'test_element',
            'fieldLabel' => 'Title',
            'supportText' => 'Text Field.',
            'allowBlank' => false
        ]);

        $testElement->createtinymcefield([
            'name' => 'description_text',
            'fieldLabel' => 'Description',
        ]);

        $testElement->createTextField([
            'name' => 'button_link',
            'fieldLabel' => 'Button Link',
            'supportText' => 'example: https://your-domain.com/'
        ]);

    }
}