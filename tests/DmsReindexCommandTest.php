<?php

use Laracasts\TestDummy\Factory;
use KlinkDMS\User;
use KlinkDMS\Group;
use KlinkDMS\GroupType;
use KlinkDMS\Project;
use KlinkDMS\Capability;
use KlinkDMS\DocumentDescriptor;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Collection;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Symfony\Component\Console\Tester\CommandTester;

use Illuminate\Foundation\Application;
use KlinkDMS\Console\Commands\DmsReindexCommand;

use KlinkDMS\Traits\RunCommand;

/*
 * Test the DMSReindexCommand
*/
class DmsReindexCommandTest extends TestCase {
    
    use DatabaseTransactions, RunCommand;

    // function that might be useful

    private function createDocuments( $quantity = 5 ){
        
        $docs = factory('KlinkDMS\DocumentDescriptor', $quantity)->create([
            'is_public' => false,
            'language' => null
        ]);
        
        
        return $docs;
    }



    // real test methods

    /**
     * Test the reindex of a single document and checks that the updated_at info 
     * is not automatically updated on save
     */
    public function testReindexButNotUpdatedAtUpdate(){

        $document_count = 1;

        $docs = $this->createDocuments( $document_count );

        $first_doc = $docs->first();

        $updated_at = $first_doc->updated_at;

        $plucked = $docs->pluck('id');

        $command = new DmsReindexCommand( app('Klink\DmsDocuments\DocumentsService') );
        
        $res = $this->runArtisanCommand($command, [
            'documents' => $plucked,
        ]);

        $this->assertRegExp('/Reindexing '.$document_count .' documents/', $res);
        
        $this->assertRegExp('/'. $document_count .' documents reindexed/', $res);

        $after = $first_doc->fresh()->updated_at;

        $this->assertEquals($updated_at, $after, 'different updated_at values');

    }

    /**
     * Test the reindex with ID as argument
     */
    public function testReindexByID(){

        $document_count = 3;

        $docs = $this->createDocuments( $document_count );

        $plucked = $docs->pluck('id');

        $command = new DmsReindexCommand( app('Klink\DmsDocuments\DocumentsService') );
        
        $res = $this->runArtisanCommand($command, [
            'documents' => $plucked->toArray(),
        ]);

        $this->assertRegExp('/Reindexing '.$document_count .' documents/', $res);
        
        $this->assertRegExp('/'. $document_count .' documents reindexed/', $res);

    }

    /**
     * Test the reindex with local document id as option
     */
    public function testReindexByLocalDocumentId(){

        $document_count = 3;

        $docs = $this->createDocuments( $document_count );

        $plucked = $docs->pluck('local_document_id');

        $command = new DmsReindexCommand( app('Klink\DmsDocuments\DocumentsService') );
        
        $res = $this->runArtisanCommand($command, [
            'documents' => $plucked->toArray(),
            '--klink-id' => true
        ]);

        $this->assertRegExp('/Reindexing '.$document_count .' documents/', $res);
        
        $this->assertRegExp('/'. $document_count .' documents reindexed/', $res);

    }

    /**
     * Test the reindex with local document id option activated on an empty list of documents
     * @expectedException     InvalidArgumentException
     * @expectedExceptionMessage Option --klink-id can only be used if argument list is not empty.
     */
    public function testReindexByLocalDocumentIdWithEmptyArgument(){

        $command = new DmsReindexCommand( app('Klink\DmsDocuments\DocumentsService') );
        
        $res = $this->runArtisanCommand($command, [
            '--klink-id' => true
        ]);

    }

    /**
     * Test the reindex with user options and documents argument
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Documents cannot be specified in conjunction with option --user.
     */
    public function testReindexByUserWithArguments(){

        $command = new DmsReindexCommand( app('Klink\DmsDocuments\DocumentsService') );
        
        $res = $this->runArtisanCommand($command, [
            'documents' => [ '10' ],
            '--users' => 44
        ]);

    }

    /**
     * Test the reindex for all documents of a user
     */
    public function testReindexByUser(){

        $document_count = 3;

        $docs = $this->createDocuments( $document_count );

        $plucked = $docs->pluck('owner_id');

        $command = new DmsReindexCommand( app('Klink\DmsDocuments\DocumentsService') );
        
        $res = $this->runArtisanCommand($command, [
            '--users' => $plucked->toArray()
        ]);

        $this->assertRegExp('/Reindexing '.$document_count .' documents/', $res);
        
        $this->assertRegExp('/'. $document_count .' documents reindexed/', $res);

        $res = $this->runArtisanCommand($command, [
            '--users' => $plucked->first()
        ]);

        $this->assertRegExp('/Reindexing 1 documents/', $res);
        
        $this->assertRegExp('/1 documents reindexed/', $res);

    }

    /**
     * Test the reindex of a sub-set of the whole documents
     */
    public function testReindexWithTakeAndSkip(){

        $document_count = 6;
        
        $expected_count = 3;

        $skip = 2;

        $take = 3;

        $docs = $this->createDocuments( $document_count );

        $expected_docs = $docs->splice($skip, $take);

        $expected_docs_ids = $expected_docs->pluck('id')->toArray();

        $command = new DmsReindexCommand( app('Klink\DmsDocuments\DocumentsService') );
        
        $res = $this->runArtisanCommand($command, [
            '--skip' => $skip,
            '--take' =>  $take 
        ]);

        $expected_docs->each(function($item) use($expected_docs_ids) {
            $item = $item->fresh();

            $this->assertContains($item->id, $expected_docs_ids);
            $this->assertEquals($item->status, DocumentDescriptor::STATUS_INDEXED);
            // Check if the status attribute has been populated for the expected updated documents
        });


        $this->assertRegExp('/Take '.$take .', Skip '. $skip .'/', $res);

        $this->assertRegExp('/Reindexing '.$expected_count .' documents/', $res);
        
        $this->assertRegExp('/'. $expected_count .' documents reindexed/', $res);

    }

    public function testReindexWithTakeAndSkipWithStrings(){

        $document_count = 6;
        
        $expected_count = 3;

        $skip = 2;

        $take = 3;

        $docs = $this->createDocuments( $document_count );

        $expected_docs = $docs->splice($skip, $take);

        $expected_docs_ids = $expected_docs->pluck('id')->toArray();

        $command = new DmsReindexCommand( app('Klink\DmsDocuments\DocumentsService') );
        
        $res = $this->runArtisanCommand($command, [
            '--skip' => "" . $skip,
            '--take' =>  "" . $take 
        ]);

        $expected_docs->each(function($item) use($expected_docs_ids) {
            $item = $item->fresh();

            $this->assertContains($item->id, $expected_docs_ids);
            $this->assertEquals($item->status, DocumentDescriptor::STATUS_INDEXED);
            // Check if the status attribute has been populated for the expected updated documents
        });


        $this->assertRegExp('/Take '.$take .', Skip '. $skip .'/', $res);

        $this->assertRegExp('/Reindexing '.$expected_count .' documents/', $res);
        
        $this->assertRegExp('/'. $expected_count .' documents reindexed/', $res);

    }

    /**
     * Test the reindex with skip array value
     * @expectedException InvalidArgumentException
     */
    public function testReindexWithTakeAndSkipWithArrays(){

        $document_count = 6;
        
        $expected_count = 3;

        $skip = 2;

        $take = 3;

        $docs = $this->createDocuments( $document_count );

        $expected_docs = $docs->splice($skip, $take);

        $expected_docs_ids = $expected_docs->pluck('id')->toArray();

        $command = new DmsReindexCommand( app('Klink\DmsDocuments\DocumentsService') );
        
        $res = $this->runArtisanCommand($command, [
            '--skip' => [$skip],
            '--take' => [$take] 
        ]);

    }

    /**
     * Test the reindex with skip negative value
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Skip must be a positive integer or zero.
     */
    public function testReindexNegativeSkipArgument(){

        $command = new DmsReindexCommand( app('Klink\DmsDocuments\DocumentsService') );
        
        $res = $this->runArtisanCommand($command, [
            '--skip' => -4
        ]);

    }

    /**
     * Test the reindex with take zero documents
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Take must be a positive integer. Minimum value 1
     */
    public function testReindexZeroTakeArgument(){

        $command = new DmsReindexCommand( app('Klink\DmsDocuments\DocumentsService') );
        
        $res = $this->runArtisanCommand($command, [
            '--take' => 0
        ]);

    }

    /**
     * Test the reindex with take negative value
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Take must be a positive integer. Minimum value 1
     */
    public function testReindexNegativeTakeArgument(){

        $command = new DmsReindexCommand( app('Klink\DmsDocuments\DocumentsService') );
        
        $res = $this->runArtisanCommand($command, [
            '--take' => -4
        ]);

    }

    /**
     * Test the reindex of the documents passed as argument with the offset/limit combination
     */
    public function testReindexByIdWithTake(){

        $document_count = 6;
        
        $expected_count = 3;

        $skip = 2;

        $take = 3;

        $docs = $this->createDocuments( $document_count );

        $plucked = $docs->pluck('id');

        $command = new DmsReindexCommand( app('Klink\DmsDocuments\DocumentsService') );
        
        $res = $this->runArtisanCommand($command, [
            'documents' => $plucked->toArray(),
            '--skip' => $skip,
            '--take' =>  $take 
        ]);

        $this->assertRegExp('/Take '.$take .', Skip '. $skip .'/', $res);

        $this->assertRegExp('/Reindexing '.$expected_count .' documents/', $res);
        
        $this->assertRegExp('/'. $expected_count .' documents reindexed/', $res);

    }
    
}