<?php

namespace Nlib\Mailchimp\Interfaces;

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

interface MailchimpInterface {

    /**
     *
     * @param string $config
     * @return self
     */
    public function init(string $config);
    
    /**
     *
     * @return AccountExportApi
     */
    public function AccountExport() : AccountExportApi;
    
    /**
     *
     * @return AccountExportsApi
     */
    public function AccountExports() : AccountExportsApi;
    
    /**
     *
     * @return ActivityFeedApi
     */
    public function ActivityFeed() : ActivityFeedApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function AuthorizedApps() : AuthorizedAppsApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function Automations() : AutomationsApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function BatchWebhooks() : BatchWebhooksApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function Batches() : BatchesApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function CampaignFolders() : CampaignFoldersApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function Campaigns() : CampaignsApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function ConnectedSites() : ConnectedSitesApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function Conversations() : ConversationsApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function CustomerJourneys() : CustomerJourneysApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function Ecommerce() : EcommerceApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function FacebookAds() : FacebookAdsApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function FileManager() : FileManagerApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function LandingPages() : LandingPagesApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function Lists() : ListsApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function Ping() : PingApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function Reporting() : ReportingApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function Reports() : ReportsApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function Root() : RootApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function SearchCampaigns() : SearchCampaignsApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function SearchMembers() : SearchMembersApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function TemplateFolders() : TemplateFoldersApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function Templates() : TemplatesApi;
    
    /**
     *
     * @return AuthorizedAppsApi
     */
    public function VerifiedDomains() : VerifiedDomainsApi;

}