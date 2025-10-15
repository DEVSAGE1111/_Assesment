@extends('layouts.app')

@section('content')
    <style>
        /* ==== Header ==== */
        .bg-gradient-strong {
            background: linear-gradient(90deg, #556173, #a091b9);
        }

        /* ==== Card Design ==== */
        .row .card {
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            border-top: 4px solid #0d6efd;
        }

        .row .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.3);
            border-top-color: #6610f2;
        }

        /* Card Title & Text */
        .card-title {
            color: #0d6efd;
            font-weight: 700;
        }

        .card-text {
            color: #555;
        }

        /* ==== Pagination ==== */
        .page-link {
            border-radius: 50% !important;
            margin: 0 3px;
            color: #0d6efd;
            border: 1px solid #0d6efd;
            transition: all 0.2s ease;
        }

        .page-item.active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff;
        }

        .page-link:hover {
            background-color: #6610f2;
            color: #fff;
            transform: scale(1.1);
        }

        /* ==== RSS Icon Glow ==== */
        .text-warning:hover {
            color: #ffc107 !important;
            text-shadow: 0 0 10px rgba(255, 193, 7, 0.9);
        }

        /* ==== Section Transition ==== */
        div[style*="linear-gradient"] {
            animation: fadeSlide 0.8s ease-in-out;
        }

        @keyframes fadeSlide {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    @include('posts._search_form')

    <x-turbo::frame id="posts">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-4 pb-3 px-4 py-3 rounded-3 text-white shadow"
            style="background: linear-gradient(90deg, #0d6efd, #6610f2);">
            <h2 class="fw-bold mb-0">
                @if (filled(request('q')))
                    <i class="bi bi-search me-2 text-warning"></i>
                    {{ trans_choice('posts.search_results', $posts->count()) }}
                @else
                    <i class="bi bi-clock-history me-2 text-warning"></i>
                    @lang('posts.last_posts')
                @endif
            </h2>

            <a href="{{ route('posts.feed') }}" class="text-decoration-none text-warning fs-4" title="RSS Feed"
                data-turbo="false">
                <i class="bi bi-rss-fill"></i>
            </a>
        </div>

        <!-- Posts Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-4">
            @each('posts._post', $posts, 'post', 'posts._empty')
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            <nav aria-label="Posts Pagination">
                {{ $posts->onEachSide(1)->links() }}
            </nav>
        </div>
    </x-turbo::frame>
@endsection
