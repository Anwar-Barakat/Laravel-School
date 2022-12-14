<!-- Dashboard -->
<li>
    <a href="{{ route('student.dashboard') }}" class="mt-2" data-target="#quizzes-menu">
        <div class="pull-left"><i class="fas fa-school"></i><span class="right-nav-text">{{ __('trans.dashboard') }}</span>
        </div>
        <div class="clearfix"></div>
    </a>
</li>
<!-- menu title -->
<li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ __('trans.components') }} </li>

<!-- Quizzes -->
<li>
    <a href="{{ route('student.quizzes.index') }}" data-target="#quizzes-menu">
        <div class="pull-left"><i class="fas fa-book-open"></i><span class="right-nav-text">{{ __('trans.quizzes') }}</span></div>
        <div class="clearfix"></div>
    </a>
</li>

<!-- Libarary -->
<li>
    <a data-target="#library-menu" href="{{ route('student.books.index') }}">
        <div class="pull-left"><i class="fas fa-books"></i><span class="right-nav-text">{{ __('trans.library') }}</span>
        </div>
        <div class="pull-right"></div>
        <div class="clearfix"></div>
    </a>
    <ul id="library-menu" class="collapse" data-parent="#sidebarnav">
        <li>
            <a target="_blank" href="{{ route('student.books.index') }}">
                {{ __('trans.list', ['name' => __('trans.books')]) }}
            </a>
        </li>
    </ul>
</li>

<!-- Profile -->
<li>
    <a href="{{ route('student.profile.index') }}" data-target="#quizzes-menu">
        <div class="pull-left"><i class="fas fa-id-card-alt"></i><span class="right-nav-text">{{ __('trans.profile') }}</span></div>
        <div class="clearfix"></div>
    </a>
</li>
