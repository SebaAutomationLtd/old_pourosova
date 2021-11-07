<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\Admin\ActiveController;
use App\Http\Controllers\Admin\ActiveReportController;
use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\Admin\BeneficalController;
use App\Http\Controllers\Admin\BosotDueController;
use App\Http\Controllers\Admin\BusinessHoldController;
use App\Http\Controllers\Admin\BusinessRateController;
use App\Http\Controllers\Admin\BusinessTypeController;
use App\Http\Controllers\Admin\CertficateController;
use App\Http\Controllers\Admin\ChairmenController;
use App\Http\Controllers\Admin\CommercialHoldController;
use App\Http\Controllers\Admin\CouncilorController;
use App\Http\Controllers\Admin\DueController;
use App\Http\Controllers\Admin\GeneralMemeberController;
use App\Http\Controllers\Admin\HouseRateController;
use App\Http\Controllers\Admin\HouseTypeController;
use App\Http\Controllers\Admin\MeyorController;
use App\Http\Controllers\Admin\NewNoticeController;
use App\Http\Controllers\Admin\OccupationController;
use App\Http\Controllers\Admin\PdfReportController;
use App\Http\Controllers\Admin\PostCodeController;
use App\Http\Controllers\Admin\PostOfficeController;
use App\Http\Controllers\Admin\RenewLicenseController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceChargeController;
use App\Http\Controllers\Admin\TradeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VillageController;
use App\Http\Controllers\Admin\WardController;
use App\Http\Controllers\Admin\WebsiteSliderController;
use App\Http\Controllers\ApplicationStatusCobtroller;
use App\Http\Controllers\CertificateListController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Front\BosotController;
use App\Http\Controllers\Front\BusinessController;
use App\Http\Controllers\Front\CommercialController;
use App\Http\Controllers\Front\DepartmentController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\NoticeController;
use App\Http\Controllers\Front\RegistrationController;
use App\Http\Controllers\MemberAccessController;
use App\Http\Controllers\ProfileUpdateController;
use App\Http\Controllers\SanadApplyController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\Support\SupportAdminController;
use App\Http\Controllers\WarishController;
use Illuminate\Support\Facades\Route;

Route::get('password-generate', function () {
    echo bcrypt(123456);
});

//Registration Controller

//Registration Controller

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/reg/general-member', [BosotController::class, 'create'])->name('reg.bosot');
Route::post('/reg/general-member', [BosotController::class, 'store'])->name('reg.bosot');
Route::get('/reg/business-hold', [BusinessController::class, 'create'])->name('reg.business-hold');
Route::post('/reg/business-hold', [BusinessController::class, 'store'])->name('reg.business-hold');
Route::get('/reg/commercial-hold', [CommercialController::class, 'create'])->name('reg.commercial-hold');
Route::post('/reg/commercial-hold', [CommercialController::class, 'store'])->name('reg.commercial-hold');

Route::get('take_action_users', [ActiveController::class, 'search'])->name('action.search');
Route::post('take_action_users', [ActiveController::class, 'searchDb'])->name('action.search');
Route::get('take_action_users_deactive/{id}/{type}', [ActiveController::class, 'deactive'])->name('action.deactivePanel');
Route::get('take_action_show/{id}/{type}', [ActiveController::class, 'show'])->name('action.show');
Route::get('take_action_active_show/{id}/{type}', [ActiveController::class, 'activeshow'])->name('action.activeshow');
Route::post('take_action_users_active', [ActiveController::class, 'active'])->name('action.active');

//member login
Route::get('/login', function () {
    return view('member_login_page');
});
Route::post('/member-login', [MemberAccessController::class, 'MemberLogin']);
Route::get('/member-dashboard', [MemberAccessController::class, 'MemberDashboard'])->name('member.dashboard');
Route::get('/member-logout', [MemberAccessController::class, 'MemberLogout']);

//tariq vai trishal front code
Route::get('/', function () {
    return view('Front.index');
});

Route::get('/Trishal/Login', function () {
    return view('Login.login');
})->name('login');

Route::get('/admin/login', function () {
    return view('admin_page');
})->name('admin.login');

Route::get('/member/login', function () {
    return view('member_login_page');
})->name('member.login');

Route::post('/admin-login', [AccessController::class, 'AdminLogin'])->name('admin.login');
Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard');
Route::get('/logout', [AccessController::class, 'logout']);

//sms

Route::get('/sms-verification', [SmsController::class, 'SmsVerfication']);
Route::post('/code-verification', [SmsController::class, 'CodeVerfication']);
Route::get('/verify-member', [SmsController::class, 'VerifyMember']);
//member login

Route::post('/member-login', [MemberAccessController::class, 'MemberLogin']);
Route::get('/member-dashboard', [MemberAccessController::class, 'MemberDashboard'])->name('member.dashboard');
Route::get('/member-logout', [MemberAccessController::class, 'MemberLogout']);

//admin -- member
Route::get('/create-general_member', [GeneralMemeberController::class, 'CreateGeneralMember'])->name('create.general_member');
Route::get('/get-village/{id}', [BosotController::class, 'GetVillage']);
Route::get('/get-post_office/{id}', [BosotController::class, 'GetPostOffice']);
Route::get('/get-house_tax_rate/{id}', [BosotController::class, 'GetHouseTaxRate']);
Route::post('/store-general_member', [GeneralMemeberController::class, 'StoreGeneralMember'])->name('store.general_member');
Route::get('/general-member', [GeneralMemeberController::class, 'GeneralMember'])->name('general_member');
Route::get('/delete-member/{id}', [GeneralMemeberController::class, 'DeleteMember'])->name('delete.general_member');
Route::get('/edit-general_member/{id}', [GeneralMemeberController::class, 'EditMember'])->name('edit.general_member');
Route::get('/active-general_member/{id}', [GeneralMemeberController::class, 'ActiveMember'])->name('active.general_member');
Route::get('/inactive-general_member/{id}', [GeneralMemeberController::class, 'InactiveMember'])->name('inactive.general_member');
Route::post('/update-general_member/{id}', [GeneralMemeberController::class, 'UpdateMember'])->name('update.general_member');
Route::get('/get-info/{id}', [GeneralMemeberController::class, 'GetInfo']);
Route::get('/update-member_info', [GeneralMemeberController::class, 'UpdateMemberInfo']);
Route::get('/check-mobile_number', [GeneralMemeberController::class, 'CheckMobileNumber']);
Route::get('/check-birth_nid', [GeneralMemeberController::class, 'CheckBirthNid']);

Route::get('/get-village_ward', [GeneralMemeberController::class, 'GetVillageWard']);

Route::get('/search-general_member', [GeneralMemeberController::class, 'SearchGeneralMember']);

Route::get('/download-bosotbari', [GeneralMemeberController::class, 'DownloadBosotbari']);

Route::get('/mem-count', [GeneralMemeberController::class, 'MemCount']);

Route::get('/family-class', [GeneralMemeberController::class, 'FamilyClass'])->name('family.class');
Route::get('/filter-family_class', [GeneralMemeberController::class, 'FilterFamilyClass']);
Route::get('/new-bosot_all_data', [GeneralMemeberController::class, 'NewBosotAllData']);
Route::get('/new-bosot_index', [GeneralMemeberController::class, 'NewBosotIndex']);

//admin --chairmen
Route::get('/create-chairmen', [ChairmenController::class, 'CreateChairmen'])->name('create.chaimen');
Route::post('/store-chairmen', [ChairmenController::class, 'StoreChairmen'])->name('store.chairmen');
Route::get('/all-chairmen', [ChairmenController::class, 'AllChairmen'])->name('chairmen.list');
Route::get('/edit-chairmen/{id}', [ChairmenController::class, 'EditChairmen'])->name('edit.chairmen');
Route::post('/update-chairmen/{id}', [ChairmenController::class, 'UpdateChairmen'])->name('update.chairmen');
Route::get('/delete-chairmen/{id}', [ChairmenController::class, 'DeleteChairmen'])->name('delete.chairmen');
//admin-- post code
Route::get('/post-code', [PostCodeController::class, 'PostCode'])->name('post.code');
Route::get('/create-post_code', [PostCodeController::class, 'CreatePostCode'])->name('create.post_code');
Route::post('/store-post_code', [PostCodeController::class, 'StorePostCode'])->name('store.post_code');
Route::get('/edit-post_code/{id}', [PostCodeController::class, 'EditPostCode'])->name('edit.post_code');
Route::post('/update-post_code/{id}', [PostCodeController::class, 'UpdatePostCode'])->name('update.post_code');
Route::get('/delete-post_code/{id}', [PostCodeController::class, 'DeletePostCode'])->name('delete.post_code');

//admin -- post office
Route::get('/post-office', [PostOfficeController::class, 'PostOffice'])->name('post.office');
Route::get('/create-post_office', [PostOfficeController::class, 'CreatePostOffice'])->name('create.post_office');
Route::post('/store-post_office', [PostOfficeController::class, 'StorePostOffice'])->name('store.post_office');
Route::get('/edit-post_office/{id}', [PostOfficeController::class, 'EditPostOffice'])->name('edit.post_office');
Route::post('/update-post_office', [PostOfficeController::class, 'UpdatePostOffice'])->name('update.post_office');
Route::get('/delete-post_office/{id}', [PostOfficeController::class, 'DeletePostOffice'])->name('delete.post_office');

//admin -- ward
Route::get('/ward', [WardController::class, 'Ward'])->name('ward');
Route::get('/create-ward', [WardController::class, 'CreateWard'])->name('create.ward');
Route::post('/store-ward', [WardController::class, 'StoreWard'])->name('store.ward');
Route::get('/edit-ward/{id}', [WardController::class, 'EditWard'])->name('edit.ward');
Route::get('/delete-ward/{id}', [WardController::class, 'DeleteWard'])->name('delete.ward');
Route::post('/update-ward/{id}', [WardController::class, 'UpdateWard'])->name('update.ward');

//admin-- village
Route::get('/village', [VillageController::class, 'Village'])->name('village');
Route::get('/create-village', [VillageController::class, 'CreateVillage'])->name('create.village');
Route::post('/store-vilage', [VillageController::class, 'StoreVillage'])->name('store.village');
Route::get('/edit-village/{id}', [VillageController::class, 'EditVillage'])->name('edit.village');
Route::get('/delete-village/{id}', [VillageController::class, 'DeleteVillage'])->name('delete.village');
Route::post('/update-village/{id}', [VillageController::class, 'UpdateVillage'])->name('update.village');

//admin --occupation
Route::get('/occupation', [OccupationController::class, 'Occupation'])->name('occupation');
Route::get('/create-occupation', [OccupationController::class, 'CreateOccupation'])->name('create.occupation');
Route::post('/store-occupation', [OccupationController::class, 'StoreOccupation'])->name('store.occupation');
Route::get('/inactive-occupation/{id}', [OccupationController::class, 'InactiveOccupation'])->name('inactive.occupation');
Route::get('/active-occupation/{id}', [OccupationController::class, 'ActiveOccupation'])->name('active.occupation');
Route::get('/edit-occupation/{id}', [OccupationController::class, 'EditOccupation'])->name('edit.occupation');
Route::get('/delete-occupation/{id}', [OccupationController::class, 'DeleteOccupation'])->name('delete.occupation');
Route::post('/update-occupation/{id}', [OccupationController::class, 'UpdateOccupation'])->name('update.occupation');
//admin --housetype
Route::get('/house-type', [HouseTypeController::class, 'HouseType'])->name('house.type');
Route::get('/create-house_type', [HouseTypeController::class, 'CreateHouseType'])->name('create.house_type');
Route::post('store.house_type', [HouseTypeController::class, 'StoreHouseType'])->name('store.house_type');
Route::get('/edit-house_type/{id}', [HouseTypeController::class, 'EditHouseType'])->name('edit.house_type');
Route::post('/update-house_type/{id}', [HouseTypeController::class, 'UpdateHouseType'])->name('update.house_type');
Route::get('/delete-house_type/{id}', [HouseTypeController::class, 'DeleteHouseType'])->name('delete.house_type');

//admin -- housetyperate
Route::get('/house-rate', [HouseRateController::class, 'HouseRate'])->name('house_type.rate');
Route::get('/edit-house_rate/{id}', [HouseRateController::class, 'EditHouseRate'])->name('edit.house_rate');
Route::get('/delete-house_rate/{id}', [HouseRateController::class, 'DeleteHouseRate'])->name('delete.house_rate');
Route::get('/create-house_rate', [HouseRateController::class, 'CreateHouseRate'])->name('create.house_rate');
Route::post('/store-house_rate', [HouseRateController::class, 'StoreHouseRate'])->name('store.house_rate');
Route::post('/update-house_rate/{id}', [HouseRateController::class, 'UpdateHouseRate'])->name('update.house_rate');

//admin --business rate
Route::get('/business-rate', [BusinessRateController::class, 'BusinessRate'])->name('business.rate');
Route::get('/create-business_rate', [BusinessRateController::class, 'CreateBusinessRate'])->name('create.business_rate');
Route::post('/store-business_rate', [BusinessRateController::class, 'StoreBusinessRate'])->name('store.business_rate');
Route::get('/edit-business_rate/{id}', [BusinessRateController::class, 'EditBusinessRate'])->name('edit.business_rate');
Route::get('/delete-business_rate/{id}', [BusinessRateController::class, 'DeleteRate'])->name('delete.business_rate');
Route::post('/update-business_rate/{id}', [BusinessRateController::class, 'UpdateBusinessRate'])->name('update.business_rate');

//admin --business type
Route::get('/business-type', [BusinessTypeController::class, 'BusinessType'])->name('business.type');
Route::get('/create-business_type', [BusinessTypeController::class, 'CreateBusinessType'])->name('create.business_type');
Route::post('/store-business_type', [BusinessTypeController::class, 'StoreBusinessType'])->name('store.business_type');
Route::get('/active-business_type/{id}', [BusinessTypeController::class, 'ActiveBusinessType'])->name('active.business_type');
Route::get('/inactive-business_type/{id}', [BusinessTypeController::class, 'InactiveBusinessType'])->name('inactive.business_type');
Route::get('/delete-business_type/{id}', [BusinessTypeController::class, 'DeleteBusinessType'])->name('delete.business_type');
Route::get('/edit-business_type/{id}', [BusinessTypeController::class, 'EditBusinessType'])->name('edit.business_type');
Route::post('/update-business_type/{id}', [BusinessTypeController::class, 'UpdateBusinessType'])->name('update.business_type');

//admin  --trade license fee
Route::get('/trade-fee', [TradeController::class, 'TradeFee'])->name('trade.fee');
Route::get('/create-trade', [TradeController::class, 'CreateTrade'])->name('create.trade');
Route::post('/store-trade', [TradeController::class, 'StoreTrade'])->name('store.trade');
Route::get('/edit-trade/{id}', [TradeController::class, 'EditTrade'])->name('edit.trade');
Route::get('/delete-trade/{id}', [TradeController::class, 'DeleteTrade'])->name('delete.trade');
Route::post('/update-trade/{id}', [TradeController::class, 'UpdateTrade'])->name('update.trade');

//admin --Business Hold
Route::get('/business-hold', [BusinessHoldController::class, 'BusinessHold'])->name('business.hold');
Route::post('/store-business_hold', [BusinessHoldController::class, 'StoreBusinessHold'])->name('store.business_holding');
Route::get('/check-mobile_hold_number', [BusinessHoldController::class, 'CheckMobileHold']);
Route::get('/check-hold_birth_nid', [BusinessHoldController::class, 'CheckBirthNidHold']);
Route::get('/all-business_hold_filter', [BusinessHoldController::class, 'AllBusinessHoldFilter'])->name('all_business_hold_filter'); // Tariqul

Route::get('/all-business_hold', [BusinessHoldController::class, 'AllBusinessHold'])->name('all_business_hold');
Route::get('/edit-business_hold/{id}', [BusinessHoldController::class, 'EditBusinessHold'])->name('edit.business_hold');
Route::post('/update-business_hold/{id}', [BusinessHoldController::class, 'UpdateBusinessHold'])->name('update.business_holding');
Route::get('/remove-business_hold_image/{id}', [BusinessHoldController::class, 'RemoveBusinessHold']);
Route::get('/delete-business_hold/{id}', [BusinessHoldController::class, 'DeleteBusinessHold'])->name('delete.business_hold');

Route::get('/active-business_hold/{id}', [BusinessHoldController::class, 'ActiveBusinessHold'])->name('active.business_hold');

Route::get('/inactive-business_hold/{id}', [BusinessHoldController::class, 'InactiveBusinessHold'])->name('inactive.business_hold');

Route::get('/get-business_hold_info/{id}', [BusinessHoldController::class, 'GetBusinessHold']);
Route::get('/update-business_member_info', [BusinessHoldController::class, 'UpdateBusinessInfo']);

Route::get('/search-business_hold', [BusinessHoldController::class, 'SearchBusinessHold']);
Route::get('/download-business', [BusinessHoldController::class, 'DownloadBusiness']);

//Commercial Part
Route::get('/commercial-hold', [CommercialHoldController::class, 'CommercialHold'])->name('commercial.hold');
Route::get('/active_commercial-hold/{id}', [CommercialHoldController::class, 'ActiveCommercialHold'])->name('active.commercial_hold');
Route::get('/inactive_commercial-hold/{id}', [CommercialHoldController::class, 'InactiveCommercialHold'])->name('inactive.commercial_hold');
Route::get('/view_commercial_hold/{id}', [CommercialHoldController::class, 'ViewCommercialHold'])->name('view.commercial_hold');
Route::get('/all-commercial-hold', [CommercialHoldController::class, 'CommercialHold'])->name('all_commercial_hold');
Route::get('/all-commercial-hold-active', [CommercialHoldController::class, 'allactivecommercialhold'])->name('all_commercial_hold_active');
Route::get('/all-commercial-hold-inactive', [CommercialHoldController::class, 'allinactivecommercialhold'])->name('all_commercial_hold_inactive');
Route::get('/commercial-hold-filter', [CommercialHoldController::class, 'all_commercial_hold_filter']);
Route::get('/exportpdfcomdata', [CommercialHoldController::class, 'exportpdfcomdata']);
Route::get('/allexportpdfcomdata', [CommercialHoldController::class, 'allexportpdfcomdata']);
Route::get('/activeexportpdfcomdata', [CommercialHoldController::class, 'activeexportpdfcomdata']);
Route::get('/inactiveexportpdfcomdata', [CommercialHoldController::class, 'inactiveexportpdfcomdata']);


//admin --service charge
Route::get('/service-charge', [ServiceChargeController::class, 'ServiceCharge'])->name('service.charge');

Route::post('/update-general_fee', [ServiceChargeController::class, 'UpdateGeneralFee'])->name('update.general_fee');

Route::post('/update-commercial_fee', [ServiceChargeController::class, 'UpdateCommercialFee'])->name('update.commercial_fee');

Route::post('/update-business_fee', [ServiceChargeController::class, 'UpdateBusineeFee'])->name('update.business_fee');

//admin -- general_member (bosot bari)
Route::get('/create-general_member', [GeneralMemeberController::class, 'CreateGeneralMember'])->name('create.general_member');
Route::get('/get-village/{id}', [GeneralMemeberController::class, 'GetVillage']);
Route::get('/get-post_office/{id}', [GeneralMemeberController::class, 'GetPostOffice']);
Route::get('/get-house_tax_rate/{id}', [GeneralMemeberController::class, 'GetHouseTaxRate']);
Route::post('/store-general_member', [GeneralMemeberController::class, 'StoreGeneralMember'])->name('store.general_member');
Route::get('/general-member', [GeneralMemeberController::class, 'GeneralMember'])->name('general_member');
Route::get('/general-member-quick-view/{id}', [GeneralMemeberController::class, 'QuickView'])->name('general_member_quick_view');
Route::get('/general-member-filter', [GeneralMemeberController::class, 'GeneralMemberFilter'])->name('general_member_filter'); // Tariqul
Route::get('/general-member-active', [GeneralMemeberController::class, 'GeneralMemberActive'])->name('general_member_active'); // Tariqul
Route::get('/general-member-inactive', [GeneralMemeberController::class, 'GeneralMemberInactive'])->name('general_member_inactive'); // Tariqul
Route::get('/delete-member/{id}', [GeneralMemeberController::class, 'DeleteMember'])->name('delete.general_member');
Route::get('/edit-general_member/{id}', [GeneralMemeberController::class, 'EditMember'])->name('edit.general_member');
Route::get('/active-general_member/{id}', [GeneralMemeberController::class, 'ActiveMember'])->name('active.general_member');
Route::get('/inactive-general_member/{id}', [GeneralMemeberController::class, 'InactiveMember'])->name('inactive.general_member');
Route::post('/update-general_member/{id}', [GeneralMemeberController::class, 'UpdateMember'])->name('update.general_member');
Route::get('/get-info/{id}', [GeneralMemeberController::class, 'GetInfo']);
Route::get('/update-member_info', [GeneralMemeberController::class, 'UpdateMemberInfo']);
Route::get('/check-mobile_number', [GeneralMemeberController::class, 'CheckMobileNumber']);
Route::get('/check-birth_nid', [GeneralMemeberController::class, 'CheckBirthNid']);
Route::get('/get/villageByWord/{id}', [GeneralMemeberController::class, 'villageByWord']);
Route::get('/search-general_member', [GeneralMemeberController::class, 'SearchGeneralMember'])->name('search-general_member');
Route::get('/bosot-search-result', [GeneralMemeberController::class, 'BosotSearchResult']);

//admin --Business Hold
Route::get('/business-hold', [BusinessHoldController::class, 'BusinessHold'])->name('business.hold');
Route::post('/store-business_hold', [BusinessHoldController::class, 'StoreBusinessHold'])->name('store.business_holding');
Route::get('/check-mobile_hold_number', [BusinessHoldController::class, 'CheckMobileHold']);
Route::get('/check-hold_birth_nid', [BusinessHoldController::class, 'CheckBirthNidHold']);

Route::get('/all-business_hold', [BusinessHoldController::class, 'AllBusinessHold'])->name('all_business_hold');
Route::get('/edit-business_hold/{id}', [BusinessHoldController::class, 'EditBusinessHold'])->name('edit.business_hold');
Route::post('/update-business_hold/{id}', [BusinessHoldController::class, 'UpdateBusinessHold'])->name('update.business_holding');
Route::get('/remove-business_hold_image/{id}', [BusinessHoldController::class, 'RemoveBusinessHold']);
Route::get('/delete-business_hold/{id}', [BusinessHoldController::class, 'DeleteBusinessHold'])->name('delete.business_hold');

Route::get('/active-business_hold/{id}', [BusinessHoldController::class, 'ActiveBusinessHold'])->name('active.business_hold');

Route::get('/inactive-business_hold/{id}', [BusinessHoldController::class, 'InactiveBusinessHold'])->name('inactive.business_hold');

Route::get('/get-business_hold_info/{id}', [BusinessHoldController::class, 'GetBusinessHold']);
Route::get('/update-business_member_info', [BusinessHoldController::class, 'UpdateBusinessInfo']);

Route::get('/all_business_hold_active', [BusinessHoldController::class, 'AllBusinessHoldActive'])->name('all_business_hold_active');

Route::get('/all_business_hold_inactive', [BusinessHoldController::class, 'AllBusinessHoldInactive'])->name('all_business_hold_inactive');

//approval
Route::get('/trade-approval', [ApprovalController::class, 'TradeApproval'])->name('trade.approvel');
Route::get('/active-trade-approved/{id}', [ApprovalController::class, 'ActiveTradeApproval'])->name('active.trade_approved');
Route::get('/inactive-trade-approved/{id}', [ApprovalController::class, 'InactiveTradeApproval'])->name('inactive.trade_approved');

//user-business_hold  --renew license
Route::get('/renew-license', [RenewLicenseController::class, 'RenewLicense'])->name('renew.license');
Route::post('/store-renew-license_years', [RenewLicenseController::class, 'StoreRenewLicenseYears'])->name('renew.license_years');
Route::get('/pay-to_renew_licenses', [RenewLicenseController::class, 'PayToRenewLicense']);
Route::get('/paid-renew_fee', [RenewLicenseController::class, 'PaidRenewFee']);
Route::post('/fee-paid', [RenewLicenseController::class, 'FeePaid']);
Route::get('/ssl', [RenewLicenseController::class, 'SSL']);

Route::get('/license-pdf_download', [RenewLicenseController::class, 'LicensePdfDownload']);
Route::get('/pdf-page', [RenewLicenseController::class, 'PdfPage']);
Route::get('/print_license_pdf', [RenewLicenseController::class, 'PrintPdfLicense']);

//Certificate --application
Route::get('/certificate-application', [CertficateController::class, 'CertificateApplication']);
Route::post('/insert-nagorik_application', [CertficateController::class, 'InsertCertificateApplication']);
Route::get('/approve-pending', [CertficateController::class, 'ApprovePendingCharacterApplication']);

Route::get('/pdf-character_certficate', [CertficateController::class, 'PdfCharacterCertificate']);

//list sonod
Route::get('/all-nagorik_sonod', [CertificateListController::class, 'AllNagorikSonod']);
Route::get('/all-character_sonod', [CertificateListController::class, 'AllCharacterSonod']);
Route::get('/view-character_certificate/{id}', [CertificateListController::class, 'ViewCharacterCertificate']);

Route::get('/approved-character_certificate/{id}', [CertificateListController::class, 'ApprovedCharacterCertificate']);

Route::get('/inactived-character_certificate/{id}', [CertificateListController::class, 'InactivedCharacterCertificate']);

// নাগরিক সনদ  member route
Route::get('sanad_select', [SanadApplyController::class, 'sanadSelect'])->name('sanad.select');
Route::post('sanad_apply', [SanadApplyController::class, 'sanadApply'])->name('sanad.apply');
Route::post('sanad_view', [SanadApplyController::class, 'sanadView'])->name('sanad.view');
Route::get('/nagorik-member', [SanadApplyController::class, 'NagorikMember']);

Route::get('/pdf-nagorik_pdf', [SanadApplyController::class, 'PdfNagorik']);

Route::get('/my-nagorik_details/{id}', [SanadApplyController::class, 'MyNagorikDetails']);

//nagorik --view
Route::get('/approved-nagorik/{id}', [CertificateListController::class, 'ApprovedNagorik']);
Route::get('/inactived-nagorik/{id}', [CertificateListController::class, 'InactiveNagorik']);
Route::get('/view-nagorik/{id}', [CertificateListController::class, 'ViewNagorik']);
Route::get('/all-warish_sonod', [CertificateListController::class, 'AllWarishSonod']);
Route::get('/approved-warish/{id}', [CertificateListController::class, 'ApprovedWarish']);
Route::get('/inactived-warish/{id}', [CertificateListController::class, 'InactivedWarish']);
Route::get('/view-warish/{id}', [CertificateListController::class, 'ViewWarish']);

//dead certificate --admin
Route::get('/all-dead_sonod', [CertificateListController::class, 'AllDeadSonod']);
Route::get('/approved-dead_sonod/{id}', [CertificateListController::class, 'ApprovedDeadSonod']);

Route::get('/inactived-dead_sonod/{id}', [CertificateListController::class, 'InactivedDeadSonod']);

Route::get('/view-dead_sonod/{id}', [CertificateListController::class, 'ViewDeadSonod']);

//orphan sonod
Route::get('/all-orphan_sonod', [CertificateListController::class, 'AllOrphanSonod']);

Route::get('/approved-orphan_sonod/{id}', [CertificateListController::class, 'ApprovedOrphanSonod']);
Route::get('/inactived-orphan_sonod/{id}', [CertificateListController::class, 'InactivedOrphanSonod']);
Route::get('/view-orphan_sonod/{id}', [CertificateListController::class, 'ViewOrphanSonod']);

//warish sonod
Route::get('/warish-sanad', [SanadApplyController::class, 'WarishSonod']);
Route::post('/insert-warish_application', [WarishController::class, 'InsertWarishApplication']);
Route::get('/success-pending_warish', [WarishController::class, 'SuccessPendingWarish']);
Route::get('/pdf-warish/{id}', [WarishController::class, 'PdfWarish']);

//My Nagorik Sonod List && Application Status
Route::get('/my-nagorik_list', [ApplicationStatusCobtroller::class, 'MyNagorikList'])->name('total.nagorik_sonod');
Route::get('/my-character_list', [ApplicationStatusCobtroller::class, 'MyCharacterList'])->name('total.character_sonod');
Route::get('/my-character_details/{id}', [ApplicationStatusCobtroller::class, 'MyCharacterDetails']);
Route::get('/my-warish_list', [ApplicationStatusCobtroller::class, 'MyWarishList'])->name('total.warish_sonod');
Route::get('/my-warish_details/{id}', [ApplicationStatusCobtroller::class, 'MyWarishDetails']);

Route::get('/death-sanad', [ApplicationStatusCobtroller::class, 'DeadSonod']);
Route::post('/insert-death_sonod', [ApplicationStatusCobtroller::class, 'InsertDeathSonod']);
Route::get('/my-dead_list', [ApplicationStatusCobtroller::class, 'MyDeadList'])->name('total.death_sonod');
Route::get('/my-dead_details/{id}', [ApplicationStatusCobtroller::class, 'Mydeaddetails']);

//orphan sonod
Route::get('/orphan-sanad', [ApplicationStatusCobtroller::class, 'OrphanSanad']);
Route::post('/insert-orphan_sonod', [ApplicationStatusCobtroller::class, 'InsertOrphanSanad']);
Route::get('/my-orphan_list', [ApplicationStatusCobtroller::class, 'MyOrphanList'])->name('total.orphan_sonod');
Route::get('/my-orphan_details/{id}', [ApplicationStatusCobtroller::class, 'MyOrphanDetails']);

//Support Admin
Route::get('/support_admin', [SupportAdminController::class, 'index'])->name('supportAdmin.index');
Route::get('/support_admin_create', [SupportAdminController::class, 'create'])->name('supportAdmin.create');
Route::post('/support_admin_create', [SupportAdminController::class, 'store'])->name('supportAdmin.create');
Route::get('/support_admin_destroy/{id}', [SupportAdminController::class, 'destroy'])->name('supportAdmin.destroy');
Route::get('/support_admin_edit/{id}', [SupportAdminController::class, 'edit'])->name('supportAdmin.edit');
Route::post('/support_admin_update', [SupportAdminController::class, 'update'])->name('supportAdmin.update');
Route::get('/support_admin_show/{id}', [SupportAdminController::class, 'show'])->name('supportAdmin.show');
Route::get('/support_admin_filter', [SupportAdminController::class, 'filter'])->name('supportAdmin.filter');
Route::get('/all_general_memmer_support_admin/{date}/{userid}', [SupportAdminController::class, 'supportAdminGenView'])->name('support_admin_gen_view'); // Tariqul
Route::get('/all_business_hold_support_admin/{date}/{userid}', [SupportAdminController::class, 'supportAdminBussnessView'])->name('support_admin_business_view'); // Tariqul
//bosot bokeya report
Route::get('/bosot-due_list', [DueController::class, 'BosotDuelist']);
Route::get('/bosot-due_list', [DueController::class, 'BosotDuelist']);
Route::get('/get-ward_village_data', [DueController::class, 'GetWardVillageData']);
Route::get('/search-bosot_due', [DueController::class, 'SearchBosotDue']);
Route::get('/total-bosot_due', [DueController::class, 'TotalBosotDue']);
Route::get('/pay-bosot_due', [DueController::class, 'PayBosotDue']);
Route::post('/filter-pay_bosot_bari', [DueController::class, 'FilterPayBosotBari']);
Route::get('/due-aday/{id}', [DueController::class, 'DueAday']);
Route::post('/paid-bosot_due/{id}', [DueController::class, 'PaidBosotDue']);
Route::get('/due_data-aday/{id}', [DueController::class, 'DueDataAday']);
Route::post('/collection-bosot_due/{id}', [DueController::class, 'CollectionDue']);

//Meyor Create
Route::get('/create-meyor', [MeyorController::class, 'CreateMeyor']);
Route::post('/update-meyor/{id}', [MeyorController::class, 'UpdateMeyor']);

//website slider
Route::get('/all-slider', [WebsiteSliderController::class, 'AllSlider']);
Route::get('/add-slider', [WebsiteSliderController::class, 'AddSlider']);
Route::post('/insert-website_slider', [WebsiteSliderController::class, 'InsertSlider']);
Route::get('/edit-website_slider/{id}', [WebsiteSliderController::class, 'EditSlider']);
Route::post('/update-website_slider/{id}', [WebsiteSliderController::class, 'UpdateSlider']);
Route::get('/delete-website_slider/{id}', [WebsiteSliderController::class, 'DeleteSlider']);

//councilors
Route::get('/councilors', [CouncilorController::class, 'Councilors']);
Route::get('/add-councilor', [CouncilorController::class, 'AddCouncilor']);
Route::post('/insert-councilor', [CouncilorController::class, 'InsertCouncilor']);
Route::get('/edit-councilor/{id}', [CouncilorController::class, 'EditCouncilor']);
Route::post('/update-councilor/{id}', [CouncilorController::class, 'UpdateCouncilor']);
Route::get('/delete-councilor/{id}', [CouncilorController::class, 'DeleteCouncilor']);
Route::get('/councilors-mohila', [CouncilorController::class, 'MohilaCouncilors']);
Route::get('/add-mohila_councilor', [CouncilorController::class, 'AddMohilaCouncilor']);
Route::post('/insert-mohia_councilor', [CouncilorController::class, 'InsertMohilaCouncilor']);
Route::get('/edit-mohila_councilor/{id}', [CouncilorController::class, 'EditMohilaCouncilor']);
Route::get('/delete-mohila_councilor/{id}', [CouncilorController::class, 'DeleteMohilaCouncilor']);
Route::post('/update-mohia_councilor/{id}', [CouncilorController::class, 'UpdateMohilaCouncilor']);

//New 25/08/2021
//Notice Admin
Route::get('daynamic_notice_index', [NoticeController::class, 'index'])->name('notice.index');
Route::post('daynamic_notice_store', [NoticeController::class, 'noticeStore'])->name('notice.store');
Route::get('daynamic_notice_edit/{id}', [NoticeController::class, 'noticeEdit'])->name('notice.edit');
Route::post('daynamic_notice_edit', [NoticeController::class, 'noticeUpdate'])->name('notice.edit');
Route::get('daynamic_notice_delete/{id}', [NoticeController::class, 'destroy'])->name('notice.delete');

//Front
Route::get('notices', [FrontController::class, 'notice'])->name('webpage.notice');
Route::get('download', [FrontController::class, 'download'])->name('webpage.form');
Route::get('citizen-charter', [FrontController::class, 'citizen'])->name('webpage.citizen');
Route::get('once-eye', [FrontController::class, 'onceEye'])->name('webpage.onceEye');
Route::get('mayor-profile', [FrontController::class, 'mayorProfile'])->name('webpage.mayorProfile');
Route::get('councilor-profile', [FrontController::class, 'councilorProfile'])->name('webpage.councilor');
Route::get('uno-profile', [FrontController::class, 'unoProfile'])->name('webpage.uno');
Route::get('admin-profile', [FrontController::class, 'adminProfile'])->name('webpage.admin');
Route::get('engineer-profile', [FrontController::class, 'engineerProfile'])->name('webpage.engineer');

//Download Admin
Route::get('daynamic_download_index', [NoticeController::class, 'downloadIndex'])->name('notice.download');
Route::get('daynamic_download_edit/{id}', [NoticeController::class, 'downloadEdit'])->name('notice.download.edit');

//Department
Route::get('uno_info', [DepartmentController::class, 'unoIndex'])->name('department.unoIndex');
Route::get('uno_edit/{id}', [DepartmentController::class, 'unoEdit'])->name('department.unoEdit');
Route::post('uno_update', [DepartmentController::class, 'unoUpdate'])->name('department.unoEdit');
Route::post('department_store', [DepartmentController::class, 'departmentStore'])->name('department.store');
Route::get('department_delete/{id}', [DepartmentController::class, 'departmentDelete'])->name('department.delete');
Route::get('admin_info', [DepartmentController::class, 'adminInfo'])->name('department.adminInfo');
Route::get('admin_edit/{id}', [DepartmentController::class, 'adminEdit'])->name('department.adminEdit');

Route::get('engineer_info', [DepartmentController::class, 'engineerInfo'])->name('department.engineerInfo');
Route::get('engineer_edit/{id}', [DepartmentController::class, 'engineerEdit'])->name('department.engineerEdit');
Route::get('information_center', [DepartmentController::class, 'infoCenter'])->name('department.info');
Route::post('information_center', [DepartmentController::class, 'infoCenterUpdate'])->name('department.info');
Route::get('information_center_delete', [DepartmentController::class, 'infoCenterDelete'])->name('department.infoDelete');

//25/05/2021 End
//important topic
Route::get('/important-topic', [NewNoticeController::class, 'ImportantNotice']);
Route::post('/insert-link', [NewNoticeController::class, 'InsertLink']);
Route::get('/add-link', [NewNoticeController::class, 'AddLink']);
Route::get('/edit-important-link/{id}', [NewNoticeController::class, 'EditLink']);
Route::get('/delete-important-link/{id}', [NewNoticeController::class, 'DeleteLink']);
Route::post('/update-link/{id}', [NewNoticeController::class, 'UpdateLink']);

//Beneficiaries
Route::get('/add-beneficiaries', [BeneficalController::class, 'AddBeneficial']);
Route::post('/store-beneficial', [BeneficalController::class, 'StoreBeneficial']);
Route::get('/all-beneficiaries', [BeneficalController::class, 'AllBeneficial']);
Route::get('/edit-beneficial/{id}', [BeneficalController::class, 'EditBeneficial']);
Route::post('/update-beneficial/{id}', [BeneficalController::class, 'UpdateBeneficial']);
Route::get('/delete-beneficial/{id}', [BeneficalController::class, 'DeleteBeneficial']);
Route::get('/search-beneficial', [BeneficalController::class, 'SearchBeneficial']);
Route::get('/all-allowance', [BeneficalController::class, 'AllAllowance']);
Route::post('/select-allowance', [BeneficalController::class, 'SelectAllowance']);
Route::get('/filter-beneficial_type', [BeneficalController::class, 'FilterAllowanceType']);

//Trade Due
Route::get('/trade-due', [DueController::class, 'TradeDue']);
Route::get('/filter-trade_due', [DueController::class, 'FilterTradeDue']);
Route::get('/aday-trade_due', [DueController::class, 'AdayTradeDue']);
Route::post('/insert-trade_due', [DueController::class, 'InsertTradeDue']);

//new bosot bokeya
Route::get('/new-bosot_bokeya_list', [BosotDueController::class, 'NewBosotBokeyaList']);
Route::get('/new_filter_bosot_due_list', [BosotDueController::class, 'NewFilterBosotBokeyaList']);
Route::get('/aday-new_bosot_due', [BosotDueController::class, 'AdayNewBosotDue']);
Route::post('/insert-new_bosot_due', [BosotDueController::class, 'InsertNewBosotDue']);
Route::get('/new_total_bosot_bokeya_list', [BosotDueController::class, 'NewTotalBosotDue']);
Route::get('/new_bosot_due_aday_list', [BosotDueController::class, 'NewBosotDueAdayList']);
Route::post('/filtering-new_pay_bosot_bari', [BosotDueController::class, 'NewBosotDueAdayListTwo']);

//report
Route::get('/all-report', [ReportController::class, 'AllReport']);
Route::post('/select-option', [ReportController::class, 'SelectOption']);
Route::get('/filter-data_bosot_report', [ReportController::class, 'FilterDataBosotReport']);
Route::get('/filter-data_trade_report', [ReportController::class, 'FilterDataTradeReport']);
Route::get('/filter-data_nagrorik_report', [ReportController::class, 'FilterDataNagorikReport']);
Route::get('/filter-data_character_report', [ReportController::class, 'FilterDataCharacterReport']);
Route::get('/filter-data_orphan_report', [ReportController::class, 'FilterDataOrphanReport']);
Route::get('/filter-data_death_report', [ReportController::class, 'FilterDataDeathReport']);
Route::get('/filter-data_warish_report', [ReportController::class, 'FilterDataWarishReport']);

//Welcome Description
Route::get('/welcome-description', [NoticeController::class, 'WelcomeDescription']);
Route::post('/update-welcome-description/{id}', [NoticeController::class, 'UpdateWelcomeDescription']);

/* * ********************************* Registration Routes ********************************** */
//Homestead Registration Controller
Route::get('/homestead-registration', [RegistrationController::class, 'homestead']);
Route::get('/getvillageinfo/{id}', [RegistrationController::class, 'getvillageinfo']);
Route::get('/getpostofficeinfo/{id}', [RegistrationController::class, 'getpostofficeinfo']);
Route::get('/get_house_tax_rate/{id}', [RegistrationController::class, 'get_house_tax_rate']);
Route::get('/getduplicatebirthnid/{value}/{value2}', [RegistrationController::class, 'getduplicatebirthnid']);
Route::get('/getduplicatenumber/{value}/', [RegistrationController::class, 'getduplicatenumber']);
Route::post('/nagorikshebainfo', [RegistrationController::class, 'savenagorikshebainfo'])->name('store.nagorikshebainfo');

//Business Organization Registration
Route::get('/business-registration', [RegistrationController::class, 'businessregistration']);
Route::post('/storebusinessholdinfo', [RegistrationController::class, 'storebusinessholdinfo'])->name('store.storebusinessholdinfo');
Route::get('/getbusinessduplicatebirthnid/{value}/{value2}', [RegistrationController::class, 'getbusinessduplicatebirthnid']);
Route::get('/getbusinessduplicatenumber/{value}', [RegistrationController::class, 'getbusinessduplicatenumber']);

//Commercial Holding Controller
Route::get('/commercial-holding', [RegistrationController::class, 'commercial']);
Route::get('/getcomercialduplicatebirthnid/{value}/{value2}', [RegistrationController::class, 'getcomercialduplicatebirthnid']);
Route::get('/getcomercialduplicatenumber/{value}', [RegistrationController::class, 'getcomercialduplicatebirthnid']);
Route::post('/storecommercialholdinfo', [RegistrationController::class, 'storecommercialholdinfo'])->name('store.storecommercialholdinfo');

//Tariqul New
Route::get('password_change_view', [ProfileUpdateController::class, 'index'])->name('password_change.view');
Route::post('password_change_view', [ProfileUpdateController::class, 'create'])->name('password_change.create');

Route::get('email_change_view', [ProfileUpdateController::class, 'email_index'])->name('email_change.view');
Route::post('email_change_view', [ProfileUpdateController::class, 'email_create'])->name('email_change.create');

//SUMON STARTS

Route::get('create-user', [UserController::class, 'create_user_form'])->name('user.create');
Route::post('store-user', [UserController::class, 'store_user'])->name('user.store');
Route::get('user-list', [UserController::class, 'index'])->name('user.index');
Route::get('edit-user/{id}', [UserController::class, 'edit_user_form'])->name('user.edit');
Route::post('update-user/{id}', [UserController::class, 'update_user'])->name('user.update');
Route::get('delete-user/{id}', [UserController::class, 'delete_user'])->name('user.delete');

Route::resource('roles', RoleController::class);

Route::get('/active-report', [ActiveReportController::class, 'index'])->name('activeReport.index');
Route::get('/active-report-show/{userId}', [ActiveReportController::class, 'show'])->name('activeReport.show');
Route::get('/active-report-filter', [ActiveReportController::class, 'filter'])->name('activeReport.filter');
Route::get('/active_general_member_support_admin/{date}/{userid}', [ActiveReportController::class, 'activeReportGenView'])->name('active_report_gen_view');
Route::get('/active_business_hold_support_admin/{date}/{userid}', [ActiveReportController::class, 'activeReportBusinessView'])->name('active_report_business_view');

Route::get('/bosot-bari-holding-report', [PdfReportController::class, 'bosot_bari_holding_report'])->name('bosot-report');

//SUMON ENDS
