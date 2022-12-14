<?php

namespace App\Providers;

use App\Repositories\Interface\FeeInvoiceRepositoryInterface;
use App\Repositories\Interface\FeeProcessingRepositoryInterface;
use App\Repositories\Interface\FeeRepositoryInterface;
use App\Repositories\Interface\LibraryRepositoryInterface;
use App\Repositories\Interface\QuestionRepositoryInterface;
use App\Repositories\Interface\QuizRepositoryInterface;
use App\Repositories\Interface\StudentGraduatedRepositoryInterface;
use App\Repositories\Interface\StudentPaymentRepositoryInterface;
use App\Repositories\Interface\StudentPromotionRepositoryInterface;
use App\Repositories\Interface\StudentReceiptRepositoryInterface;
use App\Repositories\Interface\StudentRepositoryInterface;
use App\Repositories\Interface\SubjectRepositoryInterface;
use App\Repositories\Interface\TeacherRepositoryInterface;
use App\Repositories\Repository\FeeInvoiceRepository;
use App\Repositories\Repository\FeeProcessingRepository;
use App\Repositories\Repository\FeeRepository;
use App\Repositories\Repository\LibraryRepository;
use App\Repositories\Repository\QuestionRepository;
use App\Repositories\Repository\QuizRepository;
use App\Repositories\Repository\StudentGraduatedRepository;
use App\Repositories\Repository\StudentPaymentRepository;
use App\Repositories\Repository\StudentPromotionRepository;
use App\Repositories\Repository\StudentReceiptRepository;
use App\Repositories\Repository\StudentRepository;
use App\Repositories\Repository\SubjectRepository;
use App\Repositories\Repository\TeacherRepository;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TeacherRepositoryInterface::class,                     TeacherRepository::class,);

        $this->app->bind(StudentRepositoryInterface::class,                     StudentRepository::class);

        $this->app->bind(StudentPromotionRepositoryInterface::class,            StudentPromotionRepository::class);

        $this->app->bind(StudentGraduatedRepositoryInterface::class,            StudentGraduatedRepository::class);

        $this->app->bind(FeeRepositoryInterface::class,                         FeeRepository::class);

        $this->app->bind(FeeInvoiceRepositoryInterface::class,                  FeeInvoiceRepository::class);

        $this->app->bind(StudentReceiptRepositoryInterface::class,              StudentReceiptRepository::class);

        $this->app->bind(FeeProcessingRepositoryInterface::class,               FeeProcessingRepository::class);

        $this->app->bind(StudentPaymentRepositoryInterface::class,              StudentPaymentRepository::class);

        $this->app->bind(SubjectRepositoryInterface::class,                     SubjectRepository::class);

        $this->app->bind(QuizRepositoryInterface::class,                        QuizRepository::class);

        $this->app->bind(QuestionRepositoryInterface::class,                    QuestionRepository::class);

        $this->app->bind(LibraryRepositoryInterface::class,                     LibraryRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}