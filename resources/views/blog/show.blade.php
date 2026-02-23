@extends('layouts.app')

@section('title', ($article->title ?? 'Blog Detail') . ' | Dar Ibnu Abbas')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-primary-600 text-white pt-32 pb-20 md:pt-40 md:pb-28">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="container mx-auto px-4 relative">
            <div class="max-w-4xl mx-auto text-center animate-fade-in">
                <div class="mb-4">
                    <span class="bg-accent-DEFAULT text-primary-800 px-4 py-1 rounded-full text-sm font-bold uppercase tracking-wider">
                        {{ $article->category ?? 'Umum' }}
                    </span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold mb-6 text-shadow-lg leading-tight">
                    {{ $article->title }}
                </h1>
                <div class="flex flex-wrap justify-center items-center gap-6 text-primary-100">
                    <div class="flex items-center">
                        <i class="fas fa-user-circle mr-2 text-accent-DEFAULT"></i>
                        <span>{{ $article->author ?? 'Admin' }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="far fa-calendar-alt mr-2 text-accent-DEFAULT"></i>
                        <span>{{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('d F Y') }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="far fa-clock mr-2 text-accent-DEFAULT"></i>
                        <span>{{ $article->read_time ?? '5 Menit Baca' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Featured Image -->
                <div class="mb-12 rounded-2xl overflow-hidden shadow-2xl">
                    <img src="{{ $article->image ?? 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80' }}" 
                         alt="{{ $article->title }}" 
                         class="w-full h-auto object-cover max-h-[500px]">
                </div>

                <!-- Main Content -->
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-6">
                    {!! $article->content !!}
                </div>

                <hr class="my-12 border-gray-200">

                <!-- Related Articles -->
                @if(count($related) > 0)
                <div class="mt-16">
                    <h2 class="text-3xl font-bold text-primary-800 mb-8 flex items-center">
                        <i class="fas fa-layer-group text-accent-DEFAULT mr-3"></i>
                        Artikel Terkait
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @foreach($related as $item)
                        <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow border border-gray-100">
                            <img src="{{ $item->image ?? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80' }}" 
                                 alt="{{ $item->title }}" class="w-full h-40 object-cover">
                            <div class="p-4">
                                <h3 class="font-bold text-primary-800 line-clamp-2 mb-2 hover:text-primary-600">
                                    <a href="{{ route('blog.show', $item->slug) }}">{{ $item->title }}</a>
                                </h3>
                                <div class="flex items-center text-xs text-gray-500">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    <span>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}</span>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Back button -->
                <div class="mt-12 text-center">
                    <a href="{{ route('blog') }}" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-800 group">
                        <i class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform"></i>
                        Kembali ke Blog
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('style')
<style>
    /* Styling for Rich Text Content */
    .prose {
        color: #374151;
        line-height: 1.8;
    }
    .prose p { 
        margin-bottom: 1.5rem; 
    }
    .prose h2 { 
        color: #111827; 
        font-weight: 700; 
        font-size: 1.875rem; 
        margin-top: 2.5rem; 
        margin-bottom: 1.25rem;
        line-height: 1.3;
        border-left: 4px solid #dfcf9f;
        padding-left: 1rem;
    }
    .prose h3 { 
        color: #1f2937; 
        font-weight: 700; 
        font-size: 1.5rem; 
        margin-top: 2rem; 
        margin-bottom: 1rem;
        line-height: 1.4;
    }
    .prose strong {
        color: #111827;
        font-weight: 600;
    }
    .prose ul { 
        list-style-type: disc; 
        padding-left: 1.5rem; 
        margin-bottom: 1.5rem; 
    }
    .prose ol { 
        list-style-type: decimal; 
        padding-left: 1.5rem; 
        margin-bottom: 1.5rem; 
    }
    .prose li {
        margin-bottom: 0.5rem;
    }
    .prose blockquote {
        border-left: 4px solid #e5e7eb;
        padding-left: 1.5rem;
        font-style: italic;
        color: #4b5563;
        margin: 2rem 0;
    }
    .prose img {
        border-radius: 1rem;
        margin: 2rem 0;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush
