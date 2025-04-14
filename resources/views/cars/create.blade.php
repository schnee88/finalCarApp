<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Pievienot jaunu mašīnu</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('cars.store') }}">
            @csrf

            <div class="mb-4">
                <label for="make" style="color: azure;" class="block text-sm font-medium">Marka</label>
                <input id="make" name="make" type="text" required class="mt-1 block w-full" />
            </div>

            <div class="mb-4">
                <label for="model" style="color: azure;" class="block text-sm font-medium">Modelis</label>
                <input id="model" name="model" type="text" required class="mt-1 block w-full" />
            </div>

            <div class="mb-4">
                <label for="registration_number" style="color: azure;" class="block text-sm font-medium">Numur Zīme</label>
                <input id="registration_number" name="registration_number" type="text" required class="mt-1 block w-full" />
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                Pievienot mašīnu
            </button>
        </form>
    </div>
</x-app-layout>
