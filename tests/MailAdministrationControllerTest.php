<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use KlinkDMS\Option;

class MailAdministrationControllerTest extends TestCase
{
    
    public function testMailIsEnabledWithLogDriver()
    {
        Option::remove('mail.host');
        Option::remove('mail.port');
        Option::remove('mail.from.address');
        Option::remove('mail.from.name');
        Option::remove('mail.username');
        Option::remove('mail.password');

        config(['mail.driver' => 'log']);

        $adapter = $this->withKlinkAdapterFake();

        $user = $this->createAdminUser();

        $this->actingAs($user);

        $this->assertTrue(Option::isMailEnabled());
    }
    
    public function testMailIsNotEnabledWithSmtpDriver()
    {

        Option::remove('mail.host');
        Option::remove('mail.port');
        Option::remove('mail.from.address');
        Option::remove('mail.from.name');
        Option::remove('mail.username');
        Option::remove('mail.password');

        config(['mail.driver' => 'smtp']);

        $exitCode = \Artisan::call('config:clear');

        $this->assertFalse(Option::isMailEnabled());
    }
    
    public function testMailIsEnabledWithSmtpDriver()
    {
        Option::remove('mail.host');
        Option::remove('mail.port');
        Option::remove('mail.from.address');
        Option::remove('mail.from.name');
        Option::remove('mail.username');
        Option::remove('mail.password');

        config([
            'mail.driver' => 'smtp',
            'mail.host' => 'smtp.something.com',
            'mail.port' => 465,
            'mail.from.address' => 'from@klink.asia',
            'mail.from.name' => 'Testing DMS',
        ]);

        $adapter = $this->withKlinkAdapterFake();

        $user = $this->createAdminUser();

        $this->actingAs($user);

        $this->assertTrue(Option::isMailEnabled());

        $this->visit(route('administration.mail.index'));

        $this->see('from@klink.asia');
        $this->see('Testing DMS');
        $this->see('smtp.something.com');
        $this->see('465');
        
    }


    public function testMailConfigurationSaved()
    {
        Option::remove('mail.host');
        Option::remove('mail.port');
        Option::remove('mail.from.address');
        Option::remove('mail.from.name');
        Option::remove('mail.username');
        Option::remove('mail.password');

        config([
            'mail.driver' => 'smtp',
        ]);

        $adapter = $this->withKlinkAdapterFake();

        $user = $this->createAdminUser();

        $this->actingAs($user);

        $this->visit(route('administration.mail.index'));


        $this->type('test@klink.asia', 'from_address');
        $this->type('Test DMS', 'from_name');
        $this->type('smtp.klink.asia', 'host');
        $this->type('465', 'port');
        $this->type('user', 'smtp_u');
        $this->type('password', 'smtp_p');

        $this->press(trans('administration.mail.save_btn'));

        $this->assertTrue(Option::isMailEnabled());
        $this->assertEquals('test@klink.asia', Option::option('mail.from.address', false));
        $this->assertEquals('Test DMS', Option::option('mail.from.name', false));
        $this->assertEquals('465', Option::option('mail.port', false));
        $this->assertEquals('smtp.klink.asia', Option::option('mail.host', false));
        $this->assertEquals('user', Option::option('mail.username', false));
        $this->assertEquals(base64_encode('password'), Option::option('mail.password', false));

    }
    
    
}
