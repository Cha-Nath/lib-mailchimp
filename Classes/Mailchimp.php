<?php

namespace Nlib\Mailchimp\Classes;

use MailchimpMarketing\Api\AccountExportApi;
use MailchimpMarketing\Api\AccountExportsApi;
use MailchimpMarketing\Api\ActivityFeedApi;
use MailchimpMarketing\Api\AuthorizedAppsApi;
use MailchimpMarketing\Api\AutomationsApi;
use MailchimpMarketing\Api\BatchWebhooksApi;
use MailchimpMarketing\Api\BatchesApi;
use MailchimpMarketing\Api\CampaignFoldersApi;
use MailchimpMarketing\Api\CampaignsApi;
use MailchimpMarketing\Api\ConnectedSitesApi;
use MailchimpMarketing\Api\ConversationsApi;
use MailchimpMarketing\Api\CustomerJourneysApi;
use MailchimpMarketing\Api\EcommerceApi;
use MailchimpMarketing\Api\FacebookAdsApi;
use MailchimpMarketing\Api\FileManagerApi;
use MailchimpMarketing\Api\LandingPagesApi;
use MailchimpMarketing\Api\ListsApi;
use MailchimpMarketing\Api\PingApi;
use MailchimpMarketing\Api\ReportingApi;
use MailchimpMarketing\Api\ReportsApi;
use MailchimpMarketing\Api\RootApi;
use MailchimpMarketing\Api\SearchCampaignsApi;
use MailchimpMarketing\Api\SearchMembersApi;
use MailchimpMarketing\Api\TemplateFoldersApi;
use MailchimpMarketing\Api\TemplatesApi;
use MailchimpMarketing\Api\VerifiedDomainsApi;

use nlib\Instance\Traits\InstanceTrait;
use nlib\Log\Traits\LogTrait;
use nlib\Missing\Exceptions\MissingException;
use nlib\Missing\Traits\MissingTrait;
use nlib\Yaml\Traits\ParserTrait;

use Nlib\Mailchimp\Interfaces\MailchimpInterface;

class Mailchimp extends \MailchimpMarketing\Configuration implements MailchimpInterface {

    use InstanceTrait;
    use LogTrait;
    use MissingTrait;
    use ParserTrait;

    private $_AccountExport = null;
    private $_AccountExports = null;
    private $_ActivityFeed = null;
    private $_AuthorizedApps = null;
    private $_Automations = null;
    private $_BatchWebhooks = null;
    private $_Batches = null;
    private $_CampaignFolders = null;
    private $_Campaigns = null;
    private $_ConnectedSites = null;
    private $_Conversations = null;
    private $_CustomerJourneys = null;
    private $_Ecommerce = null;
    private $_FacebookAds = null;
    private $_FileManager = null;
    private $_LandingPages = null;
    private $_Lists = null;
    private $_Ping = null;
    private $_Reporting = null;
    private $_Reports = null;
    private $_Root = null;
    private $_SearchCampaigns = null;
    private $_SearchMembers = null;
    private $_TemplateFolders = null;
    private $_Templates = null;
    private $_VerifiedDomains = null;

    public function __construct() {

        $this->tempFolderPath = sys_get_temp_dir();
        // $this->init(Path::i($this->_i())->getConfig() . 'config');
    }

    public function init(string $config) : self {

        try {
            
            $parameters = $this->Parser()->get($config);

            if(!$this->is_missing(['apiKey', 'server'], $parameters))
                throw new MissingException($this->getMissings(), $this->l());
        
            $this->setConfig($parameters);

        } catch(MissingException $MissingException) {
            $this->dlog([$MissingException->getThrow() => json_encode($MissingException->getMissings())]);
        }

        return $this;
    }
    
    public function AccountExport() : AccountExportApi { if(empty($this->_AccountExport)) $this->_AccountExport = new AccountExportApi($this); return $this->_AccountExport; }
    public function AccountExports() : AccountExportsApi { if(empty($this->_AccountExports)) $this->_AccountExports = new AccountExportsApi($this); return $this->_AccountExports; }
    public function ActivityFeed() : ActivityFeedApi { if(empty($this->_ActivityFeed)) $this->_ActivityFeed = new ActivityFeedApi($this); return $this->_ActivityFeed; }
    public function AuthorizedApps() : AuthorizedAppsApi { if(empty($this->_AuthorizedApps)) $this->_AuthorizedApps = new AuthorizedAppsApi($this); return $this->_AuthorizedApps; }
    public function Automations() : AutomationsApi { if(empty($this->_Automations)) $this->_Automations = new AutomationsApi($this); return $this->_Automations; }
    public function BatchWebhooks() : BatchWebhooksApi { if(empty($this->_BatchWebhooks)) $this->_BatchWebhooks = new BatchWebhooksApi($this); return $this->_BatchWebhooks; }
    public function Batches() : BatchesApi { if(empty($this->_Batches)) $this->_Batches = new BatchesApi($this); return $this->_Batches; }
    public function CampaignFolders() : CampaignFoldersApi { if(empty($this->_CampaignFolders)) $this->_CampaignFolders = new CampaignFoldersApi($this); return $this->_CampaignFolders; }
    public function Campaigns() : CampaignsApi { if(empty($this->_Campaigns)) $this->_Campaigns = new CampaignsApi($this); return $this->_Campaigns; }
    public function ConnectedSites() : ConnectedSitesApi { if(empty($this->_ConnectedSites)) $this->_ConnectedSites = new ConnectedSitesApi($this); return $this->_ConnectedSites; }
    public function Conversations() : ConversationsApi { if(empty($this->_Conversations)) $this->_Conversations = new ConversationsApi($this); return $this->_Conversations; }
    public function CustomerJourneys() : CustomerJourneysApi { if(empty($this->_CustomerJourneys)) $this->_CustomerJourneys = new CustomerJourneysApi($this); return $this->_CustomerJourneys; }
    public function Ecommerce() : EcommerceApi { if(empty($this->_Ecommerce)) $this->_Ecommerce = new EcommerceApi($this); return $this->_Ecommerce; }
    public function FacebookAds() : FacebookAdsApi { if(empty($this->_FacebookAds)) $this->_FacebookAds = new FacebookAdsApi($this); return $this->_FacebookAds; }
    public function FileManager() : FileManagerApi { if(empty($this->_FileManager)) $this->_FileManager = new FileManagerApi($this); return $this->_FileManager; }
    public function LandingPages() : LandingPagesApi { if(empty($this->_LandingPages)) $this->_LandingPages = new LandingPagesApi($this); return $this->_LandingPages; }
    public function Lists() : ListsApi { if(empty($this->_Lists)) $this->_Lists = new ListsApi($this); return $this->_Lists; }
    public function Ping() : PingApi { if(empty($this->_Ping)) $this->_Ping = new PingApi($this); return $this->_Ping; }
    public function Reporting() : ReportingApi { if(empty($this->_Reporting)) $this->_Reporting = new ReportingApi($this); return $this->_Reporting; }
    public function Reports() : ReportsApi { if(empty($this->_Reports)) $this->_Reports = new ReportsApi($this); return $this->_Reports; }
    public function Root() : RootApi { if(empty($this->_Root)) $this->_Root = new RootApi($this); return $this->_Root; }
    public function SearchCampaigns() : SearchCampaignsApi { if(empty($this->_SearchCampaigns)) $this->_SearchCampaigns = new SearchCampaignsApi($this); return $this->_SearchCampaigns; }
    public function SearchMembers() : SearchMembersApi { if(empty($this->_SearchMembers)) $this->_SearchMembers = new SearchMembersApi($this); return $this->_SearchMembers; }
    public function TemplateFolders() : TemplateFoldersApi { if(empty($this->_TemplateFolders)) $this->_TemplateFolders = new TemplateFoldersApi($this); return $this->_TemplateFolders; }
    public function Templates() : TemplatesApi { if(empty($this->_Templates)) $this->_Templates = new TemplatesApi($this); return $this->_Templates; }
    public function VerifiedDomains() : VerifiedDomainsApi { if(empty($this->_VerifiedDomains)) $this->_VerifiedDomains = new VerifiedDomainsApi($this); return $this->_VerifiedDomains; }

}