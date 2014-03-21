<?php

class SupportMacroableTraitTest extends \PHPUnit_Framework_TestCase
{

    private $macroTrait;

    public function setUp()
    {
        $this->macroTrait = $this->createObjectForTrait();
    }

    private function createObjectForTrait()
    {
        $traitName = 'Illuminate\Support\Traits\MacroableTrait';

        return $this->getObjectForTrait($traitName);
    }


    public function testRegisterAndCallMacroWithStatic()
    {
        $macroTrait = $this->macroTrait;
        $macroTrait::macro(__CLASS__, function () {
            return 'Taylor';
        });
        $this->assertEquals($macroTrait::{__CLASS__}(), 'Taylor');
    }


    public function testRegisterAndCallMacroWithoutStatic()
    {
        $macroTrait = $this->macroTrait;
        $macroTrait->macro(__CLASS__, function () {
            return 'Taylor';
        });
        $this->assertEquals($macroTrait->{__CLASS__}(), 'Taylor');
    }


    /**
     * @expectedException \BadMethodCallException
     */
    public function testThrowsExceptionWhenMacroIsMissing()
    {
        $macroTrait = $this->macroTrait;
        $macroTrait->taylorOtwell();
    }

}
