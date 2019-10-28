<?php

 namespace Drupal\Tests\monoapi\Functional;
 
 use Drupal\Tests\BrowserTestBase;
 use Drupal\Core\Url;
 
 /**
  * 
  * Write a test case for demo version
  * 
  * @group monoapiexample
  * 
  */
 
 class MonoapiSettingsFormTest extends BrowserTestBase  {
 
   /**
    * Following modules is load to test
    * 
    * @var array
    * 
    */ 
    
   public static $modules =  [
				'user',
				'monoapi',
   ];
   
   
   /**
    * {@inheritdoc}
    */ 
   protected function setUp(){
	   
	   parent::setUp();
	   
        // $admin_user = $this->drupalCreateUser(['administer permissions']);
        // $this->drupalLogin($adminUser);
	   
   }
   
   /**
    * test functionality
    */
   /*
   public function testForm(){
	   
	   $account = $this->drupalCreateUser(['administer site configuration']);
       $this->drupalLogin($account);    
	   $session =  $this->assertSession();   	   
	   $setting_page = Url::fromRoute('monoapi.settings');
	   $this->drupalGet($setting_page);   
	   $session->statusCodeEquals(200);
	   $session->pageTextContains('Other things');
	}
	*/
	
	/**
    * test functionality
    */
    
   public function testFormtextpage(){
	   
	   $account = $this->drupalCreateUser(['administer site configuration']);
       $this->drupalLogin($account);
	   $session =  $this->assertSession();   	   
	   $setting_page = Url::fromRoute('monoapi.settings');
	   $this->drupalGet($setting_page);
	    // $this->drupalGet('<front>');
	    $session->statusCodeEquals(200);   
	   $session->pageTextContains('Other things');
	} 
	
	
   /**
	*  test Form submission
	*/ 
   function testFormWithSubmit()
   {
	   
	 $account = $this->drupalCreateUser(['administer site configuration']);
     $this->drupalLogin($account);
	 $assert_session =  $this->assertSession();   	   
     $edit = ['example_thing' => 'Mahindra SUV','other_things' => 'Suzuki 300','api_key' =>  'HGSHG$&%2726' ];
     
     $this->drupalPostForm(Url::fromRoute('monoapi.settings'), $edit, t('Save configuration'));
     $assert_session->pageTextContains('The configuration options have been saved.');
     // $assert->pageTextContains('Value for pen_name: DMan');
     // $assert->pageTextContains('Value for title: My Book');
     // $assert->pageTextContains('Value for publisher: me');
     // $assert->pageTextContains('Value for diet: vegan');
     
     
  }
   
 }
 

 
 

