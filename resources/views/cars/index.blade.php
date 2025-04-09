<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-black-">Manas mašīnas</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <a href="{{ route('cars.create') }}" class="mb-4 inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
            + Pievienot jaunu mašīnu
        </a>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
        @endif

        <div class="bg-white shadow overflow-hidden sm:rounded-lg max-w-x">

            <ul class="divide-y divide-gray-200">
                @forelse($cars as $car)
                    <li class="p-4 hover:bg-gray-50">
                        <div class="flex justify-between items-start">
                            <div class="w-full">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-medium">
                                        {{ $car->make }} {{ $car->model }}
                                        <span class="text-gray-600 text-sm">({{ $car->registration_number }})</span>
                                    </h3>
                                    <div class="flex space-x-4">
                                        <a href="{{ route('cars.show', $car) }}"
                                            class="text-blue-600 hover:text-blue-800 text-m font-medium">
                                            Apskatīt pilnībā
                                        </a>
                                        <form method="POST" action="{{ route('cars.destroy', $car) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-800 text-m font-medium"
                                                    onclick="return confirm('Vai tiešām vēlaties dzēst šo mašīnu?')">
                                                Dzēst
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <span class="text-sm font-medium">Komentāri: {{ $car->comments_count }}</span>

                                    @if($car->comments->isNotEmpty())
                                        <div class="mt-2 space-y-2">
                                            @foreach($car->comments->take(3) as $comment)
                                                <div class="text-sm text-gray-600 pl-2 border-l-2 border-gray-200">
                                                    <p>{{ Str::limit($comment->content, 50) }}</p>
                                                    @if($comment->store)
                                                        <p class="text-xs">Detaļa: {{ Str::limit($comment->store, 30) }}</p>
                                                    @endif
                                                    <p class="text-xs text-gray-400">
                                                        {{ $comment->date->format('Y-m-d') }} • {{ $comment->user->name }}
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="p-4 text-center text-gray-500">Nav nevienas mašīnas.</li>
                @endforelse
            </ul>
        </div>
    </div>
</x-app-layout>