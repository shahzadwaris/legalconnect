<?php

use App\Models\Job;
use App\Models\Zip;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/fix', function () {
    $jobs = Job::all();
    foreach ($jobs as $job) {
        $data = Zip::where('code', $job['zip'])->first();
        $job->update(['latitude'=> $data->latitude ?? '', 'longitude' => $data->longitude ?? '']);
    }
});

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/find-jobs', 'JobsController@index')->name('home.jobs.index');
Route::get('/find-job/search', 'JobsController@search')->name('home.jobs.search');
Route::get('/find-job/category/{slug}', 'CategoryController@show')->name('home.category.show');
Route::get('/contact-us', 'ContactController@index')->name('home.contact.index');
Route::post('/contact-us/store', 'ContactController@store')->name('home.contact.store');
Route::get('/about-us', 'HomeController@about')->name('home.about');
Route::get('/find-job/{slug}', 'JobsController@show')->name('home.jobs.show');

Route::get('/as', function () {
    if (!(Auth::check())) {
        return redirect()->route('login');
    }
    $user = Auth::user();
    if ($user->type == 1) {
        return redirect()->route('nurse.index');
    }
    if ($user->type == 2) {
        return redirect()->route('provider.index');
    }
    if ($user->type == 3) {
        return redirect()->route('admin.index');
    }
})->name('/');
Route::get('/frequnetly-asked-questions', 'HomeController@faq')->name('faq');
Route::get('/worker/terms-and-conditions', 'HomeController@termsNurse')->name('home.nurse.terms');
Auth::routes();
Route::get('/change-password', 'Auth\ChangePasswordController@index')->name('changePassword.index');
Route::post('/update-password', 'Auth\ChangePasswordController@update')->name('changePassword.update');
Route::get('worker-register', 'Auth\RegisterController@nurseRegister')->name('register.nurse');
Route::get('firm-register', 'Auth\RegisterController@medicalProviderRegister')->name('register.provider');

Route::get('/nurse/provider/{username}', 'Nurse\NurseController@providerProfile')->name('nurse.providerProfile');
Route::get('/provider/nurse/{username}', 'Provider\ProviderController@nurseProfile')->name('provider.nurseProfile');

Route::get('/notifications/settings', 'NotificationsController@settings')->name('notifications.settings');
Route::post('/notifications/settings-update', 'NotificationsController@update')->name('notifications.update');
Route::get('/notifications/mark-read', 'NotificationsController@markRead')->name('notification.markRead');

Route::middleware(['auth', 'nurse'])->group(function () {
    Route::get('/worker/profile', 'Nurse\NurseController@profile')->name('nurse.profile');
    Route::post('/worker/update-personal-details', 'Nurse\NurseController@updatePersonalDetails')->name('nurse.personalDetails');
    Route::post('/worker/update-medical-provider-details', 'Nurse\NurseController@updateMedicalProviderDetails')->name('nurse.updateMedicalProviderDetails');
});
Route::middleware(['auth', 'nurse', 'profile'])->group(function () {
    Route::get('/worker', 'Nurse\NurseController@index')->name('nurse.index');
    Route::get('/worker/delete-profile', 'Nurse\NurseController@deleteProfile')->name('nurse.deleteProfile');
    Route::post('/worker/add-bank', 'Nurse\NurseController@addBank')->name('nurse.addBank');
    Route::get('/worker/destroy-profile', 'Nurse\NurseController@destroy')->name('nurse.destroy');

    Route::get('/worker/inbox', 'Nurse\ChatController@index')->name('chat.index');
    Route::get('/worker/inbox/messages/{id}', 'Nurse\ChatController@show')->name('chat.show');

    Route::get('/worker/earning', 'Nurse\EarningController@index')->name('earning.index');
    Route::get('/worker/jobs', 'Nurse\JobController@index')->name('job.index');
    Route::get('/worker/jobs/search', 'Nurse\JobController@search')->name('job.search');
    Route::get('/worker/jobs/applied', 'Nurse\ApplyController@index')->name('apply.index');
    Route::get('/worker/jobs/applied/store/{jobID}/{providerID}', 'Nurse\ApplyController@store')->name('apply.store');
    Route::get('/worker/jobs/applied/destroy/{id}', 'Nurse\ApplyController@destroy')->name('apply.destroy');
    Route::get('/worker/jobs/connection', 'Nurse\ApplyController@connection')->name('apply.connection');
    Route::get('/worker/jobs/hired', 'Nurse\HiredController@index')->name('hired.index');
    Route::get('/worker/jobs/declined', 'Nurse\HiredController@declined')->name('hired.declined');
});

Route::middleware(['auth', 'provider'])->group(function () {
    Route::get('/firm/profile', 'Provider\ProviderController@profile')->name('provider.profile');
    Route::post('/firm/profile-update', 'Provider\ProviderController@updateBusinessDetails')->name('provider.updateBusinessDetails');
    Route::post('/firm/profile-update-business', 'Provider\ProviderController@updateBusiness')->name('provider.updateBusiness');
    Route::get('/firm/terms-and-conditions', 'HomeController@termsMP')->name('home.provider.terms');
    Route::get('/pricing', 'SubscriptionController@index')->name('sub.index');
    Route::get('/subscribe/plan/{id}', 'SubscriptionController@create')->name('sub.create');
    Route::get('/subscribe/store', 'SubscriptionController@store')->name('sub.store');
    Route::get('/subscribe/show', 'SubscriptionController@show')->name('sub.show');
});

Route::middleware(['auth', 'provider', 'profile', 'IsPaid'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/firm', 'Provider\ProviderController@index')->name('provider.index');

    Route::get('/firm/delete-profile', 'Provider\ProviderController@deleteProfile')->name('provider.deleteProfile');
    // Route::get('/provider/nurse/{username}', 'Provider\ProviderController@nurseProfile')->name('provider.nurseProfile');

    Route::get('/firm/destroy-profile', 'Provider\ProviderController@destroy')->name('provider.destroy');

    Route::get('/firm/create-token', 'Provider\BankController@createToken')->name('bank.createToken');
    Route::post('/firm/verify-token', 'Provider\BankController@verifyToken')->name('bank.verifyToken');

    Route::post('/firm/add-bank', 'Provider\BankController@addBank')->name('bank.addBank');

    Route::get('/firm/jobs', 'Provider\JobController@index')->name('provider.job.index');
    Route::get('/firm/jobs/create', 'Provider\JobController@create')->name('provider.job.create');
    Route::post('/firm/jobs/store', 'Provider\JobController@store')->name('provider.job.store');
    Route::get('/firm/jobs/edit/{id}', 'Provider\JobController@edit')->name('provider.job.edit');
    Route::post('/firm/jobs/update/{id}', 'Provider\JobController@update')->name('provider.job.update');
    Route::get('/firm/jobs/destroy/{id}', 'Provider\JobController@destroy')->name('provider.job.destroy');
    Route::get('/firm/inbox', 'Provider\ChatController@index')->name('provider.chat.index');
    Route::get('/firm/payments', 'Provider\PaymentController@index')->name('provider.payment.index');
    Route::get('/firm/payments/create', 'Provider\PaymentController@create')->name('provider.payment.create');
    Route::post('/firm/payments/store', 'Provider\PaymentController@store')->name('provider.payment.store');
    Route::get('/firm/worker/connection-requests', 'Provider\NursesController@connectionsRequest')->name('provider.nurses.requests');
    Route::get('/firm/worker/connection-accept/{id}', 'Provider\NursesController@connectionsAccept')->name('provider.nurses.requests.accept');
    Route::get('/firm/worker/connections-reject/{id}', 'Provider\NursesController@connectionsReject')->name('provider.nurses.requests.reject');
    Route::get('/firm/worker/connections', 'Provider\NursesController@connections')->name('provider.nurses.connections');
    Route::get('/firm/worker/hired', 'Provider\NursesController@hired')->name('provider.nurses.hired');
    Route::get('/firm/worker/mark-hired/{id}', 'Provider\NursesController@markHired')->name('provider.nurses.markHired');
    Route::get('/firm/worker/mark-completed/{id}', 'Provider\NursesController@markCompleted')->name('provider.nurses.markCompleted');
    Route::get('/firm/worker/declined', 'Provider\NursesController@declined')->name('provider.nurses.declined');

    Route::get('/firm/contact/messages/{id}', 'Provider\ChatController@show')->name('provider.chat.show');
    Route::post('/firm/message/store', 'Provider\ChatController@store')->name('provder.message.store');
});
Route::get('/admin/login', 'Admin\AdminController@login')->name('admin.login');
Route::post('/admin/login/attempt', 'Admin\AdminController@loginAttempt')->name('admin.login.process');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', 'Admin\AdminController@index')->name('admin.index');
    Route::get('/admin/show', 'Admin\AdminController@show')->name('admin.show');
    Route::get('/admin/create', 'Admin\AdminController@create')->name('admin.create');
    Route::get('/admin/edit/{id}', 'Admin\AdminController@edit')->name('admin.edit');
    Route::get('/admin/destroy/{id}', 'Admin\AdminController@destroy')->name('admin.destroy');
    Route::get('/admin/change-password/{id}', 'Admin\AdminController@changePassword')->name('admin.changePassword');
    Route::post('/admin/store', 'Admin\AdminController@store')->name('admin.store');
    Route::post('/admin/update/{id}', 'Admin\AdminController@update')->name('admin.update');
    Route::post('/admin/update-password/{id}', 'Admin\AdminController@updatePassword')->name('admin.updatePassword');

    Route::get('/admin/providers', 'Admin\ProvidersController@index')->name('admin.providers.index');
    Route::get('/admin/providers/charge-provider', 'Admin\ProvidersController@charge')->name('admin.providers.charge');
    Route::post('/admin/providers/charge-process', 'Admin\ProvidersController@chargeProcess')->name('admin.providers.charge.process');
    Route::get('/admin/providers/edit-profile/{id}', 'Admin\ProvidersController@edit')->name('admin.provider.edit');
    Route::post('/admin/providers/update-profile/{id}', 'Admin\ProvidersController@update')->name('admin.provider.update');
    Route::get('/admin/providers/suspend-account/{id}', 'Admin\ProvidersController@suspendAccount')->name('admin.provider.suspend');
    Route::get('/admin/providers/destroy/{id}', 'Admin\ProvidersController@destroy')->name('admin.provider.destroy');
    Route::get('/admin/providers/mark-paid/{id}', 'Admin\ProvidersController@markPaid')->name('admin.provider.paid');
    Route::get('/admin/providers/mark-unpaid/{id}', 'Admin\ProvidersController@markUnPaid')->name('admin.provider.unpaid');

    Route::get('/admin/nurses/destroy/{id}', 'Admin\NursesController@destroy')->name('admin.nurse.destroy');
    Route::get('/admin/nurses/edit-profile/{id}', 'Admin\NursesController@edit')->name('admin.nurse.edit');
    Route::post('/admin/nurses/update-profile/{id}', 'Admin\NursesController@update')->name('admin.nurse.update');

    Route::get('/admin/conversations', 'Admin\ConversationController@index')->name('admin.conversation.index');

    Route::get('/admin/nurses', 'Admin\NursesController@index')->name('admin.nurses.index');
    Route::get('/admin/nurses/make-payment', 'Admin\NursesController@makePayment')->name('admin.nurses.makePayment');
    Route::post('/admin/make-payment-process', 'Admin\NursesController@makePaymentProcess')->name('admin.nurses.makePayment.process');
    Route::get('/admin/jobs', 'Admin\JobsController@index')->name('admin.jobs.index');
    Route::get('/admin/jobs/create/', 'Admin\JobsController@create')->name('admin.jobs.create');
    Route::post('/admin/jobs/create/store', 'Admin\JobsController@store')->name('admin.jobs.store');
    Route::get('/admin/jobs/edit/{id}', 'Admin\JobsController@edit')->name('admin.jobs.edit');
    Route::post('/admin/jobs/update/{id}', 'Admin\JobsController@update')->name('admin.jobs.update');
    Route::get('/admin/jobs/destroy/{id}', 'Admin\JobsController@destroy')->name('admin.jobs.destroy');

    Route::get('/admin/payments', 'Admin\PaymentsController@index')->name('admin.payments.index');

    Route::get('/admin/categories', 'Admin\CategoryController@index')->name('admin.category.index');
    Route::get('/admin/category/create', 'Admin\CategoryController@create')->name('admin.category.create');
    Route::get('/admin/category/edit/{id}', 'Admin\CategoryController@edit')->name('admin.category.edit');
    Route::get('/admin/category/destroy/{id}', 'Admin\CategoryController@destroy')->name('admin.category.destroy');
    Route::post('/admin/category/store', 'Admin\CategoryController@store')->name('admin.category.store');
    Route::post('/admin/category/update/{id}', 'Admin\CategoryController@update')->name('admin.category.update');

    Route::get('/admin/pages/nurse-terms', 'Admin\PagesController@nurseTerms')->name('page.nurse-terms');
    Route::get('/admin/pages/medical-provider-terms', 'Admin\PagesController@mpTerms')->name('page.mpTerms');
    Route::post('/admin/pages/update', 'Admin\PagesController@update')->name('page.update');
    Route::get('/admin/contact-us', 'Admin\ContactController@index')->name('admin.contact.index');
});
