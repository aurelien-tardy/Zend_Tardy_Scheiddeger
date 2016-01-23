<?php

namespace BookTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class BookControllerTest extends AbstractHttpControllerTestCase {

    protected $traceError = true;

    public function setUp() {
        $this->setApplicationConfig(
                include '/var/www/zf2-tutorial/config/application.config.php'
        );
        parent::setUp();
    }

    public function testIndexActionCanBeAccessed() {
        $bookTableMock = $this->getMockBuilder('Book\Model\BookTable')
                ->disableOriginalConstructor()
                ->getMock();

        $bookTableMock->expects($this->once())
                ->method('fetchAll')
                ->will($this->returnValue(array()));

        $serviceManager = $this->getApplicationServiceLocator();
        $serviceManager->setAllowOverride(true);
        $serviceManager->setService('Book\Model\BookTable', $bookTableMock);

        $this->dispatch('/book');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Book');
        $this->assertControllerName('Book\Controller\Book');
        $this->assertControllerClass('BookController');
        $this->assertMatchedRouteName('book');
    }

}
