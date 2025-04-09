<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-red-800">
                {{ $car->make }} {{ $car->model }} ({{ $car->registration_number }})
            </h2>
            <a href="{{ route('cars.index') }}" class="text-sm text-blue-600">← Atpakaļ</a>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-lg p-6 mb-8">
            <h3 class="text-lg font-semibold mb-4">Komentāri par paveikto:</h3>
        
            @forelse($car->comments->sortByDesc('date') as $comment)
                <div class="mb-4 pb-4 border-b last:border-b-0">
                    <div class="flex justify-between items-start">
                        <div class="w-full">
                            <p class="text-gray-800">{{ $comment->content }}</p>
                            
                            @if($comment->store || $comment->link)
                                <div class="mt-2 text-sm">
                                    @if($comment->store)
                                        <div class="text-gray-600">
                                            <span class="font-medium">Veikals:</span> {{ $comment->store }}
                                        </div>
                                    @endif
                                    @if($comment->link)
                                        <div class="text-blue-600 hover:text-blue-800 mt-1">
                                            <a href="{{ $comment->link }}" target="_blank" rel="noopener noreferrer">
                                                <span class="font-medium">Saite:</span> {{ Str::limit($comment->link, 40) }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endif
                            
                            <div class="text-sm text-gray-500 mt-2">
                                <span>{{ $comment->user->name }}</span> •
                                <span>{{ $comment->date->format('Y-m-d') }}</span>
                            </div>
                        </div>
                        @if($comment->user_id == auth()->id())
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm">
                                    Dzēst
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Nav komentāru.</p>
            @endforelse
        </div>
        
        <div class="bg-white shadow rounded-lg p-6">
            <h4 class="text-md font-semibold mb-4">Pievienot jaunu komentāru</h4>
            <form method="POST" action="{{ route('comments.store', $car) }}">
                @csrf
                
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Komentārs*(paveiktais darbs)</label>
                    <textarea name="content" id="content" rows="4" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                </div>
        
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="store" class="block text-sm font-medium text-gray-700 mb-1">Detaļa(nosaukums)</label>
                        <input type="text" name="store" id="store"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
        
                    <div class="mb-4">
                        <label for="link" class="block text-sm font-medium text-gray-700 mb-1">Saite uz detaļu (URL)</label>
                        <input type="url" name="link" id="link"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
        
                <div class="mb-4">
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Datums</label>
                    <input type="date" name="date" id="date"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
        
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Pievienot komentāru
                </button>
            </form>
        </div>
    
</x-app-layout>