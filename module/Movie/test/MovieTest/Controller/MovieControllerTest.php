<?php

namespace MovieTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class MovieControllerTest extends AbstractHttpControllerTestCase {

    protected $traceError = true;

    public function setUp() {
        $this->setApplicationConfig(
                include '/var/www/zf2-tutorial/config/application.config.php'
        );
        parent::setUp();
    }

    public function testIndexActionCanBeAccessed() {
        $movieTableMock = $this->getMockBuilder('Movie\Model\MovieTable')
                ->disableOriginalConstructor()
                ->getMock();

        $movieTableMock->expects($this->once())
                ->method('fetchAll')
                ->will($this->returnValue(array()));

        $serviceManager = $this->getApplicationServiceLocator();
        $serviceManager->setAllowOverride(true);
        $serviceManager->setService('Movie\Model\MovieTable', $movieTableMock);

        $this->dispatch('/movie');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Movie');
        $this->assertControllerName('Movie\Controller\Movie');
        $this->assertControllerClass('MovieController');
        $this->assertMatchedRouteName('movie');
    }

}
